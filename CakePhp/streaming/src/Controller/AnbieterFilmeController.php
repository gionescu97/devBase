<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AnbieterFilme Controller
 *
 * @property \App\Model\Table\AnbieterFilmeTable $AnbieterFilme
 * @method \App\Model\Entity\AnbieterFilme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnbieterFilmeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Anbieters', 'Films'],
        ];
        $anbieterFilme = $this->paginate($this->AnbieterFilme);

        $this->set(compact('anbieterFilme'));
    }

    /**
     * View method
     *
     * @param string|null $id Anbieter Filme id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anbieterFilme = $this->AnbieterFilme->get($id, [
            'contain' => ['Anbieters', 'Films'],
        ]);

        $this->set(compact('anbieterFilme'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anbieterFilme = $this->AnbieterFilme->newEmptyEntity();
        if ($this->request->is('post')) {
            $anbieterFilme = $this->AnbieterFilme->patchEntity($anbieterFilme, $this->request->getData());
            if ($this->AnbieterFilme->save($anbieterFilme)) {
                $this->Flash->success(__('The anbieter filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anbieter filme could not be saved. Please, try again.'));
        }
        $anbieters = $this->AnbieterFilme->Anbieters->find('list', ['limit' => 200]);
        $films = $this->AnbieterFilme->Films->find('list', ['limit' => 200]);
        $this->set(compact('anbieterFilme', 'anbieters', 'films'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anbieter Filme id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anbieterFilme = $this->AnbieterFilme->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anbieterFilme = $this->AnbieterFilme->patchEntity($anbieterFilme, $this->request->getData());
            if ($this->AnbieterFilme->save($anbieterFilme)) {
                $this->Flash->success(__('The anbieter filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anbieter filme could not be saved. Please, try again.'));
        }
        $anbieters = $this->AnbieterFilme->Anbieters->find('list', ['limit' => 200]);
        $films = $this->AnbieterFilme->Films->find('list', ['limit' => 200]);
        $this->set(compact('anbieterFilme', 'anbieters', 'films'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anbieter Filme id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anbieterFilme = $this->AnbieterFilme->get($id);
        if ($this->AnbieterFilme->delete($anbieterFilme)) {
            $this->Flash->success(__('The anbieter filme has been deleted.'));
        } else {
            $this->Flash->error(__('The anbieter filme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
