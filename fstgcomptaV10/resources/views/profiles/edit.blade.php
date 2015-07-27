@extends('template')

@section('content')
@if(in_array(5,Session::get('right_session')) )
    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier profil</div>
            <div class="panel-body">
   				 {!! Form::model($profile, ['route' => ['profiles.update', $profile->id], 'method' => 'patch']) !!}

       
<div class="form-group col-md-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-6">
    {!! Form::label('idRole', 'Role:') !!}
    {!! Form::select('idRole',$roles, $profile->idRole, ['class' => 'form-control']) !!}
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
     @else
        <div style="margin-left: 300px">
            <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
        </div>

    @endif
@endsection
