<?php
	require_once "db.php";
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return; 
    }
?>

<?php include "header.php" ?>

<div class="container">
	<h1>JOB LISTINGS</h1>
	<?php
		function boolToString($input){
			if($input == 1) return('YES');
			else return('NO');
		}
		
	    $sql = "
			SELECT listing.id
			     , listing.title
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
				   ON listing.employer_id = employer.id
			WHERE  employer.id = :id";
		$listing_results = $pdo -> prepare($sql);
		$listing_results -> execute(array(':id'=>$_SESSION['account']));
		
		while($row = $listing_results -> fetch(PDO::FETCH_ASSOC)){
			echo '<div class="job_listing">';
			echo '<a href="edit_listing.php?id='.$row['id'].'">Edit</a></br>';
			echo 'EMPLOYER/COMPANY: '.$row['organization'].'</br>';
			echo 'TITLE: '.$row['title'].'</br>';
			echo 'REMOTE: '.boolToString($row['remote']).'</br>';
			echo 'PAID: '.boolToString($row['paid']).'</br>';
			echo 'HOURS: '.$row['hours'].'</br>';
			echo 'DATE POSTED: '.$row['post_date'].'</br>';
			echo 'DEADLINE: '.$row['end_date'].'</br>';
			echo 'DESCRIPTION: '.$row['description'].'</br>';
			echo 'SKILLS: '.$row['skills'].'</br>';
			echo 'NAME: '.$row['name'].'</br>';
			echo 'EMAIL: <a href='.$row['email'].'>'.$row['email'].'</a></br>';
			echo 'LINK: <a href='.$row['link'].'>'.$row['link'].'</a></br>';
			echo '</div>';
		}
	?>
	
	<div class="footer">
		si664-f13-job-board
	</div>

</div>

</body>
</html>