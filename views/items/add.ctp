<script type="text/javascript">
$().ready(function() {
	$('#imglinkplus').bind('click', function() {
		$('#ImageImglink').clone().insertBefore('#imglinkplus').before('<label>img link</label>').wrap('<div class="input text"></div>');
	});
	$('#imgfileplus').bind('click', function() {
		$('#ImageFile').clone().insertBefore('#imgfileplus').before('<label>upload file</label>').wrap('<div class="input text"></div>');
	});
});
</script>
<?php //phpinfo() ?>
<h1><a href="/items/">list</a></h1>
<?php echo $form->create(null, array('type'=>'file')) ?>

<?php echo $form->input('name', array('label'=>'name')) ?>

<?php echo $form->input('desc', array('label'=>'desc')) ?>

<?php echo $form->input('link', array('label'=>'link')) ?>

<?php echo $form->input('comment', array('label'=>'comment')) ?>

<?php if (!empty($this->data['Image'][0])): ?>
	<?php foreach ($this->data['Image'] as $k => $v): ?>

<img src="/images/<?php echo $v['item_id'] . '/' . $v['name'] ?>" alt="<?php echo $v['alt'] ?>" /> -
	<?php endforeach ?>
<?php endif ?>

<?php echo $form->input('Image.imglink', array('label'=>'img link', 'name'=>'data[Image][imglink][]')) ?><br />
<a id="imglinkplus">[+]</a>
<?php echo $form->input('Image.file', array('label'=>'upload file', 'type'=>'file', 'name'=>'data[Image][file][]')) ?>
<a id="imgfileplus">[+]</a>

<?php echo $form->submit('save') ?>
<?php echo $form->end() ?>
