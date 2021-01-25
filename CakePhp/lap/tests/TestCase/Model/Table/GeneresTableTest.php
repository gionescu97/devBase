<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneresTable Test Case
 */
class GeneresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneresTable
     */
    protected $Generes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Generes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Generes') ? [] : ['className' => GeneresTable::class];
        $this->Generes = $this->getTableLocator()->get('Generes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Generes);

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
