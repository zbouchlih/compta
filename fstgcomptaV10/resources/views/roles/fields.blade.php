
<div class="form-group col-md-6">
    {!! Form::label('role', 'Role:') !!}
	{!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
	
	@foreach($rights as $right)

    {!! Form::checkbox('rights[]', $right->id, false) !!}
    {!! Form::label('droit', $right->right) !!}
	</br>
	@endforeach
	
</div>



