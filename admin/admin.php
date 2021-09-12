<?php 
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

if(!isset($_SESSION['is_alog'])){
if(isset($_POST['alemail'])&&isset($_POST['alpassword'])){
    $alemail=$_POST['alemail'];
    $alpassword=$_POST['alpassword'];

    $sql = "SELECT a_email , a_password FROM admin WHERE a_email= '".$alemail."' AND a_password = '".$alpassword."' ";
    $result = $conn->query($sql);
    $row = $result -> num_rows;
    if($row == 1){
        $_SESSION['is_alog'] = TRUE;
        $_SESSION['adminemail'] = $alemail;
        echo json_encode($row);
    }
    else if($row == 0){
        echo json_encode($row);
    }
}
}
