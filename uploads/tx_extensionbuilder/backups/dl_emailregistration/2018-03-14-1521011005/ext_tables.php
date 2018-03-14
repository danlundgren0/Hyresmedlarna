<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DanLundgren.DlEmailregistration',
            'Emailregistration',
            'Emailregistration'
        );

        $pluginSignature = str_replace('_', '', 'dl_emailregistration') . '_emailregistration';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:dl_emailregistration/Configuration/FlexForms/flexform_emailregistration.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dl_emailregistration', 'Configuration/TypoScript', 'Email registration');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dlemailregistration_domain_model_emailregistration', 'EXT:dl_emailregistration/Resources/Private/Language/locallang_csh_tx_dlemailregistration_domain_model_emailregistration.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dlemailregistration_domain_model_emailregistration');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder