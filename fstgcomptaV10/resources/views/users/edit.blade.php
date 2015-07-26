@extends('template')

@section('content')
    @if(in_array(2,Session::get('right_session')) )

                    @include('common.errors')
                <div class="panel panel-default panel-model">
                    <div class="panel-heading">Modifier utilisateur</div>
                        <div class="panel-body">
                             {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            <div class="form-group col-md-6">
                {!! Form::label('firstName', 'Prénom:') !!}
                {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('lastName', 'Nom:') !!}
                {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('email', 'Email principal:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('email2', 'Email secondaire:') !!}
                {!! Form::text('email2', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('tel', 'Téléphone:') !!}
                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('idProfile', 'Profil:') !!}
                {!! Form::select('idProfile',$profiles, $user->idProfile, ['class' => 'form-control']) !!}
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