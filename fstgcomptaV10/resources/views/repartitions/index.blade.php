@extends('template')

@section('content')
@if(in_array(22,Session::get('right_session')) )
@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des répartitions</div>
                <div class="panel-body">

                    <!--div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('repartitions.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Repartition
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
                    </div-->
                    @if(in_array(23,Session::get('right_session')) )
                    <div class="row">
                         @if( $budget->anneebudgetaire->etat != -1)
                        <div class="col-md-4">
                            <a href="{!! route('repartitions.editall', [$idAnnee]) !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Modifier les répartitions
                            </a>
                        </div>
                        @elseif($budget->anneebudgetaire->etat == -1)
                        <div class="col-md-4">
                                 Modification fermée
                        </div>
                        @endif
                    </div>
                    @endif
                    <div class="resultat">
                     @if($repartitions->isEmpty())
                        <div class="well text-center">Aucune répartition trouvée.</div>
                     @else

                    <div class="form-group col-md-2">

                         {!! Form::open(['route' => ['repartitions.index'], 'method' => 'get']) !!}
                            {!! Form::select('idAnnee',$annees, $idAnnee, ['class' => 'form-control']) !!}
                            {!! Form::submit('Afficher', ['class' => 'btn btn-standard']) !!}
                         {!! Form::close() !!}  

                    </div>
                    <br> <br> <br> <br><br> <br> <br> <br>
                    Budgets Actuels: <br>
                     @foreach($budgets as $budget)
                    
                                    
                        <div>
                        {!! $budget->typebudget->type !!}

                        @if($budget->modificatif > 0)
                            modificatif : {!! $budget->modificatif !!}
                        @elseif($budget->initial >0)
                            initial : {!! $budget->initial !!}
                        @else
                            previsionnel  : {!! $budget->previsionnel !!}
                        @endif
                         
                        <br>
                        </div>
                    @endforeach
                        @include('repartitions.table')
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
             