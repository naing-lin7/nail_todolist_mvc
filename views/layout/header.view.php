<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($title) ? $title : 'Todo list' ?></title>
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="home">Todo list</a>
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link <?= isset($active_home) ? 'active' : '' ?>" href="home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= isset($active_about) ? 'active' : '' ?>" href="about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= isset($active_contact) ? 'active' : '' ?>" href="contact">contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">