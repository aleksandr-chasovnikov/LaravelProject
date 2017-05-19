@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">          
            <h4>Добрый день, администратор!</h4>
            <ul>
                <li><a href="{{route('articleCreate')}}">Добавить новую статью</a></li>
                <li><a href="{{route('categoryIndex')}}">Управление категориями</a></li>
                <li><a href="{{route('commentIndex')}}">Управление комментариями</a></li>
            </ul>            
        </div>
        <div class="row">

            @foreach($articles as $article)

            <div class="col-md-4">
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->description }}</p>
                <p><a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>

                <a class="btn btn-warning" href="{{ route('articleUpdate',['id'=>$article->id]) }}" role="button">Редактировать</a>
                
                <br>            
                <form action="{{ route('articleDelete', ['article'=>$article->id]) }}" method="post">
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>       

            </div>

            @endforeach

        </div>

    </div>
</section>

@endsection