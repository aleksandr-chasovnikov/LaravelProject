@extends('layouts.app')

@section('content')

    <div id="large-header" class="large-header">
        <canvas id="demo-canvas"></canvas>
        <h1 class="main-title">
            <a class="link link--takiri" href="#iakor">BeOnTopic
                <span class="wow fadeInUp animated animated" data-wow-delay=".5s">Будь в теме! (&copy;)</span>
            </a>
        </h1>

    </div>

    </div>
    <!--/start-inner-content-->
    <!-- blog -->
    <div class="blog">
        <!-- container -->
        <div class="container">


            @if (!empty($category))

                <div class="blog-info wow fadeInDown animated animated" data-wow-delay=".5s">
                    <h2 class="tittle">Категория: {{$category->title}}</h2>
                </div>

            @endif


            <div class="blog-top-grids">
                <div class="col-md-4 blog-top-right-grid">
                    <div class="categories">
                        <h4 class="wow fadeInLeft animated animated" data-wow-delay=".5s"></h4>
                        <br>
                        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                            Категории</h3>
                        <ul>

                            @foreach($categories as $category)

                                <li class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                                    <a href="{{route('articlesByCategory', ['id' => $category->id])}}">{{ $category->title }}</a>
                                    <span class="post-count pull-right">({{ $category->articles->count() }}
                                        )</span>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-md-8 blog-top-left-grid">
                    <div class="left-blog">

                        @unless (empty($articles))
                            @foreach ($articles as $article)

                                <div class="blog-left">

                                    <div class="blog-left-left wow fadeInRight animated animated"
                                         data-wow-delay=".5s">
                                        <p>Статья от <a name="iakor"
                                                        href="">{{$article->user->name}}</a>
                                            &nbsp;&nbsp; {{$article->created_at}} &nbsp;&nbsp;
                                            <a href="#">(Комментариев: {{$article->comments->count()}}
                                                )</a></p>
                                        <a href="{{route('articleShow', ['id' => $article->id])}}"><img
                                                    src="" alt="image"/></a>
                                    </div>

                                    <div class="blog-left-right wow fadeInRight animated animated"
                                         data-wow-delay=".5s">
                                        <a href="{{route('articleShow', ['id' => $article->id])}}">{{$article->title}}</a>
                                        <p>
                                            {{$article->description}}
                                        </p>
                                    </div>

                                    <ul class="text-center pull-right">
                                        <li><i class="fa fa-yey">Количество просмотров&nbsp;&nbsp;
                                            </i>{{(int)$article->viewed}}</li>
                                    </ul>

                                    <div class="clearfix"></div>
                                </div>

                            @endforeach
                    </div>
                    <nav>
                        <ul class="pagination wow fadeInRight animated animated"
                            data-wow-delay=".5s">
                            {{ $articles->links() }}
                        </ul>
                    </nav>

                    @endunless

                    <hr>
                    <hr>
                </div>


                <div class="col-md-4 blog-top-right-grid">
                    <div class="comments">
                        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Популярные
                            статьи</h3>

                        @unless (empty($popular))
                            @foreach($popular as $article)

                                <div class="comments-text wow fadeInLeft animated animated"
                                     data-wow-delay=".5s">
                                    <div class="col-md-3 comments-left">
                                        <a href="<?= Url::toRoute([
                                            'site/view',
                                            'id' => $article->id
                                        ]) ?>">
                                            <img src="<?= $article->getImage(); ?>" alt="image"/>
                                        </a>
                                    </div>
                                    <div class="col-md-9 comments-right">
                                        <a href="<?= Url::toRoute([
                                            'site/view',
                                            'id' => $article->id
                                        ]) ?>"><?= $article->title ?></a>
                                        <p><?= $article->getDate() ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            @endforeach
                        @endunless

                    </div>
                    <div class="comments">
                        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Последние
                            статьи</h3>
                        @unless (empty($recent))
                            @foreach($recent as $article)

                                <div class="comments-text wow fadeInLeft animated animated"
                                     data-wow-delay=".5s">
                                    <div class="col-md-3 comments-left">
                                        <a href="<?= Url::toRoute([
                                            'site/view',
                                            'id' => $article->id
                                        ]) ?>">
                                            <img src="<?= $article->getImage(); ?>" alt="image"/>
                                        </a>
                                    </div>
                                    <div class="col-md-9 comments-right">
                                        <a href="<?= Url::toRoute([
                                            'site/view',
                                            'id' => $article->id
                                        ]) ?>"><?= $article->title ?></a>
                                        <p><?= $article->getDate() ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            @endforeach
                        @endunless

                    </div>
                    <div class="comments">
                        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Облако
                            тегов</h3>
                        @unless (empty($tags))
                            <div class="tags">
                                @foreach($tags as $tag)
                                    <a href="{{ route('articlesByTag') }}">{{ $tag->title }}</a> |
                                @endforeach
                            </div>
                        @endunless

                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //container -->
    </div>
    <!-- //blog -->
    <!--//end-inner-content-->

@endsection


