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

    public function rackfishsolution() {
        /*
        curl -v https://appapi2.test.bankid.com/rp/v5 --cacert /srv/sites/hyresmedlarna_dev.se/certs/bankid_cacert.crt --cert /srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.crt --key /srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.key
        */
        $url = 'https://appapi2.test.bankid.com/rp/v5/sign';
        $caCert = '/srv/sites/hyresmedlarna_dev.se/certs/bankid_cacert.crt';
        $cert = '/srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.crt';
        $key = '/srv/sites/hyresmedlarna_dev.se/certs/bankid_cert.key';
        $clientIp = $this->getClientIp();
        $userVisibleData = base64_encode('DansTest');
	    $postData = array(
	        'personalNumber' => '195806152368',
	        'endUserIp' => $clientIp,
	        'userVisibleData' => $userVisibleData
	    );
	    $postJson = json_encode($postData);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CAINFO, $caCert);
        curl_setopt($ch, CURLOPT_SSLCERT, $cert);        
        curl_setopt($ch, CURLOPT_SSLKEY, $key);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($postJson),
			'SOAPAction: ""'
		));
        $response = curl_exec ($ch);
        $return = curl_getinfo($ch);
        $this->curl_errorno = curl_errno($ch); 
        if ($this->curl_errorno == CURLE_OK) {
            $this->curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        $this->curl_errormsg  = curl_error($ch);
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'response' => json_decode($response),
  'return' => $return,
  'curl_errorno' => $this->curl_errorno,
  'CURLINFO_HTTP_CODE' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
 )
);
        //Close connection
       curl_close($ch);
    }
    /**
     * action call
     * @return void
     */
    public function callAction()
    {
        $this->rackfishsolution();
        return;
        //$wdsl = 'https://appapi.test.bankid.com/rp/v4?wsdl';
        $wdsl = 'https://appapi2.bankid.com/rp/v5';
	      $passphrase = 'XkgCQui0';
        $certPath = '/srv/sites/hyresmedlarna_dev.se/certs/concat_cert.pem';
        $this->client = new \SoapClient(
            $wdsl, 
	       array("local_cert" => $wdsl, "cache_wsdl" => 0, "trace" => 1)
        );
    }
    private function getClientIp() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
    }
}
