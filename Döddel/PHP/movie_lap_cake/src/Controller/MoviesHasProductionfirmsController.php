<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MoviesHasProductionfirms Controller
 *
 * @property \App\Model\Table\MoviesHasProductionfirmsTable $MoviesHasProductionfirms
 * @method \App\Model\Entity\MoviesHasProductionfirm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesHasProductionfirmsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Productionfirms'],
        ];
        $moviesHasProductionfirms = $this->paginate($this->MoviesHasProductionfirms);

        $this->set(compact('moviesHasProductionfirms'));
    }

    /**
     * View method
     *
     * @param string|null $id Movies Has Productionfirm id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moviesHasProductionfirm = $this->MoviesHasProductionfirms->get($id, [
            'contain' => ['Movies', 'Productionfirms'],
        ]);

        $this->set(compact('moviesHasProductionfirm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moviesHasProductionfirm = $this->MoviesHasProductionfirms->newEmptyEntity();
        if ($this->request->is('post')) {
            $moviesHasProductionfirm = $this->MoviesHasProductionfirms->patchEntity($moviesHasProductionfirm, $this->request->getData());
            if ($this->MoviesHasProductionfirms->save($moviesHasProductionfirm)) {
                $this->Flash->success(__('The movies has productionfirm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movies has productionfirm could not be saved. Please, try again.'));
        }
        $movies = $this->MoviesHasProductionfirms->Movies->find('list', ['limit' => 200]);
        $productionfirms = $this->MoviesHasProductionfirms->Productionfirms->find('list', ['limit' => 200]);
        $this->set(compact('moviesHasProductionfirm', 'movies', 'productionfirms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movies Has Productionfirm id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moviesHasProductionfirm = $this->MoviesHasProductionfirms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moviesHasProductionfirm = $this->MoviesHasProductionfirms->patchEntity($moviesHasProductionfirm, $this->request->getData());
            if ($this->MoviesHasProductionfirms->save($moviesHasProductionfirm)) {
                $this->Flash->success(__('The movies has productionfirm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movies has productionfirm could not be saved. Please, try again.'));
        }
        $movies = $this->MoviesHasProductionfirms->Movies->find('list', ['limit' => 200]);
        $productionfirms = $this->MoviesHasProductionfirms->Productionfirms->find('list', ['limit' => 200]);
        $this->set(compact('moviesHasProductionfirm', 'movies', 'productionfirms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movies Has Productionfirm id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moviesHasProductionfirm = $this->MoviesHasProductionfirms->get($id);
        if ($this->MoviesHasProductionfirms->delete($moviesHasProductionfirm)) {
            $this->Flash->success(__('The movies has productionfirm has been deleted.'));
        } else {
            $this->Flash->error(__('The movies has productionfirm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
