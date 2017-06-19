<style>
<!--
table td{
    border: 1px solid;
}
-->
</style>

<table>
<?php
$map_data = $obj->getMap();

for($r = 0; $r < count($map_data); $r++)
{
?>

    <tr>
    <?php
    for($c = 0; $c < count($map_data[$r]); $c++)
    {
    ?>
    	<td><?php echo $map_data[$r][$c]; ?></td>
    <?php
    }
    ?>
    </tr>
    
<?php
}
?>
</table>