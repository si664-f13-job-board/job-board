<?php
	require_once "db.php";
    session_start();
    unset($_SESSION["account"]);
    if ( isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["organization"]) ) {
		$e = mysql_real_escape_string($_POST["email"]);
		$p = mysql_real_escape_string($_POST["password"]);
		$n = mysql_real_escape_string($_POST["name"]);
		$o = mysql_real_escape_string($_POST["organization"]);
		
		if ( strlen($e) == 0 || strlen($p) == 0 || strlen($n) == 0 || strlen($o) == 0) {
			$_SESSION['message'] = 'Bad value for email, password, name, or organization.';
			header( 'Location: create_account.php' );
			return;
		}
		
		$sql = "INSERT INTO employer (email, password, name, organization) VALUES (:email, :password, :name, :organization)";
		$q = $pdo -> prepare($sql);
		$q -> execute(array(':email'=>$e, ':password'=>$p, ':name'=>$n, ':organization'=>$o));
		
		$employer_id = $pdo->query("SELECT id FROM employer WHERE email='".$e."' AND password='".$p."'");
		
		$_SESSION['account'] = $employer_id;
		$_SESSION['message'] = 'Account Created!';
		header( 'Location: login.php' );
	}
?>

<?php include "header.php" ?>

<div class="container">
	<div class="account_container">
		<h1>CREATE ACCOUNT</h1>
	</div>
	<div class="account_container account_box">
		<form method="post">
			<label for="email">Email:</label><br />
			<input type="email" id="email" name="email" required><br />
			<label for="password">Password:</label><br />
			<input type="password" id="password" name="password"required><br />
			<label for="name">Name:</label><br />
			<input type="text" id="name" name="name" required><br />
			<label for="organization">Company/Organization:</label><br />
			<input type="text" id="organization" name="organization" required><br />
			<br />
			<input class="create_button" type="submit" value="Create Account">
		</form>
	</div>
</div>

</body>
</html>