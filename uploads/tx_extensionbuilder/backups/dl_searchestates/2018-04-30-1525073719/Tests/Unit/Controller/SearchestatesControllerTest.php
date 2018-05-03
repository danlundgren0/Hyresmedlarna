<?php
namespace DanLundgren\DlSearchestates\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class SearchestatesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlSearchestates\Controller\SearchestatesController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlSearchestates\Controller\SearchestatesController::class)
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
    public function listActionFetchesAllSearchestatessFromRepositoryAndAssignsThemToView()
    {

        $allSearchestatess = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $searchestatesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $searchestatesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSearchestatess));
        $this->inject($this->subject, 'searchestatesRepository', $searchestatesRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('searchestatess', $allSearchestatess);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSearchestatesToView()
    {
        $searchestates = new \DanLundgren\DlSearchestates\Domain\Model\Searchestates();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('searchestates', $searchestates);

        $this->subject->showAction($searchestates);
    }
}
