<?php if (!empty($User)): ?>
	<?php echo $User ?> / <a href="/logout">logout</a>
<?php else: ?>
	<a href="/login">login</a> / <a href="/register">register</a>
<?php endif ?>
