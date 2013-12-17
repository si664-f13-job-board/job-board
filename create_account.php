<?php
	if('POST' === $_SERVER['REQUEST_METHOD']) {
	
		require_once "db.php";
		session_start();
		unset($_SESSION["account"]);
		
		$values = array();
		foreach (array('email', 'password', 'name', 'organization') as $k) {
			$values[":$k"] = isset ($_POST[$k]) ? $_POST[$k] : '';
			if(empty($values[":$k"])) {
				$_SESSION['message'] = 'Bad value for email, password, name, or organization.';
				header( 'Location: create_account.php' );
				return;
			}
		}
		
		$sql = "INSERT INTO employer (email, password, name, organization) VALUES (:email, :password, :name, :organization)";
		$q = $pdo -> prepare($sql);
		$q -> execute(array(':email'=>$values[':email'], ':password'=>$values[':password'], ':name'=>$values[':name'], ':organization'=>$values[':organization']));
		
		$sql = "SELECT employer_id FROM employer WHERE email = :email AND password = :password";
		$q = $pdo -> prepare($sql);
		$q -> execute(array (':email' => $values[':email'], ':password' => $values[':password']));
		$row = $q -> fetch(PDO::FETCH_ASSOC);
		
		$_SESSION['account'] = $row['employer_id'];
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