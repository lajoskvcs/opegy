@extends('app.layouts.master')

@section('content')
    <div class="heading">

    </div>

    @if($excersises->isNotEmpty())
        <div class="columns is-multiline">
            @foreach($excersises as $excersise)
                <div class="column is-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                {{ $excersise->name }}
                            </p>

                            @if($excersise->userSolution())
                                <span class="card-header-icon">
                                    @if($excersise->userSolution()->is_good == 0)
                                        <i class="fa fa-question"></i>
                                    @elseif($excersise->userSolution()->is_good == 2)
                                        <i class="fa fa-warning"></i>
                                    @else
                                        <i class="fa fa-check"></i>
                                    @endif

                                </span>
                            @endif
                        </header>
                        <div class="card-content">
                            <div class="content">
                                {{$excersise->excersise}}
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('solution',$excersise->id) }}" class="card-footer-item">Megnyit</a>
                            @if($excersise->userSolution())
                                <span class="card-footer-item">
                                    <i style="margin-right: 3px;" class="fa fa-comment{{ ($excersise->userSolution()->comment == "")?'-o':'' }} is-small"></i>
                                    <p class="help">{{ ($excersise->userSolution()->comment == "")?'Nincs':'Van' }} megjegyzés</p>
                                </span>
                            @endif
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        Nincsennek ilyen feladatok.
    @endif
@endsection