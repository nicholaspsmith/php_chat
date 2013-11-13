<?php ob_start()?>

<?php
include('connect.php');
// Start a session if one is not already running
if(!isset($_SESSION))
	session_start();

	// Session name is same as username
	$username = $_SESSION['name'];
	$message = $_POST['message'];
	// Connect to the DB
	$connection = new Connection();
	$db = $connection->connect();
	
	$postmessage = $db->prepare("
		INSERT INTO `nsmith3_nicksdb`.`messages` 
		(
		`messageid`,
		`username`,
		`time`,
		`message`
		)
		VALUES 
		(
		NULL,
		:username,
		CURRENT_TIMESTAMP,
		:message
		)
	");
	$postmessage->bindParam(':username', $username);
	$postmessage->bindParam(':message', $message);
	$postmessage->execute();
	

	// Back to chat page
    header("Location: chat.php");

?>
