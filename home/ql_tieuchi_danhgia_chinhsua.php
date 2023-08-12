<?
include('config.php');
if (!in_array(3, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
$key_tc = getValue("id","int","GET",0);

 
$query= new db_query("SELECT * FROM tbl_tieuchi where id = '".$key."'");
$row = mysql_fetch_assoc($query->result);

$is_th_ordon=$row['tcd_loai'];
$sodiem=$row['tcd_thangdiem'];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
}
    </style>
    <title>Chỉnh sửa tiêu chí đánh giá</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>
    <div id="ql_tieuchi_them_sua" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header ">
                                <div class="d_flex">
                                    <a href='/quan_ly_tieu_chi_danh_gia.html' class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách lý tiêu chí đánh giá <span> / </span><span> Chỉnh sửa tiêu chí</span>
                                    </p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="body_ql_tieuchi">
                                <div class="title_header ">
                                    <div class="d_flex">
                                        <a href='/quan_ly_tieu_chi_danh_gia.html' class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách lý tiêu chí đánh giá <span> / </span><span> Chỉnh sửa tiêu
                                                chí</span></p>
                                    </div>
                                </div>
                                <div class="header_d width_100">
                                    <h4>Chỉnh sửa tiêu chí</h4>
                                </div>
                                <div class="body width_100">
                                    <form onsubmit="return false" action="" method="post" enctype="multipart/form-data"
                                        class="form form_tieuchi form_them_tieuchi form_them_tieuchi_con">
                                        <div class="container">
                                            <div class="form_container">
                                                <div class="form_group group_ten <?if($row['tcd_nguoitao']==1) echo "form_group_block" ?>">
                                                    <label for="">Tên tiêu chí <span class="color_red">*</span></label>
                                                    <input type="text" class="ten" name="ten" value="<?=$row['tcd_ten']?>" placeholder="Nhập tên tiêu chí">
                                                </div>

                                                <div class="<?if($row['tcd_nguoitao']==1) echo "select_block" ?>  form_group position_r group_loai_tc tieuchi_1 ">

                                                    <label for="" class="hover_thongtin d_flex align_c c-pointer">
                                                        <span>Loại tiêu chí</span>
                                                    </label>

                                                    <div class="select_no_muti  "  >
                                                        <select   class="js_select_2 loai_tc " name="loai_tc "id="loai_tc">
                                                        <option value="<?=$row['tcd_loai']?>"><? if($row['tcd_loai']==1) echo "Tiêu chí đơn ";else echo "Tiêu chí tổng hợp"; ?>
                                                        </option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group group_trang_thai ">
                                                    <label for=""> Trạng thái <span class="color_red">*</span></label>
                                                    <div class="select_no_muti ">
                                                        <select class="js_select_2 trang_thai " name="trang_thai">
                                                            <option <?if($row['tcd_trangthai']==2) echo 'selected' ?> value="2">Mở</option>
                                                            <option <?if($row['tcd_trangthai']==1) echo 'selected' ?> value="1">Đóng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form_group group_tc_con display_none ">
                                                    <label for=""> Tiêu chí tổng hợp <span
                                                            class="color_red">*</span></label>
                                                    <div class="select_no_muti">
                                                        <select   class="js_select_2 tc_tonghop " name="tc_tonghop">
                                                            <?
                                                            $query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and (id_congty=1 or id_congty='".$usc_id."')  ");
                                                            $row1 = $query->result_array();
                                                            foreach ($row1 as $key => $value) {
                                                               ?>
                                                               
                                                            <option <?if($row['tc_id_tonghop']==$value['id']) echo 'selected' ?> value="<? echo $value['id']?>"><? echo $value['tcd_ten']?></option>
                                                             <?
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                   
                                               
                                                <div class="form_group form_group_block group_nguoi_tao group_tc_cha  ">
                                                    <label for="">Người tạo</label>
                                                <input type="text" name="nguoi_tao" value="<?php if ($row['tcd_nguoitao']!=$row['id_congty']): ?><?=search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_name']?><?php endif ?><?php if ($row['tcd_nguoitao']==$row['id_congty']): ?><?=search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_name']?><?php endif ?>">
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group form_group_block group_ngay_tao group_tc_cha ">
                                                    <label for="">Ngày tạo</label>
                                                    <input type="text" name="ngay_tao" value="<? 
                                                    $timestamp=$row['tcd_ngaytao'];
                                                    echo(date("d/m/Y ", $timestamp)); ?>">
                                                </div>
                                                <div class="form_group group_tc_con mr_20 display_none">
                                                    <div class=" d_flex ">
                                                        <div class="form_group form_group_block group_nguoi_tao  ">
                                                            <label for="">Người tạo</label>
                                                            
                                                            <input type="text" name="nguoi_tao"
                                                                value="<?php if ($row['tcd_nguoitao']!=$row['id_congty']): ?><?=search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_name']?><?php endif ?><?php if ($row['tcd_nguoitao']==$row['id_congty']): ?><?=search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_name']?><?php endif ?>">
                                                        </div>
                                                        <div class="form_group form_group_block group_ngay_tao">
                                                            <label for="">Ngày tạo</label>
                                                            <input type="text" name="ngay_tao" value="<? 
                                                    $timestamp=$row['tcd_ngaytao'];
                                                    echo(date("d/m/Y ", $timestamp)); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form_group  group_thang_diem">
                                                    <label for="">Số điểm <span class="color_red">*</span></label>
                                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  type="text"  name="thang_diem" class="thang_diem" value="<?=$row['tcd_thangdiem']?>" >
                                                </div>
                                            </div>
                                            <div class="form_group group_ghi_chu">
                                                <label for="">Ghi chú</label>
                                                <textarea id="editor1" class="ghi_chu" name="ghi_chu" cols="80" rows="10"><?=$row['tcd_ghichu']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form_btn d_flex content_c mt_25">
                                            <button onclick="window.location.href='/quan_ly_tieu_chi_danh_gia_chi_tiet_<?=$key_tc?>.html'" class="btn btn_trang btn_168 mr_60">Hủy</button>
                                            <button type="submit" name="submit_update" class="ajax_them_tc btn btn_xanh btn_168 outline_none">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popup thành công  -->
   
    <div class="popup popup_500 popup_thanhcong k_an hidden">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Chỉnh sửa tiêu chí <span class="font_wB show_xoa_ten"><?=$row['tcd_ten']?></span> thành công! </p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup back_list">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end popup thành công -->
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>

$(document).ready(function(){
   var is_th_ordon=<?=$is_th_ordon?>;
   if (is_th_ordon==2) {
    var bien=<?=$key_tc?>;
    $('.tc_tonghop').val(bien).trigger('change');
   }
   if (is_th_ordon==1) {
    $('.tc_tonghop').trigger('change');
   }
    
})
$('.tc_tonghop').change(function(){
    var id_tc_tonghop=$(this).val();
    var is_th_ordon=<?=$is_th_ordon?>;
    var sodiem=<?=$sodiem?>;

    $.ajax({
            url: '/ajax/tinhtoan_diemcha_tieuchi.php',
            type: 'POST',
            data: {
                id_tc_tonghop:id_tc_tonghop, 
            },
            dataType: "json",
            success: function(data){
            if (is_th_ordon==2) {
              $('.ajax_them_tc').attr('data-tong-tc-con',data.tong_tc_don);
              $('.ajax_them_tc').attr('data-tong-tc-cha',data.tong_tc_cha);
            }  
            if (is_th_ordon==1) {
              $('.ajax_them_tc').attr('data-tong-tc-con',(data.tong_tc_don-sodiem));
              $('.ajax_them_tc').attr('data-tong-tc-cha',data.tong_tc_cha);
            }  
            }
        });

})


$('.js_select_2').select2({
    width: '100%',
})
CKEDITOR.replace('editor1', {
    height: '108'
});
CKEDITOR.config.autoParagraph = false;
$('#loai_tc').change(function() {
    tieuchi = $(this).val();
    if (tieuchi == 1) {
        $('.group_loai_tc').addClass('tieuchi_1');
        $('.group_loai_tc').addClass('tieuchi_2');
        $('.group_tc_con').removeClass('display_none');
        $('.group_tc_cha').addClass('display_none');
    } else {
        $('.group_loai_tc').removeClass('tieuchi_1');
        $('.group_loai_tc').addClass('tieuchi_2');
        $('.group_tc_con').addClass('display_none');
        $('.group_tc_cha').removeClass('display_none');
    }
})
$(document).ready(function(){
    $('#loai_tc').trigger('change');
})

$('.form_them_tieuchi').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        ten: "required",
        trang_thai: "required",
        thang_diem: "required"
    },
    messages: {
        ten: "Không được để trống",
        trang_thai: "Không được để trống",
        thang_diem: "Không được để trống"
    },
});
$('.hover_thongtin').click(function() {
    if ($('.tieuchi_1').is(":visible")) {
        $('.modal_loai_tieuchi_1').toggle();
    } else {
        $('.modal_loai_tieuchi_2').toggle();
    }
})
$('.back_list').click(function(){
    window.location.href = '/quan_ly_tieu_chi_danh_gia_chi_tiet_<?=$key_tc?>.html';



})
active_single_menu('tc_tong');
active_single_menu_con('tieuchi_menu');


$('.ajax_them_tc').click(function() {
    var tc_don_tong=Number($(this).attr('data-tong-tc-con')) ;
    var tc_tonghop_tong=Number($(this).attr('data-tong-tc-cha')) ;

    var check=tc_tonghop_tong-tc_don_tong;
    
    var regex=/^\d+$/;
    var ten = $('.ten').val();
    var loai_tc = $('.loai_tc').val();
    var id_tc=<?=$key_tc?>;
    var trang_thai = $('.trang_thai').val();
    var thang_diem =Number($('.thang_diem').val());
    var ghi_chu= CKEDITOR.instances['editor1'].getData() ;
    

if(thang_diem<=0){alert("Số điểm phải lớn hơn 0");return}
if( ten==""|| thang_diem=="") {alert("Vui lòng nhập đủ thông tin");return}
if(thang_diem > <?=$thangdiem_hethong?>){alert("Số điểm phải nhỏ hơn hoặc bằng <?=$thangdiem_hethong?>");return}
if (regex.test(thang_diem)==false)
{
    alert("Định dạng số điểm phải là số!");
    return;
}

if (loai_tc==1) {
   
   if (thang_diem>check) {
    alert("Số điểm còn lại của tiêu chí tổng hợp này là "+check+"!.Vui lòng nhập lại");
    return;
   }
}
if (loai_tc==2) {
    if (thang_diem<tc_don_tong) {
        alert('Số điểm tối thiểu phải bằng '+tc_don_tong+' (Tổng số điểm tiêu chí đơn của tiêu chí này là '+tc_don_tong+') ');
        return;
    }
}
        $.ajax({
            url: '/ajax/edit_tieuchi.php',
            type: 'POST',
            data: {
                ten:ten, 
                trang_thai:trang_thai, 
                thang_diem:thang_diem, 
                ghi_chu:ghi_chu, 
                id_tc:id_tc, 
            },
            success: function(data){  
                if (data==1) {
                    alert('Tên tiêu chí đã tồn tại vui lòng chọn tên khác');
                }else $('.popup_thanhcong').removeClass('hidden');
                
            }
        }); 

})
$('.tc_tonghop').attr('disabled', true);
$('.loai_tc').attr('disabled', true);
</script>

</html>