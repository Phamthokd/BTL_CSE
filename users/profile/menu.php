<div class="container">
    <div class="row">
        <header class="pb-5">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--  -->
                    <?php
                    include('../../config/db.php');
                    if (isset($_GET['id']))
                        $id = $_GET['id'];
                    $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and a.infor_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="http://localhost:88/BTL_CSE/users/?email=<?php echo $row['email']; ?>">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:88/BTL_CSE/users/profile/detail_infor_users.php?id=<?php echo $row['infor_id']; ?>">Thông tin cá nhân</a>
                            </li>
                    <?php }
                    } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trợ giúp</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">
                                <?php
                                include('../../config/db.php');
                                if (isset($_GET['id']))
                                    $id = $_GET['id'];
                                $sql = "SELECT * FROM `infor_users` a, users b , plan c WHERE a.userid=b.userid and c.infor_id=a.infor_id and a.infor_id ='$id' AND DATEDIFF(c.date_start,CURDATE())=2";
                                $result = mysqli_query($conn, $sql);
                                echo (mysqli_num_rows($result));
                                ?>
                                +</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Thông báo
                            </h6>
                            <?php
                            include('../../config/db.php');
                            if (isset($_GET['id']))
                                $id = $_GET['id'];
                            $sql = "SELECT * FROM `infor_users` a, users b , plan c WHERE a.userid=b.userid and c.infor_id=a.infor_id and a.infor_id ='$id' AND DATEDIFF(c.date_start,CURDATE())=2";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <a class="dropdown-item d-flex align-items-center" href="http://localhost:88/BTL_CSE/users/calender/view_calender.php?id=<?php echo $row['infor_id']; ?>">
                                        <div class="mr-3">
                                            <div class="small text-gray-500"><i class="fas fa-calendar-alt"></i><?php echo ' ' . $row['date_start'] . ''; ?></div>
                                            <span class="font-weight-bold"><?php echo '' . $row['title'] . ''; ?></span>

                                        </div>
                                    </a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                include('../../config/db.php');
                                if (isset($_GET['id']))
                                    $id = $_GET['id'];
                                $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and a.infor_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo 'Xin chào ' . $row['last_name'] . '';
                                    }
                                }
                                ?>
                            </span>
                            <img class="img-profile rounded-circle" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"" width=" 32" height="32">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <?php
                            include('../../config/db.php');
                            if (isset($_GET['id']))
                                $id = $_GET['id'];
                            $sql = "SELECT * FROM `infor_users` a, users b WHERE a.userid=b.userid and a.infor_id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <a class="dropdown-item" href="http://localhost:88/BTL_CSE/users/profile/profile_setting.php?id=<?php echo $row['infor_id']; ?>"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>sửa thông tin</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://localhost:88/BTL_CSE/logout/logout.php?id=<?php echo $row['infor_id'];

                                                                                                                    ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Đăng xuất</a>
                            <?php }
                            } ?>
                        </div>
                    </li>

                </ul>
            </nav>
            <div class="p-5 text-center bg-image" style="background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg'); height: 200px;">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3">Sáng tạo, thay đổi, tư duy</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background image -->
        </header>
    </div>
</div>