<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.modal'); ?>
<? JHtml::_('formbehavior.chosen', 'select'); ?>

<?= @helper('behavior.keepalive'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form com_taxonomies" method="post">
	<div class="row-fluid">
		<div class="span8">
			<fieldset>
				<legend><?= @text('Content'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Title'); ?></label>
					<div class="controls">
						<input class="required" type="text" name="title" value="<?= $venue->title ?>" placeholder="<?= @text('Title'); ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Slug'); ?></label>
					<div class="controls">
						<input type="text" name="slug" value="<?= $venue->slug ?>" placeholder="<?= @text('Slug'); ?>" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend><?= @text('Fieldset'); ?></legend>
				<?= @service('com://admin/cck.controller.element')->cck_fieldset_id($venue->cck_fieldset_id)->row($venue->id)->table('events_venues')->layout('list')->display(); ?>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<legend><?= @text('Relations'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Event'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'event', 'type' => 'event', 'relation' => 'ancestors', 'attribs' => array('class' => 'select2-listbox'))); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?= @text('Rooms'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'rooms[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'room', 'relation' => 'descendants')); ?>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>