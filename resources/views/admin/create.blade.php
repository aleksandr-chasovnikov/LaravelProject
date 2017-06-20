@extends('layouts.default')

@section('content')

<div class="container">
	<div class="row">
		<form action="{{ route('articleStore') }}" method="post" role="form" enctype='multipart/form-data'>
			<h2>Создать статью</h2>
			<br>
			<p>Поля, обозначенные звёздочкой (&#10033;), обязательны для заполнения.</p>
			<br>

			<div class="form-group">
				<label for="title">Заголовок</label>&nbsp;&#10033;
				<input name="title" type="text" class="form-control" id="title" required>
			</div>
			<div class="form-group">
				<label for="alias">Псевдоним</label>&nbsp;&#10033;
				<input name="alias" type="text" class="form-control" id="alias" required>
			</div>
			<div class="form-group">
				<label for="categories_id">Категория</label>&nbsp;&#10033;
				<select name="categories_id" size="3" class="form-control" id="categories_id" required>
				@foreach ($categories as $category)
					<option value="{{$category->id}}">{{$category->name_category}}</option>
				@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="description">Краткое описание</label>&nbsp;&#10033;
				<textarea name="description" type="text" class="form-control" id="description" required></textarea>
			</div>
			<div class="form-group">
				<label for="text">Полный текст</label>&nbsp;&#10033;
				<textarea name="text" class="form-control" id="text" required></textarea>
			</div>
			<div class="form-group">
				<input name="users_id" type="hidden" class="form-control" id="users_id" value="{{Auth::user()->id}}">
			</div>
			<div class="form-group">
				<label for="status">Показывать?</label>
				<select name="status" id="status">
					<option value="1">Да</option>
					<option value="0">Нет</option>
				</select>
			</div>
			<div class="form-group">
				<label for="meta_desc">Мета: описание</label>
				<input name="meta_desc" type="text" class="form-control" id="meta_desc">
			</div>
			<div class="form-group">
				<label for="keywords">Мета: ключевые слова</label>
				<input name="keywords" type="text" class="form-control" id="keywords">
			</div>
		<!-- 	<div class="form-group">
				<label for="created_at">Дата создания</label>
				<input name="created_at" type="text" class="form-control" id="created_at" value="{{date('Y-m-d')}}">
			</div> -->

			<button type="submit" class="btn btn-primary">Сохранить</button>

			{{ csrf_field() }}
		</form>
	</div>
</div>

@endsection