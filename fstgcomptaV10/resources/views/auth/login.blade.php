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
                    <form role="form" method="POST" action="{{ url('auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h1 class="text-light">Se connecter</h1>
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
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se rappeler de moi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="form-actions">
                           <button type="submit" class="button button-cadi-brown">Connexion</button>
                           <a href="{{ url('/password/email') }}">Mot de passe oublié?</a>
                        </div>
                      
                    </form>
@stop
