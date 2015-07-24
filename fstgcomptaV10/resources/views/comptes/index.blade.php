@extends('template')

@section('content')

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des Comptes</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('comptes.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Compte
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
                     @if($comptes->isEmpty())
                        <div class="well text-center">Pas de Comptes trouvé.</div>
                     @else
                       <div class="form-group col-md-6">

                     {!! Form::open(['route' => ['comptes.index'], 'method' => 'get']) !!}
                   
                        {!! Form::select('idTypebudget',$typebudgets, $var, ['class' => 'form-control']) !!}
                      
                       
                           {!! Form::submit('Afficher', ['class' => 'btn btn-standard']) !!}
                      
                    {!! Form::close() !!}  


                 

                   
                        

                    </div>
                        @include('comptes.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             