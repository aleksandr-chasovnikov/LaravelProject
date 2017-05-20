@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Привет!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, natus.</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Узнать больше &raquo;</a></p>
	</div>
</div>

@if(!empty($category))
@foreach($category as $cat)
<div class="container">
	<div class="row">
		<h4>Категория &#8194;&#8658;&#8194; {{$cat->name_category}}</h4>
	</div>
</div>
@endforeach
@endif

<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="content">

			@foreach($articles as $article)

			<h2>{{ $article->title }}</h2>
			<p>{{ $article->description }}</p>
			<p><a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>
			<hr>

			@endforeach

			<div class="paginate container">
				{{ $articles->links() }}
			</div>		
		</div>



	</div>
</div>
<div class="categories">				
	<h3>Категории</h3>
	<ul class="panel-menu-wrap">
		@foreach($categories as $category)
		<li>
			<a href="{{ route('articleByCategory',['categoryId' => $category->id]) }}" class="btn btn-menu">{{ $category->name_category }}</a>
		</li>
		@endforeach
	</ul>   
</div>

@endsection


