<?php
if (!isset($_GET['unos'])) {
    echo "Parametar unos nije prosleđen!";
} else {
    $pomocna = $mysqli->real_escape_string($_GET["unos"]);
    include "konekcija.php";
    
    $upit = "SELECT destinacijaID, grad FROM destinacija WHERE grad LIKE '$pomocna%' ORDER BY grad";

    $rezultat = $mysqli->query($upit);

    if ($rezultat->num_rows == 0) {
        echo "U bazi ne postoji destinacija koja počinje na " . $pomocna;
    } else {
        while ($red = $rezultat->fetch_object()) {
            ?>
            <a href="#" onclick="place(this)"><?php echo $red->grad; ?></a>
            <br />
<?php
        }
    }
    $mysqli->close();
}
?>