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
	<div class="listing_container">
		<h1>CREATE NEW JOB LISTING</h1>
	</div>
	<div class="listing_container listing_box">
		<form>
			<div class="col1">
				<label for="employer">Employer:</label><br />
				<label for="position">Position Title:</label><br />
				<label for="remote">Remote Location:</label><br />
				<label for="pay">Pay:</label><br />
				<label for="hours">Hours per Week:</label><br />
				<label for="contact">Contact:</label><br />
				<label for="email">Contact Email:</label><br />
				<label for="num">Contact Phone:</label><br />
				<label for="postdate">Posting Date: </label><br />
				<label for="enddate">End Date:</label><br />
				<label for="desc">Brief Description:</label><br />
				<label for="skills">Skills Needed:</label><br />
				<label for="apply">How to Apply:</label><br />
			</div>
			<div class="col2">
				<input type="text" name="employer" required><br />
				<input type="text" name="position" required><br />
				<input type="text" name="remote" required><br />
				<input type="text" name="pay" required><br />
				<input type="number" name="hours" required><br />
				<input type="text" name="contact" required><br />
				<input type="email" name="email" required><br />
				<input type="number" name="num" required><br />
				<input type="date" name="postdate" required><br />
				<input type="date" name="enddate" required><br />
				<input type="text" name="desc" required><br />
				<input type="text" name="skills" required><br />
				<input type="text" name="apply" required><br />
				<input class="create_button" type="submit" value="Create Listing">
			</div>
		</form>
	</div>
</div>

</body>
</html>
