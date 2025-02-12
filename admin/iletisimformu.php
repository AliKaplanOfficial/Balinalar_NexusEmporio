<?php
$sayfa="İletişim Formu";
include('inc/ahead.php');

if (isset($_POST['sil']) && $_SESSION["yetki"]=="1") {
    //Seçilenleri pdo ile toplu silme kodu:
    $silinecekler = implode(', ', $_POST['sil']);
    $sorgu = $baglanti->prepare('DELETE FROM iletisimformu WHERE id IN (' . $silinecekler . ')');
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
                            <div>
                                                        <button type="submit" class="btn btn-danger my-3"> Seçilenleri Sil</button>
                             </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>
                                            <input type="checkbox" id="tumunuSec" onclick="TumunuSec();" value="">
                                        </th>
                                            <th>No</th>
                                            <th>Ad</th>
                                            <th>Email</th>
                                            <th>Mesaj</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                            
                                            $sorgu=$baglanti->prepare("SELECT * FROM iletisimformu");
                                            $sorgu->execute();

                                            while($sonuc=$sorgu->fetch()){
                                        ?>
                                        <tr>
                                        <td>
                                            <input class="cbSil" type="checkbox" name="sil[]" value="<?= $sonuc['id']; ?>">
                                        </td>
                                            <td><?=$sonuc["id"]?></td>
                                            <td><?=$sonuc["ad"]?></td>
                                            <td><?=$sonuc["email"]?></td>
                                            <td><?=$sonuc["mesaj"]?></td>
                                            <td><?=$sonuc["tarih"]?></td>
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