<?php
  session_start();
   if(isset($_GET["seccion"])){
     
   if($_GET["seccion"] == "logout"){
    Header("Location:secciones/logout.php");
    die();
    }
  }
  if(isset($_SESSION)){
      
      if(!$_SESSION["sesion_gruporod"] == "gruporod"){
        
        Header("Location:index.php");
      }
  }
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Grupo Rodriguez - Panel</title>

        <meta name="description" content="Grupo Rodriguez - Panel">
        <meta name="author" content="Tomi">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.css">
        <!-- Web fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" href="assets/css/css_propio.css">
        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        <!-- END Stylesheets -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/jquery.placeholder.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- Page JS Code -->
    </head>
    <body>
        <div id="page-container" class="sidebar-l sidebar-mini sidebar-o side-scroll header-navbar-fixed header-navbar-transparent">
            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right visible-xs visible-sm" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <a class="h5 text-white">
                                <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">Grupo Rodríguez</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content side-content-full">
                            <ul class="nav-main">
                                <li>
                                    <a href="index_mapa.php?seccion=mapa"><i class="icon-map"></i><span class="sidebar-mini-hide">Mapa</span></a>
                                </li>
                                <li class="open">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="glyphicon glyphicon-map-marker"></i><span class="sidebar-mini-hide">Marcadores</span></a>
                                    <ul>
                                        <li>
                                            <a href="index_mapa.php?seccion=ingresar_marcador">Ingresar marcador</a>
                                        </li>
                                        <li>
                                            <a href="index_mapa.php?seccion=editar_marcador">Ver/Editar marcadores</a>
                                        </li>
                                        <!--<li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Link 2-1</a>
                                                </li>
                                                <li>
                                                    <a href="#">Link 2-2</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="index_mapa.php?seccion=gestionar_marcadores"><i class="glyphicon glyphicon-cog"></i><span class="sidebar-mini-hide">Gestionar Marcadores</span></a>
                                </li>
                                <li>
                                    <a href="index_mapa.php?seccion=logout"><i class="glyphicon glyphicon-off"></i><span class="sidebar-mini-hide">Salir</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full hidden-md hidden-lg">
                <div class="content-boxed">
                    <!-- Header Navigation Left -->
                    <ul class="nav-header pull-left">
                        <li class="header-content">
                            <a class="h5" href="index_mapa.html">
                                <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 text-white">ne</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END Header Navigation Left -->
                </div>
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-link text-white pull-right" type="button" data-toggle="layout" data-action="sidebar_open">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                </ul>
                <!-- END Header Navigation Right -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <div class="bg-image" style="background-image: url('assets/img/various/promo-code.png');">
                    <div class="bg-primary-dark-op alto">
                        <section class="content content-full content-boxed">
                            <div class="push-100-t push-50 text-center">
                                <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Grupo Rodríguez</h1>
                            </div>
                        </section>
                    </div>
                </div>
                <section class="content content-boxed">
                    <?php
                    if(isset($_GET["seccion"])){
                        $seccion = $_GET["seccion"];
                        include "secciones/".$seccion.".php";
                    }
                    ?>
                </section>
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-white">
                <div class="content content-boxed">
                    <!-- Copyright Info -->
                    <div class="font-s12 push-20 clearfix">
                        <hr class="remove-margin-t">
                        <div class="pull-right">
                            &copy; Copyright.
                        </div>
                        <div class="pull-left">
                            Grupo Rodriguez.
                        </div>
                    </div>
                    <!-- END Copyright Info -->
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->


        <script>
            jQuery(function () {
                // Init page helpers (Appear plugin)
                App.initHelpers('appear');
            });
        </script>
    </body>
    </html>
