<?php
namespace DanLundgren\DlSearchestates\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Dan Lundgren <danlundgren0@gmail.com>
 */
class SearchestatesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DanLundgren\DlSearchestates\Domain\Model\Searchestates
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DanLundgren\DlSearchestates\Domain\Model\Searchestates();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
