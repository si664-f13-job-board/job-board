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
	<div class="listing_container">
		<h1>CREATE NEW JOB LISTING</h1>
	</div>
	<div class="listing_container listing_box">
		<form method="post">
			<div>
				<div class="col1"><label for="title">Position Title:</label></div>
				<div class="col2"><input type="text" name="title" required></div>
			</div>
			<div>
				<div class="col1"><label for="remote">Remote Work:</label></div>
				<div class="col2"><select name="remote" required>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></div>
			</div>
			<div>
				<div class="col1"><label for="paid">Paid:</label></div>
				<div class="col2"><select name="paid" required>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></div>
			</div>
			<div>
				<div class="col1"><label for="hours">Hours per Week:</label></div>
				<div class="col2"><input type="number" name="hours" required></div>
			</div>
			<div>
				<div class="col1"><label for="name">Name of Contact:</label></div>
				<div class="col2"><input type="text" name="name" required></div>
			</div>
			<div>
				<div class="col1"><label for="email">Contact Email:</label></div>
				<div class="col2"><input type="email" name="email" required></div>
			</div>
			<div>
				<div class="col1"><label for="link">Link to Listing:</label></div>
				<div class="col2"><input type="text" name="link" ></div>
			</div>
			<div>
				<div class="col1"><label for="end_date">End Date:</label></div>
				<div class="col2"><input type="date" name="end_date" required></div>
			</div>
			<div>
				<div class="col1"><label for="description">Brief Description:</label></div>
				<div class="col2"><input type="text" name="description" required></div>
			</div>
			<div>
				<div class="col1"><label for="skills">Skills Needed:</label></div>
				<div class="col2"><input type="text" name="skills" required></div>
			</div>
			<div>
				<div class="col2"><input class="create_button" type="submit" value="Create Listing">
			</div>
		</form>
	</div>
</div>

</body>
</html>
