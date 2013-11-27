<?php
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return; 
    }
?>

<?php include "header.php" ?>

<div class="container">
	<div class="account_container">
		<h1>EDIT ACCOUNT</h1>
	</div>
	<div class="account_container account_box">
		<form method="post">
			<label for="first_name">First Name:</label><br />
			<input type="text" id="first_name" name="first_name" required><br />
			<label for="last_name">Last Name:</label><br />
			<input type="text" id="last_name" name="last_name" required><br />
			<label for="job_title">Job Title:</label><br />
			<input type="text" id="job_title" name="job_title" required><br />
			<label for="company">Company/Organization:</label><br />
			<input type="text" id="company" name="company" required><br />
			<br />
			<input class="account_button" type="submit" value="Save Changes">
		</form>
	</div>
</div>

</body>
</html>