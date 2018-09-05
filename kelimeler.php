<html>
<head>
<meta charset=utf-8_turkish_ci" />
<script type="text/javascript" src="jquery-1.9.0.js"></script>
<script type="text/javascript">
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
<style type="text/css">
.ana{width:275px;position:relative;margin:auto;}
#ara{width:350px;height:auto;position:absolute;left:0px;top:10px;margin:auto}
.kelimeler{width:355px;position:absolute;left:0px;top:45px;margin:auto}
.kelime{width:350px;height:auto;margin-bottom:1px;background-color:#f1f1f1;margin:auto;cursor:pointer;}
/*basit tasarım*/
</style>
</head>
<body>
<div class="ana">
<input type="text" id="ara" />
	
	<div class="kelimeler">
	</div>
</div> 
</body>
</html>