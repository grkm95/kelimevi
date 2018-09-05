<html>
<head>
<title></title>
<link rel="stylesheet" href="ayar.css"/>
<link rel="stylesheet" href="ayar.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js">
   
   $(function(){

		

		$("#ara").keyup(function(){//inputta bir tuşa basılırsa

			var kelime=$(this).val();//değerini al

			$.post("ara.php",{"kelime":kelime},function(al){ //ara.php ye gönder

				$(".kelimeler").html(al);//gelen verileri .kerlimeler clasına ait divin içine yaz

			});

		});

});



function tamamla(al){//tamamla fonsiyonu çağırılınca gönderilen veriyi al

	$("#ara").val(al);//inputa koy

	$(".kelimeler").text("");//kelimeler clasına ait divi temizle

}

</script>
</head>
<body>
<?php
include('baglan.php');
?>
<div id="sayfa"> 
 <div class="ust">
 <b></b>
 </div>
 
 
 <div class="menu">
 
 <div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>ANASAYFA</span></a></li>
   <li><a href='index.php?git=kelimeler'><span>KELİMELER</span></a></li>
   <li><a href='index.php?git=kelime_gonder'><span>KELİME GÖNDER</span></a></li>
   <li class='last'><a href='index.php?git=iletisim'><span>İLETİŞİM</span></a></li>
</ul>
</div>
 </div>
 
 <div id="sol"></div>
 <div class="icerik">
 <?php 
	 $a = @$_GET["git"];
	
	switch($a){
		
		case "kelimeler":
		include("kelimeler.php");
		break;
		
		case "kelime_gonder":
		include("kelime_gonder.php");
		break;
		
		case "iletisim" :
		include ("iletisim.php");
		break;
		
		default :
		include ("anasayfa.php");
	break;}
	
	?>
	</div></div>
	
 <div class="footer">
 <center>Her hakkı saklıdır.&copy 2017</center>
	</div>
 </body>
</html>