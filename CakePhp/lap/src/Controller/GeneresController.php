<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Generes Controller
 *
 * @property \App\Model\Table\GeneresTable $Generes
 * @method \App\Model\Entity\Genere[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $generes = $this->paginate($this->Generes);

        $this->set(compact('generes'));
    }

    /**
     * View method
     *
     * @param string|null $id Genere id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genere = $this->Generes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('genere'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genere = $this->Generes->newEmptyEntity();
        if ($this->request->is('post')) {
            $genere = $this->Generes->patchEntity($genere, $this->request->getData());
            if ($this->Generes->save($genere)) {
                $this->Flash->success(__('The genere has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genere could not be saved. Please, try again.'));
        }
        $this->set(compact('genere'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Genere id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genere = $this->Generes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genere = $this->Generes->patchEntity($genere, $this->request->getData());
            if ($this->Generes->save($genere)) {
                $this->Flash->success(__('The genere has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genere could not be saved. Please, try again.'));
        }
        $this->set(compact('genere'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Genere id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genere = $this->Generes->get($id);
        if ($this->Generes->delete($genere)) {
            $this->Flash->success(__('The genere has been deleted.'));
        } else {
            $this->Flash->error(__('The genere could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
