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
                <h2 class="text-uppercase text-center mb-5">Thay đổi mật khẩu</h2>

                <form action="process_change.php" method="post">
                    <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="email">Tài khoản</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="pass" class="form-control form-control-lg" name="pass"/>
                    <label class="form-label" for="pass">Mật khẩu cũ</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="newpass" class="form-control form-control-lg" name="newpass" />
                    <label class="form-label" for="newpass">Mật khẩu mới</label>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-block btn-lg gradient-custom-4 text-body" name="btn_change">Đổi mật khẩu</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Bạn chưa có tài khoản? <a href="http://localhost:88/BTL_CSE/register/create_account.php" class="fw-bold text-body"><u>Đăng ký.</u></a></p>

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