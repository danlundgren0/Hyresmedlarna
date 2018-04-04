<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['fe_groups']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_groups']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_dlmobilebankid_fe_groups = [];
    $tempColumnstx_dlmobilebankid_fe_groups[$GLOBALS['TCA']['fe_groups']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['CustomFrontendUserGroup','Tx_DlMobilebankid_CustomFrontendUserGroup']
            ],
            'default' => 'Tx_DlMobilebankid_CustomFrontendUserGroup',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $tempColumnstx_dlmobilebankid_fe_groups);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_groups',
    $GLOBALS['TCA']['fe_groups']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_groups']['ctrl']['label']
);

$tmp_dl_mobilebankid_columns = [

    'user_type' => [
        'exclude' => true,
        'label' => 'LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid_domain_model_customfrontendusergroup.user_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['-- Label --', 0],
            ],
            'size' => 1,
            'maxitems' => 1,
            'eval' => ''
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups',$tmp_dl_mobilebankid_columns);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['fe_groups']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlMobilebankid_CustomFrontendUserGroup']['showitem'] = $GLOBALS['TCA']['fe_groups']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_groups']['types'])) {
    // use first entry in types array
    $fe_groups_type_definition = reset($GLOBALS['TCA']['fe_groups']['types']);
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlMobilebankid_CustomFrontendUserGroup']['showitem'] = $fe_groups_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlMobilebankid_CustomFrontendUserGroup']['showitem'] = '';
}
$GLOBALS['TCA']['fe_groups']['types']['Tx_DlMobilebankid_CustomFrontendUserGroup']['showitem'] .= ',--div--;LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dlmobilebankid_domain_model_customfrontendusergroup,';
$GLOBALS['TCA']['fe_groups']['types']['Tx_DlMobilebankid_CustomFrontendUserGroup']['showitem'] .= 'user_type';

$GLOBALS['TCA']['fe_groups']['columns'][$GLOBALS['TCA']['fe_groups']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:fe_groups.tx_extbase_type.Tx_DlMobilebankid_CustomFrontendUserGroup','Tx_DlMobilebankid_CustomFrontendUserGroup'];
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
$GLOBALS['TCA']['fe_groups']['columns']['user_type']['config']['items'] = array(
   ['-Not set', 0],
   ['Tenant', 1],
   ['Landlord', 2] 
);