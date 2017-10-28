@extends('layouts.app')

@section('content')

    <?php /*$faker = Faker\Factory::create();*/?>

    <div class="container">
        <div class="row">

            @if (!empty($message))
                <div class="alert alert-danger text-center">
                    {{$message}}
                </div>
            @endif

            <form action="{{ route('categoryStore') }}" method="post" role="form"
                  enctype="multipart/form-data">
                <h2>Создать категорию</h2>
                <br>
                <p>Поля, обозначенные звёздочкой (&#10033;), обязательны для заполнения.</p>
                <br>

                <div class="form-group">
                    <label for="title">Название категории</label>&nbsp;&#10033;
                    <input name="title" type="text" class="form-control" id="title" required
                           {{--value="{{$faker->text(50)}}"--}}>
                </div>
                <div class="form-group">
                    <label for="categories_id">Список категорий</label>
                    <select name="categories_id" size="7" class="form-control" id="categories_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Показывать?</label>
                    <select name="status" id="status">
                        <option selected value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
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