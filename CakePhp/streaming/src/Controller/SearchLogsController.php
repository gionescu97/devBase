<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SearchLogs Controller
 *
 * @property \App\Model\Table\SearchLogsTable $SearchLogs
 * @method \App\Model\Entity\SearchLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $searchLogs = $this->paginate($this->SearchLogs);

        $this->set(compact('searchLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Search Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $searchLog = $this->SearchLogs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('searchLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $searchLog = $this->SearchLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $searchLog = $this->SearchLogs->patchEntity($searchLog, $this->request->getData());
            if ($this->SearchLogs->save($searchLog)) {
                $this->Flash->success(__('The search log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search log could not be saved. Please, try again.'));
        }
        $this->set(compact('searchLog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Search Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $searchLog = $this->SearchLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $searchLog = $this->SearchLogs->patchEntity($searchLog, $this->request->getData());
            if ($this->SearchLogs->save($searchLog)) {
                $this->Flash->success(__('The search log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search log could not be saved. Please, try again.'));
        }
        $this->set(compact('searchLog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Search Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $searchLog = $this->SearchLogs->get($id);
        if ($this->SearchLogs->delete($searchLog)) {
            $this->Flash->success(__('The search log has been deleted.'));
        } else {
            $this->Flash->error(__('The search log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
