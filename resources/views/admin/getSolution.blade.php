@extends('admin.layouts.master')

@section('content')
    <article class="media">
        <figure class="media-left">
            <p class="image is-64x64">
                <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $solution->user->email ) ) ) }}">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong>{{ $solution->user->name }}</strong> <small>{{ $solution->user->neptun }}</small> <small>{{ $solution->created_on }}</small>
                    <span class="tag is-black">
                        @if($solution->is_good == 0)
                            Várakozik
                        @elseif($solution->is_good == 1)
                            Elfogadva
                        @else
                            Megtagadva
                        @endif
                    </span>
                    <br>
                    <b>{{ $solution->excersise->excersise }}</b>
                <p>{{ $solution->solution }}</p>
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                        <a class="level-item" href="{{ route('admin:markSolved', $solution->id) }}">
                            Elfogadás
                        </a>
                        <a class="level-item" href="{{ route('admin:markBad', $solution->id) }}">
                            Hibás
                        </a>
                </div>
            </nav>
        </div>
    </article>
    <br>
    <div class="heading">
        <h1>Kommentek</h1>
    </div>
    @foreach($solution->comments as $comment)
        <article class="media" style="{{ ($comment->resolved)? 'background: lightgrey;' : null }}">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $comment->user->email ) ) ) }}">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{ $comment->user->name }}</strong> <small>{{ $comment->user->neptun }}</small>
                        @if(!$comment->resolved)
                            <a href="{{ route('admin:comment:edit', $comment->id) }}">
                                <small class="is-small">Szerkesztés</small>
                            </a>
                        @endif
                        <br>
                        {{ $comment->comment }}
                    </p>
                </div>
            </div>
            @if($comment->user_id == Auth::user()->id && !$comment->resolved)
                <div class="media-right">
                    <a href="{{ route('admin:comment:delete',$comment->id) }}" class="delete"></a>
                </div>
            @endif
        </article>
    @endforeach
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) }}">
                </p>
            </figure>
            <div class="media-content">
                <form action="{{ route('admin:comment:store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="solution_id" value="{{ $solution->id }}">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" name="comment"></textarea>
                    </p>
                </div>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <button class="button is-info">Elküldés</button>
                        </div>
                    </div>
                </nav>
                </form>
            </div>
        </article>
@endsection