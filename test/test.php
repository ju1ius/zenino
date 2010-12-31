#! /usr/bin/env php
<?php
require_once dirname(__FILE__).'/../ZeninoLoader.php';
ZeninoLoader::register();

function findChordScaleArray($root, $chord)
{
	$notes = ZeninoChordToolkit::fromShortHand($root, $chord);

	$intervals = array();
	foreach ($notes as $note)
	{
		if ($note)
		{
			$intervals[] = ZeninoIntervalToolkit::determine($root, $note);
		}
	}
	array_filter($intervals);

	foreach (ZeninoTablesOfTheLaw::modes() as $name => $info)
	{
		
	}
	
}

function findChordScaleRegex($root, $chord)
{
	$notes = ZeninoChordToolkit::fromShortHand($root, $chord);

	$intervals = array();
	foreach ($notes as $note)
	{
		if ($note)
		{
			$intervals[] = ZeninoIntervalToolkit::determine($root, $note);
		}
	}
	array_filter($intervals);
	usort($intervals, 'cmp');

	$mask = '(?:(?:#?|b{0,2})[1-7])?';
	$search = '/'.implode($mask, $intervals).'/';
	$matches = array();

	foreach (ZeninoTablesOfTheLaw::modes() as $name => $infos)
	{
		if(preg_match($search, $infos['uid']))
		{
			$matches[$name] = $infos;
		}
	}
	return $matches;
}

function cmp($a, $b)
{
	$a_idx = $a[strlen($a)-1];
	$b_idx = $b[strlen($b)-1];
	if($a_idx == $b_idx) return 0;
	return ($a_idx < $b_idx) ? -1 : 1;
}
