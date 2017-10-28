@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br/>
                <br/>
                <br/>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;Здравствуйте, меня зовут
                            Часовников Александр.
                            Я - автор блога BeOnTopic.
                            Если у вас есть предложения или вопросы, то отправьте мне сообщение на
                            <strong>aleksandr.chasovnikov@gmail.com</strong> или используйте форму:
                        </p>
                        <br/>

                        @if (empty($success))

                            <form action="{{ route('contactMail') }}" id="contact-form"
                                  method="POST" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Ваш
                                        e-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control"
                                               name="email" value="{{ old('email') }}" required
                                               autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('mess') ? ' has-error' : '' }}">
                                    <label for="mess"
                                           class="col-md-4 control-label">Сообщение</label>

                                    <div class="col-md-6">
                                        <textarea name="message" id="mess" rows="10"
                                                  required> {{ old('email') }} </textarea>

                                        @if ($errors->has('mess'))
                                            <span class="help-block">
									<strong>{{ $errors->first('mess') }}</strong>
								</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Отправить
                                        </button>
                                    </div>
                                </div>

                            </form>
                        @else
                            {{ $success }} &nbsp;&nbsp; <a href="/">На главную</a>
                        @endif

                    </div>
                </div>
            </div>
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
    <br/>

@endsection