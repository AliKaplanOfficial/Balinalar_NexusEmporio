<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Kullanıcı Girişi</h3></div>
                                    <div class="card-body">
                                        <?php
                                        session_start();
                                        include("../inc/vt.php");

                                        if(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789"){
                                            header("location:index.php");
                                        }
                                        elseif(isset($_COOKIE["cerez"])){
                                            $sorgu=$baglanti->prepare("SELECT kadi,yetki FROM kullanici WHERE  aktif=1" );
                                            $sorgu->execute();
                                            while($sonuc=$sorgu->fetch()){

                                                if($_COOKIE["cerez"]==md5("aa".$sonuc["kadi"]."bb")){
                                                    $_SESSION["Oturum"]="6789";
                                                    $_SESSION["kadi"]=$sonuc["kadi"];
                                                    $_SESSION["yetki"]=$sonuc["yetki"];
                                                    header("location:index.php");
                                                }
                                            }


                                        }

                                       
                                        if($_POST){
                                            $kadi=$_POST["txtKadi"];
                                            $parola=$_POST["txtParola"];
                                        }
                                        
                                       
                                        ?>
                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-4" id="inputEmail" name="txtKadi" value="<?php echo @$kadi ?>" type="text" placeholder="Kullanıcı Adı" />
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="txtParola" type="password" placeholder="Parola Giriniz" />
                                                <label for="inputPassword">Parola Giriniz</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="captcha" id="inputPassword" placeholder="Güvenlik Kodu Giriniz" class="form-control py-4"/>
                                                <label for="inputPassword">Güvenlik Kodunu Giriniz</label>
                                                <img src="../inc/captcha.php">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="cbHatirla"/>
                                                <label class="form-check-label" for="inputRememberPassword">Beni Hatırla</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-6">
                                                <input type="submit" class="btn btn-primary" value="Giriş">
                                            </div>

                                        </form>
                                        <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>
                                        <?php
                                        if($_POST){
                                            if ($_SESSION["captcha"]==$_POST["captcha"]) {
                                            
                                            $sorgu=$baglanti->prepare("SELECT parola,yetki FROM kullanici WHERE kadi=:kadi and aktif=1" );
                                            $sorgu->execute(['kadi'=>htmlspecialchars($kadi)]);
                                            $sonuc=$sorgu->fetch();
                                            if(password_verify($parola, $sonuc["parola"]) ){

                                                
                                                $_SESSION["Oturum"]="6789";
                                                $_SESSION["kadi"]=$kadi;
                                                $_SESSION["yetki"]=$sonuc["yetki"];

                                                if(isset($_POST["cbHatirla"])){

                                                    setcookie("cerez",md5("aa".$kadi."bb"),time()+(60*60*24*7));

                                                }

                                                header( "location:index.php");
                                            }
                                            else {
                                                echo "<script> Swal.fire({title: 'Hata!',text: 'Kullanıcı adı veya parola hatalı!',icon: 'error',confirmButtonText:'Tamam'}); </script>";
                                            }
                                        }
                                        else {
                                            echo "<script> Swal.fire({title: 'Hata!',text: 'Güvenlik kodu hatalı!',icon: 'error',confirmButtonText:'Tamam'}); </script>";
                                        }
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php">Arayüze Geri Dön!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


<!-- <div class="form-floating mb-3">
                                                <img src="../inc/captcha.php">
                                                <input type="text" name="captcha" id="inputPassword" placeholder="Güvenlik Kodu Giriniz" class="form-control py-4">
                                                <label for="inputPassword">Güvenlik Kodu Giriniz</label>
                                            </div> -->