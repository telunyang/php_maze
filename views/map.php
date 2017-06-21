<?php 
set_time_limit(5);
?>
<style>
<!--
table td{
    border: 1px solid;
}

td.path{
    background-color: #7878ff;
}
-->
</style>

<table>
<?php
//取得地圖
$map_data = $obj->getMap();

if ( $obj->move() )
{
	$records = $obj->getRecord();
	echo "Original count: ".count($records)."\n";
}

//print_r($records);

for($r = 0; $r < count($map_data); $r++)
{
?>

    <tr>
    <?php
    for($c = 0; $c < count($map_data[$r]); $c++)
    {
    ?>
    	<td
    	<?php 
    	if( isset($records) && count($records) > 0 )
    	{
	    	for($i = 0; $i < count($records); $i++)
	    	{
	    		if($records[$i]['row'] == $r && $records[$i]['col'] == $c)
	    		{
	    			echo 'class="path"';
	    		}
	    	}
    	}
    	?>
    	>
    	<?php 
    		//echo $r.",".$c." =>";
    		echo $map_data[$r][$c]; 
    	?>
    	</td>
    <?php
    }
    ?>
    </tr>
    
<?php
}
?>
</table>

<input type="button" id="btn" value="取得路徑" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

</script>