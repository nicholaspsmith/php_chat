<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>

    <link rel="stylesheet" type="text/css" href="chat.css">

    <script type="text/javascript">
    function check_passwords()
    {
        // Using HTML5's custom validation error
        if (document.getElementById("password").value !=
            document.getElementById("password_rt").value)
            document.getElementById("password_rt")
                .setCustomValidity('Passwords do not match');
        else
            document.getElementById("password_rt").setCustomValidity('');
    }
    </script>
</head>

<body>

    <form method="POST" action="adduser.php">
    <div class="form centered">
        <div class="center heading"><h2>Create account</h2><p>Please enter your information</p></div>
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
                        name="password" id="password"
                        oninput="check_passwords()" />
                </span>
            </label>
        </div>
        <div class="row">
            <label for="password_rt">
                <span class="label">Retype Password</span>
                <span class="input">
                    <input type="password" required
                        name="password_rt" id="password_rt"
                        oninput="check_passwords()" />
                </span>
            </label>
        </div>	

        <div class="center"><input type="submit" value="Create Account" id="button"/></div>
    </div>
    </form>
	<form method="link" action="login.php" id="cancel">
		<input type="submit" value="Cancel" id="button"/>
		</form>

</body>

</html>
