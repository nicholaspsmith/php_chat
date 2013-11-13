<?php ob_start()?>

<?php
include('connect.php');
	session_start();


		$username = $_POST['username'];
		$password = $_POST['password'];
	    // Connect to the DB
		$connection = new Connection();
		$db = $connection->connect();
	
		$loginquery = $db->prepare("
			SELECT `password` FROM `users` 
			WHERE `username` = :username
		");
		$loginquery->bindParam(':username', $username);
		$loginquery->execute();

		$realPassword = $loginquery->fetchColumn(0);

		$hashedPassword =  crypt($_POST['password'], $realPassword);


		
		if($hashedPassword == $realPassword){
 			$_SESSION['name'] = $username;
			header("Location: chat.php");
		}
		else{
			echo "<a href='login.php'><-- Go back</a><br><br>";
    		die("Incorrect username or password");
		}

?>
