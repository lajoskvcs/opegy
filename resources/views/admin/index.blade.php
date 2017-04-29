@extends('admin.layouts.master')

@section('content')

        <div class="columns">
            <div class="column is-2">
                <aside class="menu">
                    <p class="menu-label">
                        Feladatok
                    </p>
                    <ul class="menu-list">
                        <li><a class="is-active">Várakozó megoldások</a></li>
                        <li><a>Hibás megoldások</a></li>
                        <li><a>Elfogadott megoldások</a></li>
                    </ul>

                </aside>
            </div>
            <div class="column">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( "kovacs.lajos1218@gmail.com" ) ) ) }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Kovács Lajos</strong> <small>M6X07X</small> <small>2017-04-26 18:53</small>
                                <br>
                                <b>Írasd ki az aktuális könyvtár tartalmát.</b>
                                <p>ls -l</p>
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item">
                                    Megnyitás
                                </a>
                                <a class="level-item" href="{{ route('admin:markSolved', 1) }}">
                                    Elfogadás
                                </a>
                                <a class="level-item">
                                    Hibás
                                </a>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
        </div>

@endsection