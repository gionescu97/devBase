<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dramaevents Controller
 *
 * @property \App\Model\Table\DramaeventsTable $Dramaevents
 * @method \App\Model\Entity\Dramaevent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DramaeventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dramas'],
        ];
        $dramaevents = $this->paginate($this->Dramaevents);

        $this->set(compact('dramaevents'));
    }

    /**
     * View method
     *
     * @param string|null $id Dramaevent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dramaevent = $this->Dramaevents->get($id, [
            'contain' => ['Dramas'],
        ]);

        $this->set(compact('dramaevent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dramaevent = $this->Dramaevents->newEmptyEntity();
        if ($this->request->is('post')) {
            $dramaevent = $this->Dramaevents->patchEntity($dramaevent, $this->request->getData());
            if ($this->Dramaevents->save($dramaevent)) {
                $this->Flash->success(__('The dramaevent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dramaevent could not be saved. Please, try again.'));
        }
        $dramas = $this->Dramaevents->Dramas->find('list', ['limit' => 200]);
        $this->set(compact('dramaevent', 'dramas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dramaevent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dramaevent = $this->Dramaevents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dramaevent = $this->Dramaevents->patchEntity($dramaevent, $this->request->getData());
            if ($this->Dramaevents->save($dramaevent)) {
                $this->Flash->success(__('The dramaevent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dramaevent could not be saved. Please, try again.'));
        }
        $dramas = $this->Dramaevents->Dramas->find('list', ['limit' => 200]);
        $this->set(compact('dramaevent', 'dramas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dramaevent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dramaevent = $this->Dramaevents->get($id);
        if ($this->Dramaevents->delete($dramaevent)) {
            $this->Flash->success(__('The dramaevent has been deleted.'));
        } else {
            $this->Flash->error(__('The dramaevent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
