<?php
namespace DanLundgren\DlMobilebankid\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class MobileBankIdControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlMobilebankid\Controller\MobileBankIdController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DanLundgren\DlMobilebankid\Controller\MobileBankIdController::class)
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
    public function createActionAddsTheGivenMobileBankIdToMobileBankIdRepository()
    {
        $mobileBankId = new \DanLundgren\DlMobilebankid\Domain\Model\MobileBankId();

        $mobileBankIdRepository = $this->getMockBuilder(\DanLundgren\DlMobilebankid\Domain\Repository\MobileBankIdRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $mobileBankIdRepository->expects(self::once())->method('add')->with($mobileBankId);
        $this->inject($this->subject, 'mobileBankIdRepository', $mobileBankIdRepository);

        $this->subject->createAction($mobileBankId);
    }
}
