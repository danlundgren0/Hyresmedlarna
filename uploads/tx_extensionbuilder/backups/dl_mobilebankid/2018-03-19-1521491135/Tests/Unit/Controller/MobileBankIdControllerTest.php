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

}
