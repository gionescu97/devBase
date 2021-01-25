<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anbieter Model
 *
 * @property \App\Model\Table\FilmeTable&\Cake\ORM\Association\BelongsToMany $Filme
 *
 * @method \App\Model\Entity\Anbieter newEmptyEntity()
 * @method \App\Model\Entity\Anbieter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Anbieter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anbieter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anbieter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Anbieter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anbieter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anbieter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anbieter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anbieter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Anbieter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Anbieter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Anbieter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AnbieterTable extends Table
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

        $this->setTable('anbieter');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Filme', [
            'foreignKey' => 'anbieter_id',
            'targetForeignKey' => 'filme_id',
            'joinTable' => 'anbieter_filme',
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
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('url')
            ->maxLength('url', 512)
            ->allowEmptyString('url');

        return $validator;
    }
}
