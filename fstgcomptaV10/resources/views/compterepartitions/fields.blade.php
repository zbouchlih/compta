
<!--div class="form-group col-md-6 hidden">
    {!! Form::label('repartition_id', 'Repartition Id:') !!}
	{!! Form::number('repartition_id', 1, ['class' => 'form-control']) !!}
</div-->

<div class="form-group col-md-6 hidden">
    {!! Form::label('idAnnee', 'Repartition Id:') !!}
	{!! Form::number('idAnnee', $idAnnee, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('idTypebudget', 'Type de budget:') !!}
	{!! Form::select('idTypebudget', $typebudgets, '1', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('compte_id', 'Compte:') !!}
	{!! Form::select('compte_id', $comptes, '1', ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('valeur', 'Valeur:') !!}
	{!! Form::number('valeur', null, ['class' => 'form-control']) !!}
</div>