<?php
namespace DanLundgren\DlMobilebankid\Controller;

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
 * MobileBankIdController
 */
class MobileBankIdController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mobileBankIdRepository
     *
     * @var \DanLundgren\DlMobilebankid\Domain\Repository\MobileBankIdRepository
     * @inject
     */
    protected $mobileBankIdRepository = null;

    /**
     * action loginbox
     *
     * @return void
     */
    public function loginboxAction()
    {

    }

    /**
     * action loginok
     *
     * @return void
     */
    public function loginokAction()
    {

    }

    /**
     * action loginfail
     *
     * @return void
     */
    public function loginfailAction()
    {

    }
}
