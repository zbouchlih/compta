<!--- Name Field --->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Role Field --->
<div class="form-group col-md-6">
	{!! Form::label('idRole', 'Role:') !!}
	{!! Form::select('idRole',$roles, '4', ['class' => 'form-control']) !!}
</div>

