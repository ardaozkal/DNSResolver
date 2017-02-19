<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="aozkal">

	<title>DNS Resolver</title>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<!-- Custom styles for this template -->
	<link href="https://v4-alpha.getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="index.php">DNS Resolver</a>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="index.php" method="post">
				<input class="form-control mr-sm-2" name="domain" type="text" placeholder="Domain Name:">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Resolve</button>
			</form>
		</div>
	</nav>
	<div class="container">

		<div class="starter-template">
			<h1>DNS Resolver</h1>
			<p class="lead">Write the domain name above or here.</p>
			<form action="index.php" method="post">
				Domain Name:<br><input type="text" name="domain">

				<input type="submit" value="Resolve">
			</form>

			<?php
			require_once('/usr/share/php/Net/DNS2.php');
			if (isset($_REQUEST['domain']))
			{
				echo("<br><br><br>");
				$domain = $_REQUEST['domain'];
		$domain = preg_replace('#^https?://#', '', $domain); // DNS REQUESTS DON'T TAKE PROTOCOLS DAMMIT, STOP ADDING THEM AND BLAMING ME FOR IT NOT WORKING
		$r = new Net_DNS2_Resolver();
		$result = $r->query($domain);
		$linedresult = str_replace("\n", "<br>", $result);
		print('<code>'.$linedresult.'</code>');
	}
	?>
</div>
</div>
</body>
</html>