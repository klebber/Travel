<!DOCTYPE html>
<html lang="en">
<?php include("init.php"); 
if($_SESSION['ulogovan'] == 0 || $_SESSION['rola'] != 'admin') {
    header("Location: index.php");
}?>
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

    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">

    <link rel="shortcut icon" href="ico/favicon.ico">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $.get("ucitajDestinacije.php", {}, function(result) {
                $('#grad').html(result);
            });
        });
        $(osvezicb);

        function dodavanje() {
            var grad = $("#grad").val();
            var cena = $("#dodavanjeCena").val();
            var datumod = $("#datumod").val();
            var datumdo = $("#datumdo").val();
            $.post("dodajPonudu.php", {
                destinacija: grad,
                cena: cena,
                datumod: datumod,
                datumdo: datumdo
            }, function(result) {
                if(result) {
                    $('#dodavanjeAlert').html("<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Uspe\u0161an unos!<\/strong><\/div>");
                }
                else {
                    $('#dodavanjeAlert').html("<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Neuspe\u0161an unos!<\/strong><\/div>\r\n");
                }
            });
            osvezicb();
            $("#dodavanjeCena").val("");
            $("#datumod").val("");
            $("#datumdo").val("");
        }

        function izmena() {
            var ponuda = $("#ponudeIzmeni").val();
            var cena = $("#izmenaCena").val();
            $.post("izmeniPonudu.php", {
                ponuda: ponuda,
                cena: cena
            }, function(result) {
                if(result) {
                    $('#izmenaAlert').html("<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Uspe\u0161na izmena!<\/strong><\/div>");
                }
                else {
                    $('#izmenaAlert').html("<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Neuspe\u0161na izmena!<\/strong><\/div>\r\n");
                }
            });
            osvezicb();
            $("#izmenaCena").val("");
        }

        function brisanje() {
            var ponuda = $("#ponudeObrisi").val();
            $.post("obrisiPonudu.php", {
                ponuda: ponuda
            }, function(result) {
                if(result) {
                    $('#brisanjeAlert').html("<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Uspe\u0161no brisanje!<\/strong><\/div>");
                }
                else {
                    $('#brisanjeAlert').html("<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" "+
                    "data-dismiss=\"alert\">\u00D7<\/button><strong>Neuspe\u0161no brisanje!<\/strong><\/div>\r\n");
                }
            });
            osvezicb();
        }

        function osvezicb() {
            $.get("ucitajPonude.php", {}, function(result) {
                $('#ponudeIzmeni').html(result);
                $('#ponudeObrisi').html(result);
            });
        }
    </script>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="row">
        <div class="span12">
            <div class="blank50"></div>
        </div>
    </div>

    <section id='maincontent'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h3>Unos ponude</h3>
                    <label>Destinacija</label>
                    <select name="destinacija" class="form-control-cb" id="grad"></select>
                    <label>Cena</label>
                    <input type="number" name="cena" id="dodavanjeCena" class="form-control">
                    <label>Datum od</label>
                    <input type="date" name="datumod" id="datumod" class="form-control">
                    <label>Datum do</label>
                    <input type="date" name="datumdo" id="datumdo" class="form-control">
                    <hr>
                    <input type="button" value="Unesi ponudu" class="btn btn-primary" onclick="dodavanje()">
                    <div id="dodavanjeAlert"></div>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h3>Izmena cene ponude</h3>
                    <form method="POST">
                        <label>Ponuda</label>
                        <select name="ponuda" class="form-control-cb" id="ponudeIzmeni"></select>
                        <label>Cena</label>
                        <input type="number" name="cena" id="izmenaCena" class="form-control">
                        <hr>
                        <input type="button" value="Izmeni ponudu" class="btn btn-primary" onclick="izmena()">
                        <div id="izmenaAlert"></div>
                        <hr>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h3>Obrisi ponudu</h3>
                    <form method="POST">
                        <label>Ponuda</label>
                        <select name="ponuda" class="form-control-cb" id="ponudeObrisi"></select>
                        <hr>
                        <input type="button" value="Obrisi ponudu" class="btn btn-primary" onclick="brisanje()">
                        <div id="brisanjeAlert"></div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <div class="row">
        <div class="span12">
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