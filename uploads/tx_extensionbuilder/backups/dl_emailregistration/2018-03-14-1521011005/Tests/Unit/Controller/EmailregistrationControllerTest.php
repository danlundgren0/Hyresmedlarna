<?php
namespace DanLundgren\DlEmailregistration\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class EmailregistrationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlEmailregistration\Controller\EmailregistrationController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlEmailregistration\Controller\EmailregistrationController::class)
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
    public function listActionFetchesAllEmailregistrationsFromRepositoryAndAssignsThemToView()
    {

        $allEmailregistrations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $emailregistrationRepository = $this->getMockBuilder(\DanLundgren\DlEmailregistration\Domain\Repository\EmailregistrationRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $emailregistrationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEmailregistrations));
        $this->inject($this->subject, 'emailregistrationRepository', $emailregistrationRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('emailregistrations', $allEmailregistrations);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
