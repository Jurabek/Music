<?php
include("db_info.php");
if(isset($_POST['enter'])){
    $login = clearData($_POST['enter-login']);
    $password = clearData($_POST['enter-password']);
    if(is_array($result = checkUserLoginAndPassword($login, $password))){
        header("Location: ../index.php");
        $_SESSION['user'] = $result;
    }
    else{
        echo $result;
    }
}