<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Quản lý người dùng</title>
  </head>
<body>
  <div class="swap">
    <div class="container">
      <div class="row">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-warning">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Trang chủ</a></li>
            <li><a href="../index.php" class="nav-link px-2 link-dark">Quản lý người dùng</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Quản lý nhóm</a></li>
            <li><a href="./send_notifi.php" class="nav-link px-2 link-dark">Gửi thông báo</a></li>
          </ul>

          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-light">Đăng xuất</button>
          </div>
      </header>
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
        <footer class="p-5 mt-5 d-flex justify-content-center bg-secondary py-3 text-white">
          <ul class="nav nav-pills">
            <li class="nav-item">Bài Tập Lớn Nhóm 17</li>
          </ul>
        </footer>
      </div>
    </div>
  </div>
</body>
