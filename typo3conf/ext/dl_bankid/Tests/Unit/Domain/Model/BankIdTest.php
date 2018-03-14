<?php
namespace DanLundgren\DlBankid\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class BankIdTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlBankid\Domain\Model\BankId
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlBankid\Domain\Model\BankId();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getLiveModeEnabledReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getLiveModeEnabled()
        );
    }

    /**
     * @test
     */
    public function setLiveModeEnabledForBoolSetsLiveModeEnabled()
    {
        $this->subject->setLiveModeEnabled(true);

        self::assertAttributeEquals(
            true,
            'liveModeEnabled',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCaCertReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCaCert()
        );
    }

    /**
     * @test
     */
    public function setCaCertForStringSetsCaCert()
    {
        $this->subject->setCaCert('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'caCert',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLocalCertReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLocalCert()
        );
    }

    /**
     * @test
     */
    public function setLocalCertForStringSetsLocalCert()
    {
        $this->subject->setLocalCert('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'localCert',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPriKeyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPriKey()
        );
    }

    /**
     * @test
     */
    public function setPriKeyForStringSetsPriKey()
    {
        $this->subject->setPriKey('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'priKey',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAppapiUrlReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAppapiUrl()
        );
    }

    /**
     * @test
     */
    public function setAppapiUrlForStringSetsAppapiUrl()
    {
        $this->subject->setAppapiUrl('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'appapiUrl',
            $this->subject
        );
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

    /**
     * @test
     */
    public function getUserVisibleDataReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getUserVisibleData()
        );
    }

    /**
     * @test
     */
    public function setUserVisibleDataForStringSetsUserVisibleData()
    {
        $this->subject->setUserVisibleData('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'userVisibleData',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCurlInitReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCurlInit()
        );
    }

    /**
     * @test
     */
    public function setCurlInitForStringSetsCurlInit()
    {
        $this->subject->setCurlInit('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'curlInit',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrderRefReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrderRef()
        );
    }

    /**
     * @test
     */
    public function setOrderRefForStringSetsOrderRef()
    {
        $this->subject->setOrderRef('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'orderRef',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAutoStartTokenReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAutoStartToken()
        );
    }

    /**
     * @test
     */
    public function setAutoStartTokenForStringSetsAutoStartToken()
    {
        $this->subject->setAutoStartToken('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'autoStartToken',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForStringSetsStatus()
    {
        $this->subject->setStatus('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'status',
            $this->subject
        );
    }
}
