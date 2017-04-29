@extends('admin.layouts.master')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="heading">{{ $excersise->name }}</h1>
        </div>
        <div class="column">
            <span class="field has-addons">
                <div class="control">
                    <a class="button is-small is-primary" href="{{ route('admin:excersise:edit', $excersise->id) }}"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="control">
                    <a class="button is-small is-danger" href="{{ route('admin:excersise:delete', $excersise->id) }}"><i class="fa fa-trash"></i></a>
                </div>
            </span>

        </div>
    </div>
    <div class="columns">
        <div class="column">
            <span><strong>Csoport:&nbsp;</strong></span>
            <span>{{ $excersise->group->name }}</span>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <p><strong>Feladat:</strong></p>
            <p>{{ $excersise->excersise }}</p>
        </div>
    </div>
@endsection