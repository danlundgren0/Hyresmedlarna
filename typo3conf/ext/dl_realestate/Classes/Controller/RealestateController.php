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

    }

    /**
     * action create
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $newRealestate
     * @return void
     */
    public function createAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $newRealestate)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->add($newRealestate);
        $this->redirect('list');
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
        $this->redirect('list');
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
