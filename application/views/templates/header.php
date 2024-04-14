<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">




	<title>Self</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-green">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url(); ?>" style="color: white;">Self Health</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarNavAltMarkup">
				<!-- ml-auto still works just fine-->
				<div class="navbar-nav ms-auto navbar-sh">
					<a class="nav-link bg-round" aria-current="page" href="<?= base_url(); ?>users/login">Login</a>
					<span class="navbar-text">
						or
					</span>
					<a class="nav-link bg-round" href="<?= base_url(); ?>users/register">Register</a>
					<a class="nav-link" href="<?php echo base_url(); ?>/about" , style="color: rgba(0,0,0,.55); background-color: #4caf50;">About</a>
				</div>
			</div>
		</div>
	</nav>