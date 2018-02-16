<?php
namespace DanLundgren\DlBankid\Controller;

/***
 *
 * This file is part of the "BankID" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * LoginFormController
 */
class LoginFormController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * loginFormRepository
     *
     * @var \DanLundgren\DlBankid\Domain\Repository\LoginFormRepository
     * @inject
     */
    protected $loginFormRepository = null;

    /**
     * action mobileBankId
     *
     * @return void
     */
    public function mobileBankIdAction()
    {

    }

    /**
     * action fileBankId
     *
     * @return void
     */
    public function fileBankIdAction()
    {

    }
}
