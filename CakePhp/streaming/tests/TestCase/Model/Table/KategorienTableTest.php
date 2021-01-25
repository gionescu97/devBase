<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KategorienTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KategorienTable Test Case
 */
class KategorienTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KategorienTable
     */
    protected $Kategorien;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Kategorien',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Kategorien') ? [] : ['className' => KategorienTable::class];
        $this->Kategorien = $this->getTableLocator()->get('Kategorien', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Kategorien);

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
