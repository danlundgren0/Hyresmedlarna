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

        $pluginSignature = str_replace('_', '', 'dl_realestate') . '_realestate';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_realestate/Configuration/FlexForms/flexform_realestate.xml');

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlRealestate',
            'Ajaxrequest',
            'Ajax Request'
        );

        $pluginSignature = str_replace('_', '', 'dl_realestate') . '_ajaxrequest';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_realestate/Configuration/FlexForms/flexform_ajaxrequest.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_realestate', 'Configuration/TypoScript', 'Real Estate');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlrealestate_domain_model_realestate', 'EXT:dl_realestate/Resources/Private/Language/locallang_csh_tx_dlrealestate_domain_model_realestate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlrealestate_domain_model_realestate');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder