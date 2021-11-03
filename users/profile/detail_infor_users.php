<?php
session_start();
if (!isset($_SESSION['login_ok']))
  header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
  <script src="../fullcalendar/lib/jquery.min.js"></script>
  <script src="../fullcalendar/lib/moment.min.js"></script>
  <script src="../fullcalendar/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <div class="swap">
    <?php include('./menu.php') ?>
    <div class="main">
      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
          <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <?php
              $conn = mysqli_connect('localhost', 'root', '', 'btl_ql', '3306');

              if (!$conn) {
                die("kết nối thất bại. Kiểm tra lại");
              }
              if (isset($_GET['id']))
                $userid = $_GET['id'];
              $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and a.infor_id = '$userid'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <?php
                  echo '' . $row['first_name'] . ' ' . $row['last_name'] . '';
                  ?>
                  <span class="font-weight-bold"></span><span class="text-black-50"></span><span>
                    <?php echo '' . $row['email'] . ''; ?>
                  </span>
            </div>
        <?php }
              } ?>
          </div>
          <div class="col-md-7 border-right">
            <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-center">Thông tin chi tiết</h4>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'btl_ql', '3306');

                if (!$conn) {
                  die("kết nối thất bại. Kiểm tra lại");
                }
                $userid = $_GET['id'];
                $slt = mysqli_query($conn, "Select * from infor_users where infor_id = '$userid'");
                if (mysqli_num_rows($slt) > 0) {
                  $row = mysqli_fetch_assoc($slt);
                }
                ?>
              </div>
              <!-- Table detail infor user -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Tuổi</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Nhóm</th>
                    <th scope="col">Số điện thoại</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $conn = mysqli_connect('localhost', 'root', '', 'btl_ql', '3306');
                  if (!$conn) {
                    die("kết nối thất bại. Kiểm tra lại");
                  }
                  $userid = $_GET['id'];
                  $slt = mysqli_query($conn, "Select * from infor_users a, group_users b where a.group_id=b.group_id and infor_id = '$userid'");
                  if (mysqli_num_rows($slt) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($slt)) {
                      // echo '<pre>';
                      // echo print_r($row);
                      // echo '</pre>';
                  ?>
                      <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['group_name'] ?></td>
                        <td><?php echo $row['phone_number'] ?></td>

                      </tr>
                  <?php
                      $i++;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
          <div class="row">
            <footer class="text-center text-white" style="background-color: #f1f1f1;">
              <!-- Grid container -->
              <div class="container pt-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                  <!-- Facebook -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-facebook-f"></i
                  ></a>

                  <!-- Twitter -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-twitter"></i
                  ></a>

                  <!-- Google -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-google"></i
                  ></a>

                  <!-- Instagram -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-instagram"></i
                  ></a>

                  <!-- Linkedin -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-linkedin"></i
                  ></a>
                  <!-- Github -->
                  <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
                    ><i class="fab fa-github"></i
                  ></a>
                </section>
                <!-- Section: Social media -->
              </div>
              <!-- Grid container -->

              <!-- Copyright -->
              <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="#">MDBootstrap.com</a>
              </div>
              <!-- Copyright -->
            </footer>
        </div>
      </div>
  </div>
</body>

</html>
