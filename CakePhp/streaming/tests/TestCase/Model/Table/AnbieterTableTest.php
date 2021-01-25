<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnbieterTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnbieterTable Test Case
 */
class AnbieterTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnbieterTable
     */
    protected $Anbieter;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Anbieter',
        'app.Filme',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Anbieter') ? [] : ['className' => AnbieterTable::class];
        $this->Anbieter = $this->getTableLocator()->get('Anbieter', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Anbieter);

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
