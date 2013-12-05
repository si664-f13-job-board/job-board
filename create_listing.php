<?php
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return; 
    }
	if (isset($_POST["employer"]) && isset($_POST["position"]) && isset($_POST["title"]) 
	&& isset($_POST["contact"]) && isset($_POST["email"]) && isset($_POST["num"]) && isset($_POST["postdate"])
	&& isset($_POST["enddate"]) && isset($_POST["location"]) && isset($_POST["desc"]) 
	&& isset($_POST["qualifications"]) && isset($_POST["salary"]) && isset($_POST["apply"]) ) {
		$em = msql_real_escape_string($_POST["employer"]);
		$po = msql_real_escape_string($_POST["position"]);
		$ti = msql_real_escape_string($_POST["title"]);
		$co	= msql_real_escape_string($_POST["contact"]);
		$el = msql_real_escape_string($_POST["email"]);
		$num = msql_real_escape_string($_POST["num"]);
		$en = msql_real_escape_string($_POST["enddate"]);
		$lo = msql_real_escape_string($_POST["location"]);
		$d = msql_real_escape_string($_POST["description"]);
		$q = msql_real_escape_string($_POST["qualifications"]);
		$s = msql_real_escape_string($_POST["salary"]);
		$a = msql_real_escape_string($_POST["apply"]);
		
	
		if (strlen($em) == 0 || strlen($po) == 0 || strlen($ti) == 0 || strlen($co) == 0 || 
			strlen($el) == 0 || strlen($num) == 0 || strlen($en) == 0 || strlen($lo) == 0 ||
			strlen($d) == 0 || strlen($q) == 0 || strlen($s) == 0 || strlen($a) {
				$_SESSION['message'] = 'Bad value for email, password, name, or organization.';
                        header( 'Location: create_listing.php' );
                        return;
		}
		
		$sql = "INSERT INTO listing (employer, position, title, contact, email, num, enddate, location, description, qualifications, salary, apply)
		VALUES (:employer, :position, :title, :contact, :email, :num, :enddate, :location, :description, :qualifications, :salary, :apply)"
		$q = $pdo -> prepare($sql);
		$q -> execute (array(':employer'=>$em, ':position'=>$po, ':title'=>$ti, ':contact'=>$co:, 
							'email'=>$el, ':num'=>$num, 'enddate'=>$en, 'location'=>$lo, 'description'=>$d, 'qualifications'=>$q, 'salary'=>$s, 'apply'=>$a));
							
		employer_id=$SESSION["account"];
		
		$_SESSION['account'] = $listing_id;
		$_SESSION['message'} = 'Listing Created!';
		header( 'Location:create_listing.php')
	/*$field=array("employer", "position", "title", "contact", "email", "num", "postdate", "enddate",
					"location","desc","qualifications","salary","apply");
	if(!isset($_POST[$field])) { /* do something */ }	

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
				<label for="position">Position Type:</label><br />
				<label for="title">Position Title:</label><br />
				<label for="contact">Contact:</label><br />
				<label for="email">Contact Email:</label><br />
				<label for="num">Contact Phone:</label><br />
				<label for="postdate">Posting Date: </label><br />
				<label for="enddate">End Date:</label><br />
				<label for="location">Location: </label><br />
				<label for="desc">Brief Description:</label><br />
				<label for="qualifications">Qualifications:</label><br />
				<label for="salary">Salary:</label><br />
				<label for="apply">How to Apply:</label><br />
			</div>
			<div class="col2">
				<input type="text" name="employer" required><br />
				<input type="text" name="position" required><br />
				<input type="text" name="title" required><br />
				<input type="text" name="contact" required><br />
				<input type="email" name="email" required><br />
				<input type="number" name="num" required><br />
				<input type="date" name="postdate" required><br />
				<input type="date" name="enddate" required><br />
				<input type="text" name="location" required><br />
				<input type="text" name="desc" required><br />
				<input type="text" name="qualifications" required><br />
				<input type="text" name="salary" required><br />
				<input type="text" name="apply" required><br />
				<input class="create_button" type="submit" value="Create Listing">
			</div>
		</form>
	</div>
</div>

</body>
</html>