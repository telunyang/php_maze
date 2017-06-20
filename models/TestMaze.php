<?php
class TestMaze
{
	private $obj;
	
	public function __construct()
	{
		try
		{
			$this->obj = new Maze();
			$queue = $this->obj->move();
			print_r($queue);
			echo "finished";
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
			$queue = $this->obj->move();
			print_r($queue);
			echo "finished";
		}
		catch(Exception $e)
		{
			print_r($e);
		}
		
	}
}