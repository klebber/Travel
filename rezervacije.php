<!DOCTYPE html>
<html lang="en">
<?php include("init.php");
include("konekcija.php");
if ($_SESSION['ulogovan'] == 0 || $_SESSION['rola'] != 'korisnik') {
    header("Location: index.php");
}
$upit = 'SELECT r.rezervacijaID as id, d.grad as grad, p.datumOD as datumOD, p.datumDO as datumDO, p.cena as cena FROM rezervacija r JOIN ponuda p ON r.ponudaID = p.ponudaID JOIN destinacija d ON d.destinacijaID = p.destinacijaID WHERE r.korisnikID = ' . $_SESSION['id'];
$rezervacije = $mysqli->query($upit);
?>

<head>
    <meta charset="utf-8">
    <title>TRAVEL - Turistička agencija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/refineslide.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">

    <link rel="shortcut icon" href="ico/favicon.ico">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<?php include 'header.php'; ?>

<body>

    <div class="row">
        <div class="span12">
            <div class="blank50"></div>
        </div>
    </div>

    <section id='maincontent'>
        <div class="container">
            <?php if (isset($_SESSION['infoRez'])) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo ($_SESSION['infoRez']); ?>
                </div>
            <?php unset($_SESSION['infoRez']);
            } 
            if (isset($_SESSION['greskaRez'])) { ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo ($_SESSION['greskaRez']); ?>
                </div>
            <?php unset($_SESSION['greskaRez']);
            } ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Grad</th>
                        <th>Datum Polaska</th>
                        <th>Datum Povratka</th>
                        <th>Cena(eur)</th>
                        <th>Ponistavanje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($rezervacije->num_rows == 0) {?>
                        <tr>
                            <td colspan="5">&emsp;Nemate rezervisanih ponuda!</td>
                        </tr>
                    <?php } else {
                        while ($red = $rezervacije->fetch_object()) {
                    ?>
                            <tr>
                                <td><?= $red->grad; ?></td>
                                <td><?= $red->datumOD; ?></td>
                                <td><?= $red->datumDO; ?></td>
                                <td><?= $red->cena; ?></td>
                                <td><a href="ponisti.php?id=<?= $red->id ?>"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="row">
        <div class="span12">
            <div class="blank100"></div>
            <div class="blank100"></div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/jquery.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/portfolio/jquery.quicksand.js"></script>
    <script src="js/portfolio/setting.js"></script>
    <script src="js/hover/jquery-hover-effect.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.min.js"></script>
    <script src="js/jquery.refineslide.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>