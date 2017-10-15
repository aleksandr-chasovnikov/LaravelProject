@extends('layouts.app')

@section('content')

    <?php//Тестовые данные
    $faker = Faker\Factory::create('en_US');?>

    <div class="blog">
        <!-- container -->
        <div class="container">

            @if (!empty($article))

                <h3 class="tittle">{{ $article->title }}</h3>
                <div class="col-md-8 blog-top-left-grid">
                    <div class="left-blog left-single">
                        <div class="blog-left">
                            <div class="single-left-left wow fadeInRight animated animated"
                                 data-wow-delay=".5s">
                                <p>Статья от <a href="#">{{ $article->user->name }}</a>
                                    &nbsp;&nbsp; {{$article->created_at}} &nbsp;&nbsp;
                                    <a href="#comments">
                                        (Комментариев: {{ $article->comment()->count() }} )
                                    </a>
                                </p>
                                <img src="" alt="image"/>
                            </div>

                            <!-- foreach -->

                            <div class="blog-left-bottom wow fadeInRight animated animated"
                                 data-wow-delay=".5s">
                                <p>
                                    {{ $article->content }}
                                </p>
                            </div>

                            <!-- end foreach -->

                        </div>
                        <div class="response">

                            @if(!empty($comments))
                                <h3 class="wow fadeInRight animated animated" data-wow-delay=".5s">
                                    <a
                                            name="comments">Комментарии</a></h3>
                                @foreach($comments as $comment)

                                    <div class="media response-info">
                                        <div class="media-left response-text-left wow fadeInRight animated animated"
                                             data-wow-delay=".5s">
                                            <img width="50" class="media-object" src="

{{--@if (!empty($comment->user->image))
{{$comment->user->image}}
@else
'/no-image.png'
@endif--}}

                                                    " alt="image">

                                            <h5>{{$comment->user->name}}</h5>
                                        </div>

                                        <div class="media-body response-text-right">
                                            <p class="wow fadeInRight animated animated"
                                               data-wow-delay=".5s">{{$comment->text}}></p>
                                            <ul class="wow fadeInRight animated animated"
                                                data-wow-delay=".5s">
                                                <li>{{$comment->created_at}}</li>

                                            @if(Auth::guest())

                                                <!-- <li><a href="#com">Ответить</a></li> -->

                                                    @if ((Auth::check()) && ((Auth::user()->email) === $comment->user->email	|| isAdmin()))
                                                        <form action="{{ route('commentDelete', ['comment'=>$comment->id]) }}"
                                                              method="post">
                                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                            {{method_field('DELETE')}}
                                                            {{csrf_field()}}
                                                            <button type="submit"
                                                                    class="btn btn-danger">Удалить
                                                            </button>
                                                        </form>
                                                    @endif
                                            </ul>


                                            <!-- end foreach -->

                                            <!-- 			<div class="media response-info">
                                            <div class="media-left response-text-left wow fadeInRight animated animated" data-wow-delay=".5s">
                                            <a href="#">
                                            <img class="media-object" src="GoEasyOn/images/t2.jpg" alt="">
                                            </a>
                                            <h5><a href="#">Admin</a></h5>
                                            </div>
                                            <div class="media-body response-text-right wow fadeInRight animated animated" data-wow-delay=".5s">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <ul>
                                            <li>Mar 28,2016</li>
                                            <li><a href="single.html">Ответить</a></li>
                                            </ul>
                                            </div>
                                            <div class="clearfix"> </div>
                                            </div> -->

                                            <!-- end foreach -->

                                        </div>

                                        <div class="clearfix"></div>
                                    </div>

                                    @endif
                                @endforeach
                            @endif
                        </div>

                        @if( Auth::guest())

                            <div class="opinion">
                                <h3 class="wow fadeInRight animated animated" data-wow-delay=".5s">
                                    <a
                                            name="com">Оставьте свой комментарий</a></h3>

                                {{--@if( Yii::$app->session->getFlash('comment') )--}}
                                {{--<div class="alert alert-success" role="alert">--}}
                                {{--<?= Yii::$app->session->getFlash('comment') ?>--}}
                                {{--</div>--}}
                                {{--@endif--}}

                                <form action="{{ route('commentStore') }}"
                                      class="wow fadeInRight animated animated" method="post"
                                      role="form">
                                    <h3>Добавить комментарий</h3>

                                    <input type="hidden" name="article_id"
                                           value="{{ $article->id }}">
                                    <textarea name="comm" id="comm" rows="4" class="form-control"
                                              placeholder="Введите свой комментарий"
                                              required></textarea>

                                    @if(Auth::check())
                                        <input type="hidden" name="user_email"
                                               value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="user_name"
                                               value="{{ Auth::user()->name }}">
                                    @else
                                        <input class="form-control" name="user_email" type="email"
                                               placeholder="E-mail (обязательно)" required>
                                        <input class="form-control" name="user_name" type="text"
                                               placeholder="Имя (обязательно)" required>
                                    @endif
                                    {{ csrf_field() }}

                                    <button class="btn btn-default" type="submit">Отправить
                                        комментарий
                                    </button>
                                </form>

                            </div>

                    </div>
                </div>

                @if (Auth::check() && isAdmin())
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">Загрузить файл</label>
                            <div class="col-md-6">
                                <input name="id" type="hidden" class="form-control"
                                       value="{{$article->id}}">
                                <input id="file" type="file" class="form-control" name="file" required>
                                <button type="submit" class="btn btn-info">Загрузить</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">Удалить изображение</label>
                            <div class="col-md-6">
                                <input name="id" type="hidden" class="form-control"
                                       value="{{$article->id}}">
                                <button type="submit" class="btn btn-info">Удалить</button>
                            </div>
                        </div>
                    </form>
                @endif
            @endif

            <div class="col-md-4 blog-top-right-grid">
                <div class="categories">
                    <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                        Категории</h3>
                    <ul>

                        @if (!empty($categories))
                            @foreach($categories as $category): ?>

                            <li class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                                <a href="{{ route('articleByCategory') }}">{{$category->title}}</a>
                                <span class="post-count pull-right">({{$category->articles->count()}}
                                    )</span>
                            </li>

                            @endforeach
                        @endif

                    </ul>
                </div>
                <div class="comments">
                    <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Популярные
                        статьи</h3>

                    {{--@foreach($popular as $article)--}}

                    {{--<div class="comments-text wow fadeInLeft animated animated"--}}
                    {{--data-wow-delay=".5s">--}}
                    {{--<div class="col-md-3 comments-left">--}}
                    {{--<a href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">--}}
                    {{--<img src="<?= (new Article)->getImage($article->image); ?>"--}}
                    {{--alt="image"/>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9 comments-right">--}}
                    {{--<a href="<?= Url::toRoute([--}}
                    {{--'site/view',--}}
                    {{--'id' => $article->id--}}
                    {{--]) ?>"><?= $article->title ?></a>--}}
                    {{--<p><?= (new Article)->getDate($article->date) ?></p>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                    {{--@endforeach--}}

                </div>
                <div class="comments">
                    <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Последние
                        статьи</h3>

                    {{--<?php foreach($recent as $article): ?>--}}

                    {{--<div class="comments-text wow fadeInLeft animated animated"--}}
                    {{--data-wow-delay=".5s">--}}
                    {{--<div class="col-md-3 comments-left">--}}
                    {{--<a href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">--}}
                    {{--<img src="<?= (new Article)->getImage($article->image); ?>"--}}
                    {{--alt="image"/>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9 comments-right">--}}
                    {{--<a href="<?= Url::toRoute([--}}
                    {{--'site/view',--}}
                    {{--'id' => $article->id--}}
                    {{--]) ?>"><?= $article->title ?></a>--}}
                    {{--<p><?= (new Article)->getDate($article->date) ?></p>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                    {{--<?php endforeach; ?>--}}

                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //container -->
    <!-- //blog -->
    <!--//end-inner-content-->

@endsection


