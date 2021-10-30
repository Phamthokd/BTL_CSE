<?php
    include("../config/db.php");

    $json = array();
    $sqlQuery = "SELECT * FROM plan ORDER BY plan_id";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // hien event ra lich
        $obj = new stdClass();
        $obj->title = $row["title"];
        $obj->id = $row["plan_id"];
        $obj->start = $row["date_start"];
        $obj->end = $row["date_end"];
        array_push($eventArray, $obj);
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode($eventArray);
?>