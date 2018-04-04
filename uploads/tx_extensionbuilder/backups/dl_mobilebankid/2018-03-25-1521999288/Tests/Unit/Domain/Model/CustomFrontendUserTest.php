<?php
namespace DanLundgren\DlMobilebankid\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class CustomFrontendUserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlMobilebankid\Domain\Model\CustomFrontendUser
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlMobilebankid\Domain\Model\CustomFrontendUser();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPersonalNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPersonalNumber()
        );
    }

    /**
     * @test
     */
    public function setPersonalNumberForStringSetsPersonalNumber()
    {
        $this->subject->setPersonalNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'personalNumber',
            $this->subject
        );
    }
}
