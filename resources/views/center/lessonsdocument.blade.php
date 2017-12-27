<?php foreach ($Documents as $Document): ?>
	<div class="row" style="text-align: left;">
		<p class="col4"><?php echo $Document->name; ?>:</p>
		<button class="btn col2"><a href="{{ asset("storage/files/Documents/$Document->filename") }}" rel="nofollow">Download</a></button>
		<div class="col1"></div>
		<button class="btn col2" onclick="showDeleteFile('deletefile<?php echo $Document->id;?>')">Delete</button>
		<div class="file_delete_popup" id="deletefile<?php echo $Document->id;?>" style="display: none">
			<i class="alert">Are you sure to delete <?php echo $Document->name;?> </i>
			<div class="row">
				<button class="col5" onclick="DeleteDocument(<?php echo $Document->id;?>)">Yes</button>
				<button class="col5" onclick="hideDeleteFile('deletefile<?php echo $Document->id;?>')">No</button>
			</div>		
		</div>
	</div>
<?php endforeach; ?>