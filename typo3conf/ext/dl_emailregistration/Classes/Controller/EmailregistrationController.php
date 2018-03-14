<?php
namespace DanLundgren\DlEmailregistration\Controller;

/***
 *
 * This file is part of the "Email registration" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * EmailregistrationController
 */
class EmailregistrationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * emailregistrationRepository
     *
     * @var \DanLundgren\DlEmailregistration\Domain\Repository\EmailregistrationRepository
     * @inject
     */
    protected $emailregistrationRepository = null;

    /**
     * action landlordreg
     *
     * @return void
     */
    public function landlordregAction()
    {
        $pidList = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK)['persistence']['storagePid'];
        if (strlen($pidList) > 0) {
            $pidListArr = explode(',', $pidList);
            $pid = $pidListArr[0];
        } else {
            $pid = 0;
        }
        $this->view->assign('regtype', 'landlord');
        $this->view->assign('pid', $pid);
    }

    /**
     * action tenantreg
     *
     * @return void
     */
    public function tenantregAction()
    {
        $pidList = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK)['persistence']['storagePid'];
        if (strlen($pidList) > 0) {
            $pidListArr = explode(',', $pidList);
            $pid = $pidListArr[0];
        } else {
            $pid = 0;
        }
        $this->view->assign('regtype', 'tenant');
        $this->view->assign('pid', $pid);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
            [
                'class' => __CLASS__,
                'function' => __FUNCTION__,
                'extensionConfiguration' => $extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['dl_bankid']),
                'emailregistration' => 'listAction'
            ]
        );
        $emailregistrations = $this->emailregistrationRepository->findAll();
        $this->view->assign('emailregistrations', $emailregistrations);
    }
}
