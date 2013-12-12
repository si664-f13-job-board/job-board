<?php
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return; 
    }
	if ( isset($_POST["listing_id"]) && isset($_POST["title"]) && isset($_POST["remote"]) && isset($_POST["paid"]) && isset($_POST["hours"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["link"]) && isset($_POST["end_date"]) && isset($_POST["description"]) && isset($_POST["skills"]) ) {
		$listing_id = mysql_real_escape_string($_POST["listing_id"]);
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
		
	
		if (strlen($listing_id) == 0 || strlen($title) == 0 || strlen($remote) == 0 || strlen($paid) == 0 || strlen($hours) == 0 || strlen($name) == 0 || strlen($email) == 0 || strlen($link) == 0 || strlen($end_date) == 0 || strlen($description) == 0 || strlen($skills)){
				$_SESSION['message'] = 'Bad value for title, remote, paid, hours, name, email, link, end date, description or skills';
                header( 'Location: create_listing.php' );
                return;
		}
		
		$sql = "INSERT INTO listing (listing_id, title, remote, paid, hours, name, email, link, end_date, description, skills, description)
		VALUES (:listing_id, :title, :remote, :paid, :hours, :name, :email, :link, :end_date, :description, :skills)";
		$q = $pdo -> prepare($sql);
		$q -> execute (array(':listing_id'=>$listing_id, ':title'=>$title, ':remote'=>$remote, ':paid'=>$paid, 
							':hours'=>$hours, ':name'=>$name, ':email'=>$email, ':link'=>$link, ':end_date'=>$end_date, ':description'=>$description, ':skills'=>$skills));
							
		$employer_id=$SESSION["account"];
		
		$_SESSION['account'] = $listing_id;
		$_SESSION['message'] = 'Listing Created!';
		header( 'Location:create_listing.php');
}
?>

<?php include "header.php" ?>
<html>
<body>
<div class="container">
	<div class="listing_container">
		<h1>CREATE NEW JOB LISTING</h1>
	</div>
	<div class="listing_container listing_box">
		<form>
			<div class="col1">
				<label for="title">Position Title:</label><br/>
				<label for="remote">Remote Work:</label>br />
				<label for="paid">Paid:</label><br />
				<label for="hours">Hours per Week:</label><br />
				<label for="name">Name of Contact:</label><br />
				<label for="email">Contact Email:</label><br />
				<label for="link">Link to Listing:</label><br />
				<label for="end_date">End Date: </label><br />
				<label for="description">Brief Description: </label><br />
				<label for="skills">Skills Needed:</label><br />
				
			</div>
			<div class="col2">
				<input type="text" name="title" required><br />
				<select name="remote"> <option value="1">Yes</option> <option value ="2"> No </option> required><br />
				<select name="paid"> <option value="1">Yes</option> <option value ="2"> No </option>required><br />
				<input type="number" name="hours" required><br />
				<input type="text" name="name" required><br />
				<input type="email" name="email" required><br />
				<input type="text" name="link" ><br />
				<input type="date" name="enddate" required><br />
				<input type="text" name="description" required><br />
				<input type="text" name="skills" required><br />
				<input class="create_button" type="submit" value="Create Listing">
			</div>
		</form>
	</div>
</div>

</body>
</html>