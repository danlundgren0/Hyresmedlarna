<?php
namespace DanLundgren\DlMobilebankid\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class CustomFrontendUserGroupTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlMobilebankid\Domain\Model\CustomFrontendUserGroup
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlMobilebankid\Domain\Model\CustomFrontendUserGroup();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getUserTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getUserType()
        );
    }

    /**
     * @test
     */
    public function setUserTypeForIntSetsUserType()
    {
        $this->subject->setUserType(12);

        self::assertAttributeEquals(
            12,
            'userType',
            $this->subject
        );
    }
}
