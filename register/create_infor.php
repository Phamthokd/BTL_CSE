<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
        <form class="form-horizontal" role="form" action="process_infor.php" method="post">
            <h2>Vui lòng nhập thông tin!</h2>
            <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">Họ</label>
                <div class="col-sm-9">
                    <input type="text" id="first_name" placeholder="Họ" class="form-control" name="first_name">
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Tên</label>
                <div class="col-sm-9">
                    <input type="text" id="last_name" placeholder="Tên" class="form-control" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-3 control-label">Tuổi</label>
                <div class="col-sm-9">
                    <input type="text" id="age" placeholder="Tuổi" class="form-control" name= "age">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-9">
                    <input type="text" id="address" placeholder="Địa chỉ" class="form-control" name="address">
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-sm-3 control-label">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="date" id="date" class="form-control" name="date">
                </div>
            </div>
            <div class="form-group">
                <label for="phone_number" class="col-sm-3 control-label">Số điện thoại </label>
                <div class="col-sm-9">
                    <input type="phoneNumber" id="phone_number" placeholder="Số điện thoại" class="form-control" name="phone_number">
                    <span class="help-block">Số điện thoại của bạn sẽ không bị tiết lộ ở bất cứ đâu</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3">giới tính</label>
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
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">email</label>
                <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" value=<?php if (isset($_GET['accout'])) {
        $email = $_GET['accout'];
        echo $email;} ?> readonly>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="btn_infor">Đăng ký</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
</body>
</html>