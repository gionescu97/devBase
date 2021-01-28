<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosesTable Test Case
 */
class DiagnosesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosesTable
     */
    protected $Diagnoses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Diagnoses',
        'app.Diseaseareas',
        'app.Patients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diagnoses') ? [] : ['className' => DiagnosesTable::class];
        $this->Diagnoses = $this->getTableLocator()->get('Diagnoses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Diagnoses);

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
