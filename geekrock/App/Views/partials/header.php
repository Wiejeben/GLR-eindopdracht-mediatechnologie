<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php if(isset($title)): ?>{{ $title }} - <?php endif; ?>GeekRock 2015</title>
		
		<meta name="description" content="GeekRock is een Rotterdams rock- en popfestival voor geeks, nerds, dweebs en gamers. Intelligente muziek in een geweldig feest met een techie tintje.">
		
		<link rel="stylesheet" type="text/css" href="{{ url() }}/assets/css/reset.css">
		<link rel="stylesheet" type="text/css" href="{{ url() }}/assets/css/grid.css">
		<link rel="stylesheet" type="text/css" href="{{ url() }}/assets/css/jquery.bxslider.css">
		<link rel="stylesheet" type="text/css" href="{{ url() }}/assets/css/main.css">
		
		<!--[if lt IE 9]>
			<script type="text/javascript" src="{{ url() }}/assets/js/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container_12">

			<!-- logo -->
			<header class="grid_12 right">
				<div class="user-menu right">
					<?php if(!Auth::access()):?>
						<a href="{{ url('auth/login') }}">Inloggen</a> | <a href="{{ url('auth/register') }}">Registreren</a>
					<?php else:?>
						<?php if(Auth::access('admin')):?><a href="{{ url('admin') }}">Admin</a> | <?php endif;?>
						
						<a href="{{ url('auth/logout') }}">Uitloggen</a>
					<?php endif;?>
				</div>
				<h1>GeekRock</h1>
			</header>

			<!-- navigation -->
			<div class="grid_12">
				<nav>
					<ul>
						<li><a href="{{ url() }}" class="{{ Active::url() }}">Home</a></li>
						<li><a href="{{ url('video') }}" class="{{ Active::url('video') }}">Video's</a></li>
						<li><a href="{{ url('programma') }}" class="{{ Active::url('programma') }}">Programma</a></li>
						<li><a href="{{ url('shop') }}" class="{{ Active::url('shop') }}">Shop</a></li>
						<li><a href="{{ url('tickets') }}" class="{{ Active::url('tickets') }}">Tickets</a></li>
					</ul>
				</nav>
			</div>

			<?php if(substr($_SERVER['SCRIPT_NAME'], -10) == '/index.php'):?>
				<!-- frontpage slider -->
				<section class="grid_12">
					<ul class="bxslider1">
						<li><img src="{{ url() }}/assets/img/slider-img1.jpg" width="960" height="368" alt="" ></li>
						<li><img src="{{ url() }}/assets/img/slider-img2.jpg" width="960" height="368" alt="" ></li>
						<li><img src="{{ url() }}/assets/img/slider-img3.jpg" width="960" height="368" alt="" ></li>
					</ul>
				</section>
			<?php endif;?>

		</div>