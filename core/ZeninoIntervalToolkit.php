<?php
/*
require_once 'ZeninoDiatonicToolkit.php';
require_once 'ZeninoNoteToolkit.php';
*/
class ZeninoIntervalToolkit
{
	// [shorthand, interval function up, interval function down]
  protected static
    $shorthand_lookup = array(
      array('1',  'majorUnison',   'majorUnison'),
      array('2',  'majorSecond',   'minorSeventh'),
      array('3',  'majorThird',    'minorSixth'),
      array('4',  'perfectFourth', 'perfectFifth'),
      array('5',  'perfectFifth',  'perfectFourth'),
      array('6',  'majorSixth',    'minorThird'),
      array('7',  'majorSeventh',  'minorSecond'),
      array('9',  'majorSecond',   'minorSeventh'),
      array('11', 'perfectFourth', 'perfectFifth'),
      array('13', 'majorSixth',    'minorThird')
    ),
    // [name, shorthand_name, half notes]
    // for major version of this interval
    $fifth_steps = array(
			array('unison',  '1', 0),
			array('fifth',   '5', 7),
			array('second',  '2', 2),
			array('sixth',   '6', 9),
			array('third',   '3', 4),
			array('seventh', '7', 11),
			array('fourth',  '4', 5)
		);
	
	
	/*
	 * Diatonic intervals.
	 * Needs a note and a key.
	 */
	
	/*
	 * One of the most useless methods ever written,
	 * which returns the unison of a note.
	 * The key is not at all important, but is here for  consistency reasons only. 
	 */
	public static function unison($note, $key = null){ return $note; }
	/*
	 * Take the diatonic second of note in key.
	 * Examples: 
	 * 	second("E", "C")  => 'F'
	 * 	second("E", "D")  => 'F#'
	 * Raises a !KeyError if the `note` is not found in the `key`
	 */
	public static function second($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 1);
	}
	public static function third($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 2);
	}
	public static function fourth($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 3);
	}
	public static function fifth($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 4);
	}
	public static function sixth($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 5);
	}
	public static function seventh($note, $key)
	{
		return ZeninoDiatonicToolkit::interval($key, $note, 6);
	}
	
	/*
	 * ABSOLUTE INTERVALS
	 */
	public static function minorUnison($note)
	{
		return ZeninoNoteToolkit::diminish($note);
	}
	public static function majorUnison($note)
	{
		return $note;
	}
	public static function augmentedUnison($note)
	{
		return ZeninoNoteToolkit::augment($note);
	}

	public static function minorSecond($note)
	{
		$sec = self::second($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sec, 1);
	}
	public static function majorSecond($note)
	{
		$sec = self::second($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sec, 2);
	}
	public static function augmentedSecond($note)
	{
		$sec = self::second($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sec, 3);
	}
	
	public static function diminishedThird($note)
	{
		$trd = self::third($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $trd, 2);
	}
	public static function minorThird($note)
	{
		$trd = self::third($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $trd, 3);
	}
	public static function majorThird($note)
	{
		$trd = self::third($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $trd, 4);
	}
	public static function augmentedThird($note)
	{
		$trd = self::third($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $trd, 5);
	}
	
	public static function diminishedFourth($note)
	{
		$frt = self::fourth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $frt, 4);
	}
	public static function perfectFourth($note)
	{
		$frt = self::fourth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $frt, 5);
	}
	public static function augmentedFourth($note)
	{
		$frt = self::fourth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $frt, 6);
	}
	
	public static function diminishedFifth($note)
	{
		$fif = self::fifth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $fif, 6);
	}
	public static function perfectFifth($note)
	{
		$fif = self::fifth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $fif, 7);
	}
	public static function augmentedFifth($note)
	{
		$fif = self::fifth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $fif, 8);
	}
	
	public static function diminishedSixth($note)
	{
		$sth = self::sixth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 7);
	}
	public static function minorSixth($note)
	{
		$sth = self::sixth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 8);
	}
	public static function majorSixth($note)
	{
		$sth = self::sixth($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 9);
	}
	public static function diminishedSeventh($note)
	{
		$sth = self::seventh($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 9);
	}
	public static function minorSeventh($note)
	{
		$sth = self::seventh($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 10);
	}
	public static function majorSeventh($note)
	{
		$sth = self::seventh($note[0], 'C');
		return self::augmentOrDiminishUntilTheIntervalIsRight($note, $sth, 11);
	}
	
	public static function minorNinth($note){ return self::minorSecond($note); }
	public static function majorNinth($note){ return self::majorSecond($note); }
	public static function augmentedNinth($note){ return self::augmentedSecond($note); }
	public static function perfectEleventh($note){ return self::perfectFourth($note); }
	public static function augmentedEleventh($note){ return self::augmentedFourth($note); }
	public static function minorThirteenth($note){ return self::minorSixth($note); }
	public static function majorThirteenth($note){ return self::majorSixth($note); }
	
	/*
	 * Gets the note an interval (in half notes) away from the given note.
	 * This will produce mostly theoretical sound results, but you should 
	 * use the minor and major functions to work around the corner cases.
	 */
	public static function getInterval($note, $interval, $key = 'C')
	{
    $intervals = array(0, 2, 4, 5, 7, 9, 11);
    foreach($intervals as &$interval)
    {
      $interval = (ZeninoNoteToolkit::noteToInt($key) + $interval) % 12;
    }

		$key_notes = ZeninoDiatonicToolkit::getNotes($key);
		foreach($key_notes as $kn)
		{
			$result = '';
			if ($kn[0] == $note[0])
      {
				$result = ($intervals[array_search($kn, $key_notes)] + $interval) % 12;
        if(in_array($result, $intervals))
        {
          return $key_notes[array_search($result, $intervals)]
            . implode( ZeninoNoteToolkit::getAccidentals($note) );
        }
        else
        {
          return ZeninoNoteToolkit::diminish(
            $key_notes[array_search(($result + 1) % 12, $intervals)]
              . implode( ZeninoNoteToolkit::getAccidentals($note) )
          );
        }
			}
		}
	}
	
	/*
	 * Returns an integer in the range of 0-11,
	 * determining the half steps between note1 and note2
	 */
	public static function measure($note1, $note2)
	{
		$res = ZeninoNoteToolkit::noteToInt($note2) - ZeninoNoteToolkit::noteToInt($note1);
		return ($res < 0) ? 12 - ($res * -1) : $res;
	}
	
	/*
	* Invert an interval represented as `[note1, note2]`.
	*/
	public static function invert($interval)
	{
		return array_reverse($interval);
	}
	
	/*
	 * Names the interval between note1 and note2.
	 * Example:
	 *	determine("C", "E")  => '3'
	 *	determine("C", "Eb")  => 'b3'
	 * This works for all intervals.
	 * Note that there are corner cases for 'major' fifths and fourths:
	 *	determine("C", "G")  => '5'
	 *	determine("C", "F")  => '4'
	 */
	public static function determine($note1, $note2)
	{
		//  Corner case for unisons ('A' and 'Ab', for instance)
		if($note1[0] == $note2[0])
		{			
			$x = self::getAccidentalsValue($note1);
			$y = self::getAccidentalsValue($note2);
			
			if($x == $y) 						return '1';
			else if ($x < $y) 			return '#1';
			else if ($x - $y == 1) 	return 'b1';
			else 										return 'bb1';
		}
		
		// Other intervals
		$n1 = array_search($note1[0], ZeninoNoteToolkit::$FIFTHS);
		$n2 = array_search($note2[0], ZeninoNoteToolkit::$FIFTHS);
		$number_of_fifth_steps = $n2 - $n1;
		
		if($n2 < $n1)
    {
			//$number_of_fifth_steps = count(ZeninoNoteToolkit::$FIFTHS) - $n1 + $n2;
			$number_of_fifth_steps = 7 - $n1 + $n2;
		}		
		// Count half steps between note1 and note2
		$half_notes = self::measure($note1, $note2);
		// Get the proper list from the number of fifth steps
		$current = self::$fifth_steps[$number_of_fifth_steps];
		// maj = number of major steps for this interval
		$maj = $current[2];
		// if maj is equal to the half steps between note1 and note2
		// the interval is major or perfect
		if($maj == $half_notes)
		{
			return $current[1];
		}
		// if maj + 1 is equal to half_notes, the interval is augmented.
		else if($maj + 1 <= $half_notes)
		{
			return str_repeat('#', $half_notes - $maj) . $current[1];
		}
		// etc.
		else if($maj - 1 == $half_notes)
		{
			return 'b' . $current[1];
		}
		else if($maj - 2 >= $half_notes)
		{
			return str_repeat('b', $maj - $half_notes) . $current[1];
		}
	}

	/*
   * Protected function to count the value of accidentals
   */
  protected function getAccidentalsValue($note)
  {
    $r = 0;
    $alts = ZeninoNoteToolkit::getAccidentals($note);
    foreach($alts as $alt)
    {
      if($alt == 'b')
        $r -= 1;
      else if($alt == '#')
        $r += 1;
    }
    return $r;
  }
	
	/*
	 * Returns the note on interval up or down.
	 * Example:
	 *	from_shorthand('A', 'b3') => 'C'
	 */
	public static function fromShortHand($note, $interval, $up = true)
	{
		// warning should be a valid note.
		if(!ZeninoNoteToolkit::isValidNote($note)) return false;
		
		// [shorthand, interval function up, interval function down]

		// Looking up last character in interval in self::$shorthand_lookup
		// and calling that function.
		$val = false;
		foreach(self::$shorthand_lookup as $shorthand)
		{
			if($shorthand[0] == substr($interval, -1))
			{
				$val = $up ? ZeninoIntervalToolkit::$shorthand[1]($note)
					: ZeninoIntervalToolkit::$shorthand[2]($note);
			}
		}
		
		// warning Last character in interval should be 1-7
		if($val == false) return false;
		
		// Collect accidentals
		$int_array = str_split($interval);
		foreach($int_array as $char)
		{
			if($char == '#')
			{
				$val = $up ? ZeninoNoteToolkit::augment($val)
					: ZeninoNoteToolkit::diminish($val);
			}
			else if($char == 'b')
			{
				$val = $up ? ZeninoNoteToolkit::diminish($val)
					: ZeninoNoteToolkit::augment($val);
			}
			else
			{
				return $val;
			}
		}
	}

	/*
	 * A consonance is a harmony, chord, or interval considered stable, as opposed
	 * to a dissonance (see `is_dissonant`). This function tests whether the given
	 * interval is consonant. This basically means that it checks whether the
	 * interval is (or sounds like) a unison, third, sixth, perfect fourth or
	 * perfect fifth. In classical music the fourth is considered dissonant when
	 * used contrapuntal, which is why you can choose to exclude it.
	 */
	public static function isConsonant($note1, $note2, $includeFourths=true)
	{
		return self::isImperfectConsonant($note1, $note2, $includeFourths)
			|| self::isPerfectConsonant($note1, $note2);
	}

	/*
	 * Perfect consonances are either unisons, perfect fourths or fifths, or
	 * octaves (which is the same as a unison in this model; see the
	 * `container.Note` class for more). Perfect fourths are usually included as
	 * well, but are considered dissonant when used contrapuntal, which is why you
	 * can exclude them. 
	 */
	public static function isPerfectConsonant($note1, $note2)
	{
		$dhalf = self::measure($note1, $note2);
		return in_array($dhalf, array(0.7)) || ($includeFourths && $dhalf == 5);
	}

	/*
	 * Imperfect consonances are either minor or major thirds or minor or major
	 * sixths. 
	 */
	public static function isImperfectConsonant($note1, $note2)
	{
		return in_array(self::measure($note1, $note2), array(3,4,8,9));
	}

	/*
	 * Tests whether an interval is considered unstable, dissonant. In the default
	 * case perfect fourths are considered consonant, but this can be changed with
	 * the `exclude_fourths` flag. 
	 */
	public static function isDissonant($note1, $note2, $includeFourths=false)
	{
		return !self::isConsonant($note1, $note2, !$includeFourths);
	}

	/*
	* A helper function for the minor and major functions.
	*/
	protected static function augmentOrDiminishUntilTheIntervalIsRight($note1, $note2, $interval)
	{
		$cur = self::measure($note1, $note2);
		while($cur != $interval)
		{
			if($cur > $interval)
				$note2 = ZeninoNoteToolkit::diminish($note2);
			else if($cur < $interval)
				$note2 = ZeninoNoteToolkit::augment($note2);
			$cur = self::measure($note1, $note2);
		}
    
		# We are practically done right now, but we need to be able to create
		# the minor seventh of Cb and get Bbb instead of B######### as the result
		$val = 0;
		$alts = ZeninoNoteToolkit::getAccidentals($note2);
		foreach($alts as $alt)
		{
			if ($alt == '#')
				$val += 1;
			else if ($alt == 'b')
				$val -= 1;
		}

		# These are some checks to see if we have generated too much #'s
		# or too much b's. In these cases we need to convert #'s to b's
		# and vice versa. 
		if($val > 6)
		{
			$val = $val % 12;
			$val = -12 + $val;
		}
		else if($val < -6)
		{
			$val = $val % -12;
			$val = 12 + $val;
		}

		# Rebuild the note
		$result = $note2[0];
		while($val > 0)
		{
			$result = ZeninoNoteToolkit::augment($result);
			$val -= 1;
		}
		while($val < 0)
		{
			$result = ZeninoNoteToolkit::diminish($result);
			$val += 1;
		}

		return $result;
	}
	
}
