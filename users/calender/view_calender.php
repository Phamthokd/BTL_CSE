<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="../fullcalendar/lib/jquery.min.js"></script>
<script src="../fullcalendar/lib/moment.min.js"></script>
<script src="../fullcalendar/fullcalendar.min.js"></script>
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
      <?php include('../profile/menu.php') ?>    
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