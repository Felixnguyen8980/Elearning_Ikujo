<style>
	.Lesson_box{
		padding: 5px 10px 5px 10px;
		background-color: white;
		color: black;
		box-shadow: 1px 1px 5px rgba(0,0,0,0.4);
		margin: 5px;
	}
	#FormAddLesson{
		display: inline-block;
	    position: fixed;
	    top: 20%;
	    left: 0;
	    right: 0;
	    width: 200px;
	    margin: auto;
	    background-color: rgba(255,255,255,0.95);
	}
	#LessonContainer{
		width: 90%;
		margin: 0 auto;
	}
	#function{
		position: relative;
		width: 100%;
		height: 32px;

	}
	#function #btnAdd{
		height: 100%;
		position: absolute;
		left: 0;
	}
	.lesson_delete_popup{
		position: fixed;
		z-index: 2;
		left: 0;
		right:0;
		width: 200px;
		padding: 5px;
		margin: auto;
		background-color: rgba(255,255,255,0.8);
	}
</style>
<div id="LessonContainer">
<div id="function">
	<button class="btn" id="btnAdd" onclick="showFormAddLesson()">Add</button>
	<div id="FormAddLesson" style="display: none;">
	<div><i id="alertAddLesson" class="alert">&nbsp;</i></div>
	<div>
		<input type="text" id="LessonName" name="LessonName" placeholder="Lesson's Name">
	</div>
	<div>
		<button class="btn" onclick="SaveLesson(<?php echo $Course_id;?>)">Save</button>
	</div>
</div>
</div>
<?php $i=0; foreach ($Lessons as $Lesson) : ?>
		<?php if( $i%4  == 0) { ?>
		<div class="row">
		<div class="col1"></div>
		<?php } ?>
		
		<div class="col2 Lesson_box">
			<a href="#Lesson/<?php echo $Lesson->id; ?>" class="btn" onclick="ShowLessonDetail(<?php echo $Lesson->id;?>)"><?php echo $Lesson->name; ?></a>
			<button class="btn btn_circle" onclick="showDeleteLesson('deletelesson<?php echo $Lesson->id;?>')">X</button>
		</div>
		<div class="lesson_delete_popup" id="deletelesson<?php echo $Lesson->id;?>" style="display: none">
			<i class="alert">Are you sure to delete <?php echo $Lesson->name;?> </i>
			<div class="row">
				<button class="col5" onclick="DeleteLesson(<?php echo $Lesson->id;?>)">Yes</button>
				<button class="col5" onclick="hideDeleteLesson('deletelesson<?php echo $Lesson->id;?>')">No</button>
			</div>		
		</div>
		<?php if( $i%4  == 3 || $i==count($Lessons)) { ?>
		</div>
		<?php } ?>
<?php $i++; endforeach ?>
</div>
