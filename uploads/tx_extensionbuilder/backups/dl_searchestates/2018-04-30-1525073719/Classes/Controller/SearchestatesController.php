<?php
namespace DanLundgren\DlSearchestates\Controller;

/***
 *
 * This file is part of the "Search Estates" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

/**
 * SearchestatesController
 */
class SearchestatesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'realestate' => $realestate,
 )
);
        $this->view->assign('realestate', $realestate);
    }
}
