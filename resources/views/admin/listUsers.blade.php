@extends('admin.layouts.master')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>E-mail</th>
            <th>Neptun-kód</th>
            <th>Megoldott feladatok</th>
            <th>Hibás feladatok</th>
            <th>Várakozó feladatok</th>
            <th></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->neptun }}</td>
                <td>{{ $user->solutions()->where('is_good',1)->count() }}</td>
                <td>{{ $user->solutions()->where('is_good',2)->count() }}</td>
                <td>{{ $user->solutions()->where('is_good',0)->count() }}</td>
                <td>
                    <div class="field has-addons">
                        <div class="control">
                            <a class="button is-small is-info" href="{{ route('admin:user:get', $user->id) }}"><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="control">
                            <a class="button is-small is-danger" href="{{ route('admin:user:delete', $user->id) }}"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection