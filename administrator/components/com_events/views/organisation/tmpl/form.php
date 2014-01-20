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
						<input class="required" type="text" name="title" value="<?= $organisation->title ?>" placeholder="<?= @text('Title'); ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Slug'); ?></label>
					<div class="controls">
						<input type="text" name="slug" value="<?= $organisation->slug ?>" placeholder="<?= @text('Slug'); ?>" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend><?= @text('Fieldset'); ?></legend>
				<?= @service('com://admin/cck.controller.element')->cck_fieldset_id($organisation->cck_fieldset_id)->row($organisation->id)->table('events_organisations')->layout('list')->display(); ?>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<legend><?= @text('Relations'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Attendees'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'attendees[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'attendee', 'relation' => 'descendants')); ?>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>