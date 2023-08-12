<?
include('config.php');
if (!in_array(2, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Thêm mới câu hỏi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
        input[type="radio"] { 
 outline: none;
 cursor: pointer;
  }
  .select_no_muti_2 .select2-container--default .select2-selection--single {
    width: 100%;
    border: none;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
    }
  .select2-search--dropdown {
    display: none;
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
                                <div class="d_flex"> <a href='/quan_ly_de_kiem_tra_nang_luc.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p>Quản lý câu hỏi<span> / </span><span> Thêm mới</span></p>
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
                                        <p>Quản lý câu hỏi<span> / </span><span> Thêm mới</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="header_d width_100">
                                    <h4>Thêm mới câu hỏi</h4>
                                </div>

                                <div class="body width_100">
                                    <form id=""  action="" method="post" enctype="multipart/form-data"
                                        class="form form_themmoi_de">
                                        <div class="container mb_20">
                                            <div class="form_container">
                                                <div class="form_group">
                                                    <div class=" ">
                                                        <label for="">Hình thức câu hỏi<span class="color_red">*</span></label>
                                                        <div class="select_no_muti hidden">
                                                            <select name="" id="" class="js_select_2 loaicauhoi hidden arr_cauhoi">
                                                                <option value="1">Câu trả lời</option>
                                                                <option value="2">Trắc nghiệm</option>
                                                                <option value="3">Hộp kiểm</option>
                                                            </select>
                                                        </div>
                                                                    
                                                        <div onclick="chonloai_cauhoi(this)" class="btn_loaihoi position_r ">
                                                            <div class="width_100 d_flex space_b align_c">
                                                                <div class="sel_dang_1" id="sel_dang_1">
                                                                    <div class="d_flex align_c">
                                                                        <div class="img mr_10">
                                                                            <img src="../img/hoi_1.png"
                                                                                alt="Câu trả lời">
                                                                        </div>
                                                                        <p>câu trả lời </p>
                                                                    </div>
                                                                </div>
                                                               <div class="sel_dang_2 display_none"
                                                                    id="sel_dang_2">
                                                                    <div class="d_flex align_c">
                                                                        <div class="img mr_10">
                                                                            <img src="../img/hoi_2.png"
                                                                                alt="Trắc nghiệm">
                                                                        </div>
                                                                        <p>Trắc nghiệm</p>
                                                                    </div>
                                                                </div>
                                                                <div class="sel_dang_3 display_none"
                                                                    id="sel_dang_3">
                                                                    <div class="d_flex align_c">
                                                                        <div class="img mr_10">
                                                                            <img src="../img/hoi_3.png"
                                                                                alt="Trắc nghiệm">
                                                                        </div>
                                                                        <p>Hộp kiểm</p>
                                                                    </div>
                                                                </div>
                                                                <div class="img">
                                                                    <img src="../img/icon_so.png" alt="Chọn">
                                                                </div>
                                                            </div>

                                                            <div class="modal_d modal_ql_tieuchi sub_loaihoi position_a">
                                                                <div class="tm">
                                                                    <div class="item chon_dang_1" id="">
                                                                        <div class="d_flex">
                                                                            <div class="img mr_10">
                                                                                <img src="../img/hoi_1.png"
                                                                                    alt="Tất cả trạng thái">
                                                                            </div>
                                                                            <p>Câu trả lời</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item chon_dang_2" id="">
                                                                        <div class="d_flex">
                                                                            <div class="img mr_10">
                                                                                <img src="../img/hoi_2.png"
                                                                                    alt="Trắc nghiệm">
                                                                            </div>
                                                                            <p>Trắc nghiệm</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item chon_dang_3" id="">
                                                                        <div class="d_flex">
                                                                            <div class="img mr_10">
                                                                                <img src="../img/hoi_3.png"
                                                                                    alt="Trắc nghiệm">
                                                                            </div>
                                                                            <p>Hộp kiểm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form_group ">
                                                    <label for="">Loại câu hỏi</label>
                                                    <div class="select_no_muti ">
                                                        <?
                                                        $query= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id_congty='".$usc_id."' ".$sql." ORDER BY id DESC ");
                                                        $row = $query->result_array();
                                                        ?>
                                                        <select class="js_select_2 loai_ch" name="chon_loaicauhoi" id="">
                                                            <option value="">Tất cả loại câu hỏi</option>
                                                            <?php foreach ($row as $key => $value): ?>
                                                                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group ">
                                                    <label for="">Số điểm</label>
                                                    <input type="text" class="sodiem_ch" name="sodiem_ch_input" value="" placeholder="Nhập số điểm" id="sodiem_ch_input">
                                                </div>
                                                <div class="form_group po_ra">
                                                    <label for="">Thời gian thực hiện <span class="color_red">*</span></label>
                                                    <input type="text" class="time_thuchien " name="time_thuchien_input" 
                                                        value="" placeholder="Nhập thời gian" id="time_thuchien_input"> 
                                                    <span class="po_ab chuden size-14 text_phut">Phút</span>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="container_form_3 d_flex space_b ">
                                                    <div style="width: 100%;" class="form_group ">
                                                        <div class="flex space_b">
                                                            <label for="">Câu hỏi <span class="color_red">*</span></label>
                                                            <div style="width: 200px;" class="flex j_end c-pointer add_image">
                                                                <img src="../img/add_img_ch.png" alt="">
                                                                <span class="chuxanh size-14 left-5">Thêm ảnh</span>    
                                                            </div>
                                                        </div>
                                                        <input onchange="preview_image();" type="file" multiple id="gallery-photo-add">
                                                        <div class="text_dat ">
                                                            <textarea cols="80" rows="10"  id="cauhoi_editor1" class="h_ch cau_hoi arr_cauhoi arr_cauhoi_dapan text_cauhoi" name="cauhoi_editor1" ></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="div_preview_image">
                                                    
                                                </div>
                                                

                                                <div class="form_group sel_dang_1_dapan dangchung_dapan pdbot-20">
                                                    <label for="">Đáp án <span class="color_red">*</span></label>
                                                    <div class="text_dat">
                                                        <textarea id="dapan_editor1" class="arr_cauhoi dap_an arr_cauhoi_dapan text_dapan" name="dapan_editor1" cols="80" rows="10"></textarea>
                                                        
                                                    </div>
                                                </div>
                                                <!--end dạng mặc định -->

                                                <!-- dạng trắc nghiệm-->
                                                <div class="form_group display_none sel_dang_2_dapan dangchung_dapan">
                                                    <label for="">Đáp án</label>
                                                    <div class="m_boder_tracnghiem">
                                                        <div class="tuychon mt_5 tochung">
                                                            <div class="container_tuychon container_tuychon1">
                                                                <div
                                                                    class="tuychon_header width_100 d_flex space_b align_c">
                                                                    <div class="al_center tuychon_input d_flex width_70  mr_20">
                                                                        <input type="radio" name="answer_tracnghiem" value="Tùy chọn" 
                                                                            class="mr_10 answer_right">
                                                                        <input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng " name="" class="ten_tuychon">
                                                                    </div>
                                                                    <div class="them_anh width_30 flex space_b a_end">
                                                                        <p onclick="del_dapan_tracnghiem(this)" class="color_red size-14 c-pointer top-20">Xoá</p>
                                                                        <div onclick="btn_them_anh_tracnghiem(this)" class="btn_them_anh  item d_flex mr_20">
                                                                            <div class="img mr_5">
                                                                                <img  class="btn_them_anhtuychon" src="../img/hoi_7.png" alt="Tải ảnh">
                                                                            </div>
                                                                            <p>Thêm ảnh</p>
                                                                        </div>
                                                                        <input onchange="previewFile(this);" type="file" class="add_tracnghiemanh">
                                                                    </div>
                                                                </div>
                                                                <div class="img_xt_tong mb_20 ">
                                                                    <img class="img_xt" src="#" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class="btn_them_tuychon hieuung d_flex align_c cursor_p " >
                                                        <div class="img mr_10">
                                                            <img src="../img/plus_xanh.png" alt="Thêm tùy chọn">
                                                        </div>
                                                        <p class="color_blue font_s14">Thêm tùy chọn</p>
                                                    </div>
                                                </div>
                                                <!--end dạng trắc nghiệm -->

                                                <!-- dạng mặc hộp điểm-->
                                                <div class="form_group display_none sel_dang_3_dapan dangchung_dapan">
                                                    <label for="">Đáp án</label>
                                                    <div class="m_boder_hopkiem">
                                                        <div class="tuychon mt_5 tochung_hopkiem">
                                                            <div class="container_tuychon container_tuychon1">
                                                                <div
                                                                    class="tuychon_header width_100 d_flex space_b align_c">
                                                                    <div class="al_center tuychon_input d_flex width_70  mr_20">
                                                                        <input type="checkbox" name=an_hopkiem[] value="Tùy chọn" 
                                                                            class="mr_10 answer_hopkiem">
                                                                        <input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng " name="" class="ten_tuychon_hopkiem">
                                                                    </div>
                                                                    <div class="them_anh width_30 flex space_b a_end">
                                                                        <p onclick="del_dapan_tracnghiem(this)" class="color_red size-14 c-pointer top-20">Xoá</p>
                                                                        <div onclick="btn_them_anh_tracnghiem(this)" class="btn_them_anh  item d_flex mr_20">
                                                                            <div class="img mr_5">
                                                                                <img  class="btn_them_anhtuychon" src="../img/hoi_7.png" alt="Tải ảnh">
                                                                            </div>
                                                                            <p>Thêm ảnh</p>
                                                                        </div>
                                                                        <input onchange="previewFile(this);" type="file" class="add_tracnghiemanh">
                                                                    </div>
                                                                </div>
                                                                <div class="img_xt_tong mb_20 ">
                                                                    <img class="img_xt" src="#" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class="btn_them_tuychon_hopkiem hieuung d_flex align_c cursor_p " >
                                                        <div class="img mr_10">
                                                            <img src="../img/plus_xanh.png" alt="Thêm tùy chọn">
                                                        </div>
                                                        <p class="color_blue font_s14">Thêm tùy chọn</p>
                                                    </div>
                                                </div>
                                                <!--end dạng hộp điểm -->
                                            </div>
                                        </div>
                                    </div>
                                    <div  class="btn_form_de  d_flex content_c mt_25">
                                        <div onclick="window.location.href='/danh-sach-cau-hoi.html'" class="btn_huy btn btn_168 btn_trang mr_68">
                                            Hủy
                                        </div>
                                        <button onclick="CKupdate() " type="button" class="btn_tieptuc_1 btn btn_168 btn_xanh add_cauhoi ">
                                            <div class="d_flex align_c ">
                                                <p>Lưu</p>
                                            </div>
                                        </button>
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
                <p class="text_a_c ">Thêm mới câu hỏi <span class="font_wB show_xoa_ten"></span> thành
                    công!</p>
                <div onclick="window.location.reload()" class="popup_btn">
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
                <p  class="text_a_c popup_thatbai_thongbao_text">Thêm mới thất bại </p>
                <div class="popup_btn">
                    <div  class="btn btn_xanh close_popup ">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <span onclick='del_img() ' class='size-14 chudo c-pointer pd_bot5'>Xoá<span> -->

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</html>

<script>
 $('.add_image').click(function(){
    $('#gallery-photo-add').click();
 }) 
 function btn_them_anh_tracnghiem(th) {
    $(th).parents('.tuychon.mt_5').find('.add_tracnghiemanh').click();
 }
 function chonloai_cauhoi(t){
   $(t).find('.sub_loaihoi').toggle()
}
CKEDITOR.replace('cauhoi_editor1', {
    height: '80'
});
CKEDITOR.replace('dapan_editor1', {
    height: '100'
});
function CKupdate(){
for ( instance in CKEDITOR.instances )
CKEDITOR.instances[instance].updateElement();
};

$('.js_select_2').select2({
    width: '100%'
});

CKEDITOR.replace('editor1', {
    height: '108'
});
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;


function del_img_cauhoi(th) {
    $(th).parents('.m_boder_img_cauhoi').remove();
}
function del_dapan_tracnghiem(th) {
    $(th).parents('.tuychon.mt_5').remove();
}
function del_dapan_menu_thaxuong(th) {
    $(th).parents('.tochung_thaxuong').remove();
}
function preview_image() 
{   
 $('.m_boder_img_cauhoi').remove();   
 var total_file=document.getElementById("gallery-photo-add").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('.div_preview_image').append("<div class='m_boder_img_cauhoi flex bot-15'> <div class='wh_img_prv flex'><img class='img_cauhoi' style='width: 100%;' src='"+URL.createObjectURL(event.target.files[i])+"'></div></div>");
 }
}

function previewFile(th){
    var file = $(th).get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $(th).parents('.tuychon.mt_5').find('.img_xt_tong').css('display','flex') ;
            $(th).parents('.tuychon.mt_5').find('.img_xt').attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
$('.btn_them_tuychon').click(function(){
    $(this).parents('.dangchung_dapan').find('.m_boder_tracnghiem').append('<div class="tuychon mt_5 tochung"><div class="container_tuychon container_tuychon1"><div class="tuychon_header width_100 d_flex space_b align_c"><div class="al_center tuychon_input d_flex width_70  mr_20"><input type="radio" name="answer_tracnghiem" value="Tùy chọn" class="mr_10 answer_right"><input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng " name="" class="ten_tuychon"></div><div class="them_anh width_30 flex space_b a_end"><p onclick="del_dapan_tracnghiem(this)" class="color_red size-14 c-pointer top-20">Xoá</p><div onclick="btn_them_anh_tracnghiem(this)" class="btn_them_anh  item d_flex mr_20"><div class="img mr_5"><img  class="btn_them_anhtuychon" src="../img/hoi_7.png" alt="Tải ảnh"></div><p>Thêm ảnh</p></div><input onchange="previewFile(this);" type="file" class="add_tracnghiemanh"></div></div><div class="img_xt_tong mb_20"><img class="img_xt" src="#" alt=""></div></div></div>')
})
$('.btn_them_tuychon_hopkiem').click(function(){
    $(this).parents('.dangchung_dapan').find('.m_boder_hopkiem').append('<div class="tuychon mt_5 tochung_hopkiem"><div class="container_tuychon container_tuychon1"><div class="tuychon_header width_100 d_flex space_b align_c"><div class="al_center tuychon_input d_flex width_70  mr_20"><input type="checkbox" name="an_hopkiem[]"  value="Tùy chọn" class="mr_10 answer_hopkiem"><input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng " name="" class="ten_tuychon_hopkiem"></div><div class="them_anh width_30 flex space_b a_end"><p onclick="del_dapan_tracnghiem(this)" class="color_red size-14 c-pointer top-20">Xoá</p><div onclick="btn_them_anh_tracnghiem(this)" class="btn_them_anh  item d_flex mr_20"><div class="img mr_5"><img  class="btn_them_anhtuychon" src="../img/hoi_7.png" alt="Tải ảnh"></div><p>Thêm ảnh</p></div><input onchange="previewFile(this);" type="file" class="add_tracnghiemanh"></div></div><div class="img_xt_tong mb_20"><img class="img_xt" src="#" alt=""></div></div></div>')
})
function btn_them_tuychon_menu_soxuong(th){
var id_mn = Number($(th).attr('data-id'));
    $('.sel_dang_4_dapan').find('.tuychon').append(
        '<div class="container_tuychon tochung_thaxuong"> <div class = "tuychon_header width_100 d_flex space_b align_c" ><div class = "align_c tuychon_input d_flex width_70  mr_20" ><span class = "mr_10" >' +
        id_mn +
        '.</span> <input type = "radio" value = "" name = "choice_tha" class = "mr_10 tc_thaxuong" ><input type="text" placeholder="Tuỳ chọn " name="" class="ten_tuychon_thaxuong"> </div><p onclick="del_dapan_menu_thaxuong(this)" class="color_red size-14 c-pointer top-20">Xoá</p> </div> </div>'
    );
    $(th).attr('data-id', id_mn + 1);
}

setInputFilter(document.getElementById("time_thuchien_input"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, " Nhập số");
setInputFilter(document.getElementById("sodiem_ch_input"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
}, "Nhập số");

$('.add_cauhoi').click(function(){
    var manh_check=1;
    var hinhthuc=$('.loaicauhoi').val();
    var loai=$('.loai_ch').val();
    var sodiem=$('.sodiem_ch').val();
    var time_thuchien=$('.time_thuchien').val();
    var cauhoi=$('.text_cauhoi').val();
    var file=$('#gallery-photo-add')[0].files;  
    
    if (hinhthuc==1) {
        var dapan2=$('.text_dapan').val();
        dapan = dapan2.replace(/(\r\n|\n|\r)/gm, "");
        dapan = dapan2.replace(/['"]+/g, '');
    }
    if (hinhthuc==5) {
        dapan=$('.dang_gio').val();
    
    }
    if (hinhthuc==6) {
        dapan=$('.dang_ngay').val();
    
    }
    if (hinhthuc==2) {
        let key = 0;
        var arr_update = [];
        var dem=$('.tochung');
        
        for (let  t = 0; t < dem.length; t++) {
            var answer = dem.eq(t).find('.ten_tuychon');
            var answer_input2 = dem.eq(t).find('.answer_right');
            if (dem.eq(t).find('.add_tracnghiemanh').val()!="")var answer_image = dem.eq(t).find('.add_tracnghiemanh')[0].files[0].name;
            else answer_image="";
                
            var arr_answer_child  = [];
            var arr_answer_child_image = [];
            var arr_answer_right_child = [];

            
            answer.each(function(index) {
                answer_child = $(this).val();
                if (answer_child=="") manh_check=0;
                arr_answer_child.push(answer_child);
                if (answer_input2.eq(index).is(':checked')) {
                    var right = 1;
                } else {
                    var right = 0;
                }
                arr_answer_right_child.push(right);
                arr_answer_child_image.push(answer_image);

            });
        
            arr_update[key] = {};
            arr_update[key].answer = arr_answer_child;
            arr_update[key].image = arr_answer_child_image;
            arr_update[key].answer_right = arr_answer_right_child;
            key++;
        }

        dapan=JSON.stringify(arr_update);
    }
    if (hinhthuc==3) {
        let key_hk = 0;
        var arr_update = [];
        var dem=$('.tochung_hopkiem');
        
        for (let  t_hk = 0; t_hk < dem.length; t_hk++) {
            var answer = dem.eq(t_hk).find('.ten_tuychon_hopkiem');
            var answer_input2 = dem.eq(t_hk).find('.answer_hopkiem');
            if (dem.eq(t_hk).find('.add_tracnghiemanh').val()!="")var answer_image = dem.eq(t_hk).find('.add_tracnghiemanh')[0].files[0].name;
            else answer_image="";  
            var arr_answer_child  = [];
            var arr_answer_child_image = [];
            var arr_answer_right_child = [];

            
            answer.each(function(index) {
                answer_child = $(this).val();
                if (answer_child=="") manh_check=0;
                arr_answer_child.push(answer_child);
                if (answer_input2.eq(index).is(':checked')) {
                    var right = 1;
                } else {
                    var right = 0;
                }
                arr_answer_right_child.push(right);
                arr_answer_child_image.push(answer_image);

            });
        
            arr_update[key_hk] = {};
            arr_update[key_hk].answer = arr_answer_child;
            arr_update[key_hk].image = arr_answer_child_image;
            arr_update[key_hk].answer_right = arr_answer_right_child;
            key_hk++;
        }

        dapan=JSON.stringify(arr_update);
    }
    if (hinhthuc==4) {
        let key_tx = 0;
        var arr_update = [];
        var dem=$('.tochung_thaxuong');
        
        for (let  t_tx = 0; t_tx < dem.length; t_tx++) {
            var answer = dem.eq(t_tx).find('.ten_tuychon_thaxuong');
            var answer_input2 = dem.eq(t_tx).find('.tc_thaxuong');
            var arr_answer_child  = [];
            var arr_answer_right_child = [];

            
            answer.each(function(index) {
                answer_child = $(this).val();
                if (answer_child=="") manh_check=0;
                arr_answer_child.push(answer_child);
                if (answer_input2.eq(index).is(':checked')) {
                    var right = 1;
                } else {
                    var right = 0;
                }
                arr_answer_right_child.push(right);

            });
        
            arr_update[key_tx] = {};
            arr_update[key_tx].answer = arr_answer_child;
            arr_update[key_tx].answer_right = arr_answer_right_child;
            key_tx++;
        }

        dapan=JSON.stringify(arr_update);
    }
    if (loai==""||sodiem==""||time_thuchien==""||cauhoi=="") {
        $('.popup_thatbai_thongbao_text').text('Nhập đủ thông tin');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    if (hinhthuc==1 && dapan2=="") {
        $('.popup_thatbai_thongbao_text').text('Nhập đáp án tự luận');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    if (hinhthuc==5 && dapan=="") {
        $('.popup_thatbai_thongbao_text').text('Nhập đáp án dạng giờ');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    if (hinhthuc==6 && dapan=="") {
        $('.popup_thatbai_thongbao_text').text('Nhập đáp án dạng ngày');
        $('.popup_thatbai_thongbao').show();
        return;
    }

    var co=1;
    var selected = $("input[type='radio'][name='answer_tracnghiem']:checked");
    if (selected.length == 0) {
        co=0;
    }
    var coo=1;
    var selected_hopkiem = $("input[type='checkbox'][name='an_hopkiem[]']:checked");
    if (selected_hopkiem.length == 0) {
        coo=0;
    }

    var cooo=1;
    var selected_thaxuong = $("input[type='radio'][name='choice_tha']:checked");
    if (selected_thaxuong.length == 0) {
        cooo=0;
    }
    if (manh_check==0) {
        $('.popup_thatbai_thongbao_text').text('Không đuợc bỏ trống lựa chọn');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    if (hinhthuc==2 && co==0) {
        $('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 đáp án trắc nghiệm đúng');
        $('.popup_thatbai_thongbao').show();
        return;
    }

    if (hinhthuc==3 && coo==0) {
        $('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 đáp án hộp kiểm đúng');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    if (hinhthuc==4 && cooo==0) {
        $('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 đáp án option đúng');
        $('.popup_thatbai_thongbao').show();
        return;
    }
    
    var data_send = new FormData();
        data_send.append('cauhoi', cauhoi);
        data_send.append('hinhthuc', hinhthuc);
        data_send.append('loai', loai);
        data_send.append('sodiem', sodiem); 
        data_send.append('thoigian_thuchien', time_thuchien); 
        data_send.append('dap_an', dapan); 
    var arr_img_cauhoi=[];
    for (i = 0; i < file.length; i++) {
        data_send.append('file' + i, file[i]);
        var img_cauhoi=file[i].name;
        arr_img_cauhoi.push(img_cauhoi);
    }
    arr_img_cauhoi=JSON.stringify(arr_img_cauhoi);
    data_send.append('img_cauhoi', arr_img_cauhoi); 
    $.ajax({
      type: "POST",
      url: "/ajax/add_cauhoi.php",
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
      }
  });
    
})
active_single_menu('kt_tong');
active_single_menu_con('dsch_menu');
</script> 
        
     
    
