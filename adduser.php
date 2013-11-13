<?php
session_name('chatsession');
session_start();

if($_POST['password'] != $_POST['password_rt'])
    die("Passwords Dont match");

include('connect.php');

$connection = new Connection();
$db = $connection->connect();


// Step 3: Check if a user with the attempted login info  exists
$check_for_user_query = $db->prepare("
    SELECT COUNT(`username`) FROM `users`
    WHERE
        `username` = :username
");

$check_for_user_query->execute(
    array(
        ':username' => $_POST['username']    )
);

if ($check_for_user_query->fetchColumn(0) != 0)
{
	echo "<a href='newuser.php'><-- Go back</a><br><br>";
    die("Username exists");
	
}



$hashed_password = crypt('mypassword'); // let the salt be automatically generated

if (crypt($user_input, $hashed_password) == $hashed_password) {
   echo "Password verified!";
}




$newQuery = $db->prepare("
INSERT INTO `users` (`username` , `password`) VALUES (:username,:password)
");


$hashed_password = crypt($_POST['password']);


$newQuery->execute(
    array(
        ':username' => $_POST['username'], 
        ':password'  => 
        $hashed_password  )
);
            echo '<script type="text/javascript">
        window.location.href = "login.php"
    </script>';
?>
