<?php if( is_array($stats) && !empty($stats) ): ?>
	<ul>
		<?php foreach($stats AS $stat): ?>
			<li><?php echo print_r($stat,true); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>