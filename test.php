<?php
try {
    $client = new SoapClient('https://appapi2.test.bankid.com/rp/v4?wsdl',
        ["local_cert" => "../certs/certname.pem",
         "stream_context" => [
             "ssl" => [
                 "verify_peer" => false,
                 "verify_peer_name" => false,
                 "allow_self_signed" => true
             ]
         ]
     ]);
} catch (Exception $e) {
    return json_encode( array( "result" => false, "reason" => $e->getMessage() ) );
}
?>
