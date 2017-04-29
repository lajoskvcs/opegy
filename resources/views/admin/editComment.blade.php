@extends('admin.layouts.master')

@section('content')
    <form method="post" action="{{ route('admin:comment:update', $comment->id) }}">
        {{ csrf_field() }}
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) }}">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea">{{ $comment->comment }}</textarea>
                    </p>
                </div>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="button is-info">Mentés</a>
                        </div>
                    </div>

                </nav>
            </div>
        </article>
    </form>
@endsection