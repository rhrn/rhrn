<style>
.images img {max-width:150px;}
</style>
<h1><a href="/items/add/">add</a></h1>
<?php //pr ($items) ?>

<?php if (!empty($items)): ?>
<ul>
<?php foreach ($items as $k=> $v): ?>
<li>
	<ul>
		<li><a href="/items/add/<?php echo $v['Item']['id'] ?>"><?php echo $v['Item']['name'] ?></a></li>
		<li><?php echo $v['Item']['desc'] ?></li>
		<li><?php echo $v['Item']['link'] ?></li>
		<?php if (!empty($v['Item']['comment'])): ?>
			<li><?php echo $v['Item']['comment'] ?></li>
		<?php endif ?>

		<li class="images">
			<?php if(!empty($v['Image'])): ?>
				<?php foreach ($v['Image'] as $k => $v): ?>
					<img src="/images/<?php echo $v['item_id'] . '/' . $v['name'] ?>" alt="<?php echo $v['alt'] ?>" />
				<?php endforeach ?>
			<?php endif ?>
		</li>
	</ul>
</li>
<?php endforeach ?>
</ul>
<?php endif ?>
