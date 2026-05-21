<?php session_start(); include 'baglan.php';
if(isset($_POST['giris'])) {
    if($_POST['kadi'] == "rd" && $_POST['sifre'] == "1980") { $_SESSION['admin'] = "var"; header("Location: panel.php"); exit; } 
    else {
        $sorgu = $db->prepare("SELECT * FROM uyeler WHERE kullanici_adi=?");
        $sorgu->execute([$_POST['kadi']]);
        $uye = $sorgu->fetch(PDO::FETCH_ASSOC);
        if($uye && password_verify($_POST['sifre'], $uye['sifre'])) { $_SESSION['uye'] = $uye['kullanici_adi']; header("Location: index.php"); exit; }
        else { echo "<script>alert('Hatalı Giriş!');</script>"; }
    }
}
?>
<!DOCTYPE html>
<html lang="tr"><head><meta charset="UTF-8"><style>body{background:#050505; color:#fff; display:flex; justify-content:center; align-items:center; height:100vh; font-family:'Segoe UI', sans-serif;} .box{background:#111; padding:40px; border:1px solid #c0392b; width:300px; border-radius:10px; text-align:center;} .logo-text{font-size:32px; font-weight:bold; color:#c0392b; letter-spacing:3px;} .sub-text{font-size:12px; color:#555; margin-bottom:30px; text-transform:uppercase;} input{width:100%; padding:12px; margin:10px 0; background:#0a0a0a; border:1px solid #333; color:#fff; box-sizing:border-box; border-radius:4px;} button{width:100%; padding:12px; background:#c0392b; border:none; color:#fff; cursor:pointer; font-weight:bold; margin-top:10px;} .link{display:block; margin-top:15px; color:#c0392b; text-decoration:none; font-size:14px;} .home-link{display:block; margin-top:20px; color:#777; font-size:14px;}</style></head>
<body><div class="box"><div class="logo-text">PATRIAM</div><div class="sub-text">DEFENCE</div><form method="POST"><input type="text" name="kadi" placeholder="Kullanıcı Adı" required><input type="password" name="sifre" placeholder="Şifre" required><button type="submit" name="giris">GİRİŞ YAP</button></form><a href="uye_ol.php" class="link">Henüz üye değil misin? Üye Ol</a><a href="index.php" class="home-link">← Ana Sayfaya Dön</a></div></body></html>