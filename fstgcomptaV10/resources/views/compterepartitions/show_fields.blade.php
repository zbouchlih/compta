<!-- Repartition Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('repartition_id', 'Repartition Id:') !!}
    <p>{!! $compterepartition->repartition_id !!}</p>
</div>

<!-- Compte Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('compte_id', 'Compte Id:') !!}
    <p>{!! $compterepartition->compte_id !!}</p>
</div>

<!-- credit_ouvert Field -->
<div class="form-group col-md-6">
    {!! Form::label('credit_ouvert', 'credit_ouvert:') !!}
    <p>{!! $compterepartition->credit_ouvert !!}</p>
</div>

<div class="form-group col-md-6">
    {!! Form::label('engagement', 'engagement:') !!}
    <p>{!! $compterepartition->engagement !!}</p>
</div>

<div class="form-group col-md-6">
    {!! Form::label('paiement', 'paiement:') !!}
    <p>{!! $compterepartition->paiement !!}</p>
</div>

