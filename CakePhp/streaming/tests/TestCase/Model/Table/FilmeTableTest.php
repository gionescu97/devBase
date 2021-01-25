<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmeTable Test Case
 */
class FilmeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmeTable
     */
    protected $Filme;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Filme',
        'app.Kategorien',
        'app.Anbieter',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Filme') ? [] : ['className' => FilmeTable::class];
        $this->Filme = $this->getTableLocator()->get('Filme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Filme);

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
