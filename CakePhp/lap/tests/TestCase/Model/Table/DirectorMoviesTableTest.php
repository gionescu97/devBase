<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DirectorMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DirectorMoviesTable Test Case
 */
class DirectorMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DirectorMoviesTable
     */
    protected $DirectorMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DirectorMovies',
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
        $config = $this->getTableLocator()->exists('DirectorMovies') ? [] : ['className' => DirectorMoviesTable::class];
        $this->DirectorMovies = $this->getTableLocator()->get('DirectorMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DirectorMovies);

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
