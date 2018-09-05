<?php 
$baglan=mysql_connect("localhost","root","") or die("mysql baðlantý hatasý");
mysql_select_db("etiketler",$baglan) or die("veri tabaný baðlantý hatasý");//mysql baðlatýsý

$aranacak=@$_POST["kelime"];//kelimeyi alýyoruz.
$al=mysql_query("SELECT * FROM etiketler WHERE isim  LIKE '%$aranacak%' ORDER BY id desc");
//etiket tablosunda taratýyoruz bulunan verileri hiti yüksek olana göre sýralayýp ilk 5 i alýyoruz
while($yaz=mysql_fetch_array($al)){
echo "<div class='kelime' onClick='tamamla(\"".$yaz["isim"]."\")'>".$yaz["isim"]."</div>";
//verileri ekrana yazýyorum
}
?>