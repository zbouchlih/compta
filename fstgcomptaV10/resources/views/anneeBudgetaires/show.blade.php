@extends('template')

@section('content')
   @if(in_array(16,Session::get('right_session')) )
<div class="panel panel-default panel-model">
    <div class="panel-heading">Détails</div>
        <div class="panel-body">
            <div class="resultat">
                @include('anneebudgetaires.show_fields')
            </div>
                   
        </div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
      @else
        <div style="margin-left: 300px">
            <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
        </div>

    @endif
@endsection