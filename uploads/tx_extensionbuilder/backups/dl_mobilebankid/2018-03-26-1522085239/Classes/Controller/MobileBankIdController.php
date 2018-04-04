<?php
namespace DanLundgren\DlMobilebankid\Controller;

/***
 *
 * This file is part of the "MobileBankId" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * MobileBankIdController
 */
class MobileBankIdController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mobileBankIdRepository
     *
     * @var \DanLundgren\DlMobilebankid\Domain\Repository\MobileBankIdRepository
     * @inject
     */
    protected $mobileBankIdRepository = null;

    /**
     * action loginbox
     *
     * @return void
     */
    public function loginboxAction()
    {
        //$plugin.tx_dlmobilebankid_mobilebankid.settings.tenantLoginPid
        $regType = 0;
        if ((int) $this->settings['regType'] > 0) {
            $regType = $this->settings['regType'];
        }
        $tenantLoginPid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['tenantLoginPid'];
        $tenantGroupuid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['tenantGroupuid'];
        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
        $this->view->assign('tenantLoginPid', $tenantLoginPid);
        $this->view->assign('tenantGroupuid', $tenantGroupuid);
        $this->view->assign('feUserStoragePID', $feUserStoragePID);

		$landlordLoginPid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['landlordLoginPid'];
		$landlordGroupuid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['landlordGroupuid'];
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'setup' => $GLOBALS['TSFE']->tmpl->setup,
                'feUserStoragePID' => $feUserStoragePID,
                'tenantLoginPid' => $tenantLoginPid,
                'landlordLoginPid' => $landlordLoginPid,
                'tenantGroupuid' => $tenantGroupuid,
                'landlordGroupuid' => $landlordGroupuid,
                'arguments' => $arguments,
            ]
        );
    }

    /**
     * action loginok
     *
     * @return void
     */
    public function loginokAction()
    {

    }

    /**
     * action loginfail
     *
     * @return void
     */
    public function loginfailAction()
    {

    }

    /**
     * action createUser
     *
     * @return void
     */
    public function createUserAction()
    {
        /* TODO: set storagePID, Add usergroup, add bi_name, DONE switchable controller actions: Option for tenant or lardlordgroup */
        //Feuser storagepid
        //plugin.tx_felogin_pi1.storagePid. plugin.tx_felogin_pi1.storagePid.

        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];

        $arguments = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_dlmobilebankid_mobilebankid');
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface');
        $customFrontendUserRepository = $objectManager->get('DanLundgren\\DlMobilebankid\\Domain\\Repository\\CustomFrontendUserRepository');
        $customFrontendUserGroupRepository = $objectManager->get('DanLundgren\\DlMobilebankid\\Domain\\Repository\\CustomFrontendUserGroupRepositoryGroup');
        $customFrontendUserGroup = $customFrontendUserGroupRepository->findByUid($arguments['tenantGroupuid']);

        $frontendUser = $customFrontendUserRepository->findByPersonalNumber($arguments['pn']);
        if($frontendUser == NULL) {
        	$frontendUser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('DanLundgren\\DlMobilebankid\\Domain\\Model\\CustomFrontendUser');	
	        $frontendUser->setUsername($arguments['pn']);
	        $frontendUser->setName($arguments['fn'] . ' ' . $arguments['ln']);
	        $frontendUser->setFirstName($arguments['fn']);
	        $frontendUser->setLastName($arguments['ln']);
	        $frontendUser->setPassword($arguments['pw']);
	        $frontendUser->setCity($arguments['city']);
	        $frontendUser->setTelephone($arguments['mobile']);
	        $frontendUser->setEmail($arguments['email']);
	        $frontendUser->setUsergroup($arguments['email']);
	        $frontendUser->add($frontendUser);
        }        
        else {
        	$this->view->assign('userExist','Du har redan registrerat dig. Vänligen logga in nedan');
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'userExist' => 'Du har redan registrerat dig. Vänligen logga in nedan',
 )
);
        }
        //setUsergroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usergroup)
        //$persistenceManager->persistAll();
        /*
        bi_name => '' (0 chars)
        email => 'danlundgren0@gmail.com' (22 chars)
        pw => '12345678' (8 chars)
        pw2 => '12345678' (8 chars)
        pn => '196706193916' (12 chars)
        fn => 'Danne' (5 chars)
        ln => 'Lunne' (5 chars)
        sa => 'Kloster' (7 chars)
        zip => '27144' (5 chars)
        city => 'Ystad' (5 chars)
        mobile => '123456' (6 chars)
        submit => 'Skicka' (6 chars)
        */

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'setup' => $GLOBALS['TSFE']->tmpl->setup,
                'arguments' => $arguments,
            ]
        );
    }

    /**
     * action loginboxLandlord
     *
     * @return void
     */
    public function loginboxLandlordAction()
    {
        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
        $this->view->assign('landlordLoginPid', $landlordLoginPid);
        $this->view->assign('landlordGroupuid', $landlordGroupuid);
        $this->view->assign('feUserStoragePID', $feUserStoragePID);
    }
}
