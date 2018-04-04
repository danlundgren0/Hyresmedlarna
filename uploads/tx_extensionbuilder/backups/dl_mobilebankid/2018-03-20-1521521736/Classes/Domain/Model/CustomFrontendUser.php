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
 * CustomFrontendUser
 */
class CustomFrontendUser extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{
    /**
     * personalNumber
     *
     * @var string
     * @validate NotEmpty
     */
    protected $personalNumber = '';

    /**
     * Returns the personalNumber
     *
     * @return string $personalNumber
     */
    public function getPersonalNumber()
    {
        return $this->personalNumber;
    }

    /**
     * Sets the personalNumber
     *
     * @param string $personalNumber
     * @return void
     */
    public function setPersonalNumber($personalNumber)
    {
        $this->personalNumber = $personalNumber;
    }
}
