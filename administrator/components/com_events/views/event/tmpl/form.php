<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.modal'); ?>
<? JHtml::_('formbehavior.chosen', 'select'); ?>

<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://com_events/js/events.js" />
<script type="text/javascript">
	jQuery(document).ready(function($) {
		/**
		 * What can change?:
		 *  - Parent Event
		 *  - Venue
		 *  - Days
		 *
		 * When Parent Event changes you can only select the blocks, venues, rooms and days from the parent.
		 */

		var list = new EventsLists({
			elements: [
				'.day select',
				'.venue select'
			],
			event: {
				selector: '.event select',
				elements: {
					clear: [
						'.block select',
						'.room select'
					],
					reload: [
						'.venue select',
						'.day select'
					]
				}
			}
		});
	});
</script>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
	<div class="row-fluid">
		<div class="span8">
			<fieldset>
				<legend><?= @text('Content'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Title'); ?></label>
					<div class="controls">
						<input class="required" type="text" name="title" value="<?= $event->title ?>" placeholder="<?= @text('Title'); ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Slug'); ?></label>
					<div class="controls">
						<input type="text" name="slug" value="<?= $event->slug ?>" placeholder="<?= @text('Slug'); ?>" />
					</div>
				</div>

                <div class="control-group">
                    <label class="control-label"><?= @text('Type'); ?></label>
                    <?= @template('com://admin/cck.view.connection.listbox'); ?>
                </div>
			</fieldset>

			<fieldset>
				<legend><?= @text('Fieldset'); ?></legend>
                <div id="fieldset"></div>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<legend><?= @text('Relations'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('Attendees'); ?></label>
					<div class="controls">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'attendees[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'attendee', 'relation' => 'ancestors')); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Parent Event'); ?></label>
					<div class="controls event">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'event', 'type' => 'event', 'relation' => 'ancestors', 'attribs' => array('data-type' => 'event'))); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?= @text('Venue'); ?></label>
					<div class="controls venue">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'venue', 'type' => 'venue', 'relation' => 'descendants', 'attribs' => array('data-type' => 'room'))); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?= @text('Rooms'); ?></label>
					<div class="controls room">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'rooms[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'room', 'relation' => 'descendants')); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?= @text('Days'); ?></label>
					<div class="controls day">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'days[]', 'attribs' => array('data-type' => 'block', 'multiple' => true, 'size' => 10), 'type' => 'day', 'relation' => 'descendants')); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?= @text('Blocks'); ?></label>
					<div class="controls block">
						<?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array('name' => 'blocks[]', 'attribs' => array('multiple' => true, 'size' => 10), 'type' => 'block', 'relation' => 'descendants')); ?>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>