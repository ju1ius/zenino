<?php

class ZeninoMode implements ArrayAccess
{

	protected $container = array(
		'tonic' => 'C',
		'name' => 'ionian',
		'uid' => '1234567',
		'skeleton' => array('1','2','3','4','5','6','7'),
		'parent' => 'ionian',
		'degree' => 1,
		'notes' => array('C','D','E','F','G','A','B'),
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
	);
	
	/* ARRAYACCESS IMPLEMENTATION */
	public function offsetSet($offset, $value) {
			//$this->container[$offset] = $value;
	}
	public function offsetExists($offset) {
			return isset($this->container[$offset]);
	}
	public function offsetUnset($offset) {
			//unset($this->container[$offset]);
	}
	public function offsetGet($offset) {
			return isset($this->container[$offset]) ? $this->container[$offset] : null;
	}
	
	
	
	public static function create(){ return new ZeninoMode(); }
	
	public function fromName($tonic, $name)
	{
		$modes = ZeninoTablesOfTheLaw::modes();
		$this->container = $modes[$name];
		$this->container['tonic'] = $tonic;
		$this->container['name'] = $name;
		$this->container['skeleton'] = $this->parseUid($this->container['uid']);
		$this->container['notes'] = ZeninoScaleToolkit::$name($tonic);
		return $this;
	}
	
	public function fromNotes(Array $notes)
	{
		$array = ZeninoScaleToolkit::determine($notes);
		return $this->fromArray($array);
	}
	
	protected function fromArray(Array $infos)
	{
		$this->container = $infos;
		$this->container['skeleton'] = $this->parseUid($infos['uid']);
		return $this;
	}
	
	protected function parseUid($uid)
	{
		preg_match_all('/(?:#?|b{0,2})\d/', $uid, $intervals);
		return $intervals[0];
	}
	
	protected function __toString()
	{
		return $this->container['tonic'] .' '. $this->container['name'];
	}

}