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
        $registerSuccessPID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['registerSuccessPID'];
        $tenantLoginPid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['tenantLoginPid'];
        $tenantGroupuid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['tenantGroupuid'];
        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
        $this->view->assign('tenantLoginPid', $tenantLoginPid);
        $this->view->assign('tenantGroupuid', $tenantGroupuid);
        $this->view->assign('feUserStoragePID', $feUserStoragePID);
        $this->view->assign('registerSuccessPID', $registerSuccessPID);
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
        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
        $arguments = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_dlmobilebankid_mobilebankid');
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface');
        $customFrontendUserRepository = $objectManager->get('TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository');
        $customFrontendUserGroupRepository = $objectManager->get('TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserGroupRepository');
        $groupUid = ((int) $arguments['tenantGroupuid'] > 0) ? (int) $arguments['tenantGroupuid'] : (int) $arguments['landlordGroupuid'];
        $registerSuccessPID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['registerSuccessPID'];
        $alreadyRegisteredPID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['alreadyRegisteredPID'];
        $customFrontendUserGroup = $customFrontendUserGroupRepository->findByUid($groupUid);
        $newUserGroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $newUserGroup->attach($customFrontendUserGroup);
        $frontendUser = $customFrontendUserRepository->findByUsername($arguments['emailEl']);
        if ($frontendUser->count() == 0 || empty($frontendUser)) {
            $frontendUser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('DanLundgren\\DlMobilebankid\\Domain\\Model\\CustomFrontendUser');
            if ($arguments['company']) {
                $frontendUser->setCompany($arguments['company']);
            }
            $frontendUser->setUsername($arguments['emailEl']);
            $frontendUser->setName($arguments['fn'] . ' ' . $arguments['ln']);
            $frontendUser->setFirstName($arguments['fn']);
            $frontendUser->setLastName($arguments['ln']);
            $frontendUser->setPassword($arguments['pw']);
            $frontendUser->setCity($arguments['city']);
            $frontendUser->setTelephone($arguments['mobile']);
            $frontendUser->setEmail($arguments['emailEl']);
            $frontendUser->setAddress($arguments['sa']);
            $frontendUser->setZip($arguments['zip']);
            $frontendUser->setUsergroup($newUserGroup);
            $frontendUser->setPersonalNumber($arguments['pn']);
            $frontendUser->setBankIdName($arguments['bi_name']);
            $frontendUser->setPid($feUserStoragePID);
            $customFrontendUserRepository->add($frontendUser);
            $persistenceManager->persistAll();
            //$uriBuilder = $this->uriBuilder;
            //$uri = $uriBuilder->setTargetPageUid(67)->build();
            //$this->redirectToUri($uri, 1);
        } else {
            $uriBuilder = $this->uriBuilder;
            if ((int) $alreadyRegisteredPID > 0) {
                $uri = $uriBuilder->setTargetPageUid((int) $alreadyRegisteredPID)->build();
            } else {
                $uri = $uriBuilder->setTargetPageUid(1)->build();
            }
            $this->redirectToUri($uri, 1);
        }
    }

    /**
     * action loginboxLandlord
     *
     * @return void
     */
    public function loginboxLandlordAction()
    {
        $registerSuccessPID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['registerSuccessPID'];
        $landlordLoginPid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['landlordLoginPid'];
        $landlordGroupuid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlmobilebankid_mobilebankid.']['settings.']['landlordGroupuid'];
        $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
        $this->view->assign('landlordLoginPid', $landlordLoginPid);
        $this->view->assign('landlordGroupuid', $landlordGroupuid);
        $this->view->assign('feUserStoragePID', $feUserStoragePID);
        $this->view->assign('registerSuccessPID', $registerSuccessPID);
    }
}
