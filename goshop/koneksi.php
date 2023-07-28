<?php
$con = mysqli_connect("localhost", "root", "", "goshop");
// Check connection
    if(mysqli_connect_errno()){
        echo "Failed to connect to MYSQL: " . mysqli_connect_error();
    }
