<?php
require("db.php");
$building = "currant";
$count0 = 0;
$count1 = 0;
$query = mysqli_query("SELECT count FROM occupancy where building='".$building."' and floor=1 and room=1 ORDER BY time DESC"); 
$num = mysqli_num_rows($query);

$found = array();
 

    if($data = mysqli_fetch_array($query))
    {
		$count1 = $data['count'];
    }

$count1++;
$query = mysqli_query("SELECT count FROM occupancy where building='".$building."' and floor=1 and room=0 ORDER BY time DESC"); 
$num = mysqli_num_rows($query);

$found = array();
 
    if($data = mysqli_fetch_array($query))
    {
		$count0 = $data['count'];
    }

$count0--;
mysqli_query("insert into occupancy (building, floor, room, count) VALUES ('currant', 1, 1, ".$count1.")");
mysqli_query("insert into occupancy (building, floor, room, count) VALUES ('currant', 1, 0, ".$count0.")");
?>