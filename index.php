<?php
    session_start();
    if ( count($_POST) > 0 ) {
        $_SESSION["error"] = "Missing Required Information";
        header( 'Location: index.php' ) ;
        return; 
    }
    require_once "db.php";  
?>

<?php include "header.php" ?>

<div class="container">
	<h1>JOB LISTINGS</h1>
	<?php 
	    $listing_result = mysql_query("SELECT employer_id, position, salary, location, link, descr, date, end_date FROM listing");
	    // $listing_result = $pod->query("SELECT employer_id, date, end_date, location, link, descr FROM listing");

	    while($row = mysql_fetch_row($listing_result)){
	    	// var_dump($row);
	    	$employer_result = mysql_query("SELECT `organization` FROM `employer` WHERE $row[0]");
	    	echo '<div class="job_listing">';
			echo 'EMPLOYER/COMPANY: '.htmlentities(mysql_fetch_array($employer_result)[0]).'</br>';
			echo 'POSITION TITLE: '.htmlentities($row[1]).'</br>';
			echo 'SALARY: '.htmlentities($row[2]).'</br>';
			echo 'LOCATION: '.htmlentities($row[3]).'</br>';
			echo 'DATE POSTED: '.htmlentities($row[6]).'</br>';
			echo 'DEADLINE: '.htmlentities($row[7]).'</br>';
			echo '</div>';

	    }
	?>
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>