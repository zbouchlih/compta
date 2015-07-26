@extends('template')

@section('content')
@if(in_array(16,Session::get('right_session')) )
@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des Année budgetaires</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('anneebudgetaires.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Annee budgetaire
                            </a>
                        </div>

                        <!--div class="col-md-offset-4 col-md-4">

                            <form class="form-inline pull-right">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Recherche">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-standard btn-sm">OK</button>
                            </form>

                        </div-->
                    </div>
                    <div class="resultat">
                     @if($anneebudgetaires->isEmpty())
                        <div class="well text-center">Pas de Annee budgetaires trouvé.</div>
                     @else
                        @include('anneebudgetaires.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@else
    <div style="margin-left: 300px">
        <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
    </div>

@endif
@endsection
             