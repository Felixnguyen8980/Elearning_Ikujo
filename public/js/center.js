
var Courses="";
var CourseDetail = new FormData();
var LessonDetail = new FormData();
loadCourses();
analysisUrl();
function analysisUrl(){
	url = window.location.href;
	var pos_key = url.lastIndexOf('#');
	if(pos_key < 0){
		key = "home";
	} else{
		suburl = url.substr(pos_key+1);
		post_id = suburl.indexOf('/');
		pos_key=0;
		if (post_id < pos_key) {
			key = suburl;
		} else {
			id = suburl.substr(post_id+1);
			key = suburl.substr(0,post_id)+'id';
		}
	}
	switch (key){
	 	case 'home':
	 		showHome();
	 	break;
	 	case 'Courses':
	 		if (Courses==""){
	 			OnLoadCourses();
	 		}
	 		showMenu();
	 		showCourses();
	 	break;
	 	case 'Courseid':
	 		if (Courses==""){
	 			OnLoadCourses();
	 		}
	 		ShowCourseDetail(id);
	 	break;
	 	case 'Lessonid':
	 		if (Courses==""){
	 			OnLoadCourses();
	 		}
	 		ShowLessonDetail(id);
	 	break;
	};
}
$(function() {
if (window.history.pushState) {
    // window.history.pushState('', null, './');
    $(window).on('popstate', function() {
       analysisUrl();
    });
    console.log(window.history.pushState);
};
});
function showHome(){
	$("#MenuContent").empty();
}
function loadCourses(){
	$.ajax({
		url : '/center/loadCourses',
		type: 'GET',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		success: function(response){		
			Courses = response;
		}
	});
}
function OnLoadCourses(){
	$.ajax({
		url : '/center/loadCourses',
		type: 'GET',
		async: false,
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		success: function(response){		
			Courses = response;
		}
	});
}
function showCourses(){
	 showMenu();
	 $("#MenuContent").html(Courses);
}
function showFormAddCourse(){
	FormAddCourse.style.display = (FormAddCourse.style.display =="none")? "block":"none";
}
function SaveCourse(){
	var CourseName = $('#CourseName').val();
	var form_data = new FormData();
	form_data.append('CourseName',CourseName);
	$.ajax({
		url : '/center/addCourses',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async: false,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){		
			$("#alertAddCourse").text(response);
			OnLoadCourses();		
		}
	});
	$("#MenuContent").html(Courses);
}
function showMenu(){
	var kt = ($('#menu').is(':hidden'))? 0:1;
	var menu = $('.menu_down');
	for (i=0;i<menu.length;i++){
		menu.removeClass("active");
	}
	if (kt == 0) {
		$('#menu').addClass("active");
	} else {
		$('#menu').removeClass("active");
	}
}
function showAction(){
	var kt = ($('#action').is(':hidden'))? 0:1;
	var menu = $('.menu_down');
	for (i=0;i<menu.length;i++){
		menu.removeClass("active");
	}
	if (kt == 0) {
		$('#action').addClass("active");
	} else {
		$('#action').removeClass("active");
	}
}
//Lesson Funtion
function ShowCourseDetail(id){
	if(CourseDetail.get(id)){
		$("#MenuContent").html(CourseDetail.get(id));
	} else{
		LoadCourseDetail(id);
		$("#MenuContent").html(CourseDetail.get(id));
	}
}
function LoadCourseDetail(id){
	var Course_id = id;
	var form_data = new FormData();
	var StringId = id.toString();
	form_data.append('Course_id',Course_id);
	$.ajax({
		url : '/center/LoadCourseDetail',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async: false,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){
			CourseDetail.set(StringId,response);		
		}
	});
}
function showFormAddLesson(){
	FormAddLesson.style.display = (FormAddLesson.style.display =="none")? "block":"none";
}
function SaveLesson(Course_id){
	var LessonName = $('#LessonName').val();
	var form_data = new FormData();
	var StringId = Course_id.toString();
	form_data.append('LessonName',LessonName);
	form_data.append('Course_id',StringId);
	$.ajax({
		url : '/center/addLessons',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async: false,
        cache       : false,
        contentType : false,
        processData : false,
		success: function(response){
			$("#alertAddLesson").text(response);		
			LoadCourseDetail(Course_id);
		}
	});
	ShowCourseDetail(Course_id);
}
function ShowLessonDetail(id){
	if(LessonDetail.get(id)){
		$("#MenuContent").html(LessonDetail.get(id));
	} else{
		LoadLessonDetail(id);
		$("#MenuContent").html(LessonDetail.get(id));
	}
}
function LoadLessonDetail(Lesson_id){
	var StringId = Lesson_id.toString();
	var form_data = new FormData();
	form_data.append('Lesson_id',StringId);
	$.ajax({
		url : '/center/LoadLessonDetail',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		async: false,
        cache       : false,
        contentType : false,
        processData : false,
		success: function(response){
			LessonDetail.set(StringId,response);		
		}
	});
}

function showFormAddVideo(){
	FormAddVideo.style.display = (FormAddVideo.style.display =="none")? "block":"none";
}
function showFormAddAudio(){
	FormAddAudio.style.display = (FormAddAudio.style.display =="none")? "block":"none";
}
function showFormAddDocument(){
	FormAddDocument.style.display = (FormAddDocument.style.display =="none")? "block":"none";
}
function AddAudio(id){
	name = document.getElementById('AudioName').value; 
	_file = document.getElementById('AudioFile').files[0]; 
	if(!(_file) || name=="") {
    	return;
	}
	type = _file.type;
	if (type != 'audio/mp3'){
		$('#alertAudioUpload').text('Only support audio/mp3');
		return;
	}
	var data = new FormData();
	data.append("lessonid",id);
	data.append("name",name);
	data.append('_file', _file);
	$.ajax({
		xhr : function(){
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress',function(e){
					if(e.lengthComputable) {
						console.log(e.loaded);
						console.log('Total Size :' + e.total);
						var percent = Math.round((e.loaded / e.total)*100);
						progressBarAudio.value = percent;
					}
			});

			return xhr;
		},
		url : '/center/AddAudio',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: data,
        //contentType : 'audio/mpeg',
        cache		:false,
        contentType : false,
        processData : false,
		success: function(response){
			$('#alertAudioUpload').text(response);
			OnfillSourceAudio(id);

		},
	});
}
function AddDocument(id){
	name = document.getElementById('DocumentName').value; 
	_file = document.getElementById('DocumentFile').files[0]; 
	if(!(_file) || name=="") {
    	return;
	}
	type = _file.type;
	if (type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
		&& type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
		&& type != "application/pdf"){
		$('#alertDocumentUpload').text('Not support '+type);
		return;
	}
	var data = new FormData();
	data.append("lessonid",id);
	data.append("name",name);
	data.append('_file', _file);
	$.ajax({
		xhr : function(){
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress',function(e){
					if(e.lengthComputable) {
						console.log(e.loaded);
						console.log('Total Size :' + e.total);
						var percent = Math.round((e.loaded / e.total)*100);
						progressBarDocument.value = percent;
					}
			});

			return xhr;
		},
		url : '/center/AddDocument',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: data,
        //contentType : 'audio/mpeg',
        cache		:false,
        contentType : false,
        processData : false,
		success: function(response){
			$('#alertDocumentUpload').text(response);
			OnfillSourceDocument(id);
		},
	});
}
function AddVideo(id){
	name = document.getElementById('VideoName').value; 
	_file = document.getElementById('VideoFile').files[0]; 
	if(!(_file) || name=="") {
    	return;
	}
	type = _file.type;
	if (type != "video/mp4"
		&& type != "video/AVI"){
		$('#alertVideoUpload').text('Not support '+type);
		return;
	}
	var data = new FormData();
	data.append("lessonid",id);
	data.append("name",name);
	data.append('_file', _file);
	$.ajax({
		xhr : function(){
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress',function(e){
					if(e.lengthComputable) {
						console.log(e.loaded);
						console.log('Total Size :' + e.total);
						var percent = Math.round((e.loaded / e.total)*100);
						progressBarVideo.value = percent;
					}
			});

			return xhr;
		},
		url : '/center/AddVideo',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: data,
        //contentType : 'audio/mpeg',
        cache		:false,
        contentType : false,
        processData : false,
		success: function(response){
			$('#alertVideoUpload').text(response);
			OnfillSourceVideo(id);
		},
	});
}
function showDeleteLesson(id){
	document.getElementById(id).style.display = "block";
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = true;
	}
}
function hideDeleteLesson(id){
	document.getElementById(id).style.display = "none";
	button = document.getElementsByClassName('btn');
	for (i =0; i<button.length;i++){
		button[i].disabled = false;
	}
}
function DeleteLesson(id){
	var form_data = new FormData();
	form_data.append('lesson_id',id);
	$.ajax({
		url : '/center/deletelesson',
		type: 'POST',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: form_data,
		cache       : false,
        contentType : false,
        processData : false,
		success: function(response){
			button = document.getElementsByClassName('btn');
			for (i =0; i<button.length;i++){
				button[i].disabled = false;
			}
			post_id = url.lastIndexOf('/');
			Course_id = url.substr(post_id+1);
			LoadCourseDetail(Course_id);
			ShowCourseDetail(Course_id);		
		}
	});
}