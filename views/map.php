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

//取得本次抵達終點的路徑記錄
$records = $obj->getRecord();

print_r($records);

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
    	for($i = 0; $i < count($records); $i++)
    	{
    		if($records[$i]['row'] == $r && $records[$i]['col'] == $c)
    		{
    			echo 'class="path"';
    		}
    	}
    	?>
    	>
    	<?php echo $map_data[$r][$c]; ?>
    	</td>
    <?php
    }
    ?>
    </tr>
    
<?php
}
?>
</table>