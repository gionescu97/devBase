<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchLogsTable Test Case
 */
class SearchLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchLogsTable
     */
    protected $SearchLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SearchLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SearchLogs') ? [] : ['className' => SearchLogsTable::class];
        $this->SearchLogs = $this->getTableLocator()->get('SearchLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SearchLogs);

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
