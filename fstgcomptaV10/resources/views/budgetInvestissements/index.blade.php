@extends('template')

@section('content')

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des BudgetInvestissements</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('budgetInvestissements.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter BudgetInvestissement
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
                     @if($budgetInvestissements->isEmpty())
                        <div class="well text-center">Pas de BudgetInvestissements trouvé.</div>
                     @else
                        @include('budgetInvestissements.table')
                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             