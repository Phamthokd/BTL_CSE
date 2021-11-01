<?php
        $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                    
    if(!$conn){
    die("kết nối thất bại. Kiểm tra lại");
    }
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $start = isset($_POST['start']) ? $_POST['start'] : "";
    $end = isset($_POST['end']) ? $_POST['end'] : "";
    $ID = $_POST['ID'];
    $sql = "SELECT * FROM `infor_users` a, `group_users` b WHERE a.group_id=b.group_id AND a.group_id = '$ID'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
        $ID1 = $row['infor_id'];

        $sqlInsert = "INSERT INTO plan (title,date_start,date_end,infor_id) VALUES ('".$title."','".$start."','".$end ."','".$ID1 ."')";}

        $result = mysqli_query($conn, $sqlInsert);

        if (!$result) {
            $result = mysqli_error($conn);
        }
    }
        else {
            $last_id = mysqli_insert_id($conn);
        echo $last_id;
}
?>