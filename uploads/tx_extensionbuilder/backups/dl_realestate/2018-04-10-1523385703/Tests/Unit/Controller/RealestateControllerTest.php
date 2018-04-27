<?php
namespace DanLundgren\DlRealestate\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class RealestateControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlRealestate\Controller\RealestateController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlRealestate\Controller\RealestateController::class)
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
    public function listActionFetchesAllRealestatesFromRepositoryAndAssignsThemToView()
    {

        $allRealestates = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $realestateRepository = $this->getMockBuilder(\DanLundgren\DlRealestate\Domain\Repository\RealestateRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $realestateRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRealestates));
        $this->inject($this->subject, 'realestateRepository', $realestateRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('realestates', $allRealestates);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRealestateToView()
    {
        $realestate = new \DanLundgren\DlRealestate\Domain\Model\Realestate();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('realestate', $realestate);

        $this->subject->showAction($realestate);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenRealestateToRealestateRepository()
    {
        $realestate = new \DanLundgren\DlRealestate\Domain\Model\Realestate();

        $realestateRepository = $this->getMockBuilder(\DanLundgren\DlRealestate\Domain\Repository\RealestateRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $realestateRepository->expects(self::once())->method('add')->with($realestate);
        $this->inject($this->subject, 'realestateRepository', $realestateRepository);

        $this->subject->createAction($realestate);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenRealestateToView()
    {
        $realestate = new \DanLundgren\DlRealestate\Domain\Model\Realestate();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('realestate', $realestate);

        $this->subject->editAction($realestate);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenRealestateInRealestateRepository()
    {
        $realestate = new \DanLundgren\DlRealestate\Domain\Model\Realestate();

        $realestateRepository = $this->getMockBuilder(\DanLundgren\DlRealestate\Domain\Repository\RealestateRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $realestateRepository->expects(self::once())->method('update')->with($realestate);
        $this->inject($this->subject, 'realestateRepository', $realestateRepository);

        $this->subject->updateAction($realestate);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenRealestateFromRealestateRepository()
    {
        $realestate = new \DanLundgren\DlRealestate\Domain\Model\Realestate();

        $realestateRepository = $this->getMockBuilder(\DanLundgren\DlRealestate\Domain\Repository\RealestateRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $realestateRepository->expects(self::once())->method('remove')->with($realestate);
        $this->inject($this->subject, 'realestateRepository', $realestateRepository);

        $this->subject->deleteAction($realestate);
    }
}
