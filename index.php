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
	    // $listing_result = mysql_query("SELECT employer_id, position, salary, location, link, descr, date, end_date FROM listing");
	    $listing_result = $pdo->query("SELECT * FROM listing");
	    
		function boolToString($input){
			if($input == 1) return('YES');
			else return('NO');
		}

		while($row = $listing_result -> fetch(PDO::FETCH_ASSOC)){
			// print_r($row);
			$id = $row['employer_id'];
			$employer_result = $pdo->query("SELECT organization FROM employer WHERE id='$id'");
			echo '<div class="job_listing">';
			echo 'EMPLOYER/COMPANY: '.$row['employer_id'].'</br>';
			echo 'TITLE: '.$row['title'].'</br>';
			echo 'REMOTE: '.boolToString($row['remote']).'</br>';
			echo 'PAID: '.boolToString($row['paid']).'</br>';
			echo 'HOURS: '.$row['hours'].'</br>';
			echo 'DATE POSTED: '.$row['date'].'</br>';
			echo 'DEADLINE: '.$row['end_date'].'</br>';
			echo 'DESCRIPTION: '.$row['description'].'</br>';
			echo 'SKILLS: '.$row['skills'].'</br>';
			echo 'LINK: '.$row['link'].'</br>';
			echo 'EMAIL: '.$row['email'].'</br>';
			echo 'NAME: '.$row['name'].'</br>';
			echo '</div>';

		}
	  
	?>
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>