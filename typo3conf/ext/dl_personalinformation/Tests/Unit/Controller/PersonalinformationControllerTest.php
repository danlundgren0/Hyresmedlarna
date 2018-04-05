<?php
namespace DanLundgren\DlPersonalinformation\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class PersonalinformationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlPersonalinformation\Controller\PersonalinformationController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlPersonalinformation\Controller\PersonalinformationController::class)
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
    public function listActionFetchesAllPersonalinformationsFromRepositoryAndAssignsThemToView()
    {

        $allPersonalinformations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personalinformationRepository = $this->getMockBuilder(\DanLundgren\DlPersonalinformation\Domain\Repository\PersonalinformationRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $personalinformationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPersonalinformations));
        $this->inject($this->subject, 'personalinformationRepository', $personalinformationRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('personalinformations', $allPersonalinformations);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenPersonalinformationToView()
    {
        $personalinformation = new \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('personalinformation', $personalinformation);

        $this->subject->editAction($personalinformation);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenPersonalinformationInPersonalinformationRepository()
    {
        $personalinformation = new \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation();

        $personalinformationRepository = $this->getMockBuilder(\DanLundgren\DlPersonalinformation\Domain\Repository\PersonalinformationRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $personalinformationRepository->expects(self::once())->method('update')->with($personalinformation);
        $this->inject($this->subject, 'personalinformationRepository', $personalinformationRepository);

        $this->subject->updateAction($personalinformation);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenPersonalinformationFromPersonalinformationRepository()
    {
        $personalinformation = new \DanLundgren\DlPersonalinformation\Domain\Model\Personalinformation();

        $personalinformationRepository = $this->getMockBuilder(\DanLundgren\DlPersonalinformation\Domain\Repository\PersonalinformationRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $personalinformationRepository->expects(self::once())->method('remove')->with($personalinformation);
        $this->inject($this->subject, 'personalinformationRepository', $personalinformationRepository);

        $this->subject->deleteAction($personalinformation);
    }
}
