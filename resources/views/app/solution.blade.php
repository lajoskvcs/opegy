@extends('app.layouts.master')

@section('content')
    <article class="message">
        <div class="message-header">
            <p>{{ $excersise->name }}</p>
        </div>
        <div class="message-body">
            {{$excersise->excersise}}
        </div>
    </article>
    <section>
        <div class="columns">
            <div class="column is-6">
                <table>
                    <tr>
                        <th>Státusz:</th>
                        <td>
                            @if($excersise->userSolution())
                                @if($excersise->userSolution()->first()->is_good == 0)
                                    Jelenleg visszajelzésre vár
                                @endif
                                @if($excersise->userSolution()->first()->is_good == 1)
                                    Helyes a megoldás
                                @endif
                                @if($excersise->userSolution()->first()->is_good == 2)
                                    A megoldás helytelen
                                @endif
                                @else
                                Nincs megoldás beküldve
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <section>

        <form action="" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Message</label>
                <p class="control">
                    <textarea class="textarea" name="solution" placeholder="Textarea">{{ ($excersise->userSolution()) ? $excersise->userSolution()->solution : null }}</textarea>
                </p>
            </div>
            <div class="field is-grouped">
                <p class="control">
                    <input type="submit" class="button is-primary" value="Megoldás beküldése" />
                </p>
            </div>
        </form>
    </section>
    @if($excersise->userSolution())
    <section>
        <br>
        <div class="heading">
            <h1>Kommentek</h1>
        </div>
        @foreach($excersise->userSolution()->comments as $comment)
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
                                <a href="{{ route('app:comment:edit', $comment->id) }}">
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
                        <a href="{{ route('app:comment:delete',$comment->id) }}" class="delete"></a>
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
                <form action="{{ route('app:comment:store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="solution_id" value="{{ $excersise->userSolution()->id }}">
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

    </section>
    @endif
@endsection