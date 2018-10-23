<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Internal Akses</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css" />
	<!-- Google Font -->
        <link href="<?php echo base_url('assets/bootstrap_3_2_0/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap_3_2_0/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
<!--	<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/html5shiv/html5shiv.min.js"></script>
      <script src="assets/respond/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery Library
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- Bootstrap Core JS -->
	<script src="assets/bootstrap_3_2_0/js/bootstrap.min.js"></script>
</head>
<body>
	
	<section class="container">
	    <section class="login-form">
		 <?php 
                            $attributes = array("class" => "form-signin", "id" => "loginform", "name" => "loginform", "role"=>"login");
                          echo form_open("loginhere/login_process", $attributes);
                        ?>
			<div>
				<!-- <img src="assets/img/header.png" alt="" /> -->
				<h4>Internal Masjid Al-Falah Akses</h4>
			</div>			
			<input type="username" name="username" placeholder="Username" required class="form-control input-lg" />
			<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
			<button type="submit" name="go" class="btn btn-lg btn-block btn-info">Login</button>
			<div>
				
			</div>
		</form>
		</section>
	</section>
	
</body>
</html>