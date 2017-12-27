<style>
	#LessonDetailContainer{
		padding-top: 10px;
		height: 100%;
		width: 100%;
		margin: 0 auto;
		position: relative;
		top:  0;
		left: 0;
	}
	#VideosBox{
		position: absolute;
		border-right: 2px solid rgba(0,0,0,0.3);
		top:0;
		left: 0;
		height:90%;
		width: 60%;
	}
	#ElementBox{
		position: absolute;
		top:0;
		right: 0;
		height: 90%;
		width: 40%;
	}
	#AudiosBox ,#DocumentBox{
		margin:10px auto;
		width: 96%;
		height: 50%;
		display: block;
		position: relative;
	}
	#AudiosBox {
		border-bottom: 2px solid rgba(0,0,0,0.3);
	}
	.function_box{
		padding: 3px;
		background-color: rgba(0,0,0,0.8);
		width: 200px;
		color: white;
		position: absolute;
		z-index: 1;
	}
	.function_box input{
		font-size: 12px;
	}
	.function_box .btn{
		background-color: rgba(255,255,255,0.8);
	}
	.function_box .row{
		padding: 2px 0px 10px 2px;
	}
	#SourceAudio,#SourceDocument,#SourceVideo{
		margin-top: 2px;
		margin-bottom: 2px;
		height: 90%;
		overflow: scroll;
	}
	audio , video {
		margin: 3px;		
	}
	#SourceDocument .row{
		margin: 3px;
		align-items: center;
	}
	.file_delete_popup{
		position: fixed;
		z-index: 2;
		left: 0;
		right:0;
		width: 200px;
		padding: 5px;
		margin: auto;
		background-color: rgba(255,255,255,0.8);
	}
	#LessonDetailContainer{
		min-height: 650px;
		height: 100%;
	}
</style>
<div id="LessonDetailContainer">
	<div id="VideosBox">
		<button class="btn action_btn" onclick="showFormAddVideo()">New Video</button>
		<div id="FormAddVideo" style="display: none" class="function_box">
			<div>
				<i class="alert" style="font-size: 14px;" id="alertVideoUpload">&nbsp;</i>
			</div>
			<div class="row">
				<input class="col10" type="text" placeholder="name" id="VideoName">
			</div>
			<div class="row">
				<input class="col10" type="file" id="VideoFile">
			</div>
			<div class='progress_outer row' >
	           <progress id="progressBarVideo" value="0" max="100" style="width:90%;height: 3px;"></progress>
	        </div>
			<button class="btn" value="<?php echo $Lesson->id;?>" onclick="AddVideo(this.value)"">Save</button>
		</div>
		<div id="SourceVideo" class="SourceBox">
		</div>
	</div>
	<div id="ElementBox">
		<div id="AudiosBox">
			<button class="btn action_btn" onclick="showFormAddAudio()">New Audio</button>
			<div id="FormAddAudio" style="display: none" class="function_box">
				<div class="alert">
					<i style="font-size: 14px;" id="alertAudioUpload">&nbsp;</i>
				</div>
				<div class="row">
					<input class="col10" type="text" placeholder="name" id="AudioName">
				</div>
				<div class="row">
					<input class="col10" type="file" id="AudioFile">
				</div>
				<div class='progress_outer row' >
		           <progress id="progressBarAudio" value="0" max="100" style="width:90%;height: 3px;"></progress>
		        </div>
				<button class="btn" value="<?php echo $Lesson->id;?>" onclick="AddAudio(this.value)">Save</button>
			</div>
			<div id="SourceAudio" class="SourceBox">
			</div>
		</div>
		<div id="DocumentBox">
			<button class="btn action_btn" onclick="showFormAddDocument()">New Document</button>
			<div id="FormAddDocument" style="display: none" class="function_box">
				<div>
					<i class="alert" style="font-size: 14px;" id="alertDocumentUpload">&nbsp;</i>
				</div>
				<div class="row">
					<input class="col10" type="text" placeholder="name" id="DocumentName">
				</div>
				<div class="row">
					<input class="col10" type="file" id="DocumentFile">
				</div>
				<div class='progress_outer row' >
		           <progress id="progressBarDocument" value="0" max="100" style="width:90%;height: 3px;"></progress>
		        </div>
				<button class="btn" value="<?php echo $Lesson->id;?>" onclick="AddDocument(this.value)">Save</button>
			</div>
			<div id="SourceDocument" class="SourceBox">
				 
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/lessonsdetail.js') }}"></script>