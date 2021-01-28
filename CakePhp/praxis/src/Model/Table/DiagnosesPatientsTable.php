<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiagnosesPatients Model
 *
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\BelongsTo $Diagnoses
 *
 * @method \App\Model\Entity\DiagnosesPatient newEmptyEntity()
 * @method \App\Model\Entity\DiagnosesPatient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiagnosesPatient get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiagnosesPatient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiagnosesPatient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiagnosesPatientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('diagnoses_patients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Diagnoses', [
            'foreignKey' => 'diagnosis_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('visit')
            ->requirePresence('visit', 'create')
            ->notEmptyDateTime('visit');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['patient_id'], 'Patients'), ['errorField' => 'patient_id']);
        $rules->add($rules->existsIn(['diagnosis_id'], 'Diagnoses'), ['errorField' => 'diagnosis_id']);

        return $rules;
    }
}
