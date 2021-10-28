<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css"
      rel="stylesheet"
      <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
      />
      <!-- Google Fonts -->
      <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
      />
      <!-- MDB -->
      <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
        rel="stylesheet"
      />
  </head>
  <body>
    <div class="swap">
      <header class="pb-5">
      <!-- Navbar -->
      <div class="container ">
        <div class="row">
          <div class="col-md-12 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
              <div class="container-fluid">
                <button
                        class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarExample01"
                        aria-controls="navbarExample01"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">hỗ trợ</a>
                    </li>
                  </ul>
                </div>
                <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                </div>
              </div>
            </nav>
              <!-- Navbar -->
              <!-- Background image -->
            <div
              class="p-5 text-center bg-image"
              style="background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg'); height: 200px;">
              <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="text-white">
                    <h1 class="mb-3">Sáng tạo, thay đổi, tư duy</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Background image -->
      </header>
      <div class="main">
      <div class="container ">
        <div class="row">
          <div class="col-md-12 ">
              <div id="calendar"></div>
              <script
                  src="https://code.jquery.com/jquery-3.6.0.min.js"
                  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                  crossorigin="anonymous"></script>
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
                        right: 'dayGridMonth',
                      },
                      events: [
                      
                      ],
                    });

                    calendar.render();
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>