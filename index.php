<?php

	if (!file_exists("baglanti.php")){
		require("install.php");
		die;
	}

	include("WebsenderAPI.php");
	include("baglanti.php");
	error_reporting(0);
	session_start();
	ob_start();

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id = ?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch();
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon">

    <title><?php echo $ayarcek['site_title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    
    <!-- =======================================================
        Theme Name: Malware
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
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Ana Sayfa</a></li>
        <?php if (!isset($_SESSION["user_nick"])) {?>
        	<li><a href="kayitol.php">Kayıt ol</a></li>
        	<li><a href="girisyap.php">Giriş yap</a></li>
        <?php } ?>
		<li><a href="iletisim.php">İletişim</a></li>
		<?php if($_SESSION["user_nick"]){ ?>
        <li><a href="market.php">Market</a></li>
        <li><a href="cikisyap.php">Çıkış Yap -></a></li>
		<li><a href="indexprofil.php"><?php
					$kadi = $db->prepare("select * from authme where username=:username");
					$kadi->execute(array('username' => $_SESSION['user_nick']));
					$oku = $kadi->fetch(PDO::FETCH_ASSOC);
					echo "Merhaba, ".$oku['username'];
			?><li></a><?php } ?>
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
			<h2><?php echo $ayarcek['sunucu_isim']; ?></h2>
			<a href="https://discord.gg/<?php echo $ayarcek['discord_davetkodu']; ?>"><h4>Discord</h4></a>
			<h4><?php echo $ayarcek['sunucu_ip']; ?></h4>
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
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
                        -->
						<a href="https://discord.gg/Qjb56Ku" target="_blank">WebBrick</a> tarafından çevirilmiş ve minecraft sürümü haline getirilmiştir.
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


