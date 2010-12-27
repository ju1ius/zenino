<?php

class ZeninoHelper
{
	public static $entities = array(
			'alterations' => array(
				'n' 	=> '&#9838;',
				'#' 	=> '&#9839;',
				'b' 	=> '&#9837;',
			),
			'short_symbols' => array(
				'Maj7'	=> '&#916;',
				'min7b5' => '&#216;',
				'dim' => 'o',
				'min' => '&#8722;',
				'#5' => '+'
			)
		);
	
	public static function accidentalToHtml($note)
	{
		$patterns = array( '/b/', '/n/', '/(?<!&)#/' );
		$replacements = array(
			'&#9837;', '&#9838;', '&#9839;'
		);
		return preg_replace($patterns, $replacements, $note);
	}
	public static function noteToHtml($note)
	{
		$patterns = array( '/b/', '/n/', '/(?<!&)#/' );
		$replacements = array(
			'<sup>&#9837;</sup>', '<sup>&#9838;</sup>', '<sup>&#9839;</sup>'
		);
		return preg_replace($patterns, $replacements, $note);
	}
	public static function modeNameToHtml($name)
	{
		$patterns = array('/(?<!^)([A-Z]+)/', '/B(?=[\dB])/', '/N(?=\d)/', '/X(?=\d)/');
		$replacements = array(
			' $1', '<sup>&#9837;</sup>', '<sup>&#9838;</sup>', '<sup>&#9839;</sup>'
		);
		return ucwords(preg_replace($patterns, $replacements, $name));
	}
	public static function notesForOptions()
	{
		return array(
			'C' => 'C', 'D' => 'D', 'E' => 'E',
			'F' => 'F', 'G' => 'G', 'A' => 'A', 'B' => 'B'
		);
	}
	
	public static function modesForOptions($selected)
	{
		$names = ZeninoTablesOfTheLaw::modesNames();
		
		$options = '<optgroup label="Major Modes">';
		foreach($names as $name)
		{
			$options .= '<option value="'.$name.'" '
				.( $name == $selected ? 'selected' : '' )
				.'>'.ucwords($name)
				.'</option>';
			
			switch($name)
			{
				case 'locrian':
				 	$options .= '</optgroup><optgroup label="Melodic Minor Modes">';
					break;
				case 'superLocrian':
				 	$options .= '</optgroup><optgroup label="Harmonic Minor Modes">';
					break;
				case 'superLocrianBB7':
				 	$options .= '</optgroup><optgroup label="Harmonic Major Modes">';
					break;
				case 'locrianBB7':
				 	$options .= '</optgroup><optgroup label="Double Harmonic Modes">';
					break;
				case 'locrianBB3BB7':
				 	$options .= '</optgroup><optgroup label="Major #2 Modes">';
					break;
				case 'locrianMajor':
				 	$options .= '</optgroup><optgroup label="Melodic Minor #5 Modes">';
					break;
				case 'locrianN2N7':
				 	$options .= '</optgroup><optgroup label="Arabian Modes">';
					break;
				case 'lydianB7B6':
				 	$options .= '</optgroup><optgroup label="Persian Modes">';
					break;
				case 'phrygianX4N7':
				 	$options .= '</optgroup><optgroup label="Non Heptatonic Modes">';
					break;
				default:
					//
					break;
			}
		}
		$options .= '</optgroup>'."\n";
		return $options;
	}
	
}