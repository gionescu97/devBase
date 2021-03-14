<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionfirmsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionfirmsTable Test Case
 */
class ProductionfirmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionfirmsTable
     */
    protected $Productionfirms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Productionfirms',
        'app.MoviesHasProductionfirms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Productionfirms') ? [] : ['className' => ProductionfirmsTable::class];
        $this->Productionfirms = $this->getTableLocator()->get('Productionfirms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productionfirms);

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
}
