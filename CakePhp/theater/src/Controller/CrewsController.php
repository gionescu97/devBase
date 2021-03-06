<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Crews Controller
 *
 * @property \App\Model\Table\CrewsTable $Crews
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dramaevents', 'Persons'],
        ];
        $crews = $this->paginate($this->Crews);

        $this->set(compact('crews'));
    }

    /**
     * View method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => ['Dramaevents', 'Persons'],
        ]);

        $this->set(compact('crew'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crew = $this->Crews->newEmptyEntity();
        if ($this->request->is('post')) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('The crew has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew could not be saved. Please, try again.'));
        }
        $dramaevents = $this->Crews->Dramaevents->find('list', ['limit' => 200]);
        $persons = $this->Crews->Persons->find('list', ['limit' => 200]);
        $this->set(compact('crew', 'dramaevents', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('The crew has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew could not be saved. Please, try again.'));
        }
        $dramaevents = $this->Crews->Dramaevents->find('list', ['limit' => 200]);
        $persons = $this->Crews->Persons->find('list', ['limit' => 200]);
        $this->set(compact('crew', 'dramaevents', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crew = $this->Crews->get($id);
        if ($this->Crews->delete($crew)) {
            $this->Flash->success(__('The crew has been deleted.'));
        } else {
            $this->Flash->error(__('The crew could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
