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

        $pluginSignature = str_replace('_', '', 'dl_mobilebankid') . '_ajaxrequest';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_mobilebankid/Configuration/FlexForms/flexform_ajaxrequest.xml');

        $pluginSignature = str_replace('_', '', 'dl_mobilebankid') . '_mobilebankid';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_mobilebankid/Configuration/FlexForms/flexform_regtype.xml');        

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_mobilebankid', 'Configuration/TypoScript', 'MobileBankId');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlmobilebankid_domain_model_mobilebankid', 'EXT:dl_mobilebankid/Resources/Private/Language/locallang_csh_tx_dlmobilebankid_domain_model_mobilebankid.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlmobilebankid_domain_model_mobilebankid');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder