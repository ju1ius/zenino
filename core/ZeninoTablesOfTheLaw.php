<?php

class ZeninoTablesOfTheLaw
{
	public static function notes(){ return self::$notes; }
	protected static $notes = array(
		'C' => 0, 
		'D' => 2,
		'E' => 4,
		'F' => 5, 
		'G' => 7,
		'A' => 9,
		'B' => 11 
	);
	
	public static function chromaticScale(){ return self::$chromatic; }
	public static $chromatic = array(
		'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'
	);
	
	public static function cycleOfFifths(){ return self::$fifths; }
	public static $fifths = array(
		'F', 'C', 'G', 'D', 'A', 'E', 'B'
	);

	public static function modes(){ return self::$modes; }
	public static function modesNames(){ return array_keys(self::$modes); }
	protected static $modes = array(
		/*******************************************************************************************
		================================================ MAJOR MODES ===============================================
		*******************************************************************************************/
		'ionian' => array(
			'parent' => 'ionian',
			'uid' => '1234567',
			'degree' => 1,
			'chords' => array(
				'Maj13',
				'min13',
				'min11/b9/b13',
				'Maj9/#11/13',
				'13',
				'min11/b13',
				'ø/b9/11/b13'
			),
			'cadential_notes' => array(3, 7),
			'cadential_chords' => array(5)
		),
		'dorian' => array(
			'parent' => 'ionian',
			'uid' => '12b3456b7',
			'degree' => 2,
			'cadential_notes' => array(6),
			'cadential_chords' => array(2, 4, 7)
		),
		'phrygian' => array(
			'parent' => 'ionian',
			'uid' => '1b2b345b6b7',
			'degree' => 3,
			'cadential_notes' => array(2),
			'cadential_chords' => array(2, 3, 7)
		),
		'lydian' => array(
			'parent' => 'ionian',
			'uid' => '123#4567',
			'degree' => 4,
			'cadential_notes' => array(4),
			'cadential_chords' => array(2, 5, 7)
		),
		'mixolydian' => array(
			'parent' => 'ionian',
			'uid' => '123456b7',
			'degree' => 5,
			'cadential_notes' => array(7),
			'cadential_chords' => array(5, 7)
		),
		'aeolian' => array(
			'parent' => 'ionian',
			'uid' => '12b345b6b7',
			'degree' => 6,
			'cadential_notes' => array(6),
			'cadential_chords' => array(4, 6, 7)
		),
		'locrian' => array(
			'parent' => 'ionian',
			'uid' => '1b2b34b5b6b7',
			'degree' => 7,
			'cadential_notes' => array(2, 5),
			'cadential_chords' => array(2, 3, 5, 7)
		),
		/*******************************************************************************************
		============================================ MELODIC MINOR MODES ==========================================
		*******************************************************************************************/
		'melodicMinor' => array(
			'parent' => 'melodic minor',
			'uid' => '12b34567',
			'degree' => 1,
			'chords' => array(
				'minMaj7/9/11/13',
				'min13/b9',
				'Maj7#5/9/#11/13',
				'13/#11',
				'9/b13',
				'ø/9/11/b13',
				'7#5/#9/b13'
			),
			'cadential_notes' => array(3, 7),
			'cadential_chords' => array(5, 7)
		),
		'phrygianN6' => array(
			'parent' => 'melodic minor',
			'uid' => '1b2b3456b7',
			'degree' => 2,
			'cadential_notes' => array(2, 6),
			'cadential_chords' => array(2, 7)
		),
		'lydianX5' => array(
			'parent' => 'melodic minor',
			'uid' => '123#4#567',
			'degree' => 3,
			'cadential_notes' => array(4, 5),
			'cadential_chords' => array(2, 7)
		),
		'lydianB7' => array(
			'parent' => 'melodic minor',
			'uid' => '123#456b7',
			'degree' => 4,
			'cadential_notes' => array(4, 7),
			'cadential_chords' => array(2, 5, 7)
		),
		'mixolydianB6' => array(
			'parent' => 'melodic minor',
			'uid' => '12345b6b7',
			'degree' => 5,
			'cadential_notes' => array(6, 7),
			'cadential_chords' => array(4, 6, 7)
		),
		'locrianN2' => array(
			'parent' => 'melodic minor',
			'uid' => '12b34b5b6b7',
			'degree' => 6,
			'cadential_notes' => array(2, 5),
			'cadential_chords' => array(3, 5, 7)
		),
		'superLocrian' => array(
			'parent' => 'melodic minor',
			'uid' => '1b2b3b4b5b6b7',
			'degree' => 7,
			'cadential_notes' => array(2, 4, 5),
			'cadential_chords' => array(2, 5)
		),
		/*******************************************************************************************
		=========================================== HARMONIC MINOR MODES =========================================
		*******************************************************************************************/
		'harmonicMinor' => array(
			'parent' => 'harmonic minor',
			'uid' => '12b345b67',
			'degree' => 1,
			'chords' => array(
				'minMaj7/9/11/b13',
				'ø/b9/11/b13',
				'Maj7#5/9/13',
				'min13/#11',
				'7/b9/b13',
				'Maj13/#9/#11',
				'dim7',
			),
			'cadential_notes' => array(3, 6, 7),
			'cadential_chords' => array(5, 7)
		),
		'locrianN6' => array(
			'parent' => 'harmonic minor',
			'uid' => '1b2b34b56b7',
			'degree' => 2,
			'cadential_notes' => array(2, 5, 6),
			'cadential_chords' => array(2, 5, 7)
		),
		'ionianX5' => array(
			'parent' => 'harmonic minor',
			'uid' => '1234#567',
			'degree' => 3,
			'cadential_notes' => array(5),
			'cadential_chords' => array(1)
		),
		'dorianX4' => array(
			'parent' => 'harmonic minor',
			'uid' => '12b3#456b7',
			'degree' => 4,
			'cadential_notes' => array(4, 6),
			'cadential_chords' => array(2, 7)
		),
		'phrygianMajor' => array(
			'parent' => 'harmonic minor',
			'uid' => '1b2345b6b7',
			'degree' => 5,
			'cadential_notes' => array(2, 3),
			'cadential_chords' => array(2, 7)
		),
		'lydianX2' => array(
			'parent' => 'harmonic minor',
			'uid' => '1#23#4567',
			'degree' => 6,
			'cadential_notes' => array(2, 4),
			'cadential_chords' => array(5, 7)
		),
		'superLocrianBB7' => array(
			'parent' => 'harmonic minor',
			'uid' => '1b2b3b4b5b6bb7',
			'degree' => 7,
			'cadential_notes' => array(2, 4, 5, 7),
			'cadential_chords' => array(5)
		),
		/*******************************************************************************************
		========================================== HARMONIC MAJOR MODES ==========================================
		*******************************************************************************************/
		'harmonicMajor' => array(
			'parent' => 'harmonic major',
			'uid' => '12345b67',
			'degree' => 1,
			'chords' => array(						
				'Maj9/b13',
				'ø/9/11/13',
				'min7/b9/b13',
				'minMaj7/9/#11/13',
				'13/b9',
				'Maj7#5/#9/#11/13',
				'dim7/b9/11/b13',
			),
			'cadential_notes' => array(3, 6, 7),
			'cadential_chords' => array(5, 7)
		),
		'dorianB5' => array(
			'parent' => 'harmonic major',
			'uid' => '12b34b56b7',
			'degree' => 2,
			'cadential_notes' => array(2, 5, 6),
			'cadential_chords' => array(2, 7)
		),
		'superLocrianN5' => array(
			'parent' => 'harmonic major',
			'uid' => '1b2b3b45b6b7',
			'degree' => 2,
			'cadential_notes' => array(4, 5),
			'cadential_chords' => array(2, 4, 6)
		),
		'melodicMinorX4' => array(
			'parent' => 'harmonic major',
			'uid' => '12b3#4567',
			'degree' => 4,
			'cadential_notes' => array(3, 4),
			'cadential_chords' => array(2, 5, 7)
		),
		'mixolydianB2' => array(
			'parent' => 'harmonic major',
			'uid' => '1b23456b7',
			'degree' => 5,
			'cadential_notes' => array(2, 7),
			'cadential_chords' => array(2, 7)
		),
		'lydianX5X2' => array(
			'parent' => 'harmonic major',
			'uid' => '1#23#4#567',
			'degree' => 6,
			'cadential_notes' => array(2, 5, 4),
			'cadential_chords' => array(5)
		),
		'locrianBB7' => array(
			'parent' => 'harmonic major',
			'uid' => '1b2b34b5b6bb7',
			'degree' => 7,
			'cadential_notes' => array(5, 7),
			'cadential_chords' => array(5)
		),
		/*******************************************************************************************
		========================================== DOUBLE HARMONIC MODES =========================================
		*******************************************************************************************/
		'doubleHarmonic' => array(
			'parent' => 'double harmonic',
			'uid' => '1b2345b67',
			'degree' => 1,
			'chords' => array(						
				'Maj7/b13',
				'Maj7/#9/#11',
				'min6',
				'minMaj7/9/#11/b13',
				'7b5/b9/13',
				'Maj7#5/#9/13',
				'NC'
			),
			'cadential_notes' => array(2, 3, 7),
			'cadential_chords' => array(2)
		),
		'lydianX2X6' => array(
			'parent' => 'double harmonic',
			'uid' => '1#23#45#67',
			'degree' => 2,
			'cadential_notes' => array(2, 4, 6),
			'cadential_chords' => array(2, 7)
		),
		'superLocrianN5BB7' => array(
			'parent' => 'double harmonic',
			'uid' => '1b2b3b45b6bb7',
			'degree' => 3,
			'cadential_notes' => array(4, 5, 7),
			'cadential_chords' => array(3, 6, 7)
		),
		'hungarianMinor' => array(
			'parent' => 'double harmonic',
			'uid' => '12b3#45b67',
			'degree' => 4,
			'cadential_notes' => array(4, 6),
			'cadential_chords' => array(7)
		),
		'oriental' => array(
			'parent' => 'double harmonic',
			'uid' => '1b234b567',
			'degree' => 5,
			'cadential_notes' => array(3, 5),
			'cadential_chords' => array(6)
		),
		'ionianX2X5' => array(
			'parent' => 'double harmonic',
			'uid' => '1#234#567',
			'degree' => 6,
			'cadential_notes' => array(2, 5),
			'cadential_chords' => array(3, 5, 7)
		),
		'locrianBB3BB7' => array(
			'parent' => 'double harmonic',
			'uid' => '1b2bb34b5b6bb7',
			'degree' => 7,
			'cadential_notes' => array(3, 5, 7),
			'cadential_chords' => array(3, 5)
		),
		/*******************************************************************************************
		============================================== IONIAN #2 MODES =============================================
		*******************************************************************************************/
		'ionianX2' => array(
			'parent' => 'ionian #2',
			'uid' => '1#234567',
			'degree' => 1,
		),
		'phrygianN7' => array(
			'parent' => 'ionian #2',
			'uid' => '1b2b345b67',
			'degree' => 3,
		),
		'lydianX6' => array(
			'parent' => 'ionian #2',
			'uid' => '123#45#67',
			'degree' => 4,
		),
		'mixolydianX5' => array(
			'parent' => 'ionian #2',
			'uid' => '1234#56b7',
			'degree' => 5,
		),
		'aeolianX4' => array(
			'parent' => 'ionian #2',
			'uid' => '12b3#45b6b7',
			'degree' => 6,
		),
		'locrianMajor' => array(
			'parent' => 'ionian #2',
			'uid' => '1b234b5b6b7',
			'degree' => 7,
		),
		/*******************************************************************************************
		========================================== MELODIC MINOR #5 MODES ========================================
		*******************************************************************************************/
		'melodicMinorX5' => array(
			'parent' => 'melodic minor #5',
			'uid' => '12b34#567',
			'degree' => 1,
		),
		'phrygianN6X4' => array(
			'parent' => 'melodic minor #5',
			'uid' => '1b2b3#456b7',
			'degree' => 2,
		),
		'lydianB7X2' => array(
			'parent' => 'melodic minor #5',
			'uid' => '1#23#456b7',
			'degree' => 4,
		),
		'locrianN2N7' => array(
			'parent' => 'melodic minor #5',
			'uid' => '12b34b5b67',
			'degree' => 6,
		),
		/*******************************************************************************************
		=============================================== ARABIAN MODES ==============================================
		*******************************************************************************************/
		'arabian' => array(
			'parent' => 'arabian',
			'uid' => '1234b5b6b7',
			'degree' => 1,
		),
		'superLocrianN2' => array(
			'parent' => 'arabian',
			'uid' => '12b3b4b5b6b7',
			'degree' => 2,
		),
		'phrygianN6N7' => array(
			'parent' => 'arabian',
			'uid' => '1b2b34567',
			'degree' => 4,
		),
		'ionianX2X5X6' => array(
			'parent' => 'arabian',
			'uid' => '1#234#5#67',
			'degree' => 5,
		),
		'lydianB7X5' => array(
			'parent' => 'arabian',
			'uid' => '123#4#56b7',
			'degree' => 6,
		),
		'lydianB7B6' => array(
			'parent' => 'arabian',
			'uid' => '123#45b6b7',
			'degree' => 7,
		),
		/*******************************************************************************************
		=============================================== PERSIAN MODES ==============================================
		*******************************************************************************************/
		'persian' => array(
			'parent' => 'persian',
			'uid' => '1b234b5b67',
			'degree' => 1,
		),
		'ionianX2X6' => array(
			'parent' => 'persian',
			'uid' => '1#2345#67',
			'degree' => 2,
		),
		'phrygianX4N7' => array(
			'parent' => 'persian',
			'uid' => '1b234b5b67',
			'degree' => 4,
		),
		/*******************************************************************************************
		=========================================== NON HEPTATONIC MODES ==========================================
		*******************************************************************************************/
		'augmented' => array(
			'parent' => 'augmented',
			'uid' => '1#235b67',
			'degree' => 1,
		),
		'augmented2' => array(
			'parent' => 'augmented',
			'uid' => '1b234#56',
			'degree' => 2,
		),
		'diminished' => array(
			'parent' => 'diminished',
			'uid' => '12b34b5b6bb77',
			'degree' => 1,
		),
		'diminished2' => array(
			'parent' => 'diminished',
			'uid' => '1b2#23#456b7',
			'degree' => 2,
		),
		'wholeTone' => array(
			'parent' => 'diminished',
			'uid' => '123#4#5b7',
			'degree' => 1,
		)
	);


}