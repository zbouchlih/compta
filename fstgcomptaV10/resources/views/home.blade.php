@extends('template')

@section('content')
<div>
            <h3>BIENVENUE SUR LA PLATFORME COMPTABILITE <b>FSTG MARRAKECH</b></h3>
            

            <div class="tile-container">

                <div class="tile-wide bg-darkOrange fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-money"></span>
                        <span class="tile-label">Gestion de Budget</span>
                    </div>
                </div>

                <div class="tile-wide bg-red fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-shopping-basket"></span>
                        <span class="tile-label">Gestion des Commandes</span>
                    </div>
                </div>


                <div class="tile-wide bg-orange fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-shop"></span>
                        <span class="tile-label">Gestion des fournisseurs</span>
                    </div>
                </div>

                <a href="{{ url('users') }}">
                <div class="tile-wide bg-darkBrown fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-users"></span>
                        <span class="tile-label">Gestion des Utilisateurs</span>
                    </div>
                </div>
                </a>

                <div class="tile bg-darker fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-profile"></span>
                        <span class="tile-label">Mon profil</span>
                    </div>
                </div>

                <div class="tile bg-cyan fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-envelop"></span>
                        <span class="tile-badge bg-darkRed">5</span>
                        <span class="tile-label">Mail</span>
                    </div>
                </div>

                <div class="tile-wide bg-darkTeal fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-info"></span>
                        <span class="tile-label">Â propos de nous</span>
                    </div>
                </div>
            </div>
 <div class="grid">
                <div class="row cells2">

                    <div class="cell">
                        <p class="mes_titres">Derniers traitements effectués</p>
                        <div class="listview-outlook" data-role="listview">
                            <a class="list marked" href="#">
                                <div class="list-content">
                                    <span class="list-title">Aménagement, agencement & installation</span>
                                    <span class="list-subtitle">Effectué par : Chef département informatique le 26/10/2013</span>
                                    <span class="list-remark">Changement de la valeur de : CREDIT OUVERT</span>
                                </div>
                            </a>
                            <a class="list" href="#">
                                <div class="list-content">
                                    <span class="list-title">Aménagement, agencement & installation</span>
                                    <span class="list-subtitle">Effectué par : Chef département informatique le 26/10/2013</span>
                                    <span class="list-remark">Changement de la valeur de : CREDIT OUVERT</span>
                                </div>
                            </a>
                            <a class="list" href="#">
                                <div class="list-content">
                                    <span class="list-title">Aménagement, agencement & installation</span>
                                    <span class="list-subtitle">Effectué par : Chef département informatique le 26/10/2013</span>
                                    <span class="list-remark">Changement de la valeur de : CREDIT OUVERT</span>
                                </div>
                            </a>
                            <a class="list" href="#">
                                <div class="list-content">
                                    <span class="list-title">Aménagement, agencement & installation</span>
                                    <span class="list-subtitle">Effectué par : Chef département informatique le 26/10/2013</span>
                                    <span class="list-remark">Changement de la valeur de : CREDIT OUVERT</span>
                                </div>
                            </a>
                            <a class="list" href="#">
                                <div class="list-content">
                                    <span class="list-title">Aménagement, agencement & installation</span>
                                    <span class="list-subtitle">Effectué par : Chef département informatique le 26/10/2013</span>
                                    <span class="list-remark">Changement de la valeur de : CREDIT OUVERT</span>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="cell"></div>

                </div>
            </div>
@endsection