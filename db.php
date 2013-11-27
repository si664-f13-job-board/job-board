<?php
try{ 
	// change host, port, username, & password when deploy. 
	$pdo = new PDO('mysql:host=localhost;port=8888;dbname=jobboard', 'root', 'root');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex){
	die($ex -> getMessage());
}
// $db = mysql_connect("localhost","root", "root")
//    or die('Fail message');
// mysql_select_db("jobboard") or die("Fail message");

?>