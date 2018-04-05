<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlPersonalinformation',
            'Personalinformation',
            'Personalinformation'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_personalinformation', 'Configuration/TypoScript', 'Personal information');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlpersonalinformation_domain_model_personalinformation', 'EXT:dl_personalinformation/Resources/Private/Language/locallang_csh_tx_dlpersonalinformation_domain_model_personalinformation.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlpersonalinformation_domain_model_personalinformation');

    }
);
