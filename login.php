<?php
session_start(); // Session indítása

$servername = "localhost"; // vagy a megfelelő szerver név
$username = "root"; // az adatbázis felhasználóneve
$password = ""; // az adatbázis jelszava
$dbname = "web_portfolio";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolódási hiba ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    if (empty($mail) || empty($pass)) {
        echo "Kérjük, töltse ki az összes mezőt!";
    } else {
        // SQL előkészítése
        $stmt = $conn->prepare("SELECT * FROM web_oldal WHERE mail = ? AND pass = ?");
        if (!$stmt) {
            die("SQL előkészítési hiba: " . $conn->error);
        }
        $stmt->bind_param("ss", $mail, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Eredmény lekérése
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name']; // Felhasználó neve mentése session-be
            $_SESSION['email'] = $row['mail']; // E-mail mentése session-be
        
            header("Location: welcome.php"); // Átirányítás az üdvözlő oldalra
            exit;
        }
         else {
            echo "Hibás e-mail vagy jelszó!";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link id="theme-link" rel="stylesheet" href="style1.css">
</head>
<body>
<button id="theme-toggle" class="toggle-button">Dark_mode</button>
    <h2>Bejelentkezés</h2>
    <form method="post" action="">
        <label for="mail">E-mail:</label><br>
        <input type="email" id="mail" name="mail" required><br><br>
        
        <label for="pass">Jelszó:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <input type="submit" value="Bejelentkezés">
    </form>
    <p>Ha nem vagy bejelentkezve, akkor regisztrálj!</p>
    <form method="get" action="register.php" style='margin-top: 10px;'>
            <button type="submit">Regisztráció</button>
    </form>
</body>
<script src="script.js"></script>
<script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
</script>
</html>
