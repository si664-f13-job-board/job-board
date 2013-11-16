<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Job Board</title>
	<link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.min.css" />
	<link href="static/css/style.css" rel="stylesheet">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Job Board</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav pull-right">
				<?php if ( ! isset($_SESSION["account"]) ) { ?>
					<li><a href="create_account.php">Create Account</a></li>
					<li><a href="login.php">Employer Login</a></li>
				<?php } else { ?>
					<li><a href="my_listings.php">My Listings</a></li>
					<li><a href="create_listing.php">Create New Listing</a></li>
					<li><a href="edit_account.php">Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>