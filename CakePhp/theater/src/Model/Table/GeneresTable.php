<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Generes Model
 *
 * @property \App\Model\Table\DramasTable&\Cake\ORM\Association\HasMany $Dramas
 *
 * @method \App\Model\Entity\Genere newEmptyEntity()
 * @method \App\Model\Entity\Genere newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Genere[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Genere get($primaryKey, $options = [])
 * @method \App\Model\Entity\Genere findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Genere patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Genere[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Genere|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Genere saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Genere[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genere[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genere[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genere[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GeneresTable extends Table
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

        $this->setTable('generes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Dramas', [
            'foreignKey' => 'genere_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}