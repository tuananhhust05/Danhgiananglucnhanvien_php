<?
// include('config.php');
session_unset();
session_destroy();

unset($_COOKIE['acc_token']);
unset($_COOKIE['rf_token']);
unset($_COOKIE['role']);
unset($_COOKIE['time_login']);
unset($_COOKIE['permission']);


setcookie('acc_token', null, -1, '/','.timviec365.vn');
setcookie('rf_token', null, -1, '/','.timviec365.vn');
setcookie('role', null, -1, '/','.timviec365.vn');
setcookie('permission', null, -1, '/','.timviec365.vn');
setcookie('user', null, -1, '/','.timviec365.vn');


unset($_COOKIE);

if (!isset($_COOKIE['acc_token']) && !isset($_COOKIE['rf_token']) && !isset($_COOKIE['role'])){
    header('Location:/');
    exit();
}
?>
