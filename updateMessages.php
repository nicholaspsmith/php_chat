<?php
include('connect.php');


$connection = new Connection();
$db = $connection->connect();


	// Query DB for messages
	$messages = $db->query("
	SELECT * FROM `messages`
	WHERE `messageid` > 0
	ORDER BY `messageid` ASC;
	");


	// prints messages
	$mymessage = "";
	foreach($messages->fetchAll() as $row){
		//if($row['messageid'])
		$mymessage .= "<b>" .$row['time']. " &nbsp";
		$mymessage .=  $row['username']. ": </b>&nbsp&nbsp";
		$mymessage .= $row['message']. "<br>";
		$max = $row['messageid'];
	}

	echo $mymessage;

?>