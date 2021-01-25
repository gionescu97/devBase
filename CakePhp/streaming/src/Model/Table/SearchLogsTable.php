<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SearchLogs Model
 *
 * @method \App\Model\Entity\SearchLog newEmptyEntity()
 * @method \App\Model\Entity\SearchLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SearchLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SearchLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\SearchLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SearchLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SearchLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SearchLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SearchLogsTable extends Table
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

        $this->setTable('search_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('type')
            ->maxLength('type', 16)
            ->allowEmptyString('type');

        $validator
            ->scalar('text')
            ->maxLength('text', 1024)
            ->allowEmptyString('text');

        $validator
            ->dateTime('time')
            ->allowEmptyDateTime('time');

        $validator
            ->integer('records')
            ->allowEmptyString('records');

        return $validator;
    }
}
