@extends('template')

@section('content')
@if(in_array(19,Session::get('right_session')) )
@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des budgets</div>
                <div class="panel-body">

                    <div class="row">
                        <!--div class="col-md-4">
                            <a href="{!! route('budgets.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Budget
                            </a>
                        </div-->

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
                     @if($budgets->isEmpty())
                        <div class="well text-center">Aucun budget trouvé.</div>
                     @else
                        @include('budgets.table')
                     @endif
                   
                    </div>
                    
                </div>
            </div>
@else
    <div style="margin-left: 300px">
        <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
    </div>

@endif
@endsection
             