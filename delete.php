<?php
    $connect = mysqli_connect("localhost", "root", "", "angularjs");
    $data = json_decode(file_get_contents("php://input"));

    if(count(array($data)) > 0){
        $id_received = $data->send_id;
        $query = "DELETE FROM `register` WHERE Id='$id_received'";
        $delete = mysqli_query($connect,$query);
    }
?>