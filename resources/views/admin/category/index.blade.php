@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="admin-panel">

            @foreach($categories as $category)

                <br/>
                <h2>{{ $category->title }}</h2>
                <p>
                    <a class="btn btn-warning" href="{{ route('categoryEdit',['id'=>$category->id]) }}" role="button">Редактировать</a>
                </p>
                <form action="{{ route('categoryDelete', ['category'=>$category->id]) }}" method="post">
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>

            @endforeach

        </div>

    </div>
</section>
    <br/>
    <br/>
    <br/>
    <br/>

@endsection