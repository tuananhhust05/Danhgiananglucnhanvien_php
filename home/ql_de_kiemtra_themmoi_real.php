<?
include('config.php');
if (!in_array(2, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
$query= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and (hinhthuc=2 or hinhthuc=3) and id_congty=".$usc_id."");
$tracnghiem = $query->result_array();

$query2= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and hinhthuc=1 and id_congty=".$usc_id."");
$tuluan = $query2->result_array();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Thêm mới đề kiểm tra năng lực</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
    .select2-container--default.select2-container--focus .select2-selection--multiple {
     border:1px solid #cccccc ; 
    outline: 0;
}
    .form_container .form_group.new_loai {
	    width: 31%;
	}
    .select2-container .select2-selection--multiple{
        min-height: 250px;
    }
    .select2-container--default .select2-selection--multiple{
        border: 1px solid #ccc;
    }
    .select2-container .select2-search--inline .select2-search__field {
        font-size: 14px;
        margin-top: 10px;
        margin-left: 15px;
    }
    input[type="radio"] { 
        outline: none;
        cursor: pointer;
    }
    input[type="number"] { 
        outline: none;
        cursor: pointer;
    }input[type="text"] { 
        outline: none;
        cursor: pointer;
    }
    input[type="checkbox"] { 
        outline: none;
        cursor: pointer;
    }
        .body_ql_tieuchi .tieu_chi {
         min-width: 100%; 
    }
    .ql_tieuchi_m {
        width: 100%;
    }
    .popup_680 .khoibang_2 .bangchung_2 {
    overflow-y: auto;
    padding-bottom: 0px;
    }
    .popup_680 .khoibang_2 .bangchung_2 {
    max-height: 300px;
    }
    .tx_gc{
          white-space: nowrap; 
          width: 100%; 
          overflow: hidden;
          text-overflow: ellipsis; 
        }
    .a_khoibang .khoibang .bangchung .bangchinh tr th:nth-child(2){
        width: 444px;
    } 
    .a_khoibang .khoibang .bangchung .bangchinh td:nth-child(2){
        text-align: left;
    }   
    .new_loai:last-child{
    	margin-right: unset !important;
    }
    .select2-container {
        width: 100% !important;
    }
    </style>
</head>

<body>
    <div id="ql_tieuchi_nangluc_chitiet" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/de-kiem-tra.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra<span> / </span><span> Thêm mới</span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="title_header">
                                    <div class="d_flex"> <a href='/quan_ly_de_kiem_tra_nang_luc.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra <span> / </span><span> Thêm mới</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="header_d width_100">
                                    <h4>Thêm mới đề kiểm tra</h4>
                                </div>
                                <div class="body width_100">
                                    <form onsubmit="return false" action="" method="post" enctype="multipart/form-data"
                                        class="form form_themmoi_de">
                                        <div class="container mb_20">
                                            <div class="form_container">
                                                <div class="form_group">
                                                    <label for="">Hình thức tạo đề<span class="color_red">*</span></label>
                                                    <div class="select_no_muti ">
                                                        <select name="" id="" class="js_select_2 loai_de  arr_cauhoi">
                                                            <option value="1">Người dùng tự thiết lập</option>
                                                            <option value="2">Hệ thống sinh đề theo điều kiện</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form_group ">
                                                    <label for="">Hình thức đề kiểm tra <span class="color_red">*</span></label>
                                                    <div class="select_no_muti ">
                                                        <select name="" id="" class="js_select_2 hinhthuc_de  arr_cauhoi">
                                                            <option value="1">Trắc nghiệm</option>
                                                            <option value="2">Tự luận</option>
                                                            <option value="3">Trắc nghiệm và tự luận</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nguoidung_sinhde">
                                                <div class="form_container">
                                                    <div class="form_group nhaptende">
                                                        <label for="">Tên đề kiểm tra năng lực nhân viên<span
                                                                class="color_red">*</span></label>
                                                        <input type="text" class="ten" name="ten" placeholder="Nhập tên đề kiểm tra">
                                                    </div>
                                                    <div class="form_group form_group_block">
                                                        <label for="">Người tạo</label>
                                                        <input type="text" data-nguoitao="<?echo $_SESSION['ep_id']; ?>" class="nguoi_tao" name="nguoi_tao "
                                                            value="<?=$_SESSION['ep_name'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hethong_sinhde">
                                                <div class="form_container">
                                                    <div class="form_group form_group_block">
                                                        <label for="">Người tạo</label>
                                                        <input type="text" data-nguoitao="<?echo $_SESSION['ep_id']; ?>" class="nguoi_tao" name="nguoi_tao "
                                                            value="<?=$_SESSION['ep_name'];?>">
                                                    </div>
                                                    <div class="form_group form_group_block flex">
                                                        <div class="right-20">
                                                            <label for="">Ngày tạo</label>
                                                            <input type="text" data-ngaytao="<?=time()?>" class="ngay_Tao" name="ngay_tao" value="<? $timestamp=time();echo(date("d/m/Y ", $timestamp)); ?>">
                                                        </div>
                                                        <div class="">
                                                            <label for="">Thang điểm <span class="color_red">*</span></label>
                                                            <input type="text" class="thangdiem_ht" name="" 
                                                                value="<?=$thangdiem_hethong?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nguoidung_sinhde">
                                                <div class="form_container">
                                                    <div class="form_group form_group_block">
                                                        <label for="">Ngày tạo</label>
                                                        <input type="text" data-ngaytao="<?=time()?>" class="ngay_Tao" name="ngay_tao" value="<? $timestamp=time();echo(date("d/m/Y ", $timestamp)); ?>">
                                                    </div>
                                                    <div class="form_group form_group_block">
                                                        <label for="">Thang điểm <span class="color_red">*</span></label>
                                                        <input type="text" class="thangdiem_ht" name="" 
                                                            value="<?=$thangdiem_hethong?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dang_tracnghiem">
                                                <h4 class="font_ss16 font_wB chuxanh bot-15 hethong_sinhde">Điều kiện câu hỏi trắc nghiệm</h4>
                                                <div class="form_container hethong_sinhde">
                                                    <div class="form_group ">
                                                        <label for="">Tổng số câu hỏi trắc nghiệm trong đề kiểm tra<span class="color_red">*</span></label>
                                                        <input type="text" class="socauhoi" id='sodiem_ch_input' name="" 
                                                            value="" placeholder="Nhập số câu hỏi">
                                                    </div>
                                                    <div class="form_group po_ra">
                                                        <label for="">Thời gian thực hiện <span class="color_red">*</span></label>
                                                        <input type="text" class="time_thuchien " name="" 
                                                            value="" placeholder="Nhập thời gian" id="time_thuchien_input"> 
                                                        <span class="po_ab chuden size-14 text_phut">Phút</span>
                                                    </div>
                                                    
                                                </div>
                                                <?
                                                $query= new db_query("SELECT * FROM loaicauhoi where  trangthai_xoa=1 and id_congty='".$usc_id."'");
                                            	$loai_cauhoi = $query->result_array();
                                                ?>
                                                <div  class="form_container hethong_sinhde">
	                                                <div style="width: 49%;" class="form_group select_no_muti  ">
	                                                    <label class="one_line2 " >Chọn loại</label>
                                                        <div style="margin-top: 5px;">
                                                            
	                                                    <select multiple="" class="js_select_2 select_loai_tracnghiem" id="" name="">
				                                        	<option value="">Tất cả loại câu hỏi</option>
				                                            <?php foreach ($loai_cauhoi as  $value_loai_cauhoi): ?>
				                                            	<option  value="<?=$value_loai_cauhoi['id']?>"><?=$value_loai_cauhoi['ten_loai']?></option>
				                                            <?php endforeach ?>
				                                        </select>
                                                        </div>
	                                                </div>
	                                                <div class="form_group ">
                                                        <div class="s_loai_chung"></div>
	                                                   <p class="chudo size-14 display_none num_tb">Số lượng loại câu hỏi bằng số câu hỏi</p>
	                                                </div>
                                                </div>
                                                
                                                <div class="hethong_sinhde bot-15 c-pointer hieuung">
                                                    <div class="sinhdekiemtra flex a_center j_center ">
                                                        <p class="size-14 chutrang">Sinh đề kiểm tra trắc nghiệm</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dang_tuluan">
                                                <h4 class="font_ss16 font_wB chuxanh bot-15 hethong_sinhde">Điều kiện câu hỏi tự luận</h4>
                                                <div class="form_container hethong_sinhde">
                                                    <div class="form_group ">
                                                        <label for="">Số câu hỏi tự luận trong đề kiểm tra<span class="color_red">*</span></label>
                                                        <input type="text" class="socauhoi" id='sodiem_ch_input_tl' name="" 
                                                            value="" placeholder="Nhập số câu hỏi">
                                                    </div>

                                                    <div class="form_group po_ra">
                                                        <label for="">Thời gian thực hiện <span class="color_red">*</span></label>
                                                        <input type="text" class="time_thuchien " name="" 
                                                            value="" placeholder="Nhập thời gian" id="time_thuchien_input_tl"> 
                                                        <span class="po_ab chuden size-14 text_phut">Phút</span>
                                                    </div>
                                                </div>
                                                <div  class="form_container hethong_sinhde">
                                                    <div style="width: 49%;" class="form_group select_no_muti  ">
                                                        <label class="one_line2 " >Chọn loại<span class="color_red">*</span></label>
                                                        <select multiple="" class="js_select_2 select_loai_tuluan" id="" name="">
                                                            <option value="">Tất cả loại câu hỏi</option>
                                                            <?php foreach ($loai_cauhoi as  $value_loai_cauhoi): ?>
                                                                <option  value="<?=$value_loai_cauhoi['id']?>"><?=$value_loai_cauhoi['ten_loai']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form_group ">
                                                        <div class="s_loai_chung_tuluan"></div>
                                                       <p class="chudo size-14 display_none num_tb_tl">Số lượng loại câu hỏi bằng số câu hỏi</p>
                                                    </div>
                                                </div>
                                                <div class="hethong_sinhde bot-15 c-pointer hieuung">
                                                    <div class="sinhdekiemtra flex a_center j_center ">
                                                        <p class="size-14 chutrang">Sinh đề kiểm tra tự luận</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="nguoidung_sinhde">
                                            <div class="form_group">
                                                <label for="">Ghi chú</label>
                                                <textarea id="editor1" name="ghi_chu" value=''></textarea>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="nguoidung_sinhde">
                                            <div class="dang_tracnghiem ">
                                                <div class="mb_20 d_flex space_b width_100 align_c color_blue">
                                                    <h4 class="font_ss16 font_wB">Danh sách câu hỏi trắc nghiệm</h4>
                                                    <div class="btn_them_tracnghiem d_flex align_c cursor_p hieuung">
                                                        <div class="img_themmoi_cauhoi">
                                                            <img src="../img/icon_plus.png" alt="Thêm mới">
                                                        </div>
                                                        <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
                                                    </div>
                                                </div>
                                                <div class="bang_tieuchi_danhgia mb_20">
                                                    <div class="khoibang">
                                                        <div class="bangchung">
                                                            <table class="bangchinh tieu_chi tess">
                                                                <tbody class="op_sp">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">STT</p>
                                                                    </th>
                                                                    <th style="width: 60%;">
                                                                        <p class="phantucon">Câu hỏi</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Số điểm</p>
                                                                    </th>
                                                                    <th style="width: 15%;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                                
                                                                <tr class="nentrang-chuden  ">
                                                                    <td colspan="2">
                                                                        <p class="text_a_l"><span>Tổng điểm: </span>
                                                                            <span class="tb_td_er color_red"></span>
                                                                        </p>
                                                                    </td>
                                                                    <td class="show_tong_tracnghiem" colspan="2">0</td>
                                                                    
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nguoidung_sinhde">
                                            <div class="dang_tuluan ">
                                                <div class="mb_20 d_flex space_b width_100 align_c color_blue">
                                                    <h4 class="font_ss16 font_wB">Danh sách câu hỏi tự luận</h4>
                                                    <div class="btn_them_tuluan d_flex align_c cursor_p hieuung">
                                                        <div class="img_themmoi_cauhoi">
                                                            <img src="../img/icon_plus.png" alt="Thêm mới">
                                                        </div>
                                                        <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
                                                    </div>
                                                </div>
                                                <div class="bang_tieuchi_danhgia mb_20">
                                                    <div class="khoibang">
                                                        <div class="bangchung">
                                                            <table class="bangchinh tieu_chi tess">
                                                                <tbody class="op_sp">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">STT</p>
                                                                    </th>
                                                                    <th style="width: 60%;">
                                                                        <p class="phantucon">Câu hỏi</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Số điểm</p>
                                                                    </th>
                                                                    <th style="width: 15%;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                                
                                                                <tr class="nentrang-chuden  ">
                                                                    <td colspan="2">
                                                                        <p class="text_a_l"><span>Tổng điểm: </span>
                                                                            <span class="tb_td_er color_red"></span>
                                                                        </p>
                                                                    </td>
                                                                    <td class="show_tong_tracnghiem" colspan="2">0</td>
                                                                    
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hethong_sinhde" id='show_phuhop_tn'>
                                            <div class="dang_tracnghiem">
                                                <h4 class="font_ss16 font_wB chuxanh bot-15 ">Danh sách đề kiểm tra trắc nghiệm phù hợp</h4>
                                                <div class="body_ql_tieuchi body_ql_de">
                                                    <div class="khoibang">
                                                        <div style="overflow-x: auto;margin-bottom: 15px;" class="bangchung" id="bang_chung">
                                                            <table class="bangchinh tieu_chi">
                                                                <tbody class="op_sp_hethong">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">Chọn</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Đề kiểm tra</p>
                                                                    </th>
                                                                    <th >
                                                                        <p class="phantucon">Ghi chú</p>
                                                                    </th>
                                                                    
                                                                    <th style="width: 100px;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                               
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="hethong_sinhde" id='show_phuhop_tl'>
                                            <div class="dang_tuluan">
                                                <h4 class="font_ss16 font_wB chuxanh bot-15 ">Danh sách đề kiểm tra tự luận phù hợp</h4>
                                                <div class="body_ql_tieuchi body_ql_de">
                                                    <div class="khoibang">
                                                        <div style="overflow-x: auto;margin-bottom: 15px;" class="bangchung" id="bang_chung">
                                                            <table class="bangchinh tieu_chi">
                                                                <tbody class="op_sp_hethong_tl">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">Chọn</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Đề kiểm tra</p>
                                                                    </th>
                                                                    <th >
                                                                        <p class="phantucon">Ghi chú</p>
                                                                    </th>
                                                                    <th style="width: 100px;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                               
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class=" ">
                                            <div class="thiet_lap d_flex mb_20">
                                                <h4 class="color_blue font_wB font_ss16 mr_20">
                                                    Thiết lập phân loại đánh giá:
                                                </h4>

                                                <div class="container_thietlap">
                                                    <div class="d_flex align_c mr_3_flex align_c mr_30">
                                                        <input type="radio" name="drone" id="radio_macdinh" value="1"
                                                            class="mr_5 check_dm" checked>
                                                        <label for="huey">Mặc định</label>
                                                    </div>
                                                    <div class="d_flex align_c">
                                                        <input type="radio" name="drone" id="radio_khac" value="2"
                                                            class="mr_5 check_dm">
                                                        <label for="dewey">Khác</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                                <div class="header_d width_100">
                                                    <h4>Phân loại đánh giá</h4>
                                                </div>
                                                <div style="overflow: auto;" class="body width_100">
                                                    <ul class="thongtin_tieuchi">
                                                        <?
                                                            foreach ($pl as $value) {
                                                                ?>
                                                                <li class="item">
                                                                    <p><?
                                                                    if($value[2]==1)echo "Yếu";
                                                                    if($value[2]==2)echo "Trung bình";
                                                                    if($value[2]==3)echo "Khá";
                                                                    if($value[2]==4)echo "Giỏi";
                                                                    if($value[2]==5)echo "Xuất sắc";
                                                                ?>:</p>
                                                                    <p><span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                                        <span><?=$value[1]?></span>
                                                                    </p>
                                                                </li>
                                                                <?
                                                            }
                                                        ?>
                                                        
                                                        
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_khac display_none">
                                                <div class="header_d width_100">
                                                    <h4>Phân loại đánh giá</h4>
                                                </div>

                                                <div class="body width_100">
                                                    <div class="container_form_4_tong">
                                                        <div class="container_form_4 d_flex ">
                                                        <div class="form_group ">
                                                            <label for="">Từ <span class="color_red">*</span></label>
                                                            <input type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm">
                                                        </div>
                                                        <div class="form_group ">
                                                            <label for="">Đến<span class="color_red">*</span></label>
                                                            <input type="text" class="arr_tt_sp den mc_den1" name="den_diem" placeholder="Nhập số điểm">
                                                        </div>
                                                        <div class="form_group ">
                                                            <label for="">Loại<span class="color_red">*</span></label>
                                                            <div class="select_no_muti ">
                                                                <select class="js_select_2 arr_tt_sp loai" name="loai_danhgia">
                                                                    <option value="">Chọn loại</option>
                                                                    <option value="1">Yếu</option>
                                                                    <option value="2">Trung bình</option>
                                                                    <option value="3">Khá</option>
                                                                    <option value="4">Giỏi</option>
                                                                    <option value="5">Xuất sắc</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form_group form_btn d_flex content_c">
                                                            <button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                    <div data-num='1' class="themmoi_form themmoi_loai">
                                                        <div  class="btn btn_xanh ">
                                                            <div class="img mr_10">
                                                                <img src="../img/icon_plus.png" alt="Thêm mới">
                                                            </div>
                                                            <p>Thêm loại</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="btn_form_de  d_flex content_c mt_25">
                                            <div onclick="window.location.href='/de-kiem-tra.html'" class="btn_huy btn btn_168 btn_trang mr_68">
                                                Hủy
                                            </div>
                                            <button onclick="CKupdate()" type="submit" class="btn_tieptuc_1 btn btn_168 btn_xanh ">
                                                <div class="d_flex align_c ">
                                                    <p>Tạo đề</p>
                                                </div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- display_none -->
                        <div class="xemchitiet_dephuhop display_none top-20 ">
                            <div class="hieuung quaylai btn btn_140 btn_trang mr_68 bot-20">
                                <p class="flex">
                                    <img class="right-10" src="../img/quaylai.png" alt="">
                                    Quay lai
                                </p>
                            </div>
                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="header_d width_100">
                                    <h4>Thêm mới đề kiểm tra</h4>
                                </div>
                                <div class="body width_100">
                                    <form onsubmit="return false" action="" method="post" enctype="multipart/form-data"
                                        class="form form_themmoi_de">
                                        <div class="container mb_20">
                                            <div class="form_container">
                                                <div class="form_group ">
                                                    <label for="">Hình thức tạo đề<span class="color_red">*</span></label>
                                                    <div class="select_no_muti ">
                                                        <select disabled name="" id="" class="js_select_2 loai_de_ajax  arr_cauhoi">
                                                            <option value="1">Người dùng tự thiết lập</option>
                                                            <option value="2">Hệ thống sinh đề theo điều kiện</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form_group ">
                                                    <label for="">Hình thức đề kiểm tra*</label>
                                                    <div class="select_no_muti ">
                                                        <select disabled name="" id="" class="js_select_2 hinhthuc_de_ajax  arr_cauhoi">
                                                            <option value="1">Trắc nghiệm</option>
                                                            <option value="2">Tự luận</option>
                                                            <option value="3">Trắc nghiệm và tự luận</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                
                                                <div class="form_group ">
                                                    <label for="">Tên đề kiểm tra năng lực nhân viên<span
                                                            class="color_red">*</span></label>
                                                    <input  type="text" class="ten_ajax" name="ten" value="Đề kiểm tra mẫu">
                                                </div>
                                                <div class="form_group form_group_block">
                                                    <label for="">Người tạo</label>
                                                    <input disabled type="text" data-nguoitao="<?echo $_SESSION['ep_id']; ?>" class="nguoi_tao" name="nguoi_tao "
                                                        value="<?=$_SESSION['ep_name'];?>">
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group form_group_block">
                                                    <label for="">Ngày tạo</label>
                                                    <input disabled type="text" data-ngaytao="<?=time()?>" class="ngay_Tao" name="ngay_tao" value="<? $timestamp=time();echo(date("d/m/Y ", $timestamp)); ?>">
                                                </div>
                                                <div class="form_group form_group_block">
                                                    <label for="">Thang điểm <span class="color_red">*</span></label>
                                                    <input disabled type="text" class="thangdiem_ht" name="" 
                                                        value="<?=$thangdiem_hethong?>">
                                                </div>
                                            </div>
                                            <div class="form_group">
                                                <label for="">Ghi chú</label>
                                                <textarea id="editor2" name="ghi_chu" value=''></textarea>
                                            </div>
                                        </div>
                                            <div class="dang_tracnghiem ">
                                                <div class="mb_20 d_flex space_b width_100 align_c color_blue">
                                                    <h4 class="font_ss16 font_wB">Danh sách câu hỏi trắc nghiệm</h4>
                                                    <div class="btn_them_tracnghiem_ajax d_flex align_c cursor_p hieuung">
                                                        <div class="img_themmoi_cauhoi">
                                                            <img src="../img/icon_plus.png" alt="Thêm mới">
                                                        </div>
                                                        <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
                                                    </div>
                                                </div>
                                                <div class="bang_tieuchi_danhgia mb_20">
                                                    <div class="khoibang">
                                                        <div class="bangchung">
                                                            <table class="bangchinh tieu_chi tess">
                                                                <tbody class="op_sp_ajax">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">STT</p>
                                                                    </th>
                                                                    <th style="width: 60%;">
                                                                        <p class="phantucon">Câu hỏi</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Số điểm</p>
                                                                    </th>
                                                                    <th style="width: 15%;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                                
                                                                <tr class="nentrang-chuden  ">
                                                                    <td colspan="2">
                                                                        <p class="text_a_l"><span>Tổng điểm: </span>
                                                                            <span class="tb_td_er color_red"></span>
                                                                        </p>
                                                                    </td>
                                                                    <td class="show_tong_tracnghiem_ajax" colspan="2">0</td>
                                                                    <td class="hidden show_time_tracnghiem_ajax" colspan="2">0</td>
                                                                    
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn_form_de  d_flex content_c mt_25">
                                                    <div class="hieuung quaylai btn btn_168 btn_trang mr_68 bot-20">
                                                        <p class="flex">
                                                            <img class="right-10" src="../img/quaylai.png" alt="">
                                                            Quay lai
                                                        </p>
                                                    </div>
                                                    <button onclick="CKupdate()" type="button" class="quaylai done_hethong btn btn_168 btn_xanh hieuung">
                                                        <div class="d_flex align_c ">
                                                            <p>Đồng ý</p>
                                                        </div>
                                                    </button>
                                                </div>  
                                            </div>
                                            <div class="dang_tuluan">
                                                <div class="mb_20 d_flex space_b width_100 align_c color_blue">
                                                    <h4 class="font_ss16 font_wB">Danh sách câu hỏi tự luận</h4>
                                                    <div class="btn_them_tuluan_ajax d_flex align_c cursor_p hieuung">
                                                        <div class="img_themmoi_cauhoi">
                                                            <img src="../img/icon_plus.png" alt="Thêm mới">
                                                        </div>
                                                        <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
                                                    </div>
                                                </div>
                                                <div class="bang_tieuchi_danhgia mb_20">
                                                    <div class="khoibang">
                                                        <div class="bangchung">
                                                            <table class="bangchinh tieu_chi tess">
                                                                <tbody class="op_sp_ajax">
                                                                <tr>
                                                                    <th>
                                                                        <p class="phantucon">STT</p>
                                                                    </th>
                                                                    <th style="width: 60%;">
                                                                        <p class="phantucon">Câu hỏi</p>
                                                                    </th>
                                                                    <th>
                                                                        <p class="phantucon">Số điểm</p>
                                                                    </th>
                                                                    <th style="width: 15%;">
                                                                        <p class="phantucon">Chức năng</p>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                                
                                                                <tr class="nentrang-chuden  ">
                                                                    <td colspan="2">
                                                                        <p class="text_a_l"><span>Tổng điểm: </span>
                                                                            <span class="tb_td_er color_red"></span>
                                                                        </p>
                                                                    </td>
                                                                    <td class="show_tong_tracnghiem_ajax" colspan="2">0</td>
                                                                    <td class="hidden show_time_tracnghiem_ajax" colspan="2">0</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="btn_form_de  d_flex content_c mt_25">
                                                <div class="hieuung quaylai btn btn_168 btn_trang mr_68 bot-20">
                                                    <p class="flex">
                                                        <img class="right-10" src="../img/quaylai.png" alt="">
                                                        Quay lai
                                                    </p>
                                                </div>
                                                <button onclick="CKupdate()" type="button" class="quaylai done_hethong btn btn_168 btn_xanh hieuung">
                                                    <div class="d_flex align_c ">
                                                        <p>Đồng ý</p>
                                                    </div>
                                                </button>
                                            </div>
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
    
<div class="popup popup_500 popup_thanhcong">
    <div class="container">
        <div class="popup_body">
            <div class="img">
                <img src="../img/popup_1.png" alt="thành công ">
            </div>
            <p class="text_a_c ">Thêm đề kiểm tra <span class="font_wB show_xoa_ten"></span> thành
                công!</p>
            <div onclick="window.location.href='/de-kiem-tra.html'" class="popup_btn">
                <div class="btn btn_xanh close_popup ">
                    Đóng
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popup_500 popup_thatbai_thongbao">
    <div class="container">
        <div class="popup_body">
            <div class="img">
                <img src="../img/popup_2.png" alt="thành công ">
            </div>
            <p class="text_a_c popup_thatbai_thongbao_text"> </p>
            <div class="popup_btn">
                <div  class="btn btn_xanh close_popup ">
                    Đóng
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popuptrawsc nghiệm -->
<div class="p_man popup popup_680 popup_them_tracnghiem ">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách câu hỏi trắc nghiệm</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="thanh_search width_100 ">
                    <div class="select_no_muti ql_tieuchi_m">
                        <select name="" id="" class="search_item js_select_2 search_value filter_tracnghiem">
                            <option value="">Tìm kiếm theo tên câu hỏi</option>
                            <?php foreach ($tracnghiem as  $value): ?>
                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                <option value="<?=$value['id'];?>"><?=$value['cauhoi']?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="see_search"></span>
                    </div>
                </div>
                <form action="" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tr>
                                            <th >
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Câu hỏi</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Số điểm</p>
                                            </th >
                                            <th><input class="js_check_tracnghiem_tong" type="checkbox"></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <?php $stt=0; foreach ($tracnghiem as $value):$stt++; ?>
                                        <tr class="row_tracnghiem_pop_<?=$value['id']?> row_tracnghiem_chung">
                                            <td style="width: 60px">
                                                <p><?=$stt?></p>
                                            </td>

                                            <td>
                                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                                <p class="elipsis1"><?=$value['cauhoi']?></p>
                                            </td>
                                            <td style="width: 124px;">
                                                <p><?=$value['sodiem']?></p>
                                            </td>
                                            <td style="width: 52px;">
                                                <input type="checkbox" class="js_checked js_check_tracnghiem_con id_tracnghiem_<?=$value['id']?>" value="<?=$value['id'];?>">
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn m_edit">
                        <button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 submit_add_tc " name="">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popuptrawsc nghiệm -->

<!-- popuptrawsc nghiệm he thong sinh de -->
<div class="p_man popup popup_680 popup_them_tracnghiem_ajax ">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách câu hỏi trắc nghiệm</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="thanh_search width_100 ">
                    <div class="select_no_muti ql_tieuchi_m">
                        <select name="" id="" class="search_item js_select_2 search_value filter_loai">
                            <option value="">Tìm kiếm theo loại câu hỏi</option>
                            <?
                            $query= new db_query("SELECT * FROM loaicauhoi where  trangthai_xoa=1 and id_congty='".$usc_id."' ORDER BY id DESC ");
                            $row = $query->result_array();
                            ?>
                            <?php foreach ($row as  $va): ?>
                                <option value="<?=$va['id'];?>"><?=$va['ten_loai']?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="see_search"></span>
                    </div>
                </div>
                <form action="" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tr>
                                            <th >
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Câu hỏi</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Số điểm</p>
                                            </th >
                                            <th><p class="phantucon">Chọn</p></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <?php $stt=0; foreach ($tracnghiem as $value):$stt++; ?>
                                        <tr class="row_loai_pop_<?=$value['loai']?> row_loai_chung">
                                            <td style="width: 60px">
                                                <p><?=$stt?></p>
                                            </td>

                                            <td>
                                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                                <p class="elipsis1"><?=$value['cauhoi']?></p>
                                            </td>
                                            <td style="width: 124px;">
                                                <p><?=$value['sodiem']?></p>
                                            </td>
                                            <td style="width: 52px;">
                                                <input type="checkbox" class=" js_check_tracnghiem_con id_tracnghiem_<?=$value['id']?>" value="<?=$value['id'];?>">
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn m_edit">
                        <button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 submit_add_tc_ajax " name="">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popuptrawsc nghiệm -->

<!-- popup tuwj luaanj -->
<div class="p_man popup popup_680 popup_them_tuluan ">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách câu hỏi tự luận</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="thanh_search width_100 ">
                    <div class="select_no_muti ql_tieuchi_m">
                        <select name="" id="" class="search_item js_select_2 search_value filter_tracnghiem">
                            <option value="">Tìm kiếm theo tên câu hỏi</option>
                            <?php foreach ($tuluan as  $value): ?>
                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                <option value="<?=$value['id'];?>"><?=$value['cauhoi']?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="see_search"></span>
                    </div>
                </div>
                <form action="" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tr>
                                            <th >
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Câu hỏi</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Số điểm</p>
                                            </th >
                                            <th><input class="js_check_tuluan_tong" type="checkbox"></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <?php $stt=0; foreach ($tuluan as $value):$stt++; ?>
                                        <tr class="row_tracnghiem_pop_<?=$value['id']?> row_tracnghiem_chung">
                                            <td style="width: 60px">
                                                <p><?=$stt?></p>
                                            </td>

                                            <td>
                                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                                <p class="elipsis1"><?=$value['cauhoi']?></p>
                                            </td>
                                            <td style="width: 124px;">
                                                <p><?=$value['sodiem']?></p>
                                            </td>
                                            <td style="width: 52px;">
                                                <input type="checkbox" class="js_checked js_check_tuluan_con id_tuluan_<?=$value['id']?>" value="<?=$value['id'];?>">
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn m_edit">
                        <button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 submit_add_tl " name="submit_add_tl">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popuptrawsc nghiệm -->

<!-- popup tuwj luaanj -->
<div class="p_man popup popup_680 popup_them_tuluan_ajax ">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách câu hỏi tự luận</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="thanh_search width_100 ">
                    <div class="select_no_muti ql_tieuchi_m">
                        
                        <select name="" id="" class="search_item js_select_2 search_value filter_loai">
                            <option value="">Tìm kiếm theo loại câu hỏi</option>
                            <?
                            $query= new db_query("SELECT * FROM loaicauhoi where  trangthai_xoa=1 and id_congty='".$usc_id."' ORDER BY id DESC ");
                            $row = $query->result_array();
                            ?>
                            <?php foreach ($row as  $va): ?>
                                <option value="<?=$va['id'];?>"><?=$va['ten_loai']?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="see_search"></span>
                    </div>
                </div>
                <form action="" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tr>
                                            <th >
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Câu hỏi</p>
                                            </th>
                                            <th >
                                                <p class="phantucon">Số điểm</p>
                                            </th >
                                            <th><th><p class="phantucon">Chọn</p></th></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <?php $stt=0; foreach ($tuluan as $value):$stt++; ?>
                                        <tr class="row_loai_pop_<?=$value['loai']?> row_loai_chung">
                                            <td style="width: 60px">
                                                <p><?=$stt?></p>
                                            </td>

                                            <td>
                                                <?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                                                <p class="elipsis1"><?=$value['cauhoi']?></p>
                                            </td>
                                            <td style="width: 124px;">
                                                <p><?=$value['sodiem']?></p>
                                            </td>
                                            <td style="width: 52px;">
                                                <input type="checkbox" class=" js_check_tuluan_con id_tuluan_<?=$value['id']?>" value="<?=$value['id'];?>">
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn m_edit">
                        <button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 submit_add_tl_ajax " name="">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popuptrawsc nghiệm -->




</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</html>

<script>

    function show_chitiet_tn(th){
        $('.xemchitiet_dephuhop .dang_tracnghiem').show();
        var id =$(th).attr('data-id');
        // var name =$(th).parents('.show_chung_hethong').find('.name_mau').val();
        // var ghichu =$(th).parents('.show_chung_hethong').find('.ghichu_mau').val();
        $('.dang_tracnghiem .done_hethong').attr('id-input',id);
        // $('.ten_ajax').val(name).trigger('change');
        // CKEDITOR.instances['editor2'].setData(ghichu);
        $('.popup_them_tracnghiem_ajax .js_check_tracnghiem_con').prop('checked',false);
        var list_id_ch=$(th).parents('.show_chung_hethong').find('.demau_sochung').val();
        list_id_ch=list_id_ch.split(',');
        for (var i = 0; i < list_id_ch.length; i++){
            $('.popup_them_tracnghiem_ajax .id_tracnghiem_'+list_id_ch[i]+'').prop('checked',true);
        }
        $('.submit_add_tc_ajax ').click();
        $('.dang_tracnghiem .done_hethong').click(function(){
            var t=$(this).attr('id-input');
            var nameaj=$('.ten_ajax').val();
            var ghichuaj=CKEDITOR.instances['editor2'].getData() ;
            var td=Number($('.dang_tracnghiem .show_tong_tracnghiem_ajax').text()) ;
            var time=Number($('.dang_tracnghiem .show_time_tracnghiem_ajax').text()) ;
            var str_id="";
            $('.popup_them_tracnghiem_ajax .js_check_tracnghiem_con').each(function(){
                if ($(this).is(":checked")) {
                    str_id+=$(this).val()+","; 
                }
            });
            str_id=str_id.slice(0, -1);
            $('.demau_so'+t+'').val(str_id).trigger('change');
            $('.tongdiemht_so'+t+'').val(td).trigger('change');
            $('.name_mauso'+t+'').val(nameaj).trigger('change');
            $('.ghichu_mauso'+t+'').val(ghichuaj).trigger('change');
            $('.tongtime_after_so'+t+'').text(time+' Phút');
            $('.radio_tracnghiem_ht'+t+'').prop('checked',true);
        })
        $('.main_body').hide();
        $('.xemchitiet_dephuhop').show();
        $('.xemchitiet_dephuhop .dang_tuluan').hide();
    }
    $('.quaylai').click(function(){
        $('.main_body').show();
        $('.xemchitiet_dephuhop').hide();
    })
    function show_chitiet_tl(th){
        $('.xemchitiet_dephuhop .dang_tuluan').show();
        var id =$(th).attr('data-id');
        // var name =$(th).parents('.show_chung_hethong_tl').find('.name_mau_tl').val();
        // var ghichu =$(th).parents('.show_chung_hethong_tl').find('.ghichu_mau_tl').val();
        // $('.ten_ajax').val(name).trigger('change');
        // CKEDITOR.instances['editor2'].setData(ghichu);
        $('.dang_tuluan .done_hethong').attr('id-input',id);
        $('.popup_them_tuluan_ajax .js_check_tuluan_con').prop('checked',false);
        var list_id_ch=$(th).parents('.show_chung_hethong_tl').find('.demau_sochung_tl').val();
        list_id_ch=list_id_ch.split(',');
        for (var i = 0; i < list_id_ch.length; i++){
            $('.popup_them_tuluan_ajax .id_tuluan_'+list_id_ch[i]+'').prop('checked',true);
        }
        $('.submit_add_tl_ajax ').click();
        $('.dang_tuluan .done_hethong').click(function(){
            var t=$(this).attr('id-input');
            var nameaj=$('.ten_ajax').val();
            var ghichuaj=CKEDITOR.instances['editor2'].getData() ;
            var td=Number($('.dang_tuluan .show_tong_tracnghiem_ajax').text()) ;
            var time=Number($('.dang_tuluan .show_time_tracnghiem_ajax').text()) ;
            var str_id="";
            $('.popup_them_tuluan_ajax .js_check_tuluan_con').each(function(){
                if ($(this).is(":checked")) {
                    str_id+=$(this).val()+","; 
                }
            });
            str_id=str_id.slice(0, -1);
            $('.demau_so_tl'+t+'').val(str_id).trigger('change');
            $('.tongdiemht_so_tl'+t+'').val(td).trigger('change');
            $('.tongtime_after_so_tl'+t+'').text(time+' Phút');
            $('.radio_tuluan_ht'+t+'').prop('checked',true);
            $('.name_mauso_tl'+t+'').val(nameaj).trigger('change');
            $('.ghichu_mauso_tl'+t+'').val(ghichuaj).trigger('change');
        })
        $('.main_body').hide();
        $('.xemchitiet_dephuhop').show();
        $('.xemchitiet_dephuhop .dang_tracnghiem').hide();
    }
    $('.quaylai').click(function(){
        $('.main_body').show();
        $('.xemchitiet_dephuhop').hide();
    })
    
$(document).ready(function(){
    $('.hinhthuc_de').trigger('change');
    $('.loai_de').trigger('change');
})  
$('.loai_de').change(function(){
    var val=$(this).val();
    $('.loai_de_ajax ').val(val).trigger('change');
    if (val==1){
    $('.hethong_sinhde').hide();
    $('.nguoidung_sinhde').show();
    } 
    else{
        $('.hethong_sinhde').show();
        $('.nguoidung_sinhde').hide();
    }
})
setInputFilter(document.getElementById("time_thuchien_input"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, " Nhập số");
setInputFilter(document.getElementById("time_thuchien_input_tl"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, " Nhập số");
setInputFilter(document.getElementById("sodiem_ch_input"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, "Nhập số");
setInputFilter(document.getElementById("sodiem_ch_input_tl"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, "Nhập số");
	
$('.select_loai_tracnghiem').change(function(){
	var val=$(this).val().join(',');
	$.ajax({
        url: '/render/hethong_sinhde_loaicauhoi.php',
        type: 'POST',
        data: {
            val:val,
        },
        success: function(data){
            $('.khoi_boder').remove();
            $('.s_loai_chung').append(data);
        }
    });
})
$('.select_loai_tuluan').change(function(){
    var val=$(this).val().join(',');
    $.ajax({
        url: '/render/hethong_sinhde_loaicauhoi_tuluan.php',
        type: 'POST',
        data: {
            val:val,
        },
        success: function(data){
            $('.khoi_boder_tuluan').remove();
            $('.s_loai_chung_tuluan').append(data);
        }
    });
})

$('.dang_tracnghiem .sinhdekiemtra').click(function(){
        var hinhthuc=$('.hinhthuc_de').val();
        var time_tracnghiem=$('#time_thuchien_input').val();
        var count_tracnghiem=$('#sodiem_ch_input').val();
        var s=0;
		$('.number_loai_ch').each(function(){
			s+=Number($(this).val());
		})
		
        if (count_tracnghiem==""||count_tracnghiem==0) {
            alert('Số câu hỏi trắc nghiệm trong đề kiểm tra lớn hơn 0');
            return;
        }
        

        let key = 0;
        var arr_update = [];
        var dem=$('.khoi_boder');
        
        for (let  t = 0; t < dem.length; t++) {
            var soch = dem.eq(t).find('.number_loai_ch ').val();
            if(soch=="") soch=0;
            var id_loai = dem.eq(t).find('.number_loai_ch ').attr('id-loai');

            arr_update[key] = {};
            arr_update[key].so_cauhoi = soch;
            arr_update[key].loai_cauhoi = id_loai;
            key++;
        }

        cacloai=JSON.stringify(arr_update);
        
        if(cacloai!=='[]'&& s!=count_tracnghiem){
            alert('Số lượng loại câu hỏi bằng số câu hỏi');
            $('.number_loai_ch').select();
            $('.num_tb').show();
            return;
        }else  $('.num_tb').hide();

        $.ajax({
            url: '/render/themmoi_tracnghiem_hethong.php',
            type: 'POST',
            data: {
                time_tracnghiem:time_tracnghiem,
                count_tracnghiem:count_tracnghiem,
                cacloai:cacloai,
                hinhthuc:hinhthuc,
            },
            success: function(data){
                location.href='/them-moi-de-kiem-tra.html#show_phuhop_tn';
                $('.show_chung_hethong').remove();
                $('.op_sp_hethong').append(data);
            }
        });
})
$('.dang_tuluan .sinhdekiemtra').click(function(){
        var hinhthuc=$('.hinhthuc_de').val();
        var time_tuluan=$('#time_thuchien_input_tl').val();
        var count_tuluan=$('#sodiem_ch_input_tl').val();

        var s=0;
        $('.number_loai_ch_tuluan').each(function(){
            s+=Number($(this).val());
        })
        if (count_tuluan==""||count_tuluan==0) {
            alert('Số câu hỏi tự luận trong đề kiểm tra lớn hơn 0');
            return;
        }
        
        let key = 0;
        var arr_update = [];
        var dem=$('.khoi_boder_tuluan');
        
        for (let  t = 0; t < dem.length; t++) {
            var soch = dem.eq(t).find('.number_loai_ch_tuluan ').val();
            if(soch=="") soch=0;
            var id_loai = dem.eq(t).find('.number_loai_ch_tuluan ').attr('id-loai');

            arr_update[key] = {};
            arr_update[key].so_cauhoi = soch;
            arr_update[key].loai_cauhoi = id_loai;
            key++;
        }

        cacloai=JSON.stringify(arr_update);
        
        if(cacloai!=='[]'&& s!=count_tuluan){
            alert('Số lượng loại câu hỏi bằng số câu hỏi');
            $('.number_loai_ch_tuluan').select();
            $('.num_tb_tl').show();
            return;
        }else  $('.num_tb_tl').hide();
        $.ajax({
            url: '/render/themmoi_tuluan_hethong.php',
            type: 'POST',
            data: {
                time_tuluan:time_tuluan,
                count_tuluan:count_tuluan,
                hinhthuc:hinhthuc,
                cacloai:cacloai,
            },
            success: function(data){
                location.href='/them-moi-de-kiem-tra.html#show_phuhop_tl'
                $('.show_chung_hethong_tl').remove();
                $('.op_sp_hethong_tl').append(data);
            }
        });
})
$('.js_check_tracnghiem_tong').click(function(){
    if($('.js_check_tracnghiem_tong').prop('checked')) {
        $('.js_check_tracnghiem_con').prop('checked',true);
    } else {
        $('.js_check_tracnghiem_con').prop('checked',false);
    }
});
$('.js_check_tuluan_tong').click(function(){
    if($('.js_check_tuluan_tong').prop('checked')) {
        $('.js_check_tuluan_con').prop('checked',true);
    } else {
        $('.js_check_tuluan_con').prop('checked',false);
    }
});
$('.filter_tracnghiem').change(function(){
    var val=$(this).val();
    $('.row_tracnghiem_chung').hide();
    $('.row_tracnghiem_pop_'+val+'').show();
    if (val=="") $('.row_tracnghiem_chung').show();
})
$('.filter_loai').change(function(){
    var val=$(this).val();
    $('.row_loai_chung').hide();
    $('.row_loai_pop_'+val+'').show();
    if (val=="") $('.row_loai_chung').show();
})
active_single_menu('kt_tong');
active_single_menu_con('de_kt_menu');


$('.js_select_2').select2({
    width: '100%'
});
$('.chon_loaicauhoi').select2({
    width: '100%',
    placeholder:'Chọn loại câu hỏi',
});
$('.select_loai_tuluan').select2({
    placeholder:'Chọn loại câu hỏi',
});
$('.select_loai_tracnghiem').select2({
    placeholder:'Chọn loại câu hỏi',
});

var i=0;
CKEDITOR.replace('editor1', {
    height: '108'
});
CKEDITOR.replace('editor2', {
    height: '108'
});
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;

$('.submit_add_tc').on("click",function () {
    $('.chungchung').remove();
    var str_id="";
    $('.popup_them_tracnghiem .js_check_tracnghiem_con').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+","; 
        }
    });
    if (str_id=="") {
        alert('Bạn chưa chọn câu hỏi nào');
        return;
    }
    $('.popup_them_tieuchi').hide();
        $.ajax({
            url: '/render/themmoi_tracnghiem.php',
            type: 'POST',
            data: {
                str_id:str_id,
            },
            success: function(data){
                $('.dang_tracnghiem .op_sp').append(data);
                $('.popup_them_tracnghiem ').hide();
            }
        }); 
});

$('.submit_add_tc_ajax').on("click",function () {
    $('.chungchung_ajax').remove();
    var str_id="";
    $('.popup_them_tracnghiem_ajax .js_check_tracnghiem_con').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+","; 
        }
    });
    if (str_id=="") {
        alert('Bạn chưa chọn câu hỏi nào');
        return;
    }
    $('.popup_them_tieuchi').hide();
        $.ajax({
            url: '/render/themmoi_tracnghiem_ajax.php',
            type: 'POST',
            data: {
                str_id:str_id,
            },
            success: function(data){
                $('.dang_tracnghiem .op_sp_ajax').append(data);
                $('.popup_them_tracnghiem_ajax ').hide();
            }
        }); 
});

$('.submit_add_tl').on("click",function () {
    $('.chungchungtl').remove();
    var str_id="";
    $('.popup_them_tuluan .js_check_tuluan_con').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+","; 
        }
    });
    if (str_id=="") {
        alert('Bạn chưa chọn câu hỏi nào');
        return;
    }
    $('.popup_them_tieuchi').hide();
          $.ajax({
            url: '/render/themmoi_tuluan.php',
            type: 'POST',
            data: {
                str_id:str_id,
            },
            success: function(data){
                $('.dang_tuluan .op_sp').append(data);
                $('.popup_them_tuluan ').hide();
            }
        }); 
});
$('.submit_add_tl_ajax').on("click",function () {
    $('.chungchungtl_ajax').remove();
    var str_id="";
    $('.popup_them_tuluan_ajax .js_check_tuluan_con').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+","; 
        }
    });
    if (str_id=="") {
        alert('Bạn chưa chọn câu hỏi nào');
        return;
    }
    $('.popup_them_tieuchi').hide();
          $.ajax({
            url: '/render/themmoi_tuluan_ajax.php',
            type: 'POST',
            data: {
                str_id:str_id,
            },
            success: function(data){
                $('.dang_tuluan .op_sp_ajax').append(data);
                $('.popup_them_tuluan_ajax ').hide();
            }
        }); 
});

$('.btn_xoa_loai').click(function(){
    $(this).parents('.container_form_4').remove();
 })

$('.hinhthuc_de').change(function(){
    var val=$(this).val();
    var val_loai=$('.loai_de').val();
    $('.hinhthuc_de_ajax').val(val).trigger('change');
    if (val==1) {
        $('.dang_tracnghiem').show();
        $('.dang_tuluan').hide();
    }
    if (val==2) {
        $('.dang_tracnghiem').hide();
        $('.dang_tuluan').show();
    }
    if (val==3) {
        
            $('.dang_tracnghiem').show();
            $('.dang_tuluan').show();
        
        
    }
            
})
//Hiện popup danh sách câu hỏi
$('.btn_them_tracnghiem').click(function(){
    $('.popup_them_tracnghiem').show();
})
$('.btn_them_tracnghiem_ajax').click(function(){
    $('.popup_them_tracnghiem_ajax').show();
})

$('.btn_them_tuluan').click(function(){
    $('.popup_them_tuluan').show();
})
$('.btn_them_tuluan_ajax').click(function(){
    $('.popup_them_tuluan_ajax').show();
})

$('.themmoi_loai').click(function() {
    var k=Number($(this).attr('data-num')) ;
    var camco=Number($(this).attr('data-camco'));
    if (camco==1) {
       $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
    $(this).parents('.body.width_100').find('.container_form_4_tong').append('<div class="container_form_4  d_flex "><div class="form_group "><label for="">Từ <span class="color_red">*</span></label><input data-diemtu="'+(k)+'" onmouseout="diemnhieuhon(this)" type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Đến<span class="color_red">*</span></label><input type="text" class="arr_tt_sp den mc_den'+(k+1)+'" name="den_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Loại<span class="color_red">*</span></label><div class="select_no_muti "><select class="js_select_2 arr_tt_sp" name="loai_danhgia"><option value="">chọn loại</option><option value="1">Yếu</option><option value="2">Trung bình</option><option value="3">Khá</option><option value="4">Giỏi</option><option value="5">Xuất sắc</option></select></div></div><div class="form_group form_btn d_flex content_c"><button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button></div></div>');
     $('.js_select_2').select2({
            width: '100%'
     });
    
     $('.btn_xoa_loai').click(function(){
        $(this).parents('.container_form_4').remove();
     });
     
     $(this).attr('data-num',k+1);
})

function diemnhieuhon(th){
    var i=$(th).attr('data-diemtu');
    var diem=$(th).val();
    var diem_den_truoc=$(th).parents('.container_form_4_tong').find('.mc_den'+i+'').val();
    console.log(diem);
    console.log(diem_den_truoc);
  

   if (Number(diem) <= Number(diem_den_truoc)) {
    console.log('nhohon');
     $('.btn_tieptuc_1').attr('data-camco',1);
     $('.themmoi_loai').attr('data-camco',1);
   }
   else{
    console.log('lonhon dc ');
     $('.btn_tieptuc_1').attr('data-camco',0);
     $('.themmoi_loai').attr('data-camco',0);
   }

}
function CKupdate(){
for ( instance in CKEDITOR.instances )
CKEDITOR.instances[instance].updateElement();
};

function del_row_tracnghiem(th){
    $('.js_check_tracnghiem_tong').prop('checked',false);
    $(th).parents('.row_table').remove();
    var id=$(th).attr('data-id-ch');
    $('.id_tracnghiem_'+id+'').prop('checked',false);
    var diem=Number($(th).parents('.row_table').find('.tongcon').text());
    var tong_diem=Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
    $('.dang_tracnghiem .show_tong_tracnghiem').text(tong_diem-diem);

}
function del_row_tracnghiem_ajax(th){
    $('.js_check_tracnghiem_tong').prop('checked',false);
    $(th).parents('.row_table').remove();
    var id=$(th).attr('data-id-ch');
    $('.id_tracnghiem_'+id+'').prop('checked',false);
    var diem=Number($(th).parents('.row_table').find('.tongconajax').text());
    var tong_diem=Number($('.dang_tracnghiem .show_tong_tracnghiem_ajax').text());

    var time=Number($(th).parents('.row_table').find('.time_tong_con').text());
    var tong_time=Number($('.dang_tracnghiem .show_time_tracnghiem_ajax').text());
    $('.dang_tracnghiem .show_time_tracnghiem_ajax').text(tong_time-time);
    $('.dang_tracnghiem .show_tong_tracnghiem_ajax').text(tong_diem-diem);

}
function del_row_tuluan(th){
    $('.js_check_tuluan_tong').prop('checked',false);
    $(th).parents('.row_table').remove();
    var id=$(th).attr('data-id-ch');
    $('.id_tuluan_'+id+'').prop('checked',false);
    var diem=Number($(th).parents('.row_table').find('.tongcontl').text());
    var tong_diem=Number($('.dang_tuluan .show_tong_tracnghiem').text());
    $('.dang_tuluan .show_tong_tracnghiem').text(tong_diem-diem);

}
function del_row_tuluan_ajax(th){
    $('.js_check_tuluan_tong').prop('checked',false);
    $(th).parents('.row_table').remove();
    var id=$(th).attr('data-id-ch');
    $('.id_tuluan_'+id+'').prop('checked',false);
    var diem=Number($(th).parents('.row_table').find('.tongcontlajax').text());
    var tong_diem=Number($('.dang_tuluan .show_tong_tracnghiem_ajax').text());

    var time=Number($(th).parents('.row_table').find('.time_tong_contl').text());
    var tong_time=Number($('.dang_tuluan .show_time_tracnghiem_ajax').text());

    $('.dang_tuluan .show_tong_tracnghiem_ajax').text(tong_diem-diem);
    $('.dang_tuluan .show_time_tracnghiem_ajax').text(tong_time-time);

}
$('.btn_tieptuc_1').click(function(){
     var tdht =$('.thangdiem_ht').val();
     var pl_macdinh = JSON.stringify(<?=$phanloai_hethong?>);
     var type_taode=$('.loai_de').val();
     var type_dekiemtra=$('.hinhthuc_de').val();
     var ten=$('.ten').val();
     var ghi_chu= CKEDITOR.instances['editor1'].getData() ;
     var checkedradio = $('[name=drone]:radio:checked').val();
     var tongdiem=0;
     var tongdiem1=0;
     var tongdiem2=0;
    var str_id="";
    if (type_dekiemtra==1) {
        $('.popup_them_tracnghiem .js_check_tracnghiem_con').each(function(){
            if ($(this).is(":checked")) {
                str_id+=$(this).val()+","; 
            }
        });
    }
    if (type_dekiemtra==2) {
        $('.popup_them_tuluan .js_check_tuluan_con').each(function(){
            if ($(this).is(":checked")) {
                str_id+=$(this).val()+","; 
            }
        });
    }
    if (type_dekiemtra==3) {
        $('.js_checked').each(function(){
            if ($(this).is(":checked")) {
                str_id+=$(this).val()+","; 
            }
        });
    }
    if (type_taode==1) {
        if (type_dekiemtra==1)  tongdiem=Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
        if (type_dekiemtra==2)  tongdiem=Number($('.dang_tuluan .show_tong_tracnghiem').text());
        if (type_dekiemtra==3)  tongdiem=Number($('.dang_tuluan .show_tong_tracnghiem').text())+Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
    }
    if (type_taode==2) {
        if (type_dekiemtra==1){
            $('.radio_de_hethong_sinh_tracnghiem').each(function(){
                if ($(this).is(":checked")) {
                    str_id=$(this).parents('.show_chung_hethong').find('.demau_sochung').val();
                    tongdiem=$(this).parents('.show_chung_hethong').find('.tongdiemht_sochung').val();
                    ten=$(this).parents('.show_chung_hethong').find('.name_mau').val();
                    ghi_chu=$(this).parents('.show_chung_hethong').find('.ghichu_mau').val();
                }
            })
        }
        if (type_dekiemtra==2){
            $('.radio_de_hethong_sinh_tuluan').each(function(){
                if ($(this).is(":checked")) {
                    str_id=$(this).parents('.show_chung_hethong_tl').find('.demau_sochung_tl').val();
                    tongdiem=$(this).parents('.show_chung_hethong_tl').find('.tongdiemht_sochung_tl').val();
                    ten=$(this).parents('.show_chung_hethong_tl').find('.name_mau_tl').val();
                    ghi_chu=$(this).parents('.show_chung_hethong_tl').find('.ghichu_mau_tl').val();
                }
            })
        }
        if (type_dekiemtra==3){
            var str_id1='';
            var str_id2='';
            $('.radio_de_hethong_sinh_tuluan').each(function(){
                if ($(this).is(":checked")) {
                    str_id1=$(this).parents('.show_chung_hethong_tl').find('.demau_sochung_tl').val();
                    tongdiem1=Number($(this).parents('.show_chung_hethong_tl').find('.tongdiemht_sochung_tl').val()) ;
                    ten=$(this).parents('.show_chung_hethong_tl').find('.name_mau_tl').val();
                    ghi_chu=$(this).parents('.show_chung_hethong_tl').find('.ghichu_mau_tl').val();
                }
            })

            $('.radio_de_hethong_sinh_tracnghiem').each(function(){
                if ($(this).is(":checked")) {
                    str_id2=$(this).parents('.show_chung_hethong').find('.demau_sochung').val();
                    tongdiem2=Number($(this).parents('.show_chung_hethong').find('.tongdiemht_sochung').val()) ;
                    ten=$(this).parents('.show_chung_hethong').find('.name_mau').val();
                    ghi_chu=$(this).parents('.show_chung_hethong').find('.ghichu_mau').val();
                }
            })
            

            tongdiem=Number(tongdiem1+tongdiem2);
            if (str_id1!=""&&str_id2!="")str_id=str_id1+','+str_id2;
            if (str_id1=="")str_id=str_id2;
            if (str_id2=="")str_id=str_id1;
            if (str_id1==""&&str_id2=="")str_id='';
            
        }
        console.log(tongdiem);
        console.log(str_id);
    }
    
    var arr_tt_sp = new Array();
    var i = 1;
    var input = new Array();

    var coco=1;
    $('.arr_tt_sp').each(function(){//Phân loại
        var spp=$(this).val();
        if ($.isNumeric(spp)==false) {
            coco=3;
        }
        
        if( i%3 == 1){
            input = [];
        }
        input.push($(this).val());
        if ( i%3 == 0) {
            arr_tt_sp.push(input);
        }
        i++;
    }); 
    var cococo=1;
    $('.arr_tt_sp').each(function(){
        if (Number($(this).val()) > tdht) {
            cococo=2;
        }
        
    });
    var error=0;
    $('.den').each(function(){
        var gtr_den=$(this).val();
        var gtr_tu=$(this).parents('.container_form_4').find('.tu').val();
        if (Number(gtr_tu)>Number(gtr_den)) {
            error=1;
        }
    });
    if(coco==3 && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Vui lòng chọn số điểm (là số) và phân loại');
        return;
    }
    if(cococo==2 && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Vui lòng chọn số điểm nhỏ hơn '+tdht+'');
        return;
    }
    var phan_loai = JSON.stringify(arr_tt_sp);
    
    if(phan_loai ==="[]" && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 phân loại đánh giá');
        return;
    }
    if (error==1) {
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm sau phải lớn hơn số điểm trước');
        return;
    }
    var camco=Number($(this).attr('data-camco'));
    if (camco==1 && checkedradio==2) {
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
    if(ten=="" && type_taode==1){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Nhập tên đề kiểm tra');
        return;
    }
    if(str_id==""&& type_taode==1){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Chưa chọn câu hỏi');
        return;
    }
    if(str_id==""&& type_taode==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Chưa chọn đề kiểm tra nào ');
        return;
    }
    if(tongdiem!=tdht){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Tổng điểm câu hỏi phải bằng '+tdht+'');
        return;
    }
    var data_send = new FormData();

        data_send.append('ten', ten);
        data_send.append('ghi_chu', ghi_chu);
        data_send.append('type_taode', type_taode);
        data_send.append('type_dekiemtra', type_dekiemtra);
        data_send.append('tdht', tdht);
        data_send.append('str_id', str_id);
        data_send.append('phan_loai', phan_loai);
        data_send.append('pl_macdinh', pl_macdinh);
        data_send.append('checkedradio', checkedradio);

        $.ajax({
          type: "POST",
          url: "/ajax/add_de_kiemtra.php",
          data: data_send,
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          enctype: 'multipart/form-data',
          success: function(response) {
              if (response.status == true) {
                  $('.popup_thanhcong').show();
              }
              if (response.status == false) {
                $('.popup_thatbai_thongbao_text').text('Tên đề kiểm tra đã tồn tại.Vui lòng nhập tên khác');
                $('.popup_thatbai_thongbao').show();
              }
          }
        });
})
</script> 