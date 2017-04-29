@extends('admin.layouts.master')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="heading">{{ $user->name }} - {{ $user->neptun }} -- <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h1>
        </div>
    </div>
    <p>Biztosan adminná teszed ezt a felhasználót??</p>
    <form action="{{ route('admin:user:storeAdmin', $user->id) }}" method="post">
        {{ csrf_field() }}
        <button class="button is-primary">Igen</button>
        <a href="{{ route('admin:user:get', $user->id) }}" class="button">Nem</a>
    </form>
@endsection