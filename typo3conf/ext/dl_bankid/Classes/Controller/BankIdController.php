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
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'function' => 'mobileBankIdAction',
 )
);
    }

    /**
     * action fileBankId
     *
     * @param DanLundgren\DlBankid\Domain\Model\BankId
     * @return void
     */
    public function fileBankIdAction()
    {
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'fileBankIdAction' => 'fileBankIdAction',
 )
);
    }

    /**
     * action sign
     *
     * @return void
     */
    public function signAction()
    {
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'signAction' => 'signAction',
 )
);
    }

    /**
     * action collect
     *
     * @return void
     */
    public function collectAction()
    {
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'collectAction' => 'collectAction',
 )
);
    }

    public function curlTest() {

        $wdsl = 'https://appapi2.test.bankid.com/rp/v4?wsdl';
        $certPath = '/srv/sites/hmdev.se/web/mytestcert.pem';
        $passphrase = 'XkgCQui0';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $wdsl); //Load from datasource
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', 'SOAPAction: ""'));
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
 
        //SSL
        //curl_setopt($ch, CURLOPT_SSLVERSION, 3); //=3
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLCERT, $certPath);
        //curl_setopt($ch, CURLOPT_SSLKEY, $certPath);
        curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
        //curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $passphrase); //Load from datasource
        //Parse cURL response
        $response            = curl_exec ($ch);
        $this->curl_errorno  = curl_errno($ch);
 
        if ($this->curl_errorno == CURLE_OK) {
            $this->curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        $this->curl_errormsg  = curl_error($ch);
print_r($response);
 \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
  array(
   'class' => __CLASS__,
   'function' => __FUNCTION__,
   'response' => $response,
   'curl_errorno' => $this->curl_errorno,
   'curl_errormsg' => $this->curl_errormsg,
  )
 );
        //Close connection
       curl_close($ch);
    }

    /**
     * action call
     *
     * @return void
     */
    public function callAction()
    {

      //header("Cache-Control: no-cache, no-store");
        /*
        //THIS TEST WORKS
        $this->client = new \SoapClient(
          "http://www.webservicex.com/CurrencyConvertor.asmx?wsdl", 
          array("local_cert" => "FPTestcert2_20150818_102329.pfx", "passphrase" => "hR1392&MdaroS", "trace" => 1)
        );
        */
        $wdsl = 'https://appapi2.test.bankid.com/rp/v4?wsdl';
        $certPath = '/srv/sites/hmdev.se/web/mytestcert.pem';
        $passphrase = 'XkgCQui0';
/*        
        $context_options = array(
            'ssl' => array(
                'verify_peer'   => true,
                'cafile'        => $certPath,
                'verify_depth'  => 5,
                'CN_match'      => 'BankID SSL Root Certification Authority TEST',
                'disable_compression'   => true,
                'SNI_enabled'           => true,
                'ciphers'               => 'ALL!EXPORT!EXPORT40!EXPORT56!aNULL!LOW!RC4'
            )
        );
        $ssl_context = stream_context_create($context_options);
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'ssl_context' => $ssl_context,
 )
);
        // Connect and store our SOAP connection.
        $this->client = new \SOAPClient( $wdsl, array(
            'local_cert' => $certPath,
            'stream_context' => $ssl_context
        ) );

*/
        /*
        $this->client = new \SoapClient(
          $wdsl, 
          array("local_cert" => $certPath, "passphrase" => $passphrase, "trace" => 1)
        );
        */

        /*        
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ],
        ]);
        $options['stream_context'] = $context;
        $this->client = new \SoapClient($wdsl, $options);
        */

        //$this->client = new SoapClient( $this->wsdl, array( "local_cert" => "/path_to_cert/certname.pem" ) );
        try {
          $this->client = new \SoapClient($wdsl,
              ["local_cert" => $certPath,
               "stream_context" => [
                   "ssl" => [
                       "verify_peer" => false,
                       "verify_peer_name" => false,
                       "allow_self_signed" => true
                   ]
               ]
           ]);          
        }
        catch (Exception $e) {
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'getMessage' => $e->getMessage(),
 )
);
        }

        
        $this->status = "ok";
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'this->client' => $this->client,
  'this->status' => $this->status,
 )
);
    }
}
