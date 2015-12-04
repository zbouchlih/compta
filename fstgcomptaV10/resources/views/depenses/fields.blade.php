
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

