@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                <li><a href="/admin/product">Управление статьями</a></li>
                <li><a href="/admin/category">Управление категориями</a></li>
                <li><a href="#">Управление комментариями</a></li>
            </ul>            
            
        </div>
    <div class="row">

        @foreach($articles as $article)

        <div class="col-md-4">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->description }}</p>
            <p><a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>
            

        </div>

        @endforeach

    </div>

    </div>
</section>

@endsection