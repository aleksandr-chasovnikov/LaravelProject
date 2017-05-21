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

@if ((Auth::check()) && ((Auth::user()->email) == $comment->user_email	|| (Auth::user()->role) == 'admin'))
			<form action="{{ route('commentDelete', ['comment'=>$comment->id]) }}" method="post">
				<!-- <input type="hidden" name="_method" value="DELETE"> -->
				{{method_field('DELETE')}}
				{{csrf_field()}}
				<button type="submit" class="btn btn-danger">Удалить</button>
			</form>
		@endif 
			<hr>
		</div>
		
		@endforeach

		<form action="{{ route('commentStore') }}" class="content" method="post" role="form">
			<h3>Добавить комментарий</h3>

			<input type="hidden" name="article_id" value="{{$article->id}}">
			<textarea name="comm" id="comm" rows="4" class="form-control" placeholder="Введите свой комментарий" required></textarea>
			
			@if(Auth::check())
			<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
			<input type="hidden"  name="user_name" value="{{ Auth::user()->name }}">
			@else
			<input class="form-control" name="user_email" type="email" placeholder="E-mail (обязательно)">
			<input class="form-control" name="user_name" type="text" placeholder="Имя (обязательно)">
			@endif
			{{ csrf_field() }}

			<button class="btn btn-default" type="submit">Отправить комментарий</button>
		</form>

		@endif

	</div>
</div>

	@endsection


