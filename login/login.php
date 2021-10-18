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
    <section class="vh-100">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6 text-black">

            <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0">Logo</span>
            </div>

            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form style="width: 23rem;" action="process-login.php" method="post">

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                <label class="form-label" for="email"></label>
                </div>

                <div class="form-outline mb-4">
                <input type="password" id="pass" name="pass" class="form-control form-control-lg" placeholder="Mật khẩu"/>
                <label class="form-label" for="pass"></label>
                </div>
                <?php
                    if(isset($_GET['response'])){
                        if($_GET['response']='fales1'){
                            echo "<p class='text-danger'>email hoặc mật khẩu không hợp lệ. Vui lòng thử lại!</p>";
                        }
                    }
                ?>
                <div class="pt-1 mb-4">
                <button class="btn btn-info btn-lg btn-block" name="btn-login" type="submit" >Đăng nhập</button>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Quên mật khẩu?</a></p>
                <p>Bạn chưa có tài khoản? <a href="#!" class="link-info">Đăng ký</a></p>

            </form>

            </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img3.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
        </div>
    </div>
    </section>
</body>
</html>