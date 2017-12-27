@extends('student.base')
@section('view')
	
		<div id="Slider">
			<img src="{{ asset('storage/files/Images/15-Most-Well-Funded-Startups-Japan-Feature-Image.png') }}" alt="" width="100%" height="350px">
		</div>
		<div id="Free_Course">
			<h3 class="title">Free Course - Join Now</h3>
			<div class="row">
			<div class="col1"></div>
			<div class="col2 element">
				<img src="{{ asset('storage/files/Images/konnichiwa.jpg') }}" alt="" width="90%" height="250px">
				<p>Japanese for beginer</p>
			</div>
			<div class="col1"></div>
			<div class="col2 element">
				<img src="{{ asset('storage/files/Images/konnichiwa.jpg') }}" alt="" width="90%" height="250px">
				<p>Japanese Alphabet</p>
			</div>
			<div class="col1"></div>
			<div class="col2 element">
				<img src="{{ asset('storage/files/Images/konnichiwa.jpg') }}" alt="" width="90%" height="250px">
				<p>Japanese Kanji</p>
			</div>
			<div class="col1"></div>
			</div>
		</div>
		<div id="Jobs">
			<h3 class="title">Are you ready for job ?</h3>
			<div class="row" height="450px">
				<div class="col5">
					<img src="{{ asset('storage/files/Images/japanese-job-hunters.jpg') }}" alt="" width="90%" height="90%">
				</div>
				<div class="col5 content" >
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae ipsum ut urna posuere porttitor vitae elementum est. Vivamus molestie eros eget nibh scelerisque, a sollicitudin elit sodales. Nam sed ipsum est. Vestibulum vehicula odio a tincidunt aliquet. Sed maximus efficitur molestie. Aliquam malesuada vehicula arcu id tincidunt. Sed dictum eros quam, id tristique elit pellentesque et. Morbi cursus porta elementum. Sed porta facilisis risus eget tempus. Nulla imperdiet mi id neque ullamcorper, id ultricies sapien eleifend.
				</div>
			</div>
		</div>
		<div id="Partner">
			<div class="row">
				<div class="col2">
					<img src="{{ asset('storage/files/Images/japan-foundation-logo.jpg') }}" alt="" width="90%">
				</div>
				<div class="col2">
					<img src="{{ asset('storage/files/Images/Sakura Center .jpeg') }}" alt="" width="90%">
				</div>
				<div class="col2"></div>
				<div class="col2"></div>
			</div>
		</div>
@endsection 