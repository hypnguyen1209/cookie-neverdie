<?php
//tạo acc tại https://cron-job.org/en/signup/
$email = "miumiumeu123@gmail.com"; //Không sửa cx đc

$pass = "VzsVVcDyb3Y3THu"; //Không sửa cx đc
/* ----------------- */
$directory = "http://localhost/cooo"; //Sửa 

$username = "root "; //Sửa

$password = ""; //Sửa

$hostname = "localhost"; //Sửa

$database = "cookie"; //Sửa

$connection = new mysqli($hostname, $username, $password, $database);

if($connection->connect_error) {
    die("CAN'T CONNECT");
}