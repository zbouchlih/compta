<!--- Firstname Field --->
<div class="form-group col-md-6">
    {!! Form::label('firstName', 'Prénom:') !!}
	{!! Form::text('firstName', null, ['class' => 'form-control' , 'placeholder' => 'Prénom']) !!}
</div>

<!--- Lastname Field --->
<div class="form-group col-md-6">
    {!! Form::label('lastName', 'Nom:') !!}
	{!! Form::text('lastName', null, ['class' => 'form-control' , 'placeholder' => 'Nom']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email principal:') !!}
	{!! Form::text('email', null, ['class' => 'form-control' , 'placeholder' => 'Email principal']) !!}
</div>

<!--- Email2 Field --->
<div class="form-group col-md-6">
    {!! Form::label('email2', 'Email secondaire:') !!}
	{!! Form::text('email2', null, ['class' => 'form-control' , 'placeholder' => 'Email secondaire']) !!}
</div>

<!--- Tel Field --->
<div class="form-group col-md-6">
    {!! Form::label('tel', 'Téléphone:') !!}
	{!! Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone']) !!}
</div>

<!--- Idprofile Field --->
<div class="form-group col-md-6">
    {!! Form::label('idProfile', 'Profil:') !!}
    {!! Form::select('idProfile',$profiles, '17', ['class' => 'form-control']) !!}

</div>

<!--- Password Field --->
<div class="form-group col-md-6">
    {!! Form::label('password', 'Mot de passe:') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('password_confirmation', 'Confirmer votre mot de passe:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
</div>

