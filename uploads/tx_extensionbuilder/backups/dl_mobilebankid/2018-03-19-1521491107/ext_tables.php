<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlMobilebankid',
            'Mobilebankid',
            'MobileBankId'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlMobilebankid',
            'Ajaxrequest',
            'Ajax Request'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_mobilebankid', 'Configuration/TypoScript', 'MobileBankId');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlmobilebankid_domain_model_mobilebankid', 'EXT:dl_mobilebankid/Resources/Private/Language/locallang_csh_tx_dlmobilebankid_domain_model_mobilebankid.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlmobilebankid_domain_model_mobilebankid');

    }
);
