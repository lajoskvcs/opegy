@extends('app.layouts.master')

@section('content')
    <nav class="nav">
        <div class="nav-left nav-menu">
            <a href="{{ route('excersise:index') }}" class="nav-item is-tab {{ Route::currentRouteName() == 'excersise:index' ? 'is-active' : null }}">Összes feladat</a>
            <a href="{{ route('excersise:waiting') }}" class="nav-item is-tab {{ Route::currentRouteName() == 'excersise:waiting' ? 'is-active' : null }}">Visszajelzésre váró feladatok</a>
            <a href="{{ route('excersise:notsolved') }}" class="nav-item is-tab {{ Route::currentRouteName() == 'excersise:notsolved' ? 'is-active' : null }}">Nem megoldott feladatok</a>
            <a href="{{ route('excersise:notgood') }}" class="nav-item is-tab {{ Route::currentRouteName() == 'excersise:notgood' ? 'is-active' : null }}">Helytelen feladatok</a>
            <a href="{{ route('excersise:solved') }}" class="nav-item is-tab {{ Route::currentRouteName() == 'excersise:solved' ? 'is-active' : null }}">Megoldott feladatok</a>
        </div>
    </nav>

        <div class="heading">

        </div>

        @if($excersises->isNotEmpty())
        <div class="columns is-multiline">
            @foreach($excersises as $excersise)
                <div class="column is-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                {{ $excersise->name }}
                            </p>

                            @if($excersise->userSolution())
                                <span class="card-header-icon">
                                    @if($excersise->userSolution()->is_good == 0)
                                        <i class="fa fa-question"></i>
                                    @elseif($excersise->userSolution()->is_good == 2)
                                        <i class="fa fa-warning"></i>
                                    @else
                                        <i class="fa fa-check"></i>
                                    @endif

                                </span>
                            @endif
                        </header>
                        <div class="card-content">
                            <div class="content">
                                {{$excersise->excersise}}
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('solution',$excersise->id) }}" class="card-footer-item">Megnyit</a>
                            @if($excersise->userSolution())
                                <span class="card-footer-item">
                                    <i style="margin-right: 3px;" class="fa fa-comment{{ ($excersise->userSolution()->comments()->where('user_id','!=', Auth::user()->id)->count() == 0)?'-o':'' }} is-small"></i>
                                    <p class="help">{{ ($excersise->userSolution()->comments()->where('user_id','!=', Auth::user()->id)->count() == 0)?'Nincs':'Van' }} megjegyzés</p>
                                </span>
                            @endif
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            Nincsennek ilyen feladatok.
        @endif
@endsection