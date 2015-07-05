<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="Open Data, Digital Data">
	<meta name="author" content="onnayokheng, monterico">

	<title>Digita - Open Digital Data</title>

	<!-- Bootstrap core CSS -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700|Raleway:700,400' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

  	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="">DIGITA</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><?php echo anchor('site','Home'); ?></li>
						<li><?php echo anchor('site/about','About'); ?></li>
						<li><?php echo anchor('site/contact','Contact'); ?></li>
					</ul>
					<?php if ($this->session->userdata('user_id')!='') { ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Hola, <strong><?php echo $this->session->userdata('username'); ?></strong>!</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Profile</a></li>
									<li><?php echo anchor('site/submit','Submit Data'); ?></li>
									<li role="separator" class="divider"></li>
									<li><?php echo anchor('auth/logout','Logout'); ?></li>
								</ul>
							</li>
						</ul>
					<?php } else { ?>
						<ul class="nav navbar-nav navbar-right">
							<li><?php echo anchor('auth','Login'); ?></li>
							<li><?php echo anchor('auth/register','Register'); ?></li>
						</ul>
					<?php } ?>
				</div>
			</div>
		</nav>