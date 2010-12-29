<?php
/*
require_once 'exception/NoteFormatError.php';
require_once 'exception/RangeError.php';
require_once 'Zenino_Interval_Toolkit.php';
*/

class ZeninoNoteToolkit
{

	public static $NOTES = array(
		'C' => 0, 
		'D' => 2,
		'E' => 4,
		'F' => 5, 
		'G' => 7,
		'A' => 9,
		'B' => 11 
	);
	
	public static $CHROMATICS = array(
		'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'
	);
	
	public static $FIFTHS = array(
		'F', 'C', 'G', 'D', 'A', 'E', 'B'
	);
	
	/*
	* Converts integers in the range of 0-11 to notes in the form of C or C# (no Cb).
	* You can use int_to_note in diatonic_key to
	* do theoretically correct conversions that bear the key in mind.
	* Throws a !RangeError exception if the note_int is not in range(0,12).
	*/
	public static function intToNote($int)
	{
		if(!self::inRange($int)) throw new RangeError($int, '(0..11)');

		return self::$CHROMATICS[$int];
	}
	
	/*
	* Converts notes in the form of C, C#, Cb, C##, etc... to
	* an integer in the range of 0-11.
	* Throws an !NoteFormatError exception if the note format is not recognised.
	*/
	public static function noteToInt($note)
	{
		if(!self::isValidNote($note)) throw new NoteFormatError($note);			
		
		$notes = ZeninoTablesOfTheLaw::notes();
		$val = $notes[$note[0]];
		
		// Check for '#' and 'b' postfixes
		$alts = self::getAccidentals($note);
		foreach($alts as $alt)
		{
			if($alt == 'b')
				$val -= 1;
			else if ($alt == '#')
				$val += 1;
		}

		return LfmMathUtil::modulus($val, 12);
	}
	
	/*
	* Test whether note1 and note2 are enharmonic, ie. they sound the same
	*/
	public static function isEnharmonic($note1, $note2)
	{
		return self::noteToInt($note1) == self::noteToInt($note2);
	}
	
	/*
	*  Removes redundant #'s and b's from the given note. 
	*  For example: C##b becomes C#, Eb##b becomes E, etc...
	*/
	public static function removeRedundantAccidentals($note)
	{
    if(!self::isValidNote($note)) throw new NoteFormatError($note);
		if(strlen($note) < 2) return $note;
		
		$val = 0;
		$alts = self::getAccidentals($note);
		foreach($alts as $alt)
		{
			if($alt == 'b')
				$val -= 1;
			else if($alt == '#')
				$val += 1;
		}

		$result = $note[0];
		while($val > 0)
		{
			$result = self::augment($result);
			$val -= 1;
		}
		while($val < 0)
		{
			$result = self::diminish($result);
			$val += 1;
		}

		return $result;
	}
	
	public static function augment($note)
	{
		if(substr($note, -1) !== 'b')
			return $note.'#';
		else
			return substr($note, 0, -1);
	}
	public static function diminish($note)
	{
		if(substr($note, -1) !== '#')
			return $note.'b';
		else
			return substr($note, 0, -1);
	}
	
	/*
	* returns the relative major of a note
	*/
	public static function toMajor($note)
	{
		return ZeninoIntervalToolkit::minorThird($note);
	}
	/*
	* returns the relative minor of a note
	*/
	public static function toMinor ($note)
	{
		return ZeninoIntervalToolkit::majorSixth($note);
	}
	
	/*
	* Returns true if note is in a recognised format. False if not
	*/
	public static function isValidNote($note_name)
	{
		if( !array_key_exists($note_name[0], self::$NOTES) )
			return false;
		
		$alts = self::getAccidentals($note_name);
		foreach($alts as $alt)
		{
			if($alt !== 'b' && $alt !== '#') return false;
		}
		
		return true;
	}
	
	public static function getAccidentals($note)
	{
		if( strlen($note) > 1 )
			return str_split( substr($note, 1) );
		else
			return array();
	}
	
	protected static function inRange($int)
	{
		return in_array( $int, range(0,11) );
	}

}