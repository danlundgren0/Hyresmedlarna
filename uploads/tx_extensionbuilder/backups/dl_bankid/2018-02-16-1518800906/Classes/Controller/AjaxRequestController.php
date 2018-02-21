<?php
namespace DanLundgren\DlRealestate\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

 /**
 * AjaxRequestController
 */
class AjaxRequestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * persistence manager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface
     * @inject
     */
    protected $persistenceManager = NULL;

    /**
     * realestateRepository
     *
     * @var \DanLundgren\DlEmailregistration\Domain\Repository\EmailregistrationRepository
     * @inject
     */
    protected $emailregistrationRepository = null;

	/**
	 * command
	 *
	 * @var string
	 */
	protected $command = NULL;

	/**
	 * arguments
	 *
	 * @var array
	 */
	protected $arguments = NULL;

	/**
	 * status
	 *
	 * @var bool
	 */
	protected $status = FALSE;

	/**
	 * message
	 *
	 * @var string
	 */
	protected $message = '';

	/**
	 * data
	 *
	 * @var array
	 */
	protected $data = FALSE;

	/**
	 * asJson
	 *
	 * @var boolean
	 */
	protected $asJson = TRUE;


	/**
	 * fileCollectionRepository
	 *
	 * @var \TYPO3\CMS\Core\Resource\FileCollectionRepository
	 */
	protected $fileCollectionRepository;

	public function registerEmail() {
		//TODO: validate email
		$type = $this->arguments['type'];
		$status = $this->arguments['status'];
		$email = $this->arguments['email'];
		$pid = $this->arguments['pid'];
		$emailregistration = $this->emailregistrationRepository->findByEmail($email, $pid);
		$isAlreadyRegistered = count($emailregistration);
		$this->data['success'] = -1;
		$this->data['message'] = 'Ett fel uppstod';
		if($isAlreadyRegistered==0) {
			$emailregistration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('DanLundgren\DlEmailregistration\Domain\Model\Emailregistration');
			$emailregistration->setIsTenant(($type == 'tenant')?true:false);
			$emailregistration->setIsLandlord(($type == 'landlord')?true:false);
			$emailregistration->setEmailAddress($email);
			$emailregistration->setPid($pid);
            $this->emailregistrationRepository->add($emailregistration);
            $this->persistenceManager->persistAll();
            $this->data['success'] = 1;
            $this->data['message'] = 'Din mejl är nu registrerad';
		}
		elseif($isAlreadyRegistered>0) {
			$this->data['success'] = 0;
			$this->data['message'] = 'Din mejl är redan registrerad';	
		}
		$this->data['type'] = $type;
		$this->data['status'] = $status;
		$this->data['email'] = $email;
	}

	/**
	 * Generic Ajax action
	 * Calls method named in parameter command, which then can use the arguments in parameter arguments.
	 *
	 * @return json
	 */
	public function getJsonAction() {

		$this->command = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('command');
		$this->arguments = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('arguments');

		if ( method_exists( $this, $this->command ) ) {
			$this->{$this->command}();
		} else {
			$this->message = 'Call to non-existing function (' . $this->command . ')';
		}
	    return ($this->asJson) ? $this->generateJsonReturnArray() : $this->data;
				//return $this->generateJsonReturnArray();
	}
}
