<?php
include('config.php');
 if (!in_array(1, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("keyword","str","GET","");
$key = replaceMQ($key);
$key2 = getValue("keyword2","str","GET","");
$key2 = replaceMQ($key2);

$page = getValue("page","int","GET",1);
$page = (int)$page;
$limit = getValue("limit","int","GET",5);
$start = ($page -1) * $limit;

//link phân trang
$link = $_SERVER['REDIRECT_URL'];
$lien_ket = "?";
if($limit != 5){
    $lien_ket = "&";
    $link .= "?limit=".$limit;

    if ($key !="") {
        $link .= "&keyword=".$key;
    }
    if ($key2 !="") {
        $link .= "&keyword2=".$key2;
    }
}
else{
    if ($key !="") {
        $lien_ket = "&";
        $link .= "?keyword=".$key;
    }
    if ($key2 !="") {
        $lien_ket = "&";
        $link .= "?keyword2=".$key2;
    }
 
}


// xử lý truy vấn
$sql="";
if (!empty($key)){
    if (is_numeric($key)==true){
        $sql .=" AND id = '".$key."'";
    }
}
if (!empty($key2)){
    if (is_numeric($key2)==true){
        $sql .=" AND tcd_trangthai = '".$key2."'";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        .turn{
            position: fixed !important;
        }
        .turn_right{
            right: 18px !important;
        } 

    </style>
    <title>Quản lý tiêu chí đánh giá</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>
<body>
   
    <div id="ql_tieuchi_danhgia" class="ql_tieuchi_danhgia">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Danh sách tiêu chí đánh giá </p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                
                        <div class="main_body">
                            <div class="header_ql_tieuchi width_100 mb_20">
                                <div class="title_header">
                                    <p>Danh sách tiêu chí đánh giá </p>
                                </div>
                                <div class="sle_huongdan d_flex  align_c mb_20">
                                    <div class="select_no_muti select_no_muti_2 right-20">
                                        <select class="js_select_2 chon_trangthai" id="" name="loai_tc">
                                            <option value="">Tất cả trạng thái</option>
                                            <option <?if($key2==2) echo "selected"; ?> value="2">Đang mở</option>
                                            <option <?if($key2==1) echo "selected"; ?> value="1">Đã đóng</option>
                                        </select>
                                    </div>

                                    <a target="_blank" href="/huong_dan.html#de_dg" class="huong_dan d_flex align_c">
                                        <img src="../img/chamhoi.png" alt="Hướng đẫn" class="mr_6">
                                        <p class="font_s15 font_w5 color_blue">Hướng dẫn</p>
                                    </a>
                                </div>
                                <div class="tim_themmoi d_flex space_b align_c">
                                         <div class="select_no_muti ql_tieuchi_m">
                                            <select name="" id=""
                                            class="search_item js_select_2 search_value ">
                                            <option value="">Tìm kiếm theo tên tiêu chí</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM tbl_tieuchi WHERE (id_congty = '".$usc_id."' or id_congty = 1) AND trangthai_xoa = 1 and tcd_loai=2");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option <?if($key !='' && $key==$nhom_timkiem['id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['id']?>"><?=$nhom_timkiem['tcd_ten']?>
                                            </option>
                                            <?}?>
                                        </select>
                                        <span class="see_search"></span>

                                    </div>

                                    <?php if (in_array(2, $quyen_tieuchi)): ?>
                                    <div class="them_moi">
                                        <a href='/quan_ly_tieu_chi_danh_gia_them_moi.html' class="btn btn_xanh">
                                            <img src="../img/icon_plus.png" alt="Thêm mới" class="mr_10">
                                            <p>Thêm mới</p>
                                        </a>
                                    </div>
                                    <?php endif ?>
                                    
                                    

                                </div>
                            </div>
                            <div class="body_ql_tieuchi ">
                                <div class="khoibang">
                                    <div class="bangchung" id="bang_chung">
                                        <table class="bangchinh tieu_chi">
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon ">Tên tiêu chí</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Loại tiêu chí</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Số điểm</p>
                                                </th>
                                                <!--  -->
                                                <th>
                                                    <p class="phantucon">Ngày tạo</p>
                                                </th>

                                                <th>
                                                    <p class="phantucon">Trạng thái</p>
                                                </th>

                                                <th>
                                                    <p class="phantucon">Chức năng</p>
                                                </th>
                                            </tr>
                                            <? 
                                            $stt=0;
                                            $query= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai= 2 and trangthai_xoa=1 and (id_congty=1 or id_congty = '".$usc_id."')  ".$sql." ORDER BY id DESC LIMIT $start, $limit");
                                            $query2= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and trangthai_xoa=1 and (id_congty=1 or id_congty = '".$usc_id."')  ".$sql." ");
                                            $count_tong_vippro = mysql_num_rows($query2->result);
                                            $row = $query->result_array();
                                            foreach ($row as $key => $value) {
                                            $stt ++;    
                                             ?>
                                            <tr class="xoa_tc_tr<? echo $value['id'];?> cha_tieuchi_<? echo $value['id'];?>">
                                                <td>
                                                    <p><? echo $stt;?></p>
                                                </td>
                                                <td class="with350_im">
                                                    <div  class="d_flex btn_soxuong with250_im ">
                                                        <a  href="quan_ly_tieu_chi_danh_gia_chi_tiet_<? echo $value['id'];?>.html"
                                                            class="mr_10 color_blue font_w5 elipsis1"><? echo $value['tcd_ten'];?></a>
                                                            <?
                                                                $query= new db_query("SELECT * FROM tbl_tieuchi where trangthai_xoa=1 and tcd_loai=1 and (tc_id_tonghop = '".$value['id']."') and (id_congty=1 or id_congty = '".$usc_id."')");
                                                                $row1 = $query->result_array();
                                                                $dem=count($row1);
                                                            ?>
                                                            <?php if ($dem>0): ?>
                                                                <div class="img so_xoay so_xoay_<? echo $value['id'];?>">
                                                            <img src="../img/icon_so.png" alt="Sổ xuống">
                                                        </div>
                                                            <?php endif ?>
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>Tiêu chí tổng hợp</p>
                                                </td>
                                                <td>
                                                    <p class="font-700 "><? echo $value['tcd_thangdiem'];?></p>
                                                </td>
                                                <!-- <td>
                                                    
                                                </td> -->
                                                <td>
                                                    <p><? 
                                                    $timestamp=$value['tcd_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                                </td>
                                                <td>
                                                    <label class="switch_tatmo">
                                                        <input data-id="<?=$value['id']?>"  class="js_trangthai" <? if($value['tcd_trangthai']==2) echo "checked";?> type="checkbox"  >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="sua_xoa d_flex content_c ">
                                                        <?php if (in_array(3, $quyen_tieuchi)): ?>
                                                        <a href="/quan_ly_tieu_chi_danh_gia_chinh_sua_<? echo $value['id'];?>.html"
                                                            class="btn_chinhsua position_r d_flex mr_10">
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_sua.png" alt="Chỉnh sửa ">
                                                            </div>
                                                            <p class="color_blue font_w5">Sửa</p>
                                                        </a>
                                                        <?php endif ?>
                                                        <?php if (in_array(4, $quyen_tieuchi)): ?>
                                                        <button name="xoa" data-name="<?=$value['tcd_ten']?>" data-id="<?=$value['id']?>" class="btn_xoa d_flex c-pointer <? if($value['tcd_nguoitao']==1) echo "hidden";?>">
                                                            <?php if (in_array(3, $quyen_tieuchi)): ?>
                                                            <span class="color_blue mr_10">|</span>
                                                            <?php endif ?>
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_xoa.png" alt="Xóa">
                                                            </div>
                                                            <p class="color_red font_w5">Xóa</p>
                                                        </button>
                                                        <?php endif ?>
                                                    </div>
                                                    
                                                </td>
                                            </tr>

                                            <? 
                                            $sttt=0;
                                            $query= new db_query("SELECT * FROM tbl_tieuchi where trangthai_xoa=1 and tcd_loai=1 and (tc_id_tonghop = '".$value['id']."') and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row1 = $query->result_array();

                                            foreach ($row1 as $key => $val):$sttt++;?>

                                            <tr  class="xoa_tc_tr<? echo $val['id'];?> con_tieuchi_<? echo $val['tc_id_tonghop'];?>">

                                                <td>
                                                    <p><? echo $stt; ?>.<? echo $sttt; ?></p>
                                                </td>
                                                <td class="with350_im">
                                                    <p class="text_a_l color_blue left-10 with250_im ">
                                                        <a class="color_blue elipsis1"
                                                            href="quan_ly_tieu_chi_danh_gia_chi_tiet_<? echo $val['id'];?>.html"><? echo $val['tcd_ten'];?></a>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>Tiêu chí đơn</p>
                                                </td>
                                                <td>
                                                    <p class="chunghieng"><? echo $val['tcd_thangdiem'];?></p>
                                                </td>
                                                <!-- <td>
                                                    
                                                </td> -->
                                                <td>
                                                    <p>
                                                        <? 
                                                    $timestamp=$val['tcd_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <label class="switch_tatmo">
                                                        <input data-id="<?=$val['id']?>" class="js_trangthai" value="<?=$val['tcd_trangthai']?>" type="checkbox"  <? if($val['tcd_trangthai']==2) echo "checked";?>>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="sua_xoa d_flex content_c ">
                                                        <?php if (in_array(3, $quyen_tieuchi)): ?>
                                                        <a href="/quan_ly_tieu_chi_danh_gia_chinh_sua_<? echo $val['id'];?>.html"
                                                            class="btn_chinhsua position_r d_flex mr_10">
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_sua.png" alt="Chỉnh sửa ">
                                                            </div>
                                                            <p class="color_blue font_w5">Sửa</p>
                                                        </a>
                                                        <?php endif ?>
                                                        <?php if (in_array(4, $quyen_tieuchi)): ?>
                                                        <button data-name="<?=$val['tcd_ten']?>" data-id="<?=$val['id']?>" class="btn_xoa d_flex c-pointer <? if($val['tcd_nguoitao']==1) echo "hidden";?>">
                                                            <?php if (in_array(3, $quyen_tieuchi)): ?>
                                                            <span class="color_blue mr_10">|</span>
                                                            <?php endif ?>
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_xoa.png" alt="Xóa">
                                                            </div>
                                                            <p class="color_red font_w5">Xóa</p>
                                                        </button>
                                                        <?php endif ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <? endforeach;?>
                                            <?  
                                            } 
                                            ?>

                                        </table> 

                                    </div>
                                </div>
                                <div class="footer_bang <?if($count_tong_vippro==0) echo 'top-20' ?>">
                                    <div class="flex center-height space top-20">
                                        <div class="flex center-height">
                                            <p class="right10"> Hiển thị:</p>
                                            <div class="select_no_muti select_no_muti_chon">
                                                <select  class="js_select_2" name="" id="chon_ban_ghi">
                                                    <option <?if($limit==2){echo 'selected' ;}?> value="2">2</option>
                                                    <option <?if($limit==5){echo 'selected' ;}?> value="5">5</option>
                                                    <option <?if($limit==10){echo 'selected' ;}?> value="10">10</option>
                                                    <option <?if($limit==20){echo 'selected' ;}?> value="20">20</option>
                                                    <option <?if($limit==50){echo 'selected' ;}?> value="50">50</option>
                                                    <option <?if($limit==100){echo 'selected' ;}?> value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <p class="chuden size-14">Tổng số: <?=$count_tong_vippro?> <span class="font-medium"> Tiêu chí</span></p>
                                        <div class="pagination_vippro">
                                            <?php if($limit< $count_tong_vippro) {
                                                echo generatePageBar3('',$page,$limit,$count_tong_vippro,$link,$lien_ket,'','active','preview','<','next','>','','<<<','','>>>');
                                            }
                                            ?>
                                        </div>      
                                    </div>
                                </div>
                                
                                    <div class="turn turn_left <?if($count_tong_vippro==0) echo 'hidden' ?>" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right <?if($count_tong_vippro==0) echo 'hidden' ?>" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                              
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popup xóa -->
    <div class="popup popup_500 popup_xoa popup_xoa_tieuchi ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa tiêu chí</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1">Bạn có chắc chắn muốn xóa tiêu chí <span style="width: 300px; margin-left: -30px;"  class="font_wB show_xoa_ten elipsis1">?</span></p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68 close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_xoa">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup xóa -->

    <!-- popup thành công  -->
    <div class="popup popup_500 popup_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Xóa tiêu chí <span style="width: 300px;"  class="font_wB show_xoa_ten elipsis1"></span> thành
                    công!</p>
                <div class="popup_btn">
                    <div onclick="window.location.reload()" class="btn btn_xanh close_popup ">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup thành công -->

   
<div class="popup popup_thietlap_diem <? if($thangdiem_hethong!=""&& $phanloai_hethong!="") echo "hidden"; ?>">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Thiết lập thang điểm cho hệ thống</h4>
            </div>
            <div class="popup_body">
                <p class="cont_1"> Thiết lập <span class="font_wB"> Thang điểm, Phân loại </span> cho hệ thống
                    để có thể tạo<span class="font_wB"> Bài đánh giá</span> và<span class="font_wB"> Bài kiểm
                        tra!</span> </p>
                <div <?php if (!in_array(1, $quyen_thangdiem)): ?>data-thangdiem='0'<?php endif ?> class="popup_btn ditoithangdiem">
                    <a class="btn btn_xanh btn_140">Đi tới thiết lập</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%',
})
<?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2");
$row = $query->result_array();
foreach ($row as $key => $val) {
?>

$(".so_xoay_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchi_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
<?
}
?> 
    

$('.btn_xoa').click(function() {
    var id_tc = $(this).attr('data-id');
    var name_tc = $(this).attr('data-name');
    $('.js_done_xoa').attr('data-id',id_tc);
    $('.popup_xoa').show();
    $('.show_xoa_ten').text(name_tc);
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/xoa_tieuchi.php',
            type: 'POST',
            data: {
                id_tc:id_tc, 
            },
            success: function(data){            
                $('.popup_xoa').hide();
                $('.popup_thanhcong').show();
                $('.xoa_tc_tr'+id_tc).remove();
                $('.con_tieuchi_'+id_tc).remove();
            }
        }); 
    })
   
})
<?php if (in_array(2, $quyen_tieuchi)): ?>
                                  
$(".js_trangthai").click(function(){
    var id_tt = $(this).attr('data-id');
    if ($(this).is(':checked')) {var tt = 1;}
    else {var tt=2;}
     $.ajax({
            url: '/ajax/capnhat_tieuchi_trangthai.php',
            type: 'POST',
            data: {
                tt:tt, 
                id_tt:id_tt,
            },
            success: function(data){   
                    
            }
        }); 
})
<?php endif ?>


$('.search_value').change(function(e) {
    search_nhom_ts();
})
$('.chon_trangthai').change(function(e) {
    search_trangtrhai();
})


function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html?keyword=" + key + "&limit=" + limit;
    }
}
function search_trangtrhai() {
    var key2 = $('.chon_trangthai').val();
    var limit = $('#chon_ban_ghi').val();
    if (key2 == "" ) {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html?keyword2=" + key2 + "&limit=" + limit;
    }
}

$('#chon_ban_ghi').change(function() {
    var value = $(this).find(':selected').val();
    var key = $('.search_value').val();
    var key2 = $('.chon_trangthai').val();
    var lien_ket = '';

    if (key != '') {
        lien_ket = "&keyword=" + key;
    }
    if (key2 != '') {
        lien_ket = "&keyword2=" + key2;
    }
    if (value == "") {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_tieu_chi_danh_gia.html?limit=" + value + lien_ket;
    }
});

$('.ditoithangdiem').click(function(){
    var check=$(this).attr('data-thangdiem');
    if (check==0) {
        alert('Bạn chưa có quyền cài đặt thang điểm.Liên hệ ADMIN để cấp quyền.');
        return;
    }
    window.location.href='/caidat_thangdiem.html';
})

</script>

</html>