<?php
namespace DanLundgren\DlEmailregistration\Domain\Model;

/***
 *
 * This file is part of the "Email registration" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * Emailregistration
 */
class Emailregistration extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * emailAddress
     *
     * @var string
     */
    protected $emailAddress = '';

    /**
     * isLandlord
     *
     * @var bool
     */
    protected $isLandlord = false;

    /**
     * isTenant
     *
     * @var bool
     */
    protected $isTenant = false;

    /**
     * Returns the emailAddress
     *
     * @return string $emailAddress
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets the emailAddress
     *
     * @param string $emailAddress
     * @return void
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns the isLandlord
     *
     * @return bool $isLandlord
     */
    public function getIsLandlord()
    {
        return $this->isLandlord;
    }

    /**
     * Sets the isLandlord
     *
     * @param bool $isLandlord
     * @return void
     */
    public function setIsLandlord($isLandlord)
    {
        $this->isLandlord = $isLandlord;
    }

    /**
     * Returns the boolean state of isLandlord
     *
     * @return bool
     */
    public function isIsLandlord()
    {
        return $this->isLandlord;
    }

    /**
     * Returns the isTenant
     *
     * @return bool $isTenant
     */
    public function getIsTenant()
    {
        return $this->isTenant;
    }

    /**
     * Sets the isTenant
     *
     * @param bool $isTenant
     * @return void
     */
    public function setIsTenant($isTenant)
    {
        $this->isTenant = $isTenant;
    }

    /**
     * Returns the boolean state of isTenant
     *
     * @return bool
     */
    public function isIsTenant()
    {
        return $this->isTenant;
    }
}
