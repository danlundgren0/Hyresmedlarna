<?php
namespace DanLundgren\DlMobilebankid\Domain\Model;

/***
 *
 * This file is part of the "MobileBankId" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * CustomFrontendUserGroup
 */
class CustomFrontendUserGroup extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
{
    /**
     * userType
     *
     * @var int
     */
    protected $userType = 0;

    /**
     * Returns the userType
     *
     * @return int $userType
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Sets the userType
     *
     * @param int $userType
     * @return void
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }
}
