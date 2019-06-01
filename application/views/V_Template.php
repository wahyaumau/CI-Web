<!DOCTYPE html>
<html>
	<head>
		<title>Code Igniter Latihan</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="<?php echo base_url();?>">CodeIgniter Web</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?php if($this->uri->segment(1)==''){echo 'active';}?>">
						<a class="nav-link" href="<?php echo base_url();?>">Home<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1)=='contact')echo 'active';?>">
						<a class="nav-link" href="<?php echo base_url();?>index.php/contact">Contact</a>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1)=='mahasiswa')echo 'active';?>">
						<a class="nav-link" href="<?php echo base_url();?>index.php/mahasiswa">Mahasiswa</a>
					</li>
					<?php if ($this->session->userdata('username')==null){ ?>
					<li class="nav-item <?php if($this->uri->segment(1)=='register')echo 'active';?>">
						<a class="nav-link" href="<?php echo base_url();?>index.php/register">Register</a>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1)=='login')echo 'active';?>">
						<a class="nav-link" href="<?php echo base_url();?>index.php/login">Login</a>
					</li>
					<?php }else{ ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Hello <?=$this->session->userdata('username')?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/logout">Logout</a>
						</div>
					</li>					
					<?php } ?>
				</ul>
				<ul>
					<img src="<?php echo base_url().'assets/images/polbann.svg'?>" width=50px>
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			
			<?php if(isset($view))echo $view?>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>