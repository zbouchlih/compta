@extends('tempLogin')

@section('content')

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
                    <form role="form" method="POST" action="{{ url('password/reset') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">
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
                        <div class="input-control password full-size" data-role="input">
                            <label for="password">Mot de passe : </label>
                           <input type="password" class="form-control" name="password">
                            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
                        <br />
                        <br />
                        <div class="input-control password full-size" data-role="input">
                            <label for="password_confirmation">Confirmation du Mot de passe : </label>
                           <input type="password" class="form-control" name="password_confirmation">
                            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>

                        <br />
                        <br />
                        <div class="form-actions">
                           <button type="submit" class="button button-cadi-brown">Réinitialiser</button>
                        </div>
                      
                    </form>
@stop