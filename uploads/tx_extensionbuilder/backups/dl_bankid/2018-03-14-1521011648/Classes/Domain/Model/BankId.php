<?php
namespace DanLundgren\DlBankid\Domain\Model;
namespace TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
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
 * LoginForm
 */
class BankId extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     * @inject
     */
    protected $frontendUserRepository;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $frontendUserGroupRepository; 

    /**
     * Check this in extension conf
     *
     * @var bool
     */
    protected $liveModeEnabled = false;

    /**
     * public certificate
     *
     * @var string
     */
    protected $caCert = '';

    /**
     * local certificate
     *
     * @var string
     */
    protected $localCert = '';

    /**
     * private key
     *
     * @var string
     */
    protected $priKey = '';

    /**
     * appapiUrl
     *
     * @var string
     */
    protected $appapiUrl = '';

    /**
     * personalNumber
     *
     * @var string
     */
    protected $personalNumber = '';

    /**
     * userVisibleData
     *
     * @var string
     */
    protected $userVisibleData = '';

    /**
     * curlInit
     *
     * @var string
     */
    protected $curlInit = '';

    /**
     * orderRef
     *
     * @var string
     */
    protected $orderRef = '';

    /**
     * autoStartToken
     *
     * @var string
     */
    protected $autoStartToken = '';

    /**
     * status
     *
     * @var string
     */
    protected $status = '';

    /**
     * __construct
     */
    public function __construct($meth, $data) {
        $settings = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlbankid_bankid.']['settings.'];
        $extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['dl_bankid']);
        $this->caCert = $settings['cacert'];
        $this->localCert = $settings['localcert'];
        $this->priKey = $settings['prikey'];
        $this->appapiUrl = $extensionConfiguration['appapiurl'];
        if($meth=='sign') {
            //TODO: Send personalNumber in AJAX call
            //$this->personalNumber = $data;
            $this->personalNumber = '195806152368';
            $this->userVisibleData = base64_encode($settings['uservisibledata']);
            //$this->userVisibleData = base64_encode($extensionConfiguration['uservisibledata']);
            $this->initConnection('sign');
        }
        elseif($meth=='collect') {
            $this->orderRef = $data;
            $this->initConnection('collect');
        }
    }
    /*
    private function createOrLoginFeUser($userData){
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $persistenceManager = $objectManager->get('TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface');
        $frontendUser = $this->frontendUserRepository->findByUsername($userData['personalNumber']);
        if(!$frontendUser) {
            $frontendUser = new FrontendUser();
            $frontendUser->setUsername($userData['personalNumber']);
            $frontendUser->setName($userData['name']);
            $frontendUser->setFirstName($userData['givenName']);
            $frontendUser->setLastName($userData['surname']);
            $frontendUser->setPassword(base64_encode($userData['personalNumber']));
            $frontendUser->add($report);
            $persistenceManager->persistAll();  
        }
        if($frontendUser) {
            
        }
    }
    */
    public function sign() {
        if($this->curlInit==NULL) {
            $this->initConnection('sign');
        }
        $postData = [
            'personalNumber' => $this->personalNumber,
            'endUserIp' => $this->getClientIp(),
            'userVisibleData' => $this->userVisibleData
        ];
        $postJson = json_encode($postData);
        curl_setopt($this->curlInit, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($this->curlInit, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postJson),
            'SOAPAction: ""'
        ]);
        $response = curl_exec($this->curlInit);
        if($response!==false) {
            $response = json_decode($response);
            curl_close($this->curlInit);
            return $response;  
        }

        /*        
        if(isset($response) && property_exists($response, 'orderRef')) {
            $this->orderRef = $response->orderRef;
            curl_close($this->curlInit);
            $loginStatus = $this->collect();
            return $loginStatus;
        }
        */
        
    }
    public function collect() {
        $this->initConnection('collect');
        $postData = [
            'orderRef' => $this->orderRef
        ];
        $postJson = json_encode($postData);
        curl_setopt($this->curlInit, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($this->curlInit, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postJson),
            'SOAPAction: ""'
        ]);
        $response = curl_exec($this->curlInit);
        if($response!==false) {
            $response = json_decode($response);    
        }        
        curl_close($this->curlInit);
        if(isset($response) && property_exists($response, 'status')) {
            curl_close($this->curlInit);
            return $response;    
            /*$status = $response->status;
            if($status == 'pending') {
                sleep(2);
            }
            else {
                curl_close($this->curlInit);
                return $response;    
            }
            */
        }
    }    
    private function initConnection($meth) {        
        $this->curlInit = curl_init();
        curl_setopt($this->curlInit, CURLOPT_URL, $this->appapiUrl.$meth);
        curl_setopt($this->curlInit, CURLOPT_CAINFO, $this->caCert);
        curl_setopt($this->curlInit, CURLOPT_SSLCERT, $this->localCert);
        curl_setopt($this->curlInit, CURLOPT_SSLKEY, $this->priKey);
        curl_setopt($this->curlInit, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->curlInit, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->curlInit, CURLOPT_RETURNTRANSFER, true);
        $return = curl_getinfo($this->curlInit);
        //curl_setopt($ch, CURLOPT_POST, true);
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

    /**
     * Returns the liveModeEnabled
     *
     * @return bool $liveModeEnabled
     */
    public function getLiveModeEnabled()
    {
        return $this->liveModeEnabled;
    }

    /**
     * Sets the liveModeEnabled
     *
     * @param bool $liveModeEnabled
     * @return void
     */
    public function setLiveModeEnabled($liveModeEnabled)
    {
        $this->liveModeEnabled = $liveModeEnabled;
    }

    /**
     * Returns the boolean state of liveModeEnabled
     *
     * @return bool
     */
    public function isLiveModeEnabled()
    {
        return $this->liveModeEnabled;
    }

    /**
     * Returns the caCert
     *
     * @return string $caCert
     */
    public function getCaCert()
    {
        return $this->caCert;
    }

    /**
     * Sets the caCert
     *
     * @param string $caCert
     * @return void
     */
    public function setCaCert($caCert)
    {
        $this->caCert = $caCert;
    }

    /**
     * Returns the localCert
     *
     * @return string $localCert
     */
    public function getLocalCert()
    {
        return $this->localCert;
    }

    /**
     * Sets the localCert
     *
     * @param string $localCert
     * @return void
     */
    public function setLocalCert($localCert)
    {
        $this->localCert = $localCert;
    }

    /**
     * Returns the priKey
     *
     * @return string $priKey
     */
    public function getPriKey()
    {
        return $this->priKey;
    }

    /**
     * Sets the priKey
     *
     * @param string $priKey
     * @return void
     */
    public function setPriKey($priKey)
    {
        $this->priKey = $priKey;
    }

    /**
     * Returns the appapiUrl
     *
     * @return string $appapiUrl
     */
    public function getAppapiUrl()
    {
        return $this->appapiUrl;
    }

    /**
     * Sets the appapiUrl
     *
     * @param string $appapiUrl
     * @return void
     */
    public function setAppapiUrl($appapiUrl)
    {
        $this->appapiUrl = $appapiUrl;
    }

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

    /**
     * Returns the userVisibleData
     *
     * @return string $userVisibleData
     */
    public function getUserVisibleData()
    {
        return $this->userVisibleData;
    }

    /**
     * Sets the userVisibleData
     *
     * @param string $userVisibleData
     * @return void
     */
    public function setUserVisibleData($userVisibleData)
    {
        $this->userVisibleData = $userVisibleData;
    }

    /**
     * Returns the curlInit
     *
     * @return string $curlInit
     */
    public function getCurlInit()
    {
        return $this->curlInit;
    }

    /**
     * Sets the curlInit
     *
     * @param string $curlInit
     * @return void
     */
    public function setCurlInit($curlInit)
    {
        $this->curlInit = $curlInit;
    }

    /**
     * Returns the orderRef
     *
     * @return string $orderRef
     */
    public function getOrderRef()
    {
        return $this->orderRef;
    }

    /**
     * Sets the orderRef
     *
     * @param string $orderRef
     * @return void
     */
    public function setOrderRef($orderRef)
    {
        $this->orderRef = $orderRef;
    }

    /**
     * Returns the autoStartToken
     *
     * @return string $autoStartToken
     */
    public function getAutoStartToken()
    {
        return $this->autoStartToken;
    }

    /**
     * Sets the autoStartToken
     *
     * @param string $autoStartToken
     * @return void
     */
    public function setAutoStartToken($autoStartToken)
    {
        $this->autoStartToken = $autoStartToken;
    }

    /**
     * Returns the status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
