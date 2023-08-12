
<?     
include('config.php'); 

if (!in_array(2, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};

if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Thêm mới tiêu chí đánh giá</title>
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
                                <div class="d_flex"> <a href='/quan_ly_tieu_chi_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách lý tiêu chí đánh giá <span> / </span><span> Thêm mới</span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="body_ql_tieuchi body_ql_tieuchi_danhgia">
                                <div class="title_header ">
                                    <div class="d_flex"> <a href='/quan_ly_tieu_chi_danh_gia.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách lý tiêu chí đánh giá <span> / </span><span> Thêm mới</span></p>
                                    </div>
                                </div>
                                <div class="header_d width_100">
                                    <h4>Thêm mới tiêu chí</h4>
                                </div>
                                <div class="body width_100">
                                    <!-- form thêm mới tiêu chí con (block người và ngày) -->
                                    <form onsubmit="return false" action="" method="post" enctype="multipart/form-data"
                                        class="form form_tieuchi form_them_tieuchi form_them_tieuchi_con">
                                        <div class="container">
                                            <div class="form_container">
                                                <div class="form_group group_ten">
                                                    <label for="">Tên tiêu chí <span class="color_red">*</span></label>
                                                    <input type="text" class="ten" name="ten" placeholder="Nhập tên tiêu chí">
                                                </div>
                                                <div class="form_group position_r group_loai_tc tieuchi_2 ">

                                                    <label for="" class="hover_thongtin d_flex align_c c-pointer">
                                                        <span>Loại tiêu chí</span>
                                                        <img src="../img/icon_i.png" alt="Thông tin" class="ml_10 mr_5">
                                                        <span class="font_s14 color_blue font_wn ">Thông tin</span>
                                                    </label>

                                                    <div class="select_no_muti ">
                                                        <select class="js_select_2 loai_tc" name="loai_tc" id="loai_tc">
                                                            <option value="2">Tiêu chí tổng hợp</option>
                                                            <option value="1">Tiêu chí đơn</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal_loai_tieuchi modal_loai_tieuchi_1">
                                                        <p>Tiêu chí đơn: Là tiêu chí con thuộc tiêu chí tổng hợp.</p>
                                                    </div>
                                                    <div class="modal_loai_tieuchi modal_loai_tieuchi_2">
                                                        <p>Tiêu chí tổng hợp: Là tiêu chí có thể gồm nhiều tiêu chí con
                                                            khác.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group group_trang_thai ">
                                                    <label for=""> Trạng thái <span class="color_red">*</span></label>
                                                    <div class="select_no_muti">
                                                        <select class="js_select_2 trang_thai" name="trang_thai">
                                                            <option value="2">Mở</option>
                                                            <option value="1">Đóng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form_group group_tc_con display_none ">
                                                    <label for=""> Tiêu chí tổng hợp <span
                                                            class="color_red">*</span></label>
                                                    <div class="select_no_muti">

                                                        <select class="js_select_2 tc_tonghop" name="tc_tonghop">
                                                            <?
                                                            $query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and (id_congty ='$usc_id' or id_congty=1) ");
                                                            $row = $query->result_array();
                                                            foreach ($row as $key => $value) {
                                                               ?>
                                                            <option value="<? echo $value['id']?>"><? echo $value['tcd_ten']?> <span class="chuxam">(Số điểm:<?=$value['tcd_thangdiem']?>)</span> </option>
                                                             <?
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form_group form_group_block group_nguoi_tao group_tc_cha  ">
                                                    <label for="">Người tạo</label>
                                                    <input type="text" data-nguoitao="<?echo $_SESSION['ep_id']; ?>" class="nguoi_tao" name="nguoi_tao" value="<?echo $_SESSION['ep_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group form_group_block group_ngay_tao group_tc_cha ">
                                                    <label for="">Ngày tạo</label>
                                                    <input type="text" data-ngaytao="<?=time()?>" class="ngay_tao"  name="ngay_tao" value="<? 
                                                    $timestamp=time();
                                                    echo(date("d/m/Y ", $timestamp)); ?>">
                                                </div>
                                                <div class="form_group group_tc_con mr_20 display_none">
                                                    <div class=" d_flex m_tieuc_480">
                                                        <div class="form_group form_group_block group_nguoi_tao  ">
                                                            <label for="">Người tạo</label>
                                                            <input type="text"  class="nguoi_tao" name="nguoi_tao" data-nguoitao="<?echo $_SESSION['ep_id']; ?>"
                                                                value="<?echo $_SESSION['ep_name']; ?>">
                                                        </div>
                                                        <div class="form_group form_group_block group_ngay_tao">
                                                            <label for="">Ngày tạo</label>
                                                            <input type="text" data-ngaytao="<?=time()?>" class="ngay_tao" name="ngay_tao" value="<? 
                                                    $timestamp=time();
                                                    echo(date("d/m/Y ", $timestamp)); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form_group  group_thang_diem">
                                                    <label for="">Số điểm <span class="color_red">*</span></label>
                                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  type="text" class="thang_diem" name="thang_diem" placeholder="Nhập số điểm">
                                                </div>
                                            </div>
                                            <div class="form_group group_ghi_chu">
                                                <label for="">Ghi chú</label>
                                                <textarea id="editor1" class="ghi_chu" name="ghi_chu" cols="80" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="form_btn d_flex content_c mt_25">
                                            <button onclick=" window.location.href='/quan_ly_tieu_chi_danh_gia.html'" type="button" class="btn btn_trang btn_168 mr_60 outline_none">Hủy</button>
                                            <button type="submit" name="submit" data-name="<?=$_POST['ten']?>" class="ajax_them_tc btn btn_xanh btn_168 outline_none">Lưu</button>
                                        </div>
                                    </form>
                                    <!--end form thêm mới tiêu chí 1 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- popup thành công  -->
    <div class="popup popup_500 popup_thanhcong ">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Thêm mới tiêu chí <span style="width: 300px;" class="font_wB show_xoa_ten elipsis1"></span> thành công! </p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup done_add_tc">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup thành công -->
    <!-- popup popup_thatbai  -->
    <div class="popup popup_500 popup_thatbai ">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_2.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Thêm mới tiêu chí <span class="font_wB show_xoa_ten"></span> thất bại! <br>(Đã tồn tại tên tiêu chí) </p>

                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup ">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup_thatbai -->
    
    

    
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function(){
    $('.tc_tonghop').trigger('change');
})
$('.tc_tonghop').change(function(){
    var id_tc_tonghop=$(this).val();
    $.ajax({
            url: '/ajax/tinhtoan_diemcha_tieuchi.php',
            type: 'POST',
            data: {
                id_tc_tonghop:id_tc_tonghop, 
            },
            dataType: "json",
            success: function(data){  
              $('.ajax_them_tc').attr('data-tong-tc-con',data.tong_tc_don);
              $('.ajax_them_tc').attr('data-tong-tc-cha',data.tong_tc_cha);
            }
        });

})
$('#loai_tc').change(function() {

    tieuchi = $(this).val();
       if (tieuchi == 1) {
        $('.group_loai_tc').addClass('tieuchi_1');
        $('.group_loai_tc').removeClass('tieuchi_2');
        $('.group_tc_con').removeClass('display_none');
        $('.group_tc_cha').addClass('display_none');
    } if (tieuchi == 2) {
        $('.group_loai_tc').removeClass('tieuchi_1');
        $('.group_loai_tc').addClass('tieuchi_2');
        $('.group_tc_con').addClass('display_none');
        $('.group_tc_cha').removeClass('display_none');
    }
})

$('.hover_thongtin').click(function() {
    if ($('.tieuchi_1').is(":visible")) {
        $('.modal_loai_tieuchi_1').toggle();
    } else {
        $('.modal_loai_tieuchi_2').toggle();
    }
})

$(window).click(function(e) {
    if (!$('.tieuchi_1').is(e.target) && $('.tieuchi_1').has(e.target).length == 0) {
        $('.modal_loai_tieuchi_1').hide();

    }
    if (!$('.tieuchi_2').is(e.target) && $('.tieuchi_2').has(e.target).length == 0) {
        $('.modal_loai_tieuchi_2').hide();
    }
})

$('.js_select_2').select2({
    width: '100%'
})
CKEDITOR.replace('editor1', {
    height: '108'
});

CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;

$('.form_them_tieuchi').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        ten: "required",
        trang_thai: "required",
        "thang_diem":{
            required: true,
            number: true
        },
    },
    messages: {
        ten: "Không được để trống",
        trang_thai: "Không được để trống",
        "thang_diem":{
            required: "Không được để trống",
            number: "Hãy nhập 1 số"
        },
    },
});
$('.ajax_them_tc').click(function() {
    var tc_don_tong=Number($(this).attr('data-tong-tc-con')) ;
    var tc_tonghop_tong=Number($(this).attr('data-tong-tc-cha')) ;

    var check=tc_tonghop_tong-tc_don_tong;
    
    var regex=/^\d+$/;
    var ten = $('.ten').val();
    var loai_tc = $('.loai_tc').val();
    var trang_thai = $('.trang_thai').val();
    var nguoi_tao = $(".nguoi_tao").attr('data-nguoitao');
    var ngay_tao =$(".ngay_tao").attr('data-ngaytao');
    var thang_diem =Number($('.thang_diem').val());
    var tc_tonghop = $('.tc_tonghop').val();
    var ghi_chu= CKEDITOR.instances['editor1'].getData() ;

    $('.show_xoa_ten').text(ten);

if(thang_diem<=0){alert("Số điểm phải lớn hơn 0");return}
if( ten==""|| thang_diem=="") {alert("Vui lòng nhập đủ thông tin");return}
if(thang_diem > <?=$thangdiem_hethong?>){alert("Số điểm phải nhỏ hơn hoặc bằng <?=$thangdiem_hethong?>");return}
if (regex.test(thang_diem)==false)
{
    alert("Định dạng số điểm phải là số!");
    return;
}

if (loai_tc==1) {
   if (check==0) {
    alert('Tổng điểm tiêu chí đơn của tiêu chí tổng hợp này đã đủ. Vui lòng chọn tiêu chí tổng hợp khác');
    return;
   }
   if (thang_diem>check) {
    alert("Số điểm còn lại của tiêu chí tổng hợp này là "+check+"!. Vui lòng nhập lại");
    return;
   }
}
        $.ajax({
            url: '/ajax/capnhat_tieuchi.php',
            type: 'POST',
            data: {
                ten:ten, 
                loai_tc:loai_tc, 
                trang_thai:trang_thai, 
                nguoi_tao:nguoi_tao, 
                ngay_tao:ngay_tao, 
                thang_diem:thang_diem, 
                tc_tonghop:tc_tonghop, 
                ghi_chu:ghi_chu, 
            },
            success: function(data){ 
             
                if (data==1) {
                    alert('Tên tiêu chí đã tồn tại vui lòng chọn tên khác');
                }
                else{
                    $('.popup_thanhcong').show();
                    $('.done_add_tc').click(function(){
                        window.location.href="/quan_ly_tieu_chi_danh_gia.html";
                    })
                }
            }
        }); 

})
</script>

</html>