<?php
namespace DanLundgren\DlMobilebankid\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class MobileBankIdTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlMobilebankid\Domain\Model\MobileBankId
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlMobilebankid\Domain\Model\MobileBankId();
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
