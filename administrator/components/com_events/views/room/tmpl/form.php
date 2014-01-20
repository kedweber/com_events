<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.modal'); ?>
<? JHtml::_('formbehavior.chosen', 'select'); ?>

<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
	<div class="row-fluid">
		<div class="span8">
			<fieldset>
				<legend><?= @text('Content'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Title'); ?></label>
					<div class="controls">
						<input class="required" type="text" name="title" value="<?= $room->title ?>" placeholder="<?= @text('Title'); ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Slug'); ?></label>
					<div class="controls">
						<input type="text" name="slug" value="<?= $room->slug ?>" placeholder="<?= @text('Slug'); ?>" />
					</div>
				</div>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<legend><?= @text('Relations'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Venue'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'venue', 'type' => 'venue', 'relation' => 'ancestors')); ?>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>