jQuery.noConflict()(function($) {
    $('#testing').fullCalendar({
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },

        events: "events.json",

        eventDrop: function(event, delta) {
            alert(event.title + ' was moved ' + delta + ' days\n' +
                '(should probably update your database)');
            },

        loading: function(bool) {
            if (bool) $('#loading').show();
            else $('#loading').hide();
            },

        eventRender: function (event, element, view) {
            if (view.name == 'month') {
            var start = event.start,
            end = event.end,
            currentDate = new Date(start),
            between = []
            ;

            while (currentDate <= end) {
            between.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
            }

        $.each(between, function( index, value ) {
            $("td[data-date*='" + $.fullCalendar.formatDate( value, 'yyyy-MM-dd') + "']").addClass('omfgunub');
            });
        }

        return false;
        },

        dayClick: function(date, allDay, jsEvent, view) {
            if($("td[data-date*='" + $.fullCalendar.formatDate( date, 'yyyy-MM-dd') + "']").hasClass('omfgunub')) {
            location.href = "events.html?start_date=" + $.fullCalendar.formatDate( date, 'yyyy-MM-dd') + '&end_date=' + $.fullCalendar.formatDate( date, 'yyyy-MM-dd');
            }
        }
    });
});