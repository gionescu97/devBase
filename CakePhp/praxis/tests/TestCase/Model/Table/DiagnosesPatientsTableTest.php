<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosesPatientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosesPatientsTable Test Case
 */
class DiagnosesPatientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosesPatientsTable
     */
    protected $DiagnosesPatients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DiagnosesPatients',
        'app.Patients',
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
        $config = $this->getTableLocator()->exists('DiagnosesPatients') ? [] : ['className' => DiagnosesPatientsTable::class];
        $this->DiagnosesPatients = $this->getTableLocator()->get('DiagnosesPatients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DiagnosesPatients);

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
