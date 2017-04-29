@extends('admin.layouts.master')

@section('content')

    @foreach($solutions as $solution)
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $solution->user->email ) ) ) }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $solution->user->name }}</strong> <small>{{ $solution->user->neptun }}</small> <small>{{ $solution->created_on }}</small> - <small>{{ $solution->comments()->count() }}db <i class="fa fa-comment is-small"></i></small>
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

@endsection