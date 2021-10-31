<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css"
      rel="stylesheet"/>
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <li class="nav-item ">
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
                      ?>
                      <a class="nav-link" href="http://localhost:88/BTL_CSE/users/?email=<?php echo $row['email']; ?>">Trang chủ</a>
                    </li>
                    <li class="nav-item" active>
                      <a class="nav-link fw-bold" aria-current="page"  href="#">Thông tin cá nhân</a>
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
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                </div>
              </div>
            </nav>
              <!-- Navbar -->
              <!-- Background image -->
          </div>
        </div>
      </div>
      <!-- Background image -->
    </header>
    <div class="main">
        <div class="container rounded bg-white mt-5 mb-5">
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
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Nhóm</th>
                                    <th scope="col">Số điện thoại</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $conn = mysqli_connect('localhost','root','','btl_ql','3306');        
                                  if(!$conn){
                                    die("kết nối thất bại. Kiểm tra lại");
                                  }
                                  $userid = $_GET['id'];
                                  $slt = mysqli_query($conn, "Select * from infor_users a, group_users b where a.group_id=b.group_id and infor_id = '$userid'");
                                  if (mysqli_num_rows($slt) > 0) {
                                      $i=1;
                                      while($row = mysqli_fetch_assoc($slt)){
                                        // echo '<pre>';
                                        // echo print_r($row);
                                        // echo '</pre>';
                                ?>
                                        <tr>
                                          <th scope="row"><?php echo $i ?></th>
                                          <td><?php echo $row['first_name'].' '.$row['last_name'] ?></td>
                                          <td><?php echo $row['gender'] ?></td>
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
</body>
</html>