<?php
$sayfa="Ana Sayfa";
include('inc/ahead.php');
$sorgu=$baglanti->prepare("SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ana Sayfa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel</li>
                            <li class="breadcrumb-item active">Ana Sayfa</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>  <!-- Tablo başındaki minik tablo iconu -->
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Üst Başlık</th>
                                            <th>Alt Başlık</th>
                                            <th>Link Metin</th>
                                            <th>Link</th>
                                            <th>Tanımlama</th>
                                            <th>Anahtar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td contenteditable="true" onBlur="veriKaydet(this,'ustBaslik','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["ustBaslik"]?></td>
                                            
                                                <!-- onClick="duzenle(this);": Kullanıcı bir hücreye tıkladığında bu fonksiyon tetiklenir. duzenle(this) fonksiyonu, kullanıcının hücre içeriğini düzenlemesine olanak tanır. -->

                                                <!-- onBlur="veriKaydet(this, '...', '$sonuc["id"]')": Kullanıcı bir hücreden çıktığında (farklı bir hücreye tıkladığında veya odak dışına çıktığında) bu fonksiyon tetiklenir. veriKaydet(this, '...', '$sonuc["id"]') fonksiyonu, düzenlenen veriyi belirtilen alanı ('ustBaslik', 'altBaslik' vb.) ve ilgili veri kimliğini ($sonuc["id"]) kullanarak veritabanında günceller veya kaydeder. -->

                                            <td contenteditable="true" onBlur="veriKaydet(this,'altBaslik','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["altBaslik"]?></td>

                                            <td contenteditable="true" onBlur="veriKaydet(this,'linkMetin','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["linkMetin"]?></td>

                                            <td contenteditable="true" onBlur="veriKaydet(this,'link','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["link"]?></td>

                                            <td contenteditable="true" onBlur="veriKaydet(this,'tanimlama','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["tanimlama"]?></td>

                                            <td contenteditable="true" onBlur="veriKaydet(this,'anahtar','<?=$sonuc["id"]?>')"
                                            onClick="duzenle(this);"><?=$sonuc["anahtar"]?></td>
                                            
                                            <td class="text-center">
                                                <?php if($_SESSION["yetki"]=="1"){

                                                ?>    
                                            <a href="anasayfaGuncelle.php?id=<?=$sonuc["id"]?>">
                                                <span class="fa fa-edit fa-2x"></span>
                                            </a>

                                                <!-- if($_SESSION["yetki"]=="1"): Kullanıcı yetkisi kontrol edilir ($_SESSION["yetki"]=="1").
                                                Eğer kullanıcı yönetici ise, her satırın son hücresinde (<td>) bir düzenleme bağlantısı (<a>) gösterilir (<span class="fa fa-edit fa-2x"></span>). Bu bağlantıya tıklayarak ilgili kaydı düzenleme sayfasına yönlendirilir.-->
                                            <?php }?>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>

<!--duzenleKaydet-->
<script>
    function duzenle(deger) {
        $(deger).css("background", "#FFFACD");
        //seçilen hücrenin rengini değiştiriyoruz
    }

    function veriKaydet(deger, alan, id) {
        $(deger).css("background", "#FFF url(yukleniyor.gif) no-repeat right");
      
        $.ajax({
            url: "inc/duzenleKaydet.php", //verileri göndereceğimiz url
            type: "POST", //post ile gönderilecek
            data: 'tablo=anasayfa&alan=' + alan + '&deger=' + deger.innerHTML.split('+').join('{0}')+ '&id=' + id, 
            // verileri alan deger ve id olarak yolluyoruz
            //+ (artı) post edilirken boşluk ile değişiyor 
            //bunu engellemek için + değeri {0} ile değiştirdim 
            //kayıt yaparkende index.php de geri değişimini yapıyoruz 
            success: function (data) {
                if (data == true) {
                    $(deger).css("background", "#fff");
                    // eğer veriler veri tabanına yazılmış ise hücrenin
                    //arka plan rengini beyaza geri döndürüyoruz
                }

                else {
                    $(deger).css("background", "#f00");
                    $("#sonuc").text("Hata veri düzenlenmedi");

                    //Eğer hata varsa hücre rengini kırmızı ve
                    // tablo altında hata mesajı yazdırıyoruz
                }
            }
        });
    }
</script>