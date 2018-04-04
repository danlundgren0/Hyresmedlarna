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
 * MobileBankId
 */
class MobileBankId extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{

    /**
     * __construct
     */
    public function __construct($meth, $data) {
        $settings = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.'];
        $extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['dl_mobilebankid']);
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

    private function createFeUser($userData){
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
            //curl_close($this->curlInit);
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

}
