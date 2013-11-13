<?php

	session_start();
	//ensure current session is erased
    session_unset();
    session_destroy();
    session_write_close();
    session_regenerate_id(true);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>

    <link rel="stylesheet" type="text/css" href="chat.css">

</head>

<body onload="process()">

    <form method="POST" action="processlogin.php">
    <div class="form centered">
        <div class="center heading"><h2>Chat Login</h2><p>Please enter your user credentials</p></div>
        <div class="row">
            <label for="username">
                <span class="label">Username</span>
                <span class="input">
                    <input type="text" required
                        name="username" id="username" />
                </span>
            </label>
        </div>
        <div class="row">
            <label for="password">
                <span class="label">Password</span>
                <span class="input">
                    <input type="password" required
                        name="password" id="password"/>
                </span>
            </label>
        </div>

		<input type="submit" action="submit" value="Log in"/>
    </div>
	<a href="newuser.php">Create account</a>
    </form>

</body>

</html>


