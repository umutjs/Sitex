<?php

if(file_exists('baglanti.php')){
	die("Kurulum zaten yapilmis!");
}
else{

$adim = $_GET['adim'];

if ($adim == "1"){
	if ($_POST){
		
		$host = $_POST["host"];
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$veritabani = $_POST["db"];

		try {

$sql = "
CREATE TABLE `alinanurun` (
  `urun_id` int(11) NOT NULL,
  `urun_isim` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `urun_fiyat` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
$sql2 = "
CREATE TABLE `authme` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `lastlogin` bigint(20) DEFAULT NULL,
  `x` smallint(6) DEFAULT '0',
  `y` smallint(6) DEFAULT '0',
  `z` smallint(6) DEFAULT '0',
  `yetki` tinyint(4) NOT NULL DEFAULT '0',
  `kredi` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$sql3 = "
CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `sunucu_ip` varchar(50) NOT NULL,
  `sunucu_port` varchar(10) NOT NULL,
  `sunucu_isim` varchar(200) NOT NULL,
  `websend_sayisalip` varchar(20) NOT NULL,
  `websend_sifre` varchar(100) NOT NULL,
  `websend_port` varchar(10) NOT NULL,
  `discord_davetkodu` varchar(25) NOT NULL,
  `batihost_id` varchar(10) NOT NULL,
  `batihost_email` varchar(100) NOT NULL,
  `batihost_token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
$sql4 = "
CREATE TABLE `krediler` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `metod` varchar(10) NOT NULL,
  `miktar` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
$sql5 = "
CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_isim` varchar(50) NOT NULL,
  `urun_resimurl` varchar(255) NOT NULL,
  `urun_fiyat` int(11) NOT NULL,
  `urun_komut` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
$sql6 = "
ALTER TABLE `alinanurun`
  ADD PRIMARY KEY (`urun_id`);
";
$sql7 = "
ALTER TABLE `authme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
";
$sql8 = "
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);
";
$sql9 = "
ALTER TABLE `krediler`
  ADD PRIMARY KEY (`id`);
";
$sql10 = "
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);
";
$sql11 = "
ALTER TABLE `alinanurun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;
";
$sql12 = "
ALTER TABLE `authme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
";
$sql13 = "
ALTER TABLE `krediler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
";
$sql14 = "
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";
$sql15 = "
INSERT INTO `authme` (`id`, `username`, `password`, `ip`, `lastlogin`, `x`, `y`, `z`, `yetki`, `kredi`) VALUES
(1, 'admin', '4938818ba651eaaef6eddae12fee574f', '', NULL, 0, 0, 0, 1, 0);
";
$sql16 = "
INSERT INTO `ayar` (`ayar_id`, `site_title`, `sunucu_ip`, `sunucu_port`, `sunucu_isim`, `websend_sayisalip`, `websend_sifre`, `websend_port`, `discord_davetkodu`, `batihost_id`, `batihost_email`, `batihost_token`) VALUES
(0, 'WebBrick', 'play.Brick.web', '25565', 'WebBrick', '127.0.0.1', 'w3bs', '4445', 'Qjb56Ku', '0000', 'mail@mail.com', 'wb');
";
		     $db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8", "$username", "$pass");
		     $db->query($sql);
		     $db->query($sql2);
		     $db->query($sql3);
		     $db->query($sql4);
		     $db->query($sql5);
		     $db->query($sql6);
		     $db->query($sql7);
		     $db->query($sql8);
		     $db->query($sql9);
		     $db->query($sql10);
		     $db->query($sql11);
		     $db->query($sql12);
		     $db->query($sql13);
		     $db->query($sql14);
		     $db->query($sql15);
		     $db->query($sql16);

		} catch ( PDOException $e ){

        echo '<br><br><center><font size="6" color="red" face="Arial">MySQL Veritabanina baglanilamadi!</font></center>';

        header("refresh:2;url=install.php");

		}
		if($db){

			$olustur = touch("baglanti.php");

			if($olustur){
				$ac     = fopen('baglanti.php', 'w');
				$icerik = '
<?php
$host = "'.$host.'"; //sunucu ip
$kullanici = "'.$username.'"; //kullanici adi
$sifre = "'.$pass.'"; //sifre
$db = "'.$veritabani.'";//veritabani ismi 

try {
     $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", "$kullanici", "$sifre");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>
';

				$kaydet = fwrite($ac, $icerik);

				echo '<br><br><center><font size="6" color="green" face="Arial">WebBrick v1 basariyla kurulmustur!</font></center>';

        header("refresh:2;url=index.php");


			}

		}


	}else{
		header("Location: install.php");
	}
}else{

?>

<br>
<br>
<br>
<center>
<div style="width: 50%; background-color: #ddd; height: 50%; font-family: Arial;">
<br><br>
<center>
<h1>WebBrick v1 Script Kurulum Sihirbazı</h1>
<br><br>
<form action="install.php?adim=1" method="post">
<table>
	<tr>
		<td>MySQL Host(Sunucu):</td>
		<td><input type="text" name="host" placeholder="Örn: localhost" /></td>
	</tr>
	<tr>
		<td>MySQL Kullanıcı Adı:</td>
		<td><input type="text" name="username" placeholder="Örn: root" /></td>
	</tr>
	<tr>
		<td>MySQL Şifre:</td>
		<td><input type="password" name="pass" /></td>
	</tr>
	<tr>
		<td>MySQL Veritabanı:</td>
		<td><input type="text" name="db"/></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit" style="float: right;">Kurulumu Başlat</button></td>
	</tr>
</table>
</form>
</center>
</div>
</center>
<?php } } ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WebBrick v1</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src='https://www.google.com/recaptcha/api.js'></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
    !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){      
        $(this).find('em:first').toggleClass("glyphicon-minus");    
      }); 
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script> 
</body>

</html>