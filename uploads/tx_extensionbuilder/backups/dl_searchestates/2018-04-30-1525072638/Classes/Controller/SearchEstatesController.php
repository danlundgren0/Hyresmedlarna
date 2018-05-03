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
 * SearchEstatesController
 */
class SearchEstatesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
     * @param \DanLundgren\DlSearchestates\Domain\Model\SearchEstates $searchEstates
     * @return void
     */
    public function showAction(\DanLundgren\DlSearchestates\Domain\Model\SearchEstates $searchEstates)
    {
        $this->view->assign('searchEstates', $searchEstates);
    }
}
