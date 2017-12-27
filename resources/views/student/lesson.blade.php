@extends('student.base')
@section('view')
<style>
	
</style>
<div id="LessonDetailContainer" class="row">
	<div id="VideosBox" class="col5">
		<div id="SourceVideo" class="SourceBox">
		</div>
	</div>
	<div id="ElementBox" class="col5">
		<div id="AudiosBox">
		
			<div id="SourceAudio" class="SourceBox">
			</div>
		</div>
		<div id="DocumentBox">
			
			<div id="SourceDocument" class="SourceBox">
				 
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/studentlesson.js') }}"></script>
@endsection 