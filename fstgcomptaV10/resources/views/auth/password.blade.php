
@extends('tempLogin')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Attention!</strong> Veuillez vérifier vos données.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ url('password/email') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h1 class="text-light">Réinitialiser votre mot de passe</h1>
                        <hr class="thin"/>
                        <br />

                        <div class="input-control email full-size" data-role="input">
                            <label for="email">Nom d'utilisateur(Email) : </label>
                            <input type="email" name="email" value="{{ old('email') }}">
                            <button class="button helper-button clear"><span class="mif-cross"></span></button>
                        </div>
                        <br />
                        <br />

                        <div class="form-actions">
                           <button type="submit" class="button button-cadi-brown">Envoyer le lien de réinitialisation</button>
                        </div>

                    </form>
@stop