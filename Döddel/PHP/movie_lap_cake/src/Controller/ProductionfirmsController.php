<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Productionfirms Controller
 *
 * @property \App\Model\Table\ProductionfirmsTable $Productionfirms
 * @method \App\Model\Entity\Productionfirm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionfirmsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $productionfirms = $this->paginate($this->Productionfirms);

        $this->set(compact('productionfirms'));
    }

    /**
     * View method
     *
     * @param string|null $id Productionfirm id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productionfirm = $this->Productionfirms->get($id, [
            'contain' => ['MoviesHasProductionfirms'],
        ]);

        $this->set(compact('productionfirm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productionfirm = $this->Productionfirms->newEmptyEntity();
        if ($this->request->is('post')) {
            $productionfirm = $this->Productionfirms->patchEntity($productionfirm, $this->request->getData());
            if ($this->Productionfirms->save($productionfirm)) {
                $this->Flash->success(__('The productionfirm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productionfirm could not be saved. Please, try again.'));
        }
        $this->set(compact('productionfirm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Productionfirm id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productionfirm = $this->Productionfirms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productionfirm = $this->Productionfirms->patchEntity($productionfirm, $this->request->getData());
            if ($this->Productionfirms->save($productionfirm)) {
                $this->Flash->success(__('The productionfirm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productionfirm could not be saved. Please, try again.'));
        }
        $this->set(compact('productionfirm'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Productionfirm id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productionfirm = $this->Productionfirms->get($id);
        if ($this->Productionfirms->delete($productionfirm)) {
            $this->Flash->success(__('The productionfirm has been deleted.'));
        } else {
            $this->Flash->error(__('The productionfirm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
