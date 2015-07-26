@extends('template')

@section('content')
@if(in_array(13,Session::get('right_session')) )
@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des Types de budgets</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            @if(in_array(14,Session::get('right_session')) )
                                <a href="{!! route('typebudgets.create') !!}" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un Type de budget
                                </a>
                            @endif
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
                     @if($typebudgets->isEmpty())
                        <div class="well text-center">Aucun type de budget trouvé.</div>
                     @else
                        @include('typebudgets.table')
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
             