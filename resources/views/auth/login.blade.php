@extends('layouts.static')

@section('content')
    <section class="hero is-fullheight is-dark">
        <div class="hero-body">
            <div class="container">

                <div class="columns">
                    <div class="column">
                        <h1 class="title">
                            Operációs rendszerek 1
                        </h1>
                    </div>
                    <div class="column">
                        <form method="post" action="/login">
                            {{ csrf_field() }}
                            <div class="field">
                                <p class="control has-icons-left {{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                    <input name="email" class="input{{ $errors->has('email') ? ' has-error' : '' }}" type="email" placeholder="E-mail">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    @if($errors->has('email'))
                                        <span class="icon is-small is-right">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="field">
                                <p class="control has-icons-left{{ $errors->has('password') ? ' has-icons-right' : '' }}">
                                    <input name="password" class="input{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="Jelszó">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </p>
                                @if($errors->has('password'))
                                    <p class="help is-danger">
                                    @foreach ($errors->get('password') as $error)
                                        <strong>{{ $error }}</strong>
                                    @endforeach
                                    </p>
                                @endif
                            </div>
                            <div class="field">
                                <p class="control">
                                    <input type="submit" class="button is-success" value="Bejelentkezés" />
                                    <a class="button" href="/register">
                                        Regisztráció
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection