<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlEmailregistration',
            'Emailregistration',
            [
                'Emailregistration' => 'landlordreg, tenantreg'
            ],
            // non-cacheable actions
            [
                'Emailregistration' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    emailregistration {
                        iconIdentifier = dl_emailregistration-plugin-emailregistration
                        title = LLL:EXT:dl_emailregistration/Resources/Private/Language/locallang_db.xlf:tx_dl_emailregistration_emailregistration.name
                        description = LLL:EXT:dl_emailregistration/Resources/Private/Language/locallang_db.xlf:tx_dl_emailregistration_emailregistration.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlemailregistration_emailregistration
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_emailregistration-plugin-emailregistration',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_emailregistration/Resources/Public/Icons/user_plugin_emailregistration.svg']
			);
		
    }
);
