@extends('admin.layouts.master')

@section('content')
    <form method="post" action="{{ route('admin:excersise:store') }}">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Név</label>
            <p class="control">
                <input class="input" type="text" name="name">
            </p>
        </div>

        <div class="field">
            <label class="label">Csoport</label>
            <p class="control">
    <span class="select">
      <select name="group">
          @foreach($groups as $group)
              <option value="{{ $group->id }}">{{ $group->name }}</option>
          @endforeach
      </select>
    </span>
            </p>
        </div>

        <div class="field">
            <label class="label">Feladat</label>
            <p class="control">
                <textarea class="textarea" name="excersise"></textarea>
            </p>
        </div>

        <div class="field is-grouped">
            <p class="control">
                <button class="button is-primary">Hozzáadás</button>
            </p>
        </div>
    </form>
@endsection