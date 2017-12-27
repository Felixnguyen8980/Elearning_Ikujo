@extends('student.base')
@section('view')
<style>
#Course{
	padding: 5px;
}
#Course h4{
	background-color: #F2B8A2;
	color: #5779A6;
	text-align: center;
}
#Course .CourseDetail{
	padding: 10px;
}
#Course button{
	padding: 0;
}
#Course a{
	display: block;
	width: 100%;
	height: 100%;
	padding: 5px 10px 5px 10px;
}
</style>
<?php $i=0; foreach ($Courses as $Course): ?>
	<div id="Course">
		<h4><?php echo $Course->name;?></h4>
		<div>
			<?php foreach ($Lessons[$i] as $Lesson) { ?>
				<div style="display: inline-block;" class="CourseDetail">
					<button class="btn"><a href="/student/Lesson/<?php echo $Lesson->id; ?>"><?php echo $Lesson->name; ?></a></button>
				</div>
			<?php }?>
		</div>
	</div>
<?php $i++; endforeach; ?>
{{-- <div id="news">
	<h4>New Lessons</h4>
	<div>
		
	</div>
</div> --}}
@endsection 