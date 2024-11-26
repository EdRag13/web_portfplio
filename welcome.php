<?php
session_start(); // Session indítása
//require 'db.php';
//$sql="SELECT * FROM web_oldal";
//$result=$conn->query($sql);
// Ellenőrzés, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: welcome.php"); // Ha nincs bejelentkezve, irányítson vissza a bejelentkező oldalra
    exit;
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Üdvözöljük!</title>
    <link id="theme-link" rel="stylesheet" href="style1.css">
</head>
<body>
    <button id="theme-toggle" class="toggle-button">Dark_mode</button>
    <h2>Üdvözöljük, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    <p>Sikeresen bejelentkezett az oldalra.</p>
    <a href="logout.php">Kijelentkezés</a>
</body>
<script src="script.js"></script>
<script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
</script>
</html>
