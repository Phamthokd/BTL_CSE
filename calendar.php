<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div id="calendar"></div>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
    <?php
        function getMessage() {
          // Ham tra ve du lieu
        }
    ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var events = '<?php echo getMessage() ?>';
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          initialDate: '2021-10-07',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
          },
          events: [
            {
              title: 'All Day Event',
              start: '2021-10-01',
            },
            {
              title: 'Long Event',
              start: '2021-10-07',
              end: '2021-10-10',
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2021-10-09T16:00:00',
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2021-10-16T16:00:00',
            },
            {
              title: 'Conference',
              start: '2021-10-11',
              end: '2021-10-13',
            },
            {
              title: 'Meeting',
              start: '2021-10-12T10:30:00',
              end: '2021-10-12T12:30:00',
            },
            {
              title: 'Lunch',
              start: '2021-10-12T12:00:00',
            },
            {
              title: 'Meeting',
              start: '2021-10-12T14:30:00',
            },
            {
              title: 'Birthday Party',
              start: '2021-10-13T07:00:00',
            },
            {
              title: 'Click for Google',
              url: 'http://google.com/',
              start: '2021-10-28',
            },
          ],
        });

        calendar.render();
      });
    </script>
  </body>
</html>