<?php
    include('config.php');
    if (!in_array(1, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};

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
        $sql .=" AND id = '".$key."'";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Loại câu hỏi</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
    .khoibang .bangchung .bangchinh tr th:nth-child(5){
        width: 384px;
    }.khoibang .bangchung .bangchinh tr th:nth-child(4){
        width: 180px;
    }
       .tx_gc{
          white-space: nowrap; 
          width: 75%; 
          overflow: hidden;
          text-overflow: ellipsis; 
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

<body>

    <div id="ql_tieuchi_danhgia" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Loại câu hỏi</p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi width_100 mb_20">
                                <div class="title_header">
                                    <p>Loại câu hỏi</p>
                                </div>
                                <div class="d_flex space_b align_c">
                                    <div class="select_no_muti ql_tieuchi_m">
                                            <select name="" id=""
                                            class="search_item js_select_2 search_value ">
                                            <option value="">Tìm kiếm theo tên loại câu hỏi</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM loaicauhoi WHERE id_congty = '".$usc_id."' AND trangthai_xoa = 1 ");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option <?if($key !='' && $key==$nhom_timkiem['id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['id']?>"><?=$nhom_timkiem['ten_loai']?>
                                            </option>
                                            <?}?>
                                        </select>
                                        <span class="see_search"></span>

                                    </div>
                                    <div class="d_flex">
                                        <?php if (in_array(2, $quyen_kiemtra)): ?>
                                        <div class="them_moi mr_15">
                                            <a  class="btn btn_xanh add_loaicauhoi hieuung">
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
                                                    <p class="phantucon">Loại câu hỏi</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Người tạo </p>
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
                                            <?  
                                            $stt=0;
                                            $query= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id>0 and id_congty='".$usc_id."' ".$sql." ORDER BY id DESC LIMIT $start, $limit");
                                            $row = $query->result_array();
                                            $query2= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id_congty='".$usc_id."'".$sql."");
                                            $count_tong_vippro = mysql_num_rows($query2->result);
                                            foreach ($row as $key => $value) {
                                            $stt ++;  
                                            ?>
                                            <tr>
                                                <td>
                                                    <p><?echo $stt;?></p>
                                                </td>
                                                <td>
                                                    <p class="text_a_l "><a class="color_blue" ><?echo $value['ten_loai'];?></a>
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d_flex align_c">
                                                         <?php if ($value['nguoitao']==$value['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$value['nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$value['nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$value['nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p class="one_line"><?=search($cty,'com_id',$value['nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($value['nguoitao']!=$value['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img mr_10 ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <p><?=date('H:i',$value['created_at'])?> - <?=date('d/m/Y',$value['created_at'])?></p>
                                                </td>
                                                
                                                <td class="">
                                                    <div class="flex between">
                                                        
                                                    <p class="text_a_l tx_gc "><?if ($value['ghichu']=="") {
                                                        echo'—';
                                                    }?><?=$value['ghichu']?></p><span data-id-gc='<?=$value['id']?>' class="chuxanh size-14 c-pointer more_info">Xem thêm</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="sua_xoa d_flex content_c ">
                                                        <?php if (in_array(3, $quyen_kiemtra)): ?>
                                                        <a data-id-loai='<?=$value['id']?>' class="btn_chinhsua position_r d_flex mr_10 edit_loaicauhoi">
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
                                        <p class="chuden size-14">Tổng số: <?=$count_tong_vippro?> <span class="font-medium"> Loại câu hỏi</span></p>
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
                    <h4 class="name_header">Xóa loại câu hỏi</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa loại câu hỏi này không <span class="font_wB show_xoa_ten"></span> ?</p>
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

    <div class="popup popup_500 them_laicauhoi ">
        <form action="" class="frm_add_type_question " method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Thêm mới loại câu hỏi</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <div class="form_group">
                        <label for="">Tên loại câu hỏi<span class="color_red">*</span></label>
                        <input type="text" class="ten size-14" name="ten" placeholder="Nhập tên loại câu hỏi">
                    </div>
                    <div class="form_group">
                        <label for="">Mô tả loại câu hỏi</label>
                        <textarea class="top-5 chuden size-14 mota" rows="5" name="ghi_chu" value='' placeholder="Nhập nội dung" ></textarea>
                    </div>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68 close_popup">Hủy</div>
                        <button type="submit" class="btn btn_xanh btn_140 "> Đồng ý</button>
                        <div  >
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="popup popup_500 sua_laicauhoi ">
        <form action="" class="frm_edit_type_question " method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Chỉnh sửa loại câu hỏi</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <div class="form_group">
                        <label for="">Tên loại câu hỏi<span class="color_red">*</span></label>
                        <input type="text" class="ten_edit size-14" name="ten_edit" placeholder="Nhập tên loại câu hỏi">
                    </div>
                    <div class="form_group">
                        <label for="">Mô tả loại câu hỏi<span class="color_red">*</span></label>
                        <textarea class="top-5 chuden size-14 mota_edit" rows="5" name="mota_edit" value='' placeholder="Nhập nội dung" ></textarea>
                    </div>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68 close_popup">Hủy</div>
                        <button type="submit" class="btn btn_xanh btn_140 done_edit"> Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div  class="popup popup_500 show_more_info ">
        <form action="" class=" " method="post" enctype="multipart/form-data"></form>
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Mô tả</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div style="padding: 20px;" class="popup_body">
                    <div class="m_boder" style="overflow-y: auto;">
                    <p style="max-height: 210px;" class="chuden size-15 text_ghichu"> 
                    </p>
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
                <p class="text_a_c p_noti">Xóa loại câu hỏi <span class="font_wB show_xoa_ten"> </span> thành công!</p>
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
            url: '/ajax/del_loaicauhoi.php',
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
        window.location.href = "/loai-cau-hoi.html";
    } else {
        window.location.href = "/loai-cau-hoi.html?keyword=" + key + "&limit=" + limit;
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
        window.location.href = "/loai-cau-hoi.html";
    } else {
        window.location.href = "/loai-cau-hoi.html?limit=" + value + lien_ket;
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
$('.add_loaicauhoi').click(function(){
    $('.them_laicauhoi').show();
})
$('.more_info').click(function(){
    var id=$(this).attr('data-id-gc');
    $.ajax({
            url: '/ajax/get_details_loaicauhoi.php',
            type: 'POST',
            dataType: "json",
            data: {
                id:id, 
            },
            success: function(response){
                if (response.status == true){
                    var data = response.data;
                    $('.text_ghichu').text(data.ghichu);
                }
            }
        }); 
     $('.show_more_info').show();
})
$('.edit_loaicauhoi').click(function(){
    var id=$(this).attr('data-id-loai');
    $('.done_edit').attr('data-id',id);
    $.ajax({
            url: '/ajax/get_details_loaicauhoi.php',
            type: 'POST',
            dataType: "json",
            data: {
                id:id, 
            },
            success: function(response){
                if (response.status == true){
                    var data = response.data;
                    $('.ten_edit').val(data.ten_loai);
                    $('.mota_edit').text(data.ghichu);
                }
            }
        }); 
     $('.sua_laicauhoi').show();
})
$('.frm_add_type_question').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        ten: "required",
    },
    messages: {
        ten: "Không được để trống",
    },
    submitHandler: function(form){
        var ten=$('.ten').val();
        var mota=$('.mota').val();

        var data_send = new FormData();
        data_send.append('ten', ten);
        data_send.append('mota', mota);

        $.ajax({
            type: "POST",
            url: "/ajax/add_loaicauhoi.php",
            data: data_send,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(response) {
                if (response.status == true) {
                    $('.popup').hide();
                    $('.p_noti').text('Thêm mới thành công');
                    $('.popup_thanhcong').show();
                    
                }
            }
        });
    },
});

$('.frm_edit_type_question').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        ten_edit: "required",
    },
    messages: {
        ten_edit: "Không được để trống",
    },
    submitHandler: function(form){
        var ten=$('.ten_edit').val();
        var mota=$('.mota_edit').val();
        var id=$('.done_edit').attr("data-id");

        var data_send = new FormData();
        data_send.append('ten', ten);
        data_send.append('mota', mota);
        data_send.append('id', id);

        $.ajax({
            type: "POST",
            url: "/ajax/edit_loaicauhoi.php",
            data: data_send,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(response) {
                if (response.status === true) {
                    $('.popup').hide();
                    $('.p_noti').text('Cập nhật thành công');
                    $('.popup_thanhcong').show();
                }
            }
        });
    },
});


</script>

</html>