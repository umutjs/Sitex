<?php

	include("Websend.php");
	include("baglanti.php");
	error_reporting(0);
	session_start();
	ob_start();

	if($_POST){
		$kadi = htmlspecialchars($_POST["kadi"]);
		$pass = $_POST["sifre"];
		if(strlen($kadi)>=4 && strlen($pass)>=4)
		{
			$sifre = md5($pass);
			$sorgu = $db->prepare("insert into authme (username, password, ip, lastlogin, x, y, z) values ('$kadi', '$sifre', '0', 'null', '0', '0', '0')");
			$sorgu->execute();
			
			if($sorgu){
				$_SESSION['user_nick'] = $kadi;
				echo "<script>alert('Başarıyla kayıt oldunuz, üst taraftaki geri git butonuna tıklayarak ana sayfaya gidin, ondan sonra giriş yap butonuna basarak giriş yapın.')</script>";
				header("refresh: 0;  url=indexprofil.php");
			} else{
				echo "<script>alert('Kullanıcı adı daha önce kayıtlanmış.')</script>";
			}
		}
		else
		{
			echo "<script>('Kullanıcı adı ve şifre boş olmamalı')</script>";
		}
	}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon">

    <title>WebBrick</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Malware theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    
    <!-- =======================================================
        Theme Name: WebBrick
        Theme URL: Veremeyiz, Batihost.com
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
		Translater: Malware
		Minecraft Version: 1.8,1.9,1.10,1.11
    ======================================================= -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
				<header>
				<strong> Kayıt olma sayfasına hoşgeldiniz,
				<header>
				<strong> Burada kayıt olup sunucuya giriş yapabilirsiniz.
				<header>
				<strong> Kayıt olduktan sonra açılan yerler; Market ve Profil.
				</div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
		<li><a href="index.php">Geri git -></a></li>
          </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Kayıt Ol <span class="text_color"></span> </h2>
			<h4>Aşağı kaydırın, kayıt olma yerini göreceksiniz.</h4>
		</div>
    </section>
	<!-- /Section: intro -->

	 

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
<html>
	<?php include("header.php"); ?>
<body>
	<form method="post" action="">
		<div id="content">
		<br>
		<strong>Kullanıcı adı</strong>
		<header>
		<input type="text" minlength="4" maxlength="16" type="text" name="kadi" /><br />
		<header>
		<br>
		<strong>Şifre</strong> 
		<header>
		<input type="password" minlength="4" maxlength="16" type="text" name="sifre" />
		<header>
		<input type="submit" value="Tıkla, kayıt ol" style="margin-top: 15px">
		<br><br>
		</div>
	</form>
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: Veremeyiz,
                        -->
						<a href="https://discord.gg/Qjb56Ku" target="_blank">WebBrick</a>
                    </div>
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>

</html>

 
