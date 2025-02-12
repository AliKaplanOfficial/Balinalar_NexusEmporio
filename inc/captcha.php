<?PHP

$image = @imagecreatetruecolor(120, 30) or die("hata oluştu");

// arkaplan rengi oluşturuyoruz
$background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
imagefill($image, 0, 0, $background);
$linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
$textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

// rast gele çizgiler oluşturuyoruz
for ($i = 0; $i < 6; $i++) {
    imagesetthickness($image, rand(1, 3));
    imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linecolor);
}

session_start();

// rastgele sayılar oluşturuyoruz
$sayilar = '';
for ($x = 15; $x <= 95; $x += 20) {
    $sayilar .= ($sayi = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $sayi, $textcolor);

    /*imagechar($image, rand(3, 5), $x, rand(2, 14), $sayi, $textcolor); ile seçilen rastgele sayı, $image üzerine yazdırılır. rand(3, 5) ile rastgele bir font büyüklüğü seçilir, $x ve rand(2, 14) ile de yazının konumu belirlenir. $textcolor ise yazının rengini belirler. */
}

// sayıları session aktarıyoruz
$_SESSION['captcha'] = $sayilar;    /* oluşturulan rastgele sayıları session ile kullanıcının doğrulama girişiminde bulunduğunda doğru girilip girilmediğini kontrol etmek için saklanır.*/ 

// resim gösteriliyor ve sonrasında siliniyor
header('Content-type: image/png'); /* tarayıcıya gönderilecek içeriğin bir PNG resim olduğu belirtilir. Bu, tarayıcının resmi doğru şekilde işlemesini sağlar. */
imagepng($image); /* PHP tarafından oluşturulan CAPTCHA resmi tarayıcıya gönderilir. */
imagedestroy($image); /* $image değişkeni tarafından tutulan resim bellekten silinir. Bu adım, gereksiz bellek kullanımını önlemek için önemlidir.*/
?>