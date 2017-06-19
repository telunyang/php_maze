<?php
require_once './models/Maze.php';
class WebController
{
    public function __construct(){}
    public function __destruct(){}	
    
    //尋找初始頁面
    public function index()
	{
        try
        {
            if(isset($_GET['mode']))
            {
    			switch( $_GET['mode'] )
    			{			
    			    case '':
    			        
    			    break;
    				
    				default:
    					$obj = new Maze();
    					require_once './views/map.php';	
    					unset($obj);
    				break;
    			}
		    }
		    else
		    {
		        $obj = new Maze();
		        require_once './views/map.php';
		        unset($obj);
		    }
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
?>