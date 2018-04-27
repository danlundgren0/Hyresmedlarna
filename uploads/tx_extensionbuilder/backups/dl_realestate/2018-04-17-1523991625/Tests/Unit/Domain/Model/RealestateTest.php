<?php
namespace DanLundgren\DlRealestate\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class RealestateTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlRealestate\Domain\Model\Realestate
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlRealestate\Domain\Model\Realestate();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStreetAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStreetAddress()
        );
    }

    /**
     * @test
     */
    public function setStreetAddressForStringSetsStreetAddress()
    {
        $this->subject->setStreetAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'streetAddress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDistrictReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDistrict()
        );
    }

    /**
     * @test
     */
    public function setDistrictForStringSetsDistrict()
    {
        $this->subject->setDistrict('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'district',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getResidentialAreaReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getResidentialArea()
        );
    }

    /**
     * @test
     */
    public function setResidentialAreaForStringSetsResidentialArea()
    {
        $this->subject->setResidentialArea('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'residentialArea',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRentFromReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRentFrom()
        );
    }

    /**
     * @test
     */
    public function setRentFromForStringSetsRentFrom()
    {
        $this->subject->setRentFrom('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'rentFrom',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRentToReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRentTo()
        );
    }

    /**
     * @test
     */
    public function setRentToForStringSetsRentTo()
    {
        $this->subject->setRentTo('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'rentTo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNoOfRoomsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNoOfRooms()
        );
    }

    /**
     * @test
     */
    public function setNoOfRoomsForStringSetsNoOfRooms()
    {
        $this->subject->setNoOfRooms('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'noOfRooms',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRentReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getRent()
        );
    }

    /**
     * @test
     */
    public function setRentForIntSetsRent()
    {
        $this->subject->setRent(12);

        self::assertAttributeEquals(
            12,
            'rent',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFurnituredReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getFurnitured()
        );
    }

    /**
     * @test
     */
    public function setFurnituredForBoolSetsFurnitured()
    {
        $this->subject->setFurnitured(true);

        self::assertAttributeEquals(
            true,
            'furnitured',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getHandicapAdaptedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getHandicapAdapted()
        );
    }

    /**
     * @test
     */
    public function setHandicapAdaptedForBoolSetsHandicapAdapted()
    {
        $this->subject->setHandicapAdapted(true);

        self::assertAttributeEquals(
            true,
            'handicapAdapted',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getElevatorReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getElevator()
        );
    }

    /**
     * @test
     */
    public function setElevatorForBoolSetsElevator()
    {
        $this->subject->setElevator(true);

        self::assertAttributeEquals(
            true,
            'elevator',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAnimalsAllowedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAnimalsAllowed()
        );
    }

    /**
     * @test
     */
    public function setAnimalsAllowedForBoolSetsAnimalsAllowed()
    {
        $this->subject->setAnimalsAllowed(true);

        self::assertAttributeEquals(
            true,
            'animalsAllowed',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOtherReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOther()
        );
    }

    /**
     * @test
     */
    public function setOtherForStringSetsOther()
    {
        $this->subject->setOther('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'other',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUploadImages1ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getUploadImages1()
        );
    }

    /**
     * @test
     */
    public function setUploadImages1ForFileReferenceSetsUploadImages1()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setUploadImages1($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'uploadImages1',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUploadImages2ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getUploadImages2()
        );
    }

    /**
     * @test
     */
    public function setUploadImages2ForFileReferenceSetsUploadImages2()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setUploadImages2($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'uploadImages2',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUploadImages3ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getUploadImages3()
        );
    }

    /**
     * @test
     */
    public function setUploadImages3ForFileReferenceSetsUploadImages3()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setUploadImages3($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'uploadImages3',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUploadImages4ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getUploadImages4()
        );
    }

    /**
     * @test
     */
    public function setUploadImages4ForFileReferenceSetsUploadImages4()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setUploadImages4($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'uploadImages4',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUploadImages5ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getUploadImages5()
        );
    }

    /**
     * @test
     */
    public function setUploadImages5ForFileReferenceSetsUploadImages5()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setUploadImages5($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'uploadImages5',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFeuserReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getFeuser()
        );
    }

    /**
     * @test
     */
    public function setFeuserForIntSetsFeuser()
    {
        $this->subject->setFeuser(12);

        self::assertAttributeEquals(
            12,
            'feuser',
            $this->subject
        );
    }
}
