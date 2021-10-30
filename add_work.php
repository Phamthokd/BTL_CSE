<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add</title>
  </head>
  <body>
      <header class="p-3  btn-success text-white">
          <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                  <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                  <svg class="bi me-2" width="40" height="32" role="img" aria-label="Khởi động" _mstaria-label="2264249"><use xlink:href="#bootstrap"></use></svg>
                  </a>

                  <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <li><a href="index.php" class="nav-link px-2 text-white" _msthash="1633359" _msttexthash="44122">Hệ thống quản lý</a></li>
                    
                   </ul>
              </div>
          </div>
      </header>
      <main class="mt-4">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Thêm dữ liệu</h2>
                <form action="process_add_work.php" method="post">
                  <div class="row mb-3">
                    <label for="txtMaCV" class="col-sm-2 col-form-label">Mã công việc</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtMaCV" name="txtMaCV">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtTenCV" class="col-sm-2 col-form-label">Tên công việc</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtTenCV" name="txtTenCV">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNDCV" class="col-sm-2 col-form-label">Nội dung công việc</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtNDCV" name="txtNDCV">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNgaybd" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="txtNgaybd" name="txtNgaybd">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNgaykt" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="txtNgaykt" name="txtNgaykt">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtifid" class="col-sm-2 col-form-label">Thực hiện bởi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtifid" name="txtifid">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                </form>
              </div>
            </div>
        </div>
      </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>