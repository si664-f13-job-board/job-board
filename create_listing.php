<?php
session_start();  
if('POST' === $_SERVER['REQUEST_METHOD']) {
  require_once "db.php";
  if(!isset($_SESSION["account"])) {
    $_SESSION["error"] = "Please sign in.";
    header( 'Location: login.php' ) ;
    return; 
  }
  $values = array(':employer_id' => $_SESSION['account']);
  foreach(array('title', 'remote', 'paid', 'hours', 'name', 'email', 'link', 'end_date', 'description', 'skills') as $k) {
    $values[":$k"] = isset($_POST[$k]) ? $_POST[$k] : '';
    if(empty($values[":$k"])) {
      $_SESSION['message'] = 'Bad value for title, remote, paid, hours, name, email, link, end date, description or skills';
      header( 'Location: create_listing.php' );
      return;
    }
  }
  $q = $pdo->prepare("INSERT INTO listing(employer_id, title, remote, paid, hours, name, email, link, end_date, description, skills) VALUES (:employer_id, :title, :remote, :paid, :hours, :name, :email, :link, :end_date, :description, :skills)");
  $q -> execute($values);
  $_SESSION['message'] = 'Listing Created!';
  header( 'Location: my_listings.php');
  return;
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
	<form method="post">
	<div>
		<div class="col1"><label for="title">Position Title:</label></div>
		<div class="col2"><input type="text" name="title" required></div>
	</div>
	<div>
		<div class="col1"><label for="remote">Remote Work:</label></div>
		<div class="col2"><select name="remote"> <option value="1">Yes</option> <option value ="2"> No </option></select>required
		</div>
	</div>
	<div>
		<div class="col1"><label for="paid">Paid:</label></div>
		<div class="col2"><select name="paid"> <option value="1">Yes</option> <option value ="2"> No </option></select>required</div>
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
		<div class="col1"><label for="end_date">End Date: </label></div>
		<div class="col2"><input type="date" name="end_date" required></div>
	</div>
	<div>
		<div class="col1"><label for="description">Brief Description: </label></div>
		<div class="col2"><input type="text" name="description" required></div>
	</div>
	<div>
		<div class="col1"><label for="skills">Skills Needed:</label></div>
		<div class="col2"><input type="text" name="skills" required></div>
	</div>
	<div>
		<input class="create_button" type="submit" value="Create Listing">
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