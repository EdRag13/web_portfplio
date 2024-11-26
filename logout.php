<?php
session_start();
$_SESSION = array(); // Session változók törlése
session_destroy(); // Session megsemmisítése

header("Location: login.php"); // Vissza a bejelentkező oldalra
exit;
?>
