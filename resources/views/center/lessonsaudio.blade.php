<style>
</style>
<?php foreach ($Audios as $Audio): ?>
	<div class="row" style="align-items: center;">
		<p class="col2"><?php echo $Audio->name; ?>:</p>
		<audio controls class="col4">
			<source src='{{ asset("storage/files/Audios/$Audio->filename") }}' type='audio/mp3'>
		</audio>
		<button class="btn col2" onclick="showDeleteFile('deletefile<?php echo $Audio->id;?>')">Delete</button>
		<div class="file_delete_popup" id="deletefile<?php echo $Audio->id;?>" style="display: none">
			<i class="alert">Are you sure to delete <?php echo $Audio->name;?> </i>
			<div class="row">
				<button class="col5" onclick="DeleteAudio(<?php echo $Audio->id;?>)">Yes</button>
				<button class="col5" onclick="hideDeleteFile('deletefile<?php echo $Audio->id;?>')">No</button>
			</div>		
		</div>
	</div>
<?php endforeach; ?>