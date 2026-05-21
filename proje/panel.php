<?php 
session_start(); 
include 'baglan.php'; 
if(!isset($_SESSION['admin'])) { header("Location: giris.php"); exit; }

// İşlemler
if(isset($_POST['kaydet'])) { $db->prepare("INSERT INTO urunler SET urun_adi=?, kategori=?, aciklama=?")->execute([$_POST['ad'], $_POST['kat'], $_POST['aciklama']]); header("Location: panel.php?sayfa=urunler"); }
if(isset($_GET['sil'])) { $db->prepare("DELETE FROM urunler WHERE id=?")->execute([$_GET['sil']]); header("Location: panel.php?sayfa=urunler"); }
if(isset($_GET['cikis'])) { session_destroy(); header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Patriam Defence</title>
    <style>
        body{margin:0; display:flex; font-family:sans-serif; background:#050505; color:#fff;} 
        .sidebar{width:250px; background:#111; height:100vh; padding:30px; border-right:1px solid #c0392b;} 
        .sidebar a{color:#aaa; display:block; margin:20px 0; text-decoration:none; font-weight:bold;}
        .sidebar a:hover{color:#c0392b;}
        .main{flex:1; padding:50px;}
        form{background:#121216; padding:30px; border-radius:8px; border:1px solid #2a2a30; max-width:600px;}
        input,textarea{width:100%; padding:12px; margin:10px 0; background:#1a1a20; border:1px solid #333; color:#fff; border-radius:5px; box-sizing:border-box;}
        button{background:#c0392b; color:#fff; border:none; padding:12px 25px; border-radius:5px; cursor:pointer;}
        .item{background:#121216; padding:15px; margin-bottom:10px; border-left:4px solid #c0392b; display:flex; justify-content:space-between;}
    </style>
</head>
<body>
    <div class="sidebar">
        <div style="font-size:24px; color:#c0392b; font-weight:bold; margin-bottom:40px;">ADMİN PANELİ</div>
        <a href="panel.php?sayfa=urunler">› Ürün Yönetimi</a>
        <a href="panel.php?sayfa=uyeler">› Kullanıcı Yönetimi</a>
        <hr style="border:0; border-top:1px solid #333; margin:20px 0;">
        <a href="index.php">Ana Sayfaya Dön</a>
        <a href="panel.php?cikis=1" style="color:red;">Çıkış Yap</a>
    </div>
    
    <div class="main">
        <?php if(isset($_GET['sayfa']) && $_GET['sayfa'] == 'uyeler'): ?>
            <h2>Kullanıcı Yönetimi</h2>
            <div style="background:#121216; padding:20px; border-radius:5px;">
                <table style="width:100%; text-align:left;">
                    <tr style="color:#c0392b;"><th>ID</th><th>Kullanıcı Adı</th></tr>
                    <?php 
                    $u = $db->query("SELECT * FROM uyeler"); // Tablo adını kontrol et!
                    while($row = $u->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<tr><td>".$row['id']."</td><td>".$row['kullanici_adi']."</td></tr>"; 
                    } ?>
                </table>
            </div>
        <?php else: // Varsayılan Ürün Yönetimi ?>
            <form method="POST">
                <h3>Yeni Ürün Ekle</h3>
                <input type="text" name="ad" placeholder="Ürün Adı" required>
                <input type="text" name="kat" placeholder="Kategori" required>
                <textarea name="aciklama" placeholder="Açıklama" required></textarea>
                <button type="submit" name="kaydet">EKLE</button>
            </form>
            <h2 style="margin-top:40px;">Ürün Listesi</h2>
            <?php 
            $sorgu = $db->query("SELECT * FROM urunler"); 
            while($row = $sorgu->fetch(PDO::FETCH_ASSOC)) { 
                echo "<div class='item'><span>".$row['urun_adi']."</span> <a href='?sil=".$row['id']."' style='color:red;'>SİL</a></div>"; 
            } ?>
        <?php endif; ?>
    </div>
</body>
</html>