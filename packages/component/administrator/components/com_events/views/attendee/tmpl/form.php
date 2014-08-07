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
						<input class="required" type="text" name="title" value="<?= $attendee->title ?>" placeholder="<?= @text('Title'); ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Slug'); ?></label>
					<div class="controls">
						<input type="text" name="slug" value="<?= $attendee->slug ?>" placeholder="<?= @text('Slug'); ?>" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend><?= @text('Fieldset'); ?></legend>
				<?= @service('com://admin/cck.controller.element')->cck_fieldset_id($attendee->cck_fieldset_id)->row($attendee->id)->table('events_attendees')->layout('list')->display(); ?>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<legend><?= @text('Relations'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Organisations'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'organisations[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'organisation', 'relation' => 'ancestors')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Events'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'events[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'event', 'relation' => 'descendants')); ?>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>