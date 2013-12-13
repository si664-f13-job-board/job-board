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
	<div class="col1">
		<label for="title">Position Title:</label><br/>
		<label for="remote">Remote Work:</label><br />
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
		<select name="remote"> <option value="1">Yes</option> <option value ="2"> No </option></select>required<br />
		<select name="paid"> <option value="1">Yes</option> <option value ="2"> No </option></select>required<br />
		<input type="number" name="hours" required><br />
		<input type="text" name="name" required><br />
		<input type="email" name="email" required><br />
		<input type="text" name="link" ><br />
		<input type="date" name="end_date" required><br />
		<input type="text" name="description" required><br />
		<input type="text" name="skills" required><br />
		<input class="create_button" type="submit" value="Create Listing">
   </div>
 </form>
 <?php if(isset($_SESSION['message'])) { ?>
 <div><h4><?php echo $_SESSION['message']; ?></h4></div>
 <?php unset($_SESSION['message']); } ?>
</div>
</div>
</body>
</html>