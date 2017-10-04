<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlRealestate',
            'Realestate',
            [
                'Realestate' => 'create, update, delete, list, show'
            ],
            // non-cacheable actions
            [
                'Realestate' => 'create, update, delete, list, show'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlRealestate',
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
                    realestate {
                        iconIdentifier = dl_realestate-plugin-realestate
                        title = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_realestate.name
                        description = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_realestate.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlrealestate_realestate
                        }
                    }
                    ajaxrequest {
                        iconIdentifier = dl_realestate-plugin-ajaxrequest
                        title = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_ajaxrequest.name
                        description = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_ajaxrequest.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlrealestate_ajaxrequest
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_realestate-plugin-realestate',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_realestate/Resources/Public/Icons/user_plugin_realestate.svg']
			);
		
			$iconRegistry->registerIcon(
				'dl_realestate-plugin-ajaxrequest',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_realestate/Resources/Public/Icons/user_plugin_ajaxrequest.svg']
			);
		
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder