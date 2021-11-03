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
            <div class="col-md-12 d-flex justify-content-center text-center my-5">
                <form action="process_change_password.php" method="post">
                    <!-- Email input -->
                        <?php
                            if(isset($_GET['response'])){
                                if($_GET['response']=='fail1'){
                                    echo "<p class='text-danger'>Mật khẩu không đúng</p>";
                                }
                                if($_GET['response']=='fail2'){
                                    echo "<p class='text-danger'>Mật khẩu không khớp nhau</p>";
                                }
                                if($_GET['response']=='success'){
                                    echo "<p class='text-danger'>Thay đổi mật khẩu thành công</p>";
                                }
                            }
                        ?>

                    <div class="form-outline mb-4">
                        <?php $id = $_GET['id']; ?>
                        <input type="hidden"  class="form-control" name="users_id" value="<?php echo $id ?>"/>
                        <input type="password" id="form1Example1" class="form-control" name="pass1"/>
                        <label class="form-label" for="form1Example1">Nhập mật khẩu hiện tại</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example2" class="form-control" name="pass2"/>
                        <label class="form-label" for="form1Example2">Mật khẩu mới</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example2" class="form-control" name="pass3"/>
                        <label class="form-label" for="form1Example2">Xác nhận mật khẩu</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" name="btn_save">Lưu</button>
                </form>
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
                <a class="text-dark" href="#">Nhóm 17</a>
              </div>
              <!-- Copyright -->
            </footer>
        </div>
      </div>
  </div>
</body>

</html>
