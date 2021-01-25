<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filme Model
 *
 * @property \App\Model\Table\KategorienTable&\Cake\ORM\Association\BelongsTo $Kategorien
 * @property \App\Model\Table\AnbieterTable&\Cake\ORM\Association\BelongsToMany $Anbieter
 *
 * @method \App\Model\Entity\Filme newEmptyEntity()
 * @method \App\Model\Entity\Filme newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Filme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Filme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Filme findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Filme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Filme[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Filme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FilmeTable extends Table
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

        $this->setTable('filme');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Kategorien', [
            'foreignKey' => 'kategorie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Anbieter', [
            'foreignKey' => 'filme_id',
            'targetForeignKey' => 'anbieter_id',
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
            ->maxLength('title', 256)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('kurztext')
            ->maxLength('kurztext', 256)
            ->allowEmptyString('kurztext');

        $validator
            ->scalar('langtext')
            ->maxLength('langtext', 2048)
            ->allowEmptyString('langtext');

        $validator
            ->scalar('bild_url')
            ->maxLength('bild_url', 512)
            ->allowEmptyString('bild_url');

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
        $rules->add($rules->existsIn(['kategorie_id'], 'Kategorien'), ['errorField' => 'kategorie_id']);

        return $rules;
    }
}
