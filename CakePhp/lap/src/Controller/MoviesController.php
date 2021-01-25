<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Database\Driver\Mysql;
use Cake\Datasource\ConnectionManager;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Generes'],
        ];
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['Generes', 'ActorsMovies', 'DirectorMovies'],
        ]);

        $this->set(compact('movie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movie = $this->Movies->newEmptyEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $generes = $this->Movies->Generes->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'generes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $generes = $this->Movies->Generes->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'generes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movie = $this->Movies->get($id);
        if ($this->Movies->delete($movie)) {
            $this->Flash->success(__('The movie has been deleted.'));
        } else {
            $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        if (!$this->request->is("post")) {
            // If not post leave this shit
            return;
        }

        $data = $this->request->getData();

        $dateFrom = $data['date_from'];
        $dateTo = $data['date_to'];

        $this->paginate = [
            'conditions' => ['premiere between "'.$dateFrom.'" and "'.$dateTo.'"'],
            'contain' => ['Generes', 'DirectorsMovies.Persons']
        ];
        $movies = $this->paginate($this->Movies);
        $this->set(compact('movies'));
    }

    public function createDatabase($database_name)
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';

        // Create connection

        $cm = ConnectionManager::get('default');

        // create database

        $cm->setConfig

        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            return false; //die("Connection failed: " . $conn->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE ".$database_name;
        if ($conn->query($sql) === TRUE) {
            $conn2 = new mysqli($servername, $username, $password,$database_name);
            App::uses('File', 'Utility');
            $file = new File( APP . 'config/testsql.sql', true, 0755);
            $file->open('r',false);
            $sql = $file->read();  
            $conn2->query($sql);
           // pr(ConnectionManager::getDataSource('admin')->config);    
            return true; // "Database created successfully";
        } else {
            return false; // "Error creating database: " . $conn->error;
        }
    }
}
