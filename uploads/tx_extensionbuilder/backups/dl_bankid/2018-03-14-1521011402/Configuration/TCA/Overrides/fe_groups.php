<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['fe_groups']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_groups']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_dlbankid_fe_groups = [];
    $tempColumnstx_dlbankid_fe_groups[$GLOBALS['TCA']['fe_groups']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['FeUser','Tx_DlBankid_FeUser']
            ],
            'default' => 'Tx_DlBankid_FeUser',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $tempColumnstx_dlbankid_fe_groups);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_groups',
    $GLOBALS['TCA']['fe_groups']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_groups']['ctrl']['label']
);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['fe_groups']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlBankid_FeUser']['showitem'] = $GLOBALS['TCA']['fe_groups']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_groups']['types'])) {
    // use first entry in types array
    $fe_groups_type_definition = reset($GLOBALS['TCA']['fe_groups']['types']);
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlBankid_FeUser']['showitem'] = $fe_groups_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_groups']['types']['Tx_DlBankid_FeUser']['showitem'] = '';
}
$GLOBALS['TCA']['fe_groups']['types']['Tx_DlBankid_FeUser']['showitem'] .= ',--div--;LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dlbankid_domain_model_feuser,';
$GLOBALS['TCA']['fe_groups']['types']['Tx_DlBankid_FeUser']['showitem'] .= '';

$GLOBALS['TCA']['fe_groups']['columns'][$GLOBALS['TCA']['fe_groups']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:fe_groups.tx_extbase_type.Tx_DlBankid_FeUser','Tx_DlBankid_FeUser'];
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder