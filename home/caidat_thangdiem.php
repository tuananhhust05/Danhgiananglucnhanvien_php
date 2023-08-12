<?php
    include 'config.php'; 
    if (!in_array(1, $quyen_thangdiem)) {header("Location: /trang_chu_sau_dang_nhap.html");};
    if ($thangdiem_hethong=="") {
        $thangdiem_hethong=0;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thang điểm</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/saitaman.css">
    <link rel="stylesheet" type="text/css" href="../css/tatsumaki.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">

</head>

<body>
    <div class="wapper">
        <div class="d_flex">
            <? include('../includes/cd_sidebar.php'); ?>
            <div class="main">
                <div class="header back_w border_r10 w_100">
                    <div class="box_header d_flex space_b align_c position_r">
                        <div class="title_header">
                            <p>Cài đặt / Thang điểm</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="m_thangdiem">
                            <p class="chuden size-14 tieude1024 bot-15">Cài đặt / Thang điểm</p>
                            <div class="flex">
                                <div class="khoi2">
                                    <div class="thangdiem shadow10 bot-20">
                                        <div class="nenxanh-chutrang ">
                                            <div class="padding15 flex space">
                                                <p class="size-16 font-bold">Thang điểm</p>
                                                <?php if (in_array(2, $quyen_thangdiem)): ?>
                                                <div class="flex c-pointer" onclick="hienpopupid('show_thietlapid')">
                                                    <div class="right-5">
                                                        <img src="../img/manhimg/thietlap.png" alt="Thiết lập thang điểm">
                                                    </div>
                                                    <p class="size-14">Thiết lập</p>
                                                </div>
                                                <?php endif ?>
                                               
                                            </div>
                                        </div>
                                        <div class="nentrang">
                                            <div class="padding15 flex space">
                                                <p class="size-16 font-medium chuden">Thang điểm:<span class="left-10 text_thangdiem"><label class="td_trc_cd lay_gtr_nay<?if ( $thangdiem_hethong=="") echo "chudo";?>"><? if ($thangdiem_hethong!="") echo $thangdiem_hethong;else echo "Chưa cài đặt thang điểm";?></label>
                                                </span></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thangdiem shadow10">
                                        <div class="nenxanh-chutrang ">
                                            <div class="padding15 flex space">
                                                <p class="size-16 font-bold">Phân loại đánh giá</p>
                                                <?php if (in_array(2, $quyen_thangdiem)): ?>
                                                <?php if ($thangdiem_hethong>0): ?>
                                                <div class="flex c-pointer nut_thiet_lap_pl "
                                                    onclick="hienpopupid('show_phanloaidanhgiaid')">
                                                    <div class="right-5">
                                                        <img src="../img/manhimg/thietlap.png" alt="phân loại đánh giá">
                                                    </div>
                                                    <p class="size-14">Thiết lập</p>
                                                </div>
                                                <?php endif ?>
                                                <?php endif ?>
                                                
                                            </div>
                                        </div>
                                        <div class=" show_ajax">
                                           <div class="td_trc_cd <?if ($phanloai_hethong=="") echo "pd20 chudo";?>">
                                               <? if ($phanloai_hethong!="") {
                                                $pl= json_decode($phanloai_hethong, true);
                                                foreach ($pl as  $value) {
                                                    ?>
                                                    
                                                       <div class="padding15 khoicon nentrang">
                                                          <div class=" flex">
                                                              <p class="cacmuc"><?
                                                              if ($value[2]==1) echo "Yếu:"; 
                                                              if ($value[2]==2) echo "Trung bình:"; 
                                                              if ($value[2]==3) echo "Khá:"; 
                                                              if ($value[2]==4) echo "Giỏi:"; 
                                                              if ($value[2]==5) echo "Xuất sắc:"; 
                                                            ?></p>
                                                              <p class="cacketqua"><?=$value[0]?> -> <?=$value[1]?> </p>
                                                          </div>  
                                                        </div>
                                                    
                                                    <?
                                                }
                                               }
                                               else echo "Chưa có phân loại"?>
                                           </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="show_thietlapid" class="popup hidden">
        <div class="show_thietlap pop">
            <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                <div class="changesize18">
                    <h4 class="size-18 font-bold">Thiết lập thang điểm cho hệ thống</h4>
                </div>
                <div class="flex center-height c-pointer x_close">
                    <img src="../img/manhimg/x.png" alt="Hướng dẫn">
                </div>
            </div>
            <div class="nentrang br-b-10">
                <form action="" id="form_thangdiem" method="post" onsubmit="return false">
                    <div class="padding-20">
                        <div class="bot-15 ">
                            <p class="chuden font-medium size-15 bot-5">Thang điểm<span class="chudo">*</span></p>
                            <div class="select_no_muti " id="nhap_sodiem">
                                <select class="js_select_2" name="nhap_sodiem" id="select_nhap_sodiem">
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="0">Khác</option>
                                </select>
                            </div>
                        </div>

                        <div class="bot-15 opacity-5 " id="nhap_thangdiem">
                            <p class="chuden font-medium size-15 bot-5">Thiết lập thang điểm</p>
                            <div id="thangdiem_hethong" class=" border_input text " >
                               
                                <input type="text"  name="nhap_thangdiem" placeholder="Nhập thang điểm" class="size-14 chuden i_thangdiem ">
                                </div>
                        </div>
                        <div class="khoibutton_form top-25 bot-20">
                            <button onclick="window.location.reload()" class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer ">
                                Hủy
                            </button>
                            <button type="submit" name="tl_thangdiem" 
                                class="btn  btn-nenxanh-chutrang br-5 vienxanh font-medium size-15  c-pointer btnluu_thangdiem">
                                Đồng ý
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="show_phanloaidanhgiaid" class="popup hidden">
        <div class="popto">
            <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                <div class="changesize18">
                    <h4 class="size-18 font-bold">Phân loại đánh giá</h4>
                </div>
                <div class="flex center-height c-pointer x_close">
                    <img src="../img/manhimg/x.png" alt="Đóng">
                </div>
            </div>
            <div class="nentrang br-b-10">
                <form action="" method="post" id="frm_phanloai_danhgia" onsubmit="return false">
                    <div class="padding-20">
                        <div class="mkhoiphanloai">
                            <div class="khoiphanloai">
                                <?php if ($phanloai_hethong!=""): $pl= json_decode($phanloai_hethong, true);?>
                                    <?php foreach ($pl as $key => $value_pl): ?>
                                        <div class="khoiphanloaicon">
                                            <div class="khoiphanloaiconcon flex  space bot-15 ">
                                                <div class="div145">
                                                    <p class="chuden font-medium size-15 bot-5">Từ <span class="chudo">*</span>
                                                    </p>
                                                    <div class="border_input text">
                                                        <input value="<?=$value_pl[0]?>" type="text" name="pldg_diemtu" placeholder="Nhập số điểm" class="size-14 chuden arr_tt_sp tu">
                                                    </div>
                                                </div>
                                                <div class="div145">
                                                    <p class="chuden font-medium size-15 bot-5">Đến <span class="chudo">*</span>
                                                    </p>
                                                    <div class="border_input text">
                                                        <input value="<?=$value_pl[1]?>" type="text"  name="pldg_diemden" placeholder="Nhập số điểm" class="size-14 chuden arr_tt_sp den mc_den1">
                                                    </div>
                                                </div>
                                                <div class="div145">
                                                    <p class="chuden font-medium size-15 bot-5">Loại <span
                                                            class="chudo">*</span></p>
                                                    <div class="select_no_muti">
                                                        <select name="pldg_diemloai" id="" class="js_select_2 arr_tt_sp loai">
                                                            <option value="">Chọn loại</option>
                                                            <option <?if($value_pl[2]==1) echo 'selected'; ?> value="1">Yếu</option>
                                                            <option <?if($value_pl[2]==2) echo 'selected'; ?> value="2">Trung bình</option>
                                                            <option <?if($value_pl[2]==3) echo 'selected'; ?> value="3">Khá</option>
                                                            <option <?if($value_pl[2]==4) echo 'selected'; ?> value="4">Giỏi</option>
                                                            <option <?if($value_pl[2]==5) echo 'selected'; ?> value="5">Xuất sắc</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="div145 xoaphanloai c-pointer" onkeyup="xoa_phanloai()">
                                                    Xóa
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <?php if ($phanloai_hethong==""): ?>
                                    <div class="khoiphanloaicon">
                                        <div class="khoiphanloaiconcon flex  space bot-15 ">
                                            <div class="div145">
                                                <p class="chuden font-medium size-15 bot-5">Từ <span class="chudo">*</span>
                                                </p>
                                                <div class="border_input text">
                                                    <input  type="text" name="pldg_diemtu" placeholder="Nhập số điểm" class="size-14 chuden arr_tt_sp tu">
                                                </div>
                                            </div>
                                            <div class="div145">
                                                <p class="chuden font-medium size-15 bot-5">Đến <span class="chudo">*</span>
                                                </p>
                                                <div class="border_input text">
                                                    <input type="text"  name="pldg_diemden" placeholder="Nhập số điểm" class="size-14 chuden arr_tt_sp den mc_den1">
                                                </div>
                                            </div>
                                            <div class="div145">
                                                <p class="chuden font-medium size-15 bot-5">Loại <span
                                                        class="chudo">*</span></p>
                                                <div class="select_no_muti">
                                                    <select name="pldg_diemloai" id="" class="js_select_2 arr_tt_sp loai">
                                                        <option value="">Chọn loại</option>
                                                        <option value="1">Yếu</option>
                                                        <option value="2">Trung bình</option>
                                                        <option value="3">Khá</option>
                                                        <option value="4">Giỏi</option>
                                                        <option value="5">Xuát sắc</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="div145 xoaphanloai c-pointer" onkeyup="xoa_phanloai()">
                                                Xóa
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div data-num='1' class="themmoiphanloai nenxanh-chutrang flex  center-center c-pointer">
                                <div class="flex">
                                    <div class="right-10">
                                        <img src="../img/manhimg/themtrang.png" alt="Thêm loại">
                                    </div>
                                    <p>Thêm loại</p>
                                </div>
                            </div>
                        </div>
                        <div class="khoibutton_form top-25 bot-5">
                            <div onclick="window.location.reload()"
                                class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer ">
                                Hủy
                          </div>
                            <button  type="submit" name="tl_phanloai" 
                                class="btn btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_phanloai">
                               Đồng ý
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <? include('../includes/manh_modal.php') ?>

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%'
})
</script>

</html>
<script type="text/javascript">
 $('.i_thangdiem').attr('disabled', true);
$(".btnhuy_thangdiem").click(function() {
    $(".change_text_tb").text('Thiết lập thang điểm thất bại!!');
});

$("#nhap_sodiem").change(function() {
    if ($('#select_nhap_sodiem').val()==0)
    {
        $('#nhap_thangdiem').removeClass("opacity-5");
        $('.i_thangdiem').attr("disabled", false);
        

    }
    else{
        $('#nhap_thangdiem').addClass("opacity-5");
        $('.i_thangdiem').attr("disabled", true);
    }
});

$('.btnluu_thangdiem').click(function(){
    var regex=/^\d+$/;
    if ($('#select_nhap_sodiem').val()!=0){
        var td=$('#select_nhap_sodiem').val();
        }
    else{
        var td=$('.i_thangdiem').val();
    }
    
    if(td=="") {
        alert('Vui lòng chọn 1 thang diểm');
        return;

    }
    if (regex.test(td)==false)
    {
        alert("Định dạng thang điểm phải là số!");
        return;
    }
    $('#show_thietlapid').addClass("hidden"); 
    $.ajax({
            url: '/render/phanloaithangdiem.php',
            type: 'POST',
            data: {
                td:td, 
            },
            success: function(data){
                $('.show_ajax').html(data);
                location.reload();
            }
        });  
})

$('.btnluu_phanloai').click(function(){
    var td=$('.lay_gtr_nay').text() ;
    
    var regex=/^\d+$/;
    var diem_tu=$('.tu').val();
    var diem_den=$('.den').val();
    var loai=$('.loai').val();
    

    var arr_tt_sp = new Array();
    var i = 1;
    var input = new Array();
    var error=0;
    $('.den').each(function(){
        var gtr_den=$(this).val();
        var gtr_tu=$(this).parents('.khoiphanloaiconcon').find('.tu').val();

        if (Number(gtr_tu)>=Number(gtr_den)) {
            error=1;
        }
    });
    var co=1;
    $('.arr_tt_sp').each(function(){
        if (regex.test($(this).val())==false) {
            co=0;
        }
        if($(this).val()=="") {
            co=2;
        }
        if($(this).val()><?=$thangdiem_hethong?>) {
            co=3;
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
    var phan_loai = JSON.stringify(arr_tt_sp);
    if (phan_loai ==="[]") {
        alert('Chọn ít nhất 1 phân loại');
        return;
    }
        
    if (co==2) {
        alert("Vui lòng nhập đủ thông tin");
        return;
    }
    if (error==1) {
        alert('Điểm bẳt đầu phải nhỏ hơn kết thúc');
        return;
    }
    if (co==0) {
        alert('Định dạng điểm phải là số');
        return;
    }
    
    if (co==3) {
        alert("Vui lòng nhập số điểm nhỏ hơn <?=$thangdiem_hethong?>");
        return;
    }
    var camco=Number($(this).attr('data-camco'));
    if (camco==1) {
        alert('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm dến trước đó');
        return;
    }

   $('#show_phanloaidanhgiaid').addClass("hidden");
    $.ajax({
            url: '/render/phanloaithangdiem2.php',
            type: 'POST',
            data: {
                phan_loai:phan_loai,
                td:td, 
            },
            success: function(data){
                $('.show_ajax').html(data);
            }
        });  
    
    
})
$('.themmoiphanloai').click(function() {
    var k=Number($(this).attr('data-num')) ;
    var camco=Number($(this).attr('data-camco'));
    if (camco==1) {
        alert('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm dến trước đó');
        return;
    }

    $(this).parents('.mkhoiphanloai').find('.khoiphanloai').append('<div class="khoiphanloaicon"><div class="khoiphanloaiconcon flex  space bot-15 "><div class="div145"><p class="chuden font-medium size-15 bot-5">Từ <span class="chudo">*</span></p><div class="border_input text"><input data-diemtu="'+(k)+'" onmouseout="diemnhieuhon(this)" type="text" name="pldg_diemtu" placeholder="Nhập số điểm" class="size-14 tu chuden arr_tt_sp mc_tu"></div> </div><div class="div145"><p class="chuden font-medium size-15 bot-5">Đến <span class="chudo">*</span></p><div class="border_input text"><input type="text" name="pldg_diemden" placeholder="Nhập số điểm" class="size-14 den chuden arr_tt_sp mc_den'+(k+1)+'"></div> </div><div class="div145"><p class="chuden font-medium size-15 bot-5">Loại <span class="chudo">*</span></p><div class="select_no_muti "><select name="pldg_diemloai" id="" class="loai js_select_2 arr_tt_sp"><option value="">Chọn loại</option><option value="1">Yếu</option><option value="2">Trung bình</option><option value="3">Khá</option><option value="4">Giỏi</option><option value="5">Xuất sắc</option></select></div> </div><div class="div145 xoaphanloai c-pointer" onmouseup="xoa_phanloai()">Xóa</div></div></div>');
    $('.js_select_2').select2();
    $(this).attr('data-num',k+1);
});

function diemnhieuhon(th){
    var i=$(th).attr('data-diemtu');
    var diem=$(th).val();
    var diem_den_truoc=$(th).parents('.khoiphanloai').find('.mc_den'+i+'').val();
    console.log(diem);
    console.log(diem_den_truoc);
  

   if (Number(diem) <= Number(diem_den_truoc)) {
    console.log('nhohon');
     $('.btnluu_phanloai').attr('data-camco',1);
     $('.themmoiphanloai').attr('data-camco',1);
   }
   else{
    console.log('lonhon dc ');
     $('.btnluu_phanloai').attr('data-camco',0);
     $('.themmoiphanloai').attr('data-camco',0);
   }

}
</script>
