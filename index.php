<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ljekarna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ljekarna</h1>
    <h2>Lista lijekova</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ljekarna";
    $db = new mysqli($servername, $username, $password, $dbname);
    
    if ($db -> connect_error) {
        die("Povezivanje s bazom nije uspjelo:" .$db -> connect_error);
    }
    
    $sql = "SELECT id, naziv, cijena, kolicina FROM lijekovi";
    $lijek = $db -> query($sql);
    
    if ($lijek -> num_rows > 0) {
        while($row = $lijek -> fetch_assoc()) {
            echo " ID: " .$row["id"]. " | Naziv: " .$row["naziv"]. " | Cijena: " .$row["cijena"]. " | Količina: " .$row["kolicina"]."<br>";
        }
    }

    $db -> close();

    ?>
    <br>
    <form action="process.php" method="post">
        <div class="container">
            <div class="column left">
                <label class="header" for="artikal">Artikal</label>
                <label for="andol">Andol</label>
                <label for="aspirin">Aspirin</label>
                <label for="vitaminc">Vitamin C</label>
            </div>
            <div class="column right">
                <label class="header" for="kolicina">Kolicina</label>
                <input type="number" name="andol" value="0">
                <input type="number" name="aspirin" value="0">
                <input type="number" name="vitaminc" value="0">
            </div>
        </div>
        <span>Kako ste saznali za našu ljekarnu?</span>
        <select name="select" id="select">
            <option value="1">Ja sam redovan kupac</option>
            <option value="2">TV reklama</option>
            <option value="3">Halo oglasi</option>
        </select>
        <input type="submit" value="Naruci">
    </form>
</body>
</html>