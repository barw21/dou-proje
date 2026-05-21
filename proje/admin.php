<?php session_start();
if(isset($_POST['giris'])) {
    if($_POST['kadi'] == "admin" && $_POST['sifre'] == "12345") {
        $_SESSION['admin'] = "var";
        header("Location: panel.php");
    } else { echo "<script>alert('Hatalı giriş!');</script>"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { margin:0; background: url('img/arka.jpg') no-repeat center center/cover; height:100vh; display:flex; justify-content:center; align-items:center; font-family:sans-serif; }
        .box { background:rgba(22,27,34,0.9); padding:40px; border:1px solid #c0392b; border-radius:10px; width:300px; color:white; }
        input { width:100%; padding:10px; margin:10px 0; background:#0d1117; border:1px solid #30363d; color:white; }
        button { width:100%; padding:10px; background:#c0392b; color:white; border:none; cursor:pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2 style="text-align:center;">ADMİN GİRİŞİ</h2>
        <form method="POST">
            <input type="text" name="kadi" placeholder="Kullanıcı Adı" required>
            <input type="password" name="sifre" placeholder="Şifre" required>
            <button type="submit" name="giris">GİRİŞ YAP</button>
        </form>
    </div>
</body>
</html>