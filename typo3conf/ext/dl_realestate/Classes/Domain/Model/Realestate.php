<?php
namespace DanLundgren\DlRealestate\Domain\Model;

/***
 *
 * This file is part of the "Real Estate" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * Realestate
 */
class Realestate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * streetAddress
     *
     * @var string
     */
    protected $streetAddress = '';

    /**
     * district
     *
     * @var string
     */
    protected $district = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * residentialArea
     *
     * @var string
     * @validate NotEmpty
     */
    protected $residentialArea = '';

    /**
     * rentFrom
     *
     * @var string
     * @validate NotEmpty
     */
    protected $rentFrom = 0;

    /**
     * rentTo
     *
     * @var string
     */
    protected $rentTo = '';

    /**
     * noOfRooms
     *
     * @var string
     * @validate NotEmpty
     */
    protected $noOfRooms = '';

    /**
     * rent
     *
     * @var int
     */
    protected $rent = 0;

    /**
     * furnitured
     *
     * @var bool
     */
    protected $furnitured = '';

    /**
     * handicapAdapted
     *
     * @var bool
     */
    protected $handicapAdapted = '';

    /**
     * elevator
     *
     * @var bool
     */
    protected $elevator = '';

    /**
     * animalsAllowed
     *
     * @var bool
     */
    protected $animalsAllowed = '';

    /**
     * other
     *
     * @var string
     */
    protected $other = '';

    /**
     * uploadImages1
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $uploadImages1 = null;

    /**
     * uploadImages2
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $uploadImages2 = null;

    /**
     * uploadImages3
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $uploadImages3 = null;

    /**
     * uploadImages4
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $uploadImages4 = null;

    /**
     * uploadImages5
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $uploadImages5 = null;

    /**
     * feuser
     *
     * @var int
     */
    protected $feuser = 0;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {

    }

    /**
     * Returns the rentFrom
     *
     * @return string rentFrom
     */
    public function getRentFrom()
    {
        return $this->rentFrom;
    }

    /**
     * Sets the rentFrom
     *
     * @param int $rentFrom
     * @return void
     */
    public function setRentFrom($rentFrom)
    {
        $this->rentFrom = $rentFrom;
    }

    /**
     * Returns the rentTo
     *
     * @return string rentTo
     */
    public function getRentTo()
    {
        return $this->rentTo;
    }

    /**
     * Sets the rentTo
     *
     * @param string $rentTo
     * @return void
     */
    public function setRentTo($rentTo)
    {
        $this->rentTo = $rentTo;
    }

    /**
     * Returns the noOfRooms
     *
     * @return string noOfRooms
     */
    public function getNoOfRooms()
    {
        return $this->noOfRooms;
    }

    /**
     * Sets the noOfRooms
     *
     * @param string $noOfRooms
     * @return void
     */
    public function setNoOfRooms($noOfRooms)
    {
        $this->noOfRooms = $noOfRooms;
    }

    /**
     * Returns the furnitured
     *
     * @return bool furnitured
     */
    public function getFurnitured()
    {
        return $this->furnitured;
    }

    /**
     * Sets the furnitured
     *
     * @param string $furnitured
     * @return void
     */
    public function setFurnitured($furnitured)
    {
        $this->furnitured = $furnitured;
    }

    /**
     * Returns the handicapAdapted
     *
     * @return bool handicapAdapted
     */
    public function getHandicapAdapted()
    {
        return $this->handicapAdapted;
    }

    /**
     * Sets the handicapAdapted
     *
     * @param string $handicapAdapted
     * @return void
     */
    public function setHandicapAdapted($handicapAdapted)
    {
        $this->handicapAdapted = $handicapAdapted;
    }

    /**
     * Returns the elevator
     *
     * @return bool elevator
     */
    public function getElevator()
    {
        return $this->elevator;
    }

    /**
     * Sets the elevator
     *
     * @param string $elevator
     * @return void
     */
    public function setElevator($elevator)
    {
        $this->elevator = $elevator;
    }

    /**
     * Returns the animalsAllowed
     *
     * @return bool animalsAllowed
     */
    public function getAnimalsAllowed()
    {
        return $this->animalsAllowed;
    }

    /**
     * Sets the animalsAllowed
     *
     * @param string $animalsAllowed
     * @return void
     */
    public function setAnimalsAllowed($animalsAllowed)
    {
        $this->animalsAllowed = $animalsAllowed;
    }

    /**
     * Returns the other
     *
     * @return string other
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * Sets the other
     *
     * @param string $other
     * @return void
     */
    public function setOther($other)
    {
        $this->other = $other;
    }

    /**
     * Returns the rent
     *
     * @return int $rent
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Sets the rent
     *
     * @param int $rent
     * @return void
     */
    public function setRent($rent)
    {
        $this->rent = $rent;
    }

    /**
     * Returns the uploadImages1
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages1
     */
    public function getUploadImages1()
    {
        return $this->uploadImages1;
    }

    /**
     * Sets the uploadImages1
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages1
     * @return void
     */
    public function setUploadImages1(\TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages1=NULL)
    {
        if($uploadImages1) {
            $this->uploadImages1 = $uploadImages1;
        }        
    }

    /**
     * Returns the uploadImages2
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages2
     */
    public function getUploadImages2()
    {
        return $this->uploadImages2;
    }

    /**
     * Sets the uploadImages2
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages2
     * @return void
     */
    public function setUploadImages2(\TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages2=NULL)
    {
        if($uploadImages2) {
            $this->uploadImages2 = $uploadImages2;
        }
    }

    /**
     * Returns the uploadImages3
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages3
     */
    public function getUploadImages3()
    {
        return $this->uploadImages3;
    }

    /**
     * Sets the uploadImages3
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages3
     * @return void
     */
    public function setUploadImages3(\TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages3=NULL)
    {
        if($uploadImages3) {
            $this->uploadImages3 = $uploadImages3;
        }        
    }

    /**
     * Returns the uploadImages4
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages4
     */
    public function getUploadImages4()
    {
        return $this->uploadImages4;
    }

    /**
     * Sets the uploadImages4
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages4
     * @return void
     */
    public function setUploadImages4(\TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages4=NULL)
    {
        if($uploadImages4) {
            $this->uploadImages4 = $uploadImages4;
        }
        
    }

    /**
     * Returns the uploadImages5
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages5
     */
    public function getUploadImages5()
    {
        return $this->uploadImages5;
    }

    /**
     * Sets the uploadImages5
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages5
     * @return void
     */
    public function setUploadImages5(\TYPO3\CMS\Extbase\Domain\Model\FileReference $uploadImages5=NULL)
    {
        $this->uploadImages5 = $uploadImages5;
    }

    /**
     * Returns the residentialArea
     *
     * @return string residentialArea
     */
    public function getResidentialArea()
    {
        return $this->residentialArea;
    }

    /**
     * Sets the residentialArea
     *
     * @param string $residentialArea
     * @return void
     */
    public function setResidentialArea($residentialArea)
    {
        $this->residentialArea = $residentialArea;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the district
     *
     * @return string $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @param string $district
     * @return void
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * Returns the streetAddress
     *
     * @return string $streetAddress
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Sets the streetAddress
     *
     * @param string $streetAddress
     * @return void
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the feuser
     *
     * @return int $feuser
     */
    public function getFeuser()
    {
        return $this->feuser;
    }

    /**
     * Sets the feuser
     *
     * @param int $feuser
     * @return void
     */
    public function setFeuser($feuser)
    {
        $this->feuser = $feuser;
    }
}
