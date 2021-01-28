<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diseaseareas Model
 *
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\HasMany $Diagnoses
 *
 * @method \App\Model\Entity\Diseasearea newEmptyEntity()
 * @method \App\Model\Entity\Diseasearea newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diseasearea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diseasearea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diseasearea findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diseasearea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diseasearea[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diseasearea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diseasearea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diseasearea[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diseasearea[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diseasearea[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diseasearea[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiseaseareasTable extends Table
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

        $this->setTable('diseaseareas');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Diagnoses', [
            'foreignKey' => 'diseasearea_id',
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
}
