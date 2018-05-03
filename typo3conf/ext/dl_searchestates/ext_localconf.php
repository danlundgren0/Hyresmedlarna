<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlSearchestates',
            'Searchestates',
            [
                'Searchestates' => 'list, searchresult'
            ],
            // non-cacheable actions
            [
                'Searchestates' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    searchestates {
                        iconIdentifier = dl_searchestates-plugin-searchestates
                        title = LLL:EXT:dl_searchestates/Resources/Private/Language/locallang_db.xlf:tx_dl_searchestates_searchestates.name
                        description = LLL:EXT:dl_searchestates/Resources/Private/Language/locallang_db.xlf:tx_dl_searchestates_searchestates.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlsearchestates_searchestates
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_searchestates-plugin-searchestates',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_searchestates/Resources/Public/Icons/user_plugin_searchestates.svg']
			);
		
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder