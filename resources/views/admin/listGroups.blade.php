@extends('admin.layouts.master')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th><a href="{{ route('admin:group:add') }}" class="button is-small"><i class="fa fa-plus"></i></a></th>
        </tr>
        @foreach($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                <td>
                    <div class="field has-addons">
                        <div class="control">
                            <a class="button is-small is-primary" href="{{ route('admin:group:edit', $group->id) }}"><i class="fa fa-pencil"></i></a>
                        </div>
                        @if($group->excersises->isEmpty())
                        <div class="control">
                            <a class="button is-small is-danger" href="{{ route('admin:group:delete', $group->id) }}"><i class="fa fa-trash"></i></a>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection