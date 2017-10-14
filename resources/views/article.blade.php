@extends('layouts.app')

@section('content')


	<div class="col-md-8 blog-top-left-grid">
		<div class="left-blog left-single">
			<div class="blog-left">
				<div class="single-left-left wow fadeInRight animated animated" data-wow-delay=".5s">
					<p>Posted By <a href="#">Admin</a> &nbsp;&nbsp; on Mar 2, 2016 &nbsp;&nbsp; <a href="#">Comments (10)</a></p>
					<img src="images/b1.jpg" alt="" />
				</div>
				<div class="blog-left-bottom wow fadeInRight animated animated" data-wow-delay=".5s">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed blandit massa vel mauris sollicitudin
						dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim. Phasellus
						fringilla hendrerit lectus nec vehicula. ultrices tellus eget ipsum ornare consectetur adipiscing elit.Sed blandit .
					</p>
				</div>
			</div>
			<div class="response">
				<h3 class="wow fadeInRight animated animated" data-wow-delay=".5s">Responses</h3>
				<div class="media response-info">
					<div class="media-left response-text-left wow fadeInRight animated animated" data-wow-delay=".5s">
						<a href="#">
							<img class="media-object" src="images/t1.jpg" alt="">
						</a>
						<h5><a href="#">Admin</a></h5>
					</div>
					<div class="media-body response-text-right">
						<p class="wow fadeInRight animated animated" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="wow fadeInRight animated animated" data-wow-delay=".5s">
							<li>Mar 24,2016</li>
							<li><a href="single.html">Reply</a></li>
						</ul>
						<div class="media response-info">
							<div class="media-left response-text-left wow fadeInRight animated animated" data-wow-delay=".5s">
								<a href="#">
									<img class="media-object" src="images/t2.jpg" alt="">
								</a>
								<h5><a href="#">Admin</a></h5>
							</div>
							<div class="media-body response-text-right wow fadeInRight animated animated" data-wow-delay=".5s">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<ul>
									<li>Mar 28,2016</li>
									<li><a href="single.html">Reply</a></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="media response-info">
					<div class="media-left response-text-left wow fadeInRight animated animated" data-wow-delay=".5s">
						<a href="#">
							<img class="media-object" src="images/t3.jpg" alt="">
						</a>
						<h5><a href="#">Admin</a></h5>
					</div>
					<div class="media-body response-text-right wow fadeInRight animated animated" data-wow-delay=".5s">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul>
							<li>Mar 21,2016</li>
							<li><a href="single.html">Reply</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="opinion">
				<h3 class="wow fadeInRight animated animated" data-wow-delay=".5s">Leave your comment</h3>
				<form class="wow fadeInRight animated animated" data-wow-delay=".5s">
					<input type="text" placeholder="Name" required="">
					<input type="text" placeholder="Email" required="">
					<textarea placeholder="Message" required=""></textarea>
					<input type="submit" value="SEND">
				</form>
			</div>
		</div>
	</div>

		@endsection


