<?php
require_once dirname(__FILE__).'/../../ZeninoLoader.php';
ZeninoLoader::register();

/**
 * Test class for ZeninoDiatonicToolkit.
 * Generated by PHPUnit on 2010-12-28 at 22:47:06.
 */
class ZeninoDiatonicToolkitTest extends PHPUnit_Framework_TestCase
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
   * @dataProvider getNotesProvider
   */
  public function testGetNotes($key, $expected)
  {
    $result = ZeninoDiatonicToolkit::getNotes($key);
    $this->assertEquals($expected, $result);
  }
  public function getNotesProvider()
  {
    return array(
      array('C', array('C','D','E','F','G','A','B')),
      array('D', array('D','E','F#','G','A','B','C#')),
      array('E', array('E','F#','G#','A','B','C#','D#')),
      array('F', array('F','G','A','Bb','C','D','E')),
      array('G', array('G','A','B','C','D','E','F#')),
      array('A', array('A','B','C#','D','E','F#','G#')),
      array('B', array('B','C#','D#','E','F#','G#','A#'))
    );
  }

  /**
   * @dataProvider intToNoteProvider
   */
  public function testIntToNote($int, $key, $expected)
  {
    $result = ZeninoDiatonicToolkit::intToNote($int, $key);
    $this->assertEquals($expected, $result);
  }
  public function intToNoteProvider()
  {
    return array(
      array(1,'C','C#'), array(4, 'Gb', 'Eb#'), array(7, 'D#', 'F##'),
      array(10, 'B#', 'G###')
    );
  }

  /**
   * @dataProvider intervalProvider
   */
  public function testInterval($key, $start_note, $interval, $expected)
  {
    $result = ZeninoDiatonicToolkit::interval($key, $start_note, $interval);
    $this->assertEquals($expected, $result);
  }
  public function intervalProvider()
  {
    return array(
      array('C', 'F', 1, 'G'), array('F', 'A', 3, 'D'),
      array('Bb', 'Eb', -2, 'C'), array('Eb', 'Bb', -8, 'Ab')
    );
  }
}
?>
