<?php

	$temp_uid = array(    
		2915154, //aji
	    2885971, //filar
	    2889556, //selamat
	    1065481, //enye
	    1067651, //bala
	    2902466 //indra
	);

	$temp_name = array(    
		"Aji",
	    "Filar",
	    "Selamat",
	    "Enye",
	    "Bala",
	    "Indra"
	);

	$temp_color = array(    
		"#f45042",
	    "#fce807",
	    "#12ba03",
	    "#0155af",
	    "#8900af",
	    "#000000"
	);

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

	