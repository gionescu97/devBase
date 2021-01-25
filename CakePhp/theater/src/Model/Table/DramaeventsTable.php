<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dramaevents Model
 *
 * @property \App\Model\Table\DramasTable&\Cake\ORM\Association\BelongsTo $Dramas
 *
 * @method \App\Model\Entity\Dramaevent newEmptyEntity()
 * @method \App\Model\Entity\Dramaevent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Dramaevent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dramaevent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dramaevent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Dramaevent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dramaevent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dramaevent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dramaevent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dramaevent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dramaevent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dramaevent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dramaevent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DramaeventsTable extends Table
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

        $this->setTable('dramaevents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dramas', [
            'foreignKey' => 'drama_id',
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
            ->dateTime('datetime')
            ->requirePresence('datetime', 'create')
            ->notEmptyDateTime('datetime');

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
        $rules->add($rules->existsIn(['drama_id'], 'Dramas'), ['errorField' => 'drama_id']);

        return $rules;
    }
}
