<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<!--
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_translations/css/translations.min.css" />
-->

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <div class="btn-toolbar" id="filter-bar">
            <div class="filter-search btn-group pull-left">
                <input type="text" value="<?= $state->search; ?>" placeholder="Search" id="filter_search" name="search">
            </div>
            <div class="btn-group pull-left hidden-phone">
                <button title="" class="btn hasTooltip" type="submit" data-original-title="Search"><i class="icon-search"></i></button>
                <button onclick="document.id('filter_search').value='';this.form.submit();" title="" class="btn hasTooltip" type="button" data-original-title="Clear"><i class="icon-remove"></i></button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;" width="1">
                    <?= @helper('grid.checkall')?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'title', 'title' => @text('TITLE'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'enabled', 'title' => @text('PUBLISHED'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'frontpage', 'title' => @text('FRONTPAGE'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'type', 'title' => @text('Type'))); ?>
                </th>
                <? if($events->isTranslatable()) : ?>
                    <th>
                        <?= @text('Translations') ?>
                    </th>
                <? endif; ?>
                <th>
                    <?= @text('Owner'); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'created_on', 'title' => @text('Date'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'order', 'title' => @text('ORDER'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'id', 'title' => @text('ID'))); ?>
                </th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="10">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <? foreach ($events as $event) : ?>
            <tr>
                <td style="text-align: center;">
                    <?= @helper('grid.checkbox', array('row' => $event))?>
                </td>
                <td>
                    <a href="<?= @route('view=event&id='.$event->id); ?>">
                        <?= $event->title; ?>
                    </a>
                </td>
                <td>
                    <?= @helper('grid.enable', array('row' => $event)); ?>
                </td>
                <td>
                    <?= @helper('grid.enable', array('row' => $event, 'field' => 'frontpage')); ?>
                </td>
                <td>
                    <?= @escape(ucwords($event->type)); ?>
                </td>
                <? if($event->isTranslatable()) : ?>
	            <td>
		            <?= @helper('com://admin/translations.template.helper.language.translations', array(
			            'row' => $event->id,
			            'table' => $event->getTable()->getName()
		            )); ?>
                </td>
                <? endif; ?>
                <td>
                    <?= $event->created_by_name; ?>
                </td>
                <td>
                    <?= @helper('date.humanize', array('date' => $event->created_on)) ?>
                </td>
                <td>
                    <?= @helper('grid.order', array('row' => $event, 'total' => $total)); ?>
                </td>
                <td>
                    <?= $event->id; ?>
                </td>
            </tr>
            <? endforeach; ?>

            <? if (!count($events)) : ?>
            <tr>
                <td colspan="10" align="center" style="text-align: center;">
                    <?= @text('NO_ITEMS'); ?>
                </td>
            </tr>
                <? endif; ?>
            </tbody>
        </table>
    </form>
</div>