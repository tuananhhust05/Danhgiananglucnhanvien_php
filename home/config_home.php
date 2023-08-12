<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_on_site'])) {
    $_SESSION['user_on_site'] = 1;
}

//setcookie('CP', null, -1, '/');

require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");

require_once("../classes/database.php");

require_once("../functions/pagebreak.php");
require_once("../functions/simple_html_dom.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$domain = "https://dev4.tinnhanh365.vn/";

if (isset($_COOKIE['acc_token']) && isset($_COOKIE['role']) && isset($_COOKIE['rf_token'])) {
    header('Location: /trang_chu_sau_dang_nhap.html');
    exit;
}
