
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
    {!! Form::select('idTypebudget',$typebudgets, '1', ['class' => 'form-control']) !!}

</div>

