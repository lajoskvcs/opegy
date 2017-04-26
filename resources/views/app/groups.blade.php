@extends('app.layouts.master')

@section('content')
    <div class="heading">

    </div>

        <div class="columns is-multiline">
            @foreach($groups as $group)
                <div class="column is-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                {{ $group->name }}
                            </p>
                            <span class="card-header-icon">
                                 {{ $group->excersises()->count()}} db
                            </span>
                        </header>
                        <footer class="card-footer">
                            <a href="{{route('group:group', $group->id) }}" class="card-footer-item">Megnyit</a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
@endsection