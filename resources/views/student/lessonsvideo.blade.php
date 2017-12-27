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
		</div>
		<video width="100%"  controls>
			<source src='{{ asset("storage/files/Videos/$Video->filename") }}' type="video/mp4">
		</video>
	</div>
	<?php if( $i%2==1 || $i==sizeof($Videos) ) {?>
	</div>
	<?php } ?>
<?php $i++; endforeach; ?>