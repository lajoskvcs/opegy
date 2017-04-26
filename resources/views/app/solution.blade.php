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
            {{csrf_field()}}
            <div class="field">
                <label class="label">Message</label>
                <p class="control">
                    <textarea class="textarea" name="solution" placeholder="Textarea"></textarea>
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
        <article class="message is-info">
            <div class="message-header">
                <p>Megjegyzés</p>
            </div>
            <div class="message-body">
                {{ $excersise->userSolution()->comment }}
            </div>
        </article>

    </section>
    @endif
@endsection