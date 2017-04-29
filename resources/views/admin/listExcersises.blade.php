@extends('admin.layouts.master')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>Csoport</th>
            <th>Leírás röviden</th>
            <th></th>
        </tr>
        @foreach($excersises as $excersise)
        <tr>
            <td>{{ $excersise->id }}</td>
            <td>{{ $excersise->name }}</td>
            <td>{{ $excersise->group->name }}</td>
            <td>{{ substr($excersise->excersise, 0, 15) }}...</td>
            <td>
                <div class="field has-addons">
                    <div class="control">
                        <a class="button is-small is-primary" href="{{ route('admin:excersise:edit', $excersise->id) }}"><i class="fa fa-pencil"></i></a>
                    </div>
                    <div class="control">
                        <a class="button is-small is-info" href="{{ route('admin:excersise:get', $excersise->id) }}"><i class="fa fa-eye"></i></a>
                    </div>
                    <div class="control">
                        <a class="button is-small is-danger" href="{{ route('admin:excersise:delete', $excersise->id) }}"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
@endsection