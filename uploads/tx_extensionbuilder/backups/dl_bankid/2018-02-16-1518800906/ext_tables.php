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

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_bankid', 'Configuration/TypoScript', 'BankID');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlbankid_domain_model_bankid', 'EXT:dl_bankid/Resources/Private/Language/locallang_csh_tx_dlbankid_domain_model_bankid.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlbankid_domain_model_bankid');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder