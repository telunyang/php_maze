<?php
//ini_set('memory_limit', '8192M');

require_once "./models/Maze.php";

class TestMaze extends Maze
{
	private $obj;
	
	public function __construct()
	{
		try
		{
			$this->obj = new Maze();
		}
		catch(Exception $e)
		{
			print_r($e);
		}
	}
	
	public function __destruct(){}
	
	public function test()
	{
		try
		{
			if ( $this->obj->move() )
			{
				$arr = $this->obj->getRecord();
				echo "Original count: ".count($arr)."\n";
				print_r($this->obj->getRecord());
			}
		}
		catch(Exception $e)
		{
			print_r($e);
		}
		
	}
}

$obj = new TestMaze();
$obj->test();