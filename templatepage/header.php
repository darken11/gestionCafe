<?php 
include('myconfig.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion Cafe</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL?>favicon.ico" type="image/x-icon"/>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_URL;?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo BASE_URL;?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>js/jquery-ui.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo BASE_URL;?>dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL;?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo BASE_URL;?>bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo BASE_URL;?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo BASE_URL?>pages/index.php">Gestion Cafe</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
             
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                   
                </li> 
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-desktop  fa-fw"></i> Serveur <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_commande_list.php">Gestion Commande</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-money  fa-fw"></i> Caissier <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/encaisser_commande_list.php">Encaisser Commande</a>
                                </li>
                               
                                <li>
                                    <a href="">Facturation de Commande</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-check-square  fa-fw"></i> Caisse <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/controle_da_caisse_list.php">Controle Caisse</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-tasks  fa-fw"></i> Gerant <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_serveurs_list.php">Gestion des Serveurs</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_table_list.php">Gestion des Tables</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_ducarre.php">Gestion du Carre</a>
                                </li>
                                <li>
                                    <a href="">Gestion de Caissiers</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_menu.php">Gestion de Menu</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL;?>pages/information_cafe.php">Informations Cafe</a>
                                </li>

                                 <li>
                                    <a href="<?php echo BASE_URL;?>pages/gest_carre.php">Carre</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

            <!-- /.navbar-static-side -->
        </nav>