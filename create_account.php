<?php
    session_start();
    unset($_SESSION["account"]);
    if ( isset($_POST["account"]) && isset($_POST["pw"]) ) {
        if ( $_POST['pw'] == 'password' ) {
            $_SESSION["account"] = $_POST["account"];
            $_SESSION["success"] = "Logged in.";
            header( 'Location: index.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login.php' ) ;
            return;
        }
    } else if ( count($_POST) > 0 ) {
        $_SESSION["error"] = "Missing Required Information";
        header( 'Location: login.php' ) ;
        return; 
    }      
?>

<?php include "header.php" ?>

<div class="container">
	<div class="account_container">
		<h1>CREATE ACCOUNT</h1>
	</div>
	<div class="account_container account_box">

	<form method="post">
		<label for="email_addr">Email:</label><br />
		<input type="email" id="email_addr" name="email_addr" required><br />
		<label for="password">Password:</label><br />
		<input type="password" id="password" name="password"required><br />
		<label for="first_name">First Name:</label><br />
		<input type="text" id="first_name" name="first_name" required><br />
		<label for="last_name">Last Name:</label><br />
		<input type="text" id="last_name" name="last_name" required><br />
		<label for="job_title">Job Title:</label><br />
		<input type="text" id="job_title" name="job_title" required><br />
		<label for="company">Company/Organization:</label><br />
		<input type="text" id="company" name="company" required><br />
		<br />
		<input class="create_button" type="submit" value="Create Account">
	</form>
	</div>
</div>

</body>
</html>