@extends('admin.layouts.master')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="heading">{{ $user->name }} - {{ $user->neptun }} -- <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h1>
        </div>
        <div class="column">
            <span class="field has-addons">
                <div class="control">
                    <a class="button is-small is-danger" href="{{ route('admin:user:delete', $user->id) }}"><i class="fa fa-trash"></i></a>
                </div>
            </span>

        </div>
    </div>
    <section>
        <h1 class="heading">Várakozó feladatok</h1>
        @if($user->solutions()->where('is_good',0)->count() != 0)
            @foreach($user->solutions()->where('is_good',0)->get() as $solution)
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $solution->user->email ) ) ) }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $solution->user->name }}</strong> <small>{{ $solution->user->neptun }}</small> <small>{{ $solution->created_at }}</small> <small>-</small> <small>{{ $solution->comments()->count() }}db <i class="fa fa-comment is-small"></i></small>
                                <br>
                                <b>{{ $solution->excersise->excersise }}</b>
                            <p>{{ $solution->solution }}</p>
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item" href="{{ route('admin:getSolution', $solution->id) }}">
                                    Megnyitás
                                </a>
                                @if($solution->is_good === 0)
                                    <a class="level-item" href="{{ route('admin:markSolved', $solution->id) }}">
                                        Elfogadás
                                    </a>
                                    <a class="level-item" href="{{ route('admin:markBad', $solution->id) }}">
                                        Hibás
                                    </a>
                                @endif
                            </div>
                        </nav>
                    </div>
                </article>
            @endforeach
        @else
            <p>Ennek a felhasználónak nincsennek várakozó feladatai!</p>
        @endif
    </section>
    <section>
        <h1 class="heading">Hibás feladatok</h1>
        @if($user->solutions()->where('is_good',2)->count() != 0)
            @foreach($user->solutions()->where('is_good',2)->get() as $solution)
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $solution->user->email ) ) ) }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $solution->user->name }}</strong> <small>{{ $solution->user->neptun }}</small> <small>{{ $solution->created_at }}</small> <small>-</small> <small>{{ $solution->comments()->count() }}db <i class="fa fa-comment is-small"></i></small>
                                <br>
                                <b>{{ $solution->excersise->excersise }}</b>
                            <p>{{ $solution->solution }}</p>
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item" href="{{ route('admin:getSolution', $solution->id) }}">
                                    Megnyitás
                                </a>
                                @if($solution->is_good === 0)
                                    <a class="level-item" href="{{ route('admin:markSolved', $solution->id) }}">
                                        Elfogadás
                                    </a>
                                    <a class="level-item" href="{{ route('admin:markBad', $solution->id) }}">
                                        Hibás
                                    </a>
                                @endif
                            </div>
                        </nav>
                    </div>
                </article>
            @endforeach
        @else
            <p>Ennek a felhasználónak nincsennek hibás feladatai!</p>
        @endif
    </section>
    <section>
        <h1 class="heading">Megoldott feladatok</h1>
        @if($user->solutions()->where('is_good',1)->count() != 0)
            @foreach($user->solutions()->where('is_good',1)->get() as $solution)
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $solution->user->email ) ) ) }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $solution->user->name }}</strong> <small>{{ $solution->user->neptun }}</small> <small>{{ $solution->created_at }}</small> <small>-</small> <small>{{ $solution->comments()->count() }}db <i class="fa fa-comment is-small"></i></small>
                                <br>
                                <b>{{ $solution->excersise->excersise }}</b>
                            <p>{{ $solution->solution }}</p>
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item" href="{{ route('admin:getSolution', $solution->id) }}">
                                    Megnyitás
                                </a>
                                @if($solution->is_good === 0)
                                    <a class="level-item" href="{{ route('admin:markSolved', $solution->id) }}">
                                        Elfogadás
                                    </a>
                                    <a class="level-item" href="{{ route('admin:markBad', $solution->id) }}">
                                        Hibás
                                    </a>
                                @endif
                            </div>
                        </nav>
                    </div>
                </article>
            @endforeach
        @else
            <p>Ennek a felhasználónak nincsennek megodlott feladatai!</p>
        @endif
    </section>
@endsection