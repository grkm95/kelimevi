<html>
  <head>
        <link rel="stylesheet" href="kutuphane/css/abPost.css" media="all" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                // gonder class'li buton click edildiginde yani tiklanildiginda
                $('.gonder').click(function(){
                    
                    // Formun icindeki inputlarin verilerini kontrol icin tek tek aliyoruz. 
                    // Normalde bu kontrolu each ile alip ugrasmadan ekrana hata mesajları gösterebilirdik ama kafa karıştırıcı olmasın diye böyle anlatıyorum.
                    var adi = $('#adi').val();
                    var eposta = $('#eposta').val();
                    var mesaj = $('#mesaj').val();
                    
                    //Verileri aldik, şimdiki işimiz uzun yoldan verileri tek tek kontrol etmek : )
                    //Girilen isim 3 karakterden buyukse devam et
                    if(adi.length > 2)
                    {
                        // Girilen e-posta 5 karakterden buyuk ise devam et
                        if(eposta.length > 5)
                            {   // Girilen mesaj 6 karakterden buyuk ise devam et.
                                if(mesaj.length > 6)
                                    {
                                        /**
                                         * Asil isimiz burada arkadaşlar Post işlemine başlıyoruz
                                         * $.post                                   = jquery ile post etmeye basliyoruz
                                         * "mailGonder.php"                         = verileri gondereceginiz sayfanin url'sinii yaziyorsunuz
                                         * {adi:adi,eposta:eposta,mesaj:mesaj}      = burasi ise aldigimiz verileri tek tek gonderiyoruz,
                                         * Bu kisim cok amator oldu ama serialize'ye gecmeden once bu sekilde anlatmak istedim. 
                                         * function(donenVeri){alert(donenVeri);}   = Bu kisim ise post edilen sayfadan geri donen cevabtır.
                                         **/
                                        $.post("mailGonder.php",{adi:adi,eposta:eposta,mesaj:mesaj},function(donenVeri){
                                           alert(donenVeri); 
                                        });
                                    }else
                                        alert("Lütfen mesaj\u0131n\u0131z\u0131 giriniz");
                            }else
                                alert("Lütfen email adresinizi giriniz.")
                    }else
                        alert("Lütfen ad\u0131n\u0131z\u0131 ve soyad\u0131n\u0131z\u0131 giriniz.");
                });
            });
        </script>
    </head>
    <body>
        <div class="ab-Form-Eklenti">
                <ul id="ab-form">
                  <li>
                             <b><font size="4" face="Calibri">Ad Soyad</font></b>
                             <b><font size="2" face="Calibri" color=#800000> (Zorunlu Alan)</font></b>
                        <input type="text" name="adi" id="adi" />
                    </li>
                    <li>
                            <b><font size="4" face="Calibri">E-Posta</font></b>
                             <b><font size="2" face="Calibri" color=#800000> (Zorunlu Alan)</font></b>
                        <input type="text" name="eposta" id="eposta"/>
                    </li>
                    <li>
                            <b><font size="4" face="Calibri">Mesaj</font></b>
                             <b><font size="2" face="Calibri" color=#800000> (Zorunlu Alan)</font></b>
                        <textarea cols="20" rows="20" name="mesaj" id="mesaj" ></textarea>
                    </li>
                    <li>
                        <input type="submit" class="gonder" value=""/>
                    </li>
                </ul>
        </div>
    </body>
</html>