<?php
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
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = ($_POST['pass']); // Jelszó hashelése
    $rights = $_POST['rights'];

    // SQL beszúró lekérdezés
    $sql = "INSERT INTO web_oldal (name, mail, pass, rights) VALUES ('$name', '$mail', '$pass', '$rights')";

    if ($conn->query($sql) === TRUE) {
        echo "Új rekord létrehozva!";
    } else {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link id="theme-link" rel="stylesheet" href="style1.css">
</head>
<body>
    <button id="theme-toggle" class="toggle-button">Dark_mode</button>
    <h2>Regisztráció</h2>
    <form method="post" action="">
        <label for="name">Név:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="mail">E-mail:</label><br>
        <input type="email" id="mail" name="mail" required><br><br>
        
        <label for="pass">Jelszó:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <label for="rights">Jogosultsági szint:</label><br>
        <input type="number" id="rights" name="rights" required><br><br>
        
        <input type="submit" value="Regisztrálás">
    </form>
    <p>Ha be vagy bejelentkezve, akkor inkább jelentkez be!</p>
    <form method="get" action="login.php" style='margin-top: 10px;'>
            <button type="submit">Bejelentkezés</button>
    </form>
</body>
<script src="script.js"></script>
<script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
</script>
</html>
