<?php

class ZeninoScaleToolkit
{
	/*
	* Determines the kind of scale.
	* does not deal with enharmonics on exotic modes
	* for example: #2 <> b3 , etc
	*/
	public static function determine($scale)
	{
		$tonic = $scale[0];
		unset($scale[0]);
		$comp_base = '1';
		foreach($scale as $degree)
		{
			$comp_base .= ZeninoIntervalToolkit::determine($tonic, $degree);
		}
		foreach(ZeninoTablesOfTheLaw::modes() as $name => $props)
		{
			if($comp_base == $props['uid'])
			{
				return array_merge( array('tonic' => $tonic, 'name' => $name), $props );
			}
		}
		return array();
	}
	
	/***************************************************************************
	* ------------------------------------------------ MAJOR MODES ------------------------------------------- *
	****************************************************************************/
	
	/*
	* Returns the diatonic scale starting on $note.
	*/
	public static function diatonic($note)
	{
		return ZeninoDiatonicToolkit::getNotes($note);
	}
	/*
	* Returns the ionian mode scale starting on $note.
	*/
	public static function ionian($note)
	{
		return self::diatonic($note);
	}
	/*
	* Returns the ionian mode scale starting on $note.
	*/
	public static function dorian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::minorSeventh($note));
		return LfmArrayUtil::rotate($i, 1);
	}
	/*
	* Returns the phrygian mode scale starting on $note.
	*/
	public static function phrygian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::minorSixth($note));
		return LfmArrayUtil::rotate($i, 2);
	}
	/*
	* Returns the lydian mode scale starting on $note.
	*/
	public static function lydian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::perfectFifth($note));
		return LfmArrayUtil::rotate($i, 3);
	}
	/*
	* Returns the myxolydian mode scale starting on $note.
	*/
	public static function myxolydian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::perfectFourth($note));
		return LfmArrayUtil::rotate($i, 4);
	}
	/*
	* Returns the aeolian mode scale starting on $note.
	*/
	public static function aeolian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::minorThird($note));
		return LfmArrayUtil::rotate($i, 5);
	}
	/*
	* Returns the locrian mode scale starting on $note.
	*/
	public static function locrian($note)
	{
		$i = self::ionian(ZeninoDiatonicToolkit::minorSecond($note));
		return LfmArrayUtil::rotate($i, 6);
	}
	
	/***************************************************************************
	* --------------------------------------- HARMONIC MAJOR MODES -------------------------------------- *
	***************************************************************************/
	
	/*
	* Returns the harmonic major scale starting on $note.
	*/
	public static function harmonicMajor($note)
	{
		$maj = self::ionian($note);
		$maj[6] = ZeninoNoteToolkit::diminish($maj[6]);
		return $maj;
	}
	public static function harmonicMajor2($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::minorSeventh($note));
		return LfmArrayUtil::rotate($rel, 1);
	}
	public static function harmonicMajor3($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::minorSixth($note));
		return LfmArrayUtil::rotate($rel, 2);
	}
	public static function harmonicMajor4($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::perfectFifth($note));
		return LfmArrayUtil::rotate($rel, 3);
	}
	public static function harmonicMajor5($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::perfectFourth($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function harmonicMajor6($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::majorThird($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function harmonicMajor7($note)
	{
		$rel = self::harmonicMajor(ZeninoIntervalToolkit::minorSecond($note));
		return LfmArrayUtil::rotate($rel, 5);
	}
	/*
	* SHORTCUTS
	*/
	public static function locrianN2N6($note){ return self::harmonicMajor2($note); }
	public static function locrianN5($note){ return self::harmonicMajor3($note); }
	public static function melodicMinorX4($note){ return self::harmonicMajor4($note); }
	public static function mixolydianB2($note){ return self::harmonicMajor5($note); }
	public static function lydianX2X5($note){ return self::harmonicMajor6($note); }
	public static function locrianBB7($note){ return self::harmonicMajor7($note); }
	
	
	/***************************************************************************
	* --------------------------------------------- MINOR MODES --------------------------------------------- *
	***************************************************************************/
	
	/*
	* Returns the natural minor scale starting on $note.
	*/
	public static function naturalMinor($note)
	{
		$s = ZeninoDiatonicToolkit::getNotes(ZeninoNoteToolkit::toMajor($note));
		return LfmArrayUtil::rotate($s, 5);
	}
	
	/***************************************************************************
	* --------------------------------------- HARMONIC MINOR MODES -------------------------------------- *
	***************************************************************************/
	
	/*
	* Returns the harmonic minor scale starting on $note.
	*/
	public static function harmonicMinor($note)
	{
		$nat = self::naturalMinor($note);
		$nat[6] = ZeninoNoteToolkit::augment($nat[6]);
		return $nat;
	}
	public static function harmonicMinor2($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::minorSeventh($note));
		return LfmArrayUtil::rotate($rel, 1);
	}
	public static function harmonicMinor3($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::majorSixth($note));
		return LfmArrayUtil::rotate($rel, 2);
	}
	public static function harmonicMinor4($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::perfectFifth($note));
		return LfmArrayUtil::rotate($rel, 3);
	}
	public static function harmonicMinor5($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::perfectFourth($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function harmonicMinor6($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::majorThird($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function harmonicMinor7($note)
	{
		$rel = self::harmonicMinor(ZeninoIntervalToolkit::minorSecond($note));
		return LfmArrayUtil::rotate($rel, 5);
	}
	/*
	* SHORTCUTS
	*/
	public static function locrianN6($note){ return self::harmonicMinor2($note); }
	public static function ionianX5($note){ return self::harmonicMinor3($note); }
	public static function dorianX4($note){ return self::harmonicMinor4($note); }
	public static function phrygianMajor($note){ return self::harmonicMinor5($note); }
	public static function lydianX2($note){ return self::harmonicMinor6($note); }
	public static function superLocrianBB7($note){ return self::harmonicMinor7($note); }
	
	/***************************************************************************
	* --------------------------------------- MELODIC MINOR MODES ---------------------------------------- *
	***************************************************************************/
	
	/*
	* Returns the locrian mode scale starting on $note.
	*/
	public static function melodicMinor($note)
	{
		$har = self::harmonicMinor($note);
		$har[5] = ZeninoNoteToolkit::augment($har[5]);
		return $har;
	}
	//
	public static function melodicMinor2($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::minorSeventh($note));
		return LfmArrayUtil::rotate($rel, 1);
	}
	public static function melodicMinor3($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::majorSixth($note));
		return LfmArrayUtil::rotate($rel, 2);
	}
	public static function melodicMinor4($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::perfectFifth($note));
		return LfmArrayUtil::rotate($rel, 3);
	}
	public static function melodicMinor5($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::perfectFourth($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function melodicMinor6($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::minorThird($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function melodicMinor7($note)
	{
		$rel = self::melodicMinor(ZeninoIntervalToolkit::minorSecond($note));
		return LfmArrayUtil::rotate($rel, 5);
	}
	/*
	* SHORTCUTS
	*/
	public static function dorianB2($note){ return self::melodicMinor2($note); }
	public static function phrygianN6($note){ return self::melodicMinor2($note); }
	public static function lydianX5($note){ return self::melodicMinor3($note); }
	public static function lydianB7($note){ return self::melodicMinor4($note); }
	public static function bartok($note){ return self::melodicMinor4($note); }
	public static function mixolydianB6($note){ return self::melodicMinor5($note); }
	public static function locrianN2($note){ return self::melodicMinor6($note); }
	public static function superLocrian($note){ return self::melodicMinor7($note); }
	public static function altered($note){ return self::melodicMinor7($note); }
	
	
	/***************************************************************************
	* --------------------------------------- DOUBLE HARMONIC MODES ------------------------------------- *
	***************************************************************************/
	
	public static function doubleHarmonic($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::minorSecond($note),
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::perfectFourth($note),
			ZeninoIntervalToolkit::perfectFifth($note),
			ZeninoIntervalToolkit::minorSixth($note),
			ZeninoIntervalToolkit::majorSeventh($note),
		);
	}
	public static function doubleHarmonic2($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::majorSeventh($note));
		return LfmArrayUtil::rotate($rel, 1);
	}
	public static function doubleHarmonic3($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::minorSixth($note));
		return LfmArrayUtil::rotate($rel, 2);
	}
	public static function doubleHarmonic4($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::perfectFifth($note));
		return LfmArrayUtil::rotate($rel, 3);
	}
	public static function doubleHarmonic5($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::perfectFourth($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function doubleHarmonic6($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::majorThird($note));
		return LfmArrayUtil::rotate($rel, 4);
	}
	public static function doubleHarmonic7($note)
	{
		$rel = self::doubleHarmonic(ZeninoIntervalToolkit::minorSecond($note));
		return LfmArrayUtil::rotate($rel, 5);
	}
	/*
	* SHORTCUTS
	*/
	public static function lydianX2X6($note){ return self::doubleHarmonic2($note); }
	public static function superLocrianN5BB7($note){ return self::doubleHarmonic3($note); }
	public static function hungarianMinor($note){ return self::doubleHarmonic4($note); }
	public static function dh4($note){ return self::doubleHarmonic4($note); }
	public static function oriental($note){ return self::doubleHarmonic5($note); }
	public static function dh5($note){ return self::doubleHarmonic5($note); }
	public static function ionianX2X5($note){ return self::doubleHarmonic6($note); }
	public static function locrianBB3BB7($note){ return self::doubleHarmonic7($note); }
	
	
	
	
	/***************************************************************************
	* ----------------------------------------------- EXOTIC MODES ------------------------------------------- *
	***************************************************************************/
	
	/*
	* Returns the whole tone scale starting on $note.
	*/
	public static function wholeTone($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::majorSecond($note),
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::augmentedFourth($note),
			ZeninoIntervalToolkit::augmentedFifth($note),
			ZeninoIntervalToolkit::minorSeventh($note)
		);
	}

	/*
	* Returns the diminished scale starting on $note.
	*/
	public static function diminished($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::majorSecond($note),
			ZeninoIntervalToolkit::minorThird($note),
			ZeninoIntervalToolkit::perfectFourth($note),
			ZeninoIntervalToolkit::diminishedFifth($note),
			ZeninoIntervalToolkit::minorSixth($note),
			ZeninoIntervalToolkit::diminishedSeventh($note),
			ZeninoIntervalToolkit::majorSeventh($note)
		);
	}
	public static function diminished2($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::minorSecond($note),
			ZeninoIntervalToolkit::augmentedSecond($note),
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::augmentedFourth($note),
			ZeninoIntervalToolkit::perfectFifth($note),
			ZeninoIntervalToolkit::majorSixth($note),
			ZeninoIntervalToolkit::minorSeventh($note),
		);
	}
	public static function bertha($note){ return self::diminished2($note); }
	
	/*
	* Returns the augmented scale starting on $note.
	*/
	public static function augmented($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::augmentedSecond($note),
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::perfectFifth($note),
			ZeninoIntervalToolkit::minorSixth($note),
			ZeninoIntervalToolkit::majorSeventh($note)
		);
	}
	public static function augmented2($note)
	{
		return array(
			$note,
			ZeninoIntervalToolkit::minorSecond($note),
			ZeninoIntervalToolkit::majorThird($note),
			ZeninoIntervalToolkit::perfectFourth($note),
			ZeninoIntervalToolkit::perfectFifth($note),
			ZeninoIntervalToolkit::minorSixth($note),
			ZeninoIntervalToolkit::diminishedSeventh($note),
		);
	}

}