<?
include('config.php');
if (!in_array(1, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};

$key = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);

$query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$key."'");
$info = mysql_fetch_assoc($query->result);
$dapan=json_decode($info['dap_an'], true);
$img_cauhoi=json_decode($info['img_cauhoi'], true);

$query= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id_congty='".$usc_id."'");
$row = $query->result_array();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
    @media (max-width: 480px){
        .btn_header_ql_tieuchi_a {
    flex-direction: unset !important;
    justify-content: flex-end;
}
.btn_header_ql_tieuchi .btn_xoade {
    display: flex;
    justify-content: flex-end;
    margin-top: 0px !important;
    margin-right: 20px;
}
    }

        input[type="radio"],input[type="checkbox"] { 
         outline: none;
         cursor: pointer;
         pointer-events: none;
          }

    </style>
    <title>Chi tiết quản lý đề kiểm tra năng lực nhân viên</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
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
                                    <a href='/danh-sach-cau-hoi.html' class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/danh-sach-cau-hoi.html'" class="c-pointer">Chi tiết câu hỏi<span> / </span><span> Chi tiết </span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi">
                                <div class="title_header ">
                                    <div class="d_flex">
                                        <a href='/quan_ly_de_kiem_tra_nang_luc.html' class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/danh-sach-cau-hoi.html'" class="c-pointer">Chi tiết câu hỏi<span> / </span><span> Chi tiết </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d_flex align_c flex_end mb_20">
                                    <div class="btn_header_ql_tieuchi  btn_header_ql_tieuchi_a d_flex">
                                         <?php if (in_array(4, $quyen_kiemtra)): ?>
                                        <div class="btn_xoade">
                                            <div class="btn btn_trang xoa mr_15">
                                                <p class="color_blue">Xóa câu hỏi</p>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <div class="sua_excel d_flex">
                                             <?php if (in_array(3, $quyen_kiemtra)): ?>
                                            <a href="/chinh-sua-cau-hoi-<?=$info['id'];?>.html" class="btn sua hieuung">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_but.png" alt="Chỉnh sửa">
                                                </div>
                                                <p>Chỉnh sửa</p>
                                            </a>
                                            <?php endif ?>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="header_d width_100">
                                    <h4>Thông tin câu hỏi</h4>
                                </div>
                                <div style="overflow-x: auto;" class="body width_100">
                                    <ul class="thongtin_tieuchi">
                                        <li class="item">
                                            <p>Hình thức câu hỏi:</p>
                                            <p>
                                                <?
                                                if ($info['hinhthuc']==1) echo 'Câu trả lời'; 
                                                if ($info['hinhthuc']==2) echo 'Trắc nghiệm'; 
                                                if ($info['hinhthuc']==3) echo 'Hộp kiểm'; 
                                                ?>
                                            </p>
                                        </li>
                                        <li class="item">
                                            <p>Loại câu hỏi:</p>
                                            <p><?=search($row,'id',$info['loai'])[0]['ten_loai']?></p>
                                        </li>
                                        <li class="item">
                                            <p>Số điểm:</p>
                                            <p><?=$info['sodiem']?></p>
                                        </li>
                                        <li class="item">
                                            <p>Thời gian thực hiện:</p>
                                            <p><?=$info['thoigian_thuchien']?> phút</p>
                                        </li>
                                        <li class="item">
                                            <p>Câu hỏi:</p>
                                            <div style="width: 100%;font-size: 14px;">
                                            <?=$info['cauhoi']?>
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
                                            </div>
                                        </li>
                                        
                                        <?php if ($info['hinhthuc']==1): ?>
                                            <li class="item">
                                                <p >Đáp án:</p>
                                                <p><?=$info['dap_an']?></p>
                                                
                                            </li>
                                        <?php endif ?>

                                        <?php if ($info['hinhthuc']==2): ?>
                                            <li class="item">
                                                <p style="width: 200px;">Đáp án:</p>
                                                <div style="margin-left: 0px;width: 80%;">
                                                <?php foreach ($dapan as  $value): ?>
                                                    <div style="" class="d_flex align_start mb_20">
                                                        <input <?if($value['answer_right'][0]==1)echo 'checked' ?> type="radio" name="tracnghiem" value="" class="mr_5">
                                                        <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                                    </div>
                                                <?php endforeach ?>
                                                </div>
                                            </li>
                                        <?php endif ?>

                                        <?php if ($info['hinhthuc']==3): ?>
                                            <li class="item">
                                                <p style="width: 200px;">Đáp án:</p>
                                                <div style="margin-left: -53px;">
                                                <?php foreach ($dapan as  $value): ?>
                                                    <div class="d_flex align_start mb_20">
                                                        <input readonly <?if($value['answer_right'][0]==1)echo 'checked' ?> type="checkbox" name="hopkiem[]" value="" class="mr_5">
                                                        <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                                    </div>
                                                <?php endforeach ?>
                                                </div>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="header_d width_100">
                                    <h4>Thông tin hệ thống</h4>
                                </div>
                                <div style="overflow-x: auto;" class="body width_100">
                                    <ul class="thongtin_tieuchi">
                                        <li class="item">
                                            <p>Người cập nhật:</p>
                                            <div class="d_flex flex_start  width_100">
                                                    <div class="d_flex align_c">
                                                        <?php if ($info['congty_or_nv']==1): ?>
                                                            <div class="img  ">
                                                            <img onerror="this.src='../img/ep_logo.png';" class="wh26_ra right-10" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$info['nguoi_capnhat'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <p class="one_line"><?=search($cty,'com_id',$info['nguoi_capnhat'])[0]['com_name']?></p>
                                                        <?php endif ?>

                                                     <?php if ($info['congty_or_nv']!=1): ?>
                                                            <div class="img mr_10 ">
                                                                <img onerror="this.src='../img/ep_logo.png'"  class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$info['nguoi_capnhat'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <p><?=search($data_list_nv,'ep_id',$info['nguoi_capnhat'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </div>
                                        </li>
                                        <li class="item">
                                            <p>Ngày cập nhật:</p>
                                            <p><?=date('H:i - d/m/Y',$info['created_at'])?></p>
                                        </li>
                                    </ul>
                                </div>
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
                    <h4 class="name_header">Xóa câu hỏi</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa câu hỏi này <span class="font_wB show_xoa_ten"></span> ?</p>
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
                <p class="text_a_c ">Xóa câu hỏi <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div onclick="window.location.href='/danh-sach-cau-hoi.html'" class="popup_btn">
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
    active_single_menu('kt_tong');
    active_single_menu_con('dsch_menu');
    $('.btn_xoade').click(function(){
        $('.popup_xoa').show();
    })
    $('.js_done_xoa').click(function(){
        var id_tc=<?=$info['id']?>;
        $.ajax({
            url: '/ajax/del_cauhoi.php',
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
   
    $('.js_select_2').select2({
        width: '100%',
    })
</script>
</html>