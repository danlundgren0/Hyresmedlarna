<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlBankid',
            'Bankid',
            [
                'BankId' => 'call, collect, sign, mobileBankId, fileBankId'
            ],
            // non-cacheable actions
            [
                'BankId' => 'call, collect, sign, mobileBankId, fileBankId'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlBankid',
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
                    bankid {
                        iconIdentifier = dl_bankid-plugin-bankid
                        title = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_bankid.name
                        description = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_bankid.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlbankid_bankid
                        }
                    }
                    ajaxrequest {
                        iconIdentifier = dl_bankid-plugin-ajaxrequest
                        title = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_ajaxrequest.name
                        description = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_ajaxrequest.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlbankid_ajaxrequest
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_bankid-plugin-bankid',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_bankid/Resources/Public/Icons/user_plugin_bankid.svg']
			);
		
			$iconRegistry->registerIcon(
				'dl_bankid-plugin-ajaxrequest',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_bankid/Resources/Public/Icons/user_plugin_ajaxrequest.svg']
			);
		
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder