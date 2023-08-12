<?
include('config.php');
if (!in_array(1, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
     if ($row['dg_loai_macdinh']!="") $pl= json_decode($row['dg_loai_macdinh'], true);
     else $pl= json_decode($row['dg_phanloaikhac'], true);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Chi tiết đề đánh giá năng lực</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                                <div class="d_flex"> <a href='/quan_ly_tieu_chi_nang_luc.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" class="c-pointer">Đề đánh giá năng lực<span> / </span><span> chi tiết </span></p>
                                </div>

                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi">
                                <div class="title_header ">
                                    <div class="d_flex"> <a href='/quan_ly_tieu_chi_nang_luc.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" class="c-pointer">Đề đánh giá năng lực<span> / </span><span> chi tiết </span></p>
                                    </div>
                                </div>
                                <div class="d_flex align_c flex_end mb_20">
                                    <div class="btn_header_ql_tieuchi  btn_header_ql_tieuchi_a d_flex">
                                        <?php if (in_array(4, $quyen_tieuchi)): ?>
                                        <div class="btn_xoade">
                                            <div class="btn btn_trang xoa mr_15">
                                                <p class="color_blue">Xóa đề đánh giá</p>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <div class="sua_excel d_flex">
                                            <?php if (in_array(3, $quyen_tieuchi)): ?>
                                            <a href="/quan_ly_tieu_chi_nang_luc_chinh_sua_<? echo $row['dg_id'];?>.html" class="btn sua">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_but.png" alt="Chỉnh sửa">
                                                </div>
                                                <p>Chỉnh sửa</p>
                                            </a>
                                            <?php endif ?>
                                            <a href="/Excel/de_dg.php?id=<?=$key_ex?>">
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
                            </div>

                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="header_d width_100">
                                    <h4>Thông tin đề đánh giá năng lực</h4>
                                </div>
                                <div style="overflow-x: auto;" class="body width_100">
                                    <ul class="thongtin_tieuchi">
                                        <li class="item">
                                            <p>Tên đề đánh giá:</p>
                                            <p><?=$row['dg_ten']?></p>
                                        </li>
                                        <li class="item ">
                                            <p>Người tạo:</p>
                                            <div class="d_flex flex_start center-height width_100">
                                                    <?php if ($row['dg_nguoitao']==$row['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row['dg_nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['dg_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row['dg_nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$row['dg_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row['dg_nguoitao']!=$row['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row['dg_nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img mr_10 ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['dg_nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row['dg_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$row['dg_nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                </div>
                                        </li>
                                        <li class="item">
                                            <p>Ngày tạo:</p>
                                            <p><? 
                                                $timestamp=$row['dg_ngaytao'];
                                                echo(date("d/m/Y", $timestamp)); ?></p>
                                        </li>
                                        <li class="item">
                                            <p>Số điểm:</p>
                                            
                                               <p><?=$row['dg_thangdiem_id']?></p> 
                                            
                                        </li>
                                        <li class="item">
                                            <p>Số tiêu chí:</p>
                                            <p><?
                                            $dem=explode(",",$row["dg_id_tieuchi"]);
                                            $dem_vip=count($dem);
                                            echo $dem_vip;
                                            ?>
                                            </p>
                                        </li>
                                        <li class="item ghi_chu">
                                            <p>Ghi chú:</p>
                                                
                                            <p class="font-14"><? 
                                            if ($row['dg_ghichu']=="") {
                                                echo "—";
                                            }else echo $row['dg_ghichu']?></p>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="d_flex space_b width_100 align_c color_blue mb_20">
                                <h4 class="font_ss16 font_wB">Tiêu chí đánh giá</h4>
                            </div>

                            <div class="bang_tieuchi_danhgia mb_20">
                                <div class="khoibang">
                                    <div class="bangchung">
                                        <table class="bangchinh tieu_chi">
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Tên tiêu chí</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Số điểm</p>
                                                </th>
                                           
                                            <?
                                            $str_id=explode(",",$row["dg_id_tieuchi"]);
                                            foreach ($str_id as $key => $value) {
                                                $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row_cha = $db_qr->result_array();
                                            ?>

                                                <?  foreach ($row_cha as $key => $val) { $stt++;?> 
                                                 <tr class="cha_tieuchim_<? echo $val['id'];?> ">
                                                    <td >
                                                        <p><?=$stt?></p>
                                                    </td>
                                                    <td class="width_60">
                                                        <div class="d_flex btn_soxuong">
                                                            <p class="mr_10 font_w5"><? echo $val['tcd_ten'];?></p>
                                                            <div class="img so_xoay so_xoayt_<? echo $val['id'];?>">
                                                                <img src="../img/icon_so.png" alt="Sổ xuống">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p><? echo $val['tcd_thangdiem'];$tong+=$val['tcd_thangdiem']?></p>
                                                    </td>

                                                </tr>

                                                <?
                                                $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row_con = $db_qr_c->result_array();

                                                foreach ($row_con as $key => $val) {
                                                    $sttt++;
                                                    ?>
                                                <tr class="  con_tieuchit_<? echo $val['tc_id_tonghop'];?>">
                                                    <td>
                                                        <p><?=$stt?>.<?=$sttt?></p>
                                                    </td>
                                                    <td class="width_60">
                                                        <p class="text_a_l"><? echo $val['tcd_ten'];?></p>
                                                    </td>
                                                    <td>
                                                        <p><? echo $val['tcd_thangdiem'];?></p>
                                                    </td>
                                                    
                                                </tr>

                                                <?
                                                }
                                                ?>

                                                <?
                                                } 
                                                ?>

                                                <?
                                                }
                                                ?>
                                            <tr>
                                                <td colspan="2">
                                                    <p class="text_a_l font_w5">Tổng điểm
                                                    </p>
                                                </td>
                                                <td class="font_w5"><? echo $tong;?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                <div class="header_d width_100">
                                        <h4>Phân loại đánh giá</h4>
                                </div>
                                <div style="overflow-x: auto;" class=" body width_100">
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
    <!-- popup xóa -->
    <div class="popup popup_500 popup_xoa ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa đề đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa đề đánh giá </br><span class="font_wB">
                            Đề đánh giá 1</span> ?</p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_xoa">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup xóa-->
</body>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
    <?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and tcd_trangthai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
$rowjs = $query->result_array();
foreach ($rowjs as $key => $val) {
?>

$(".so_xoayt_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchit_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
              
<?
}
?>

</script>
<script>
$('input[type="radio"]').click(function() {
    if ($(this).val() == "macdinh") {
        $('.phanloai_danhgia_macdinh').show();
        $('.phanloai_danhgia_khac').hide();
    } else {
        $('.phanloai_danhgia_macdinh').hide();
        $('.phanloai_danhgia_khac').show();
    }
})
$('.btn_xoade').click(function() {
    $('.popup_xoa').show();
})
$('.js_done_xoa').click(function(){
    var id_tc=<?=$key_ex?>;
        $.ajax({
            url: '/ajax/capnhat_de_danhgia.php',
            type: 'POST',
            data: {
                id_tc:id_tc, 
            },
            success: function(data){   
            alert('Xoá đề đánh giá thành công');
            window.location.href='/quan_ly_tieu_chi_nang_luc.html';
            }
        }); 
    })
$('.js_select_2').select2({
    width: '100%'
})

<?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2");
$row = $query->result_array();
foreach ($row as $key => $val) {
?>

$(".so_xoay_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchi_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
<?
}
?>
<?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2");
$row = $query->result_array();
foreach ($row as $key => $val) {
?>

$(".so_xoaypop_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchipop_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
<?
}
?>
active_single_menu('tc_tong');
active_single_menu_con('de_danhgia_menu');
</script>

</html>