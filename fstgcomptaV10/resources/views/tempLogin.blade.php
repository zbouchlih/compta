<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Plateforme comptabilité fstg Marrakech">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript">
    <meta name="author" content="IRISI Students DEVAGA GROUP">


    <link href="{{ url('css/metro.css')}}" rel="stylesheet">
    <link href="{{ url('css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{ url('css/docs.css')}}" rel="stylesheet">
    <link href="{{ url('css/custom.css')}}" rel="stylesheet">
    <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/metro.js') }}"></script>
    <script src="{{ url('js/docs.js')}}"></script>
    <script src="{{ url('js/prettify/run_prettify.js')}}"></script>
    <script src="{{ url('js/ga.js')}}"></script>
    <title>Faculté des Sciences et Techniques Marrakech</title>
</head>
<body class="homepage">
<div class="container">
    <div class="row">

        <div class="authentication padding20">
            <div class="header-content align-center">

                <img src="{{ url('images/university.png')}}" alt="CadiAyyadUniversity" class="image-overlay" height="60%" width="60%"><br>
                <img src="{{ url('images/fstg.png')}}" alt="CadiAyyadUniversity" class="image-overlay"><br>
                <h3>BIENVENUE SUR LA PLATFORME COMPTABILITE <b>FSTG MARRAKECH</b></h3>

            </div>

            <div class="grid authentication-box">
                <div class="login-form padding20">
                    @yield('content')
                </div>
            </div>

            <footer class="align-center">
                <p><b>Faculté des Sciences et Techniques Gueliz Marrakech (FSTG)</b></p>
                B.P 549, Av.Abdelkarim Elkhattabi, Guéliz Marrakech<br>
                Tél : (+212) 524 43 34 04  Fax: (+212) 524 43 31 70
            </footer>

        </div>

    </div>
</div>

</body>
</html>