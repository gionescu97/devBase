<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @property \App\Model\Table\GeneresTable&\Cake\ORM\Association\BelongsTo $Generes
 * @property \App\Model\Table\ActorsMoviesTable&\Cake\ORM\Association\HasMany $ActorsMovies
 * @property \App\Model\Table\DirectorMoviesTable&\Cake\ORM\Association\HasMany $DirectorMovies
 *
 * @method \App\Model\Entity\Movie newEmptyEntity()
 * @method \App\Model\Entity\Movie newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MoviesTable extends Table
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

        $this->setTable('movies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Generes', [
            'foreignKey' => 'generes_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ActorsMovies', [
            'foreignKey' => 'movie_id',
        ]);
        $this->hasMany('DirectorsMovies', [
            'foreignKey' => 'movie_id',
        ]);
        $this->belongsToMany('Persons', [
            'joinTable' => 'directors_movies'
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
            ->scalar('title_1')
            ->maxLength('title_1', 45)
            ->requirePresence('title_1', 'create')
            ->notEmptyString('title_1');

        $validator
            ->scalar('title_2')
            ->maxLength('title_2', 45)
            ->allowEmptyString('title_2');

        $validator
            ->date('premiere')
            ->requirePresence('premiere', 'create')
            ->notEmptyDate('premiere');

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
        $rules->add($rules->existsIn(['generes_id'], 'Generes'), ['errorField' => 'generes_id']);

        return $rules;
    }
}
