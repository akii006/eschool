<?php
if(!isset($_SESSION)){
    session_start();
}
    include_once('../dbconnection.php');

    if(isset($_POST['semail'])){
        $semail=$_POST['semail'];
        $sql = "SELECT s_email FROM student WHERE s_email ='".$semail."' ";
        $result = $conn->query($sql);
        $row = $result -> num_rows;
        echo json_encode($row);
    }

    if(isset($_POST['sname'])&&isset($_POST['semail'])&&isset($_POST['spassword'])){
       
        $sname=$_POST['sname'];
        $semail=$_POST['semail'];
        $spassword=$_POST['spassword'];

        $sql = "INSERT INTO student(s_name,s_email,s_password) VALUES ('$sname','$semail','$spassword')";
        if($conn->query($sql) == TRUE){
            echo json_encode(1);
        }
        else{
            echo json_encode(0);
        }
    }


    if(!isset($_SESSION['is_login'])){
    if(isset($_POST['slemail'])&&isset($_POST['slpassword'])){
        $slemail=$_POST['slemail'];
        $slpassword=$_POST['slpassword'];

        $sql = "SELECT s_email , s_password FROM student WHERE s_email= '".$slemail."' AND s_password = '".$slpassword."' ";
        $result = $conn->query($sql);
        $row = $result -> num_rows;
        if($row == 1){
            $_SESSION['is_login'] = true;
            $_SESSION['semail'] = $slemail;
            echo json_encode($row);
        }
        else if($row == 0){
            echo json_encode($row);
        }
    }
}
?>
