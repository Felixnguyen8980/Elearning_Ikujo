<style>
</style>
<?php foreach ($Audios as $Audio): ?>
	<div class="row" style="align-items: center;">
		<p class="col2"><?php echo $Audio->name; ?>:</p>
		<audio controls class="col4">
			<source src='{{ asset("storage/files/Audios/$Audio->filename") }}' type='audio/mp3'>
		</audio>
	</div>
<?php endforeach; ?>