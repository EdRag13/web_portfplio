<?php
require 'db.php';
$sql="SELECT * FROM web_oldal";
$result=$conn->query($sql);
?>

<html lang="hu">
<head>
	<meta charset="UTF-8">
    <link id="theme-link" rel="stylesheet" href="style1.css">
</head>
<button id="theme-toggle" class="toggle-button">Dark_mode</button>
<center><h1>felhasználók<h1></center>
<table>
	<thead>
		<tr>
			<th>user id</th>
			<th>fel. neve</th>
			<th>email</th>
			<th>password</th>
			<th>regdatetime</th>
			<th>rights</th>
		</tr>
	</thead>


	<tbody>
            <?php
            // Ellenőrzés, hogy van-e eredmény
            if ($result->num_rows > 0) {
                // Adatok kiírása
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['uid']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['mail']}</td>
                            <td>{$row['pass']}</td>
                            <td>{$row['regdatetime']}</td>
                            <td>{$row['rights']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nincs megjeleníthető adat</td></tr>";
            }
            ?>
        </tbody>
</table>


<body>
<script src="script.js"></script>
<script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
</script>
</body>

</html>