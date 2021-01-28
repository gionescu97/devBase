<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiseaseareasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiseaseareasTable Test Case
 */
class DiseaseareasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiseaseareasTable
     */
    protected $Diseaseareas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Diseaseareas',
        'app.Diagnoses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diseaseareas') ? [] : ['className' => DiseaseareasTable::class];
        $this->Diseaseareas = $this->getTableLocator()->get('Diseaseareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Diseaseareas);

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
