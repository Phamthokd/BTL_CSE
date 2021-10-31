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
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-warning">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Trang chủ</a></li>
        <li><a href="http://localhost:81/test/index-user.php" class="nav-link px-2 link-dark">Quản lý người dùng</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Quản lý Nhóm</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Giới thiệu</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-light">Đăng xuất</button>
      </div>
  </header>
  <div class="content">
  <div class="col-md-12">
    <table class="table table-striped">
        <thead>
        <?php
            if(isset($_GET['response'])){
                if($_GET['response']=='xoa'){
                   echo "<p class='text-danger'>Xóa thành công</p>";
                }                        
              }
        ?>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ Tên</th>
        <th scope="col">Tuổi</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Nhóm</th>
        <th scope="col">Xóa</th>
        <th scope="col">Thêm công việc</th>
      </tr>
    </thead>
    <tbody>
    <?php
        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
        //bước 1:kết nối tời csdl(mysql)
        $conn = mysqli_connect('localhost','root','','btl_ql');
            if(!$conn){
                die("Không thể kết nối,kiểm tra lại các tham số kết nối");
                    }

         //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
        $sql = "SELECT*FROM infor_users";
        $result = mysqli_query($conn,$sql);

        //bước 3 xử lý kết quả trả về
        if(mysqli_num_rows($result) > 0){
            $i=1;
            while($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
      <th scope="row"><?php echo $i; ?> </th>
        <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </td>
        <td><?php echo $row['age']; ?> </td>
        <td><?php echo $row['address']; ?> </td>
        <td><?php echo $row['date']; ?> </td>
        <td><?php echo $row['gender']; ?> </td>
        <td><?php echo $row['phone_number']; ?> </td>
        <td><?php echo $row['group_id']; ?> </td>
        <td><a href="xoa-user.php?infor_id=<?php echo $row['infor_id']; ?>"><i class="fas fa-trash"></i></a></td>
        <td><a href="add_works.php?infor_id=<?php echo $row['infor_id']; ?>"><i class="fas fa-plus-square"></i></a></td>
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
  <footer class="p-5 d-flex justify-content-center bg-secondary py-3 text-white">
      <ul class="nav nav-pills">
        <li class="nav-item">Bài Tập Lớn Nhóm 17</li>
      </ul>
  </footer>
  

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