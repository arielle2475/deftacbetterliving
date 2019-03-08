<?php  if (isset($errors) && count($errors) > 0) : ?>
	<div class="text-center bg-danger border rounded border-danger shake animated "style="padding-top:10px; margin-bottom:10px; color:white;">      
		<div class="error">
			<?php foreach ($errors as $error) : ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>
		</div>
	</div>
<?php  endif ?>