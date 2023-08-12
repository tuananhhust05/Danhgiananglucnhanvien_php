

<?
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_on_site'])) {
    $_SESSION['user_on_site'] = 1;
}
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../classes/database.php");
require_once("../functions/pagebreak.php");
require_once("../functions/simple_html_dom.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$domain = "https://dev4.timviec365.vn";

$ver = 1;

if ($_COOKIE['role'] == 3) {
    header("Location: https://quanlychung.timviec365.vn/thong-bao-truy-cap.html");
    die();
}

if (isset($_COOKIE['acc_token'])) {

    $token = $_COOKIE['acc_token'];
    //Check ip lưu tài khoản ntd
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    $ip = '';
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    $curl = curl_init();
    $data = array(
        'from' => 'dg365',
        'ip' => $ip,
    );
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/check_ip_access.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response == 0) {
        header("Location: https://quanlychung.timviec365.vn/loi-truy-cap.html");
        die();
    }
}
if (!isset($_COOKIE['acc_token']) && !isset($_COOKIE['role']) && !isset($_COOKIE['rf_token'])) {
    header('Location: /');
    exit;
}

// Tài khoản quyền nhân viên
if (isset($_COOKIE['role']) && $_COOKIE['role'] == 2) {
    // Đã đăng nhập và tắt trình duyệt vào lại
    if (!isset($_SESSION['ep_id'])) {
        $token = $_COOKIE['acc_token'];
        $curl = curl_init();
        $data = array();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_employee.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

        $response = curl_exec($curl);
        curl_close($curl);
        $data_tt = json_decode($response, true);

        if ($data_tt != '' && $data_tt['code'] != 401) {

            // acc_token còn hạn trả về kết quả thông tin user
            $time_now = time();
            $tt_user = $data_tt['data']['user_info_result'];
            $_SESSION['access_token'] = $_COOKIE['acc_token'];
            $_SESSION['refresh_token'] = $_COOKIE['rf_token'];
            $_SESSION['ep_id'] = $tt_user['ep_id'];
            $_SESSION['ep_name'] = $tt_user['ep_name'];
            $_SESSION['ep_phone'] = $tt_user['ep_phone'];
            $_SESSION['ep_image'] = $tt_user['ep_image'];
            $_SESSION['ep_address'] = $tt_user['ep_address'];
            $_SESSION['ep_authentic'] = $tt_user['ep_authentic'];
            $_SESSION['ep_email'] = $tt_user['ep_email'];
            $_SESSION['role_id'] = $tt_user['role_id'];
            $_SESSION['position_id'] = $tt_user['position_id'];
            $_SESSION['user_com_id'] = $tt_user['com_id'];
            $_SESSION['dep_id'] = $tt_user['dep_id'];
            $_SESSION['com_name'] = $tt_user['com_name'];
            $_SESSION['quyen'] = '2';
        } else {
            // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới

            $curl = curl_init();
            $data2 = array(
                'refresh_token' => $_COOKIE['rf_token']
            );
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            $response = curl_exec($curl);
            curl_close($curl);
            $data_token = json_decode($response, true);

            $time_now = time();
            if ($data_token != '' && $data_token['error']['code'] != 404) {
                $tt_user = $data_token['data']['user_info'];
                $_SESSION['access_token'] = $data_tt['data']['access_token'];
                $_SESSION['refresh_token'] = $data_tt['data']['refresh_token'];
                $_SESSION['ep_id'] = $tt_user['ep_id'];
                $_SESSION['ep_name'] = $tt_user['ep_name'];
                $_SESSION['ep_phone'] = $tt_user['ep_phone'];
                $_SESSION['ep_image'] = $tt_user['ep_image'];
                $_SESSION['ep_address'] = $tt_user['ep_address'];
                $_SESSION['ep_authentic'] = $tt_user['ep_authentic'];
                $_SESSION['ep_email'] = $tt_user['ep_email'];
                $_SESSION['role_id'] = $tt_user['role_id'];
                $_SESSION['position_id'] = $tt_user['position_id'];
                $_SESSION['user_com_id'] = $tt_user['com_id'];
                $_SESSION['dep_id'] = $tt_user['dep_id'];
                $_SESSION['com_name'] = $tt_user['com_name'];
                $_SESSION['quyen'] = '2';

                setcookie("acc_token", "", time() - 3600);
                setcookie("rf_token", "", time() - 3600);
                setcookie("role", "", time() - 3600);
                setcookie("user", "", time() - 3600);
                setcookie("permission", "", time() - 3600);
                setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu quyền người dùng
                setcookie("permission", $tt_user['role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu người dùng đăng nhập mục đích gì
                setcookie("role", '2', time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("user", $tt_user['ep_id'], time() + (86400 * 7), "/", ".timviec365.vn");
            } else {
                header('Location: /dang-xuat.html');
                exit;
            }
        }
    } else {
        // Cả 2 cùng đăng nhập sẽ lấy theo time_login lớn hơn
        if (isset($_COOKIE['user']) && ($_COOKIE['user'] != $_SESSION['ep_id'])) {
            echo "abc";
            $token = $_COOKIE['acc_token'];
            $curl = curl_init();
            $data = array();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_employee.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

            $response = curl_exec($curl);
            curl_close($curl);
            $data_tt = json_decode($response, true);

            if ($data_tt != '' && $data_tt['code'] != 401) {
                $time_now = time();
                // acc_token còn hạn trả về kết quả thông tin user
                session_unset();
                session_destroy();
                $tt_user = $data_tt['data']['user_info_result'];
                $_SESSION['access_token'] = $_COOKIE['acc_token'];
                $_SESSION['refresh_token'] = $_COOKIE['rf_token'];
                $_SESSION['ep_id'] = $tt_user['ep_id'];
                $_SESSION['ep_name'] = $tt_user['ep_name'];
                $_SESSION['ep_phone'] = $tt_user['ep_phone'];
                $_SESSION['ep_image'] = $tt_user['ep_image'];
                $_SESSION['ep_address'] = $tt_user['ep_address'];
                $_SESSION['ep_authentic'] = $tt_user['ep_authentic'];
                $_SESSION['ep_email'] = $tt_user['ep_email'];
                $_SESSION['role_id'] = $tt_user['role_id'];
                $_SESSION['position_id'] = $tt_user['position_id'];
                $_SESSION['user_com_id'] = $tt_user['com_id'];
                $_SESSION['dep_id'] = $tt_user['dep_id'];
                $_SESSION['com_name'] = $tt_user['com_name'];
                $_SESSION['quyen'] = '2';
            } else {
                // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới

                $curl = curl_init();
                $data2 = array(
                    'refresh_token' => $_COOKIE['rf_token']
                );
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
                curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                $response = curl_exec($curl);
                curl_close($curl);
                $data_token = json_decode($response, true);
                if ($data_token != '' && $data_token['error']['code'] != 404) {
                    session_unset();
                    session_destroy();
                    $time_now = time();
                    $tt_user = $data_token['data']['user_info'];
                    $_SESSION['access_token'] = $data_tt['data']['access_token'];
                    $_SESSION['refresh_token'] = $data_tt['data']['refresh_token'];
                    $_SESSION['ep_id'] = $tt_user['ep_id'];
                    $_SESSION['ep_name'] = $tt_user['ep_name'];
                    $_SESSION['ep_phone'] = $tt_user['ep_phone'];
                    $_SESSION['ep_image'] = $tt_user['ep_image'];
                    $_SESSION['ep_address'] = $tt_user['ep_address'];
                    $_SESSION['ep_authentic'] = $tt_user['ep_authentic'];
                    $_SESSION['ep_email'] = $tt_user['ep_email'];
                    $_SESSION['role_id'] = $tt_user['role_id'];
                    $_SESSION['position_id'] = $tt_user['position_id'];
                    $_SESSION['user_com_id'] = $tt_user['com_id'];
                    $_SESSION['dep_id'] = $tt_user['dep_id'];
                    $_SESSION['com_name'] = $tt_user['com_name'];
                    $_SESSION['quyen'] = '2';

                    setcookie("acc_token", "", time() - 3600);
                    setcookie("rf_token", "", time() - 3600);
                    setcookie("role", "", time() - 3600);
                    setcookie("permission", "", time() - 3600);
                    setcookie("user", "", time() - 3600);
                    setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu quyền người dùng
                    setcookie("permission", $tt_user['role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu người dùng đăng nhập mục đích gì
                    setcookie("role", '2', time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("user", $tt_user['ep_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                } else {
                    header('Location: /dang-xuat.html');
                    exit;
                }
            }
        }
    }
}
// Tài khoản quyền công ty
if (isset($_COOKIE['role']) && $_COOKIE['role'] == 1) {

    if (!isset($_SESSION['com_id'])) {
        $token = $_COOKIE['acc_token'];
        $curl = curl_init();
        $data = array();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_company.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

        $response = curl_exec($curl);
        curl_close($curl);
        $data_tt = json_decode($response, true);

        if ($data_tt != '' && $data_tt['code'] != 401) {

            // acc_token còn hạn trả về kết quả thông tin user
            session_unset();
            session_destroy();
            $time_now = time();
            $tt_user = $data_tt['data']['user_info_result'];
            $_SESSION['access_token'] = $_COOKIE['acc_token'];
            $_SESSION['refresh_token'] = $_COOKIE['rf_token'];
            $_SESSION['com_id'] = $tt_user['com_id'];
            $_SESSION['com_name'] = $tt_user['com_name'];
            $_SESSION['com_phone'] = $tt_user['com_phone'];
            $_SESSION['com_logo'] = $tt_user['com_logo'];
            $_SESSION['com_address'] = $tt_user['com_address'];
            $_SESSION['com_authentic'] = $tt_user['com_authentic'];
            $_SESSION['com_email'] = $tt_user['com_email'];
            $_SESSION['com_role_id'] = $tt_user['com_role_id'];
            $_SESSION['com_qr_logo'] = $tt_user['com_qr_logo'];
            $_SESSION['quyen'] = '1';
        } else {

            // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới

            $curl = curl_init();
            $data2 = array(
                'refresh_token' => $_COOKIE['rf_token']
            );
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            $response = curl_exec($curl);
            curl_close($curl);
            $data_token = json_decode($response, true);
            if ($data_token != '' && $data_token['error']['code'] != 404) {
                session_unset();
                session_destroy();
                $time_now = time();
                $tt_user = $data_tt['data']['user_info'];

                $_SESSION['access_token'] = $data_tt['data']['access_token'];
                $_SESSION['refresh_token'] = $data_tt['data']['refresh_token'];
                $_SESSION['com_id'] = $tt_user['com_id'];
                $_SESSION['com_name'] = $tt_user['com_name'];
                $_SESSION['com_phone'] = $tt_user['com_phone'];
                $_SESSION['com_logo'] = $tt_user['com_logo'];
                $_SESSION['com_address'] = $tt_user['com_address'];
                $_SESSION['com_authentic'] = $tt_user['com_authentic'];
                $_SESSION['com_email'] = $tt_user['com_email'];
                $_SESSION['com_role_id'] = $tt_user['com_role_id'];
                $_SESSION['com_qr_logo'] = $tt_user['com_qr_logo'];
                $_SESSION['quyen'] = '1';

                setcookie("acc_token", "", time() - 3600);
                setcookie("rf_token", "", time() - 3600);
                setcookie("role", "", time() - 3600);
                setcookie("permission", "", time() - 3600);
                setcookie("user", "", time() - 3600);
                setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu quyền người dùng
                setcookie("permission", $tt_user['com_role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu người dùng đăng nhập mục đích gì
                setcookie("role", '1', time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("user", $tt_user['com_id'], time() + (86400 * 7), "/", ".timviec365.vn");
            } else {
                header('Location: /dang-xuat.html');
                exit;
            }
        }
    } else {
        if (isset($_COOKIE['user']) && $_COOKIE['user'] != $_SESSION['com_id']) {
            $token = $_COOKIE['acc_token'];
            $curl = curl_init();
            $data = array();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_company.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

            $response = curl_exec($curl);
            curl_close($curl);
            $data_tt = json_decode($response, true);

            if ($data_tt != '' && $data_tt['code'] != 401) {

                // acc_token còn hạn trả về kết quả thông tin user
                $time_now = time();
                $tt_user = $data_tt['data']['user_info_result'];
                $_SESSION['access_token'] = $_COOKIE['acc_token'];
                $_SESSION['refresh_token'] = $_COOKIE['rf_token'];
                $_SESSION['com_id'] = $tt_user['com_id'];
                $_SESSION['com_name'] = $tt_user['com_name'];
                $_SESSION['com_phone'] = $tt_user['com_phone'];
                $_SESSION['com_logo'] = $tt_user['com_logo'];
                $_SESSION['com_address'] = $tt_user['com_address'];
                $_SESSION['com_authentic'] = $tt_user['com_authentic'];
                $_SESSION['com_email'] = $tt_user['com_email'];
                $_SESSION['com_role_id'] = $tt_user['com_role_id'];
                $_SESSION['com_qr_logo'] = $tt_user['com_qr_logo'];
                $_SESSION['quyen'] = '1';
            } else {

                // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới

                $curl = curl_init();
                $data2 = array(
                    'refresh_token' => $_COOKIE['rf_token']
                );
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
                curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                $response = curl_exec($curl);
                curl_close($curl);
                $data_token = json_decode($response, true);
                if ($data_token != '' && $data_token['error']['code'] != 404) {
                    $tt_user = $data_tt['data']['user_info'];
                    $_SESSION['access_token'] = $data_tt['data']['access_token'];
                    $_SESSION['refresh_token'] = $data_tt['data']['refresh_token'];
                    $_SESSION['com_id'] = $tt_user['com_id'];
                    $_SESSION['com_name'] = $tt_user['com_name'];
                    $_SESSION['com_phone'] = $tt_user['com_phone'];
                    $_SESSION['com_logo'] = $tt_user['com_logo'];
                    $_SESSION['com_address'] = $tt_user['com_address'];
                    $_SESSION['com_authentic'] = $tt_user['com_authentic'];
                    $_SESSION['com_email'] = $tt_user['com_email'];
                    $_SESSION['com_role_id'] = $tt_user['com_role_id'];
                    $_SESSION['com_qr_logo'] = $tt_user['com_qr_logo'];
                    $_SESSION['quyen'] = '1';

                    setcookie("acc_token", "", time() - 3600);
                    setcookie("rf_token", "", time() - 3600);
                    setcookie("role", "", time() - 3600);
                    setcookie("permission", "", time() - 3600);
                    setcookie("user", "", time() - 3600);
                    setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu quyền người dùng
                    setcookie("permission", $tt_user['com_role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu người dùng đăng nhập mục đích gì
                    setcookie("role", '1', time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("user", $tt_user['com_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                } else {
                    header('Location: /dang-xuat.html');
                    exit;
                }
            }
        }
    }
}


$data_list_nv = '';
if ($data_list_nv == '') {
    if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) {
        $curl = curl_init();
        $token = $_SESSION['access_token'];
        curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        $response = curl_exec($curl);
        curl_close($curl);

        $data_list = json_decode($response, true);

        $data_list_nv = $data_list['data']['items'];
    } elseif (isset($_SESSION['quyen']) && ($_SESSION['quyen'] == 2)) {
        $curl = curl_init();
        $token = $_SESSION['access_token'];
        curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/list_all_my_partner.php?get_all=true');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        $response = curl_exec($curl);
        curl_close($curl);

        $data_list = json_decode($response, true);
        $data_list_nv = $data_list['data']['items'];
    }
}

if (isset($_SESSION['com_id']) && $_SESSION['quyen'] == 1) {
    $usc_id = $_SESSION['com_id'];
    $use_id = 0;
} elseif (isset($_SESSION['user_com_id']) && $_SESSION['quyen'] == 2) {
    $usc_id = $_SESSION['user_com_id'];
    $use_id = $_SESSION['ep_id'];
}

// PHÒNG BAN
$curl_dep = curl_init();
curl_setopt($curl_dep, CURLOPT_URL, "https://chamcong.24hpay.vn/service/list_department.php?id_com=" . $usc_id);
curl_setopt($curl_dep, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_dep, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl_dep, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
$res_dep = curl_exec($curl_dep);
curl_close($curl_dep);
$dep_this_cty = json_decode($res_dep, true);
$arr_dep = $dep_this_cty['data']['items'];

// CTY
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://chamcong.24hpay.vn/api_qlts365/get_all_cty.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
$response = curl_exec($curl);
curl_close($curl);
$this_cty = json_decode($response, true);
$cty = $this_cty['data']['items'];

$total_cty = $this_cty['data']['totalItems'];
$total_phongban = $dep_this_cty['data']['totalItems'];
$total_nv = $data_list['data']['totalItems'];

$array_cv = array(
    0 => "Tất cả chức vụ",
    1 => "Thực tập sinh",
    2 => "Nhân viên thử việc",
    3 => "Nhân viên chính thức",
    4 => "Trưởng nhóm",
    5 => "Phó phòng",
    6 => "Trưởng phòng",
    7 => "Phó giám đốc",
    8 => "Sinh viên thực tập",
    9 => "Nhân viên Part time",
    10 => "Phó ban dự án",
    11 => "Trưởng ban dự án",
    12 => "Phó tổ trưởng",
    13 => "Tổ trưởng",
    14 => "Phó Tổng Giám đốc",
    15 => "Phó Tổng Giám đốc thường trực",
    16 => "Tổng Giám đốc",
    17 => "Thành viên Hội đồng quản trị",
    18 => "Phó Chủ tịch tập đoàn",
    19 => "Chủ tịch tập đoàn",
    20 => "Nhóm Phó",
    21 => "Tổng Giám Đốc Tập Đoàn",
    22 => "Phó Tổng Giám Đốc Tập Đoàn",
);


if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '') {
    $type_quyen = 2;
    $id_ng_tao = $_SESSION['ep_id'];
    $ng_sd = $_SESSION['ep_name'];
    $vitri = $_SESSION['dep_name'];
} else {
    $type_quyen = 1;
    $id_ng_tao = $com_id;
    $ng_sd = $_SESSION['com_name'];
    $vitri = $_SESSION['com_name'];
}



if ($type_quyen == 2) {
    $q_quyen = new db_query("SELECT * FROM tbl_phanquyen WHERE id_cty = '" . $usc_id . "' AND id_user = '" . $id_ng_tao . "'");
    $quyen =  mysql_fetch_assoc($q_quyen->result);
    $quyen_tieuchi = explode(',', $quyen['tieuchi_dg']);
    $quyen_kiemtra = explode(',', $quyen['de_kiemtra']);
    $quyen_kehoach = explode(',', $quyen['kehoach_dg']);
    $quyen_ketqua = explode(',', $quyen['ketqua_dg']);
    $quyen_lotrinh = explode(',', $quyen['lotrinh_thangtien']);
    $quyen_phieu = explode(',', $quyen['phieu_dg']);
    $quyen_phanquyen = explode(',', $quyen['phanquyen']);
    $quyen_thangdiem = explode(',', $quyen['thangdiem']);
} else {
    $quyen_tieuchi = array(1, 2, 3, 4, 5);
    $quyen_kiemtra = array(1, 2, 3, 4, 5);
    $quyen_kehoach = array(1, 2, 3, 4, 5);
    $quyen_ketqua = array(1, 2, 3, 4, 5);
    $quyen_lotrinh = array(1, 2, 3, 4, 5);
    $quyen_phieu = array(1, 2, 3, 4, 5);
    $quyen_phanquyen = array(1, 2, 3, 4, 5);
    $quyen_thangdiem = array(1, 2, 3, 4, 5);
}


$qr = new db_query("SELECT * FROM tbl_thangdiem WHERE id_congty = '" . $usc_id . "' ORDER BY update_at DESC ");
$row = mysql_fetch_assoc($qr->result);
$thangdiem_hethong = $row['thangdiem'];
$phanloai_hethong = $row['phanloai'];
$pl = json_decode($phanloai_hethong, true);


?>