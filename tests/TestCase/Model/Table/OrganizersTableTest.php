<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganizersTable Test Case
 */
class OrganizersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrganizersTable
     */
    public $Organizers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Organizers') ? [] : ['className' => 'App\Model\Table\OrganizersTable'];
        $this->Organizers = TableRegistry::get('Organizers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organizers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
