<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Filme Controller
 *
 * @property \App\Model\Table\FilmeTable $Filme
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Kategorien'],
        ];
        $filme = $this->paginate($this->Filme);

        $this->set(compact('filme'));
    }

    /**
     * View method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filme = $this->Filme->get($id, [
            'contain' => ['Kategorien', 'Anbieter'],
        ]);

        $this->set(compact('filme'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filme = $this->Filme->newEmptyEntity();
        if ($this->request->is('post')) {
            $filme = $this->Filme->patchEntity($filme, $this->request->getData());
            if ($this->Filme->save($filme)) {
                $this->Flash->success(__('The filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filme could not be saved. Please, try again.'));
        }
        $kategorien = $this->Filme->Kategorien->find('list', ['limit' => 200]);
        $anbieter = $this->Filme->Anbieter->find('list', ['limit' => 200]);
        $this->set(compact('filme', 'kategorien', 'anbieter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filme = $this->Filme->get($id, [
            'contain' => ['Anbieter'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filme = $this->Filme->patchEntity($filme, $this->request->getData());
            if ($this->Filme->save($filme)) {
                $this->Flash->success(__('The filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filme could not be saved. Please, try again.'));
        }
        $kategorien = $this->Filme->Kategorien->find('list', ['limit' => 200]);
        $anbieter = $this->Filme->Anbieter->find('list', ['limit' => 200]);
        $this->set(compact('filme', 'kategorien', 'anbieter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filme = $this->Filme->get($id);
        if ($this->Filme->delete($filme)) {
            $this->Flash->success(__('The filme has been deleted.'));
        } else {
            $this->Flash->error(__('The filme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
