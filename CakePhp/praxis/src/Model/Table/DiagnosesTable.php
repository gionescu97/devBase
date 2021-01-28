<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diagnoses Model
 *
 * @property \App\Model\Table\DiseaseareasTable&\Cake\ORM\Association\BelongsTo $Diseaseareas
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsToMany $Patients
 *
 * @method \App\Model\Entity\Diagnosis newEmptyEntity()
 * @method \App\Model\Entity\Diagnosis newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diagnosis findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diagnosis patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosis saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiagnosesTable extends Table
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

        $this->setTable('diagnoses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Diseaseareas', [
            'foreignKey' => 'diseasearea_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Patients', [
            'foreignKey' => 'diagnosis_id',
            'targetForeignKey' => 'patient_id',
            'joinTable' => 'diagnoses_patients',
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
            ->scalar('title')
            ->maxLength('title', 45)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
        $rules->add($rules->existsIn(['diseasearea_id'], 'Diseaseareas'), ['errorField' => 'diseasearea_id']);

        return $rules;
    }
}
