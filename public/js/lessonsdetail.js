$( document ).ready(function() {
		url = window.location.href;
		post_id = url.lastIndexOf('/');
		lessonid = url.substr(post_id+1);
		fillSourceAudio(lessonid);
		fillSourceVideo(lessonid);
		fillSourceDocument(lessonid);
});
function fillSourceAudio(lessonid){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/center/lessonAudio',
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
function OnfillSourceAudio(lessonid){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/center/lessonAudio',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async		: false,
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
		url : '/center/lessonVideo',
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

function OnfillSourceVideo(lessonid){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/center/lessonVideo',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async		: false,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#SourceVideo").html(response);		
		}
	});
}
function fillSourceDocument(lessonid){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/center/lessonDocument',
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

function OnfillSourceDocument(){
	var form_data = new FormData();
	form_data.append('Lesson_id',lessonid);
	$.ajax({
		url : '/center/lessonDocument',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async		: false,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#SourceDocument").html(response);		
		}
	});		
}
function showDeleteFile(id){
	document.getElementById(id).style.display = "block";
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = true;
	}
}
function hideDeleteFile(id){
	document.getElementById(id).style.display = "none";
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = false;
	}
}
function DeleteFile(id){
	var form_data = new FormData();
	form_data.append('video_id',id);
	$.ajax({
		url : '/center/deletefile',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async		: false,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
		}
	});	
}
function DeleteAudio(id){
	DeleteFile(id);
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = false;
	}
	post_id = url.lastIndexOf('/');
	lessonid = url.substr(post_id+1);	
	OnfillSourceAudio(lessonid);
}
function DeleteVideo(id){
	DeleteFile(id);
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = false;
	}
	post_id = url.lastIndexOf('/');
	lessonid = url.substr(post_id+1);	
	OnfillSourceVideo(lessonid);
}
function DeleteDocument(id){
	DeleteFile(id);
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = false;
	}
	post_id = url.lastIndexOf('/');
	lessonid = url.substr(post_id+1);	
	OnfillSourceDocument(lessonid);
}
