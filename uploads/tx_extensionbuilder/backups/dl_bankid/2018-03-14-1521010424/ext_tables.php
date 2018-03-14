<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlBankid',
            'Bankid',
            'BankId'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlBankid',
            'Ajaxrequest',
            'Ajax Request'
        );

        $pluginSignature = str_replace('_', '', 'dl_bankid') . '_ajaxrequest';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_bankid/Configuration/FlexForms/flexform_ajaxrequest.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_bankid', 'Configuration/TypoScript', 'BankID');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlbankid_domain_model_bankid', 'EXT:dl_bankid/Resources/Private/Language/locallang_csh_tx_dlbankid_domain_model_bankid.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlbankid_domain_model_bankid');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlbankid_domain_model_feuser', 'EXT:dl_bankid/Resources/Private/Language/locallang_csh_tx_dlbankid_domain_model_feuser.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlbankid_domain_model_feuser');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder