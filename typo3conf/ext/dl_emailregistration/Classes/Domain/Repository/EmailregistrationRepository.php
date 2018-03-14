<?php
namespace DanLundgren\DlEmailregistration\Domain\Repository;

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
 * The repository for Emailregistrations
 */
class EmailregistrationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @param $email
     * @param $pid
     */
    public function findByEmail($email, $pid)
    {
        $emailRes = $GLOBALS['TYPO3_DB']->exec_SELECTquery('email_address', 'tx_dlemailregistration_domain_model_emailregistration', 'email_address="' . $email . '" AND pid=' . $pid . ' AND hidden=0 AND deleted=0');
        $email_address = NULL;
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($emailRes)) {
            $email_address = $row['email_address'];
        }
        return $email_address;
    }
}
