<?
include('config.php');
if (!in_array(1, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM tbl_tieuchi where id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Chi tiết tiêu chí đánh giá</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>

    <div id="ql_tieuchi_chitiet" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_tieu_chi_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách tiêu chí đánh giá <span> / </span><span> Chi tiết</span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi">
                                <div class="title_header">
                                    <div class="d_flex"> <a href='/quan_ly_tieu_chi_danh_gia.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/quan_ly_tieu_chi_danh_gia.html'" class="c-pointer">Danh sách tiêu chí đánh giá <span> / </span><span> Chi tiết</span></p>
                                    </div>
                                </div>
                                <div class="d_flex align_c flex_end mb_20">
                                    <div class="btn_header_ql_tieuchi d_flex">
                                        <?php if (in_array(3, $quyen_tieuchi)): ?>
                                        <a href="/quan_ly_tieu_chi_danh_gia_chinh_sua_<?=$key?>.html" class="btn sua">
                                            <div class="img mr_12">
                                                <img src="../img/icon_but.png" alt="Chỉnh sửa">
                                            </div>
                                            <p>Chỉnh sửa</p>
                                        </a>
                                        <?php endif ?>
                                        <a href="/Excel/tieuchi.php?idtc=<?=$key?>">
                                        <div class="btn excel">
                                            <div class="img mr_12">
                                                <img src="../img/icon_excel.png" alt="File excel">
                                            </div>
                                            <p>Xuất excel</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet">
                                <div class="header_d width_100">
                                    <h4>Thông tin tiêu chí</h4>
                                </div>
                                <div style="overflow-x: auto;" class="body width_100">
                                    <ul class="thongtin_tieuchi">
                                        <li class="item">
                                            <p>Tên tiêu chí:</p>
                                            <p><?= $row['tcd_ten'];?></p>
                                        </li>
                                        <li class="item">
                                            <p>Loại tiêu chí:</p>
                                            <p><? if ($row['tcd_loai']==1) 
                                                echo "Tiêu chí đơn"; else echo "Tiêu chí tổng hợp";
                                            ?></p>
                                        </li>

                                        <li class="item <? if ($row['tcd_loai']==2) echo "hidden";?>">
                                            <p>Tiêu chí cha:</p>
                                            <? 
                                        $query2= new db_query("SELECT * FROM tbl_tieuchi  ");
                                        $row2 = $query2->result_array();
                                            ?>
                                            <p><?=search($row2,'id',$row['tc_id_tonghop'])[0]['tcd_ten']?></p>
                                        </li>

                                        <li class="item">
                                            <p>Trạng thái:</p>
                                            <p> <label class="switch_tatmo">
                                                    <input type="checkbox" disabled <? if($row['tcd_trangthai']==2) echo "checked";?>>
                                                    <span class="slider round"></span>
                                                </label></p>
                                        </li>
                                        <li class="item <? if($row['tcd_nguoitao']!=1) echo "hidden";?>">
                                            <p>Người tạo:</p>
                                            <p> Mặc định</p>
                                        </li>
                                        <li class="item <? if($row['tcd_nguoitao']==1) echo "hidden";?>">
                                            <p>Người tạo:</p>
                                            <div class="d_flex flex_start center-height width_100">
                                                    <?php if ($row['tcd_nguoitao']==$row['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img mr_10 ">
                                                            <img  class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$row['tcd_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row['tcd_nguoitao']!=$row['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img mr_10 ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$row['tcd_nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                </div>
                                        </li>
                                        <li class="item">
                                            <p>Ngày tạo:</p>
                                            <p><? 
                                                    $timestamp=$row['tcd_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                        </li>
                                        <li class="item">
                                            <p>Số điểm:</p>
                                            <p><?=$row['tcd_thangdiem']?></p>
                                        </li>
                                        <li class="item ">
                                            <p>Ghi chú:</p>
                                                
                                            <p><?if ($row['tcd_ghichu']=="") {
                                                echo'___';
                                            }?><?=$row['tcd_ghichu']?></p>
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
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%',
})
active_single_menu('tc_tong');
active_single_menu_con('tieuchi_menu');
</script>

</html>