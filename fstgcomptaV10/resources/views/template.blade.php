<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Plateforme comptabilité fstg Marrakech">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript">
    <meta name="author" content="IRISI Students DEVAGA GROUP">

    <link href="{{ url('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('css/metro.css')}}" rel="stylesheet">
    <link href="{{ url('css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{ url('css/docs.css')}}" rel="stylesheet">




    <!-- SideBar CSS -->
    <link href="{{ url('css/simple-sidebar.css')}}" rel="stylesheet">
    <link href="{{ url('css/custom.css')}}" rel="stylesheet">

    <script src="{{ url('js/jquery.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>

    <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/metro.js') }}"></script>
    <script src="{{ url('js/docs.js')}}"></script>
    <!--script src="{{ url('js/prettify/run_prettify.js')}}"></script-->
    <!--script src="{{ url('js/ga.js')}}"></script-->

    <title>Faculté des Sciences et Techniques Marrakech</title>
</head>

                <script>
                    $(function(){

                        $("#menu-toggle").click(function(e) {
                            e.preventDefault();
                            $("#wrapper").toggleClass("toggled");

                        });

                    });

                </script>

<body>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar2 ">
            <li class="title"><img src="{{ url('images/fstg.png') }}" alt="CadiAyyadUniversity" class="image-overlay"></li>
            <li class="active"><a href="{{ url('home') }}"><span class="mif-home icon"></span>Page d'accueil</a></li>
       
             <li>
                <a class="dropdown-toggle" href="#"><span class="mif-money icon"></span>Gestion du budget</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="{{ url('typebudgets') }}">Type de Budget</a></li>
                    <li><a href="{{ url('anneebudgetaires') }}">Année budgétaire</a></li>
                    <li><a href="{{ url('budgets') }}">Budgets</a></li>
                    <li><a href="{{ url('repartitions') }}">répartition</a></li>
                </ul>
            </li>
            <li><a href="#"><span class="mif-shopping-basket icon"></span>Gestion des Commandes</a></li>
            <li><a href="#"><span class="mif-shop icon"></span>Gestion des Fournisseurs</a></li>
            <li>
                <a class="dropdown-toggle" href="#"><span class="mif-users icon"></span>Gestion des Utilisateurs</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="{{ url('users') }}">Utilisateurs</a></li>
                    <li><a href="{{ url('profiles') }}">Gestion des profils</a></li>
                    <li><a href="{{ url('roles') }}">Gestion des rôles</a></li>
                    <li><a href="{{ url('rights') }}">Gestion des droits</a></li>
                </ul>
            </li>
           

            <li class="disabled"><a href="#">Disabled item</a></li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
        <div class="navigation-bar">
            <div class="app-bar bg-darkOrange">
                <a class="app-bar-element" href="#menu-toggle" id="menu-toggle">
                    <span id="toggle-tiles-dropdown" class="mif-menu mif-2x"></span>
                </a>
                <ul class="app-bar-menu">
                    <li><a href=""><span class="mif-vpn-publ mif-2x"></span></a></li>


                </ul>

                <div class="app-bar-element place-right">
                    <a class="dropdown-toggle fg-white"><span class="mif-cog"></span> Paramètres</a>
                    <div class="app-bar-drop-container bg-white fg-dark place-right"
                         data-role="dropdown" data-no-close="true">
                        <div class="padding20">
                            <ul class="v-menu mysetting">
                                <li class="menu-title">Paramètres du profil</li>
                                <li><a href="#"><span class="mif-user icon"></span> Profile</a></li>
                                <li><a href="#"><span class="mif-lock icon"></span> Changer mot de passe</a></li>
                                <li class="divider"></li>
                                <li class="menu-title">Messagerie</li>
                                <li><a href="#"><span class="mif-pencil icon"></span> Nouveau message</a></li>
                                <li><a href="#"><span class="mif-mail-read icon"></span> Messages reçus</a></li>
                                <li><a href="#"><span class="mif-mail icon"></span> Messages envoyés</a></li>
                                <li class="divider"></li>
                                <li class="menu-title">Déconnexion</li>
                                <li><a href="{{ url('auth/logout') }}"><span class="mif-exit icon"></span> Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Navigation bar -->
        <div class="contenu">

            @yield('content')


        </div>
        <!--End of contenu -->
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->




</body>
</html>