<?php
    $conn = new mysqli("localhost","root","","learn");

    if($conn -> connect_error){
        die("connection failed");
    }
?>