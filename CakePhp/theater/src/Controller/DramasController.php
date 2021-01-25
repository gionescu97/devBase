<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * Dramas Controller
 *
 * @property \App\Model\Table\DramasTable $Dramas
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DramasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Generes', 'Persons', 'Dramaevents' => ['sort' => ['Dramaevents.datetime ASC']]],
            'order' => ['Dramas.name ASC']
        ];
        $dramas = $this->paginate($this->Dramas);

        $this->set(compact('dramas'));
    }

    /**
     * View method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drama = $this->Dramas->get($id, [
            'contain' => ['Generes', 'Persons', 'Dramaevents'],
        ]);

        $this->set(compact('drama'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drama = $this->Dramas->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $drama = $this->Dramas->patchEntity($drama, $data);

            $showSpecialMessage = false;
            try 
            {
                if ($this->Dramas->save($drama)) 
                {

                    $dramaeventsTable = $this->getTableLocator()->get('Dramaevents');
    
                    $dramaevent = $dramaeventsTable->newEmptyEntity();
                    $dramaevent->drama_id = $drama->id;
                    $dramaevent->datetime = $data['datetime'];
    
                    if (!$dramaeventsTable->save($dramaevent)) {
                        $this->Flash->error(__('The dramaevent could not be saved.'));        
                    }
    
                    $this->Flash->success(__('The drama has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
            }
            catch (PDOException $e) 
            {
                if ($e->getCode() == "23000")
                {
                    $showSpecialMessage = true;   
                }
            }
            finally
            {
                if ($showSpecialMessage) 
                {
                    $this->Flash->error("Es existiert bereits ein Theaterstück mit dem Namen ".$drama->name);
                }
                else
                {
                    $this->Flash->error(__('The drama could not be saved. Please, try again.'));
                }
            }
        }
        $generes = $this->Dramas->Generes->find('list', ['limit' => 200]);
        $persons = $this->Dramas->Persons->find('list', ['limit' => 200]);
        $this->set(compact('drama', 'generes', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drama = $this->Dramas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drama = $this->Dramas->patchEntity($drama, $this->request->getData());
            if ($this->Dramas->save($drama)) {
                $this->Flash->success(__('The drama has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drama could not be saved. Please, try again.'));
        }
        $generes = $this->Dramas->Generes->find('list', ['limit' => 200]);
        $persons = $this->Dramas->Persons->find('list', ['limit' => 200]);
        $this->set(compact('drama', 'generes', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drama = $this->Dramas->get($id);
        if ($this->Dramas->delete($drama)) {
            $this->Flash->success(__('The drama has been deleted.'));
        } else {
            $this->Flash->error(__('The drama could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function search()
    {
        
    }
}
