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
	 * caCert
	 *
	 * @var string
	 */
	protected $caCert = "";

	/**
	 * localCert
	 *
	 * @var string
	 */
	protected $localCert = "";

	/**
	 * priKey
	 *
	 * @var string
	 */
	protected $priKey = "";

	/**
	 * appapiUrl
	 *
	 * @var string
	 */
	protected $appapiUrl = "";

	/**
	 * liveModeEnabled
	 *
	 * @var boolean
	 */
	protected $liveModeEnabled = FALSE;

	/**
	 * userVisibleData
	 *
	 * @var string
	 */
	protected $userVisibleData = "";

	/**
	 * personalNumber
	 *
	 * @var string
	 */
	protected $personalNumber = "";

	/**
	 * userVisibleData
	 *
	 * @var mixed
	 */	
	private $curlInit = NULL;


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
        if((int)$this->liveModeEnabled==1) {
        	$this->caCert = $extensionConfiguration['livecacert'];
        	$this->localCert  = $extensionConfiguration['livelocalcert'];
        	$this->priKey = $extensionConfiguration['liveprikey'];
        	$this->appapiUrl = $extensionConfiguration['appapiliveurl'];        	
        }
        else {
	        $this->caCert = $extensionConfiguration['testcacert'];
	        $this->localCert  = $extensionConfiguration['testlocalcert'];
	        $this->priKey = $extensionConfiguration['testprikey'];        	
	        $this->appapiUrl = $extensionConfiguration['appapitesturl'];
        }
        $this->personalNumber = '195806152368';
		$this->userVisibleData = base64_encode($extensionConfiguration['uservisibledata']);
		try {
			$this->data['liveModeEnabled'] = $this->liveModeEnabled;
			$responseAsJson = $this->initConnection();
			
			$mess = $this->arguments['mess'].' på dig också';
			$this->data['responseAsJson'] = $responseAsJson;
			$this->data['liveModeEnabled'] = $this->liveModeEnabled;
			$this->data['caCert'] = $this->caCert;
			$this->data['localCert'] = $this->localCert;
			$this->data['priKey'] = $this->priKey;
			$this->data['appapiUrl'] = $this->appapiUrl;
			$this->data['userVisibleData'] = $this->userVisibleData;
	        $this->data['message'] = $mess;
	        $this->data['success'] = 1;
		}
		catch (Exception $e) {
			$this->data['success'] = 0;
		}

	}
	private function sign() {
		if($this->curlInit==NULL) {
			$this->initConnection();
		}
	}
	private function initConnection() {
        $postData = [
            'personalNumber' => $this->personalNumber,
            'endUserIp' => $this->getClientIp(),
            'userVisibleData' => $this->userVisibleData
        ];
        $postJson = json_encode($postData);
        $this->curlInit = curl_init($this->appapiUrl.'sign');
        curl_setopt($this->curlInit, CURLOPT_CAINFO, $this->caCert);
        curl_setopt($this->curlInit, CURLOPT_SSLCERT, $this->localCert);
        curl_setopt($this->curlInit, CURLOPT_SSLKEY, $this->priKey);
        curl_setopt($this->curlInit, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->curlInit, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->curlInit, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($this->curlInit, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($this->curlInit, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postJson),
            'SOAPAction: ""'
        ]);
        $response = curl_exec($this->curlInit);
        return json_decode($response);
	}

	private function collect() {
		if($this->curlInit==NULL) {
			$this->initConnection();
		}

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
    private function getClientIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
