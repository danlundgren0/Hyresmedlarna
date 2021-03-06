<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlSearchestates',
            'Searchestates',
            'Searchestates'
        );

        $pluginSignature = str_replace('_', '', 'dl_searchestates') . '_searchestates';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_searchestates/Configuration/FlexForms/flexform_searchestates.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_searchestates', 'Configuration/TypoScript', 'Search Estates');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlsearchestates_domain_model_searchestates', 'EXT:dl_searchestates/Resources/Private/Language/locallang_csh_tx_dlsearchestates_domain_model_searchestates.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlsearchestates_domain_model_searchestates');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder