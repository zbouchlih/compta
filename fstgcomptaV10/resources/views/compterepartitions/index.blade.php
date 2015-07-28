@extends('template')

@section('content')

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des Compterepartitions</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('compterepartitions.creer', [$idAnnee]) !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Compterepartition
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
                     @if($compterepartitions->isEmpty())
                        <div class="well text-center">Pas de Compterepartitions trouvé.</div>
                     @else
                     <div class="form-group col-md-2">

                         {!! Form::open(['route' => ['compterepartitions.index'], 'method' => 'get']) !!}
                            {!! Form::select('idAnnee',$annees, $idAnnee, ['class' => 'form-control']) !!}
                            {!! Form::submit('Afficher', ['class' => 'btn btn-standard']) !!}
                         {!! Form::close() !!}  

                    </div>
                    <br> <br> <br> <br><br><br><br>
                  <div>
                    Votre Budget accordé<br>
                    @foreach($repartitions as $repartition)
                        {!! $repartition->budgett->typebudget->type !!}: valeur  : {!! $repartition->budget !!}
                        <br>
                    @endforeach
                  </div>
                        @include('compterepartitions.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             