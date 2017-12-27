<style>
	.course_box{
		padding: 5px 10px 5px 10px;
		background-color: white;
		color: black;
		box-shadow: 1px 1px 5px rgba(0,0,0,0.4);
		margin: 5px;
	}
	#FormAddCourse{
		display: inline-block;
	    position: fixed;
	    top: 20%;
	    left: 0;
	    right: 0;
	    width: 200px;
	    margin: auto;
	    background-color: rgba(255,255,255,0.95);
	}
	#CourseContainer{
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
</style>
<div id="CourseContainer">
<div id="function">
	<button class="btn" id="btnAdd" onclick="showFormAddCourse()">Add</button>
	<div id="FormAddCourse" style="display: none;">
	<div><i id="alertAddCourse" class="alert">&nbsp;</i></div>
	<div>
		<input type="text" id="CourseName" name="CourseName" placeholder="Course's Name">
	</div>
	<div>
		<button class="btn" onclick="SaveCourse()">Save</button>
	</div>
</div>
</div>
<?php $i=0; foreach ($Courses as $Course) : ?>
		<?php if( $i%4  == 0) { ?>
		<div class="row">
		<div class="col1"></div>
		<?php } ?>
		
		<div id="<?php echo $Course->id;?>" class="col2 course_box" onclick="ShowCourseDetail(this.id)">
			<a href="#Course/<?php echo $Course->id;?>"><?php echo $Course->name; ?></a>
		</div>
		
		<?php if( $i%4  == 3 || $i==count($Courses)) { ?>
		</div>
		<?php } ?>
<?php $i++; endforeach ?>
</div>