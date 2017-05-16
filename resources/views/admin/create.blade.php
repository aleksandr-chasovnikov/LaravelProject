@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>{{$header}}</h1>
		<p>{{$message}}</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
	</div>
</div>

<div class="container">
	<div class="row">
		<form action="{{ route('articleStore') }}" method="POST" role="form">
			<legend>Form title</legend>

			<div class="form-group">
				<label for="title">Заголовок</label>
				<input name="title" type="text" class="form-control" id="title">
			</div>
			<div class="form-group">
				<label for="alias">Псевдоним</label>
				<input name="alias" type="text" class="form-control" id="alias">
			</div>
			<div class="form-group">
				<label for="description">Краткое описание</label>
				<textarea name="description" type="text" class="form-control" id="description"></textarea>
			</div>
			<div class="form-group">
				<label for="text">Полный текст</label>
				<textarea name="text" type="text" class="form-control" id="text"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>

			{{ csrf_field() }}
		</form>
	</div>
</div>

@endsection