<?php
    include("../config/db.php");
    $email=$_GET['email'];
    $json = array();
    $sqlQuery = "SELECT * FROM plan a ,infor_users b, users c WHERE a.infor_id=b.infor_id and b.userid=c.userid and c.email='$email' ORDER BY plan_id";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // hien event ra lich
        $obj = new stdClass();
        $obj->title = $row["title"];
        $obj->id = $row["plan_id"];
        $obj->start = $row["date_start"];
        $obj->end = $row["date_end"];
        // $obj->infor_id = $row["infor_id"];
        array_push($eventArray, $obj);
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode($eventArray);
?>