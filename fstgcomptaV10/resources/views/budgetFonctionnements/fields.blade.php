<!--- Previsionnel Field --->
<div class="form-group col-md-6">
    {!! Form::label('previsionnel', 'Previsionnel:') !!}
	{!! Form::number('previsionnel', null, ['class' => 'form-control']) !!}
</div>

<!--- Initial Field --->
<div class="form-group col-md-6">
    {!! Form::label('initial', 'Initial:') !!}
	{!! Form::number('initial', null, ['class' => 'form-control']) !!}
</div>

<!--- Modificatif Field --->
<div class="form-group col-md-6">
    {!! Form::label('modificatif', 'Modificatif:') !!}
	{!! Form::number('modificatif', null, ['class' => 'form-control']) !!}
</div>

<!--- Idannee Field --->
<div class="form-group col-md-6">
    {!! Form::label('idAnnee', 'Idannee:') !!}
	 {!! Form::select('idAnnee',$annees, '3', ['class' => 'form-control']) !!}
</div>

