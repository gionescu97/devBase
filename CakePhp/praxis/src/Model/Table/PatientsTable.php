<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\BelongsToMany $Diagnoses
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PatientsTable extends Table
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

        $this->setTable('patients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Diagnoses', [
            'foreignKey' => 'patient_id',
            'targetForeignKey' => 'diagnosis_id',
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
            ->scalar('firstname')
            ->maxLength('firstname', 45)
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 45)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->date('birth')
            ->requirePresence('birth', 'create')
            ->notEmptyDate('birth');

        $validator
            ->integer('svnr')
            ->requirePresence('svnr', 'create')
            ->notEmptyString('svnr');

        return $validator;
    }
}
