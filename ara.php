<?php 
$baglan=mysql_connect("localhost","root","") or die("mysql ba�lant� hatas�");
mysql_select_db("etiketler",$baglan) or die("veri taban� ba�lant� hatas�");//mysql ba�lat�s�

$aranacak=@$_POST["kelime"];//kelimeyi al�yoruz.
$al=mysql_query("SELECT * FROM etiketler WHERE isim  LIKE '%$aranacak%' ORDER BY id desc");
//etiket tablosunda tarat�yoruz bulunan verileri hiti y�ksek olana g�re s�ralay�p ilk 5 i al�yoruz
while($yaz=mysql_fetch_array($al)){
echo "<div class='kelime' onClick='tamamla(\"".$yaz["isim"]."\")'>".$yaz["isim"]."</div>";
//verileri ekrana yaz�yorum
}
?>