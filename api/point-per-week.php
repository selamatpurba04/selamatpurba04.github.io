<?php
require("id.php");

$result = array();

for( $x = 0; $x < count($temp_uid); $x++){
	$temp_points = array();
	$val = null;
	$myfile = fopen( "../assets/data/".$temp_uid[$x].".json", "r") or die("Unable to open file!");
	$val = fread($myfile,filesize("../assets/data/".$temp_uid[$x].".json"));
	$val = (array) json_decode($val);
	for ($i=0; $i < count($val); $i++) { 
		array_push($temp_points, $val[$i]->entry_history->points);
	}
	
	$res = array(
		"label" => $temp_name[$x],
		"backgroundColor" => $temp_color[$x],
		"borderColor" => $temp_color[$x],
		"data" => $temp_points,
		"fill" => false,
	);
	array_push($result, $res);
}

echo json_encode($result);