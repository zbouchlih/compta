@extends('template')

@section('content')
  @if(in_array(17,Session::get('right_session')) )
    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier une année budgétaire</div>
            <div class="panel-body">
   				 {!! Form::model($anneebudgetaire, ['route' => ['anneebudgetaires.update', $anneebudgetaire->id], 'method' => 'patch']) !!}

   
<div class="form-group col-md-6 ">
    {!! Form::label('annee', 'Année:') !!}
    {!! Form::text('annee', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('etat', 'Etat:') !!}
    {!! Form::select('etat', ['-1' => 'Fermée','1' => 'En cours'] ,$anneebudgetaire->etat ,['class' => 'form-control']) !!}
</div>

        
        <div class="col-md-12">
            {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
        </div>

    {!! Form::close() !!}
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