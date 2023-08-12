<?
include "config.php";
$qr = new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and id_congty='" . $usc_id . "'");
$num_dedg = mysql_num_rows($qr->result);

$qr = new db_query("SELECT * FROM de_kiemtra_cauhoi where is_delete=1 and id_congty='" . $usc_id . "'");
$num_dekt = mysql_num_rows($qr->result);

$qr = new db_query("SELECT * FROM kh_danhgia where trangthai_xoa=1 and id_congty='" . $usc_id . "'");
$num_kh = mysql_num_rows($qr->result);

$qr = new db_query("SELECT * FROM phieu_danhgia where trangthai_xoa=1 and id_congty='" . $usc_id . "'");
$num_phieu = mysql_num_rows($qr->result);

$qr = new db_query("SELECT * FROM phieu_danhgia where phieuct_trangthai=2 and trangthai_xoa=1 and id_congty='" . $usc_id . "'");
$num_phieu_hth = mysql_num_rows($qr->result);
?>

<head>
    <title>Trang chủ</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>
    <div id="trangchu_sdn">
        <div class="wapper">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Trang chủ</p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body color_b">
                            <div class="container_tongquan mb_20">
                                <div class="title_header ">
                                    <p>Trang chủ</p>
                                </div>
                                <h4 class="header_tongquan font_ss16 font_wB mb_20 ">Tổng quan</h4>
                                <div class="body_tongquan">
                                    <div class="container container_tongquan d_flex space_b width_100 flex_wrap mb_20">
                                        <div class="item item_chucnang d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_1.png" alt="Tổng quan 1">
                                            </div>
                                            <a href="/quan_ly_tieu_chi_danh_gia.html" class="font_ss16 font_w5">Đề đánh
                                                giá năng lực nhân viên</a>
                                            <p class="font_s14"><span class="mr_5"><?= $num_dedg ?></span><span>Mẫu</span></p>
                                        </div>
                                        <div class="item item_chucnang  d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_4.png" alt="Tổng quan 2">
                                            </div>
                                            <a href="/de-kiem-tra.html" class="font_ss16 font_w5">Đề kiểm tra năng lực nhân viên</a>
                                            <p class="font_s14"><span class="mr_5"><?= $num_dekt ?></span><span>Mẫu</span></p>
                                        </div>
                                        <div class="item item_chucnang d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_5.png" alt="Tổng quan 3">
                                            </div>
                                            <a href="/quan_ly_ke_hoach_danh_gia.html" class="font_ss16 font_w5">Kế hoạch
                                                đánh giá</a>
                                            <p class="font_s14"><span class="mr_5"><?= $num_kh ?></span><span>Mẫu</span></p>
                                        </div>
                                        <div class="item item_chucnang d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_6.png" alt="Tổng quan 4">
                                            </div>
                                            <a href="/quanly-phieudanhgia.html" class="font_ss16 font_w5">Tổng số phiếu
                                                đánh giá</a>
                                            <p class="font_s14"><span class="mr_5"><?= $num_phieu ?></span><span>Mẫu</span></p>
                                        </div>
                                        <div class="item item_chucnang d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_3.png" alt="Tổng quan 5">
                                            </div>
                                            <a href="/ketquadanhgia-nhanvien.html" class="font_ss16 font_w5">Đánh giá đã
                                                thực hiện</a>
                                            <p class="font_s14"><span class="mr_5"><?= $num_phieu_hth ?></span><span>Mẫu</span></p>
                                        </div>
                                        <div class="item item_chucnang d_flex flex_d_c space_b">
                                            <div class="img">
                                                <img src="../img/tongquan_2.png" alt="Tổng quan 6">
                                            </div>
                                            <a href="/lotrinhthangtien.html" class="font_ss16 font_w5">Lộ trình thăng
                                                tiến</a>
                                            <p class="font_s14"><span class="mr_5">30</span><span>Mẫu</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container_tongquan mb_20">

                                <div class="container_tongquan ">
                                    <h4 class="header_tongquan font_ss16 font_wB mb_20 ">Ưu điểm vượt trội của hệ sinh
                                        thái
                                        Chuyển đổi số 365 </h4>
                                    <div class="body_tongquan">
                                        <div class="container container_uudiem d_flex width_100  flex_wrap space_b mb_20">
                                            <div class="item item_uudiem d_flex flex_d_c space_b">
                                                <div class="cont font_s18 ">
                                                    <img src="../img/uu4.png" alt="Ưu điểm">
                                                    <p class="font_wB mt_15 mb_10">An toàn và bảo mật</p>
                                                    <p class="text_just font_ss16">An toàn, bảo mật tuyệt đối, dữ liệu
                                                        được lưu
                                                        trữ theo mô hình điện thoán đám mây.</p>
                                                </div>
                                                <a target="_blank" href="https://chamcong.timviec365.vn/uu-diem-vuot-troi.html#antoan" class="chi_tiet d_flex space_b align_c">
                                                    <p>Chi tiết</p>
                                                    <div class="img">
                                                        <img src="../img/icon_next.png" alt="Chi tiết">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="item item_uudiem d_flex flex_d_c space_b">
                                                <div class="cont font_s18">
                                                    <img src="../img/uu3.png" alt="Ưu điểm">
                                                    <p class="font_wB mt_15 mb_10">Một nền tảng duy nhất</p>
                                                    <p class="text_just font_ss16">Tích hợp tất cả các ứng dụng doanh
                                                        nghiệp của
                                                        bạn đang cần trên
                                                        một
                                                        nền tảng duy nhất.</p>
                                                </div>
                                                <a target="_blank" href="https://chamcong.timviec365.vn/uu-diem-vuot-troi.html#tichhop" class="chi_tiet d_flex space_b align_c">
                                                    <p>Chi tiết</p>
                                                    <div class="img">
                                                        <img src="../img/icon_next.png" alt="Chi tiết">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="item item_uudiem d_flex flex_d_c space_b">
                                                <div class="cont font_s18">
                                                    <img src="../img/uu2.png" alt="Ưu điểm">
                                                    <p class="font_wB mt_15 mb_10">Ứng dụng công nghệ AI</p>
                                                    <p class="text_just font_ss16">Ứng dụng công nghệ AI tự nhận thức.
                                                        Phân tích
                                                        hành vi người dùng
                                                        giải
                                                        quyết toàn diện bài các toán đối với doanh nghiệp cụ thể.</p>
                                                </div>
                                                <a href="https://chamcong.timviec365.vn/uu-diem-vuot-troi.html#ungdung" target="_blank" class="chi_tiet d_flex space_b align_c">
                                                    <p>Chi tiết</p>
                                                    <div class="img">
                                                        <img src="../img/icon_next.png" alt="Chi tiết">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="item item_uudiem d_flex flex_d_c space_b ">
                                                <div class="cont font_s18 ">
                                                    <img src="../img/uu5.png" alt="Ưu điểm">
                                                    <p class="font_wB  mt_15 mb_10">Giải pháp số 1 Việt Nam</p>
                                                    <p class="text_just font_ss16">Luôn đồng hành và hỗ trợ 24/7. Phù
                                                        hợp với tất cả các tập đoàn xuyên quốc gia đến những công ty
                                                        SME.</p>
                                                </div>
                                                <a href="https://chamcong.timviec365.vn/uu-diem-vuot-troi.html#donghanh" target="_blank" class="chi_tiet d_flex space_b align_c">
                                                    <p>Chi tiết</p>
                                                    <div class="img">
                                                        <img src="../img/icon_next.png" alt="Chi tiết">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="item item_uudiem d_flex flex_d_c space_b">
                                                <div class="cont font_s18">
                                                    <img src="../img/uu1.png" alt="Ưu điểm">
                                                    <p class="font_wB mt_15 mb_10">Sử dụng miễn phí trọn đời</p>
                                                    <p class="text_just font_ss16">Miễn phí trọn đời đối với tất cả các
                                                        doanh nghiệp đăng ký trong đại dịch covid-19.</p>
                                                </div>
                                                <a href="https://chamcong.timviec365.vn/uu-diem-vuot-troi.html#mienphi" target="_blank" class="chi_tiet d_flex space_b align_c">
                                                    <p>Chi tiết</p>
                                                    <div class="img">
                                                        <img src="../img/icon_next.png" alt="Chi tiết">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="div_them">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popup -->
    <div class="popup popup_thietlap_diem <? if ($thangdiem_hethong != "") echo "hidden"; ?>">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Thiết lập thang điểm cho hệ thống</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Thiết lập <span class="font_wB"> Thang điểm </span> cho hệ thống
                        để có thể tạo<span class="font_wB"> Bài đánh giá</span> và<span class="font_wB"> Bài kiểm
                            tra!</span> </p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Thiết lập sau</div>
                        <a <?php if (!in_array(1, $quyen_thangdiem)) : ?>data-thangdiem='0' <?php endif ?> class="ditoithangdiem btn btn_xanh btn_140">
                            Đi tới thiết lập
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script>
    $('.close_popup').click(function() {
        $('.popup').hide();
    })
    $('.ditoithangdiem').click(function() {
        var check = $(this).attr('data-thangdiem');
        if (check == 0) {
            alert('Bạn chưa có quyền cài đặt thang điểm.Liên hệ ADMIN để cấp quyền.');
            return;
        }
        window.location.href = '/caidat_thangdiem.html';
    })
</script>

</html>