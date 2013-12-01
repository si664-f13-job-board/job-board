<?php
	require_once "db.php";
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return;
    }
	if ( !isset($_GET["id"]) ) {
		header( 'Location: my_listings.php' ) ;
		return;
	}
	
	$listing_result = $pdo->query("
		SELECT listing.id
			 , listing.employer_id
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
		WHERE  listing.id = ".$_GET["id"]." LIMIT 1");
		
	$row = $listing_result -> fetch(PDO::FETCH_ASSOC);
	
	if ( !$row["id"] ) {
		header( 'Location: my_listings.php' ) ;
		return;
	}
	if ( $row["employer_id"] != $_SESSION["account"] ) {
		header( 'Location: my_listings.php' ) ;
		return;
	}

	if ( isset($_POST["listing_id"]) && isset($_POST["title"]) && isset($_POST["remote"]) && isset($_POST["paid"]) && isset($_POST["hours"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["link"]) && isset($_POST["end_date"]) && isset($_POST["description"]) && isset($_POST["skills"]) ) {
		$id = mysql_real_escape_string($_POST["listing_id"]);
		$title = mysql_real_escape_string($_POST["title"]);
		$remote = mysql_real_escape_string($_POST["remote"]);
		$paid = mysql_real_escape_string($_POST["paid"]);
		$hours = mysql_real_escape_string($_POST["hours"]);
		$name = mysql_real_escape_string($_POST["name"]);
		$email = mysql_real_escape_string($_POST["email"]);
		$link = mysql_real_escape_string($_POST["link"]);
		$end_date = mysql_real_escape_string($_POST["end_date"]);
		$description = mysql_real_escape_string($_POST["description"]);
		$skills = mysql_real_escape_string($_POST["skills"]);
	
		$sql = "UPDATE listing SET title=:title, remote=:remote, paid=:paid; hours=:hours, name=:name, email=:email, link=:link end_date=:end_date, description=:description, skills=:skills WHERE id=:id AND employer_id=:employer_id";
		$q = $pdo -> prepare($sql);
		$q -> execute(array(':title'=>$title, ':remote'=>$remote, ':paid'=>$paid, ':hours'=>$hours, ':name'=>$name, ':email'=>$email, ':link'=>$link, ':end_date'=>$end_date, ':description'=>$description, ':skills'=>$skills, ':id'=>$id, ':employer_id'=>$_SESSION["account"]));
		
		$_SESSION['success'] = 'Changes saved.';
		header( 'Location: edit_listing.php?id='.$id );
		return;
	}
?>

<?php include "header.php" ?>

<div class="container">
	<div class="listing_container">
		<h1>EDIT JOB LISTING</h1>
	</div>
	<div class="listing_container listing_box">
		<form method="post">
			<div>
				<div class="col1"><label for="title">Position Title:</label></div>
				<div class="col2"><input type="text" name="title" value="<?php echo(htmlentities($row['title'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="remote">Remote Work:</label></div>
				<div class="col2"><select name="remote" value="<?php echo(htmlentities($row['remote'])); ?>" required>
					<option value="1" <?php if ($row['remote']==1) echo('selected'); ?>>Yes</option>
					<option value="0" <?php if ($row['remote']==0) echo('selected'); ?>>No</option>
				</select></div>
			</div>
			<div>
				<div class="col1"><label for="paid">Paid:</label></div>
				<div class="col2"><select name="paid" value="<?php echo(htmlentities($row['paid'])); ?>" required>
					<option value="1" <?php if ($row['paid']==1) echo('selected'); ?>>Yes</option>
					<option value="0" <?php if ($row['paid']==0) echo('selected'); ?>>No</option>
				</select></div>
			</div>
			<div>
				<div class="col1"><label for="hours">Hours per Week:</label></div>
				<div class="col2"><input type="number" name="hours" value="<?php echo(htmlentities($row['hours'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="name">Name of Contact:</label></div>
				<div class="col2"><input type="text" name="name" value="<?php echo(htmlentities($row['name'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="email">Contact Email:</label></div>
				<div class="col2"><input type="email" name="email" value="<?php echo(htmlentities($row['email'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="link">Link to Listing:</label></div>
				<div class="col2"><input type="text" name="link" value="<?php echo(htmlentities($row['link'])); ?>"></div>
			</div>
			<div>
				<div class="col1"><label for="end_date">End Date:</label></div>
				<div class="col2"><input type="date" name="end_date" value="<?php echo(htmlentities($row['end_date'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="description">Brief Description:</label></div>
				<div class="col2"><input type="text" name="description" value="<?php echo(htmlentities($row['description'])); ?>" required></div>
			</div>
			<div>
				<div class="col1"><label for="skills">Skills Needed:</label></div>
				<div class="col2"><input type="text" name="skills" value="<?php echo(htmlentities($row['skills'])); ?>" required></div>
			</div>
			<div>
				<input type="hidden" name="listing_id" value="<?php echo(htmlentities($_GET['id'])); ?>" required>
				<input class="create_button" type="submit" value="Save Changes">
			</div>
		</form>
		<?php
			if ( isset($_SESSION["success"]) ) {
				echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
				unset($_SESSION["success"]);
			}
		?>
	</div>
</div>

</body>
</html>