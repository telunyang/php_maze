<?php
class Maze
{
    private $map_data; //地圖
    protected $queue_path_record; //記錄每一次出發的路徑資料
    protected $arr_barrier; //路障，代表不可通行
    protected $arr_result; //儲存每一次走到終點的路徑資料，皆代表完成
    protected $arr_current_position; //記錄目前位置
    
	public function __construct()
	{
	    //地圖初始化: 0 代表可通行，1 代表不可通行，2代表起點，3 代表終點
	    $this->map_data = [
	        [0,0,0,0,0,0,0,0,0,0],
	        [0,1,0,0,0,0,0,2,0,0],
	        [0,0,1,0,0,0,0,0,0,0],
	        [0,0,0,1,0,0,0,0,0,0],
	        [0,0,0,0,1,0,0,0,0,0],
	        [0,0,0,0,0,1,0,0,0,0],
	        [0,0,0,0,0,0,1,0,0,0],
	        [0,3,0,0,0,0,0,1,0,0],
	        [0,0,0,0,0,0,0,0,1,0],
	        [0,0,0,0,0,0,0,0,0,0]
	    ];
	    
	    //記錄每一次出發的路徑
	    $this->arr_path_record = [];
	    
	    //設定路障範圍
	    $this->arr_barrier = [
	        ['row' => 1, 'col' => 1],
	        ['row' => 2, 'col' => 2],
	        ['row' => 3, 'col' => 3],
	        ['row' => 4, 'col' => 4],
	        ['row' => 5, 'col' => 5],
	        ['row' => 6, 'col' => 6],
	        ['row' => 7, 'col' => 7]
	    ];
	    
	    //完成的路徑記錄初始化
	    $this->arr_result = [];
	    
	    //迷宮出發點初始化
	    $this->arr_current_position['row'] = 1;
	    $this->arr_current_position['col'] = 7;
	}
	
	public function __destruct(){}
	
	//回傳地圖
	public function getMap()
	{
	    return $this->map_data;
	}
	
	//移動
	protected function move()
	{
	    //隨機產生 1-4 數字，分別代表上、下、左、右
	    $direction = rand(1, 4);
	    
	    switch($direction)
	    {
	        case 1:
	            $this->arr_current_position['row'] = $this->arr_current_position['row'] - 1;
	        break;
	        
	        case 2:
	            $this->arr_current_position['row'] = $this->arr_current_position['row'] + 1;
	        break;
	        
	        case 3:
	            $this->arr_current_position['col'] = $this->arr_current_position['col'] - 1;
	        break;
	        
	        case 4:
	            $this->arr_current_position['col'] = $this->arr_current_position['col'] + 1;
	        break;
	        
	        default:
	            $this->move();
	        break;
	    }
	}
	
	
}
?>