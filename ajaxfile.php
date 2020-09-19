<?php
include "config.php";

$request = $_POST['request'];

// Enable/Disable user
if($request == 1){
    $active = $_POST['active'];
    $username = $_POST['username'];

    $return_val = "";
    if($active == 0){
        $return_val = "Enable";
    }else{
        $return_val = "Disable";
    }

    // Update active value
    $sql = "UPDATE users SET active=".$active." WHERE username='".$username."'";
    mysqli_query($con,$sql);

    echo $return_val;
    exit;
}

// Login user
if($request == 2){
    $uname = $_POST['username'];
    $password = $_POST['password'];

    if ($uname != "" && $password != ""){

        $sql_query = "SELECT count(*) as cntUser FROM users WHERE username='".$uname."' AND password='".$password."' AND active=1";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            echo 1;
        }else{
            echo 0;
        }

    }
    exit;
}
