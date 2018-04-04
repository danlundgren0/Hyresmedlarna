<?php
namespace DanLundgren\DlBankid\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class LoginFormTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlBankid\Domain\Model\LoginForm
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlBankid\Domain\Model\LoginForm();
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
