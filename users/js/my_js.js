async function getData() { 
    const search = new URLSearchParams(window.location.search);
    const data = await $.ajax({
        url: "fetch-event.php?email=" + search.get('email'),
        type: "GET",
    });
    return JSON.parse(data);
  };
  

$(document).ready(async function () {
    const events = await getData();
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: events,
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end + '&email=' + email,
                    type: "POST",
                    success: function (data) {
                        console.log(data);
                        calendar.fullCalendar('renderEvent',
                        {
                            id: data,
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                            true
                        );
                        displayMessage("Added Successfully");
                    }
                });
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                console.log(event)
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        console.log(response);
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	$(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}