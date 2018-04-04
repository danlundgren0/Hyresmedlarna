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
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $frontendUserGroupRepository; 


    /**
     * action loginbox
     *
     * @return void
     */
    public function loginboxAction()
    {
        //$this->rackfishsolution();
        //return;
    	$userGroupsUids = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlbankid_bankid.']['settings.']['feusergroupsuid'];
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'this->frontendUserGroupRepository' => $this->frontendUserGroupRepository,
 )
);
		if(strlen($userGroupsUids)==0) {
			return;
		}
		$userGroups2Res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'fe_groups', 'uid="2" AND hidden=0 AND deleted=0');
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($userGroups2Res)) {
            $userGroups2[] = $row;
        }
		$userGroupsUids = explode(',',$userGroupsUids);
    	$userGroups = $this->frontendUserGroupRepository->findByUid(2);
    	$feuserlandingpage = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlbankid_bankid.']['settings.']['feuserlandingpage'];
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'userGroupsUids' => $userGroupsUids,
  'userGroups2' => $userGroups2,
  'userGroups' => $userGroups,
  'feuserlandingpage' => $feuserlandingpage,
 )
);
    	$this->view->assign('userGroups', $userGroups);
    	$this->view->assign('feuserlandingpage', $feuserlandingpage);
    }

    public function rackfishsolution()
    {
        /*
        curl -v https://appapi2.test.bankid.com/rp/v5 --cacert /srv/sites/hyresmedlarna_dev.se/certs/bankid_cacert.crt --cert /srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.crt --key /srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.key
        */

        $url = 'https://appapi2.test.bankid.com/rp/v5/sign';
        $caCert = '/srv/sites/hmdev.se/certs/bankid_cacert.crt';
        $cert = '/srv/sites/hmdev.se/certs/bankid_cert.crt';
        $key = '/srv/sites/hmdev.se/certs/bankid_cert.key';
        $clientIp = $this->getClientIp();
        $userVisibleData = base64_encode('DansTest');
        $postData = [
            'personalNumber' => '195806152368',
            'endUserIp' => $clientIp,
            'userVisibleData' => $userVisibleData
        ];
        $postJson = json_encode($postData);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CAINFO, $caCert);
        curl_setopt($ch, CURLOPT_SSLCERT, $cert);
        curl_setopt($ch, CURLOPT_SSLKEY, $key);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postJson),
                'SOAPAction: ""'
            ]);
        $response = curl_exec($ch);
        $return = curl_getinfo($ch);
        $this->curl_errorno = curl_errno($ch);
        if ($this->curl_errorno == CURLE_OK) {
            $this->curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        $this->curl_errormsg = curl_error($ch);
        $jsonDecodedResponse = json_decode($response);

        //isset($jsonDecodedResponse) && property_exists($jsonDecodedResponse,'orderRef')
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'raw response' => $response,
                'orderRef response' => $jsonDecodedResponse->orderRef,
                'isset response' => isset($jsonDecodedResponse),
                'property_exists response' => property_exists($jsonDecodedResponse,'orderRef'),
                'json_decode response' => json_decode($response),
                'json_decode response' => json_decode($response),
                'json_encode response' => json_encode($response),
                'return' => $return,
                'curl_errorno' => $this->curl_errorno,
                'CURLINFO_HTTP_CODE' => curl_getinfo($ch, CURLINFO_HTTP_CODE)
            ]
        );
        $this->collect($jsonDecodedResponse->orderRef);
        //Close connection
        curl_close($ch);
    }

    private function collect($orderRef) {
        $url = 'https://appapi2.test.bankid.com/rp/v5/collect';
        $caCert = '/srv/sites/hmdev.se/certs/bankid_cacert.crt';
        $cert = '/srv/sites/hmdev.se/certs/bankid_cert.crt';
        $key = '/srv/sites/hmdev.se/certs/bankid_cert.key';
        $clientIp = $this->getClientIp();
        $userVisibleData = base64_encode('DansTest');
        $postData = [
            'orderRef' => $orderRef
        ];
        $postJson = json_encode($postData);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CAINFO, $caCert);
        curl_setopt($ch, CURLOPT_SSLCERT, $cert);
        curl_setopt($ch, CURLOPT_SSLKEY, $key);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postJson),
                'SOAPAction: ""'
            ]);
        //(('{"orderRef":"20652c4b-d841-4ae1-8cbd-7196a90f20c0","status":"pending","hintCode":"outstandingTransaction"}'))
        //(('{"orderRef":"20652c4b-d841-4ae1-8cbd-7196a90f20c0","status":"pending","hintCode":"userSign"}'))
        //(('{"orderRef":"20652c4b-d841-4ae1-8cbd-7196a90f20c0","status":"complete","hintCode":"outstandingTransaction"}'))

        //completionData - stdclass : user - stdclass : properties - personalNumber:'195806152368', name:'Dan Lundgren', givenName:'Dan', surname:'Lundgren'
        for($i=0;;$i++) {
            $status = '';
            $response = curl_exec($ch);
            if($response!==false) {
                $response = json_decode($response);    
            }        
            if(isset($response) && property_exists($response, 'status')) {
                $status = $response->status;
                if($status == 'pending') {
                    sleep(2);
                }
                else {
                    return $response;    
                }                
            }
        }
        
/*\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'response' => $response,
 )
);*/
    }

    /**
     * action call
     *
     * @return void
     */
    public function callAction()
    {
        //$this->rackfishsolution();
        //return;
        //$wdsl = 'https://appapi.test.bankid.com/rp/v4?wsdl';
        $wdsl = 'https://appapi2.bankid.com/rp/v5';
        $passphrase = 'XkgCQui0';
        $certPath = '/srv/sites/hyresmedlarna_dev.se/certs/concat_cert.pem';
        $this->client = new \SoapClient($wdsl, ['local_cert' => $wdsl, 'cache_wsdl' => 0, 'trace' => 1]);
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
