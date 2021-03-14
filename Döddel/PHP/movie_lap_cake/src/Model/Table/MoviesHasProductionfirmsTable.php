<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoviesHasProductionfirms Model
 *
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 * @property \App\Model\Table\ProductionfirmsTable&\Cake\ORM\Association\BelongsTo $Productionfirms
 *
 * @method \App\Model\Entity\MoviesHasProductionfirm newEmptyEntity()
 * @method \App\Model\Entity\MoviesHasProductionfirm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoviesHasProductionfirm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MoviesHasProductionfirmsTable extends Table
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

        $this->setTable('movies_has_productionfirms');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Productionfirms', [
            'foreignKey' => 'productionfirm_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['movie_id'], 'Movies'), ['errorField' => 'movie_id']);
        $rules->add($rules->existsIn(['productionfirm_id'], 'Productionfirms'), ['errorField' => 'productionfirm_id']);

        return $rules;
    }
}
