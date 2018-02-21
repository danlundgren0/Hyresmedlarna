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
 * BankIdController
 */
class BankIdController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * bankIdRepository
     *
     * @var \DanLundgren\DlBankid\Domain\Repository\BankIdRepository
     * @inject
     */
    protected $bankIdRepository = null;

    /**
     * action mobileBankId
     *
     * @param DanLundgren\DlBankid\Domain\Model\BankId
     * @return void
     */
    public function mobileBankIdAction()
    {

    }

    /**
     * action fileBankId
     *
     * @param DanLundgren\DlBankid\Domain\Model\BankId
     * @return void
     */
    public function fileBankIdAction()
    {

    }

    /**
     * action sign
     *
     * @return void
     */
    public function signAction()
    {

    }

    /**
     * action collect
     *
     * @return void
     */
    public function collectAction()
    {

    }

    /**
     * action call
     *
     * @return void
     */
    public function callAction()
    {

    }
}
