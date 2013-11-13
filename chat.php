<?php
// Start a session if one is not already running
if(!isset($_SESSION))
    session_start();

if(isset($_SESSION['name'])){
	echo "Welcome, " . $_SESSION['name'];
}
else{
	// If there's no session, user has not logged on
	// and cannot view chat
	header("Location: login.php");
    die();
	}



                include('connect.php');

                $connection = new Connection();
                $db = $connection->connect();

                 // Get chat history from DB
                // Get messages table
                $messages = $db->query("
                    SELECT * FROM `messages`;
                ");


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
        
        <link type="text/css" rel="stylesheet" href="chat.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

        <script type="text/javascript" src="alone.js"></script>

    </head>

    <body>
        <div id="header">Not-So-Alone-Anymore Chat</div>
		
		<a href="login.php">Log out</a>

        <div id="container">
            <div id="history">
            <?php


            // This is what will be auto-updated by ajax

				foreach($messages->fetchAll() as $row){
					echo "<b>" .$row['time']. " ";
					echo $row['username']. ": </b>&nbsp&nbsp";
					echo $row['message']. "<br>";
                    $max = $row['messageid'];
				}

			?>
            </div>


            <div id="textbox">
                <form method="POST" action="savemessage.php">
                    <input type="text" name="message" required autofocus />
                    <input type="submit" value="send" onclick="postMessage()"/>
                </form>
            </div>
        </div>

    </body>

</html>
