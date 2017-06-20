<?php
class Maze
{
    protected $map_data; //地圖
    protected $stack_path_record; //記錄每一次出發的路徑資料
    protected $arr_barrier; //路障，代表不可通行
    protected $arr_result; //儲存每一次走到終點的路徑資料，皆代表完成
    protected $begin_row, $begin_col, $end_row, $end_col; //開始 row,col 跟終點 row,col
    
	public function __construct()
	{
		$this->begin_row = 1; //開始 row
		$this->begin_col = 7; //開始 col
		$this->end_row = 7; //終點 row
		$this->end_col = 1; //終點 col
		
	    //地圖初始化: 0 代表可通行，1 代表不可通行，2 代表起點，3 代表終點
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
	    $this->stack_path_record = [];
	    
	    //先將起點位置，放進佇列
	    $this->stack_path_record[] = [
	    		'row' => $this->begin_row,
	    		'col' => $this->begin_col
	    ];
	    
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
	}
	
	public function __destruct(){}
	
	//回傳地圖
	public function getMap()
	{
	    return $this->map_data;
	}
	
	//回傳目前佇列內容
	public function getQueue()
	{
		return $this->stack_path_record;
	}
	
	//移動
	public function move()
	{
		try
		{
		    echo "Current position: ";
		    echo "row => ".$this->stack_path_record[count($this->stack_path_record)-1]['row'].", ";
		    echo "col => ".$this->stack_path_record[count($this->stack_path_record)-1]['col']."\n";
		    
		    //隨機產生 1-4 數字，分別代表上、下、左、右
		    $direction = rand(1, 4);
		    
		    //判斷是否需要退回上一步
		    $flag = false;
		    
		    //計算前進的位置，並加以記錄。count 減 1 是為了抓最後的元素
		    switch($direction)
		    {
		    	case 1:
		    	    $this->stack_path_record[] = [
		    	         'row' => ($this->stack_path_record[count($this->stack_path_record)-1]['row'] - 1),
		    	         'col' => $this->stack_path_record[count($this->stack_path_record)-1]['col']
		    	    ];
		    	break;
		    		
		    	case 2:
		    	    $this->stack_path_record[] = [
		    	         'row' => ($this->stack_path_record[count($this->stack_path_record)-1]['row'] + 1),
		    	         'col' => $this->stack_path_record[count($this->stack_path_record)-1]['col']
		    	    ];
		    	break;
		    		
		    	case 3:
		    	    $this->stack_path_record[] = [
		    	          'row' => $this->stack_path_record[count($this->stack_path_record)-1]['row'],
		    	          'col' => ($this->stack_path_record[count($this->stack_path_record)-1]['col'] - 1)
		    	    ];
		    	break;
		    		
		    	case 4:
		    	    $this->stack_path_record[] = [
		    	         'row' => $this->stack_path_record[count($this->stack_path_record)-1]['row'],
		    	         'col' => ($this->stack_path_record[count($this->stack_path_record)-1]['col'] + 1)
		    	    ];
		    	break;
		    		
		    	default:
		    		//$this->move();
		    	break;
		    }
		    
		    echo "Move on, row => ".$this->stack_path_record[count($this->stack_path_record)-1]['row'].", col => ".$this->stack_path_record[count($this->stack_path_record)-1]['col']."\n";
		    
		    /*
		     * 若是移動後的位置，遇到下列條件，則退回上一步
		     * 1. 超過地圖
		     * 2. 走過的路
		     * 3. 遇到障礙
		     */
		    
		    // 1.超過地圖
		    if( $this->stack_path_record[count($this->stack_path_record)-1]['row'] < 0 || 
		        $this->stack_path_record[count($this->stack_path_record)-1]['col'] < 0 || 
		        $this->stack_path_record[count($this->stack_path_record)-1]['row'] >= count($this->map_data) || 
		        $this->stack_path_record[count($this->stack_path_record)-1]['col'] >= count($this->map_data[0]) )
		    {
		    	$flag = true;
		    }
		    else
		    {
		        // 2.走過的路
		        for($j = 0; $j < (count($this->stack_path_record)-1); $j++)
		        {
		            if( $this->stack_path_record[$j]['row'] == $this->stack_path_record[count($this->stack_path_record)-1]['row'] && 
		                $this->stack_path_record[$j]['col'] == $this->stack_path_record[count($this->stack_path_record)-1]['col'])
		            {
		                $flag = true;
		                break;
		            }
		        }

		        // 3.遇到障礙
		    	if($flag == false)
		    	{
		    	    for($i = 0; $i < count($this->arr_barrier); $i++)
		    	    {
		    	        if( $this->arr_barrier[$i]['row'] == $this->stack_path_record[count($this->stack_path_record)-1]['row'] && 
		    	            $this->arr_barrier[$i]['col'] == $this->stack_path_record[count($this->stack_path_record)-1]['col'] )
		    	        {
		    	            $flag = true;
		    	            break;
		    	        }
		    	    }
		    	}
		    }

		    //如果符合退回上一步的條件，則將目前走到的位置移除
		    if( $flag == true )
		    {
		    	$item = array_pop($this->stack_path_record);
		    	echo "Warning! Remove stack: row => ".$item['row'].", col => ".$item['col']."\n";
		    }
		    
		    //如果到達終點，則結束程式
		    if($this->stack_path_record[count($this->stack_path_record)-1]['row'] == $this->end_row && 
		       $this->stack_path_record[count($this->stack_path_record)-1]['col'] == $this->end_col)
		    {
		        echo "Arrived!!\n\n";
		    	return true;
		    }
		    
		    //sleep(1);
		    
		    //繼續移動
		    return $this->move();
		}
		catch(Exception $e)
		{
			print_r($e);
		}
	    
	}
	
	
}
?>