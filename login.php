<!DOCTYPE html>
<html lang="en">
<?php include("init.php");
if ($_SESSION['ulogovan'] == 1) {
    header("Location: index.php");
} ?>

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
</head>

<?php include 'header.php'; ?>

<body>

    <div class="row">
        <div class="span12">
            <div class="blank20"></div>
        </div>
    </div>

    <section id='maincontent'>
        <div class="container">
            <?php if (isset($_SESSION['infoLogin'])) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo ($_SESSION['infoLogin']); ?>
                </div>
            <?php unset($_SESSION['infoLogin']);
            } 
            if (isset($_SESSION['greskaLogin'])) { ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo ($_SESSION['greskaLogin']); ?>
                </div>
            <?php unset($_SESSION['greskaLogin']);
            } ?>
            <h2><strong>LOGIN</strong></h2>
            <form role="form" id="login_form" name="login_form" method="post" action="obradaLogin.php">
                <div class="form-group">
                    <label for="email">E-mail adresa:</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Lozinka:</label>
                    <input type="password" name="lozinka" class="form-control" id="pwd">
                </div>

                <button type="submit" name="frm_submit" class="btn btn-color">Login</button>
            </form>
        </div>
    </section>

    <div class="row">
        <div class="span12">
            <div class="blank100"></div>
        </div>
    </div>


</body>
<?php include 'footer.php'; ?>

</html>