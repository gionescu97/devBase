<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roomrequests Model
 *
 * @property \App\Model\Table\TitlesTable&\Cake\ORM\Association\BelongsTo $Titles
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 *
 * @method \App\Model\Entity\Roomrequest newEmptyEntity()
 * @method \App\Model\Entity\Roomrequest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Roomrequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Roomrequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Roomrequest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Roomrequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Roomrequest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Roomrequest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Roomrequest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Roomrequest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Roomrequest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Roomrequest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Roomrequest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RoomrequestsTable extends Table
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

        $this->setTable('roomrequests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Titles', [
            'foreignKey' => 'title_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
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
            ->scalar('fname')
            ->maxLength('fname', 45)
            ->requirePresence('fname', 'create')
            ->notEmptyString('fname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 45)
            ->requirePresence('lname', 'create')
            ->notEmptyString('lname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('special_request')
            ->maxLength('special_request', 45)
            ->allowEmptyString('special_request');

        $validator
            ->dateTime('arrival')
            ->requirePresence('arrival', 'create')
            ->notEmptyDateTime('arrival');

        $validator
            ->integer('nights_stayed')
            ->requirePresence('nights_stayed', 'create')
            ->notEmptyString('nights_stayed');

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
        $rules->add($rules->existsIn(['title_id'], 'Titles'), ['errorField' => 'title_id']);
        $rules->add($rules->existsIn(['gender_id'], 'Genders'), ['errorField' => 'gender_id']);

        return $rules;
    }
}
