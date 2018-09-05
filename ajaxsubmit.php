<?php
// Establishing connection with server..
  $connection = mysql_connect("localhost", "o121620141008", "PD5W6AS");

// Selecting Database 
  $db = mysql_select_db("o121620141008", $connection);

//Fetching Values from URL  
$isim=$_POST['isim'];

//Insert query 
  $query = mysql_query("insert into etiketler(isim) values ('$isim')");
  echo "İşleminiz başarıyla gerçekleştirildi.";  
//connection closed
  mysql_close($connection);
?>