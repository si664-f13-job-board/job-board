<?php
    session_start();
    unset($_SESSION["account"]);
    if ( isset($_POST["account"]) && isset($_POST["pw"]) ) {
        if ( $_POST['pw'] == 'password' ) {
            $_SESSION["account"] = $_POST["account"];
            $_SESSION["success"] = "Logged in.";
            header( 'Location: my_listings.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login.php' ) ;
            return;
        }
    } else if ( count($_POST) > 0 ) {
        $_SESSION["error"] = "Missing Required Information";
        header( 'Location: login.php' ) ;
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
			<label for="account">Email:</label><br />
			<input type="email" id="email_addr" name="account" required /><br />
			<br />
			<label for="pw">Password:</label><br />
			<input type="password" id="password" name="pw" required /><br />
			<br />
			<br />
			<input class="login_button" type="submit" value="Login" />
		</form>
	</div>
</div>

</body>
</html>