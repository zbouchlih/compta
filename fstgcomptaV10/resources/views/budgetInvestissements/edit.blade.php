@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier BudgetInvestissement</div>
            <div class="panel-body">
   				 {!! Form::model($budgetInvestissement, ['route' => ['budgetInvestissements.update', $budgetInvestissement->id], 'method' => 'patch']) !!}

   
<div class="form-group col-md-6">
    {!! Form::label('previsionnel', 'Previsionnel:') !!}
    {!! Form::number('previsionnel', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('initial', 'Initial:') !!}
    {!! Form::number('initial', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('modificatif', 'Modificatif:') !!}
    {!! Form::number('modificatif', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('idAnnee', 'Idannee:') !!}
     {!! Form::select('idAnnee',$annees, '3', ['class' => 'form-control','disabled']) !!}
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