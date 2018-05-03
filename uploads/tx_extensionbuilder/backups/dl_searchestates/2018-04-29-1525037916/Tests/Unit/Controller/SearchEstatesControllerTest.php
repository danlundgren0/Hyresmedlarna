<?php
namespace DanLundgren\DlSearchestates\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class SearchEstatesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlSearchestates\Controller\SearchEstatesController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlSearchestates\Controller\SearchEstatesController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllSearchEstatessFromRepositoryAndAssignsThemToView()
    {

        $allSearchEstatess = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $searchEstatesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $searchEstatesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSearchEstatess));
        $this->inject($this->subject, 'searchEstatesRepository', $searchEstatesRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('searchEstatess', $allSearchEstatess);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSearchEstatesToView()
    {
        $searchEstates = new \DanLundgren\DlSearchestates\Domain\Model\SearchEstates();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('searchEstates', $searchEstates);

        $this->subject->showAction($searchEstates);
    }
}
