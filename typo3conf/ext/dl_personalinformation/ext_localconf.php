<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlPersonalinformation',
            'Personalinformation',
            [
                'Personalinformation' => 'list, edit, delete'
            ],
            // non-cacheable actions
            [
                'Personalinformation' => 'update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    personalinformation {
                        iconIdentifier = dl_personalinformation-plugin-personalinformation
                        title = LLL:EXT:dl_personalinformation/Resources/Private/Language/locallang_db.xlf:tx_dl_personalinformation_personalinformation.name
                        description = LLL:EXT:dl_personalinformation/Resources/Private/Language/locallang_db.xlf:tx_dl_personalinformation_personalinformation.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlpersonalinformation_personalinformation
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_personalinformation-plugin-personalinformation',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_personalinformation/Resources/Public/Icons/user_plugin_personalinformation.svg']
			);
		
    }
);
