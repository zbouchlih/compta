@extends('template')

@section('content')

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des dépenses concernant le compte {!! $compte !!}</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            @if($etat!=-1)
                                <a href="{!! route('depenses.create', [$idCompterepartition]) !!}" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une dépense
                                </a>
                            @else
                                Modification fermée
                            @endif
                        </div>
                        <br/>
                        <br/>
                        <div>
                            Budget du compte :<b>  {!!$compterepartition->credit_ouvert!!} dh</b><br/>
                            Reste :<b>{!!$compterepartition->credit_ouvert - $depensesSum!!} dh</b>


                        </div>



                        <!-- div class="col-md-offset-4 col-md-4">

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
                     @if($depenses->isEmpty())
                        <div class="well text-center">Pas de Dépenses trouvé.</div>
                     @else
                        @include('depenses.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             