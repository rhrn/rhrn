<?php if (!empty($User)): ?>
	<?php e ($User['email']) ?> / <a href="/logout">logout</a>
	<?php if ($User['role'] == 'admin'): ?>
	<a href="/items">items</a>
	<?php endif ?>
<?php else: ?>
	<a href="/login">login</a> / <a href="/register">register</a>
<?php endif ?>

