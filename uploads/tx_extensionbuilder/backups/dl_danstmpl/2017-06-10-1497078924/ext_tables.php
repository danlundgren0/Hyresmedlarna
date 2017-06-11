<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_danstmpl', 'Configuration/TypoScript', 'Danstmpl');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dldanstmpl_domain_model_danstmpl', 'EXT:dl_danstmpl/Resources/Private/Language/locallang_csh_tx_dldanstmpl_domain_model_danstmpl.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dldanstmpl_domain_model_danstmpl');

    }
);
