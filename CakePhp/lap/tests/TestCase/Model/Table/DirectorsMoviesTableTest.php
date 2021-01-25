<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DirectorsMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DirectorsMoviesTable Test Case
 */
class DirectorsMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DirectorsMoviesTable
     */
    protected $DirectorsMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DirectorsMovies',
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
        $config = $this->getTableLocator()->exists('DirectorsMovies') ? [] : ['className' => DirectorsMoviesTable::class];
        $this->DirectorsMovies = $this->getTableLocator()->get('DirectorsMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DirectorsMovies);

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
