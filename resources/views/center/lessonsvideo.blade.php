<style>
	.video_element{
		padding: 5px;
	}
	.video_element .titlevideo{
		background-color: #D19348;
		color: white;
		padding: 2px 2px 2px 5px;
	}
	video{
		margin: 0;
	}
	.titlevideo button{
		color: #F2E97E;
	}
</style>
<?php $i=0; foreach ($Videos as $Video): ?>
	<?php if($i%2==0) {?>
	<div class="row">
	<?php } ?>
	<div style="text-align: center;" class="col5 video_element">
		<div class="titlevideo row">
			<p class="col3" style="text-align: left;"><?php echo $Video->name; ?></p>
			<button class="btn col7" onclick="showDeleteFile('deletefile<?php echo $Video->id;?>')">Delete</button>
		</div>
		<video width="100%"  controls>
			<source src='{{ asset("storage/files/Videos/$Video->filename") }}' type="video/mp4">
		</video>
	</div>
	<div class="file_delete_popup" id="deletefile<?php echo $Video->id;?>" style="display: none">
			<i class="alert">Are you sure to delete <?php echo $Video->name;?> </i>
			<div class="row">
				<button class="col5" onclick="DeleteVideo(<?php echo $Video->id;?>)">Yes</button>
				<button class="col5" onclick="hideDeleteFile('deletefile<?php echo $Video->id;?>')">No</button>
			</div>		
	</div>
	<?php if( $i%2==1 || $i==sizeof($Videos) ) {?>
	</div>
	<?php } ?>
<?php $i++; endforeach; ?>