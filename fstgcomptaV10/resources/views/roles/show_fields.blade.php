<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('role', 'Role:') !!}
    <p>{!! $role->role !!}</p>
</div>
<div class="form-group col-md-6">
    {!! Form::label('role', 'Droits:') !!}
    @foreach($role->rights as $right)
    <p>{!! $right->right !!}</p>

	@endforeach
</div>



