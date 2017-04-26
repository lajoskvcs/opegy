@extends('layouts.static')

@section('content')
    <section class="hero is-fullheight is-light">
        <div class="hero-head">
            <nav class="nav has-shadow">
                <div class="container">
                    <div class="nav-left">

                        <a class="nav-item is-tab" href="/">
                            <span class="icon is-small">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span>Vissza</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h1 class="title">
                            Regisztráció
                        </h1>
                    </div>
                    <div class="column">
                        <form action="/register" method="post">
                            {{ csrf_field() }}
                            <div class="field">
                                <label class="label">Név</label>
                                <p class="control has-icons-left{{ $errors->has('name') ? ' has-icons-right' : '' }}">
                                    <input name="name" class="input{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="Teljes név">
                                    <span class="icon is-small is-left">
                                      <i class="fa fa-user"></i>
                                    </span>
                                    @if($errors->has('name'))
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Neptun-kód</label>
                                <p class="control has-icons-left{{ $errors->has('neptun') ? ' has-icons-right' : '' }}">
                                    <input name="neptun" class="input{{ $errors->has('neptun') ? ' has-error' : '' }}" type="text" placeholder="Neptun-kód" maxlength="6">
                                    <span class="icon is-small is-left">
                                      <i class="fa fa-hashtag"></i>
                                    </span>
                                    @if($errors->has('neptun'))
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if($errors->has('neptun'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('neptun') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">E-mail</label>
                                <p class="control has-icons-left{{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                    <input name="email" class="input{{ $errors->has('email') ? ' has-error' : '' }}" type="email" placeholder="E-mail cím">
                                    <span class="icon is-small is-left">
                                      <i class="fa fa-envelope"></i>
                                    </span>
                                    @if($errors->has('email'))
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if($errors->has('email'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Jelszó</label>
                                <p class="control has-icons-left{{ $errors->has('password') ? ' has-icons-right' : '' }}">
                                    <input name="password" class="input{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="Jelszó">
                                    <span class="icon is-small is-left">
                                      <i class="fa fa-lock"></i>
                                    </span>
                                    @if($errors->has('password'))
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if($errors->has('password'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="field is-grouped">
                                <p class="control">
                                    <button class="button is-primary">Regisztráció</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection