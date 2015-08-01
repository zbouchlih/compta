<!--- Type Field --->
<div class="form-group col-md-6">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!--- Seuil Field --->
<div class="form-group col-md-6">
    {!! Form::label('seuil', 'Seuil:') !!}
	{!! Form::number('seuil', null, ['class' => 'form-control']) !!}
</div>

