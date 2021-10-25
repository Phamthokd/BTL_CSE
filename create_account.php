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
    
    <section class="vh-100 bg-image" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Tạo 1 tài khoản</h2>

                <form action="process_account.php" method="post">
                    <div class="form-outline mb-4">
                        <?php
                            if(isset($_GET['response'])){
                              if($_GET['response'] == 'existed'){
                                echo "<p class='text-danger'>email đã tồn tại</p>";
                              }
                            }
                        ?>
                        <?php
                            if(isset($_GET['response'])){
                              if($_GET['response'] == 'success'){
                                echo "<p class='text-danger'>Xác nhận tài khoản trong email của bạn</p>";
                              }
                            }
                        ?>
                    <input type="email" id="email" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="email">Nhập email của bạn</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="pass1" class="form-control form-control-lg" name="pass1"/>
                    <label class="form-label" for="pass1">Mật khẩu</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="pass2" class="form-control form-control-lg" name="pass2" />
                    <label class="form-label" for="pass2">Xác nhận mật khẩu</label>
                    </div>
                    <?php
                        if(isset($_GET['response'])){
                            if($_GET['response']=='error'){
                                echo "<p class='text-danger'>Vui lòng xác nhận</p>";
                            }
                        }
                    ?>
                    <div class="form-check d-flex justify-content-center mb-5">
                    <input
                        class="form-check-input me-2"
                        type="checkbox"
                        value=""
                        id="checkbox"
                        name="checkbox"
                    />
                    <label class="form-check-label" for="form2Example3g">
                        Bạn có đồng ý với tất cả <a href="#!" class="text-body"><u>quy định và bảo mật</u></a>
                    </label>
                    </div>

                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_account">Đăng ký</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a href="#!" class="fw-bold text-body"><u>Đăng nhập tại đây.</u></a></p>

                </form>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>