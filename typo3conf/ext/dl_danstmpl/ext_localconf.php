<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
///srv/sites/hmdev.se/web/typo3conf/ext/dl_danstmpl
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'dl_danstmpl/Configuration/TypoScript/';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/Mod/WebLayout/BackendLayouts.txt">');