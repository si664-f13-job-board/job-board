<?php
if('POST' === $_SERVER['REQUEST_METHOD']) {
	require_once "db.php";
	session_start();
	unset($_SESSION["account"]);

  $values = array();
  foreach(array('email', 'password') as $k) {
    $values[":$k"] = isset($_POST[$k]) ? $_POST[$k] : '';
    if(empty($values[":$k"])) {
		$_SESSION['message'] = 'Bad value for email or password';
		header( 'Location: login.php' );
		return;
    }
  }
	$q = $pdo->prepare("SELECT employer_id FROM employer WHERE email = :email AND password = :password LIMIT 1");
	$q->execute($values);;
	$row = $q->fetch(PDO::FETCH_ASSOC);

  if(false === $row) {
	$_SESSION['error'] = "Invalid username and password combination.";
    header('Location: login.php');
    return;
  }

  $_SESSION['account'] = $row['employer_id'];
  header('Location: my_listings.php');
  return;
}

?>

<?php include "header.php" ?>

<div class="container">
	<div class="login_container">
		<h1>EMPLOYER LOGIN</h1>
	</div>
	<div class="login_container login_box">
		<?php
			if ( isset($_SESSION["error"]) ) {
				echo('<p style="color:red">Error: '.$_SESSION["error"]."</p>\n");
				unset($_SESSION["error"]);
			}
		?>
		<form method="post">
			<label for="email">Email:</label><br />
			<input type="email" id="email" name="email" required /><br />
			<br />
			<label for="password">Password:</label><br />
			<input type="password" id="password" name="password" required /><br />
			<br />
			<br />
			<input class="login_button" type="submit" value="Login" />
		</form>
	</div>
</div>
</body>
</html>