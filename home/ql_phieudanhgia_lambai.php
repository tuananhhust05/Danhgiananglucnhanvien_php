<?
include "config.php" ;
$keyy = getValue("id","int","GET",0);
$key = getValue("id","int","GET",0);
$query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
     $ngay_batdau=date('d-m-Y',$row['phieu_ngay_bd']);
     $ngay_kethuc=date('d-m-Y',$row['phieu_ngay_kt']);

$qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
     $row_kh = mysql_fetch_assoc($qr->result);
     $gio_batdau=$row_kh['kh_giobatdau'];
     $gio_kethuc=$row_kh['kh_gioketthuc'];

     $kh_evalu=explode(',',$row_kh['kh_user_dg']);
     $kh_member=explode(',',$row_kh['kh_user_nv']);
     if (!in_array($_SESSION['ep_id'], $kh_member)&&!in_array($_SESSION['ep_id'], $kh_evalu)&&$_SESSION['quyen']!=1) {
         header("Location: /quanly-phieudanhgia.html");
     }

$query= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$row_kh['kh_id_kt']."'");
$row = mysql_fetch_assoc($query->result);
$cauhoi= explode(',',$row['danhsach_cauhoi']);
shuffle($cauhoi);
?>

<?
$datebd=date_create("$ngay_batdau $gio_batdau");
$datebd=date_format($datebd,"d-m-Y H:i");

$datekt=date_create("$ngay_kethuc $gio_kethuc");
$datekt=date_format($datekt,"d-m-Y H:i");

$time_limit_start=strtotime($datebd);
$time_limit_end=strtotime($datekt);

?>
<?
$q_pq = new db_query("SELECT * FROM tbl_cautraloi WHERE id_congty = '".$usc_id."' AND ma_nv = '".$_SESSION['ep_id']."' and phieu_id ='".$keyy."' ");
$num_trl = mysql_fetch_assoc($q_pq->result); 
$list_traloi=json_decode($num_trl['cau_traloi'],true) ;
// echo"<pre>";print_r($list_traloi);echo"</pre>";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        input[type="radio"] { 
 outline: none;
 cursor: pointer;
  }
.right-5{
    margin-right: 5px;
}
    </style>
    <title>Làm bài</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <link rel="stylesheet" type="text/css" href="../css/manh.css">
    
</head>

<body>
    <div class="lambai">
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
                                        <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / làm bài kiểm tra</p>
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
                                            <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / làm bài kiểm tra</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($num_trl['trangthai_lam']!=1): ?>
                                <div class="time_limit" >
                                    <div class="d_flex" id="timer">
                                        <span id="days"></span> <span class="right-5">Ngày</span> 
                                        <span id="hours"></span> <span class="right-5">giờ </span>
                                        <span id="minutes"></span> <span class="right-5">phút</span> 
                                        <span id="seconds"></span> <span class="right-5">giây</span>
                                      
                                    </div><p class="manh"></p>
                                </div>
                               <?php endif ?>
                                <p >Thời gian bắt đầu làm bài: <span class="color_blue font-medium"><?=date('H:i , m-d-Y',$time_limit_start) ?></span></p><br>
                                <p >Thời gian kết thúc làm bài: <span class="color_blue font-medium"><?=date('H:i , m-d-Y',$time_limit_end) ?></span></p><br>
                            <form action="" method="post" id="frm_lambai" onsubmit="return false">
                                <?php $stt=0; foreach ($cauhoi as  $value):$stt++; 
                                    $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value."'");
                                    $info = mysql_fetch_assoc($query->result);
                                    $dapan=json_decode($info['dap_an'], true);
                                    $img_cauhoi=json_decode($info['img_cauhoi'], true);
                                ?>

                                <div data-id='<?=$stt?>' id="cauhoi_chitiet<?=$stt?>" class="cauhoi_chitiet mb_20 ">
                                    <input type="text" class="loaicauhoi hidden" value="<?=$info['hinhthuc']?>">
                                    <input type="text" class="id_cauhoi hidden" value="<?=$info['id']?>">

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

                                    <p class="font-500 chuden mb_20">Câu trả lời</p>
                                    
                                    <?php if ($info['hinhthuc']==1): ?>
                                        <div class="form_group ">
                                            <div class="text_dat">
                                                <textarea  name="" cols="80" rows="10" class="dap_an_dangtuluan"><?php foreach ($list_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id']): ?><?=$list_traloi_val['cautraloi']?><?php endif ?><?php endforeach ?></textarea>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <?php if ($info['hinhthuc']==2): ?>
                                            <?php $ra=0; foreach ($dapan as  $value):$ra++; ?>
                                                <div class="d_flex align_start mb_20">
                                                    <input <?php foreach ($list_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id'] && $list_traloi_val['cautraloi']==$value['answer'][0] ): ?><?echo "checked";?><?php endif ?><?php endforeach ?> type="radio" name="tracnghiem<?=$info['id']?>" value="<?=$value['answer'][0]?>" class="mr_5 dap_an_dangtracnghiem" id='cauhoi_tracnghiem<?=$info['id']?>_<?=$ra?>'>
                                                    <label style="width: 90%;" class="c-pointer" for="cauhoi_tracnghiem<?=$info['id']?>_<?=$ra?>"><?=$value['answer'][0]?></label>
                                                </div>
                                            <?php endforeach ?>
                                    <?php endif ?>

                                    <?php if ($info['hinhthuc']==3): ?>
                                            <?php $ch_b=0; foreach ($dapan as  $value):$ch_b++; ?>
                                                <div class="d_flex align_c mb_20">
                                                    <input <?php foreach ($list_traloi as $list_traloi_val): ?><?php if ($list_traloi_val['id_cauhoi']==$info['id'] && in_array($value['answer'][0],$list_traloi_val['cautraloi'])): ?><?echo "checked";?><?php endif ?><?php endforeach ?> id="huey_checkbox<?=$stt;?>_<?=$ch_b;?>"  type="checkbox" name="hopkiem_<?=$info['id'];?>[]" value="<?=$value['answer'][0]?>" class="mr_5">
                                                    <label class="c-pointer" for="huey_checkbox<?=$stt;?>_<?=$ch_b;?>"><?=$value['answer'][0]?></label>
                                                </div>
                                            <?php endforeach ?>
                                    <?php endif ?>
                                <p class="red_tb">Không được để trống</p>
                                </div>
                                <?php endforeach ?>
                                
                                <div class="form_btn d_flex content_c mt_25">
                                    <button class="btn btn_trang btn_168 mr_60 js_huy ">Hủy</button>
                                    <?php if ($num_trl['trangthai_lam']==0): ?>
                                        
                                    <button type="button" class="btn btn_xanh btn_xanh_luu  btn_168 mr_60 outline_none hieuung">Lưu</button>
                                    <button type="button" class="btn btn_xanhluc btn_xanhluc_hoanthanh btn_168 outline_none hieuung">Hoàn thành </button>

                                    <button type="button" class="btn_xanhluc_hoanthanh2 hidden">Hoàn thành2 </button>
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
<div class="popup popup_500 popup_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Cập nhật bài kiểm tra thành công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup back">
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
                    <h4 class="name_header">Hoàn thành bài kiểm tra</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1 "><span class="font_wB">Bạn có chắc chắn muốn hoàn thành bài kiểm tra ?</span> </br>
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
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js">
</script>
<script>
    <?php if ($num_trl['trangthai_lam']!=1): ?>
var x = setInterval(function() {
    var endTime = new Date("<?=date('d M Y H:i',$time_limit_end)?> GMT+07:00");  
    // var endTime = new Date("23 May 2022 9:05:00 GMT+07:00");  
                
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400); 
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#seconds").html(seconds);
    
        if (timeLeft <= 0) {
            clearInterval(x);
            $('.manh').text('Hết giờ làm bài');
            $('#timer').hide();
            $('.btn_xanhluc_hoanthanh2').click();
          }
    }, 1000);
<?php endif ?>
$('.js_select_2').select2({
    width: '100%'
})

$('.btn_xanh_luu').click(function(){      
    let key = 0;
    var arr_update = [];
    var dem=$('.cauhoi_chitiet');
    
        for (let  t = 0; t < dem.length; t++) {
            var type = dem.eq(t).find('.loaicauhoi').val();
            var id_cauhoi = dem.eq(t).find('.id_cauhoi').val();

            if (type==1)  var answer = dem.eq(t).find('.dap_an_dangtuluan').val();
            if (type==2) {
                if (dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']").is(':checked') )
                var answer = dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']:checked").val();  
                else answer="";   
            } 
            if (type==3) 
                var answer = [];
                dem.eq(t).find("input[name='hopkiem_"+id_cauhoi+"[]']:checked").each(function(i){
                  answer[i] = $(this).val();
                });
            
            arr_update[key] = {};
            arr_update[key].id_cauhoi = id_cauhoi;
            arr_update[key].cautraloi = answer;
            key++;
        }
    var mang_trl=JSON.stringify(arr_update);
    var id_nv=<?=$_SESSION['ep_id']?>;
    var phieu=<?=$keyy?>;
    $.ajax({
            url: '/ajax/them_cautraloi_dektra.php',
            type: 'POST',
            data: {
                mang_trl:mang_trl, 
                id_nv:id_nv, 
                phieu:phieu, 
            },
            success: function(data){
                
                $('.popup_thanhcong').show();
            }
        });          
})

$('.btn_xanhluc_hoanthanh').click(function(){
    let key = 0;
    var arr_update = [];
    var dem=$('.cauhoi_chitiet');
        for (let  t = 0; t < dem.length; t++) {
            var type = dem.eq(t).find('.loaicauhoi').val();
            var id_cauhoi = dem.eq(t).find('.id_cauhoi').val();
            var data_id = dem.eq(t).attr('data-id');

            if (type==1) {
                var answer = dem.eq(t).find('.dap_an_dangtuluan').val();
                if (answer==""){
                    dem.eq(t).find('.red_tb').show();
                    window.location.hash='#cauhoi_chitiet'+data_id+'';
                } 
                if (answer!=""){
                    dem.eq(t).find('.red_tb').hide();
                } 
            } 
            if (type==2) {
                if (dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']").is(':checked') ){
                    var answer = dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']:checked").val();  
                    dem.eq(t).find('.red_tb').hide();
                }
                else{
                    answer="";
                    dem.eq(t).find('.red_tb').show();
                    window.location.hash='#cauhoi_chitiet'+data_id+'';
                }  
            } 
            if (type==3) 
                var answer = [];
                dem.eq(t).find("input[name='hopkiem_"+id_cauhoi+"[]']:checked").each(function(i){
                  answer[i] = $(this).val();
                });
                if(answer.length == 0){
                    dem.eq(t).find('.red_tb').show();
                    window.location.hash='#cauhoi_chitiet'+data_id+'';
                }
            
            arr_update[key] = {};
            arr_update[key].id_cauhoi = id_cauhoi;
            arr_update[key].cautraloi = answer;
            key++;
        }
     var mang_trl=JSON.stringify(arr_update);
     var id_nv=<?=$_SESSION['ep_id']?>;
     var phieu=<?=$keyy?>;
     var update=1;

     $('.pop_before').show();

     $('.js_done_ht').click(function(){   
        $.ajax({
            url: '/ajax/them_cautraloi_dektra.php',
            type: 'POST',
            data: {
                mang_trl:mang_trl, 
                id_nv:id_nv, 
                phieu:phieu,
                update:update,  
            },
            success: function(data){
                $('.popup_thanhcong').show();
            }
        })   
     })
})

$('.btn_xanhluc_hoanthanh2').click(function(){
    let key = 0;
    var arr_update = [];
    var dem=$('.cauhoi_chitiet');
        for (let  t = 0; t < dem.length; t++) {
            var type = dem.eq(t).find('.loaicauhoi').val();
            var id_cauhoi = dem.eq(t).find('.id_cauhoi').val();

            if (type==1) {
                var answer = dem.eq(t).find('.dap_an_dangtuluan').val();
                if (answer!=""){
                    dem.eq(t).find('.red_tb').hide();
                } 
            } 
            if (type==2) {
                if (dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']").is(':checked') ){
                    var answer = dem.eq(t).find("input[name='tracnghiem"+id_cauhoi+"']:checked").val();  
                    dem.eq(t).find('.red_tb').hide();
                }
                else{
                    answer="";
                }  
            } 
            if (type==3) 
                var answer = [];
                dem.eq(t).find("input[name='hopkiem_"+id_cauhoi+"[]']:checked").each(function(i){
                  answer[i] = $(this).val();
                });
            
            arr_update[key] = {};
            arr_update[key].id_cauhoi = id_cauhoi;
            arr_update[key].cautraloi = answer;
            key++;
        }
     var mang_trl=JSON.stringify(arr_update);
     var id_nv=<?=$_SESSION['ep_id']?>;
     var phieu=<?=$keyy?>;
     var update=1;
    $.ajax({
        url: '/ajax/them_cautraloi_dektra.php',
        type: 'POST',
        data: {
            mang_trl:mang_trl, 
            id_nv:id_nv, 
            phieu:phieu,
            update:update,  
        },
        success: function(data){
            alert('Hết giờ làm bài.Hệ thống đã tự động lưu câu trả lời của bạn');
            location.reload();
        }
    })   
})

$('.back').click(function(){
    window.location.href = '/phieudanhgia-lambai-<?=$keyy?>.html';
})
$('.js_huy').click(function(){
    window.location.href = '/phieudanhgia-de-kiemtra-nv-<?=$keyy?>.html';
})
active_single_menu('phieu_menu');
</script>
</html>