@extends('layouts.app')
@extends('content')

@section('inner_content')

    @foreach($tags as $tag)

        <hr>
        <h2>{{ $tag->title }}</h2>
        <form action="{{ route('tagUpdate', ['tag'=>$tag->id]) }}" method="post"  role="form">
            <div class="form-group">
                <label for="status">Сделать видимым</label>&nbsp;&#10033;
                <input name="status" type="radio" class="form-control" checked
                       value="true">
            </div>
            <div class="form-group">
                <label for="status">Скрыть</label>&nbsp;&#10033;
                <input name="status" type="radio" class="form-control"
                       value="false">
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-warning">Редактировать</button>
        </form>
        <form action="{{ route('tagDelete', ['tag'=>$tag->id]) }}" method="post">
            <!-- <input type="hidden" name="_method" value="DELETE"> -->
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>

    @endforeach

@endsection