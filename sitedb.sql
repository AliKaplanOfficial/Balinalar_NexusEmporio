-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 23 Haz 2024, 00:38:46
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sitedb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfa`
--

DROP TABLE IF EXISTS `anasayfa`;
CREATE TABLE IF NOT EXISTS `anasayfa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ustBaslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `altBaslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `linkMetin` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `link` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `tanimlama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `anahtar` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `anasayfa`
--

INSERT INTO `anasayfa` (`id`, `ustBaslik`, `altBaslik`, `linkMetin`, `link`, `tanimlama`, `anahtar`) VALUES
(1, 'Derinlikteki Canlıları Keşfetmek İçin Buradasın', 'Haydi Şimdi Bize Katıl!!', 'Hakkımızda', 'hakkimizda.php', 'anasayfamiz', 'site,admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `icerik` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `altbaslik` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `alticerik` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `alticerik2` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `tanimlama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `anahtar` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik`, `icerik`, `altbaslik`, `alticerik`, `alticerik2`, `tanimlama`, `anahtar`) VALUES
(1, 'Balinalar Hakkında', 'Olay Örgüsü Aşağıdadır', 'Ünlü Bilim İnsanlarımız', 'Ünlü Balina Bilimcilerimiz', 'Balina bilimcileri veya balina araştırmacıları, balina ve diğer deniz memelilerinin biyolojisi, davranışları, çevresel etkileşimleri ve korunmasıyla ilgilenen bilim insanlarıdır. Bu uzmanlar genellikle deniz biyolojisi, deniz ekolojisi, deniz memelileri biyolojisi, ekoloji, davranışsal ekoloji ve biyoakustik gibi alanlarda uzmanlaşmışlardır.', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisimformu`
--

DROP TABLE IF EXISTS `iletisimformu`;
CREATE TABLE IF NOT EXISTS `iletisimformu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `mesaj` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `iletisimformu`
--

INSERT INTO `iletisimformu` (`id`, `ad`, `email`, `mesaj`, `tarih`) VALUES
(18, 'Enes', 'exapmle@gmail.com', 'selam', '2024-06-21 23:37:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kadi` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `parola` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `yetki` tinyint NOT NULL,
  `email` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kadi`, `parola`, `yetki`, `email`, `aktif`) VALUES
(1, 'admin', '$2y$10$72AyQDznygIl3CpX6vlRc.d4sFoEL7x5ZtVSXmmNFtvnnNsuhPbgW', 1, 'admin@gmail.com', 1),
(2, 'user', '$2y$10$GDITUeWuhNaED4h7N5DFy.36Yz8zIBqV8oB/6qqydMBu/SwYegUPO', 2, 'user@gmail.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolyo`
--

DROP TABLE IF EXISTS `portfolyo`;
CREATE TABLE IF NOT EXISTS `portfolyo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `altbaslik` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `tanimlama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `anahtar` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `portfolyo`
--

INSERT INTO `portfolyo` (`id`, `baslik`, `altbaslik`, `tanimlama`, `anahtar`) VALUES
(1, 'Balinalar', 'Balina Türlerimiz Aşağıdadır', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolyolar`
--

DROP TABLE IF EXISTS `portfolyolar`;
CREATE TABLE IF NOT EXISTS `portfolyolar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kfoto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `bfoto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `baslik` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `client` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `date` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `category` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `aciklama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `icerik` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sira` smallint NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `portfolyolar`
--

INSERT INTO `portfolyolar` (`id`, `kfoto`, `bfoto`, `baslik`, `client`, `date`, `category`, `aciklama`, `icerik`, `sira`, `aktif`) VALUES
(1, '01-thumbnail.jpg', '01-full.jpg', 'Kambur Balina', 'Kambur Balina', '1861', 'megaptera novaeangliae', 'Balina Hakkında', 'Kambur balina, oluklu balinagiller familyasından bir balina türü. Kambur balinalar genellikle 14,6–15,2 metre uzunluğundadır ve 31–41 ton ağırlığa ulaşabilirler. Dişileri erkeklerden daha iridir ve bu özelliğe sahip az sayıdaki memeli türünden biridirler.', 0, 1),
(2, '02-thumbnail.jpg', '02-full.jpg', 'Katil Balina', 'Katil Balina', '1758', 'orcinus orca', 'Balina Hakkında', 'Katil balina, Orka olarak da bilinir, okyanus yunusları ailesinin en iri üyesidir. Yayılım genişliği olarak dünyada en yaygın ikinci memelidir ve tüm okyanuslarda bulunur. Çok yönlü bir yırtıcıdır ve balık, deniz kaplumbağası, kuş, fok, köpek balıkları ve hatta diğer genç ve küçük yunusları yer.', 0, 1),
(3, '03-thumbnail.jpg', '03-full.jpg', 'Gri Balina', 'Gri Balina', '1861', 'eschrichtius robustus', 'Balina Hakkında', '1840 yılında 25.000 gri balina sayıldı fakat 1875 yılında 50 balinayı bir arada görmek olağanüstü bir durum sayılıyordu. Bu balinalar okyanusun kuzeyindeyken Eskimolar, Kraliçe Charlotte ve Vancouver körfezinde Kızılderililer, güneydeyken ise Amerikalı balinacılar tarafından avlandılar. Fakat gri balinanın insandan başka düşmanları da vardır. Katil balinalar onları en çok öldüren hayvanların başında gelir.', 0, 1),
(4, '04-thumbnail.jpg', '04-full.jpg', 'Pilot Balina', 'Pilot Balina', '1846', 'globiceohala', 'Balina Hakkında', 'Pilot balinalar; gri, kahverengi veya siyah renkelere sahiptirler. Göç etmeyen alt türler daha koyu bir renktedir. Erkeklerin boyu 8,5 metre, dişilerin boyu ise 6 metreye varabilir. Ağırlıkları erkek bireyler için azami 3,5 ton, dişiler için ise 2,5 tondur. Kafası köşeli ve dar bir yapıdadır. Ağzı küçüktür', 0, 1),
(5, '05-thumbnail.jpg', '05-full.jpg', 'Beyaz Balina', 'Beyaz Balina', '1758', 'delphinaptereuse leucas', 'Balina Hakkında', 'Beyaz balina, ak balina, beluga balinası ya da yalnızca beluga, balinalar takımının Monodontidae familyası içindeki Delphinapterus cinsinin tek türüdür. Yaşam alanı arktik ve arktik altı denizler olan bu memeli için kullanılan \"beluga\" adı, Rusça\'da \"beyaz\" anlamına gelen Белуха sözcüğünden türemiştir.', 0, 1),
(6, '06-thumbnail.jpg', '06-full.jpg', 'İspermeçet Balinası', 'İspermeçet Balinası', '1822', 'physetter macrocephalus', 'Balina Hakkında', 'İspermeçet balinası, Physeteroidea familyasından tüm okyanuslarda yaygın olan balina türü. Kaşalot da denilir. Yetişkin erkekler yazın kutup sularına göç eder. Akdeniz\'de görülen en yaygın balina türüdür. Türkiye\'de görülmüş 4 balina türünden biridir.', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

DROP TABLE IF EXISTS `referans`;
CREATE TABLE IF NOT EXISTS `referans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `link` char(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sira` smallint UNSIGNED NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`id`, `foto`, `link`, `sira`, `aktif`) VALUES
(22, 'wwf.png', 'https://www.wwf.org.tr/', 3, 1),
(21, 'ocean-conservancy-logo.png', 'https://oceanconservancy.org/', 2, 1),
(23, 'coral.png', 'https://coral.org/en/', 4, 1),
(20, 'national-geografic.png', 'https://www.nationalgeographic.com/', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servis`
--

DROP TABLE IF EXISTS `servis`;
CREATE TABLE IF NOT EXISTS `servis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `altbaslik` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `tanimlama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `anahtar` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `servis`
--

INSERT INTO `servis` (`id`, `baslik`, `altbaslik`, `tanimlama`, `anahtar`) VALUES
(1, 'Hizmetlerimiz', 'Destekler ve Dahası Aşağıdadır', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servislerimiz`
--

DROP TABLE IF EXISTS `servislerimiz`;
CREATE TABLE IF NOT EXISTS `servislerimiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `baslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `icerik` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sira` smallint NOT NULL DEFAULT '1',
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `servislerimiz`
--

INSERT INTO `servislerimiz` (`id`, `foto`, `baslik`, `icerik`, `sira`, `aktif`) VALUES
(1, 'fa-shopping-cart', 'E-Destek', 'Balinaların sağlığı ve onların geleceği açısından sağlamış olduğumuz destek kampanyasına katılmak için NexusEmporio Mağazalarından hediyelik eşyalar alabilirsiniz.', 0, 1),
(2, 'fa-laptop', 'Anlık Takip', 'Balinalarımıza takılan tamamen zararsın takip cihazlarımız ile tek tek balina kontrollerimizi doğal koşullar doğrultusunda yerine getiriyoruz.', 0, 1),
(3, 'fa-lock', 'Balina Güvenliği', 'Takibe alınan balinalarımız her haftalık bakımları ile yaşam kalitelerini arttırarak ve güvenli üreme mekanları hazırlıyoruz.', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takim`
--

DROP TABLE IF EXISTS `takim`;
CREATE TABLE IF NOT EXISTS `takim` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `isim` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `gorev` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `twitter` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `facebook` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `linkedin` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sira` smallint NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `takim`
--

INSERT INTO `takim` (`id`, `foto`, `isim`, `gorev`, `twitter`, `facebook`, `linkedin`, `sira`, `aktif`) VALUES
(1, '1.jpg', 'Asha de Vos', 'Biyolog', 'https://x.com/ashadevos', 'https://www.facebook.com/ashadevos/', '#', 0, 1),
(2, '2.jpg', 'Nan Daeschler Hauser', 'Biyolog', 'https://x.com/nanhauser', 'https://www.facebook.com/nan.hauser/?locale=de_DE', '#', 0, 1),
(3, '3.jpg', 'Jean-Michel Cousteau', 'Biyolog', 'https://x.com/JMCousteau', 'https://www.facebook.com/jeanmichel.cousteau.9231', '#', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tarihce`
--

DROP TABLE IF EXISTS `tarihce`;
CREATE TABLE IF NOT EXISTS `tarihce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tarih` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `baslik` char(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `icerik` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `foto` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `tarihce`
--

INSERT INTO `tarihce` (`id`, `tarih`, `baslik`, `icerik`, `foto`) VALUES
(1, '2009-2011', 'Balinalar Hakkında', 'Balinalar deniz memelileridir ve genellikle büyük boyutlarıyla tanınırlar. İki ana grup altında sınıflandırılırlar: dişli balinalar (odontocetes) ve bıyıklı balinalar (mysticetes). Dişli balinalar arasında yunuslar ve orklar gibi türler bulunurken, bıyıklı balinalar arasında mavi balina ve grönland balinası gibi dev türler yer alır.', '1.jpg'),
(2, '2008-2011', 'Balinalar Hakkında', 'Balinaların genellikle soğuk denizlerde yaşadığı düşünülse de, bazı türler sıcak denizlerde de bulunabilir. Diyetleri genellikle plankton, balıklar ve kril gibi deniz canlılarından oluşur. Balinaların iletişim kurmak, avlanmak ve çevrelerini algılamak için karmaşık sesler ve ekolokasyon tekniklerini kullandığı bilinmektedir.', '2.jpg'),
(3, '2005-2015', 'Balinalar Hakkında', 'Balinalar, insanlar için ekonomik ve çevresel öneme sahiptir. Örneğin, bazı balina türleri balıkçılık endüstrisinde önemli bir kaynaktır ve deniz ekosistemlerinin dengesini korur. Ancak, balina avcılığı, deniz kirliliği, gemi çarpışmaları ve deniz habitatlarının tahribi gibi insan kaynaklı tehditler, balina popülasyonlarını tehlikeye atar. Bu nedenle, balina koruma çabaları dünya çapında önemli bir konudur.', '3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
