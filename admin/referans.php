<?php
$sayfa = "Referanslar";
include('inc/ahead.php');

if (isset($_POST['sil']) && $_SESSION["yetki"] == "1") {
    // Seçilenleri pdo ile toplu silme kodu:
    $silinecekler = $_POST['sil']; // $_POST['sil'] dizisini doğrudan kullanıyoruz, implode işlemi gerekmiyor

    // Toplu silme işlemi için foreach döngüsü
    foreach ($silinecekler as $id) {
        // Referansın fotoğrafını ve diğer bilgilerini almak için sorgu
        $sorgu = $baglanti->prepare("SELECT foto FROM referans WHERE id=:id");
        $sorgu->execute(["id" => $id]);
        $sonuc = $sorgu->fetch();

        // Fotoğraf dosyasını silme işlemi
        if ($sonuc && !empty($sonuc['foto'])) {
            @unlink("../assets/img/logos/" . $sonuc['foto']);
        }
        
        // Veriyi referans tablosundan silme işlemi
        $sorgu2 = $baglanti->prepare("DELETE FROM referans WHERE id=:id");
        $sorgu2->execute(["id" => $id]);
    }
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?=$sayfa?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel</li>
                            <li class="breadcrumb-item active"><?=$sayfa?></li>
                        </ol>
                        <form action="" method="POST">
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="referansEkle.php" class="btn btn-primary">Referans Ekle</a>
                                <button type="submit" class="btn btn-danger my-3"> Seçilenleri Sil</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>
                                            <input type="checkbox" id="tumunuSec" onclick="TumunuSec();" value="">
                                        </th>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Link</th>
                                            <th>Sıra</th>
                                            <th>Akitf</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                            
                                            $sorgu=$baglanti->prepare("SELECT * FROM referans");
                                            $sorgu->execute();

                                            while($sonuc=$sorgu->fetch()){
                                        ?>
                                        <tr>
                                        <td>
                                            <input class="cbSil" type="checkbox" name="sil[]" value="<?= $sonuc['id']; ?>">
                                        </td>
                                            <td><?=$sonuc["id"]?></td>
                                            <td> <img width="200" src="../assets/img/logos/<?=$sonuc["foto"]?>"></td>
                                            <td><?=$sonuc["link"]?></td>
                                            <td><?=$sonuc["sira"]?></td>
                                            <td>
                                            <link href="css/switch.css" rel="stylesheet"/>    
                                            <label class="switch">
                                                <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                                                <input type="checkbox" id='<?=$sonuc['id'] ?>' class="aktifPasif" <?=$sonuc['aktif']==1?'checked':'' ?>  />
                                                <span class="slider round"></span>
                                            </label>
                                            </td>
                                            <td class="text-center"><?php if($_SESSION["yetki"]=="1"){
                                            ?>    
                                            <a href="referansGuncelle.php?id=<?=$sonuc["id"]?>">
                                            <span class="fa fa-edit fa-2x"></span>
                                            </a>
                                            <?php }?></td>
                                            <td class="text-center">
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>

<script>
    $(document).ready(function () {
    $('.aktifPasif').click(function (event) {
        var id = $(this).attr("id");  //id değerini alıyoruz

        var durum = ($(this).is(':checked')) ? '1' : '0';
        //checkbox a göre aktif mi pasif mi bilgisini alıyoruz.

        $.ajax({
            type: 'POST',
            url: 'inc/aktifPasif.php',  //işlem yaptığımız sayfayı belirtiyoruz
            data: { id:id, tablo:'referans', durum: durum }, //datamızı yolluyoruz
            success: function (result) {
                $('#sonuc').text(result);
                //gelen sonucu h2 tagında gösteriyoruz
            },
            error: function () {
                alert('Hata');
            }
        });
    });
});
</script>

<script type="text/javascript">
    //Tümünü seçme işlemi yapan script kodları:
    $(document).ready(function () {
        $('#tumunuSec').on('click', function () {
            if ($('#tumunuSec:checked').length == $('#tumunuSec').length) {
                $('input.cbSil:checkbox').prop('checked', true);
            } else {
                $('input.cbSil:checkbox').prop('checked', false);

            }
        });
    });
</script>

