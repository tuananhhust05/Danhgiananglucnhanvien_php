<?
include('config.php');
if (!in_array(2, $quyen_phanquyen)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$id_nv = getValue("id","int","GET",0);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân quyền</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/saitaman.css">
    <link rel="stylesheet" type="text/css" href="../css/tatsumaki.css">
</head>

<body>
    <div class="wapper">
        <div class="d_flex">
            <? include('../includes/cd_sidebar.php'); ?>
            <div class="main">
                <div class="header back_w border_r10 w_100">
                    <div class="box_header d_flex space_b align_c position_r">
                        <div class="title_header flex center-height">
                            <a href="/phan-quyen.html">
                                <div class="flex center-height right-10 c-pointer">
                                    <img src="../img/manhimg/back.png" alt="Quay lai">
                                </div>
                            </a>
                            <p>Phân quyền / <?=search($data_list_nv,'ep_id',$id_nv)[0]['ep_name']?></p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="phanquyenchitiet box-qlinhanvien">
                            <div class="tieude1024 size-14 flex center-height bot-15">
                                <a href="/phan-quyen.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Phân quyền / Chi tiết</p>
                            </div>
                            <div class="khoibang">
                                <div class="bangchung">
                                    <form action="" method="">
                                        <table class="bangchinh chuden">
                                            <tr>
                                                <th>
                                                    <p class="phantucon">Tên quyền</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Xem</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Thêm</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Sửa</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Xóa</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Duyệt/Xác nhận</p>
                                                </th>
                                            </tr>
                                            <?$id_nv = getValue("id","int","GET",0);
$q_quyen_nv       = new db_query("SELECT * FROM tbl_phanquyen WHERE id_cty = '".$usc_id."' AND id_user = '".$id_nv."'");
$quyen_nv         =  mysql_fetch_assoc($q_quyen_nv->result);
$quyen_tieuchi    = explode(',',$quyen_nv['tieuchi_dg']);
$quyen_kiemtra    = explode(',',$quyen_nv['de_kiemtra']);
$quyen_kehoach_dg = explode(',',$quyen_nv['kehoach_dg']);
$quyen_ketqua_dg  = explode(',',$quyen_nv['ketqua_dg']);
$quyen_lotrinh    = explode(',',$quyen_nv['lotrinh_thangtien']);
$quyen_phieu_dg   = explode(',',$quyen_nv['phieu_dg']);
$quyen_phanquyen  = explode(',',$quyen_nv['phanquyen']);
$quyen_thangdiem  = explode(',',$quyen_nv['thangdiem']);
?>
                                            <tr class="pq_tieuchi">
                                                <td class="text-left chuden font-medium">Quản lý tiêu chí đánh giá</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_tieuchi)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_tieuchi)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="2"></td>
                                                <td><input class="wh16 select" <? if (in_array(3, $quyen_tieuchi)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="3"></td>
                                                <td><input class="wh16 select" <? if (in_array(4, $quyen_tieuchi)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="4"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="pq_kiemtra">
                                                <td class="text-left chuden font-medium">Quản lý đề kiểm tra năng lực</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_kiemtra)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_kiemtra)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="2"></td>
                                                <td><input class="wh16 select" <? if (in_array(3, $quyen_kiemtra)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="3"></td>
                                                <td><input class="wh16 select" <? if (in_array(4, $quyen_kiemtra)) {echo 'checked'
                                                ;};?> type="checkbox" name="tc_danhgia" value="4"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="pq_kehoach">
                                                <td class="text-left chuden font-medium">Quản lý kế hoạch đánh giá </td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_kehoach_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="kehoach" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_kehoach_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="kehoach" value="2"></td>
                                                <td><input class="wh16 select" <? if (in_array(3, $quyen_kehoach_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="kehoach" value="3"></td>
                                                <td><input class="wh16 select" <? if (in_array(4, $quyen_kehoach_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="kehoach" value="4"></td>
                                                <td><input class="wh16 select" <? if (in_array(5, $quyen_kehoach_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="kehoach" value="5"></td>

                                            </tr>
                                            <tr class="pq_phieu">
                                                <td class="text-left chuden font-medium">Quản lý phiếu đánh giá</td>
                                                <td><input style="pointer-events: none;" class="wh16 select" checked  type="checkbox" name="phieu_danhgia" value="1"></td>
                                                <td></td>
                                                <td></td>
                                                <td><input class="wh16 select" <? if (in_array(4, $quyen_phieu_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="phieu_danhgia" value="4"></td>
                                                <td><input class="wh16 select" <? if (in_array(5, $quyen_phieu_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="phieu_danhgia" value="5"></td>
                                                
                                            </tr>
                                            <tr class="pq_ketqua">
                                                <td class="text-left chuden font-medium">Quản lý kết quả đánh giá</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_ketqua_dg)) {echo 'checked'
                                                ;};?> type="checkbox" name="ketqua" value="1"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="pq_lotrinh">
                                                <td class="text-left chuden font-medium">Lộ trình thăng tiến</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_lotrinh)) {echo 'checked'
                                                ;};?> type="checkbox" name="lotrinh" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_lotrinh)) {echo 'checked'
                                                ;};?> type="checkbox" name="lotrinh" value="2"></td>
                                                <td><input class="wh16 select" <? if (in_array(3, $quyen_lotrinh)) {echo 'checked'
                                                ;};?> type="checkbox" name="lotrinh" value="3"></td>
                                                <td><input class="wh16 select" <? if (in_array(4, $quyen_lotrinh)) {echo 'checked'
                                                ;};?> type="checkbox" name="lotrinh" value="4"></td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr class="pq_quyen">
                                                <td class="text-left chuden font-medium">Phân quyền</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_phanquyen)) {echo 'checked'
                                                ;};?> type="checkbox" name="phanquyen" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_phanquyen)) {echo 'checked'
                                                ;};?> type="checkbox" name="phanquyen" value="2"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="pq_caidatthangdiem">
                                                <td class="text-left chuden font-medium">Cài đặt thang điểm</td>
                                                <td><input class="wh16 select" <? if (in_array(1, $quyen_thangdiem)) {echo 'checked'
                                                ;};?> type="checkbox" name="phanquyen" value="1"></td>
                                                <td><input class="wh16 select" <? if (in_array(2, $quyen_thangdiem)) {echo 'checked'
                                                ;};?> type="checkbox" name="phanquyen" value="2"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>

                            <div class="khoibutton_form top-25">
                                <div onclick="window.location.href='/phan-quyen.html'" class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_phanquyen">
                                    Hủy
                                </div>
                                <div class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_phanquyen">
                                    Lưu
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup_thanhcong" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center">Cập nhật phân quyền thành công!</p>
                </div>
                <div onclick="window.location.href='/phan-quyen.html'" class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_thatbai" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/errol.png" alt="Thất bại">
                </div>
                <div class="flex center-center top-36 ">
                    <div class="size-15 change_text_tb  text-center">Cập nhật phân quyền thất bại!</div>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>

</html>
<script type="text/javascript">

$(".btnluu_phanquyen").click(function() {
    var pq_tieuchi = '';
    $('.pq_tieuchi .select').each(function() {

        if ($(this).is(':checked')) {
            pq_tieuchi += $(this).val() + ',';
        }
    })

    var pq_kiemtra = '';
    $('.pq_kiemtra .select').each(function() {

        if ($(this).is(':checked')) {
            pq_kiemtra += $(this).val() + ',';
        }
    })

    var pq_kehoach = '';
    $('.pq_kehoach .select').each(function() {

        if ($(this).is(':checked')) {
            pq_kehoach += $(this).val() + ',';
        }
    })

    var pq_ketqua = '';
    $('.pq_ketqua .select').each(function() {

        if ($(this).is(':checked')) {
            pq_ketqua += $(this).val() + ',';
        }
    })

    var pq_lotrinh = '';
    $('.pq_lotrinh .select').each(function() {

        if ($(this).is(':checked')) {
            pq_lotrinh += $(this).val() + ',';
        }
    })

    var pq_phieu = '';
    $('.pq_phieu .select').each(function() {

        if ($(this).is(':checked')) {
            pq_phieu += $(this).val() + ',';
        }
    })

    var pq_quyen = '';
    $('.pq_quyen .select').each(function() {

        if ($(this).is(':checked')) {
            pq_quyen += $(this).val() + ',';
        }
    })
    var pq_thangdiem = '';
    $('.pq_caidatthangdiem .select').each(function() {

        if ($(this).is(':checked')) {
            pq_thangdiem += $(this).val() + ',';
        }
    })

    var id_nv = <?=$id_nv?>;
    var com_id = <?=$usc_id?>;

    $.ajax({
        url: '/ajax/add_phanquyen.php',
        data: {
            id_nv: id_nv,
            com_id: com_id,
            pq_tieuchi: pq_tieuchi,
            pq_kiemtra: pq_kiemtra,
            pq_kehoach: pq_kehoach,
            pq_ketqua: pq_ketqua,
            pq_lotrinh: pq_lotrinh,
            pq_phieu: pq_phieu,
            pq_quyen: pq_quyen,
            pq_thangdiem: pq_thangdiem,
            
        },
        type: 'POST',
        success: function(data) {
            $('#popup_thanhcong').removeClass('hidden');
        },
        error: function(data) {
            $('#popup_thatbai').removeClass('hidden');
        }
    })
})
active_single_menu('p_quyen_menu');
</script>