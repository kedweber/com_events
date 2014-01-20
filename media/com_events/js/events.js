function EventsLists(config) {
    var self = this;
    self.defaults = {
        chosen: {
            options: {
                disable_search_threshold : 10,
                allow_single_deselect : true
            }
        },
        elements: [],
        event: {
            elements: {
                clear: [],
                reload: []
            }
        }
    };

    jQuery.extend(self.defaults, config);

    jQuery.each(self.defaults.elements, function(key, item) {
        jQuery(document).on('change', item, self.getSelect.bind(self));
    });

    jQuery(document).on('change', self.defaults.event.selector, self.reloadEvent.bind(self));
}

/**
 * When an element changes, the data needs to be reloaded.
 * Depening on the taxonomies.
 *
 * The only exception is event, when event is changed all the other data also needs to be reloaded.
 */
EventsLists.prototype.getSelect = function(event) {
    var self = this;
    var element = event.target;
    var parent = jQuery(element).parent();

    var type = jQuery(element).attr('data-type');
    var value = jQuery(element).val();
    var ids = [];
    var multiple = false;
    var size = 10;
    var name = jQuery(element).attr('name');

    if(jQuery(element).attr('multiple') === 'multiple') {
        multiple = true;
        jQuery.each(value, function(key, item) {
            ids.push(item);
        });
    } else {
        ids.push(value);
    }

    // Remove the old element
    jQuery('.controls.' + type).children().remove();

    console.log(ids);

    this.getElement({
        ids: ids,
        type: type,
        multiple: multiple,
        size: size,
        name: name
    }, function(html) {
        jQuery('.controls.' + type).append(html);
        jQuery('.controls.' + type + ' select').chosen(self.defaults.chosen.options);
    });
};

/**
 * This eventHandler will handle the change of the parent event.
 */
EventsLists.prototype.reloadEvent = function() {
    console.log(arguments);

    /**
     * Clear all the clear fields.
     */
    jQuery.each(this.defaults.event.elements.clear, function(key, item) {
        var id = jQuery(item).attr('id');
        jQuery('#' + id).val('').trigger('liszt:updated');
    });

    /**
     * Reload all the reload fields.
     * When we reload the fields, we first need to remove them.
     * After we loaded them, we need to add the chosen function to them as well.
     */
    jQuery.each(this.defaults.event.elements.reload, function(key, item) {

    });
};

/**
 * In this function we will generate the url, and do the request to get the requested form element.
 * After this it is turned back.
 */
EventsLists.prototype.getElement = function(options, callback) {
    var url = '';

    if(options.ids.length > 1) {
        jQuery.each(options.ids, function(key, item) {
            url += '&ids[]=' + item;
        });
    } else {
        url += '&parent_id=' + options.ids[0];
    }

    url += '&name=' + options.name;
    url += '&type=' + options.type;

    jQuery.ajax({
        url: 'index.php?option=com_events&format=raw&view=listbox' + url,
        success: function(data) {
            callback(data);
        }
    })
};