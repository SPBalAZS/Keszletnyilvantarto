<?php
	include("backend.php");

	$array_devices = array("Printer","Monitor","Mouse","Keyboard","Speaker","Computer","Router","Camera","Radio","Phone");

	$sql_devices = "CREATE TABLE devices (
		id INT(6) AUTO_INCREMENT PRIMARY KEY,
		id_worker INT(6),
		name VARCHAR(30),
		device_condition VARCHAR(30),
		date DATE
	)";
	$sql_workers = "CREATE TABLE workers (
		id INT(6) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30)
	)";

	$server->insertData($sql_devices);
	$server->insertData($sql_workers);

	$server->insertData("INSERT INTO workers (id,name) VALUES (1, 'Péter')");
	$server->insertData("INSERT INTO workers (id,name) VALUES (2, 'Lajos')");
	$server->insertData("INSERT INTO workers (id,name) VALUES (3, 'Balázs')");
	$server->insertData("INSERT INTO workers (id,name) VALUES (4, 'Fabian')");
	$server->insertData("INSERT INTO workers (id,name) VALUES (5, 'Tamás')");
		
	for ($i = 0; $i < 25; $i++) {
		$worker_id = rand(0,4);
		$name = $array_devices[rand(0,9)];
		$sql = "INSERT INTO devices (id_worker,name,device_condition,date) VALUES ('$worker_id', '$name', 'Új' , '2022-01-01')";
		$server->insertData($sql);
	}

	header("Refresh:0; url=index.html");
?>

