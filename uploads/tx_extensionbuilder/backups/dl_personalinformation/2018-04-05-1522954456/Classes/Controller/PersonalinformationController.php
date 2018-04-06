<?php
namespace DanLundgren\DlPersonalinformation\Controller;

/***
 *
 * This file is part of the "Personal information" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * PersonalinformationController
 */
class PersonalinformationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * personalinformationRepository
     *
     * @var \DanLundgren\DlPersonalinformation\Domain\Repository\PersonalinformationRepository
     * @inject
     */
    protected $personalinformationRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if ($GLOBALS['TSFE']->fe_user && $GLOBALS['TSFE']->fe_user->user && (int) $GLOBALS['TSFE']->fe_user->user['uid'] > 0) {
            $uid = (int) $GLOBALS['TSFE']->fe_user->user['uid'];
            $feUserStoragePID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_felogin_pi1.']['storagePid'];
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
            $persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface');
            $customFrontendUserRepository = $objectManager->get('TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository');
            $frontendUser = $customFrontendUserRepository->findByUid($uid);
            $this->view->assign('frontendUser', $frontendUser);
        } else {
            $this->view->assign('error', 'Du är inte inloggad');
        }
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'user' => $GLOBALS['TSFE']->fe_user->user,
                'frontendUser' => $frontendUser
            ]
        );
        $personalinformations = $this->personalinformationRepository->findAll();
        $this->view->assign('personalinformations', $personalinformations);
    }

    /**
     * action edit
     *
     * @param \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation
     * @ignorevalidation $personalinformation
     * @return void
     */
    public function editAction(\DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation)
    {
        $this->view->assign('personalinformation', $personalinformation);
    }

    /**
     * action update
     *
     * @param \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation
     * @return void
     */
    public function updateAction(\DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->personalinformationRepository->update($personalinformation);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation
     * @return void
     */
    public function deleteAction(\DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation $personalinformation)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->personalinformationRepository->remove($personalinformation);
        $this->redirect('list');
    }
}
