<?php
session_start(); 
include '../php/db_connect.php';
if(!isset($_SESSION["username"]))
{
 header("location:login/sign-in.php");
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
    <link rel="icon" href="../images/icon.png">
    <!-- Bootstrap -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             <center><a href="index.php" class="site_title"><i></i> <img src="../images/logo.png"> <span></span></a></center>
            </div>
            <div class="clearfix"></div>
            <br>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
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
                      <li><a href="index.php">Acceuil</a></li>
                      <li><a href="profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_projets/creation_projet.php">Cr??er un projet</a></li>
                      <li><a href="gestion_projets/consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="gestion_zones/zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i>Gestion des formulaires<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_formulaires/creation_formulaire.php">Cr??er un formulaire</a></li>
                      <li><a href="gestion_formulaires/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                  <li><a href="gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a href="gestion_donnees/donnees_collectees.php"><i class="fa fa-database"></i>Les donn??es collect??es</a></li>
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
                    <img src="../images/img.jpg" alt=""><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    <li><a href="../php/logout.php"><i class="fas fa-sign-out-alt pull-right"></i> Se d??connecter</a></li>
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
            <div class="page-title">
              <div class="title_left ">
                <h3><strong> Acceuil </strong></h3> 
              </div>
            </div>
          </div>
          <br> <br> <br>
          <!-- Widgets -->
          <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                  <i class="fas fa-folder-open"></i>
                </div>
                <div class="content">
                  <div class="text">Projets</div>
                  <?php 
                    $query = 'SELECT  * FROM projet';
                    $result = pg_query($query) or die('??chec de la requ??te : ' . pg_last_error());
                    $num_projets = pg_num_rows($result);
                    echo '<div class="number count-to" data-from="0" data-to="'.$num_projets.'" data-speed="1000" data-fresh-interval="20"></div>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                  <i class="fas fa-map-marked-alt"></i>
                </div>
                <div class="content">
                  <div class="text">Zones d'??tude</div>
                  <?php 
                    $query = 'SELECT  * FROM zone_etude';
                    $result = pg_query($query) or die('??chec de la requ??te : ' . pg_last_error());
                    $num_zones = pg_num_rows($result);
                    echo '<div class="number count-to" data-from="0" data-to="'.$num_zones.'" data-speed="1000" data-fresh-interval="20"></div>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-purple hover-expand-effect">
                <div class="icon">
                  <i class="fas fa-list-alt"></i>
                </div>
                <div class="content">
                  <div class="text">Formulaires</div>
                  <?php 
                    $query = 'SELECT  * FROM formulaire';
                    $result = pg_query($query) or die('??chec de la requ??te : ' . pg_last_error());
                    $num_formulaires = pg_num_rows($result);
                    echo '<div class="number count-to" data-from="0" data-to="'.$num_formulaires.'" data-speed="1000" data-fresh-interval="20"></div>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-dark-blue hover-expand-effect">
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="content">
                  <div class="text">Agents</div>
                  <?php 
                    $query = 'SELECT  * FROM agent';
                    $result = pg_query($query) or die('??chec de la requ??te : ' . pg_last_error());
                    $num_agents = pg_num_rows($result);
                    echo '<div class="number count-to" data-from="0" data-to="'.$num_agents.'" data-speed="1000" data-fresh-interval="20"></div>';
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- #END# Widgets -->

          <!-- Multiple Items To Be Open -->  
          <div class="row clearfix">
            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
              <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
                <div class="panel panel-col-green">
                  <div class="panel-heading" role="tab" id="headingOne_19">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                        <i class="far fa-plus-square"></i> &nbsp; Comment cr??er un projet?
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                        raw denim aesthetic synth nesciunt you probably haven't heard of them
                        accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              <div class="panel panel-col-cyan">
                <div class="panel-heading" role="tab" id="headingTwo_19">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="false" aria-controls="collapseTwo_19">
                      <i class="fas fa-draw-polygon"></i> &nbsp; Comment g??rer vos zones?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19">
                  <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                      non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                      Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                      raw denim aesthetic synth nesciunt you probably haven't heard of them
                      accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-col-purple">
                <div class="panel-heading" role="tab" id="headingThree_19">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
                        <i class="fas fa-users-cog"></i> &nbsp; Comment g??r??r vos agents?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
                  <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                      non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                      Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                      raw denim aesthetic synth nesciunt you probably haven't heard of them
                      accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-col-dark-blue">
                <div class="panel-heading" role="tab" id="headingFour_19">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
                      <i class="fas fa-list-ul"></i> &nbsp;Comment g??rer vos formulaires?
                    </a>
                  </h4>
                </div>
                <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                  <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                      non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                      Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                      raw denim aesthetic synth nesciunt you probably haven't heard of them
                      accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>              
      <!-- #END# Multiple Items To Be Open --> 
      <div class="clearfix"></div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        NAVCollect, NAVCities-T??mara, Rabat. <br>
        &copy; 2018
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
    <script src="../js/index.js"></script>

    <?php 
    pg_free_result($result);
    pg_close($dbconn);
    ?>

  </body>
</html>