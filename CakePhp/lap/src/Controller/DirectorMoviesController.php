<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DirectorMovies Controller
 *
 * @property \App\Model\Table\DirectorMoviesTable $DirectorMovies
 * @method \App\Model\Entity\DirectorMovie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DirectorMoviesController extends AppController
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
        $directorMovies = $this->paginate($this->DirectorMovies);

        $this->set(compact('directorMovies'));
    }

    /**
     * View method
     *
     * @param string|null $id Director Movie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorMovie = $this->DirectorMovies->get($id, [
            'contain' => ['Movies', 'Persons'],
        ]);

        $this->set(compact('directorMovie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $directorMovie = $this->DirectorMovies->newEmptyEntity();
        if ($this->request->is('post')) {
            $directorMovie = $this->DirectorMovies->patchEntity($directorMovie, $this->request->getData());
            if ($this->DirectorMovies->save($directorMovie)) {
                $this->Flash->success(__('The director movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director movie could not be saved. Please, try again.'));
        }
        $movies = $this->DirectorMovies->Movies->find('list', ['limit' => 200]);
        $persons = $this->DirectorMovies->Persons->find('list', ['limit' => 200]);
        $this->set(compact('directorMovie', 'movies', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Director Movie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $directorMovie = $this->DirectorMovies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $directorMovie = $this->DirectorMovies->patchEntity($directorMovie, $this->request->getData());
            if ($this->DirectorMovies->save($directorMovie)) {
                $this->Flash->success(__('The director movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director movie could not be saved. Please, try again.'));
        }
        $movies = $this->DirectorMovies->Movies->find('list', ['limit' => 200]);
        $persons = $this->DirectorMovies->Persons->find('list', ['limit' => 200]);
        $this->set(compact('directorMovie', 'movies', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Director Movie id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directorMovie = $this->DirectorMovies->get($id);
        if ($this->DirectorMovies->delete($directorMovie)) {
            $this->Flash->success(__('The director movie has been deleted.'));
        } else {
            $this->Flash->error(__('The director movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
