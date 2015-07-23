@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier rôle</div>
            <div class="panel-body">
   				 {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

       <div class="form-group col-md-6">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>
        <div class="form-group col-md-6">
     @foreach($rights as $right)
    {!! Form::label('droit', $right->right) !!}
    {!! Form::checkbox('rights[]', $right->id) !!}
    @endforeach
</div>

        
        <div class="col-md-12">
            {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
        </div>

    {!! Form::close() !!}
</div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection