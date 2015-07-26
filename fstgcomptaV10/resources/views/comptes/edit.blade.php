@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier un compte</div>
            <div class="panel-body">
   				 {!! Form::model($compte, ['route' => ['comptes.update', $compte->id], 'method' => 'patch']) !!}

        
<div class="form-group col-md-6">
    {!! Form::label('numero', 'Numéro:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('compte', 'Compte:') !!}
    {!! Form::text('compte', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('idTypebudget', 'Type de budget:') !!}
    {!! Form::select('idTypebudget',$typebudgets, $compte->idTypebudget, ['class' => 'form-control']) !!}

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