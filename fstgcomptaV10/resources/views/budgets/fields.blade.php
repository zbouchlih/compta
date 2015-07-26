<!--- Previsionnel Field --->
<div class="form-group col-md-6">
    {!! Form::label('previsionnel', 'Prévisionnel:') !!}
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
	 {!! Form::select('idAnnee',$annees, '35', ['class' => 'form-control']) !!}
</div>
<!--- Idannee Field --->
<div class="form-group col-md-6">
    {!! Form::label('idTypebudget', 'idTypebudget:') !!}
	 {!! Form::select('idTypebudget',$typebudgets, '3', ['class' => 'form-control']) !!}
</div>

