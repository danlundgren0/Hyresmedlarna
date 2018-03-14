<?php
namespace DanLundgren\DlBankid\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class BankIdControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlBankid\Controller\BankIdController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlBankid\Controller\BankIdController::class)
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
    public function listActionFetchesAllBankIdsFromRepositoryAndAssignsThemToView()
    {

        $allBankIds = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $bankIdRepository = $this->getMockBuilder(\DanLundgren\DlBankid\Domain\Repository\BankIdRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $bankIdRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBankIds));
        $this->inject($this->subject, 'bankIdRepository', $bankIdRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('bankIds', $allBankIds);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
