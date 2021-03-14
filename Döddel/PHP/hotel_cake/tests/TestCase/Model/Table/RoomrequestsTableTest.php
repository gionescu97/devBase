<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoomrequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoomrequestsTable Test Case
 */
class RoomrequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoomrequestsTable
     */
    protected $Roomrequests;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Roomrequests',
        'app.Titles',
        'app.Genders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Roomrequests') ? [] : ['className' => RoomrequestsTable::class];
        $this->Roomrequests = $this->getTableLocator()->get('Roomrequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Roomrequests);

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
