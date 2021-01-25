<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnbieterFilmeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnbieterFilmeTable Test Case
 */
class AnbieterFilmeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnbieterFilmeTable
     */
    protected $AnbieterFilme;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AnbieterFilme',
        'app.Anbieters',
        'app.Films',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AnbieterFilme') ? [] : ['className' => AnbieterFilmeTable::class];
        $this->AnbieterFilme = $this->getTableLocator()->get('AnbieterFilme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AnbieterFilme);

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
