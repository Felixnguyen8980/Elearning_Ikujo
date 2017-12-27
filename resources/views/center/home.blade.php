@extends('master')
@section('title', 'Center Page Manager '.session('center')->name)
@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/CenterHome.css') }}">
	<div id="container">
		<div id="header" class="row">
			<div id="btnBox" class="row">
				<button class="btn-tiny col2" id="btnMenu" onclick="showMenu()">Menu</button>
				<p class="col6" id="NameBox">Home</p>
				<button class="btn-tiny col2" id="btnAction" onclick="showAction()">Action</button>
			</div>
			<div id="menu" class="menu_down">
				<ul>
					<li>Dashboard</li>
					<li>Student</li>
					<li onclick="showCourses()"><a href="#Courses">Courses</a></li>
				</ul>
			</div>

			<div id="action" class="menu_down"> 
				<ul>
					<li>My Avatar</li>
					<li>My info</li>
					<li class="list-last-child"><a href="{{ route('centerpage',['option'=>"logout"]) }}">Logout</a></li>
				</ul>
			</div>
		</div>
		<div id="MenuContent">
			day la cac noi dung cua menu
		</div>
	</div>
	
	<script src="{{ asset('js/center.js') }}"></script>
@endsection 