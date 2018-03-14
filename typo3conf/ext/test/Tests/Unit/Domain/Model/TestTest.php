<?php
namespace Test\Test\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class TestTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Test\Test\Domain\Model\Test
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Test\Test\Domain\Model\Test();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
