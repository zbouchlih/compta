<!--- Name Field --->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Role Field --->
<div class="form-group col-md-6">
	{!! Form::label('access', 'Role:') !!}
	{!! Form::select('access', array('0' => 'Administrateur', '1' => 'Administrateur-adjoint', '2' => 'Responsable', '3' => 'Consultation','4' => 'Aucun'), '4', ['class' => 'form-control']) !!}
</div>

