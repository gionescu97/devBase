<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diseaseareas Controller
 *
 * @property \App\Model\Table\DiseaseareasTable $Diseaseareas
 * @method \App\Model\Entity\Diseasearea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiseaseareasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $diseaseareas = $this->paginate($this->Diseaseareas);

        $this->set(compact('diseaseareas'));
    }

    /**
     * View method
     *
     * @param string|null $id Diseasearea id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diseasearea = $this->Diseaseareas->get($id, [
            'contain' => ['Diagnoses'],
        ]);

        $this->set(compact('diseasearea'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diseasearea = $this->Diseaseareas->newEmptyEntity();
        if ($this->request->is('post')) {
            $diseasearea = $this->Diseaseareas->patchEntity($diseasearea, $this->request->getData());
            if ($this->Diseaseareas->save($diseasearea)) {
                $this->Flash->success(__('The diseasearea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diseasearea could not be saved. Please, try again.'));
        }
        $this->set(compact('diseasearea'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diseasearea id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diseasearea = $this->Diseaseareas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diseasearea = $this->Diseaseareas->patchEntity($diseasearea, $this->request->getData());
            if ($this->Diseaseareas->save($diseasearea)) {
                $this->Flash->success(__('The diseasearea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diseasearea could not be saved. Please, try again.'));
        }
        $this->set(compact('diseasearea'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diseasearea id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diseasearea = $this->Diseaseareas->get($id);
        if ($this->Diseaseareas->delete($diseasearea)) {
            $this->Flash->success(__('The diseasearea has been deleted.'));
        } else {
            $this->Flash->error(__('The diseasearea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
