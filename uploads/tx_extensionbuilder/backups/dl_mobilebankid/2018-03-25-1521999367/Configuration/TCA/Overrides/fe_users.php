<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_dlmobilebankid_fe_users = [];
    $tempColumnstx_dlmobilebankid_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['CustomFrontendUser','Tx_DlMobilebankid_CustomFrontendUser']
            ],
            'default' => 'Tx_DlMobilebankid_CustomFrontendUser',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_dlmobilebankid_fe_users);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    $GLOBALS['TCA']['fe_users']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_dl_mobilebankid_columns = [

    'personal_number' => [
        'exclude' => true,
        'label' => 'LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid_domain_model_customfrontenduser.personal_number',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim'
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_dl_mobilebankid_columns);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_users']['types']['Tx_DlMobilebankid_CustomFrontendUser']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
    // use first entry in types array
    $fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
    $GLOBALS['TCA']['fe_users']['types']['Tx_DlMobilebankid_CustomFrontendUser']['showitem'] = $fe_users_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_users']['types']['Tx_DlMobilebankid_CustomFrontendUser']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_DlMobilebankid_CustomFrontendUser']['showitem'] .= ',--div--;LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid_domain_model_customfrontenduser,';
$GLOBALS['TCA']['fe_users']['types']['Tx_DlMobilebankid_CustomFrontendUser']['showitem'] .= 'personal_number';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_DlMobilebankid_CustomFrontendUser','Tx_DlMobilebankid_CustomFrontendUser'];
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder