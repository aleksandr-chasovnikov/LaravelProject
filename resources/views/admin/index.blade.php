@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="admin-panel">
            <ul>
                <li><a href="{{route('articleCreate')}}">Создать новую статью</a></li>
                <li><a href="{{route('categoryCreate')}}">Создать новую категорию</a></li>
                {{--<li><a href="{{route('createTag')}}">Создать новый тег</a></li>--}}
                <br>
                {{--<li><a href="{{route('articleAllCategories')}}">Все категории</a></li>--}}
                {{--<li><a href="{{route('articleAllTags')}}">Все теги</a></li>--}}
            </ul>

            @foreach($articles as $article)

                <hr>
                <small class="pull-right">{{$article->created_at}}</small>     
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->description }}</p>
                <p>
                    <a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a>
                    <a class="btn btn-warning" href="{{ route('articleEdit',['id'=>$article->id]) }}" role="button">Редактировать</a>
                </p>                
                <br>            
                <form action="{{ route('articleDelete', ['article'=>$article->id]) }}" method="post">
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form> 

            @endforeach

        </div>

    </div>
</section>

@endsection