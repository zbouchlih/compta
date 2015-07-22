<!-- Firstname Field -->
<div class="form-group col-md-6">
    {!! Form::label('firstName', 'Prénom: ') !!}
    {!! $user->firstName !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-md-6">
    {!! Form::label('lastName', 'Nom: ') !!}
    {!! $user->lastName !!}
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email principal: ') !!}
    {!! $user->email !!}
</div>

<!-- Email2 Field -->
<div class="form-group col-md-6">
    {!! Form::label('email2', 'Email secondaire: ') !!}
    {!! $user->email2 !!}
</div>

<!-- Tel Field -->
<div class="form-group col-md-6">
    {!! Form::label('tel', 'Téléphone: ') !!}
    {!! $user->tel !!}
</div>

<!-- Idprofile Field -->
<div class="form-group col-md-6">
    {!! Form::label('idProfile', 'Profil: ') !!}
    {!! $user->name !!}
</div>


