<?php
$sunucu = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "etiketler";

if ( @mysql_connect($sunucu,$kullanici,$sifre) == false ) {
	$mesaj = "<b>Hata</b> : Ba�lant� ba�ar�s�z. <br> <b>Hata A��klamas�</b> : ".mysql_error();
	die($mesaj);
}

if ( @mysql_select_db($veritabani) == false ) {
	$mesaj = "<b>Hata</b> : Veritaban� Se�ilmedi <br> <b>Hata A��klamas�</b> : ".mysql_error();
	die($mesaj);
}

mysql_query("SET NAMES 'utf8'");

?>