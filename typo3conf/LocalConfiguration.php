<?php
return [
    'BE' => [
        'debug' => false,
        'explicitADmode' => 'explicitAllow',
        'installToolPassword' => '$pbkdf2-sha256$25000$xgbyY/lvY4cLr.tga3oljQ$zdZstjx8Ba2XsDfq6nkt0wnjIV77cmaQr4xrAfzAVig',
        'loginSecurityLevel' => 'rsa',
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8',
                'dbname' => 'hmdev_s',
                'driver' => 'mysqli',
                'host' => '127.0.0.1',
                'password' => 'jFr3wk3jUu',
                'port' => 3306,
                'user' => 'hmdev_s',
            ],
        ],
    ],
    'EXT' => [
        'extConf' => [
            'bootstrap_grids' => 'a:1:{s:19:"enableGridSimpleRow";s:1:"0";}',
            'bootstrap_package' => 'a:7:{s:16:"disablePageTsRTE";s:1:"0";s:27:"disablePageTsBackendLayouts";s:1:"0";s:20:"disablePageTsTCEMAIN";s:1:"0";s:20:"disablePageTsTCEFORM";s:1:"0";s:30:"disablePageTsTtContentPreviews";s:1:"0";s:36:"disablePageTsNewContentElementWizard";s:1:"0";s:21:"disableLessProcessing";s:1:"0";}',
            'dl_bankid' => 'a:1:{s:9:"appapiurl";s:38:"https://appapi2.test.bankid.com/rp/v5/";}',
            'dl_danstmpl' => 'a:0:{}',
            'dl_emailregistration' => 'a:0:{}',
            'dl_mobilebankid' => 'a:1:{s:9:"appapiurl";s:38:"https://appapi2.test.bankid.com/rp/v5/";}',
            'dl_realestate' => 'a:0:{}',
            'extension_builder' => 'a:3:{s:15:"enableRoundtrip";s:1:"1";s:15:"backupExtension";s:1:"1";s:9:"backupDir";s:0:"";}',
            'gridelements' => 'a:2:{s:20:"additionalStylesheet";s:0:"";s:19:"nestingInListModule";s:1:"0";}',
            'introduction' => 'a:0:{}',
            'ke_search' => 'a:11:{s:20:"multiplyValueToTitle";s:1:"1";s:16:"searchWordLength";s:1:"4";s:16:"enablePartSearch";s:1:"1";s:17:"enableExplicitAnd";s:1:"0";s:18:"finishNotification";s:1:"0";s:21:"notificationRecipient";s:0:"";s:18:"notificationSender";s:19:"no_reply@domain.com";s:19:"notificationSubject";s:32:"[KE_SEARCH INDEXER NOTIFICATION]";s:13:"pathPdftotext";s:9:"/usr/bin/";s:11:"pathPdfinfo";s:9:"/usr/bin/";s:10:"pathCatdoc";s:9:"/usr/bin/";}',
            'realurl' => 'a:6:{s:10:"configFile";s:26:"typo3conf/realurl_conf.php";s:14:"enableAutoConf";s:1:"1";s:14:"autoConfFormat";s:1:"0";s:17:"segTitleFieldList";s:0:"";s:12:"enableDevLog";s:1:"0";s:10:"moduleIcon";s:1:"0";}',
            'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
            'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
            'scheduler' => 'a:4:{s:11:"maxLifetime";s:4:"1440";s:11:"enableBELog";s:1:"1";s:15:"showSampleTasks";s:1:"1";s:11:"useAtdaemon";s:1:"0";}',
        ],
    ],
    'FE' => [
        'debug' => false,
        'loginSecurityLevel' => 'rsa',
    ],
    'GFX' => [
        'jpg_quality' => '80',
        'processor' => 'GraphicsMagick',
        'processor_allowTemporaryMasksAsPng' => false,
        'processor_colorspace' => 'RGB',
        'processor_effects' => -1,
        'processor_enabled' => true,
        'processor_path' => '/usr/bin/',
        'processor_path_lzw' => '/usr/bin/',
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/sbin/sendmail -t -i',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'extbase_object' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'frontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend',
                    'groups' => [
                        'system',
                    ],
                    'options' => [
                        'defaultLifetime' => 0,
                    ],
                ],
            ],
        ],
        'devIPmask' => '',
        'displayErrors' => 0,
        'enableDeprecationLog' => false,
        'encryptionKey' => 'b71ae250a621d431d0c808f37c192edafbe6c8aef262f41c8b917c4601e68182630efd56f3ccc5ada1f7632dd066ede0',
        'exceptionalErrors' => 20480,
        'isInitialDatabaseImportDone' => true,
        'isInitialInstallationInProgress' => false,
        'sitename' => 'Hyresmedlarna',
        'sqlDebug' => 0,
        'systemLogLevel' => 2,
    ],
];
