<?php
namespace DanLundgren\DlEmailregistration\Controller;

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
 * EmailregistrationController
 */
class EmailregistrationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * emailregistrationRepository
     *
     * @var \DanLundgren\DlEmailregistration\Domain\Repository\EmailregistrationRepository
     * @inject
     */
    protected $emailregistrationRepository = null;

    /**
     * action landlordreg
     *
     * @return void
     */
    public function landlordregAction()
    {

    }

    /**
     * action tenantreg
     *
     * @return void
     */
    public function tenantregAction()
    {

    }
}
