<!DOCTYPE html>
<html lang="en">

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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#txt").keyup(function() {
                $("#tabela").hide();
                var vrednost = $("#txt").val();
                if (vrednost == "") {
                    $("#livesearch").hide();
                    return;
                }
                $.get(
                    "suggest.php", {
                        unos: vrednost
                    },
                    function(data) {
                        $("#livesearch").show();
                        $("#livesearch").html(data);

                    });
            });
        });

        function place(element) {
            $("#txt").val(element.innerHTML);
            $("#livesearch").hide();
            loadTable("");
        }

        function loadTable(ord) {
            var pretraga = $("#txt").val();
            $.get("pretraga.php", {
                id: pretraga,
                order: ord
            }, function(result) {
                $('#tabela').show();
                $('#redovi').html(result);
            });
        }
    </script>
</head>

<body onload="document.getElementById('txt').focus()">
    <?php include 'header.php'; ?>

    <div class="row">
        <div class="span12">
            <div class="blank50"></div>
        </div>
    </div>

    <section id='maincontent'>
        <div class="container">
            <?php if (isset($_SESSION['greskaDest'])) { ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo ($_SESSION['greskaDest']); ?>
                </div>
            <?php unset($_SESSION['greskaDest']);
            } ?>
            <label class="control-label">Pretražite destinacije:</label>
            <form action="" method="post" role="form" class="contactForm" autocomplete="off">
                <div class="row">
                    <div class="span8 form-group">
                        <input type="text" id="txt" class="inputfield" placeholder="Destinacija" />
                        <div id="livesearch"></div>
                        <table id="tabela" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Grad</th>
                                    <th>Polazak</th>
                                    <th>Povratak</th>
                                    <th>
                                        Cena
                                        <a href="#" onclick="loadTable(' ORDER BY cena ASC')" class="fas fa-angle-up"></a>
                                        <a href="#" onclick="loadTable(' ORDER BY cena DESC')" class="fas fa-angle-down"></a>
                                    </th>
                                    <?php if ($_SESSION['ulogovan'] == 1 && $_SESSION['rola'] == 'korisnik') { ?>
                                        <th>Rezervacija</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody id="redovi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>


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