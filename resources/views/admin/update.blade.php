@extends('layouts.default')

@section('content')

<div class="container">
	<div class="row">
		<form action="{{ route('articlePostUpdate') }}" method="post" role="form">
			<p>Поля, обозначенные звёздочкой (&#10033;), обязательны для заполнения.</p>

			<div class="form-group">
				<label for="id">ID</label>
				<input name="id" type="hidden" class="form-control" value="{{$article->id}}">
				<input name="id" type="numeric" class="form-control" id="id" value="{{$article->id}}" disabled>
			</div>
			<div class="form-group">
				<label for="title">Заголовок</label>&nbsp;&#10033;
				<input name="title" type="text" class="form-control" id="title" value="{{$article->title}}" required>
			</div>
			<div class="form-group">
				<label for="alias">Псевдоним</label>&nbsp;&#10033;
				<input name="alias" type="text" class="form-control" id="alias" value="{{$article->alias}}" required>
			</div>
			<div class="form-group">
				<label for="categories_id">Категория</label>&nbsp;&#10033;
				<select name="categories_id" size="3" class="form-control" id="categories_id" required>
					<option value="1">Категория 1</option>
					<option value="2">Категория 2</option>
					<option value="3">Категория 3</option>
					<option selected value="{{$article->categories_id}}">Категория {{$article->categories_id}}</option>
				</select>
			</div>
			<div class="form-group">
				<label for="description">Краткое описание</label>&nbsp;&#10033;
				<textarea name="description" type="text" rows="4" class="form-control" id="description" required>{{$article->description}}</textarea>
			</div>
			<div class="form-group">
				<label for="text">Полный текст</label>&nbsp;&#10033;
				<textarea name="text" type="text" rows="7" class="form-control" id="text" required>{{$article->text}}</textarea>
			</div>
			<div class="form-group">
				<label for="updated_at">Дата создания</label>
				<input name="updated_at" type="hidden" class="form-control" value="{{date('Y-m-d')}}">
				<input name="updated_at" type="text" class="form-control" id="updated_at" value="{{date('Y-m-d')}}" disabled>
			</div>

			<button type="submit" class="btn btn-primary">Сохранить</button>

			{{ csrf_field() }}
		</form>
	</div>
</div>

@endsection