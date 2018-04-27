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
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $frontendUserGroupRepository = $objectManager->get('TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserGroupRepository');
        //$frontendUserGroupRepository = $objectManager->get('DanLundgren\DlMobilebankid\Domain\Repository\CustomFrontendUserGroupRepository');
        //DanLundgren\DlMobilebankid\Domain\Repository
        $usergroupId = $GLOBALS['TSFE']->fe_user->user['usergroup'];
        $frontendUserGroup = $frontendUserGroupRepository->findByUid($usergroupId);
        $userType = $frontendUserGroup->getUserType();
        $updateLandlordPID = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_dlpersonalinformation_personalinformation.']['settings.']['updateLandlordPID'];
        $isTenant = ($frontendUserGroup->getUserType()==1)?TRUE:FALSE;
        $isLandlord = ($frontendUserGroup->getUserType()==2)?TRUE:FALSE;       
        $cacheManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Cache\CacheManager');
        $cacheManager->flushCaches();
        //$cacheManager->getCache('cache_pages')->flushByTag('tx_dlrealestate_domain_model_realestate');
        //$cacheManager->getCache('cache_pagesection')->flushByTag('tx_dlrealestate_domain_model_realestate');        
        $realestates = $this->realestateRepository->findAll();
        $this->view->assign('realestates', $realestates);
        $this->view->assign('isTenant', $isTenant);
        $this->view->assign('isLandlord', $isLandlord);
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
    }

    /**
     * Set TypeConverter option for image upload
     */
    public function initializeCreateAction()
    {
        $this->setTypeConverterConfigurationForImageUpload('realestate');
    }

    /**
     * action create
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @return void
     */
    public function createAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
        $this->addFlashMessage('Er bostad är nu skapad', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->add($realestate);
        //TODO: set pid as constant
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
        $this->view->assign('realestate', $realestate);
    }

    /**
     * Set TypeConverter option for image upload
     */
    public function initializeUpdateAction()
    {
        $this->setTypeConverterConfigurationForImageUpload('realestate');
    }

    /**
     * action update
     *
     * @param \DanLundgren\DlRealestate\Domain\Model\Realestate $realestate
     * @return void
     */
    public function updateAction(\DanLundgren\DlRealestate\Domain\Model\Realestate $realestate)
    {
        $this->addFlashMessage('Bostaden '. $realestate->getName() .' är uppdaterad', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->update($realestate);
        //TODO: set pid as constant
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
        $this->addFlashMessage('Bostaden '. $realestate->getName() .' är borttagen', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->realestateRepository->remove($realestate);
        //TODO: set pid as constant
        $this->redirect('list', null, null, null, 72, 10);
    }

    /**
     *
     */
    protected function setTypeConverterConfigurationForImageUpload($argumentName)
    {
        $uploadConfiguration = [
            \DanLundgren\DlRealestate\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            \DanLundgren\DlRealestate\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/content/',
        ];
        /** @var PropertyMappingConfiguration $newExampleConfiguration */
        $newExampleConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $newExampleConfiguration->forProperty('image')
            ->setTypeConverterOptions(
                'DanLundgren\\DlRealestate\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                $uploadConfiguration
            );
        $newExampleConfiguration->forProperty('imageCollection.0')
            ->setTypeConverterOptions(
                'DanLundgren\\DlRealestate\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                $uploadConfiguration
            );
    }

}
