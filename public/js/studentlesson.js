$( document ).ready(function() {
		post_id = window.location.href.lastIndexOf('/');
		lessonid = window.location.href.substr(post_id+1);
		console.log(lessonid);
		fillSourceAudio(lessonid);
		fillSourceVideo(lessonid);
		fillSourceDocument(lessonid);
});
function fillSourceAudio(lessonid){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/student/lessonAudio',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#SourceAudio").html(response);		
		}
	});
}
function fillSourceVideo(){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/student/lessonVideo',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#SourceVideo").html(response);		
		}
	});
}

function fillSourceDocument(){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/student/lessonDocument',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#SourceDocument").html(response);		
		}
	});		
}
	