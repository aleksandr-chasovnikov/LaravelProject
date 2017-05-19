@extends('layouts.app')

@section('content')

<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		
		@if($article)

		<div class="content">
			<h2>{{ $article->title }}</h2>
			<p>{{ $article->text }}</p>
		</div>
		<hr>

		@foreach($comments as $comment)
		<div class="content">
			<h3>{{ $comment->user_name }}</h3>
			<p>{{ $comment->created_at }}</p>
			<p>{{ $comment->comm }}</p>
			<a class="btn btn-default" href="#" role="button">Ответить</a>
			<hr>
		</div>
		@endforeach

		<form action="{{ route('commentStore') }}" class="content" method="post" role="form">
			<h3>Добавить комментарий</h3>
			<input type="hidden" name="article_id" value="{{$article->id}}">
			<textarea name="comm" id="comm" rows="4" class="form-control"  placeholder="Введите свой комментарий" required></textarea>
			
			@if(Auth::check())
			<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
			<input type="hidden"  name="user_name" value="{{ Auth::user()->name }}">
			@else
			<input class="form-control" name="user_email" type="text" placeholder="E-mail (обязательно)">
			<input class="form-control" name="user_name" type="text" placeholder="Имя (обязательно)">
			@endif
			{{ csrf_field() }}

			<button class="btn btn-default" type="submit">Отправить комментарий</button>
		</form>

		@endif

	</div>

	<div class="container">
		<div class="row">
			<ul class="panel-menu-wrap clearfix">
				@foreach($categories as $category)
				<li>
					<a href="{{ $category->id }}" class="btn btn-menu">{{ $category->name_category }}</a>
				</li>
				@endforeach
			</ul>        
		</div>
	</div>

	@endsection


