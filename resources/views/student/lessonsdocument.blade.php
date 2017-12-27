<?php foreach ($Documents as $Document): ?>
	<div class="row" style="text-align: left;">
		<p class="col4"><?php echo $Document->name; ?>:</p>
		<button class="btn col2"><a href="{{ asset("storage/files/Documents/$Document->filename") }}" rel="nofollow">Download</a></button>
		<div class="col1"></div>
		
	</div>
<?php endforeach; ?>