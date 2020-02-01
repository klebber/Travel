<?php include("init.php"); ?>
<header>
    <div class="cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">

            <div class="span4">
              <div class="logo">
                <h1><a href="index.php">Travel</a></h1>
              </div>
            </div>

            <div class="span8">
              <div class="navbar">
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">
                      <li><a href="index.php">Početna</a></li>
                      <li><a href="destinacije.php">Destinacije</a></li>
                      <?php if($_SESSION['ulogovan'] == 1 && $_SESSION['rola'] == 'korisnik'){ ?>
			                  <li><a href="rezervacije.php">Rezervacije</a></li>
                      <?php } ?>
                      <?php if($_SESSION['ulogovan'] == 1 && $_SESSION['rola'] == 'admin'){ ?>
			                  <li><a href="administracija.php">Administracija</a></li>
                      <?php } ?>
                      <?php if($_SESSION['ulogovan'] == 1){ ?>
			                  <li><a >Ime: <b><?php echo $_SESSION['ime']; ?></b></a></li>
			                  <li><a href="logout.php">Logout</a></li>
		                  <?php } else { ?>
			                  <li><a href="login.php">Login</a></li>
			                  <li><a href="registracija.php">Registracija</a></li>
		                  <?php } ?> 
                    </ul>
                  </nav>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>