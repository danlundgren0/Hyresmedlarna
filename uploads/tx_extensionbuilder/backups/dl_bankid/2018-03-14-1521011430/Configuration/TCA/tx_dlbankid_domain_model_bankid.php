<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid',
        'label' => 'live_mode_enabled',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'live_mode_enabled,ca_cert,local_cert,pri_key,appapi_url,personal_number,user_visible_data,curl_init,order_ref,auto_start_token,status',
        'iconfile' => 'EXT:dl_bankid/Resources/Public/Icons/tx_dlbankid_domain_model_bankid.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, live_mode_enabled, ca_cert, local_cert, pri_key, appapi_url, personal_number, user_visible_data, curl_init, order_ref, auto_start_token, status',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, live_mode_enabled, ca_cert, local_cert, pri_key, appapi_url, personal_number, user_visible_data, curl_init, order_ref, auto_start_token, status, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_dlbankid_domain_model_bankid',
                'foreign_table_where' => 'AND tx_dlbankid_domain_model_bankid.pid=###CURRENT_PID### AND tx_dlbankid_domain_model_bankid.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'live_mode_enabled' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.live_mode_enabled',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'ca_cert' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.ca_cert',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'local_cert' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.local_cert',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pri_key' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.pri_key',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'appapi_url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.appapi_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'personal_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.personal_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'user_visible_data' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.user_visible_data',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'curl_init' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.curl_init',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'order_ref' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.order_ref',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'auto_start_token' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.auto_start_token',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_bankid.status',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    
    ],
];
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder