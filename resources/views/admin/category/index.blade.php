@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="admin-panel">
            <table class="admin-panel">

            @foreach($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->deleted_at }}</td>
                    <td><a class="btn btn-warning" href="{{ route('categoryEdit',['id'=>$category->id]) }}"
                           role="button">Редактировать</a></td>
                    <td>
                        <form action="{{ route('categoryDelete', ['category'=>$category->id]) }}" method="post">
                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                    <td><a class="btn btn-success" href="{{ route('categoryRestore',['id'=>$category->id]) }}"
                           role="button">Восстановить</a></td>
                </tr>

            @endforeach

            </table>

        </div>

    </div>
</section>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

@endsection