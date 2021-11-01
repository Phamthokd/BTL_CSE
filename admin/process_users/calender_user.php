<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
    <script src="fullcalendar/lib/jquery.min.js"></script>
    <script src="fullcalendar/lib/moment.min.js"></script>
    <script src="fullcalendar/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Quản lý người dùng</title>

<style>

#calendar {
    width: 700px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
</style>
</head>
<body>
    

<div class="swap">
    <div class="container">
      <div class="row">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-warning">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Trang chủ</a></li>
            <li><a href="" class="nav-link px-2 link-dark">Quản lý người dùng</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Quản lý Nhóm</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Giới thiệu</a></li>
          </ul>

          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-light">Đăng xuất</button>
          </div>
      </header>
      </div>
    </div>
    <?php
      $email=$_GET['email'];
    ?>
    <script>
      var email = <?php echo json_encode($email);?>;
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
                console.log(event.id)
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
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
      </script>
        <div class="response"></div>
        <div id='calendar'></div>
    
    <div class="container">
      <div class="row">
        <footer class="p-5 mt-5 d-flex justify-content-center bg-secondary py-3 text-white">
          <ul class="nav nav-pills">
            <li class="nav-item">Bài Tập Lớn Nhóm 17</li>
          </ul>
        </footer>
      </div>
    </div>
    </div>
</body>


</html>