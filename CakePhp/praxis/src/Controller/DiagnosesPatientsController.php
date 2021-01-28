<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenDate;
use Cake\Validation\Validator;

/**
 * DiagnosesPatients Controller
 *
 * @property \App\Model\Table\DiagnosesPatientsTable $DiagnosesPatients
 * @method \App\Model\Entity\DiagnosesPatient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosesPatientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'Diagnoses'],
        ];
        $diagnosesPatients = $this->paginate($this->DiagnosesPatients);

        $this->set(compact('diagnosesPatients'));
    }

    /**
     * View method
     *
     * @param string|null $id Diagnoses Patient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnosesPatient = $this->DiagnosesPatients->get($id, [
            'contain' => ['Patients', 'Diagnoses'],
        ]);

        $this->set(compact('diagnosesPatient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diagnosesPatient = $this->DiagnosesPatients->newEmptyEntity();
        if ($this->request->is('post')) {
            $diagnosesPatient = $this->DiagnosesPatients->patchEntity($diagnosesPatient, $this->request->getData());
            if ($this->DiagnosesPatients->save($diagnosesPatient)) {
                $this->Flash->success(__('The diagnoses patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnoses patient could not be saved. Please, try again.'));
        }
        $patients = $this->DiagnosesPatients->Patients->find('list', ['limit' => 200]);
        $diagnoses = $this->DiagnosesPatients->Diagnoses->find('list', ['limit' => 200]);
        $this->set(compact('diagnosesPatient', 'patients', 'diagnoses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnoses Patient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnosesPatient = $this->DiagnosesPatients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnosesPatient = $this->DiagnosesPatients->patchEntity($diagnosesPatient, $this->request->getData());
            if ($this->DiagnosesPatients->save($diagnosesPatient)) {
                $this->Flash->success(__('The diagnoses patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnoses patient could not be saved. Please, try again.'));
        }
        $patients = $this->DiagnosesPatients->Patients->find('list', ['limit' => 200]);
        $diagnoses = $this->DiagnosesPatients->Diagnoses->find('list', ['limit' => 200]);
        $this->set(compact('diagnosesPatient', 'patients', 'diagnoses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnoses Patient id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnosesPatient = $this->DiagnosesPatients->get($id);
        if ($this->DiagnosesPatients->delete($diagnosesPatient)) {
            $this->Flash->success(__('The diagnoses patient has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnoses patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        if (!$this->request->is("post")) {
            // Default value
            $this->set(['period' => 'this_month']);
            return;
        }

        // Set validator
        $validator = new Validator();
        $validator
            ->notEmptyString('patient_id', 'PatientID can not be empty')
            ->numeric('patient_id', 'PatientID must be numeric');

        // get data
        $data = $this->request->getData();

        // set period in view
        $period = $data['period'];
        $this->set(compact('period'));

        // Validate data
        $errors = $validator->validate($data);

        if (!empty($errors)) {

            $messages = [];
            foreach (array_values($errors) as $fieldError) {

                foreach (array_values($fieldError) as $errorMessage) {
                    array_push($messages, $errorMessage);
                }
            }

            foreach ($messages as $message) {
                $this->Flash->error($message);
            }

            return;
        }

        $useDaterange = true;

        switch ($period) {
            case 'this_month':
                $date = FrozenDate::now()->addMonth(1);
                break;
            case 'last_month':
                $date = FrozenDate::now();
                break;
            default:
                $useDaterange = false;
                break;
        }

        $patientId = $data['patient_id'];

        $conditions['patient_id'] = $patientId;

        if ($useDaterange) {
            $conditions['month(visit)'] = $date->month;
            $conditions['year(visit)'] = $date->year;
        }

        $this->paginate = [
            'contain' => ['Patients', 'Diagnoses', 'Diagnoses.Diseaseareas'],
            'conditions' => $conditions
        ];
        $diagnosesPatients = $this->paginate($this->DiagnosesPatients);

        $this->set(compact('diagnosesPatients', 'patientId'));
        
        if (isset($date)) {
            $this->set(compact('date'));
        }
    }
}
