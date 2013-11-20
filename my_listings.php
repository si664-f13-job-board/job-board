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
	<h1>MY JOB LISTINGS</h1>
	<div class="job_listing">
		<a href="edit_listing.php">Edit</a><br />
		POSITION TITLE <br />
		EMPLOYER/COMPANY <br />
		LOCATION <br />
		SALARY <br />
		DATE POSTED <br />
		DEADLINE <br />
	</div>
	<div class="job_listing">
		<a href="edit_listing.php">Edit</a><br />
		POSITION TITLE <br />
		EMPLOYER/COMPANY <br />
		LOCATION <br />
		SALARY <br />
		DATE POSTED <br />
		DEADLINE <br />
	</div>
	<div class="job_listing">
		<a href="edit_listing.php">Edit</a><br />
		POSITION TITLE <br />
		EMPLOYER/COMPANY <br />
		LOCATION <br />
		SALARY <br />
		DATE POSTED <br />
		DEADLINE <br />
	</div>
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>