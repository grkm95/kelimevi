<?php
$sunucu = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "etiketler";

if ( @mysql_connect($sunucu,$kullanici,$sifre) == false ) {
	$mesaj = "<b>Hata</b> : Baðlantý baþarýsýz. <br> <b>Hata Açýklamasý</b> : ".mysql_error();
	die($mesaj);
}

if ( @mysql_select_db($veritabani) == false ) {
	$mesaj = "<b>Hata</b> : Veritabaný Seçilmedi <br> <b>Hata Açýklamasý</b> : ".mysql_error();
	die($mesaj);
}

mysql_query("SET NAMES 'utf8'");

?>