<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlRealestate',
            'Realestate',
            'Realestate'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_realestate', 'Configuration/TypoScript', 'Real Estate');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlrealestate_domain_model_realestate', 'EXT:dl_realestate/Resources/Private/Language/locallang_csh_tx_dlrealestate_domain_model_realestate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlrealestate_domain_model_realestate');

    }
);
