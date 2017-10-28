@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="admin-panel">
                <ul>
                    <li><a class="link" href="{{route('articleCreate')}}">Создать новую статью</a></li>
                    <li><a class="link" href="{{route('categoryCreate')}}">Создать новую категорию</a></li>
                    <li><a class="link" href="{{route('tagCreate')}}">Создать новый тег</a></li>
                    <br/>
                    <li><a class="link" href="{{route('categoryIndex')}}">Все категории</a></li>
                    <li><a class="link" href="{{route('tagIndex')}}">Все теги</a></li>
                </ul>

                @yield('inner_content')

            </div>

        </div>
    </section>

@endsection