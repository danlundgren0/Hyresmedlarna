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
        $params = 'personalNumber=195806152368&endUserIp='.$clientIp.'&userVisibleData='.$userVisibleData;

	    $postData = array(
	        'personalNumber' => '195806152368',
	        'endUserIp' => $clientIp,
	        'userVisibleData' => $userVisibleData
	    );
	    $postJson = json_encode($postData);

        $urlWParams = $url.'?'.$params;
        $ch = curl_init($url);
        //curl_setopt($ch, CURLOPT_URL, $urlWParams);
        curl_setopt($ch, CURLOPT_CAINFO, $caCert);
        curl_setopt($ch, CURLOPT_SSLCERT, $cert);        
        curl_setopt($ch, CURLOPT_SSLKEY, $key);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		//curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        //curl_setopt($ch, CURLSSH_AUTH_PUBLICKEY,$key);

        //Genererar: response => TRUE om 0
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);

        //curl_setopt($ch, CURLOPT_HEADER, 1);
        //curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'SOAPAction: ""'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($postJson),
			'SOAPAction: ""'
		));
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        //curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
 
        //SSL
        //Genererar: curl_errno=35 (Unknown SSL protocol error in connection to [secure site]:443)
        //curl_setopt($ch, CURLOPT_SSLVERSION, 3); //=3
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        //Genererar: response => '{"errorCode":"notFound"}'
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

/* TESTA DETTA
curl_setopt($curl, CURLOPT_URL, $this->url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSLCERT, $this->keystore);
curl_setopt($curl, CURLOPT_CAINFO, $this->keystore);
curl_setopt($curl, CURLOPT_SSLKEYPASSWD, $this->keystorepassword);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
*/
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
  'HTTP_CLIENT_IP' => $_SERVER['HTTP_CLIENT_IP'],
  'HTTP_X_FORWARDED_FOR' => $_SERVER['HTTP_X_FORWARDED_FOR'],
  'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'],
 )
);

\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'response' => $response,
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
