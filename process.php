<?php

define("ANDOL",3.99);
define("ASPIRIN",4.99);
define("VITAMINC",5.99);

$datum = date("d.m.Y");
$vrijeme = date("H:i:s");
$kolicina1 = $_POST["andol"];
$kolicina2 = $_POST["vitaminc"];
$kolicina3 = $_POST["aspirin"];
$poruka = $_POST["select"];
$ukupnaKolicina = $kolicina1 + $kolicina2 + $kolicina3;
$cijena = ($kolicina1 * ANDOL) + ($kolicina3 * ASPIRIN) + ($kolicina2 * VITAMINC);
$pdv = 0.25 * $cijena;
$iznos = $cijena + $pdv;

echo "<p>Datum i vrijeme izdavanja: $datum, $vrijeme</p>";
echo "<p>Ukupna kolicina ljekova: $ukupnaKolicina</p>";
echo "<p>Pojedinačna količina: </p> 
        <ol>
            <li>Andol: $kolicina1</li>
            <li>Aspirin: $kolicina3</li>
            <li>Vitamin C: $kolicina2</li>
        </ol>";
echo "<p>Cijena: $cijena € | Pdv: $pdv € | Iznos: $iznos € </p>";

if (!($poruka == 1)) {
    echo "<p>Dođite nam ponovno</p>";
} else {
    echo "<p>Hvala!</p>";
}
?>