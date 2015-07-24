<!--- Numero Field --->
<div class="form-group col-md-6">
    {!! Form::label('numero', 'Numero:') !!}
	{!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!--- Compte Field --->
<div class="form-group col-md-6">
    {!! Form::label('compte', 'Compte:') !!}
	{!! Form::text('compte', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('idTypebudget', 'idTypebudget:') !!}
    {!! Form::select('idTypebudget',$typebudgets, '1', ['class' => 'form-control']) !!}

</div>

