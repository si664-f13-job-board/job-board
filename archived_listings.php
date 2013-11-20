<?php
    session_start();
    if ( count($_POST) > 0 ) {
        $_SESSION["error"] = "Missing Required Information";
        header( 'Location: index.php' ) ;
        return; 
    }
?>

<?php include "header.php" ?>

<div class="container">
	<h1>ARCHIVED LISTINGS</h1>
	<div class="job_listing">
		POSITION TITLE </br>
		EMPLOYER/COMPANY </br>
		LOCATION </br>
		SALARY </br>
		DATE POSTED </br>
		DEADLINE </br>
	</div>
	<div class="job_listing">
		POSITION TITLE </br>
		EMPLOYER/COMPANY </br>
		LOCATION </br>
		SALARY </br>
		DATE POSTED </br>
		DEADLINE </br>
	</div>
	<div class="job_listing">
		POSITION TITLE </br>
		EMPLOYER/COMPANY </br>
		LOCATION </br>
		SALARY </br>
		DATE POSTED </br>
		DEADLINE </br>
	</div>
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>