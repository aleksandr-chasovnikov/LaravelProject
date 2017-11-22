@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="admin-panel">
                <ul>
                    <li><a class="link" href="{{route('articleCreate')}}">Создать новую статью</a></li>
                    <br/>
                    <li><a class="link" href="{{route('commentIndex')}}">Все комментарии</a></li>
                    <li><a class="link" href="{{route('categoryIndex')}}">Все категории</a></li>
                    <li><a class="link" href="{{route('tagIndex')}}">Все теги</a></li>
                    <br/>
                </ul>

                @yield('inner_content')

            </div>

        </div>
    </section>

@endsection