@extends('admin.layouts.master')

@section('content')
    <form method="post" action="{{ route('admin:excersise:update', $excersise->id) }}">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Név</label>
            <p class="control">
                <input class="input" type="text" name="name" value="{{ $excersise->name }}">
            </p>
        </div>

        <div class="field">
            <label class="label">Csoport</label>
            <p class="control">
    <span class="select">
      <select name="group">
          @foreach($groups as $group)
              <option value="{{ $group->id }}" {{ ($excersise->group_id == $group->id)? 'selected="selected"':null }}>{{ $group->name }}</option>
          @endforeach
      </select>
    </span>
            </p>
        </div>

        <div class="field">
            <label class="label">Feladat</label>
            <p class="control">
                <textarea class="textarea" name="excersise">{{ $excersise->excersise }}</textarea>
            </p>
        </div>

        <div class="field is-grouped">
            <p class="control">
                <button class="button is-primary">Mentés</button>
            </p>
            <p class="control">
                <a href="{{ route('admin:excersise:get', $excersise->id) }}" class="button">Mégsem</a>
            </p>
        </div>
    </form>
@endsection