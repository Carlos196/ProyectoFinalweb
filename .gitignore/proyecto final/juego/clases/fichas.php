<?php 
class Ficha
{
	private $id;
	private $img;

	function __construct($id, $img)
	{
		$this->id = $id;
		$this->img = $img;
	}

	public function get_id()
	{
		return $this->id;
	}
	public function get_img()
	{
		return $this->img;
	}

	public function set_id($v)
	{
		$this->id = $v;
	}
	public function set_img($v)
	{
		$this->img = $v;
	}
}
 ?>