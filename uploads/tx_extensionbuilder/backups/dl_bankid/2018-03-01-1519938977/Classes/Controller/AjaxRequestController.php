<?php
namespace DanLundgren\DlBankid\Controller;

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
	 * liveCert
	 *
	 * @var string
	 */
	protected $liveCert = "mittcertifikat.pem";

	/**
	 * testCert
	 *
	 * @var string
	 */
	protected $testCert = "mittcertifikat.pem";

	/**
	 * passPhrase
	 *
	 * @var string
	 */
	protected $passPhrase = "lösenord du angav i java-appen";

	/**
	 * appapiTestUrl
	 *
	 * @var string
	 */
	protected $appapiTestUrl = "";

	/**
	 * appapiLiveUrl
	 *
	 * @var string
	 */
	protected $appapiLiveUrl = "";

	/**
	 * liveModeEnabled
	 *
	 * @var boolean
	 */
	protected $liveModeEnabled = FALSE;


	/**
	 * fileCollectionRepository
	 *
	 * @var \TYPO3\CMS\Core\Resource\FileCollectionRepository
	 */
	protected $fileCollectionRepository;

	public function trySign() {
		//CertName
		//FPTestcert2_20150818_102329.pfx
        $extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['dl_bankid']);
        //$backendConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'];
		//$backendConfiguration = (bool)\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('dl_bankid');
        $this->liveModeEnabled = $extensionConfiguration['livemodeenabled'];
        $this->liveCert = $extensionConfiguration['livecert'];
        $this->testCert = $extensionConfiguration['testcert'];
        $this->passPhrase = $extensionConfiguration['passphrase'];
        $this->appapiTestUrl = $extensionConfiguration['appapitesturl'];
        $this->appapiLiveUrl = $extensionConfiguration['appapiliveurl'];

		$mess = $this->arguments['mess'].' på dig också';
		$this->data['livemodeenabled'] = $this->liveModeEnabled;
		$this->data['liveCert'] = $this->liveCert;
		$this->data['testCert'] = $this->testCert;
		$this->data['passPhrase'] = $this->passPhrase;
		$this->data['appapiTestUrl'] = $this->appapiTestUrl;
		$this->data['appapiLiveUrl'] = $this->appapiLiveUrl;

        $this->data['message'] = $mess;
        $this->data['success'] = 1;
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
	/**
	 * generateJsonReturnArray
	 * Used to return result in a predefined way to calling javascript
	 *
	 * @return json
	 */
	private function generateJsonReturnArray() {
		return json_encode(array (
				'status' => $this->status,
				'data' => $this->data,
				'message' => $this->message,
		));
	}
}
