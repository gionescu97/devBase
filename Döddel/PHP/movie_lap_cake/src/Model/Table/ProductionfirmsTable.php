<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productionfirms Model
 *
 * @property \App\Model\Table\MoviesHasProductionfirmsTable&\Cake\ORM\Association\HasMany $MoviesHasProductionfirms
 *
 * @method \App\Model\Entity\Productionfirm newEmptyEntity()
 * @method \App\Model\Entity\Productionfirm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Productionfirm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Productionfirm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Productionfirm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Productionfirm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Productionfirm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Productionfirm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productionfirm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productionfirm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionfirm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionfirm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionfirm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductionfirmsTable extends Table
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

        $this->setTable('productionfirms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('MoviesHasProductionfirms', [
            'foreignKey' => 'productionfirm_id',
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
            ->scalar('description')
            ->maxLength('description', 45)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
