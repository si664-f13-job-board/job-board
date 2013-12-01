<?php
	require_once "db.php";
    session_start();
	if ( !isset($_SESSION["account"]) ) {
        $_SESSION["error"] = "Please sign in.";
        header( 'Location: login.php' ) ;
        return; 
    }
	else {
		$row = $pdo->query("SELECT email, name, organization FROM employer WHERE id='".$_SESSION["account"]."'")->fetch(PDO::FETCH_ASSOC);
	}
	if ( isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["organization"]) ) {
		$e = mysql_real_escape_string($_POST["email"]);
		$n = mysql_real_escape_string($_POST["name"]);
		$o = mysql_real_escape_string($_POST["organization"]);	
	
		$sql = "UPDATE employer SET email=:email, name=:name, organization=:organization WHERE id=:id";
		$q = $pdo -> prepare($sql);
		$q -> execute(array(':email'=>$e, ':name'=>$n, ':organization'=>$o, ':id'=>$_SESSION["account"]));
		
		$_SESSION['success'] = 'Changes saved.';
		header( 'Location: edit_account.php?id='.$_SESSION['account'] );
		return;
	}
?>

<?php include "header.php" ?>

<div class="container">
	<div class="account_container">
		<h1>EDIT ACCOUNT</h1>
	</div>
	<div class="account_container account_box">
		<form method="post">
			<label for="email">Email:</label><br />
			<input type="email" id="email" name="email" value="<?php echo(htmlentities($row['email'])); ?>" required><br />
			<label for="name">Name:</label><br />
			<input type="text" id="name" name="name" value="<?php echo(htmlentities($row['name'])); ?>" required><br />
			<label for="organization">Company/Organization:</label><br />
			<input type="text" id="organization" name="organization" value="<?php echo(htmlentities($row['organization'])); ?>" required><br />
			<br />
			<input class="account_button" type="submit" value="Save Changes">
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