<?php
	require_once "db.php";
    session_start();
    unset($_SESSION["account"]);
    if ( isset($_POST["email"]) && isset($_POST["password"]) ) {
		$e = mysql_real_escape_string($_POST["email"]);
		$p = mysql_real_escape_string($_POST["password"]);
		
		$row = $pdo->query("SELECT id, password FROM employer WHERE email='".$e."' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
		if ( $row['id'] > 0 ) {
			if ( $p == $row['password'] ) {
			$_SESSION['account'] = $row['id'];
			header( 'Location: my_listings.php' );
			}
			else {
				$_SESSION['error'] = 'Wrong password.';
				header( 'Location: login.php' );
				return;
			}
		}
		else {
			$_SESSION['error'] = 'Email address not found.';
			header( 'Location: login.php' );
			return;
		}		
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