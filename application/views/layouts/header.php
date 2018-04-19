<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/materialize/css/materialize.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/artikel.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/animate.css') ?>">
<body>
        
	<nav class="blue darken-2">
		<div class="nav-wrapper">
			<ul class="hide-on-med-and-down right">
				<li><a href="home">Artikel</a></li>
				<li><a href="tambah">Input</a></li>
				<li><a href="#">About</a></li>
				<?php if (isset($_SESSION['loggin'])) { ?>
					<li><a href="logout">Logout</a></li>
				<?php }else{ ?>
					<li><a href="login">Login</a></li>
				<?php } ?>
				
			</ul>
		</div>
	</nav>
	 <div class="progress proses">
	      <div class="indeterminate"></div>
	 </div>
