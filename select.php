<?php
    $connect = mysqli_connect("localhost", "root", "", "angularjs");
    $output = array();

    // select data in database
    $query = "SELECT * FROM register ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $output[] = $row;
        }
        echo json_encode($output);
    }
?>