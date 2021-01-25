<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActorsMovies Controller
 *
 * @property \App\Model\Table\ActorsMoviesTable $ActorsMovies
 * @method \App\Model\Entity\ActorsMovie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActorsMoviesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Persons'],
        ];
        $actorsMovies = $this->paginate($this->ActorsMovies);

        $this->set(compact('actorsMovies'));
    }

    /**
     * View method
     *
     * @param string|null $id Actors Movie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actorsMovie = $this->ActorsMovies->get($id, [
            'contain' => ['Movies', 'Persons'],
        ]);

        $this->set(compact('actorsMovie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actorsMovie = $this->ActorsMovies->newEmptyEntity();
        if ($this->request->is('post')) {
            $actorsMovie = $this->ActorsMovies->patchEntity($actorsMovie, $this->request->getData());
            if ($this->ActorsMovies->save($actorsMovie)) {
                $this->Flash->success(__('The actors movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actors movie could not be saved. Please, try again.'));
        }
        $movies = $this->ActorsMovies->Movies->find('list', ['limit' => 200]);
        $persons = $this->ActorsMovies->Persons->find('list', ['limit' => 200]);
        $this->set(compact('actorsMovie', 'movies', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actors Movie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actorsMovie = $this->ActorsMovies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actorsMovie = $this->ActorsMovies->patchEntity($actorsMovie, $this->request->getData());
            if ($this->ActorsMovies->save($actorsMovie)) {
                $this->Flash->success(__('The actors movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actors movie could not be saved. Please, try again.'));
        }
        $movies = $this->ActorsMovies->Movies->find('list', ['limit' => 200]);
        $persons = $this->ActorsMovies->Persons->find('list', ['limit' => 200]);
        $this->set(compact('actorsMovie', 'movies', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actors Movie id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actorsMovie = $this->ActorsMovies->get($id);
        if ($this->ActorsMovies->delete($actorsMovie)) {
            $this->Flash->success(__('The actors movie has been deleted.'));
        } else {
            $this->Flash->error(__('The actors movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
