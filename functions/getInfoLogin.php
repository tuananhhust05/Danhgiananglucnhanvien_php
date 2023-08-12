<?php

function getInfoCom()
{
// khi đẩy lên sẽ xứ lý (Anh Lâm)
$access_token =
'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJDaGFtY29uZzM2NS1UaW12aWVjMzY1IiwiaWF0IjoxNjM4MjM1MjYxLCJleHAiOjE2MzgzMjE2NjEsImRhdGEiOnsiaWQiOiIxNzYxIiwibmFtZSI6IkNcdTAwZjRuZyB0eSB0ZXN0IDEyMyIsImVtYWlsIjoiRGFhODkyNTdAendvaG8uY29tIiwicm9sZSI6IjEiLCJvcyI6MSwiZnJvbSI6ImNjMzY1In19.RBl91pPDE-0XsLxdpDZ1Og7_rqw3OjnmYDYzU9O_AcM';
$id = '1761'; //4803 4687
$com_id = '1761';
$type = 1; //1.công ty, 2.nhân viên
$name = 'Công ty test 123';
$email = 'daa89257@zwoho.com';
$logo = 'https://chamcong.24hpay.vn/upload/company/logo/2021/11/12/app1636687701_074b492f9a.jpg';
$phone = '0987654321';
$role = 1;
$refresh_token =
'81354b7c1f65acc8bb8ad439fbe8cca6.eyJ0eXBlIjoyLCJleHAiOjE2Mzg4MzkxNTksImlkIjoiMTc2MSIsIm9zIjoxLCJmcm9tIjoiY2MzNjUifQ';
$data_insert = [
'id' => $id,
'com_id' => $com_id,
'name' => $name,
'email' => $email,
'logo' => $logo,
'phone' => $phone,
'access_token' => $access_token,
'type' => $type,
];
return $data_insert;
}
?>