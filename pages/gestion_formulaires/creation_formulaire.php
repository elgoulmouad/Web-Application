<?php
session_start(); 
include '../../php/db_connect.php';
if(!isset($_SESSION["username"]))
{
 header("location:../login/sign-in.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>NAVCollect | Acceuil </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Icon -->
    <link rel="icon" href="../../images/icon.png">
    <!-- Bootstrap -->
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demoRender.css">
  </head>

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center><a href="index.php" class="site_title"><i></i> <img src="../../images/logo.png"> <span></span></a></center>
            </div>
            <div class="clearfix"></div>
            <br>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bonjour</span>
                <h2><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> G??n??ral <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../index.php">G??n??ral</a></li>
                      <li><a href="../profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_projets/creation_projet.php">Cr??er un projet</a></li>
                      <li><a href="../gestion_projets/consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="../gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="../gestion_zones/zone_facultative.php">Consulter les zones</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i>Gestion des formulaires </a>
                    <ul class="nav child_menu">
                      <li><a href="creation_formulaire.php">Cr??er un formulaire</a></li>
                      <li><a href="consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a href="../gestion_donnees/donnees_collectees.php"><i class="fa fa-database"></i>Les donn??es collect??es</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../images/img.jpg" alt=""><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../profile.php"> Profile</a></li>
                    <li><a href="../../php/logout.php"><i class="fa fa-sign-out pull-right"></i> Se d??connecter</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-xs-7 ">
                      <h2>Cr??er un nouveau formulaire</h2>
                    </div>
                    <div class="col-xs-5 align-right">
                      <button type="button" class="btn bg-cyan m-r-20" onclick="window.location.href = 'consulter_formulaire.php';" >Consulter les formulaires</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="content">
                      <div id="markup"></div>
                      <div id="build-wrap"></div>
                      <br>
                      <div class="row clearfix">
                        <div class=".col-md-4 .col-md-offset-4">
                          <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                            <div class="btn-group" role="group">
                            <button id="clear_form" class="float-right btn btn-danger" type="button">Vider</button>
                            </div>
                            <div class="btn-group" role="group">
                            <button id="save_form" class="float-left btn btn-success" type="button" >Enregistrer</button>
                            </div>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        NAVCollect, NAVCities-T??mara, Rabat.<br>
        &copy; 2018
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <!-- jQuery formBuilder -->
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/form-builder.min.js"></script>
    <script src="assets/js/form-render.min.js"></script>
    <!-- Script : Form creation-->
    <script src="../../js/gestion_formulaires/creation_formulaire.js"></script>
  </body>
  <?php
    pg_close($dbconn);
  ?>
</html>