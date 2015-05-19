<?php
include "db_info.php";
if(isset($_POST['saveData'])){
    echo var_dump($_POST);
    $name = $_POST['txtName'];
    $lastName = $_POST['txtLastName'];
    $email = $_POST['txtEmail'];
    $password = $_POST['password'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $gender = $_POST['gender'] == 1 ? 'male' : 'female';
    $country = $_POST['country'];
    $birthday = $year."-".$month."-".$day;
    $country =1;
    echo insertUser($name, $lastName,$email, $password, $birthday,$gender, $country);
}