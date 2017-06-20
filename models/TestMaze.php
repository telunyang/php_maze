<?php
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
				print_r($this->getRecord());
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