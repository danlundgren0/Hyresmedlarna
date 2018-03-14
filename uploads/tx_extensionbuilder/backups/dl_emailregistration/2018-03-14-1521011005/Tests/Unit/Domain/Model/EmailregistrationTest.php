<?php
namespace DanLundgren\DlEmailregistration\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class EmailregistrationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlEmailregistration\Domain\Model\Emailregistration
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlEmailregistration\Domain\Model\Emailregistration();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getEmailAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmailAddress()
        );
    }

    /**
     * @test
     */
    public function setEmailAddressForStringSetsEmailAddress()
    {
        $this->subject->setEmailAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'emailAddress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIsLandlordReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getIsLandlord()
        );
    }

    /**
     * @test
     */
    public function setIsLandlordForBoolSetsIsLandlord()
    {
        $this->subject->setIsLandlord(true);

        self::assertAttributeEquals(
            true,
            'isLandlord',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIsTenantReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getIsTenant()
        );
    }

    /**
     * @test
     */
    public function setIsTenantForBoolSetsIsTenant()
    {
        $this->subject->setIsTenant(true);

        self::assertAttributeEquals(
            true,
            'isTenant',
            $this->subject
        );
    }
}
