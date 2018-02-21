<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlBankid',
            'Loginform',
            'LoginForm'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_bankid', 'Configuration/TypoScript', 'BankID');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlbankid_domain_model_loginform', 'EXT:dl_bankid/Resources/Private/Language/locallang_csh_tx_dlbankid_domain_model_loginform.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlbankid_domain_model_loginform');

    }
);
