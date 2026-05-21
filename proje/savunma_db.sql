-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 May 2026, 08:48:56
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `savunma_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `kullanici_adi`, `sifre`) VALUES
(1, 'baran', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `kategori`, `aciklama`) VALUES
(4, '5.56x45mm NATO', 'Mermiler', 'Modern piyade tüfeklerinde kullanılan standart mühimmat. Yüksek hız, düz uçuş yolu ve hafiflik avantajıyla piyade birliklerinin temel tercihidir.'),
(5, '7.62x51mm NATO', 'Mermiler', 'Keskin nişancı tüfekleri ve makinalı tüfeklerde kullanılır. Uzun menzilli atışlarda yüksek durdurucu güce ve zırh delici özelliklere sahiptir.'),
(6, '.50 BMG (12.7x99mm)', 'Mermiler', 'Ağır makineli tüfekler ve anti-materyal tüfekleri için tasarlanmıştır. Hafif zırhlı araçları ve tahkimatları etkisiz hale getirme kapasitesine sahiptir.'),
(7, '9x19mm Parabellum', 'Mermiler', 'Tabancalar ve hafif makineli tüfekler için standart NATO mühimmatı. Yakın mesafe çatışmalarda hızlı seri atış kontrolü ve yüksek durdurucu etki sağlar.'),
(8, '40mm Bombaatar', 'Mermiler', 'Piyade destek silahlarında kullanılan yüksek patlayıcı özellikli mühimmat. Alan baskısı ve yapısal engelleri aşmak için etkin bir çözüm sunar.'),
(9, 'MPT-76 MH Piyade Tüfeği', 'Silahlar', 'Modern Piyade Tüfeği projesinin hafifletilmiş versiyonu. Ergonomik tasarımı ve modüler ray sistemi ile özel kuvvetlerin ana tercihidir.'),
(10, 'KCR-556 Piyade Tüfeği', 'Silahlar', 'Kısa namlulu, yüksek atış hızına sahip piyade tüfeği. Kapalı alan ve meskun mahal operasyonlarında üstün manevra kabiliyeti sağlar.'),
(11, 'SAR-56 Piyade Tüfeği', 'Silahlar', 'Modüler yapısı sayesinde farklı namlu boyları ile kullanılabilir. Piyadenin standart ihtiyaçlarını karşılamak için yüksek dayanıklılıkla üretilmiştir.'),
(12, 'MPT-55K Piyade Tüfeği', 'Silahlar', 'MPT ailesinin en kısa ve çevik üyesi. Dar alanlarda etkili atış yapabilmek için özel olarak optimize edilmiştir.'),
(13, 'PMT-76 Makinalı Tüfek', 'Silahlar', 'Piyade takımına sürekli ateş desteği sağlamak amacıyla geliştirilen, yüksek mühimmat kapasiteli ağır makinalı tüfek.'),
(14, 'PARS 6x6 Taktik', 'Kara Araçları', 'Amfibik kabiliyeti olan, yüksek mayın korumalı taktik tekerlekli zırhlı araç.'),
(15, 'KAPLAN MT Tank', 'Kara Araçları', 'Modern orta sınıf tank. Zorlu coğrafi koşullarda üstün ateş gücü sunar.'),
(16, 'KİRPİ II (MRAP)', 'Kara Araçları', 'Mayına karşı korumalı, pusu dinleme ve imha etme yeteneğine sahip personel taşıyıcı.'),
(17, 'EJDER YALÇIN 4x4', 'Kara Araçları', 'Yüksek balistik koruma sunan, farklı görevlere uyarlanabilen çok amaçlı zırhlı araç.'),
(18, 'KORKUT Kundağı Motorlu', 'Kara Araçları', 'Alçak irtifa hava savunma sistemi. Paletli yapısı ile hareket halindeyken atış yapabilir.'),
(19, 'POYRAZ Mühimmat Aracı', 'Kara Araçları', 'Fırtına obüslerine lojistik destek sağlamak için geliştirilen otomatik mühimmat transfer sistemli araç.'),
(20, 'BAYRAKTAR TB2', 'Hava Araçları', 'Keşif, gözetleme ve taarruz görevlerini başarıyla icra eden dünya standartlarında SİHA.'),
(21, 'ANKA-S', 'Hava Araçları', 'Uydu kontrollü, gece-gündüz tüm hava koşullarında istihbarat ve taarruz yapabilen İHA.'),
(22, 'ATAK T129 Helikopter', 'Hava Araçları', 'Taarruz ve taktik keşif helikopteri. Yüksek manevra kabiliyeti ile dağlık alan operasyonları için geliştirilmiştir.'),
(23, 'AKSU (İHA)', 'Hava Araçları', 'Süpersonik hızlara çıkabilen, derin darbe (deep strike) görevleri için geliştirilen yeni nesil taarruz sistemi.'),
(24, 'HÜRKUŞ-C', 'Hava Araçları', 'Hafif taarruz ve silahlı keşif uçağı. Yüksek hassasiyetli güdümlü mühimmat taşıma kapasitesine sahiptir.'),
(25, 'T-929 ATAK-2', 'Hava Araçları', 'Ağır sınıf taarruz helikopteri. Daha fazla mühimmat kapasitesi ve gelişmiş elektronik harp yeteneği sunar.'),
(26, 'MİLGEM Korvet', 'Deniz Araçları', 'Modern su üstü harbi ve denizaltı savunma harbi görevlerini icra edebilen yerli üretim korvet.'),
(27, 'LHD ANADOLU', 'Deniz Araçları', 'Çok maksatlı amfibi hücum gemisi. Hava gücünü ve amfibi unsurları taşıma kapasitesine sahiptir.'),
(28, 'DİMDEK', 'Deniz Araçları', 'Deniz platformlarının yakıt, mühimmat ve su gibi lojistik ihtiyaçlarını karşılayan destek gemisi.'),
(29, 'TİMUÇİN Sınıfı Denizaltı', 'Deniz Araçları', 'Havadan bağımsız tahrik sistemine (AIP) sahip, uzun süre sessiz kalabilen modern taarruz denizaltısı.'),
(30, 'AKYA Torpidosu', 'Deniz Araçları', 'Denizaltılardan atılan, yüksek hız ve uzun menzile sahip, fiber optik kablo güdümlü torpido.'),
(31, 'ULAQ SİDA', 'Deniz Araçları', 'Dünyanın ilk silahlı insansız deniz aracı platformu. Keşif ve su üstü harbi için tam otonom.'),
(32, 'KORAL (Mobil EH Sistemi)', 'Elektronik Harp', 'Düşman radarlarını kör eden ve yönünü saptıran, tam otomatik frekans karıştırıcı sistem.'),
(33, 'VURAL (Haberleşme EH)', 'Elektronik Harp', 'Düşman saha içi muhaberesini ve telsiz ağlarını tamamen bloke ederek komuta kontrolü kesen sistem.'),
(34, 'MİLKAR-3A', 'Elektronik Harp', 'Geniş bant karıştırma yeteneği ile hava ve kara hedeflerini elektronik olarak baskı altına alan taktik sistem.'),
(35, 'EİRS (Erken İhbar Radar)', 'Radar Sistemleri', 'Balistik füze dahil, düşük radar izine sahip hedefleri 500+ km mesafeden tespit edebilen stratejik radar.'),
(36, 'KALKAN-2 (Hava Savunma)', 'Radar Sistemleri', 'Alçak ve orta irtifa hava savunma füzeleri için hedefi takip eden ve atış kontrol sağlayan yüksek çözünürlüklü radar.'),
(37, 'STR-100 (Seyyar Radar)', 'Radar Sistemleri', 'Her türlü araziye hızla kurulabilen, sınır hattı gözetleme ve hareketli hedef tespiti yapan kompakt radar.'),
(38, 'ATMACA (Gemisavar)', 'Füze Sistemleri', 'Su üstü hedefleri için geliştirilen, düşük radar izine sahip, hedef güncellemeli aktif güdümlü gemisavar füze.'),
(39, 'SUNGUR (Hava Savunma)', 'Füze Sistemleri', 'Omuzdan atılabilen veya araç üstüne entegre edilen, kızılötesi arayıcı başlıklı kısa menzilli hava savunma füzesi.'),
(40, 'GÖKTUĞ (Hava-Hava)', 'Füze Sistemleri', 'Uçaktan uçağa atılan, görüş ötesi ve görüş içi seçenekleriyle modern hava muharebesinin en kritik vurucu gücü.'),
(41, 'SANCAK-EH', 'Elektronik Harp', 'Düşmanın uydu haberleşmesini ve GPS sinyallerini karıştırarak operasyonlarını durduran stratejik EH sistemi.'),
(42, 'REDET-2', 'Elektronik Harp', 'Modern savaş uçaklarının elektronik harp podlarına karşı geliştirilmiş, yüksek frekanslı sinyal bastırıcı.'),
(43, 'İRDAR (İnsansız Radar)', 'Radar Sistemleri', 'İHA üzerine entegre edilebilen, hafif ve yüksek çözünürlüklü gözetleme radarı.'),
(44, 'HİSAR-RF', 'Radar Sistemleri', 'HİSAR hava savunma bataryalarının atış kontrolünü sağlayan, çok kanallı ve yüksek hızlı takip radarı.'),
(45, 'SOM-B2 (Seyir Füzesi)', 'Füze Sistemleri', 'Hassas hedefleri (sığınak, köprü, gemi) delmek için geliştirilmiş, uzun menzilli, akıllı seyir füzesi.'),
(46, 'BOZDOĞAN (Görüş Ötesi)', 'Füze Sistemleri', 'Uçaklardan atılan, yüksek manevra kabiliyetine sahip, yerli hava-hava füzesi.'),
(47, 'GEZGİN (Kara Seyir)', 'Füze Sistemleri', 'Stratejik derinlikteki hedefleri vurabilen, düşük radar izine sahip, uzun menzilli seyir füzesi.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) DEFAULT NULL,
  `sifre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici_adi`, `sifre`) VALUES
(1, 'baran21', '$2y$10$zqXisdmdh7tUy/fxfk3UHeUSP8xTVJsWQb7EvDW0d9xagQA0tw3Uy'),
(2, 'baran', '$2y$10$8g3Mj3u/wEfsnp9Nxe1hzuTyKSMiVKxS8HNoD.IkrS479yZFDJdFa');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
