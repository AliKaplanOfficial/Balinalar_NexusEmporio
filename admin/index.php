<?php
$sayfa="Dashboard";
include('inc/ahead.php');
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Panel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Kullanıcılar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="kullanici.php" style="text-decoration : none;">Detayları Göster</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Referanslar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="referans.php" style="text-decoration : none;">Detayları Göster</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">İletişim Formu</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="iletisimformu.php" style="text-decoration : none;">Detayları Göster</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Tarihçe</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tarihce.php" style="text-decoration : none;">Detayları Göster</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        NexusEmporio Kullanıcı Giriş Ortalması
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        NexusEmporio Aylık Kullanıcı Oluşturlması
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <a class="small text-black" style="text-decoration : none;" href="kullanici.php">Kullanıcı Tablosu</a>
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
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>