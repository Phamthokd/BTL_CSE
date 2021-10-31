<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
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
        <header class="pb-5">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
                </li>
                <!--  -->
                <li class="nav-item">
                <?php
                    $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                    
                    if(!$conn){
                    die("kết nối thất bại. Kiểm tra lại");
                    }
                    if(isset($_GET['id']))
                    $infor_id = $_GET['id'];
                    $sql = "SELECT * FROM `infor_users` a WHERE a.infor_id = '$infor_id'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <a class="nav-link" href="http://localhost:88/BTL_CSE/users/profile/detail_infor_users.php?id=<?php echo $row['infor_id'];}}?>">Thông tin cá nhân</a>
                
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trợ giúp</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

            <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">
                <?php
                  $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                      
                  if(!$conn){
                    die("kết nối thất bại. Kiểm tra lại");
                  }
                  if(isset($_GET['id']))
                  $infor_id=$_GET['id'];
                  $sql = "SELECT * FROM `infor_users` a , plan c WHERE c.infor_id=a.infor_id and a.infor_id = '$infor_id' AND DATEDIFF(c.date_start,CURDATE())=2";
                  $result = mysqli_query($conn,$sql);
                  echo (mysqli_num_rows($result));
                ?>
                +</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Thông báo
                </h6>
                <?php
                  $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                      
                  if(!$conn){
                    die("kết nối thất bại. Kiểm tra lại");
                  }
                  if(isset($_GET['id']))
                  $infor_id=$_GET['id'];
                  $sql = "SELECT * FROM `infor_users` a, plan c WHERE c.infor_id=a.infor_id and a.infor_id = '$infor_id' AND DATEDIFF(c.date_start,CURDATE())=2";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="small text-gray-500"><i class="fas fa-calendar-alt"></i><?php echo ' '.$row['date_start'].'';?></div>
                      <span class="font-weight-bold"><?php echo ''.$row['title'].'';?></span>
                        
                    </div>   
                </a>
                <?php
                  }
                }
                    ?>
                </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php
                $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                      
                if(!$conn){
                  die("kết nối thất bại. Kiểm tra lại");
                }
                if(isset($_GET['id']))
                $infor_id=$_GET['id'];
                $sql = "SELECT * FROM `infor_users` a WHERE a.infor_id = '$infor_id'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                    echo 'Xin chào '.$row['last_name'].'';}}
                  ?>
                </span>
                <img class="img-profile rounded-circle"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"" width="32" height="32">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <?php
                    $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                      
                    if(!$conn){
                      die("kết nối thất bại. Kiểm tra lại");
                    }
                    if(isset($_GET['email']))
                    $email=$_GET['email'];
                    $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and b.email LIKE '$email'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_assoc($result)){?>
                    <a class="dropdown-item" href="http://localhost:88/BTL_CSE/users/profile/profile_setting.php?id=<?php echo $row['infor_id'];?>"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>sửa thông tin</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://localhost:88/BTL_CSE/logout/logout.php?id=<?php echo $row['infor_id'];}}?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Đăng xuất</a>
                </div>
                </li>

            </ul>
            </nav>
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
    
      <!-- Background image -->
        </header>
        
        
        <div class="main">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <?php
                $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                      
                if(!$conn){
                  die("kết nối thất bại. Kiểm tra lại");
                }
                if(isset($_GET['id']))
                $infor_id=$_GET['id'];
                $sql = "SELECT * FROM `infor_users` a,users b WHERE a.infor_id = '$infor_id' and a.userid=b.userid";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <?php
                      echo ''.$row['first_name'].' '.$row['last_name'].'';
                    ?>
                    <span class="font-weight-bold"></span><span class="text-black-50"></span><span>
                      <?php echo ''.$row['email'].'';}} ?>
                    </span></div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-center">Thông tin chi tiết</h4>
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
                        </div>
                              <!-- Table detail infor user -->
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $conn = mysqli_connect('localhost','root','','btl_ql','3306');        
                                  if(!$conn){
                                    die("kết nối thất bại. Kiểm tra lại");
                                  }
                                  $infor_id = $_GET['id'];
                                  $slt = mysqli_query($conn, "Select * from infor_users a, plan b where a.infor_id=b.infor_id and a.infor_id = '$infor_id' and DATEDIFF(b.date_start,CURDATE())=2");
                                  if (mysqli_num_rows($slt) > 0) {
                                      $i=1;
                                      while($row = mysqli_fetch_assoc($slt)){
                                        // echo '<pre>';
                                        // echo print_r($row);
                                        // echo '</pre>';
                                ?>
                                        <tr>
                                          <th scope="row"><?php echo $i ?></th>
                                          <td><?php echo $row['title'] ?></td>
                                          <td><?php echo $row['date_start'] ?></td>
                                          <td><?php echo $row['date_end'] ?></td>
                                          
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
    
</body>


</html>