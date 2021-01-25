<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierMoviesTable Test Case
 */
class SupplierMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierMoviesTable
     */
    protected $SupplierMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SupplierMovies',
        'app.Suppliers',
        'app.Movies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SupplierMovies') ? [] : ['className' => SupplierMoviesTable::class];
        $this->SupplierMovies = $this->getTableLocator()->get('SupplierMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SupplierMovies);

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
