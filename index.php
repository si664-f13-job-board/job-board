<?php
	require_once "db.php";
    session_start();
    if ( count($_POST) > 0 ) {
        $_SESSION["error"] = "Missing Required Information";
        header( 'Location: index.php' ) ;
        return; 
    }
?>

<?php include "header.php" ?>

<div class="container">
	<h1>JOB LISTINGS</h1>
	<div class="joblisting_container">
	<?php
		function boolToString($input){
			if($input == 1) return('YES');
			else return('NO');
		}
		
	    $listing_results = $pdo->query("
			SELECT listing.title
			     , listing.description
				 , listing.skills
			     , listing.remote
				 , listing.paid
				 , listing.hours
				 , listing.post_date
				 , listing.end_date
				 , listing.name
				 , listing.email
				 , listing.link
				 , employer.organization
			FROM   listing
			       JOIN employer
				   ON listing.employer_id = employer.employer_id
			WHERE  listing.end_date > NOW()
			ORDER BY listing.post_date ASC");

		while($row = $listing_results -> fetch(PDO::FETCH_ASSOC)){
			echo '<div class="job_listing">';
			echo '<div class="employer_title">';
			echo ''.$row['title'].'</br>';
			echo '</div>';
			echo '<div class="description">';
			echo '<i>Description: </i>'.$row['description'].'</br>';
			echo '</div>';
			echo '<i>Remote: </i> '.boolToString($row['remote']).'</br>';
			echo '<i> Paid: </i>'.boolToString($row['paid']).'</br>';
			echo '<i>Hours:</i> '.$row['hours'].'</br>';
			echo '<i>Date Posted: </i>'.$row['post_date'].'</br>';
			echo '<i>Deadline: </i>'.$row['end_date'].'</br>';
			echo '<div class="skills">';
			echo '<i>Skills: </i>'.$row['skills'].'</br>';
			echo '</div>';
			echo '<div class="job_link">';
			echo '<i>Contact: </i>'.$row['name'].'</br>';
			echo '<a href='.$row['email'].'>'.$row['email'].'</a>'.'</br>';
			echo ' <a href='.$row['link'].'>'.$row['link'].'</a>'.'</br>';
			echo '</div>';
			echo '</div>';
		}
	?>
	</div>
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>