<?php
    include('config.php');
    if (!in_array(1, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("keyword","str","GET","");
$key = replaceMQ($key);


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
  
}else{
    if ($key !="") {
        $lien_ket = "&";
        $link .= "?keyword=".$key;
    }
 
}

// xử lý truy vấn
$sql="";
if (!empty($key)){
    if (is_numeric($key)==true){
        $sql .=" AND dg_id = '".$key."'";
    }
    // else{
    //     $sql .=" AND ten_nhom LIKE '%".$key."%'";
    // }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Đề đánh giá năng lực</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>
    <div id="ql_tieuchi_danhgia" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Đề đánh giá năng lực</p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi width_100 mb_20">
                                <div class="title_header">
                                    <p>Đề đánh giá năng lực</p>
                                </div>
                                <div class="d_flex space_b align_c">
                                    <div class="select_no_muti ql_tieuchi_m">
                                            <select name="" id=""
                                            class="search_item js_select_2 search_value ">
                                            <option value="">Tìm kiếm theo đề đánh giá năng lực</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM de_danhgia WHERE id_congty = '".$usc_id."' AND trangthai_xoa = 1 ");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option <?if($key !='' && $key==$nhom_timkiem['dg_id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['dg_id']?>"><?=$nhom_timkiem['dg_ten']?>
                                            </option>
                                            <?}?>
                                        </select>
                                        <span class="see_search"></span>

                                    </div>

                                    <div class="d_flex">
                                        <?php if (in_array(2, $quyen_tieuchi)): ?>
                                        <div class="them_moi mr_15">
                                            <a href='/quan_ly_tieu_chi_nang_luc_them_moi.html' class="btn btn_xanh">
                                                <img src="../img/icon_plus.png" alt="Thêm mới" class="mr_10">
                                                <p>Thêm mới</p>
                                            </a>
                                        </div>
                                        <?php endif ?>
                                        <a target="_blank" href="/huong_dan.html#de_dg" class="huong_dan d_flex align_c">
                                            <img src="../img/chamhoi.png" alt="Hướng đẫn" class="mr_6">
                                            <p class="font_s15 font_w5 color_blue">Hướng dẫn</p>
                                        </a>
                                    </div>
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
                                                    <p class="phantucon">Đề đánh giá</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Người tạo</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Ngày tạo</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Ghi chú</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Chức năng</p>
                                                </th>
                                            </tr>
                                        <? $stt=0;
                                            $query= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and id_congty='".$usc_id."' ".$sql." ORDER BY dg_id DESC LIMIT $start, $limit");
                                            $row = $query->result_array();
                                            $query2= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and id_congty='".$usc_id."' ".$sql."");
                                            $count_tong_vippro = mysql_num_rows($query2->result);
                                        foreach ($row as $key => $val):$stt ++;?>
                                            <tr class="dedanhgia_<?=$val['dg_id']?>">
                                                <td>
                                                    <p><? echo $stt; ?></p>
                                                </td>
                                                <td>
                                                    <p class="text_a_l">
                                                     <a class="color_blue elipsis1" href="quan_ly_tieu_chi_nang_luc_chi_tiet_<? echo $val['dg_id'];?>.html"><? echo $val['dg_ten']; ?></a>
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d_flex align_c">
                                                         <?php if ($val['dg_nguoitao']==$val['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$val['dg_nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$val['dg_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$val['dg_nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p class=""><?=search($cty,'com_id',$val['dg_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($val['dg_nguoitao']!=$val['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$val['dg_nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img mr_10 ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val['dg_nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$val['dg_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p class=""><?=search($data_list_nv,'ep_id',$val['dg_nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p><? 
                                                    $timestamp=$val['dg_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text_a_l elipsis1"><?if($val['dg_ghichu']=="") echo'—'; ?><?=$val['dg_ghichu'];?></p>
                                                </td>
                                                <td>
                                                    <div class="sua_xoa d_flex content_c ">
                                                        <?php if (in_array(3, $quyen_tieuchi)): ?>
                                                        <a href="/quan_ly_tieu_chi_nang_luc_chinh_sua_<? echo $val['dg_id'];?>.html"
                                                            class="btn_chinhsua position_r d_flex mr_14">
                                                            <div class="img mr_5">
                                                                <img src="../img/icon_sua.png" alt="Chỉnh sửa ">
                                                            </div>
                                                            <p class="color_blue font_w5">Sửa</p>
                                                        </a>
                                                        <?php endif ?>
                                                        <?php if (in_array(4, $quyen_tieuchi)): ?>
                                                        <button data-name="<?=$val['dg_ten']?>" data-id="<?=$val['dg_id']?>" class="btn_xoa d_flex c-pointer ">
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
                                        </table>
                                    </div>
                                </div>
                                <div class="footer_bang <?if($count_tong_vippro==0) echo 'top-50' ?>">
                                    <div style="flex-wrap: wrap;" class="flex center-height space top-20">
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
                                        <p class="chuden size-14">Tổng số: <?=$count_tong_vippro?> <span class="font-medium"> Đề đánh giá</span></p>
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
                    <p class="cont_1">Bạn có chắc chắn muốn xóa <span class="font_wB show_xoa_ten">?</span></p>
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
                <p class="text_a_c ">Xóa đề đánh giá <span class="font_wB show_xoa_ten"></span> thành
                    công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup back_js">
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
<script>
$('.js_select_2').select2({
    width: '100%',
})
$('.btn_xoa').click(function() {
    var id_tc = $(this).attr('data-id');
    var name_tc = $(this).attr('data-name');
    $('.js_done_xoa').attr('data-id',id_tc);
    $('.popup_xoa').show();
    $('.show_xoa_ten').text(name_tc);
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/capnhat_de_danhgia.php',
            type: 'POST',
            data: {
                id_tc:id_tc, 
            },
            success: function(data){   
            $('.dedanhgia_'+id_tc).remove();         
                $('.popup_xoa').hide();
                $('.popup_thanhcong').show();
                $('.back_js').click(function(){
                    window.location.href = '/quan_ly_tieu_chi_nang_luc.html';



                })
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
        window.location.href = "/quan_ly_tieu_chi_nang_luc.html";
    } else {
        window.location.href = "/quan_ly_tieu_chi_nang_luc.html?keyword=" + key + "&limit=" + limit;
    }
}

$('#chon_ban_ghi').change(function() {
    var value = $(this).find(':selected').val();
    var key = $('.search_value').val();

    var lien_ket = '';
    if (key != '') {
        lien_ket = "&keyword=" + key;
    }
    if (value == "") {
        window.location.href = "/quan_ly_tieu_chi_nang_luc.html";
    } else {
        window.location.href = "/quan_ly_tieu_chi_nang_luc.html?limit=" + value + lien_ket;
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