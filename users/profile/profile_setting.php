<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!DOCTYPE html>
<html lang="en">
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
<script src=" https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/my_js.js"></script>
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
      <header class="pb-5">
        <!-- Navbar -->
        
          
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
                      <?php
                        $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                        
                        if(!$conn){
                          die("kết nối thất bại. Kiểm tra lại");
                        }
                        if(isset($_GET['id']))
                        $userid = $_GET['id'];
                        $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and a.infor_id = '$userid'";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          while($row = mysqli_fetch_assoc($result)){
                            $email=$row['email'];
                        ?>
                        <a class="nav-link" aria-current="page" href="http://localhost:88/BTL_CSE/users/?email=<?php echo $email ?>">Trang chủ</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="http://localhost:88/BTL_CSE/users/profile/detail_infor_users.php?id=<?php echo $row['infor_id'];?>">Thông tin cá nhân</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">hỗ trợ</a>
                      </li>
                    </ul>
                  </div>
                  <div class="flex-shrink-0 dropdown">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Sign out</a></li>
                  </ul>
                  </div>
                </div>
              </nav>
                <!-- Navbar -->
                <!-- Background image -->

        
        <!-- Background image -->
      </header>
      </div>
  </div>
    <div class="main">
        <div class="container rounded bg-light mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <?php
                          echo ''.$row['first_name'].' '.$row['last_name'].'';
                        ?>
                    <span class="font-weight-bold"></span><span class="text-black-50"></span><span>
                      <?php echo ''.$row['email'].'';}} ?>
                    </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thay đổi thông tin</h4>
                            <?php
                              $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                              
                              if(!$conn){
                                die("kết nối thất bại. Kiểm tra lại");
                              }
                              $userid = $_GET['id'];
                              $slt = mysqli_query($conn, "Select * from infor_users where infor_id = '$userid'");
                              if (mysqli_num_rows($slt) > 0) {
                                  $row = mysqli_fetch_assoc($slt);
                              } 
                            ?>
                            <?php
                                if (isset($_POST['btn_save'])) {
                                $first_name = $_POST['first_name'];
                                $last_name = $_POST['last_name'];
                                $age = $_POST['age'];
                                $address = $_POST['address'];
                                $date = $_POST['date'];
                                $gender = $_POST['gender'];
                                $phone_number = $_POST['phone_number'];
                                
                                    $update = mysqli_query($conn, "update infor_users set first_name = '$first_name', last_name='$last_name', 
                                    age='$age',address = '$address',gender = '$gender', phone_number = '$phone_number'
                                    where infor_id = '$userid'");
                                    if ($update == TRUE) {
                                        echo "thành công";
                                    } else {    
                                        echo "thất bại";
                                    }
                                }

                            ?>
                        </div>
                        <form action="" method="post">
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Họ</label><input type="text" class="form-control" placeholder="Họ" value="<?php echo $row['first_name']; ?>" name="first_name"></div>
                                <div class="col-md-6"><label class="labels">Tên</label><input type="text" class="form-control" value="<?php echo $row['last_name'] ?>" placeholder="Tên" name="last_name"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Tuổi</label><input type="text" class="form-control" placeholder="Tuổi" value="<?php echo $row['age'] ?>" name="age"></div>
                                <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo $row['address'] ?>" name="address"></div>
                                <div class="col-md-12"><label class="labels">ngày sinh</label><input type="date" class="form-control" placeholder="ngày sinh" value="<?php echo $row['date'] ?>" name="date"></div>
                                <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="phoneNumber" class="form-control" placeholder="Số điện thoại" value="<?php echo $row['phone_number'] ?>" name="phone_number"></div>
                                <label class="control-label col-sm-3">Giới tính:</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <input <?php if ($row['gender'] == "nữ") echo "checked"; ?> type="radio" name="gender" value="nữ"><label>nữ</label>
                                        </div>
                                        <div class="col-sm-4">
                                        <input <?php if ($row['gender'] == "nam") echo "checked"; ?> type="radio" name="gender" value="nam"><label>nam</label>
                                        </div>
                                        <div class="col-sm-4">
                                        <input <?php if ($row['gender'] == "khác") echo "checked"; ?> type="radio" name="gender" value="khác"><label>khác</label>
                                        </div>
                                    </div>   
                                </div>
                                
                            </div> 
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="btn_save">Lưu</button></div> 
                        </form>
                    </div> 
                </div>           
            </div>
        </div>
    </div>
    <div class="container mt-5">
          <div class="row">
            <footer class="bg-primary text-white text-center text-lg-start">
              <!-- Grid container -->
              <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h4 class="text-uppercase">Cho phép người dùng</h4>

                    <p>
                      Quản lý thông tin cá nhân,
                      Lên kế hoạch lịch làm việc với các kế hoạch làm việc được giao hoặc tạo mới các kế hoạch
                      làm việc,
                      Nhận thông báo về các lịch làm việc gần kề,
                      Nhận email về các lịch làm việc gần kề.
                    </p>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h4 class="text-uppercase">Cho phép người quản lý</h4>

                    <p>
                      Quản lý người sử dụng và các nhóm người sử dụng,
                      Lên kế hoạch lịch làm việc cho các cá nhân hoặc cho các nhóm người sử dụng,
                      Quản lý các kế hoạch làm việc và các nhóm kế hoạch làm việc,
                      Gửi thông báo đến các người sử dụng hoặc các nhóm người sử dụng.
                    </p>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Grid container -->

              <!-- Copyright -->
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white">Nhóm 17</a>
              </div>
              <!-- Copyright -->
            </footer>
        </div>
      </div>
    
</div>

</body>
</html>