<?php

require_once 'D:\jules\code\zenino\util\LfmMathUtil.php';

/**
 * Test class for LfmMathUtil.
 * Generated by PHPUnit on 2010-12-28 at 19:35:05.
 */
class LfmMathUtilTest extends PHPUnit_Framework_TestCase
{
  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp()
  {
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown()
  {
  }

  /**
   * @dataProvider modulusProvider
   */
  public function testModulus($divided, $diviser, $expected);
  {
    $result = LfmMathUtil::modulus($divided, $diviser);
    $this->assertEquals($expected, $result);
    $this->assertInternalType('int', $result);
  }
  
  public function modulusProvider()
  {
    return array(
      array(6,12,6), array(35,12,11),
      array(-5,12,7), array(-1,12,11),
      array(5,-12,-7), array(1,-12,-11)
    );
  }
}
?>
