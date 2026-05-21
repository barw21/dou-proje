<?php include 'baglan.php';
if(isset($_POST['kayit'])) {
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);
    $db->prepare("INSERT INTO uyeler SET kullanici_adi=?, sifre=?")->execute([$_POST['kadi'], $sifre]);
    echo "<script>alert('Kayıt Başarılı!'); window.location='giris.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="tr"><head><meta charset="UTF-8"><style>body{background:#050505; color:#fff; display:flex; justify-content:center; align-items:center; height:100vh; font-family:'Segoe UI', sans-serif;} .box{background:#111; padding:40px; border:1px solid #c0392b; width:300px; border-radius:10px; text-align:center;} input{width:100%; padding:12px; margin:10px 0; background:#0a0a0a; border:1px solid #333; color:#fff; border-radius:4px; box-sizing:border-box;} button{width:100%; padding:12px; background:#c0392b; border:none; color:#fff; cursor:pointer; font-weight:bold; margin-top:10px;} .link{margin-top:20px; display:block; color:#777; text-decoration:none;}</style></head>
<body><div class="box"><h2>ÜYE OL</h2><form method="POST"><input type="text" name="kadi" placeholder="Kullanıcı Adı" required><input type="password" name="sifre" placeholder="Şifre" required><button type="submit" name="kayit">KAYIT OL</button></form><a href="giris.php" class="link">Giriş ekranına dön</a></div></body></html>