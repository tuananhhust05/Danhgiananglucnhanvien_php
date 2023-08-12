<?

$danhsach_tc = [
    '/quan_ly_tieu_chi_danh_gia.html',
    '/quan_ly_tieu_chi_danh_gia_them_moi.html',
    '/quan_ly_tieu_chi_danh_gia_chinh_sua.html',
    '/quan_ly_tieu_chi_danh_gia_chi_tiet.html',
    '/quan_ly_tieu_chi_nang_luc.html',
    '/quan_ly_tieu_chi_nang_luc_them_moi.html',
    '/quan_ly_tieu_chi_nang_luc_chinh_sua.html',
    '/quan_ly_tieu_chi_nang_luc_chi_tiet.html'
];

$danhsach_tc_1 = [
    '/quan_ly_tieu_chi_danh_gia.html',
    '/quan_ly_tieu_chi_danh_gia_them_moi.html',
    '/quan_ly_tieu_chi_danh_gia_chinh_sua.html',
    '/quan_ly_tieu_chi_danh_gia_chi_tiet.html'
];

$danhsach_tc_2 = [
    '/quan_ly_tieu_chi_nang_luc.html',
    '/quan_ly_tieu_chi_nang_luc_them_moi.html',
    '/quan_ly_tieu_chi_nang_luc_chinh_sua.html',
    '/quan_ly_tieu_chi_nang_luc_chi_tiet.html'
];

$danhsach_de_kt = [
    '/quan_ly_de_kiem_tra_nang_luc.html',
    '/quan_ly_de_kiem_tra_nang_luc_them_moi.html',
    '/quan_ly_de_kiem_tra_nang_luc_chitiet.html',
    '/quan_ly_de_kiem_tra_nang_luc_chinh_sua.html'
];

$de_kiemtratt = ['/loai-cau-hoi.html', '/danh-sach-cau-hoi.html', '/de-kiem-tra.html'];
$loaicauhoi = ['/loai-cau-hoi.html'];
$danhsach_ch = ['/danh-sach-cau-hoi.html'];
$de_kt = ['/de-kiem-tra.html'];

$kehoach = [
    '/quan_ly_ke_hoach_danh_gia.html',
    '/quan_ly_ke_hoach_danh_gia_chi_tiet.html',
    '/quan_ly_ke_hoach_danh_gia_chinh_sua.html',
    '/quan_ly_ke_hoach_danh_gia_them_moi.html'
];

$phieudanhgia = [
    '/quanly-phieudanhgia.html',
    '/quanly-phieudanhgia-danhgia-pb.html',
    '/quanly-phieudanhgia-danhgia-nv.html',
    '/phieudanhgia-de-kiemtra-nv.html',
    '/phieudanhgia-de-danhgia-nv.html',
    '/phieudanhgia-de-danhgia-pb.html',
    '/phieudanhgia-lambai.html',
    '/phieudanhgia-chamdiem.html'
];

$ketqua = [
    '/ketquadanhgia-nhanvien.html',
    '/ketquadanhgia-nhanvien1n.html',
    '/ketquadanhgia-phieudanhgia.html',
    '/ketquadanhgia-phongban.html',
    '/ketquadanhgia-phongban-chitiet.html',
    '/ketquadanhgia-phongban-chitiet-maphieu.html', '/ketquadanhgia-cuatoi.html'
];

$ketqua_1 = [
    '/ketquadanhgia-nhanvien.html',
    '/ketquadanhgia-nhanvien1n.html',
    '/ketquadanhgia-phieudanhgia.html'
];

$ketqua_2 = [
    '/ketquadanhgia-phongban.html',
    '/ketquadanhgia-phongban-chitiet.html',
    '/ketquadanhgia-phongban-chitiet-maphieu.html'
];

$ketqua_3 = ['/ketquadanhgia-cuatoi.html'];

$lotrinh = [
    '/lotrinhthangtien.html',
    '/lotrinhthangtien-chitiet.html'
];

$phanquyen = [
    '/phan-quyen.html',
    '/phanquyen_chitiet.html'
];

$xoaganday = [
    '/xoaganday-de-danh-gia.html',
    '/xoaganday-de-kiem-tra.html',
    '/xoaganday-phieu-danh-gia.html',
    '/xoaganday-tieuchi-danh-gia.html',
    '/xoaganday-kehoach-danh-gia.html',
    '/xoaganday-dulieuxoaganday.html'
];

$caidat = [
    '/caidat_caidatchung.html',
    '/caidat_nhatkyhoatdong.html',
    '/caidat_thangdiem.html',
    '/caidat_thongtinbaomat.html'
];

?>

<div class="sidebar ">
    <div class="sidebar_ttcn d_flex align_c content_c ">
        <a href="https://timviec365.vn/" class="img_sidebar">
            <img class="" src="../img/logo.png" alt="">
        </a>
    </div>
    <div class="side_body">
        <div class="ul_sidebar">
            <div class="sidebar_item sidebar_item_don <?php echo ($_SERVER['REDIRECT_URL'] == '/trang_chu_sau_dang_nhap.html') ? "active" : "" ?>">
                <a href='/trang_chu_sau_dang_nhap.html'>
                    <div class="li_sidebar">
                        <div class="item_sidebar d_flex flex_star  ">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_1.png" alt="Trang chủ">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5 ">Trang chủ</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php if (in_array(1, $quyen_tieuchi)) : ?>
                <div class="sidebar_item sidebar_item_kep">
                    <div class="class_li_side_bar li_sidebar sidebar_item_don">
                        <div class="item_sidebar item_sidebar_cha d_flex flex_star">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_2.png" alt="Quản lý tiêu chí đánh giá">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5 ">Đề đánh giá
                                năng lực</p>
                        </div>
                    </div>
                    <ul id="tc_tong" class="sidebar_sub hopdong_sub position_r <?php echo (in_array($_SERVER['REDIRECT_URL'], $danhsach_tc)) ? "active" : "" ?>">
                        <li id=tieuchi_menu class="sidebar_sub_item sidebar_item_don d_flex align_c  <?php echo (in_array($_SERVER['REDIRECT_URL'], $danhsach_tc_1)) ? "sub_li_active" : "" ?> ">
                            <div class="point"></div>
                            <a href="/quan_ly_tieu_chi_danh_gia.html" class="p_item_sidebar font_ss16 font_w5">Danh sách
                                tiêu chí đánh giá</a>
                        </li>
                        <li id="de_danhgia_menu" class="sidebar_sub_item sidebar_item_don d_flex align_c <?php echo (in_array($_SERVER['REDIRECT_URL'], $danhsach_tc_2)) ? "sub_li_active" : "" ?> ">
                            <div class="point"></div>
                            <a href="/quan_ly_tieu_chi_nang_luc.html" class="p_item_sidebar font_ss16 font_w5">Đề đánh giá
                                năng lực</a>
                        </li>
                    </ul>
                </div>
            <?php endif ?>

            <?php if (in_array(1, $quyen_kiemtra)) : ?>

                <div class="sidebar_item sidebar_item_kep">
                    <div class="class_li_side_bar li_sidebar sidebar_item_don">
                        <div class="item_sidebar item_sidebar_cha d_flex flex_star">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_3.png" alt="Quản lý tiêu chí đánh giá">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5 ">Đề kiểm tra năng lực</p>
                        </div>
                    </div>
                    <ul id="kt_tong" class="sidebar_sub hopdong_sub position_r <?php echo (in_array($_SERVER['REDIRECT_URL'], $de_kiemtratt)) ? "active" : "" ?>">
                        <li id=loaicauhoi_menu class="sidebar_sub_item sidebar_item_don d_flex align_c  <?php echo (in_array($_SERVER['REDIRECT_URL'], $loaicauhoi)) ? "sub_li_active" : "" ?> ">
                            <div class="point"></div>
                            <a href="/loai-cau-hoi.html" class="p_item_sidebar font_ss16 font_w5">Loại câu hỏi</a>
                        </li>
                        <li id="dsch_menu" class="sidebar_sub_item sidebar_item_don d_flex align_c <?php echo (in_array($_SERVER['REDIRECT_URL'], $danhsach_ch)) ? "sub_li_active" : "" ?> ">
                            <div class="point"></div>
                            <a href="/danh-sach-cau-hoi.html" class="p_item_sidebar font_ss16 font_w5">Danh sách câu hỏi</a>
                        </li>
                        <li id="de_kt_menu" class="sidebar_sub_item sidebar_item_don d_flex align_c <?php echo (in_array($_SERVER['REDIRECT_URL'], $de_kt)) ? "sub_li_active" : "" ?> ">
                            <div class="point"></div>
                            <a href="/de-kiem-tra.html" class="p_item_sidebar font_ss16 font_w5">Đề kiểm tra năng lực</a>
                        </li>
                    </ul>
                </div>
            <?php endif ?>

            <?php if (in_array(1, $quyen_kehoach)) : ?>
                <div id="kehoach_menu" class="sidebar_item sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $kehoach)) ? "active" : "" ?>">

                    <a href="/quan_ly_ke_hoach_danh_gia.html">
                        <div class="li_sidebar">
                            <div class="item_sidebar d_flex flex_star ">
                                <div class="img_li d_flex space_around align_c">
                                    <img src="../img/sidebar_4.png" alt="">
                                </div>
                                <p class="p_item_sidebar font_ss16 font_w5">Kế hoạch đánh giá</p>
                            </div>
                        </div>
                    </a>

                </div>
            <?php endif ?>

            <div id="phieu_menu" class="sidebar_item sidebar_item_don  <?php echo (in_array($_SERVER['REDIRECT_URL'], $phieudanhgia)) ? "active" : "" ?>">
                <a href="/quanly-phieudanhgia.html" class="item_sidebar item_sidebar_cha d_flex flex_star">
                    <div class="li_sidebar">
                        <div class="img_li d_flex space_around align_c">
                            <img src="../img/sidebar_5.png" alt="">
                        </div>
                        <p class="p_item_sidebar font_ss16 font_w5">Phiếu đánh giá</p>
                    </div>
                </a>

            </div>

            <div class="sidebar_item sidebar_item_kep ">
                <div class="li_sidebar class_li_side_bar sidebar_item_don">
                    <div class="item_sidebar item_sidebar_cha d_flex flex_star ">
                        <div class="img_li d_flex space_around align_c">
                            <img src="../img/sidebar_6.png" alt="">
                        </div>
                        <p class="p_item_sidebar font_ss16 font_w5">Kết quả đánh giá</p>
                    </div>
                </div>
                <ul id="ketqua_tong_menu" class="sidebar_sub banggia_sub_1 position_r  <?php echo (in_array($_SERVER['REDIRECT_URL'], $ketqua)) ? "active" : ""  ?>">
                    <li id="kq_nv_menu" class="sidebar_sub_item d_flex align_c sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $ketqua_1)) ? "sub_li_active" : "" ?>">
                        <div class="point"></div>
                        <a href="/ketquadanhgia-nhanvien.html" class="p_item_sidebar font_ss16 font_w5">Kết quả nhân
                            viên</a>
                    </li>
                    <li id="kq_pb_menu" class="sidebar_sub_item d_flex align_c sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $ketqua_2)) ? "sub_li_active" : "" ?>">
                        <div class="point"></div>
                        <a href="/ketquadanhgia-phongban.html" class="p_item_sidebar font_ss16 font_w5">Kết quả phòng
                            ban</a>
                    </li>
                    <?php if ($_SESSION['quyen'] != 1) : ?>

                        <li id="kq_pb_cuatoi" class="sidebar_sub_item d_flex align_c sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $ketqua_3)) ? "sub_li_active" : "" ?>">
                            <div class="point"></div>
                            <a href="/ketquadanhgia-cuatoi.html" class="p_item_sidebar font_ss16 font_w5">Kết quả của tôi</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>

            <div id="lotrinh_menu" class="sidebar_item sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $lotrinh)) ? "active" : "" ?>">

                <a href="/lotrinhthangtien.html">
                    <div class="li_sidebar">
                        <div class="item_sidebar d_flex flex_star ">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_7.png" alt="">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5">Lộ trình thăng tiến</p>
                        </div>
                    </div>
                </a>

            </div>

            <?php if (in_array(1, $quyen_phanquyen)) : ?>
                <div id="p_quyen_menu" class="sidebar_item  sidebar_item_don <?php echo (in_array($_SERVER['REDIRECT_URL'], $phanquyen)) ? "active" : "" ?>">

                    <a href="/phan-quyen.html">
                        <div class="li_sidebar">
                            <div class="item_sidebar d_flex flex_star ">
                                <div class="img_li d_flex space_around align_c">
                                    <img src="../img/sidebar_8.png" alt="">
                                </div>
                                <p class="p_item_sidebar font_ss16 font_w5">Phân quyền</p>
                            </div>
                        </div>
                    </a>

                </div>
            <?php endif ?>
            <div class="sidebar_item sidebar_item_don   <?php echo (in_array($_SERVER['REDIRECT_URL'], $xoaganday)) ? "active" : "" ?>">

                <a href="/xoaganday-dulieuxoaganday.html">
                    <div class="li_sidebar">
                        <div class="item_sidebar d_flex flex_star ">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_9.png" alt="">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5">Dữ liệu đã xóa gần đây</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="sidebar_item sidebar_item_don  <?php echo (in_array($_SERVER['REDIRECT_URL'], $caidat)) ? "active" : "" ?>">

                <a href="/caidat_thangdiem.html">
                    <div class="li_sidebar">
                        <div class="item_sidebar d_flex flex_star ">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_10.png" alt="">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5">Cài đặt</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="sidebar_item sidebar_item_don <?php echo ($_SERVER['REDIRECT_URL'] == '/chuyen_doi_so.html') ? "active" : "" ?>">

                <a target="_blank" href="https://quanlychung.timviec365.vn/">
                    <div class="li_sidebar">
                        <div class="item_sidebar d_flex flex_star ">
                            <div class="img_li d_flex space_around align_c">
                                <img src="../img/sidebar_11.png" alt="">
                            </div>
                            <p class="p_item_sidebar font_ss16 font_w5">Chuyển đổi số 365</p>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>
<script>
    function active_single_menu(menu) {
        document.getElementById(menu).classList.add('active');
    }

    function active_single_menu_con(menu) {
        document.getElementById(menu).classList.add('sub_li_active');
    }

    function active_double_menu(menu1, menu2) {
        document.getElementById(menu1).classList.add('active');
        document.getElementById(menu2).classList.add('active');
    }
</script>