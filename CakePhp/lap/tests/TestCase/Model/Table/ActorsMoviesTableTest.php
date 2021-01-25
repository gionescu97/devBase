<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActorsMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActorsMoviesTable Test Case
 */
class ActorsMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActorsMoviesTable
     */
    protected $ActorsMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ActorsMovies',
        'app.Movies',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ActorsMovies') ? [] : ['className' => ActorsMoviesTable::class];
        $this->ActorsMovies = $this->getTableLocator()->get('ActorsMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ActorsMovies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
