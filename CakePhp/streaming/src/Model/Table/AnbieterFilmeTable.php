<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnbieterFilme Model
 *
 * @property \App\Model\Table\AnbietersTable&\Cake\ORM\Association\BelongsTo $Anbieters
 * @property \App\Model\Table\FilmsTable&\Cake\ORM\Association\BelongsTo $Films
 *
 * @method \App\Model\Entity\AnbieterFilme newEmptyEntity()
 * @method \App\Model\Entity\AnbieterFilme newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AnbieterFilme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnbieterFilme get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnbieterFilme findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AnbieterFilme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnbieterFilme[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnbieterFilme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnbieterFilme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnbieterFilme[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AnbieterFilme[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AnbieterFilme[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AnbieterFilme[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AnbieterFilmeTable extends Table
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

        $this->setTable('anbieter_filme');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Anbieters', [
            'foreignKey' => 'anbieter_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Films', [
            'foreignKey' => 'film_id',
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
        $rules->add($rules->existsIn(['anbieter_id'], 'Anbieters'), ['errorField' => 'anbieter_id']);
        $rules->add($rules->existsIn(['film_id'], 'Films'), ['errorField' => 'film_id']);

        return $rules;
    }
}
