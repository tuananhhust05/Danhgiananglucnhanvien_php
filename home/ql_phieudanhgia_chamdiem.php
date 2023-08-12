<? include "config.php" ;
$key_u = getValue("id","int","GET",0);
$key_p = getValue("id_p","int","GET",0);


$query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key_p."'");
$row = mysql_fetch_assoc($query->result);

$qr_kt=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row['phieuct_id_kh']." ");
$row_kt = mysql_fetch_assoc($qr_kt->result);
$made_ktra=$row_kt['kh_id_kt']; 

$qr_cauhoi=new db_query("SELECT * FROM de_kiemtra_cauhoi where id=".$made_ktra." ");
$row_cauhoi = mysql_fetch_assoc($qr_cauhoi->result);
$mang_cauhoi=$row_cauhoi['danhsach_cauhoi'];
$mang_cauhoi=explode(',',$mang_cauhoi);


$qr_traloi=new db_query("SELECT * FROM tbl_cautraloi where ma_nv=".$key_u." and phieu_id='".$key_p."' ");
$row_traloi = mysql_fetch_assoc($qr_traloi->result);
$cau_traloi=$row_traloi['cau_traloi'];
$cau_traloi=json_decode($cau_traloi,true);


$qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where id_doituong='".$key_u."' and phieu_id='".$key_p."' and id_nguoidanhgia ='".$_SESSION['ep_id']."' ");
$row_chamdiem=mysql_fetch_assoc($qr->result);
$dem=mysql_num_rows($qr->result);
$cd_diem=$row_chamdiem['cd_diem_ktra'];
$tongd=$row_chamdiem['tongdiem_kt'];
$trangthai=$row_chamdiem['phieuct_trangthai_kt'];
$cd_diem=explode(',',$cd_diem);


?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        input[type="radio"],input[type="checkbox"] { 
         outline: none;
         cursor: pointer;
         pointer-events: none;
          }
          .chuxanh{
            color: #4C5BD4;
          }

    </style>
    <title>Chấm điểm</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <link rel="stylesheet" type="text/css" href="../css/manh.css">
</head>

<body>
    <div class="chamdiem">
        <div id="ql_tieuchi_nangluc_chitiet" class="ql_tieuchi">
            <div class="wapper color_b">
                <div class="d_flex">
                    <? include('../includes/cd_sidebar.php'); ?>
                    <div class="main">
                        <div class="header back_w border_r10 w_100">
                            <div class="box_header d_flex space_b align_c position_r">
                                <div class="title_header ">
                                    <div class="d_flex">
                                        <a href='/quanly-phieudanhgia.html' class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / Chấm điểm</p>
                                    </div>
                                </div>
                                <? include('../includes/menu_header.php') ?>
                            </div>
                            <div class="main_body">
                                <div class="header_ql_tieuchi">
                                    <div class="title_header ">
                                        <div class="d_flex">
                                            <a href='/quanly-phieudanhgia.html' class="img_quaylai mr_10">
                                                <img src="../img/icon_so.png" alt="Quay lại">
                                            </a>
                                            <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / Chấm điểm</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="chuxanh font-medium">Bài làm của nhân viên <?=search($data_list_nv,'ep_id',$key_u)[0]['ep_name']?></h4><br>
                                <form action="" method="post" onsubmit="return false">

                                    <?php 
                                        $stt=0; foreach ($mang_cauhoi as $k=> $value): $stt++; 
                                        $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value."'");
                                        $info = mysql_fetch_assoc($query->result);
                                        $dapan=json_decode($info['dap_an'], true);
                                        $img_cauhoi=json_decode($info['img_cauhoi'], true);
                                    ?>
                                        
                                        <div data-id='<?=$stt?>' id="cauhoi_chitiet<?=$stt?>" class="cauhoi_chitiet  mb_20 m_relative sugar">
                                            <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
                                            <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$info['cauhoi']?> </span> <span class="font_s14 color_blue">(<?=$info['sodiem']?> điểm)</span></p>

                                            <?php if (count($img_cauhoi)>0): ?>
                                                <div class="div_preview_image top-15">
                                                <?php foreach ($img_cauhoi as  $img): ?>
                                                    <div class='m_boder_img_cauhoi flex bot-15'>
                                                        <div class='wh_img_prvct flex'>
                                                            <img class='img_cauhoi' style='width: 100%;' src='../ajax/uploads/<?=$img?>'>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                                </div>
                                            <?php endif ?>

                                            <p class="font-500 chuden mb_20">Câu trả lời</p>

                                            <?php if ($info['hinhthuc']==1): ?>
                                                <div class="form_group ">
                                                    <div class="text_dat">
                                                        <textarea disabled readonly cols="80" rows="10" class="dap_an_dangtuluan"><?php foreach ($cau_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id']): ?><?=$list_traloi_val['cautraloi'];if($list_traloi_val['cautraloi']=='') $m_check=0;else $m_check=1;?><?php endif ?><?php endforeach ?></textarea>
                                                    </div>
                                                </div>
                                                <p class="font_s15 font_w5 mb_5 top-20">Chấm điểm <span class="chudo">*</span></p>
                                                <div class="manhiput_tong">
                                                    <div class="manhiput">
                                                        <input onkeyup="if(this.value><?=$info['sodiem']?>){this.value='<?=$info['sodiem']?>';}else if(this.value<0){this.value='0';};if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" <?php if ($m_check==0): ?>readonly disabled value='0'<?php endif ?> <?php if ($m_check==1): ?>value='<?=$cd_diem[$k]?>'<?php endif ?> placeholder="Nhập số điểm" class="size-14 arr_tt_sp">
                                                    </div>
                                                    <p class="red_tb">Không được để trống</p>
                                                </div>
                                            <?php endif ?>

                                            <?php if ($info['hinhthuc']==2): ?>
                                                <?php $ra=0; foreach ($dapan as  $value):$ra++; ?>
                                                    <div class="d_flex align_c mb_20">
                                                        <input readonly <?php foreach ($cau_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id'] && $list_traloi_val['cautraloi']==$value['answer'][0] ): ?><?echo "checked";?><?php endif ?><?php endforeach ?> type="radio"  value="<?=$value['answer'][0]?>" class="mr_5 dap_an_dangtracnghiem" >
                                                        <label class=""><?=$value['answer'][0]?></label>
                                                    </div>
                                                <?php endforeach ?>
                                                <p class="font_s15 font_w5 mb_5 top-20">Chấm điểm<span class="chudo">*</span></p>
                                                    <div class="manhiput_tong">
                                                        <div class="manhiput nenxam">
                                                            <input disabled onkeyup="if(this.value><?=$info['sodiem']?>){this.value='<?=$info['sodiem']?>';}else if(this.value<0){this.value='0';};if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" value="<?php foreach ($dapan as  $value):?><?php foreach ($cau_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id'] ): ?><?php if ($list_traloi_val['cautraloi']==$value['answer'][0] && $value['answer_right'][0]==1): ?><?$diem=$info['sodiem'];?><?php endif ?><?php if ($list_traloi_val['cautraloi']==""|| ($list_traloi_val['cautraloi']==$value['answer'][0] && $value['answer_right'][0]==0)): ?><?$diem=0;?><?php endif ?><?php endif ?><?php endforeach ?><?php endforeach ?><?=$diem?>" class="size-14 arr_tt_sp ">
                                                        </div>
                                                        <p class="red_tb">Không được để trống</p>
                                                    </div>
                                            <?php endif ?>
                                            
                                            
                                                
                                            
                                            <?php if ($info['hinhthuc']==3): ?>
                                                <?php $ch_b=0; foreach ($dapan as  $value):$ch_b++; ?>
                                                    <div class="d_flex align_c mb_20">
                                                        <input readonly <?php foreach ($cau_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id'] && in_array($value['answer'][0],$list_traloi_val['cautraloi'])): ?><?echo "checked";?><?php endif ?><?php endforeach ?> type="checkbox"  value="<?=$value['answer'][0]?>" class="mr_5">
                                                        <label class="" ><?=$value['answer'][0]?></label>
                                                    </div>
                                                <?php endforeach ?>
                                                <p class="font_s15 font_w5 mb_5 top-20">Chấm điểm<span class="chudo">*</span></p>
                                                    <div class="manhiput_tong">
                                                        <div class="manhiput ">
                                                            <input  onkeyup="if(this.value><?=$info['sodiem']?>){this.value='<?=$info['sodiem']?>';}else if(this.value<0){this.value='0';};if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" value="<?=$cd_diem[$k]?>" class="size-14 arr_tt_sp ">
                                                        </div>
                                                        <p class="red_tb">Không được để trống</p>
                                                    </div>
                                            <?php endif ?>
                                            
                                            <?php if ($_SESSION['quyen']!=1): ?>
                                                <div class="xemdapan c-pointer">
                                                    <div class="pd10">
                                                        <img src="../img/manhimg/xemda.png" alt="Thiết lập thang điểm" >
                                                        <p class="left-10">Xem đáp án</p>
                                                    </div>
                                                </div>
                                                <div class="hiendapan hidden_tam">
                                                    <div class="nenxanh">
                                                        <p class="font-bold">Đáp án</p>
                                                        <div class="flex js_close">  
                                                        <div class="right10">
                                                            <img src="../img/manhimg/x2.png" alt="Thiết lập thang điểm" >
                                                        </div>                         
                                                            <p class="size-15">Đóng lại</p>   
                                                        </div>
                                                    </div>
                                                    <div class="nentrang pd20">
                                                        <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
                                                        <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$info['cauhoi']?></span> <span class="font_s14 color_blue">(<?=$info['sodiem']?> điểm)</span></p>

                                                        <?php if (count($img_cauhoi)>0): ?>
                                                            <div class="div_preview_image top-15">
                                                            <?php foreach ($img_cauhoi as  $img): ?>
                                                                <div class='m_boder_img_cauhoi flex bot-15'>
                                                                    <div class='wh_img_prvct flex'>
                                                                        <img class='img_cauhoi' style='width: 100%;' src='../ajax/uploads/<?=$img?>'>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach ?>
                                                            </div>
                                                        <?php endif ?>

                                                        <p class="font-500 chuden mb_20">Đáp án</p>

                                                        <?php if ($info['hinhthuc']==1): ?>
                                                            <div class="form_group ">
                                                                <div class="text_dat">
                                                                    <p class="chuden size-14"><?=$info['dap_an']?></p>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($info['hinhthuc']==2): ?>
                                                                <?php $ra=0; foreach ($dapan as  $dapan_value):$ra++; ?>
                                                                    <div class="d_flex align_c mb_20">
                                                                        <input readonly <?if($dapan_value['answer_right'][0]==1)echo 'checked' ?> type="radio" value="<?=$dapan_value['answer'][0]?>" class="mr_5 dap_an_dangtracnghiem" >
                                                                        <label class=""><?=$dapan_value['answer'][0]?></label>
                                                                    </div>
                                                                <?php endforeach ?>
                                                        <?php endif ?>

                                                        <?php if ($info['hinhthuc']==3): ?>
                                                            <?php $ch_b=0; foreach ($dapan as  $dapan_value):$ch_b++; ?>
                                                                <div class="d_flex align_c mb_20">
                                                                    <input readonly <?if($dapan_value['answer_right'][0]==1)echo 'checked' ?> type="checkbox" value="<?=$dapan_value['answer'][0]?>" class="mr_5">
                                                                    <label class="" ><?=$dapan_value['answer'][0]?></label>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    <?php endforeach ?>

                                    <?php if ($_SESSION['quyen']!=1): ?>
                                    <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                        <div class="header_d width_100">
                                            <h4>Kết quả bài kiểm tra năng lực</h4>
                                        </div>
                                        <div class="body width_100 ">
                                            <div class="nentrang shadow ">
                                                <div class="pd20">
                                                    <p class="font-medium size-15 ">Tổng điểm: <span class="color_blue font_s14 left-10 tong_diem"><?if($dem==0)echo "0";else echo $tongd?> điểm</span></p>
                                                    <input type="text" class="tong_diem_d hidden" value="<?echo $tongd?>">

                                                    <p class="top-15 font_s15 font_w5 mb_5">Nhận xét<span class="chudo">*</span></p>
                                                    <div class=" sel_dang_1">
                                                        <div class="text_dat">
                                                            <textarea class="nhanxet"  name="dap_an"  rows="8"><?=$row_chamdiem['nhanxet_kt']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <div class="form_btn d_flex content_c mt_25">
                                        <button onclick="window.location.href='/phieudanhgia-de-kiemtra-nv-<?=$key_p?>.html'" class="btn btn_trang btn_168 mr_60 js_huy">Hủy</button>
                                         <?php if ($_SESSION['quyen']!=1): ?>
                                        <?php if ($trangthai==1||$dem==0): ?>
                                            <button  class="btn btn_xanh btn_168 mr_60 js_luu">Lưu</button>
                                            <button  class="btn btn_xanhluc btn_168 js_hoanthanh">Hoàn thành</button>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="popup popup_500 popup_thanhcong ">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Cập nhật điểm thành công! </p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup close_popup_done">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup popup_500 popup_xoa pop_before">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Hoàn thành phiếu đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1 "><span class="font_wB">Bạn có chắc chắn muốn hoàn thành phiếu đánh giá ?</span> </br>
                        <span >(Sau khi xác nhận không thể sửa)</span> ?</p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_ht close_popup">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>

<script>
    $('.js_select_2').select2({
    width: '100%'
})
    
    
</script>
<script type="text/javascript">
    $('.xemdapan').click(function(){
        $(this).parents('.cauhoi_chitiet').find('.hiendapan').slideToggle("fast");
       
        $(this).addClass("hidden_tam")
    });
    $('.js_close').click(function(){
        $(this).parents('.cauhoi_chitiet').find('.hiendapan').hide();
        $(this).parents('.cauhoi_chitiet').find('.xemdapan').removeClass('hidden_tam');
    });
    

$('.arr_tt_sp').blur(function(){
    var tong_diem=0;
     $('.arr_tt_sp').each(function() {
        var diem=Number($(this).val()) ;
     tong_diem += Number(diem) ;
    })
    $('.tong_diem').text(+tong_diem+ ' điểm');
    $('.tong_diem_d').val(tong_diem);
})    

$('.js_huy').click(function(){
    window.location.href = '/phieudanhgia-de-kiemtra-nv-<?=$key_p?>.html';
})
$('.js_luu').click(function(){
    var list_diem="";
    var co_co=0;
     $('.arr_tt_sp').each(function() {
        var data_id = $(this).parents('.cauhoi_chitiet').attr('data-id');
        list_diem+=$(this).val()+",";
        if ($(this).val()=="") {
            $(this).parents('.manhiput_tong').find('.red_tb').show();
            co_co=1;
            window.location.hash='#cauhoi_chitiet'+data_id+'';
        }
        else{
             $(this).parents('.manhiput_tong').find('.red_tb').hide();
        }
    })
     <?if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}?>
     var nguoicham=<?=$_SESSION['ep_id']?>;
     var doituong_dccham=<?=$key_u?>;
     var phieu=<?=$key_p?>;
     var nhanxet=$('.nhanxet').val();
     var tongdiem=$('.tong_diem_d').val();
     
     if (co_co==1) {
        return;}
        if (nhanxet=="") {
        alert('Hãy nhập nhận xét!');
        return;}
     $.ajax({
            url: '/ajax/capnhat_chamdiem_ktra.php',
            type: 'POST',
            data: {
                list_diem:list_diem,
                nguoicham:nguoicham,
                doituong_dccham:doituong_dccham,
                phieu:phieu,
                nhanxet:nhanxet,
                tongdiem:tongdiem,
                 
            },
            success: function(data){
                    $('.popup_thanhcong').show();
                    $('.close_popup').click(function(){
                        window.location.href = '/phieudanhgia-de-kiemtra-nv-<?=$key_p?>.html';
                    })
                    
            }
        })
})

$('.js_hoanthanh').click(function(){
    var list_diem="";
    var co_co=0;
     $('.arr_tt_sp').each(function() {
        var data_id = $(this).parents('.cauhoi_chitiet').attr('data-id');
        list_diem+=$(this).val()+",";
        if ($(this).val()=="") {
            $(this).parents('.manhiput_tong').find('.red_tb').show();
            co_co=1;
            window.location.hash='#cauhoi_chitiet'+data_id+'';
        }
        else{
             $(this).parents('.manhiput_tong').find('.red_tb').hide();
        }
    })
     var nguoicham=<?=$_SESSION['ep_id']?>;
     var doituong_dccham=<?=$key_u?>;
     var phieu=<?=$key_p?>;
     var nhanxet=$('.nhanxet').val();
     var tongdiem=$('.tong_diem_d').val();

     if (co_co==1) {
        return;}
     if (nhanxet=="") {
        alert('Hãy nhập nhận xét!');
        return;}
     $('.pop_before').show();
     $('.js_done_ht').click(function(){
            $.ajax({
            url: '/ajax/hoanthanh_chamdiem_ktra.php',
            type: 'POST',
            data: {
                list_diem:list_diem,
                nguoicham:nguoicham,
                doituong_dccham:doituong_dccham,
                phieu:phieu,
                nhanxet:nhanxet,
                tongdiem:tongdiem,
                 
            },
            success: function(data){
                    $('.popup_thanhcong').show();
                    $('.close_popup_done').click(function(){
                        window.location.href = '/phieudanhgia-de-kiemtra-nv-<?=$key_p?>.html';
                    })
                    
            }
        })
     })
})
$(document).ready(function(){
    $('.arr_tt_sp').trigger('blur');
})
active_single_menu('phieu_menu');
</script>
</html>