<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Kategorien Controller
 *
 * @property \App\Model\Table\KategorienTable $Kategorien
 * @method \App\Model\Entity\Kategorien[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KategorienController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $kategorien = $this->paginate($this->Kategorien);

        $this->set(compact('kategorien'));
    }

    /**
     * View method
     *
     * @param string|null $id Kategorien id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kategorien = $this->Kategorien->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('kategorien'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kategorien = $this->Kategorien->newEmptyEntity();
        if ($this->request->is('post')) {
            $kategorien = $this->Kategorien->patchEntity($kategorien, $this->request->getData());
            if ($this->Kategorien->save($kategorien)) {
                $this->Flash->success(__('The kategorien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kategorien could not be saved. Please, try again.'));
        }
        $this->set(compact('kategorien'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kategorien id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kategorien = $this->Kategorien->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kategorien = $this->Kategorien->patchEntity($kategorien, $this->request->getData());
            if ($this->Kategorien->save($kategorien)) {
                $this->Flash->success(__('The kategorien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kategorien could not be saved. Please, try again.'));
        }
        $this->set(compact('kategorien'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kategorien id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kategorien = $this->Kategorien->get($id);
        if ($this->Kategorien->delete($kategorien)) {
            $this->Flash->success(__('The kategorien has been deleted.'));
        } else {
            $this->Flash->error(__('The kategorien could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
