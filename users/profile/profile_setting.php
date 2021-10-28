<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css"
      rel="stylesheet"
    />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
          </div>
        </div>
      </div>
      <!-- Background image -->
    </header>
    <div class="main">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Php</span><span class="text-black-50">php@mail.com.my</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thay đổi thông tin</h4>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'btl_ql');
                            $infor_id = $_GET['infor_id'];
                            $slt = mysqli_query($conn, "Select * from infor_id where infor_id = '$infor_id'");
                            if (mysqli_num_rows($slt) > 0) {
                                $row = mysqli_fetch_assoc($slt);
                            } else {
                                header('index.php');
                            }
                            ?>
                        </div>
                        <form action="update_infor.php" method="post">
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Họ</label><input type="text" class="form-control" placeholder="Họ" value="" name="first_name"></div>
                                <div class="col-md-6"><label class="labels">Tên</label><input type="text" class="form-control" value="" placeholder="Tên" name="last_name"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Tuổi</label><input type="text" class="form-control" placeholder="Tuổi" value="" name="age"></div>
                                <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" placeholder="Địa chỉ" value="" name="address"></div>
                                <div class="col-md-12"><label class="labels">ngày sinh</label><input type="date" class="form-control" placeholder="ngày sinh" value="" name="date"></div>
                                <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="phoneNumber" class="form-control" placeholder="Số điện thoại" value="" name="phone_number"></div>
                                <label class="control-label col-sm-3">Giới tính:</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="radio-inline">
                                                <input type="radio" id="femaleRadio" name="gender" <?php if (isset($gender) && $gender=="nữ") echo "checked";?> value="Female">Nữ
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="radio-inline">
                                                <input type="radio" id="maleRadio" name="gender" <?php if (isset($gender) && $gender=="nam") echo "checked";?> value="Male">Nam
                                            </label>
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
    
</div>

</body>
</html>