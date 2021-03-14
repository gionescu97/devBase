<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Roomrequests Controller
 *
 * @property \App\Model\Table\RoomrequestsTable $Roomrequests
 * @method \App\Model\Entity\Roomrequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomrequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $conditions = [];

        if ($this->request->is('post'))
        {
            $data = $this->request->getData();

            $searchString = $data['search_string'];

            $conditions['fname like'] = '%'.$searchString.'%';
            $conditions['lname like'] = '%'.$searchString.'%';
            $conditions['email like'] = '%'.$searchString.'%';
        }

        $this->paginate = [
            'contain' => ['Titles', 'Genders'],
            'conditions' => ['or' => $conditions],
            'order' => ['lname asc', 'fname asc']
        ];
        $roomrequests = $this->paginate($this->Roomrequests);

        $this->set(compact('roomrequests'));

    }

    /**
     * View method
     *
     * @param string|null $id Roomrequest id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomrequest = $this->Roomrequests->get($id, [
            'contain' => ['Titles', 'Genders'],
        ]);

        $this->set(compact('roomrequest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomrequest = $this->Roomrequests->newEmptyEntity();
        if ($this->request->is('post')) {
            $roomrequest = $this->Roomrequests->patchEntity($roomrequest, $this->request->getData());
            if ($this->Roomrequests->save($roomrequest)) {
                $this->Flash->success(__('The roomrequest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomrequest could not be saved. Please, try again.'));
        }
        $titles = $this->Roomrequests->Titles->find('list', ['limit' => 200]);
        $genders = $this->Roomrequests->Genders->find('list', ['limit' => 200]);
        $this->set(compact('roomrequest', 'titles', 'genders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Roomrequest id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomrequest = $this->Roomrequests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomrequest = $this->Roomrequests->patchEntity($roomrequest, $this->request->getData());
            if ($this->Roomrequests->save($roomrequest)) {
                $this->Flash->success(__('The roomrequest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomrequest could not be saved. Please, try again.'));
        }
        $titles = $this->Roomrequests->Titles->find('list', ['limit' => 200]);
        $genders = $this->Roomrequests->Genders->find('list', ['limit' => 200]);
        $this->set(compact('roomrequest', 'titles', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Roomrequest id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomrequest = $this->Roomrequests->get($id);
        if ($this->Roomrequests->delete($roomrequest)) {
            $this->Flash->success(__('The roomrequest has been deleted.'));
        } else {
            $this->Flash->error(__('The roomrequest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
