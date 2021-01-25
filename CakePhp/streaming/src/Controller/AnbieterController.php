<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Anbieter Controller
 *
 * @property \App\Model\Table\AnbieterTable $Anbieter
 * @method \App\Model\Entity\Anbieter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnbieterController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $anbieter = $this->paginate($this->Anbieter);

        $this->set(compact('anbieter'));
    }

    public function searchSuppliers()
    {
        $foundedSuppliers = [];
        $resultsWithQuery = [];

        if ($this->request->is('post'))
        {
            $searchParms = $this->request->getData();
            $foundedSuppliers = $this->Anbieter->find('all', ['conditions' => ['title like' => '%'.$searchParms['search_word'].'%']]);
        }

        $this->set(compact('foundedSuppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Anbieter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anbieter = $this->Anbieter->get($id, [
            'contain' => ['Filme'],
        ]);

        $this->set(compact('anbieter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anbieter = $this->Anbieter->newEmptyEntity();
        if ($this->request->is('post')) {
            $anbieter = $this->Anbieter->patchEntity($anbieter, $this->request->getData());
            if ($this->Anbieter->save($anbieter)) {
                $this->Flash->success(__('The anbieter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anbieter could not be saved. Please, try again.'));
        }
        $filme = $this->Anbieter->Filme->find('list', ['limit' => 200]);
        $this->set(compact('anbieter', 'filme'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anbieter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anbieter = $this->Anbieter->get($id, [
            'contain' => ['Filme'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anbieter = $this->Anbieter->patchEntity($anbieter, $this->request->getData());
            if ($this->Anbieter->save($anbieter)) {
                $this->Flash->success(__('The anbieter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anbieter could not be saved. Please, try again.'));
        }
        $filme = $this->Anbieter->Filme->find('list', ['limit' => 200]);
        $this->set(compact('anbieter', 'filme'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anbieter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anbieter = $this->Anbieter->get($id);
        if ($this->Anbieter->delete($anbieter)) {
            $this->Flash->success(__('The anbieter has been deleted.'));
        } else {
            $this->Flash->error(__('The anbieter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
