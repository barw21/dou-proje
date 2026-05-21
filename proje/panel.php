<?php 
session_start(); 
include 'baglan.php'; 

// Yetki kontrolü
if(!isset($_SESSION['admin'])) { header("Location: giris.php"); exit; }

// Ürün Ekleme
if(isset($_POST['kaydet'])) { 
    $db->prepare("INSERT INTO urunler SET urun_adi=?, kategori=?, aciklama=?")
       ->execute([$_POST['ad'], $_POST['kat'], $_POST['aciklama']]); 
    header("Location: panel.php"); 
}

// Ürün Silme
if(isset($_GET['sil'])) { 
    $db->prepare("DELETE FROM urunler WHERE id=?")->execute([$_GET['sil']]); 
    header("Location: panel.php"); 
}

// Çıkış
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
        .logo{font-size:26px; font-weight:bold; color:#c0392b; margin-bottom:40px;} 
        .sidebar a{color:#aaa; display:block; margin:15px 0; text-decoration:none;} 
        .main{flex:1; padding:50px; overflow-y:auto;} 
        form, .kart{background:#121216; padding:30px; border-radius:8px; border:1px solid #2a2a30; margin-bottom:40px;} 
        input,textarea{width:100%; padding:12px; margin:10px 0; background:#1a1a20; border:1px solid #333; color:#fff; border-radius:5px; box-sizing:border-box;} 
        button{background:#c0392b; color:#fff; border:none; padding:12px 25px; border-radius:5px; cursor:pointer; font-weight:bold;} 
        .item{background:#121216; padding:15px; margin-bottom:10px; border-left:4px solid #c0392b; display:flex; justify-content:space-between; border-radius:5px;}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #333; text-align: left; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">PATRIAM DEFENCE</div>
        <a href="index.php">Ana Sayfa</a>
        <a href="?cikis=1" style="color:red;">Çıkış Yap</a>
    </div>
    
    <div class="main">
        <form method="POST">
            <h3>Yeni Ürün Ekle</h3>
            <input type="text" name="ad" placeholder="Ürün Adı" required>
            <input type="text" name="kat" placeholder="Kategori" required>
            <textarea name="aciklama" placeholder="Açıklama" required></textarea>
            <button type="submit" name="kaydet">KAYDET</button>
        </form>

        <div class="kart">
            <h3>Sisteme Kayıtlı Kullanıcılar</h3>
            <table>
                <tr><th>ID</th><th>Kullanıcı Adı</th></tr>
                <?php 
                $kullanicilar = $db->query("SELECT * FROM uyeler"); // Tablo adın 'uyeler' değilse burayı değiştir!
                while($user = $kullanicilar->fetch(PDO::FETCH_ASSOC)) { 
                    echo "<tr><td>".$user['id']."</td><td>".$user['kullanici_adi']."</td></tr>"; 
                } 
                ?>
            </table>
        </div>

        <h2>Ürün Listesi</h2>
        <?php 
        $sorgu = $db->query("SELECT * FROM urunler"); 
        while($row = $sorgu->fetch(PDO::FETCH_ASSOC)) { 
            echo "<div class='item'><span>".$row['urun_adi']."</span> <a href='?sil=".$row['id']."' style='color:red; text-decoration:none;'>SİL</a></div>"; 
        } 
        ?>
    </div>
</body>
</html>