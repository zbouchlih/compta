
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
	{!! Form::select('idTypebudget', $typebudgets, '1', ['class' => 'form-control Type_budget']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('compte_id', 'Compte:') !!}
	{!! Form::select('compte_id', $comptes, '1', ['class' => 'form-control type_Compte']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('credit_ouvert', 'Crédit ouvert:') !!}
    {!! Form::number('credit_ouvert', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('engagement', 'Engagement:') !!}
    {!! Form::number('engagement', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('paiement', 'Paiement:') !!}
    {!! Form::number('paiement', null, ['class' => 'form-control']) !!}
</div>