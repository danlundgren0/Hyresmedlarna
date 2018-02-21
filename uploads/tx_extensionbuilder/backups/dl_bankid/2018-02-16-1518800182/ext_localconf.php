<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DanLundgren.DlBankid',
            'Loginform',
            [
                'LoginForm' => 'mobileBankId, fileBankId'
            ],
            // non-cacheable actions
            [
                'LoginForm' => 'mobileBankId, fileBankId'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    loginform {
                        iconIdentifier = dl_bankid-plugin-loginform
                        title = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_loginform.name
                        description = LLL:EXT:dl_bankid/Resources/Private/Language/locallang_db.xlf:tx_dl_bankid_loginform.description
                        tt_content_defValues {
                            CType = list
                            list_type = dlbankid_loginform
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'dl_bankid-plugin-loginform',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dl_bankid/Resources/Public/Icons/user_plugin_loginform.svg']
			);
		
    }
);
