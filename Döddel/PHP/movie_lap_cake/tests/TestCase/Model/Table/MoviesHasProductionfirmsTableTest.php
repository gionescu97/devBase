<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesHasProductionfirmsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoviesHasProductionfirmsTable Test Case
 */
class MoviesHasProductionfirmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoviesHasProductionfirmsTable
     */
    protected $MoviesHasProductionfirms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MoviesHasProductionfirms',
        'app.Movies',
        'app.Productionfirms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MoviesHasProductionfirms') ? [] : ['className' => MoviesHasProductionfirmsTable::class];
        $this->MoviesHasProductionfirms = $this->getTableLocator()->get('MoviesHasProductionfirms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MoviesHasProductionfirms);

        parent::tearDown();
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
