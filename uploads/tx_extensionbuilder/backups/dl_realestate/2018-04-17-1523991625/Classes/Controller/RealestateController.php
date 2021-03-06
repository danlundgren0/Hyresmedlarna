<?php
namespace DanLundgren\DlRealestate\Controller;

/***
 *
 * This file is part of the "Real Estate" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * RealestateController
 */
class RealestateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * realestateRepository
     *
     * @var \DanLundgren\DlRealestate\Domain\Repository\RealestateRepository
     * @inject
     */
    protected $realestateRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $realestates = $this->realestateRepository->findAll();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'realestates' => $realestates
            ]
        );
        $this->view->assign('realestates', $realestates);
    }

    /**
     * action show
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @return void
     */
    public function showAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
        $this->view->assign('realestate', $realestate);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $feuser = $GLOBALS['TSFE']->fe_user->user['uid'];
        $this->view->assign('feuser', $feuser);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'ACTION' => 'NEW ACTION'
            ]
        );
    }

    /**
     * action create
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $newRealestate
     * @return void
     */
    public function createAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $newRealestate)
    {
        $this->addFlashMessage('Er bostad är nu skapad', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->add($newRealestate);
        $this->redirect('list', null, null, null, 72, 10);
    }

    /**
     * action edit
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @ignorevalidation $realestate
     * @return void
     */
    public function editAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'realestate' => $realestate,
 )
);
        $this->view->assign('realestate', $realestate);
    }

    /**
     * action update
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @return void
     */
    public function updateAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->update($realestate);
        //$objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
        //$persistenceManager =  $objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager');
        //$persistenceManager->persistAll();
        $feController = new \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController();
        $feController->clearPageCacheContent_pidList(72);
        $this->redirect('list', null, null, null, 72, 10);
        //$this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @return void
     */
    public function deleteAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->remove($realestate);
        $this->redirect('list');
    }
}
