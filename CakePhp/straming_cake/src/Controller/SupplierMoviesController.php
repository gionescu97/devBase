<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SupplierMovies Controller
 *
 * @property \App\Model\Table\SupplierMoviesTable $SupplierMovies
 * @method \App\Model\Entity\SupplierMovie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupplierMoviesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Suppliers', 'Movies'],
        ];
        $supplierMovies = $this->paginate($this->SupplierMovies);

        $this->set(compact('supplierMovies'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Movie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierMovie = $this->SupplierMovies->get($id, [
            'contain' => ['Suppliers', 'Movies'],
        ]);

        $this->set(compact('supplierMovie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierMovie = $this->SupplierMovies->newEmptyEntity();
        if ($this->request->is('post')) {
            $supplierMovie = $this->SupplierMovies->patchEntity($supplierMovie, $this->request->getData());
            if ($this->SupplierMovies->save($supplierMovie)) {
                $this->Flash->success(__('The supplier movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier movie could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierMovies->Suppliers->find('list', ['limit' => 200]);
        $movies = $this->SupplierMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('supplierMovie', 'suppliers', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Movie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierMovie = $this->SupplierMovies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierMovie = $this->SupplierMovies->patchEntity($supplierMovie, $this->request->getData());
            if ($this->SupplierMovies->save($supplierMovie)) {
                $this->Flash->success(__('The supplier movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier movie could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierMovies->Suppliers->find('list', ['limit' => 200]);
        $movies = $this->SupplierMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('supplierMovie', 'suppliers', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Movie id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierMovie = $this->SupplierMovies->get($id);
        if ($this->SupplierMovies->delete($supplierMovie)) {
            $this->Flash->success(__('The supplier movie has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
