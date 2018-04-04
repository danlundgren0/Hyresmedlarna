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

}
