<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DramaeventsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DramaeventsTable Test Case
 */
class DramaeventsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DramaeventsTable
     */
    protected $Dramaevents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dramaevents',
        'app.Dramas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dramaevents') ? [] : ['className' => DramaeventsTable::class];
        $this->Dramaevents = $this->getTableLocator()->get('Dramaevents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dramaevents);

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
