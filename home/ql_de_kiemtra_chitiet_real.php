<?
include('config.php');
if (!in_array(1, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};

$key = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);

     $cauhoi= explode(',',$row['danhsach_cauhoi']);
     if ($row['phanloai_macdinh']!="") $pl= json_decode($row['phanloai_macdinh'], true);
     else $pl= json_decode($row['phanloaikhac'], true);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Chi tiết quản lý đề kiểm tra năng lực nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
        input[type="radio"],input[type="checkbox"] { 
         outline: none;
         cursor: pointer;
         pointer-events: none;
          }
		.thongtin_tieuchi .ghi_chu {
		    padding: 17px 20px 20px 20px;
		}
        @media (max-width: 480px){
            .btn_header_ql_tieuchi .btn_xoade {
                display: flex;
                justify-content: flex-end;
                 margin-top: 0px;
                 margin-right: 20px; 
            }
            .btn_header_ql_tieuchi_a {
                flex-direction: unset;
                justify-content: unset;
            }
            .btn_header_ql_tieuchi .sua {
                background: #4C5BD4;
                margin-right: 0px;
            }
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
                            <div class="title_header ">
                                <div class="d_flex">
                                    <a href='/de-kiem-tra.html' class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra năng lực<span> / </span><span> chi tiết </span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi">
                                <div class="title_header ">
                                    <div class="d_flex">
                                        <a href='/de-kiem-tra.html' class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra năng lực<span> / </span><span> chi tiết </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d_flex align_c flex_end mb_20">
                                    <div class="btn_header_ql_tieuchi  btn_header_ql_tieuchi_a d_flex">
                                         <?php if (in_array(4, $quyen_tieuchi)): ?>
                                        <div class="btn_xoade" data-id="<? echo $row['id'];?>" data-name="<? echo $row['ten_de_kiemtra'];?>" >
                                            <div class="btn btn_trang xoa mr_15">
                                                <p class="color_blue">Xóa đề đánh giá</p>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <div class="sua_excel d_flex">
                                             <?php if (in_array(3, $quyen_tieuchi)): ?>
                                            <a  href="/chinh-sua-de-kiem-tra-<?=$row['id']?>.html" class="btn sua">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_but.png" alt="Chỉnh sửa">
                                                </div>
                                                <p>Chỉnh sửa</p>
                                            </a>
                                            <?php endif ?>
                                            <!-- <div class="btn excel">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_excel.png" alt="File excel">
                                                </div>
                                                <p>Xuất excel</p>
                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="header_d width_100">
                                    <h4>Thông tin đề kiểm tra năng lực nhân viên</h4>
                                </div>
                                <div style="overflow-x: auto;" class="body width_100">
                                    <ul class="thongtin_tieuchi">
                                        <li class="item">
                                            <p>Hình thức đề kiểm tra:</p>
                                            <p><?
                                                if ($row['kt_loai']==1) echo 'Trắc nghiệm';
                                                if ($row['kt_loai']==2) echo 'Tự luận';
                                                if ($row['kt_loai']==3) echo 'Trắc nghiệm và Tự luận';
                                                ?>
                                            </p>
                                        </li>
                                        <li class="item">
                                            <p>Tên đề kiểm tra:</p>
                                            <p><?= $row['ten_de_kiemtra'];?></p>
                                        </li>
                                        <li class="item">
                                            <p>Người tạo:</p>
                                            <div class="d_flex flex_start  width_100">
                                                <?php if ($row['nguoitao']==$row['id_congty']): ?>
                                                    <div class="d_flex align_c">
                                                        <div class="img mr_10">
                                                             <img onerror="this.src='https://chamcong.timviec365.vn/images/ep_logo.png'" class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['nguoitao'])[0]['com_logo'];?>"  alt="Người tạo">
                                                        </div>
                                                        <p class="width_100"><?=search($cty,'com_id',$row['nguoitao'])[0]['com_name']?></p>
                                                    </div>
                                                <?php endif ?>

                                                <?php if ($row['nguoitao']!=$row['id_congty']): ?>
                                                    <div class="d_flex align_c">
                                                        <div class="img mr_10">
                                                             <img onerror="this.src='https://chamcong.timviec365.vn/images/ep_logo.png'" class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                        </div>
                                                        <p class="width_100"><?=search($data_list_nv,'ep_id',$row['nguoitao'])[0]['ep_name']?></p>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <p>Ngày tạo:</p>
                                            <p><? 
                                                    $timestamp=$row['ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                        </li>
                                        <li class="item">
                                            <p>Thang điểm:</p>
                                            <p><?=$row['ch_thangdiem']?></p>
                                        </li>
                                        <li class="item">
                                            <p>Số câu hỏi:</p>
                                            <p><?echo count($cauhoi);?></p>
                                        </li>
                                        <li class="item ghi_chu">
                                            <p>Ghi chú:</p>
                                            <p class="one_line2"><?=$row['ghichu']?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="font_ss16 font_wB chuxanh mb_20">Danh sách câu hỏi</h4>
                            <?php $stt=0; foreach ($cauhoi as  $value):$stt++; 
                            	$query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value."'");
								$info = mysql_fetch_assoc($query->result);
								$dapan=json_decode($info['dap_an'], true);
								$img_cauhoi=json_decode($info['img_cauhoi'], true);
                            ?>

                            <div class="cauhoi_chitiet cauhoi_chitiet_1 mb_20">
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
                                        <p><?=$info['dap_an']?></p>
                                <?php endif ?>

                                <?php if ($info['hinhthuc']==2): ?>
                                        <?php foreach ($dapan as  $value): ?>
                                            <div class="d_flex align_start mb_20">
                                                <input <?if($value['answer_right'][0]==1)echo 'checked' ?> type="radio" name="tracnghiem<?=$stt?>" value="" class="mr_5">
                                                <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                            </div>
                                        <?php endforeach ?>
                                <?php endif ?>

                                <?php if ($info['hinhthuc']==3): ?>
                                        <?php foreach ($dapan as  $value): ?>
                                            <div class="d_flex align_start mb_20">
                                                <input readonly <?if($value['answer_right'][0]==1)echo 'checked' ?> type="checkbox" name="hopkiem[]" value="" class="mr_5">
                                                <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                            </div>
                                        <?php endforeach ?>
                                <?php endif ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                <div class="header_d width_100">
                                        <h4>Phân loại đánh giá</h4>
                                </div>
                                 <div style="overflow-x: auto;" class="body width_100">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class="popup popup_500 popup_xoa ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa đề kiểm tra năng lực nhân viên</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa bài kiểm tra năng lực nhân viên <span class="font_wB show_xoa_ten"></span> ?</p>
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
                <p  class="text_a_c ">Xóa đề kiểm tra <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div onclick="window.location.href = '/de-kiem-tra.html';" class="popup_btn">
                    <div class="btn btn_xanh close_popup close_popup_done">
                        Đóng
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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
    $('.btn_xoade').click(function() {
    var id_tc = $(this).attr('data-id');
    var name_tc = $(this).attr('data-name');
    $('.js_done_xoa').attr('data-id',id_tc);
    $('.popup_xoa').show();
    $('.show_xoa_ten').text(name_tc);
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/capnhat_de_kiemtra.php',
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
    active_single_menu('kt_tong');
    active_single_menu_con('de_kt_menu');
</script>
</html>