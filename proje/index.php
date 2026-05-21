<?php 
session_start(); 
include 'baglan.php'; 

if(isset($_GET['cikis'])) { 
    session_destroy(); 
    header("Location: index.php"); 
    exit;
} 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>PATRIAM DEFENCE | Stratejik Envanter</title>
    <style>
        body { margin:0; display:flex; font-family:'Segoe UI', sans-serif; background:#050505; color:#fff; }
        .sidebar { width:260px; background:#0a0a0a; height:100vh; padding:30px 15px; border-right:1px solid #c0392b; overflow-y:auto; }
        .logo-box { text-align:center; margin-bottom:40px; }
        .logo-box h1 { color:#c0392b; font-size:24px; letter-spacing:4px; margin:0; }
        .logo-box p { color:#555; font-size:10px; letter-spacing:2px; }
        .sidebar a { color:#ccc; display:block; padding:12px; text-decoration:none; font-weight:600; border-bottom:1px solid #1a1a1a; font-size:13px; }
        .sidebar a:hover { background:#111; color:#fff; border-left:4px solid #c0392b; }
        .main { flex:1; padding:50px; }
        .kart { background:#0d0d0d; padding:20px; border-radius:8px; border:1px solid #1a1a1a; transition:0.3s; }
        .kart:hover { border-color:#c0392b; }
        .banner { background:#c0392b; color:#fff; padding:25px; text-align:center; margin-top:40px; border-radius:8px; font-weight:bold; }
        .duyuru-box { background:#111; padding:15px; border-left:4px solid #c0392b; margin-bottom:30px; }
        .stat-box { display:flex; justify-content:space-around; margin:30px 0; background:#0d0d0d; padding:20px; border:1px solid #222; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-box"><h1>PATRIAM</h1><p>DEFENCE</p></div>
        <a href="index.php">ANA SAYFA</a>
        <a href="?kategori=Mermiler">MERMİLER</a>
        <a href="?kategori=Silahlar">SİLAHLAR</a>
        
        <a href="?sayfa=araclar" style="color:<?php echo (isset($_GET['sayfa']) && $_GET['sayfa']=='araclar') ? '#c0392b' : '#ccc'; ?>">ARAÇLAR</a>
        <?php if(isset($_GET['sayfa']) && $_GET['sayfa'] == 'araclar' || isset($_GET['kategori']) && in_array($_GET['kategori'], ['Kara Araçları', 'Hava Araçları', 'Deniz Araçları'])): ?>
            <a href="?kategori=Kara Araçları" style="padding-left:30px; color:#c0392b;">› Kara Araçları</a>
            <a href="?kategori=Hava Araçları" style="padding-left:30px; color:#c0392b;">› Hava Araçları</a>
            <a href="?kategori=Deniz Araçları" style="padding-left:30px; color:#c0392b;">› Deniz Araçları</a>
        <?php endif; ?>

        <a href="?kategori=Elektronik Harp">ELEKTRONİK HARP</a>
        <a href="?kategori=Radar Sistemleri">RADAR SİSTEMLERİ</a>
        <a href="?kategori=Füze Sistemleri">FÜZE SİSTEMLERİ</a>
        
        <hr style="border-color:#333; margin:20px 0;">
        <a href="?sayfa=hakkimizda">HAKKIMIZDA</a>
        <a href="?sayfa=iletisim">İLETİŞİM</a>
        
        <hr style="border-color:#333; margin:20px 0;">
        <?php if(isset($_SESSION['admin'])): ?>
            <a href="panel.php" style="color:#c0392b;">ADMİN PANELİ</a>
            <a href="?cikis=1" style="color:#c0392b;">ÇIKIŞ YAP</a>
        <?php elseif(isset($_SESSION['uye'])): ?>
            <a href="#" style="color:#fff;">HESABIM (<?php echo $_SESSION['uye']; ?>)</a>
            <a href="?cikis=1" style="color:#c0392b;">ÇIKIŞ YAP</a>
        <?php else: ?>
            <a href="giris.php" style="color:#c0392b;">GİRİŞ YAP</a>
        <?php endif; ?>
    </div>

    <div class="main">
        <div style="text-align:center; margin-bottom:40px;">
            <h1 style="font-size:45px; color:#c0392b; letter-spacing:8px; margin:0;">PATRIAM DEFENCE</h1>
            <p style="color:#555; letter-spacing:3px;">STRATEJİK ENVANTER YÖNETİM SİSTEMİ</p>
        </div>

        <?php 
        if(isset($_GET['sayfa']) && $_GET['sayfa'] == 'hakkimizda'): ?>
            <div class="kart">
                <h2>HAKKIMIZDA</h2>
                <p>Kurucumuz <b>Ramazan DEMİR</b>, 1980 Diyarbakır doğumlu olup, mühendislik vizyonuyla Patriam Defence'i kurmuştur.</p>
            </div>
        <?php elseif(isset($_GET['sayfa']) && $_GET['sayfa'] == 'iletisim'): ?>
            <div class="kart">
                <h2>İLETİŞİM</h2>
                <p>Adres: Nezih Towers, Ümraniye / İSTANBUL</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.680000!2d29.1!3d41.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDAwJzAwLjAiTiAyOcKwMDYnMDAuMCJF!5e0!3m2!1str!2str!4v1600000000000" width="100%" height="250" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        <?php elseif(isset($_GET['kategori'])): ?>
            <h2 style="color:#c0392b;"><?php echo strtoupper($_GET['kategori']); ?></h2>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:20px;">
                <?php 
                $sorgu = $db->prepare("SELECT * FROM urunler WHERE kategori=?"); 
                $sorgu->execute([$_GET['kategori']]); 
                while($row = $sorgu->fetch(PDO::FETCH_ASSOC)) { 
                    echo "<div class='kart'><h3>".$row['urun_adi']."</h3><p>".$row['aciklama']."</p></div>"; 
                } 
                ?>
            </div>
        <?php else: ?>
           <div class="duyuru-box">
                <h3 style="color:#c0392b; margin-top:0;">GÜNCEL AR-GE VE FAALİYET DUYURULARI</h3>
                <ul style="color:#ccc; font-size:14px; line-height:1.8; list-style-type: square; padding-left: 20px;">
                    <li><b>[21.05.2026]</b> HAVELSAN ile İHA otonom yazılımı entegrasyonu başarıyla tamamlandı.</li>
                    <li><b>[18.05.2026]</b> EİRS (Erken İhbar Radar Sistemi) saha testleri %98 başarı oranıyla sonuçlandı.</li>
                    <li><b>[15.05.2026]</b> SİDA (Silahlı İnsansız Deniz Aracı) platformları tam otonom devriye modülüyle envantere teslim edildi.</li>
                </ul>
            </div>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="kart">
                    <h3 style="color:#c0392b; margin-top:0;">OPERASYONEL HAZIRLIK</h3>
                    <div style="background:#222; height:15px; width:100%; border-radius:10px; overflow:hidden;"><div style="background:#c0392b; height:100%; width:92%;"></div></div>
                </div>
                <div class="kart">
                    <h3 style="color:#c0392b; margin-top:0;">ENVANTER DAĞILIMI</h3>
                    <div style="background:#222; height:15px; width:100%; border-radius:10px; overflow:hidden; display:flex;">
                        <div style="background:#c0392b; width:45%;"></div><div style="background:#777; width:35%;"></div><div style="background:#444; width:20%;"></div>
                    </div>
                </div>
            </div>
            <div class="stat-box">
                <div style="text-align:center;"><h2 style="color:#c0392b; margin:0;">25+</h2><p style="color:#777;">Stratejik Kategori</p></div>
                <div style="text-align:center;"><h2 style="color:#c0392b; margin:0;">8</h2><p style="color:#777;">Yıllık Deneyim</p></div>
                <div style="text-align:center;"><h2 style="color:#c0392b; margin:0;">100+</h2><p style="color:#777;">Ürün/Sistem</p></div>
            </div>
        <?php endif; ?>
        <div class="banner">KURUMSAL İŞ BİRLİĞİ İÇİN: INFO@PATRIAMDEFENCE.COM</div>
    </div>
</body>
</html>