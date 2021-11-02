<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <title>Admin</title>
  </head>
<body>
  <div class="swap">
    <div class="container">
      <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- Container wrapper -->
          <div class="container-fluid">
            <!-- Toggle button -->
            <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Navbar brand -->
              <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                  src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
                  height="15"
                  alt=""
                  loading="lazy"
                />
              </a>
              <!-- Left links -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php"><i class="fas fa-users"></i> Quản lý người dùng</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./send_notifi.php">Thông báo</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Projects</a>
                </li> -->
              </ul>
              <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <div class="d-flex align-items-center">
            <!-- Right elements -->
                <!-- Notifications -->
                <a
                  class="text-reset me-3 dropdown-toggle hidden-arrow"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="fas fa-paper-plane"></i>
                  
                  <span class="badge rounded-pill badge-notification bg-danger">
                      <?php
                          $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                          
                          if(!$conn){
                          die("kết nối thất bại. Kiểm tra lại");
                          }
                          $sql = "SELECT * FROM `infor_users` a, users b , plan c WHERE a.userid=b.userid and c.infor_id=a.infor_id AND DATEDIFF(c.date_start,CURDATE())=2 or a.userid=b.userid and c.infor_id=a.infor_id AND DATEDIFF(c.date_start,CURDATE())=1";
                          $result = mysqli_query($conn,$sql);
                          echo (mysqli_num_rows($result));
                      ?>
                  
                  </span>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                    <?php
                      if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                  <li>
                    <a class="dropdown-item" href="send_mail.php">
                          
                      <div class="mr-3">
                      <div class="small text-gray-500"><i class="fas fa-calendar-alt"></i><?php echo ' '.$row['date_start'].'';?></div>
                      <span class="font-weight-bold"><?php echo ''.$row['title'].'';?> của <?php echo ''.$row['email'].'';?> </span>
                        
                    </div> 

                    </a>
                    <?php
                        }}
                    ?>
                  </li>
                </ul>  

              <!-- Avatar -->
              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="https://mdbootstrap.com/img/new/avatars/2.jpg"
                  class="rounded-circle"
                  height="25"
                  alt=""
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li>
                  <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            <form action="process_send.php" method="post">
            <div class="mb-3">
                    <?php
                        if(isset($_GET['response'])){
                            if($_GET['response']=='success'){
                                echo "<p class='text-danger'>Thư gửi thành công</p>";
                            }
                            if($_GET['response']=='fail'){
                                echo "<p class='text-danger'>Thư gửi thất bại</p>";
                            }
                        }
                    ?>
                <label for="content" class="form-label">Nhập nội dung cần thông báo</label>
                <textarea class="form-control" id="content" rows="13" name="content" placeholder="Nội dung ..."></textarea>
            </div>
                <button type="submit" class="btn btn-primary" name="btn_send">Gửi</button>
            </form>

            </div>
        </div>
    </div>


    <div class="container">
      <div class="row">
      <footer class="bg-light text-center text-white">
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
              <!-- Facebook -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
              ></a>

              <!-- Twitter -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #55acee;"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
              ></a>

              <!-- Google -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #dd4b39;"
                href="#!"
                role="button"
                ><i class="fab fa-google"></i
              ></a>

              <!-- Instagram -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
              ></a>

              <!-- Linkedin -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #0082ca;"
                href="#!"
                role="button"
                ><i class="fab fa-linkedin-in"></i
              ></a>
              <!-- Github -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #333333;"
                href="#!"
                role="button"
                ><i class="fab fa-github"></i
              ></a>
            </section>
            <!-- Section: Social media -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
          <!-- Copyright -->
        </footer>
      </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
  </div>
</body>
