@extends('master')
@section('title', 'Learn japanese online')
@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/StudentHome.css') }}">
	<div id="container">
		<div id="header" class="row">
			<div class="col2">IkjoElearning</div>
			<div class="col7" id="MenuBar">
				<ul class="row menu">
					<li class="col2">
						<a href="">My Courses</a>
					</li>
					<li class="col2">
						
					</li>
					<li class="col2" id="MenuCenters" onmouseover="document.getElementById('listCenter').style.display='block' " onmouseout="document.getElementById('listCenter').style.display='none' ">
						<a href="" >Ikujo Centers</a>
						<ul id="listCenter" style="display: none">
							<?php foreach ($Centers as $Center) { ?>
								<li>
									<a href="Center/<?php echo $Center->id;?>"><?php echo $Center->name;?></a>
								</li>
							<?php }; ?>
						</ul>
					</li>
					<li class="col2">
						<a href="">Test</a>
					</li>
					<li class="col2">
						<a href="">login</a>
					</li>
				</ul>
			</div>
			<div class="col1"></div>
		</div>
		<div id="contentContainer">
			@yield('view')
		</div>
		<div id="footer">
			<div class="row">
				<div class="col2">
					<h4>Ikujo Elearning</h4>
				</div>
				<div class="col2">
					<b>Partner</b>
					<ul>
						<li>Sakura Center</li>
						<li>Kyodai Center</li>
					</ul>
				</div>
				<div class="col2">
					<b>Contact</b>
				</div>
				<div class="col2">
					<b>Address</b>
				</div>
			 </div>
			<div id="copyrigh_policy">
				<p><b><a href="" style="display: inline-block;">policy</a>-&copy;copyright</b></p>
			</div>
		</div> 
	</div>
	<script src="{{ asset('js/student.js') }}"></script>
@endsection 