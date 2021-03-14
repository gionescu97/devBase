<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MoviesHasProductionfirmsFixture
 */
class MoviesHasProductionfirmsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'movie_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'productionfirm_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_movies_has_production_companies_production_companies1_idx' => ['type' => 'index', 'columns' => ['productionfirm_id'], 'length' => []],
            'fk_movies_has_production_companies_movies_idx' => ['type' => 'index', 'columns' => ['movie_id'], 'length' => []],
        ],
        '_constraints' => [
            'fk_movies_has_production_companies_movies' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_movies_has_production_companies_production_companies1' => ['type' => 'foreign', 'columns' => ['productionfirm_id'], 'references' => ['productionfirms', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'movie_id' => 1,
                'productionfirm_id' => 1,
            ],
        ];
        parent::init();
    }
}
