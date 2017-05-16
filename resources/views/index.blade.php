@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Hello!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, natus.</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
	</div>
</div>

<div class="container">
	<!-- Example row of columns -->
	<div class="row">

		@foreach($articles as $article)

		<div class="col-md-4">
			<h2>{{ $article->title }}</h2>
			<p>{{ $article->description }}</p>
			<p><a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>
			

		</div>

		@endforeach

	</div>

@endsection


