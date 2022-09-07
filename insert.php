<?php
    $connect = mysqli_connect("localhost", "root", "", "angularjs");
    $data = json_decode(file_get_contents("php://input"));

    if(count(array($data)) > 0){
        $id_received = mysqli_real_escape_string($connect,  $data->send_id);
        $name_received = mysqli_real_escape_string($connect,  $data->send_name);
        $email_received = mysqli_real_escape_string($connect,  $data->send_email);
        $phone_received = mysqli_real_escape_string($connect,  $data->send_phone);
        $zip_received = mysqli_real_escape_string($connect,  $data->send_zip);
        $status_received = mysqli_real_escape_string($connect,  $data->send_status);
        $btn_received = mysqli_real_escape_string($connect,  $data->send_btn);

        // insert data in database
        if($btn_received == "Add"){
            $query = "INSERT INTO register(Name, Email, Phone, Zip, Status) VALUES ('$name_received', '$email_received', '$phone_received', '$zip_received', '$status_received')";
            $insert = mysqli_query($connect,$query);
        }

        // update data in database
        if($btn_received == "Update"){
            $query1 = "UPDATE `register` SET `Name`='$name_received',`Email`='$email_received',`Phone`='$phone_received',`Zip`='$zip_received',`Status`='$status_received' WHERE Id='$id_received'";
            $update = mysqli_query($connect,$query1);
        }
    }
?>