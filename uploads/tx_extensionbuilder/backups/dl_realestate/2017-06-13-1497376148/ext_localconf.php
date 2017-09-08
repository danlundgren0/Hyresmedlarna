<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlRealestate',
            'Realestate',
            [
                'Realestate' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Realestate' => 'create, update, delete'
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
