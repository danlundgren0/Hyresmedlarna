<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlMobilebankid',
            'Mobilebankid',
            [
                'MobileBankId' => 'loginbox, loginok, loginfail'
            ],
            // non-cacheable actions
            [
                'MobileBankId' => 'loginbox, loginok, loginfail'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlMobilebankid',
            'Ajaxrequest',
            [
                'AjaxRequest' => 'getJson'
            ],
            // non-cacheable actions
            [
                'AjaxRequest' => 'getJson'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    mobilebankid {
                        iconIdentifier = dl_mobilebankid-plugin-mobilebankid
                        title = LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dl_mobilebankid_mobilebankid.name
                        description = LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dl_mobilebankid_mobilebankid.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlmobilebankid_mobilebankid
                        }
                    }
                    ajaxrequest {
                        iconIdentifier = dl_mobilebankid-plugin-ajaxrequest
                        title = LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dl_mobilebankid_ajaxrequest.name
                        description = LLL:EXT:dl_mobilebankid/Resources/Private/Language/locallang_db.xlf:tx_dl_mobilebankid_ajaxrequest.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlmobilebankid_ajaxrequest
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_mobilebankid-plugin-mobilebankid',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_mobilebankid/Resources/Public/Icons/user_plugin_mobilebankid.svg']
			);
		
			$iconRegistry->registerIcon(
				'dl_mobilebankid-plugin-ajaxrequest',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_mobilebankid/Resources/Public/Icons/user_plugin_ajaxrequest.svg']
			);
		
    }
);
