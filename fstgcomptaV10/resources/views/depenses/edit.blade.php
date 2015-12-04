@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier dépense</div>
            <div class="panel-body">
   				 {!! Form::model($depense, ['route' => ['depenses.update', $depense->id], 'method' => 'patch']) !!}

        
<div class="form-group col-md-6 hidden">
    {!! Form::label('idCompterepartition', 'Idcompterepartition:') !!}
    {!! Form::number('idCompterepartition', $idCompterepartition, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-md-6">
    {!! Form::label('details', 'Détails:') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('quantite', 'Quantité:') !!}
    {!! Form::number('quantite', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('valeur', 'Valeur:') !!}
    {!! Form::number('valeur', null, ['class' => 'form-control']) !!}
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
@endsection