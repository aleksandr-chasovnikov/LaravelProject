@extends('layouts.default')

@section('content')

<div class="container">
	<div class="row">
		<p> Здавствуйте, меня зовут Александр Часовников. Я начинающий веб-разработчик. Этот сайт создан мной в показательных и учебных целях, и не содержит уникальной информации. Вся информация взята из официальных документаций на соответствующих сайтах и предназначена для тестирования и представления возможностей данного проета: постраничная навигация, аутентификация, администрирование (можно увидеть только через исходный код на GitHub) и многое другое. <br>Если Вам хочется со мной связаться, то отправьте мне сообщение на <strong>aleksandr.chasovnikov@gmail.com</strong> или используйте форму:
		</p>
		<br />
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">

			@if (empty($success))

					<form action="{{ route('contactMail') }}" id="contact-form" method="POST" class="form-horizontal" role="form">			
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Ваш e-mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('mess') ? ' has-error' : '' }}">
							<label for="mess" class="col-md-4 control-label">Сообщение</label>

							<div class="col-md-6">
								<textarea name="message" id="mess" rows="10" required> {{ old('email') }} </textarea>

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
			@endif

				</div>
			</div>
		</div>
	</div>
</div>

@endsection