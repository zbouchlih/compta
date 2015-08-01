<!-- Idcompterepartiton Field -->
<div class="form-group col-md-6">
    {!! Form::label('idCompterepartition', 'Idcompterepartition:') !!}
    <p>{!! $depense->idCompterepartition !!}</p>
</div>

<!-- Idtypedepense Field -->
<div class="form-group col-md-6">
    {!! Form::label('idTypedepense', 'Idtypedepense:') !!}
    <p>{!! $depense->idTypedepense !!}</p>
</div>

<!-- Valeur Field -->
<div class="form-group col-md-6">
    {!! Form::label('valeur', 'Valeur:') !!}
   
</div>

<div class="form-group col-md-6">
    {!! Form::label('details', 'Détails:') !!}
     <p>{!! $depense->details !!}</p>
</div>