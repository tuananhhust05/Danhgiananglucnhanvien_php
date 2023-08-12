<?php
    include('config.php');
    if (!in_array(1, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};

$key = getValue("keyword","str","GET","");
$key = replaceMQ($key);

$key2 = getValue("keyword2","str","GET","");
$key2 = replaceMQ($key2);

$key3 = getValue("keyword3","str","GET","");
$key3 = replaceMQ($key3);

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
    if ($key3 !="") {
        $link .= "&keyword3=".$key3;
    }
  
}else{
    if ($key !="") {
        $lien_ket = "&";
        $link .= "?keyword=".$key;
    }
    if ($key2 !="") {
        $lien_ket = "&";
        $link .="?limit=".$limit."&keyword2=".$key2;
    }
    if ($key3 !="") {
        $lien_ket = "&";
        $link .="?limit=".$limit."&keyword3=".$key3;
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
        $sql .=" AND loai = '".$key2."'";
    }
}
if (!empty($key3)){
    if (is_numeric($key3)==true){
        $sql .=" AND hinhthuc = '".$key3."'";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Danh sách câu hỏi</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
    .body_ql_tieuchi .tieu_chi {
    min-width: 1795px;
	}
	.khoibang .bangchung .bangchinh tr th:nth-child(2){
        width: 370px !important;
    }.khoibang .bangchung .bangchinh tr th:nth-child(5){
        width: 100px !important;
    }.khoibang .bangchung .bangchinh tr th:nth-child(3){
        width: 370px;
    }
   .select_no_muti_2 .select2-container--default .select2-selection--single {
    width: auto;
    border: none;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
	}
	::-webkit-scrollbar {
		width: 10px;
		height: 10px;
	}

	::-webkit-scrollbar-track {
	    border-radius: 10px;
	}

	::-webkit-scrollbar-thumb {
	    background: #4C5BD4;
	    border-radius: 5px;
	}

	::-webkit-scrollbar-track {
	    background: #eeeeee;
	}
    </style>
</head>
<?
$query= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id_congty='".$usc_id."' ORDER BY id DESC ");
$row = $query->result_array();
?>
<body>
    <div id="ql_tieuchi_danhgia" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Danh sách câu hỏi</p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi width_100 mb_20">
                                <div class="title_header">
                                    <p>Danh sách câu hỏi</p>
                                </div>
                                <div class="sle_huongdan d_flex  align_c mb_20">
                                    <div class="select_no_muti select_no_muti_2 right-20 all_loai">
                                        <select class="js_select_2 chon_loaicauhoi" id="" name="">
                                        	<option value="">Tất cả loại câu hỏi</option>
                                            <?php foreach ($row as $value): ?>
                                            	<option  <?if($key2==$value['id']) echo "selected"; ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="select_no_muti select_no_muti_2 right-20 all_hinhthuc">
                                        <select class="js_select_2 chon_hinhthuc_cauhoi" id="" name="">
                                            <option  value="">Tất cả hình thức câu hỏi</option>
                                            <option <?if($key3==1) echo "selected"; ?> value="1">Tự luận</option>
                                            <option <?if($key3==2) echo "selected"; ?> value="2">Trắc nghiệm</option>
                                            <option <?if($key3==3) echo "selected"; ?> value="3">Hộp kiểm</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="d_flex space_b align_c">
                                    <div class="select_no_muti ql_tieuchi_m">
                                            <select name="" id=""
                                            class="search_item js_select_2 search_value ">
                                            <option value="">Tìm kiếm theo tên câu hỏi , nội dung câu hỏi</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM danhsachcauhoi WHERE id_congty = '".$usc_id."' AND trangthai_xoa = 1 ");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option class="one_line" <?if($key !='' && $key==$nhom_timkiem['id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['id']?>"><?=$nhom_timkiem['cauhoi']?>
                                            </option>
                                            <?}?>
                                        </select>
                                        <span class="see_search"></span>

                                    </div>
                                    <div class="d_flex">
                                        <?php if (in_array(2, $quyen_kiemtra)): ?>
                                        <div class="them_moi mr_15">
                                            <a href="them-moi-cau-hoi.html"  class="btn btn_xanh  hieuung">
                                                <img src="../img/icon_plus.png" alt="Thêm mới" class="mr_10">
                                                <p>Thêm mới</p>
                                            </a>
                                        </div>
                                        <?php endif ?>
                                        <a href="/huong_dan.html#de_kt" class="huong_dan d_flex align_c" target="_blank">
                                            <img src="../img/chamhoi.png" alt="Hướng đẫn" class="mr_6">
                                            <p class="font_s15 font_w5 color_blue">Hướng dẫn</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="body_ql_tieuchi body_ql_de">
                                <div class="khoibang">
                                    <div class="bangchung" id="bang_chung">
                                        <table class="bangchinh tieu_chi">
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Câu hỏi</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Loại câu hỏi </p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Hình thức</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Số điểm</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Thời gian thực hiện (phút)</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Người cập nhật</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Ngày cập nhật</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Chức năng</p>
                                                </th>
                                            </tr>
                                            <?  
                                            $stt=0;
                                            $query= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and id_congty='".$usc_id."' ".$sql." ORDER BY id DESC LIMIT $start, $limit");
                                            $row_list = $query->result_array();
                                            $query2= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and id_congty='".$usc_id."'".$sql."");
                                            $count_tong_vippro = mysql_num_rows($query2->result);
                                            foreach ($row_list as  $value) {
                                            $stt ++;  
                                            ?>
                                            <tr>
                                                <td>
                                                    <p><?=$stt?></p>
                                                </td>
                                                <td>
                                                    <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                                    <div style="width: 370px;">
                                                        <p class="text_a_l elipsis1"><a class="color_blue elipsis1" href="/cau-hoi-chi-tiet-<?=$value['id']?>.html"><?=$value['cauhoi']?></a>
                                                    </p>
                                                    </div>
                                                    
                                                </td>
                                                <td>
                                                    <div class="d_flex align_c">
                                                        <?=search($row,'id',$value['loai'])[0]['ten_loai'];?>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div style="width: 120px;">
                                                    <p>
                                                        <?
                                                        if ($value['hinhthuc']==1) echo 'Tự luận'; 
                                                        if ($value['hinhthuc']==2) echo 'Trắc nghiệm'; 
                                                        if ($value['hinhthuc']==3) echo 'Hộp kiểm'; 
                                                        if ($value['hinhthuc']==4) echo 'Menu thả xuống'; 
                                                        if ($value['hinhthuc']==5) echo 'Giờ'; 
                                                        if ($value['hinhthuc']==6) echo 'Ngày'; 
                                                        ?>
                                                    </p>
                                                    </div>
                                                </td>
                                                
                                                <td class="">
                                                    <p><?=$value['sodiem']?></p>
                                                </td>
                                                <td class="">
                                                    <p><?=$value['thoigian_thuchien']?> phút</p>
                                                </td>
                                                <td class="">
                                                    <div style="width: 190px;" class="d_flex align_c">
                                                         <?php if ($value['congty_or_nv']==1): ?>
                                                            <div class="img  ">
                                                            <img onerror="this.src='../img/ep_logo.png';" class="wh26_ra right-10" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$value['nguoi_capnhat'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <p class="one_line"><?=search($cty,'com_id',$value['nguoi_capnhat'])[0]['com_name']?></p>
                                                        <?php endif ?>

                                                     <?php if ($value['congty_or_nv']!=1): ?>
                                                            <div class="img mr_10 ">
                                                                <img onerror="this.src='../img/ep_logo.png'"  class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['nguoi_capnhat'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <p><?=search($data_list_nv,'ep_id',$value['nguoi_capnhat'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </td>
                                                
                                                <td class="">
                                                    <p><?=date('H:i - d/m/Y',$value['created_at'])?></p>
                                                </td>
                                                <td>
                                                    <div class="sua_xoa d_flex content_c ">
                                                        <?php if (in_array(3, $quyen_kiemtra)): ?>
                                                        <a href="/chinh-sua-cau-hoi-<?=$value['id']?>.html" class="btn_chinhsua position_r d_flex mr_10 edit_loaicauhoi">
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_sua.png" alt="Chỉnh sửa ">
                                                            </div>
                                                            <p class="color_blue font_w5 c-pointer">Sửa</p>
                                                        </a>
                                                        <?php endif ?>
                                                        <?php if (in_array(4, $quyen_kiemtra)&&in_array(3, $quyen_kiemtra)): ?>
                                                            
                                                        <span class="color_blue mr_10">|</span>
                                                        <?php endif ?>
                                                        <?php if (in_array(4, $quyen_kiemtra)): ?>
                                                        <div  data-id="<?=$value['id']?>" class="btn_xoa d_flex c-pointer">
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_xoa.png" alt="Xóa">
                                                            </div>
                                                            <p class="color_red font_w5">Xóa</p>
                                                        </div>
                                                        <?php endif ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>
                                <div class="footer_bang">
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
                                        <p class="chuden size-14">Tổng số: <?=$count_tong_vippro?> <span class="font-medium"> Đề kiểm tra</span></p>
                                        <div class="pagination_vippro">
                                            <?php if($limit< $count_tong_vippro) {
                                                echo generatePageBar3('',$page,$limit,$count_tong_vippro,$link,$lien_ket,'','active','preview','<','next','>','','<<<','','>>>');
                                            }
                                            ?>
                                        </div>      
                                    </div>
                                </div>
                                <div class="thanh_dk">
                                    <div class="turn turn_left" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popup xóa -->
    <div class="popup popup_500 popup_xoa ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa câu hỏi</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa  câu hỏi này không <span class="font_wB show_xoa_ten"></span> ?</p>
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
    <!-- popup thành công  -->
    <div class="popup popup_500 popup_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c p_noti">Xóa câu hỏi <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div class="popup_btn">
                    <div onclick="window.location.reload()" class="btn btn_xanh close_popup ">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup thành công -->

<div class="popup popup_thietlap_diem <? if($thangdiem_hethong!="") echo "hidden"; ?>">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Thiết lập thang điểm cho hệ thống</h4>
            </div>
            <div class="popup_body">
                <p class="cont_1"> Thiết lập <span class="font_wB"> Thang điểm </span> cho hệ thống
                    để có thể tạo<span class="font_wB"> Bài đánh giá</span> và<span class="font_wB"> Bài kiểm
                        tra!</span> </p>
                <div <?php if (!in_array(1, $quyen_thangdiem)): ?>data-thangdiem='0'<?php endif ?> class="popup_btn ditoithangdiem">
                    <a class="btn btn_xanh btn_140">
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
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%',
})
$('.btn_xoa').click(function() {
    var id_tc = $(this).attr('data-id');
    $('.js_done_xoa').attr('data-id',id_tc);
    $('.popup_xoa').show();
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/del_cauhoi.php',
            type: 'POST',
            data: {
                id_tc:id_tc, 
            },
            success: function(data){            
                $('.popup_xoa').hide();
                $('.popup_thanhcong').show();
            }
        }); 
    })
   
})


$('.search_value').change(function(e) {
    search_nhom_ts();
})
function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/danh-sach-cau-hoi.html";
    } else {
        window.location.href = "/danh-sach-cau-hoi.html?limit=" + limit + "&keyword=" + key;
    }
}

$('.chon_loaicauhoi').change(function(e) {
    search_loai_cauhoi();
})
function search_loai_cauhoi() {
    var key2 = $('.chon_loaicauhoi').val();
    var limit = $('#chon_ban_ghi').val();
    if (key2 == "" ) {
        window.location.href = "/danh-sach-cau-hoi.html";
    } else {
        window.location.href = "/danh-sach-cau-hoi.html?limit=" + limit + "&keyword2=" + key2;
    }
}

$('.chon_hinhthuc_cauhoi').change(function(e) {
    search_hinhthuc_cauhoi();
})
function search_hinhthuc_cauhoi() {
    var key3 = $('.chon_hinhthuc_cauhoi').val();
    var limit = $('#chon_ban_ghi').val();
    if (key3 == "" ) {
        window.location.href = "/danh-sach-cau-hoi.html";
    } else {
        window.location.href = "/danh-sach-cau-hoi.html?limit=" + limit + "&keyword3=" + key3;
    }
}

$('#chon_ban_ghi').change(function() {
    var limit = $(this).find(':selected').val();
    var key = $('.search_value').val();
    var key2 = $('.chon_loaicauhoi').val();
    var key3 = $('.chon_hinhthuc_cauhoi').val();

    var lien_ket = '';
    if (key != '') {
        lien_ket = "&keyword=" + key;
    }
    if (key2 != '') {
        lien_ket = "&keyword2=" + key2;
    }
    if (key3 != '') {
        lien_ket = "&keyword3=" + key3;
    }
    if (limit == "") {
        window.location.href = "/danh-sach-cau-hoi.html";
    } else {
        window.location.href = "/danh-sach-cau-hoi.html?limit=" + limit + lien_ket;
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