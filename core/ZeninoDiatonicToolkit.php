<?php
/*
require_once 'exception/NoteFormatError.php';
require_once 'exception/KeyError.php';
require_once 'exception/RangeError.php';
require_once 'ZeninoNoteToolkit.php';
*/
class ZeninoDiatonicToolkit
{
	public static $BASIC_KEYS = array(
		'Gb', 'Db', 'Ab', 'Eb', 'Bb', 'F', 'C', 'G', 'D', 'A', 'E', 'B', 'F#', 'C#', 'G#', 'D#', 'A#'
	);

	protected static $keyCache = array();
  
  
  /*
    * Returns an ordered list of the notes in this key.
    * For example: if the key is set to 'F', this function will return ['F', 'G', 'A', 'Bb', 'C', 'D', 'E']
    * Exotic or ridiculous keys like 'C####' or even 'Gbb##bb#b##' will work;
    * Note however that the latter example will also get cleaned up to 'G'. 
    * This function will raise an !NoteFormatError if the key isn't recognised
    */
  public static function getNotes($key)
  {
    // check cache
		if( array_key_exists($key, self::$keyCache) )
		{
      return self::$keyCache[$key];
    }

		if( !ZeninoNoteToolkit::isValidNote($key) )
		{
			throw new NoteFormatError($key);
		}
		$base_note = $key[0];
		$alts = implode( '', ZeninoNoteToolkit::getAccidentals($key) );
		
		$fifth_index = array_search($base_note, ZeninoNoteToolkit::$FIFTHS);
		$results = array();
		
		// fifth_index = 0 is a special case. It's the key of F and needs 
		// Bb instead of B included in the result.
		
		if($fifth_index !== 0)
		{
			$results[] = ZeninoNoteToolkit::$FIFTHS[($fifth_index - 1) % 7] . $alts;
			
			//$len = count(ZeninoNoteToolkit::$FIFTHS);
      $len = 7;
      for($i = $fifth_index; $i < $len; $i++)
			{
				$results[] = ZeninoNoteToolkit::$FIFTHS[$i] . $alts;
			}
			
			$len = $fifth_index - 1;
			for($i = 0; $i < $len; $i++)
			{
				$results[] = ZeninoNoteToolkit::$FIFTHS[$i] . $alts . '#';
			}
		}
		else
		{
			for($i = 0; $i < 6; $i++)
			{
				$results[] = ZeninoNoteToolkit::$FIFTHS[$i] . $alts;
			}
			$results[] = 'Bb' . $alts;
		}

    // Remove redundant #'s and b's from the result
    foreach ($results as &$note)
    {
      $note = ZeninoNoteToolkit::removeRedundantAccidentals($note);
    }
		sort($results);

		$tonic = array_search(ZeninoNoteToolkit::removeRedundantAccidentals($key), $results);
		$results = LfmArrayUtil::rotate($results, $tonic);
		
		// Save result to cache
		self::$keyCache[$key] = $results;
		
		return $results;
  }
  
 /*
  * A better implementation of int_to_note found in the ZeninoNoteToolkit class.
  * This version bears the key in mind and thus creates theoretically correct notes.
  * Will throw a  RangeError if `$note_int` is not in range(0,12)
  */
  public static function intToNote($note_int, $key)
  {
		if(!ZeninoNoteToolkit::inRange($note_int))
		{
			throw new RangeError($note_int, '(0..11)');
		}
		$intervals = array(0, 2, 4, 5, 7, 9, 11);
    $current = ZeninoNoteToolkit::noteToInt($key);

    $known_intervals = array();
    foreach($intervals as $interval)
    {
      $known_intervals[] = ($interval + $current) % 12;
    }

		$known_notes = self::getNotes($key);
		
		if(in_array($note_int, $known_intervals))
		{
			return $known_notes[array_search($note_int, $known_intervals)];
		}
    else if(in_array($note_int - 1, $known_intervals))
    {
      return $known_notes[array_search($note_int - 1, $known_intervals)] . '#';
    }
		else if(in_array($note_int + 1, $known_intervals))
    {
			return $known_notes[array_search($note_int + 1, $known_intervals)] . 'b';
		}
  }
  
 /*
  * Returns the note found at the interval starting from $start_note in the given key.
  * For example interval('C', 'D', 1) will return 'E'.
  * Will raise a !KeyError if the $start_note is not a valid note.
  */
  public static function interval($key, $start_note, $interval)
  {
    if( !ZeninoNoteToolkit::isValidNote($start_note) )
    {
      throw new NoteFormatError($start_note);
    }
    
    $notes_in_key = self::getNotes($key);
    foreach($notes_in_key as $note)
    {
      if($note[0] == $start_note[0])
      {
        $start_index = array_search($note, $notes_in_key);
      }
    }
    $index = LfmMathUtil::modulus($start_index + $interval, 7);
    return $notes_in_key[$index];
  }
  
}
