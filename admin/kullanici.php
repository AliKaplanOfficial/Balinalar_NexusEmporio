<?php
$sayfa="Kullanıcılar";
include('inc/ahead.php');
if ($_SESSION["yetki"]!="1") {
    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo  "<script> Swal.fire({title: 'Hata!',text: 'Yetkisiz Kullanıcısınız!',icon: 'error',confirmButtonText:'Tamam'}).then((value)=>{
            if(value.isConfirmed){
                window.location.href='anasayfa.php'
            }
        })</script>";
        exit;
}

if (isset($_POST['sil']) && $_SESSION["yetki"]=="1") {
    //Seçilenleri pdo ile toplu silme kodu:
    $silinecekler = implode(', ', $_POST['sil']);
    $sorgu = $baglanti->prepare('DELETE FROM kullanici WHERE id IN (' . $silinecekler . ')');
    $sorgu->execute();
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?=$sayfa?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active"><?=$sayfa?></li>
                        </ol>
                        <form action="" method="POST">
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="kullaniciEkle.php" class="btn btn-primary">Kullanıcı Ekle</a>
                                <button type="submit" class="btn btn-danger my-3"> Seçilenleri Sil</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>
                                            <input type="checkbox" id="tumunuSec" onclick="TumunuSec();" value="">
                                        </th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Yetki</th>
                                            <th>Email</th>
                                            <th>Aktif</th>
                                            <th>Parola<br>Güncelle</th>
                                            <th>Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                            
                                            $sorgu=$baglanti->prepare("SELECT * FROM kullanici");
                                            $sorgu->execute();

                                            while($sonuc=$sorgu->fetch()){
                                        ?>
                                        <tr>
                                        <td>
                                            <input class="cbSil" type="checkbox" name="sil[]" value="<?= $sonuc['id']; ?>">
                                        </td>
                                            <td><?=$sonuc["kadi"]?></td>
                                            <td><?=$sonuc["yetki"]==1?'Admin':'Normal Kullanıcı'?></td>
                                            <td><?=$sonuc["email"]?></td>
                                            <td>
                                                <link href="css/switch.css" rel="stylesheet"/>    
                                            <label class="switch">
                                                <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                                                <input type="checkbox" id='<?=$sonuc['id'] ?>' class="aktifPasif" <?=$sonuc['aktif']==1?'checked':'' ?>  />
                                                <span class="slider round"></span>
                                            </label>
                                            </td>  
                                            <td class="text-center">
                                            <a href="kullaniciParolaGuncelle.php?id=<?=$sonuc["id"]?>">
                                            <span class="fa fa-key fa-2x"></span>
                                            </a>
                                            </td>

                                            <td class="text-center">
                                            <a href="kullaniciGuncelle.php?id=<?=$sonuc["id"]?>">
                                            <span class="fa fa-edit fa-2x"></span>
                                            </a>
                                            </td>
                                            <?php }?>
                                            </td>
                                        </tr>
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
            data: { id:id, tablo:'kullanici', durum: durum }, //datamızı yolluyoruz
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