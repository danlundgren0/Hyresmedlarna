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

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    realestate {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('dl_realestate') . 'Resources/Public/Icons/user_plugin_realestate.svg
                        title = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_domain_model_realestate
                        description = LLL:EXT:dl_realestate/Resources/Private/Language/locallang_db.xlf:tx_dl_realestate_domain_model_realestate.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlrealestate_realestate
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder