@extends('template')

@section('content')

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des profils</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('profiles.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter profil
                            </a>
                        </div>


                        <div class="col-md-offset-4 col-md-4">

                            <form class="form-inline pull-right">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Recherche">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-standard btn-sm">OK</button>
                            </form>

                        </div>
                    </div>
                    <div class="resultat">
                     @if($profiles->isEmpty())
                        <div class="well text-center">Aucun profil trouvé.</div>
                     @else
                        @include('profiles.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             