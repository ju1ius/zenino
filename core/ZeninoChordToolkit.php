<?php

class ZeninoChordToolkit
{
	public static $CHORD_EXTENSIONS = array(
		'9th'  => array('b9', '9', '#9'),
		'11th' => array('11', '#11'),
		'13th' => array('b13', '13')
	);
	public static $shorthands = array(
		/* TRIADS */
		'M'    => 'majorTriad',
		'Maj'  => 'majorTriad',
		'maj'  => 'majorTriad',
		''     => 'majorTriad',
		'm'    => 'minorTriad',
		'min'  => 'minorTriad',
		'-'    => 'minorTriad',
		'dim'  => 'diminishedTriad',
		'o'    => 'diminishedTriad',
		'aug'  => 'augmentedTriad',
		'+'    => 'augmentedTriad',
		'sus4' => 'sus4Triad',
		'sus'  => 'sus4Triad',
		'sus2' => 'sus2Triad',

		/* SEVENTHS */
		'm7'      => 'minorSeventh',
		'min7'    => 'minorSeventh',
		'-7'      => 'minorSeventh',
		'maj7'    => 'majorSeventh',
		'Maj7'    => 'majorSeventh',
		'M7'      => 'majorSeventh',
		'dom7'    => 'dominantSeventh',
		'7'       => 'dominantSeventh',
		'm7b5'    => 'halfDiminished',
		'min7b5'  => 'halfDiminished',
		'-7b5'    => 'halfDiminished',
		'ø'       => 'halfDiminished',
		'dim7'    => 'diminishedSeventh',
		'o7'      => 'diminishedSeventh',
		'oMaj7'   => 'diminishedMajorSeventh',
		'oM7'     => 'diminishedMajorSeventh',
		'm/M7'    => 'minorMajorSeventh',
		'mM7'     => 'minorMajorSeventh',
		'minMaj7' => 'minorMajorSeventh',
		'-Maj7'   => 'minorMajorSeventh',
		
		/* AUGMENTED SEVENTHS */
		'7#5'       => 'augmentedDominantSeventh',
		'7+'        => 'augmentedDominantSeventh',
		'7+5'       => 'augmentedDominantSeventh',
		'M7#5'      => 'augmentedMajorSeventh',
		'M7+'       => 'augmentedMajorSeventh',
		'M7+5'      => 'augmentedMajorSeventh',
		'Maj7#5'    => 'augmentedMajorSeventh',
		'Maj7+'     => 'augmentedMajorSeventh',
		'Maj7+5'    => 'augmentedMajorSeventh',
		'mM7+'      => 'augmentedMinorMajorSeventh',
		'mM7#5'     => 'augmentedMinorMajorSeventh',
		'minMaj7+'  => 'augmentedMinorMajorSeventh',
		'minMaj7#5' => 'augmentedMinorMajorSeventh',
		'-M7#5'     => 'augmentedMinorMajorSeventh',
		'-Maj7#5'   => 'augmentedMinorMajorSeventh',
		
		/* SUSPENDED CHORDS */
		'7sus4'  => 'dominantSeventhSus4',
		'7sus'   => 'dominantSeventhSus4',
		'sus4b5' => 'dominantSeventhSus4B5',
		'susb5'  => 'dominantSeventhSus4B5',
		'sus4b9' => 'dominantSeventhSus4B9',
		'susb9'  => 'dominantSeventhSus4B9',
		
		/* SIXTHS */
		'm6'   => 'minorSixth',
		'min6' => 'minorSixth',
		'-6'   => 'minorSixth',
		'maj6' => 'majorSixth',
		'M6'   => 'majorSixth',
		'Maj6' => 'majorSixth',
		'6'    => 'majorSixth',

		/* NINTHS */
		'9'    => 'dominantNinth',
		'maj9' => 'majorNinth',
		'Maj9' => 'majorNinth',
		'M9'   => 'majorNinth',
		'm9'   => 'minorNinth',
		'min9' => 'minorNinth',
		'-9'   => 'minorNinth',

		/* ELEVENTHS */
		'm11'   => 'minorEleventh',
		'min11' => 'minorEleventh',
		'-11'   => 'mminorEleventh',

		/* THIRTEENTHS */
		'maj13' => 'majorThirteenth',
		'Maj13' => 'majorThirteenth',
		'M13'   => 'majorThirteenth',
		'min13' => 'minorThirteenth',
		'm13'   => 'minorThirteenth',
		'-13'   => 'minorThirteenth',
		'13'    => 'dominantThirteenth',

		/* ALTERED CHORDS */
		'7b5'  => 'dominantSeventhB5',
		'7alt' => 'dominantAltered'

	);
  protected static $allowed_exts =  array(
    'b9', '9', '#9', '11', '#11', 'b13', '13'
  );
	# A cache for composed triads
	protected static $triadsCache = array();
	# A cache for composed sevenths
	protected static $seventhsCache = array();
	
	/****************************************************************************
	* --------------------------------------------------- UTILS --------------------------------------------------- *
	****************************************************************************/
	
	/*
	* FINDERS
	*/
	public static function fromShortHand($root, $chord_name)
	{
		if(!ZeninoNoteToolkit::isValidNote($root))
		{
			throw new NoteFormatError($note); 
		}
		$chord = array();
		$exts = array();
		// First we cut the extensions from the basic chord
		if(LfmStringUtil::contains('/', $chord_name))
		{
			$parts = explode('/', $chord_name);
			$chord_name = $parts[0];
			$exts = array_slice($parts, 1);
		}
		// Then we return the basic chord
		foreach(self::$shorthands as $name => $function)
		{
			if($name == $chord_name)
			{
				$chord = self::$function($root);
				break;
			}
		}
		// and build the extensions
		foreach($exts as $ext)
		{
			switch($ext)
			{
				case 'b9':
					$chord = array_pad($chord, 5, '');
					$chord[4] = ZeninoIntervalToolkit::minorSecond($root);
					break;
				case '9':
					$chord = array_pad($chord, 5, '');
					$chord[4] = ZeninoIntervalToolkit::majorSecond($root);
					break;
				case '#9':
					$chord = array_pad($chord, 5, '');
					$chord[4] = ZeninoIntervalToolkit::augmentedSecond($root);
					break;
				case '11':
					$chord = array_pad($chord, 6, '');
					$chord[5] = ZeninoIntervalToolkit::perfectFourth($root);
					break;
				case '#11':
					$chord = array_pad($chord, 6, '');
					$chord[5] = ZeninoIntervalToolkit::augmentedFourth($root);
					break;
				case 'b13':
					$chord = array_pad($chord, 7, '');
					$chord[6] = ZeninoIntervalToolkit::minorSixth($root);
					break;
				case '13':
					$chord = array_pad($chord, 7, '');
					$chord[6] = ZeninoIntervalToolkit::majorSixth($root);
					break;
			}
		}
		return $chord;
	}
	
	public static function isValidExt($ext)
	{
		return in_array($ext, self::$allowed_exts);
	}
	
	/*
	* INVERSIONS
	*/
	
	public static function invert($chord, $times=1)
	{
		return LfmArrayUtil::rotate($chord, $times);
	}
	public static function drop2($chord)
	{
		$len = count($chord);
		if($len >= 3)
		{
			$drop2 = $chord[$len - 2];
			unset( $chord[$len - 2] );
			array_unshift($chord, $drop2);
		}
		return $chord;
	}
	public static function drop3($chord)
	{
		$len = count($chord);
		if($len >= 4)
		{
			$drop3 = $chord[$len - 3];
			unset( $chord[$len - 3] );
			array_unshift($chord, $drop3);
		}
		return $chord;
	}
	public static function drop24($chord)
	{
		$len = count($chord);
		if(count($chord) >= 4)
		{
			$drop2 = $chord[$len - 2];
			$drop4 = $chord[$len - 4];
			unset( $chord[$len - 2], $chord[$len - 4] );
			array_unshift($chord, $drop2, $drop4);
		}
		return $chord;
	}
	
	public static function extend($chord, $exts)
	{
		$ninth      = array( 'b9', '9', '#9' );
		$eleventh   = array( '11', '#11' );
		$thirteenth = array( 'b13', '13' );
		foreach($exts as $ext)
		{
			if( in_array($ext, $ninth) )
			{
				$chord[] = ZeninoIntervalToolkit::fromShortHand($chord[0],$ext);
				continue;
			}
			if( in_array($ext, $eleventh) )
			{
				$chord[] = ZeninoIntervalToolkit::fromShortHand($chord[0],$ext);
				continue;
			}
			if( in_array($ext, $thirteenth) )
			{
				$chord[] = ZeninoIntervalToolkit::fromShortHand($chord[0],$ext);
				continue;
			}
		}
		return $chord;
	}
	
	/****************************************************************************
	* --------------------------------------------------- TRIADS ------------------------------------------------- *
	****************************************************************************/
	/*
	* DIATONIC
	*/
	
	/*
	* Returns the triad on $note in $key as an array
	*/
	public static function triad($note, $key)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::third($note, $key),
			ZeninoIntervalToolkit::fifth($note, $key)
		);
	}
	/*
	* Returns all the triads in key. Implemented using a cache.
	*/
	public static function triads($key)
	{
		if( array_key_exists($key, self::$triadsCache) )
      return self::$triadsCache[$key];

    $notes = ZeninoDiatonicToolkit::getNotes($key);
    foreach ($notes as &$note)
    {
      $note = self::triad($note, $key);
    }
		self::$triadsCache[$key] = $notes;
		return $notes;
	}
	
	
	/*
	* ABSOLUTE
	*/
	
	public static function majorTriad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::perfectFifth($note)
		);
	}
	public static function minorTriad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::minorThird($note),
			ZeninoIntervalToolkit::perfectFifth($note)
		);
	}
	public static function diminishedTriad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::minorThird($note),
			ZeninoIntervalToolkit::diminishedFifth($note)
		);
	}
	public static function augmentedTriad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::augmentedFifth($note)
		);
	}
	public static function sus2Triad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::majorSecond($note),
			ZeninoIntervalToolkit::perfectFifth($note)
		);
	}
	public static function sus4Triad($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::perfectFourth($note),
			ZeninoIntervalToolkit::perfectFifth($note)
		);
	}
	/*
	* SHORTCUTS
	*/
	public static function maj($note){ return self::majorTriad($note); }
	public static function min($note){ return self::minorTriad($note); }
	public static function dim($note){ return self::diminishedTriad($note); }
	public static function o($note){ return self::diminishedTriad($note); }
	public static function aug($note){ return self::augmentedTriad($note); }
	public static function sus2($note){ return self::sus2Triad($note); }
	public static function sus4($note){ return self::sus4Triad($note); }
	
	/****************************************************************************
	* -------------------------------------------------- TETRADS ------------------------------------------------- *
	****************************************************************************/
	/*
	* RELATIVE
	*/
	
	/*
	* Returns the seventh chord on note in key.
	*/
	public static function seventh($note, $key)
	{
		$t = self::triad($note, $jey);
		$t[] = ZeninoIntervalToolkit::seventh($note, $key);
		return $t;
	}
	/*
	* Returns all the sevenths chords in $key in an array
	*/
	public static function sevenths($key)
	{
		if( array_key_exists($key, self::$seventhsCache) )
			return self::$seventhsCache[$key];
	  
    $notes = ZeninoDiatonicToolkit::getNotes($key);
    foreach ($notes as &$note)
    {
      $note = self::seventh($note, $key);
    }
		self::$seventhsCache[$key] = $notes;
		return $notes;
	}
	
	/*
	* ABSOLUTE
	*/
	/* MAJOR */
	public static function majorSeventh($note)
	{
		$t = self::majorTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSeventh($note);
		return $t;
	}
	public static function majorSixth($note)
	{
		$t = self::majorTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSixth($note);
		return $t;
	}
	public static function augmentedMajorSeventh($note)
	{
		$t = self::augmentedTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSeventh($note);
		return $t;
	}
	public static function majorSeventhB5($note)
	{
		$t = self::majorSeventh($note);
		$t[2] = ZeninoNoteToolkit::diminish($t[2]);
		return $t;
	}
	/* DOMINANT 7 */
	public static function dominantSeventh($note)
	{
		$t = self::majorTriad($note);
		$t[] = ZeninoIntervalToolkit::minorSeventh($note);
		return $t;
	}
	public static function augmentedDominantSeventh($note)
	{
		$t = self::augmentedTriad($note);
		$t[] = ZeninoIntervalToolkit::minorSeventh($note);
		return $t;
	}
	public static function dominantSeventhB5($note)
	{
		$t = self::dominantSeventh($note);
		$t[2] = ZeninoNoteToolkit::diminish($t[2]);
		return $t;
	}
	/* MINOR */
	public static function minorMajorSeventh($note)
	{
		$t = self::minorTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSeventh($note);
		return $t;
	}
	public static function minorSixth($note)
	{
		$t = self::minorTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSixth($note);
		return $t;
	}
	public static function augmentedMinorMajorSeventh($note)
	{
		$t = self::minorMajorSeventh($note);
		$t[2] = ZeninoNoteToolkit::augment($t[2]);
		return $t;
	}
	public static function minorSeventh($note)
	{
		$t = self::minorTriad($note);
		$t[] = ZeninoIntervalToolkit::minorSeventh($note);
		return $t;
	}
	/* DIMINISHED */
	public static function halfDiminished($note)
	{
		$t = self::diminishedTriad($note);
		$t[] = ZeninoIntervalToolkit::minorSeventh($note);
		return $t;
	}
	public static function diminishedSeventh($note)
	{
		$t = self::diminishedTriad($note);
		$t[] = ZeninoIntervalToolkit::diminishedSeventh($note);
		return $t;
	}
	public static function diminishedMajorSeventh($note)
	{
		$t = self::diminishedTriad($note);
		$t[] = ZeninoIntervalToolkit::majorSeventh($note);
		return $t;
	}
	/* SUS */
	public static function dominantSeventhSus4($note)
	{
		$t = self::sus4Triad($note);
		$t[] = ZeninoIntervalToolkit::minorSeventh($note);
		return $t;
	}
	public static function dominantSeventhSus4B5($note)
	{
		$t = self::dominantSeventhSus4($note);
		$t[2] = ZeninoNoteToolkit::diminish($t[2]);
		return $t;
	}
	
	/*
	* SHORTCUTS
	*/
	public static function Maj7($note){ return self::majorSeventh($note); }
	public static function Maj6($note){ return self::majorSixth($note); }
	public static function Maj7x5($note){ return self::majorSeventh($note); }
	public static function Maj7b5($note){ return self::majorSeventhB5($note); }
	public static function Maj7x4($note){ return self::majorSeventhB5($note); }
	
	public static function dom7($note){ return self::dominantSeventh($note); }
	public static function dom7x5($note){ return self::augmentedDominantSeventh($note); }
	public static function dom7b5($note){ return self::augmentedDominantSeventh($note); }
	public static function dom7sus4($note){ return self::dominantSeventhSus4($note); }
	public static function sus4b5($note){ return self::dominantSeventhSus4B5($note); }
	
	public static function minMaj7($note){ return self::minorMajorSeventh($note); }
	public static function min6($note){ return self::minorSixth($note); }
	public static function minMaj7x5($note){ return self::augmentedMinorMajorSeventh($note); }
	public static function min7($note){ return self::minorSeventh($note); }
	
	public static function min7b5($note){ return self::halfDiminished($note); }
	public static function o7($note){ return self::diminishedSeventh($note); }
	public static function oMaj7($note){ return self::diminishedMajorSeventh($note); }

	
	
	/****************************************************************************
	* ----------------------------------------------- EXTENSIONS ----------------------------------------------- *
	****************************************************************************/
	
	public static function majorNinth($note)
	{
		$t = self::majorSeventh($note);
		$t[] = ZeninoIntervalToolkit::majorSecond($note);
		return $t;
	}
	public static function dominantNinth($note)
	{
		$t = self::dominantSeventh($note);
		$t[] = ZeninoIntervalToolkit::majorSecond($note);
		return $t;
	}
	public static function minorNinth($note)
	{
		$t = self::minorSeventh($note);
		$t[] = ZeninoIntervalToolkit::majorSecond($note);
		return $t;
	}
	public static function dominantSeventhSus4B9($note)
	{
		$t = self::dominantSeventhSus4($note);
		$t[] = ZeninoIntervalToolkit::minorSecond($note);
		return $t;
	}
	
	public static function minorEleventh($note)
	{
		$t = self::minorSeventh($note);
		$t[] = ZeninoIntervalToolkit::majorSecond($note);
		$t[] = ZeninoIntervalToolkit::perfectFourth($note);
		return $t;
	}
	
	public static function dominantThirteenth($note)
	{
		$t = self::dominantSeventh($note);
		array_push($t,
			ZeninoIntervalToolkit::majorSecond($note),
			//ZeninoIntervalToolkit::augmentedFourth($note),
			ZeninoIntervalToolkit::majorSixth($note)
		);
		return $t;
	}
	public static function minorThirteenth($note)
	{
		$t = self::minorSeventh($note);
		array_push($t,
			ZeninoIntervalToolkit::majorSecond($note),
			ZeninoIntervalToolkit::perfectFourth($note),
			ZeninoIntervalToolkit::majorSixth($note)
		);
		return $t;
	}
	
	public static function dominantAltered($note)
	{
		$t = self::dominantSeventh($note);
		array_push($t,
			ZeninoIntervalToolkit::augmentedSecond($note),
			//ZeninoIntervalToolkit::augmentedFourth($note),
			ZeninoIntervalToolkit::minorSixth($note)
		);
		return $t;
	}
	
	/*
	* SHORTCUTS 
	*/
	public static function dom9($note){ return self::dominantNinth($note); }
	public static function sus4b9($note){ return self::dominantSeventhSus4B9($note); }
	public static function maj9($note){ return self::majorNinth($note); }
	public static function min9($note){ return self::minorNinth($note); }
	public static function min11($note){ return self::minorEleventh($note); }
	public static function dom13($note){ return self::dominantThirteenth($note); }
	public static function maj13($note){ return self::majorThirteenth($note); }
	public static function min13($note){ return self::minorThirteenth($note); }
	public static function alt($note){ return self::dominantAltered($note); }

}
