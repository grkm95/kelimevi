<?php
$baglan=mysql_connect("localhost","root","") or die("mysql bağlantı hatası");
mysql_select_db("o121620141008",$baglan) or die("veri tabanı bağlantı hatası");//mysql bağlatısı
$sorgu=mysql_query("select * from iletisim");

$adi         = $_POST['adi']; 
$eposta      = $_POST['eposta'];
$mesaj       = $_POST['mesaj'];

echo "İletişim forumundan gönderilen veriler :".PHP_EOL;
echo $adi.PHP_EOL;
echo $eposta.PHP_EOL;
echo $mesaj.PHP_EOL;
 
?>
