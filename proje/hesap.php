<?php 
session_start(); 
if(!isset($_SESSION['uye'])) { header("Location: giris.php"); exit; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hesabım | Patriam Defence</title>
    <style>
        body { background:#050505; color:#fff; font-family:sans-serif; padding:50px; }
        .kart { background:#0d0d0d; padding:30px; border:1px solid #c0392b; border-radius:10px; max-width:500px; }
    </style>
</head>
<body>
    <div class="kart">
        <h2>KULLANICI PROFİLİ</h2>
        <p>Hoş geldin, <b><?php echo $_SESSION['uye']; ?></b></p>
        <p>Sistemdeki Yetki Seviyen: <b>Operasyonel Personel</b></p>
        <a href="index.php" style="color:#c0392b;">← Ana Sayfaya Dön</a>
    </div>
</body>
</html>