# Balinaları Koru Platformu NexusEmporio
**NexusEmporio** 🌊🐋 – Balinalar hakkında farkındalık yaratmayı ve bağışlarla korunmalarına destek olmayı amaçlayan bir sosyal sorumluluk platformu. Kullanıcılar bilgilendirici içeriklere ulaşabilir, projeleri takip edebilir ve katkıda bulunabilirler. 🚀💙

## Kullanılan Teknolojiler

### Backend:
- **PHP**: İçerik yönetimi ve bağış sisteminin işlenmesi.
- **MySQL**: Kullanıcılar, bağış geçmişi ve bilgilendirici içerikler için.

### Frontend:
- **HTML**: Sayfa yapılarını oluşturmak için.
- **CSS**: Kullanıcı dostu bir arayüz tasarlamak için.
- **JavaScript**: Dinamik işlemler ve kullanıcı etkileşimleri için.

## Yapılan İşlemler
- **Bağış Sistemi**: Kullanıcıların balinaları korumak için bağış yapabilmesini sağlar.
- **Bilgilendirici İçerikler**: Balinaların ekosistemdeki rolü hakkında farkındalık oluşturur.
- **Admin Paneli**: İçeriklerin ve bağışların yönetilmesini sağlar.
- **Kullanıcı Yönetimi**: Kayıt olma ve giriş yapma sistemleri içerir.

## Kurulum Adımları

### Gereksinimler:
- **PHP** (7.4 veya üzeri)
- **MySQL** veritabanı
- **Apache** veya benzeri bir web sunucusu

### Kurulum:

1. **Projeyi Klonlayın:**
   ```bash
   git clone <repository_url>
   ```
   
2. **Veritabanını Kurun:**
   - `balinalar.sql` dosyasını MySQL sunucunuza içe aktarın.
   - Veritabanı bağlantı ayarlarını `config.php` dosyasında düzenleyin.

3. **Web Sunucusunu Ayarlayın:**
   - Apache veya Nginx kullanarak PHP dosyalarını çalıştırın.
   - `.htaccess` dosyasını aktif ederek URL yapılandırmasını optimize edin.

4. **Uygulamayı Başlatın:**
   - Siteye erişmek için `http://localhost/balinalari-koru` adresini kullanın.

## Dosya Yapısı
- `admin-panel/`: Yönetici paneli dosyaları.
- `database/`: MySQL veritabanı dosyaları.
- `pages/`: Ana sayfa, bağış sayfası ve içerik sayfaları.
- `assets/`: CSS, JavaScript ve medya dosyaları.

## Geliştirici Notları
- Projede herhangi bir hata veya geliştirme önerisi için `Issues` sekmesini kullanabilirsiniz.
- Yeni özellikler eklemek için projeyi `fork` yapabilir ve değişikliklerinizi bir `pull request` ile gönderebilirsiniz.

---

Bu proje, teknolojiyi kullanarak deniz yaşamını koruma çabasına katkıda bulunmayı hedefler. Destekleriniz ve geri bildirimleriniz bizim için çok değerli! 🌊🐋

