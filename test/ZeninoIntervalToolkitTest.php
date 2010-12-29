<?php
require_once dirname(__FILE__).'/../ZeninoLoader.php';
ZeninoLoader::register();

/**
 * Test class for ZeninoIntervalToolkit.
 * Generated by PHPUnit on 2010-12-28 at 18:28:19.
 */
class ZeninoIntervalToolkitTest extends PHPUnit_Framework_TestCase
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
   * @todo Implement testUnison().
   */
  public function testUnison()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testSecond().
   */
  public function testSecond()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testThird().
   */
  public function testThird()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testFourth().
   */
  public function testFourth()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testFifth().
   */
  public function testFifth()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testSixth().
   */
  public function testSixth()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testSeventh().
   */
  public function testSeventh()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @dataProvider minorUnisonProvider
   */
  public function testMinorUnison($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorUnison($note);
    $this->assertEquals($expected, $result);
  }
  public function minorUnisonProvider()
  {
    return array(
      array('C', 'Cb'), array('F#','F'), array('Bbb', 'Bbbb'),
      array('G##', 'G#')
    );
  }

  /**
   * @dataProvider majorUnisonProvider
   */
  public function testMajorUnison($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorUnison($note);
    $this->assertEquals($expected, $result);
  }
  public function majorUnisonProvider()
  {
    return array(
      array('C', 'C'), array('F#','F#'), array('Bbb', 'Bbb'),
      array('G##', 'G##')
    );
  }

  /**
   * @dataProvider augmentedUnisonProvider
   */
  public function testAugmentedUnison($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedUnison($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedUnisonProvider()
  {
    return array(
      array('C', 'C#'), array('F#','F##'), array('Bbb', 'Bb'),
      array('G##', 'G###')
    );
  }

  /**
   * @dataProvider minorSecondProvider
   */
  public function testMinorSecond($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorSecond($note);
    $this->assertEquals($expected, $result);
  }
  public function minorSecondProvider()
  {
    return array(
      array('C', 'Db'), array('F#','G'), array('Bbb', 'Cbb'),
      array('G##', 'A#')
    );
  }

  /**
   * @dataProvider majorSecondProvider
   */
  public function testMajorSecond($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorSecond($note);
    $this->assertEquals($expected, $result);
  }
  public function majorSecondProvider()
  {
    return array(
      array('C', 'D'), array('F#','G#'), array('Bbb', 'Cb'),
      array('G##', 'A##')
    );
  }

  /**
   * @dataProvider augmentedSecondProvider
   */
  public function testAugmentedSecond($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedSecond($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedSecondProvider()
  {
    return array(
      array('C', 'D#'), array('F#','G##'), array('Bbb', 'C'),
      array('G##', 'A###')
    );
  }

  /**
   * @dataProvider diminishedThirdProvider
   */
  public function testDiminishedThird($note, $expected)
  {
    $result = ZeninoIntervalToolkit::diminishedThird($note);
    $this->assertEquals($expected, $result);
  }
  public function diminishedThirdProvider()
  {
    return array(
      array('C', 'Ebb'), array('F#','Ab'), array('Bbb', 'Dbbb'),
      array('G##', 'B')
    );
  }

  /**
   * @dataProvider minorThirdProvider
   */
  public function testMinorThird($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorThird($note);
    $this->assertEquals($expected, $result);
  }
  public function minorThirdProvider()
  {
    return array(
      array('C', 'Eb'), array('F#','A'), array('Bbb', 'Dbb'),
      array('G##', 'B#')
    );
  }

  /**
   * @dataProvider majorThirdProvider
   */
  public function testMajorThird($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorThird($note);
    $this->assertEquals($expected, $result);
  }
  public function majorThirdProvider()
  {
    return array(
      array('C', 'E'), array('F#','A#'), array('Bbb', 'Db'),
      array('G##', 'B##')
    );
  }

  /**
   * @dataProvider augmentedThirdProvider
   */
  public function testAugmentedThird($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedThird($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedThirdProvider()
  {
    return array(
      array('C', 'E#'), array('F#','A##'), array('Bbb', 'D'),
      array('G##', 'B###')
    );
  }

  /**
   * @dataProvider diminishedFourthProvider
   */
  public function testDiminishedFourth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::diminishedFourth($note);
    $this->assertEquals($expected, $result);
  }
  public function diminishedFourthProvider()
  {
    return array(
      array('C', 'Fb'), array('F#','Bb'), array('Bbb', 'Ebbb'),
      array('G##', 'C#')
    );
  }

  /**
   * @dataProvider perfectFourthProvider
   */
  public function testPerfectFourth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::perfectFourth($note);
    $this->assertEquals($expected, $result);
  }
  public function perfectFourthProvider()
  {
    return array(
      array('C', 'F'), array('F#','B'), array('Bbb', 'Ebb'),
      array('G##', 'C##')
    );
  }

  /**
   * @dataProvider augmentedFourthProvider
   */
  public function testAugmentedFourth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedFourth($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedFourthProvider()
  {
    return array(
      array('C', 'F#'), array('F#','B#'), array('Bbb', 'Eb'),
      array('G##', 'C###')
    );
  }

  /**
   * @dataProvider diminishedFifthProvider
   */
  public function testDiminishedFifth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::diminishedFifth($note);
    $this->assertEquals($expected, $result);
  }
  public function diminishedFifthProvider()
  {
    return array(
      array('C', 'Gb'), array('F#','C'), array('Bbb', 'Fbb'),
      array('G##', 'D#')
    );
  }

  /**
   * @dataProvider perfectFifthProvider
   */
  public function testPerfectFifth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::perfectFifth($note);
    $this->assertEquals($expected, $result);
  }
  public function perfectFifthProvider()
  {
    return array(
      array('C', 'G'), array('F#','C#'), array('Bbb', 'Fb'),
      array('G##', 'D##')
    );
  }

  /**
   * @dataProvider augmentedFifthProvider
   */
  public function testAugmentedFifth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedFifth($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedFifthProvider()
  {
    return array(
      array('C', 'G#'), array('F#','C##'), array('Bbb', 'F'),
      array('G##', 'D###')
    );
  }

  /**
   * @dataProvider diminishedSixthProvider
   */
  public function testDiminishedSixth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::diminishedSixth($note);
    $this->assertEquals($expected, $result);
  }
  public function diminishedSixthProvider()
  {
    return array(
      array('C', 'Abb'), array('F#','Db'), array('Bbb', 'Gbbb'),
      array('G##', 'E')
    );
  }

  /**
   * @dataProvider minorSixthProvider
   */
  public function testMinorSixth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorSixth($note);
    $this->assertEquals($expected, $result);
  }
  public function minorSixthProvider()
  {
    return array(
      array('C', 'Ab'), array('F#','D'), array('Bbb', 'Gbb'),
      array('G##', 'E#')
    );
  }

  /**
   * @dataProvider majorSixthProvider
   */
  public function testMajorSixth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorSixth($note);
    $this->assertEquals($expected, $result);
  }
  public function majorSixthProvider()
  {
    return array(
      array('C', 'A'), array('F#','D#'), array('Bbb', 'Gb'),
      array('G##', 'E##')
    );
  }

  /**
   * @dataProvider diminishedSeventhProvider
   */
  public function testDiminishedSeventh($note, $expected)
  {
    $result = ZeninoIntervalToolkit::diminishedSeventh($note);
    $this->assertEquals($expected, $result);
  }
  public function diminishedSeventhProvider()
  {
    return array(
      array('C', 'Bbb'), array('F#','Eb'), array('Bbb', 'Abbb'),
      array('G##', 'F#')
    );
  }

  /**
   * @dataProvider minorSeventhProvider
   */
  public function testMinorSeventh($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorSeventh($note);
    $this->assertEquals($expected, $result);
  }
  public function minorSeventhProvider()
  {
    return array(
      array('C', 'Bb'), array('F#','E'), array('Bbb', 'Abb'),
      array('G##', 'F##')
    );
  }

  /**
   * @dataProvider majorSeventhProvider
   */
  public function testMajorSeventh($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorSeventh($note);
    $this->assertEquals($expected, $result);
  }
  public function majorSeventhProvider()
  {
    return array(
      array('C', 'B'), array('F#','E#'), array('Bbb', 'Ab'),
      array('G##', 'F###')
    );
  }

  /**
   * @dataProvider minorNinthProvider
   */
  public function testMinorNinth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorNinth($note);
    $this->assertEquals($expected, $result);
  }
  public function minorNinthProvider()
  {
    return array(
      array('C', 'Db'), array('F#','G'), array('Bbb', 'Cbb'),
      array('G##', 'A#')
    );
  }

  /**
   * @dataProvider majorNinthProvider
   */
  public function testMajorNinth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorNinth($note);
    $this->assertEquals($expected, $result);
  }
  public function majorNinthProvider()
  {
    return array(
      array('C', 'D'), array('F#','G#'), array('Bbb', 'Cb'),
      array('G##', 'A##')
    );
  }

  /**
   * @dataProvider augmentedNinthProvider
   */
  public function testAugmentedNinth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedNinth($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedNinthProvider()
  {
    return array(
      array('C', 'D#'), array('F#','G##'), array('Bbb', 'C'),
      array('G##', 'A###')
    );
  }

  /**
   * @dataProvider perfectEleventhProvider
   */
  public function testPerfectEleventh($note, $expected)
  {
    $result = ZeninoIntervalToolkit::perfectEleventh($note);
    $this->assertEquals($expected, $result);
  }
  public function perfectEleventhProvider()
  {
    return array(
      array('C', 'F'), array('F#','B'), array('Bbb', 'Ebb'),
      array('G##', 'C##')
    );
  }

  /**
   * @dataProvider augmentedEleventhProvider
   */
  public function testAugmentedEleventh($note, $expected)
  {
    $result = ZeninoIntervalToolkit::augmentedEleventh($note);
    $this->assertEquals($expected, $result);
  }
  public function augmentedEleventhProvider()
  {
    return array(
      array('C', 'F#'), array('F#','B#'), array('Bbb', 'Eb'),
      array('G##', 'C###')
    );
  }

  /**
   * @dataProvider minorThirteenthProvider
   */
  public function testMinorThirteenth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::minorThirteenth($note);
    $this->assertEquals($expected, $result);
  }
  public function minorThirteenthProvider()
  {
    return array(
      array('C', 'Ab'), array('F#','D'), array('Bbb', 'Gbb'),
      array('G##', 'E#')
    );
  }

  /**
   * @dataProvider majorThirteenthProvider
   */
  public function testMajorThirteenth($note, $expected)
  {
    $result = ZeninoIntervalToolkit::majorThirteenth($note);
    $this->assertEquals($expected, $result);
  }
  public function majorThirteenthProvider()
  {
    return array(
      array('C', 'A'), array('F#','D#'), array('Bbb', 'Gb'),
      array('G##', 'E##')
    );
  }

  /**
   * @todo Implement testGetInterval().
   */
  public function testGetInterval()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @dataProvider measureProvider
   */
  public function testMeasure($note1, $note2, $expected)
  {
    $result = ZeninoIntervalToolkit::measure($note1, $note2);
    $this->assertEquals($expected, $result);
    $this->assertInternalType('int', $result);
  }
  
  public function measureProvider()
  {
    return array(
      array('C', 'Bb', 10), array('A#', 'Cb', 1), array('B##', 'Ebb', 1),
      array('Gbb', 'A##', 6), array('E', 'Fb', 0)
    );
  }

  /**
   * @todo Implement testInvert().
   */
  public function testInvert()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testDetermine().
   */
  public function testDetermine()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

  /**
   * @todo Implement testFromShortHand().
   */
  public function testFromShortHand()
  {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }
}
?>
