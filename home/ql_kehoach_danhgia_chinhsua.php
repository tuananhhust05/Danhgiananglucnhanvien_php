<?

include('config.php');
if (!in_array(3, $quyen_kehoach)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
$key_kh = getValue("id","int","GET",0);
 $query= new db_query("SELECT * FROM kh_danhgia where kh_id = $key");
 $row = mysql_fetch_assoc($query->result);


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        .tim_theo_nv_dg_bo .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
        }
        .them_phong .select_no_muti .select2-container--default .select2-selection--single{
            border-radius: 10px !important;
        }
    </style>
    <title>Chỉnh sửa kế hoạch đánh giá</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>
    <div id="" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_ke_hoach_danh_gia.html'" class="c-pointer">Quản lý kế hoạch đánh giá <span> / </span><span> Chỉnh sửa </span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body main_body_1">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_ke_hoach_danh_gia.html'" class="c-pointer">Quản lý kế hoạch đánh giá <span> / </span><span> Chỉnh sửa </span></p>
                                </div>
                            </div>
                            <form action="" method="post" id="vi_du" onsubmit="return false">
                                <div class="container_them_buoc_dau">
                                    <div class="header_them_kehoach header_them_kehoach_buoc_dau">
                                        <div class="container_img_1">
                                            <div class="container_img ">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_4.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_2 display_none">
                                            <div class="container_img ">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right ">
                                                    <img src="../img/xanh_7.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_3 display_none">
                                            <div class="container_img ">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right ">
                                                    <img src="../img/xanh_4.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right ">
                                                    <img src="../img/xanh_7.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="them_buoc_dau">
                                        <div class="form body_ql_tieuchi">
                                            <div class="header_d width_100">
                                                <h4>Chỉnh sửa kế hoạch đánh giá</h4>
                                            </div>
                                            <div class="body width_100">
                                                <div class="container">
                                                    <div class="form_container form_container_3">
                                                        <div class="form_group width_50">
                                                            <label for="">Tên kế hoạch đánh giá<span
                                                                    class="color_red">*</span></label>
                                                            <input type="text" name="ten" class="ten_kh"
                                                                value="<?=$row['kh_ten']?>">
                                                        </div>
                                                        <div class="mot_nua d_flex space_b width_50">
                                                            <div class="form_group form_group_block  width_50">
                                                                <label for="">Người tạo</label>
                                                                <input type="text" name="nguoi_tao"
                                                                    value="<?php if ($row['kh_nguoitao']!=$row['id_congty']): ?><?=search($data_list_nv,'ep_id',$row['kh_nguoitao'])[0]['ep_name']?><?php endif ?><?php if ($row['kh_nguoitao']==$row['id_congty']): ?><?=search($cty,'com_id',$row['kh_nguoitao'])[0]['com_name']?><?php endif ?>">
                                                            </div>
                                                            <div class="form_group form_group_block width_50">
                                                                <label for="">Ngày tạo</label>
                                                                <input type="text" name="ngay_tao" value="<? 
                                                    $timestamp=$row['kh_ngaytao'];
                                                    echo(date("d/m/Y ", $timestamp)); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form_container">
                                                        <div class="form_group width_50">
                                                            <label for="">Chọn loại kế hoạch đánh giá<span
                                                                    class="color_red">*</span></label>
                                                            <div class="select_no_muti">
                                                                <select class="js_select_2" name="loai_de" id="loai_de">
                                                                    <option <? if($row['kh_loai']==1)echo "selected";?> value="1" >Đề đánh giá</option>
                                                                    <option <? if($row['kh_loai']==2)echo "selected";?> value="2" >Đề kiểm tra</option>
                                                                    <option <? if($row['kh_loai']==3)echo "selected";?> value="3" >Đề đánh giá và đề kiểm tra
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form_group width_50">
                                                            <label for="">Chọn hình thức kế hoạch lặp lại</label>
                                                            <div class="d_flex">
                                                                <div class="select_no_muti width_100  chon_lap ">
                                                                    <select class="js_select_2 lap_lai"  name="lap_lai">
                                                                        <option <? if($row['kh_laplai']==0)echo "selected";?> value="0">Không lặp lại</option>
                                                                        <option <? if($row['kh_laplai']==1)echo "selected";?> value="1">Lặp lại hàng ngày</option>
                                                                        <option <? if($row['kh_laplai']==2)echo "selected";?> value="2">Lặp lại hàng tuần</option>
                                                                        <option <? if($row['kh_laplai']==3)echo "selected";?> value="3">Lặp lại hàng tháng</option>
                                                                        <option <? if($row['kh_laplai']==4)echo "selected";?> value="4">Lặp lại hàng năm</option>
                                                                    </select>
                                                                </div>
                                                                <div class="select_no_muti width_50 thu hidden_tam">
                                                                    <select class="js_select_2 laplai_thu" name="" >
                                                                        <option <? if($row['kh_thu']==2)echo "selected";?> value="2">Thứ 2</option>
                                                                        <option <? if($row['kh_thu']==3)echo "selected";?> value="3">Thứ 3</option>
                                                                        <option <? if($row['kh_thu']==4)echo "selected";?> value="4">Thứ 4</option>
                                                                        <option <? if($row['kh_thu']==5)echo "selected";?> value="5">Thứ 5</option>
                                                                        <option <? if($row['kh_thu']==6)echo "selected";?> value="6">Thứ 6</option>
                                                                        <option <? if($row['kh_thu']==7)echo "selected";?> value="7">Thứ 7</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form_container form_container_4">
                                                        <div class="form_group">
                                                            <label for="">Ngày bắt đầu kế hoạch <span
                                                                    class="color_red">*</span></label>
                                                            <input type="date" name="ngay_batdau" class="ngay_bd"value="<? echo(date("Y-m-d", $row['kh_ngaybatdau'])); ?>">
                                                        </div>
                                                        <div class="form_group">
                                                            <label for="">Ngày kết thúc kế hoạch <span
                                                                    class="color_red">*</span></label>
                                                            <input type="date" name="ngay_ketthuc" class="ngay_kt" value="<?echo(date("Y-m-d", $row['kh_ngayketthuc'])); ?>">
                                                        </div>
                                                        <div class="form_group">
                                                            <label for="">Giờ bắt đầu đánh giá<span
                                                                    class="color_red">*</span></label>
                                                            <input type="time" class="gio_bd" name="gio_batdau" value="<?=$row['kh_giobatdau']?>">
                                                        </div>
                                                        <div class="form_group">
                                                            <label for="">Giờ kết thúc đánh giá<span
                                                                    class="color_red">*</span></label>
                                                            <input type="time" class="gio_kt" name="gio_ketthuc" value="<?=$row['kh_gioketthuc']?>">
                                                        </div>

                                                    </div>
                                                    <div class="form_group">
                                                        <label for="">Ghi chú</label>
                                                        <textarea id="editor1" name="ghi_chu" cols="80"
                                                            rows="10"><?=$row['kh_ghichu']?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn_de_danhgia_1 d_flex content_c mt_25">
                                                <div class="btn_huy btn btn_168 btn_trang mr_68">
                                                    Hủy
                                                </div>
                                                <div class="btn_tieptuc_1 btn btn_168 btn_xanh ">
                                                    <div class="d_flex align_c ">
                                                        <p class="mr_10">Tiếp tục</p>
                                                        <div class="img height_15">
                                                            <img src="../img/next_trang.png" alt="Tiếp tục">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container_them_buoc_2 display_none">
                                    <div class="header_them_kehoach header_them_kehoach_buoc_2" id="lo">
                                        <div class="container_img_1 display_none" id="lo1">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_2.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_2 display_none" id="lo2">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_8.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_3 display_none" id="lo3">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_2.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right ">
                                                    <img src="../img/xanh_7.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="them_danhgia_buoc2 display_none" id="lo4">
                                        <div class="body_them_kehoach">
                                            <div class="d_flex align_c color_blue mb_20 ">
                                                <h4 class="font_ss16 font_wB mr_10">Đề đánh giá năng lực:</h4>
                                                <div class="select_no_muti select_no_muti_2  select_no_muti_a ">
                                                    <select class="js_select_2 chonde_dg" name="loai_tc">
                                                        <option value="">Chọn đề đánh giá năng lực </option>
                                                        <?
                                                         $query= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and  id_congty = ".$usc_id." ");
                                                         $row_tc = $query->result_array();
                                                         foreach ($row_tc as $val):?>
                                                        <option <?if($row['kh_id_dg']==$val['dg_id'] ) echo "selected"; ?> value="<?=$val['dg_id']?>"><?=$val['dg_ten']?></option>
                                                        <? endforeach;?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="bang_tieuchi_danhgia mb_20">
                                                <div class="khoibang">
                                                    <div class="bangchung">
                                                        <table class="bangchinh tieu_chi ">
                                                            
                                                            <tr>
                                                                <th>
                                                                    <p class="phantucon">STT</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Tên tiêu chí</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Thang điểm</p>
                                                                </th>
                                                            </tr>
                                                            
                                                                
                                                            <tbody class="tc_dcchon">

                                                            </tbody>
                                                            <tbody class="tc_dcchon2 ">
                                                                <? 
                                                                $query= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and dg_id='".$row['kh_id_dg']."'  ");  
                                                                $rowcha_tc= mysql_fetch_assoc($query->result);
                                                                $str_id=explode(",",$rowcha_tc['dg_id_tieuchi']);
                                                                ?>

                                                                <? 
                                                                    foreach ($str_id as  $value) {
                                                                    $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                                    $row_cha = $db_qr->result_array();
                                                                ?>

                                                            <? foreach ($row_cha as $val) {
                                                                $stt ++;$s=$val['tcd_thangdiem'];$ss+=$s;
                                                              ?> 
                                                                <tr class="">
                                                                    <td>
                                                                        <p><?=$stt;?></p>
                                                                    </td>
                                                                    <td class="width_80">
                                                                        <div class="d_flex btn_soxuong">
                                                                            <p class="mr_10 font_w5"><?=$val['tcd_ten']?></p>
                                                                            <div class="img so_xoayt_<? echo $val['id'] ?>">
                                                                                <img src="../img/icon_so.png"
                                                                                    alt="Sổ xuống">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="font_w5"><?=$val['tcd_thangdiem']?></p>
                                                                    </td>
                                                                </tr>

                                                               <?
                                                                $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                                $row_c = $db_qr_c->result_array();

                                                                foreach ($row_c as $val) {
                                                                    $stt++;
                                                                ?>
                                                                <tr class="con_tieuchit_<? echo $val['tc_id_tonghop'] ?>">
                                                                    <td>
                                                                        <p><?=$stt;?></p>
                                                                    </td>
                                                                    <td class="width_80">
                                                                        <p class="text_a_l"><?=$val['tcd_ten']?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p><?=$val['tcd_thangdiem']?></p>
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
                                                            </tbody>
                                                            
                                                            <tbody class="tc_TONGDIEM">
                                                                <tr class="tongdiemtrc">
                                                                <td colspan="2">
                                                                    <p class="text_a_l font_w5">Tổng điểm
                                                                    </p>
                                                                </td>
                                                                <td class="font_w5"><?=$ss?></td>
                                                            </tr>
                                                            </tbody>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="body_ql_tieuchi phanloai_danhgia ">
                                                <div class="header_d width_100">
                                                    <h4>Phân loại đánh giá</h4>
                                                </div>
                                                <div class="pl_them_kh_dg">
                                                     
                                                </div>
                                                <div class="pl_them_kh_dg2">
                                                   <ul class="thongtin_tieuchi">
                                        <?
                                        $query_dg= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
   
                                         $row_dg = mysql_fetch_assoc($query_dg->result);
                                         if ($row_dg['dg_loai_macdinh']!="") $pl_dg= json_decode($row_dg['dg_loai_macdinh'], true);
                                         else $pl_dg= json_decode($row_dg['dg_phanloaikhac'], true);
                                            foreach ($pl_dg as $value) {
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

                                    <div class="them_kiemtra_buoc2 display_none" id="lo5">
                                        <div class="body_them_kehoach">
                                            <div class="d_flex align_c color_blue mb_20 ">
                                                <h4 class="font_ss16 font_wB mr_10">Đề kiểm tra năng lực:</h4>
                                                <div class="select_no_muti select_no_muti_2 select_no_muti_a ">
                                                    <select class="js_select_2 chon_dekiemtra chondkt_dkt" name="loai_tc">
                                                        <option value="">Chọn đề kiểm tra năng lực</option>
                                                        <?
                                                         $query= new db_query("SELECT * FROM de_kiemtra_cauhoi where is_delete=1 and  id_congty = ".$usc_id." ");
                                                         $row_tc = $query->result_array();
                                                         foreach ($row_tc as $val):?>
                                                        <option <?if($row['kh_id_kt']==$val['id'] ) echo "selected"; ?> value="<?=$val['id']?>"><?=$val['ten_de_kiemtra']?></option>
                                                        <? endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?
                                            $query_ch= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$row['kh_id_kt']."'");
                                             $row_ch = mysql_fetch_assoc($query_ch->result);
                                             $cauhoi= explode(',', $row_ch['danhsach_cauhoi']);
                                             if ($row_ch['phanloai_macdinh']!="") $pl= json_decode($row_ch['phanloai_macdinh'], true);
                                             else $pl= json_decode($row_ch['phanloaikhac'], true);
                                            ?>
                                        
                                        <div class="show_cauhoide">
                                                
                                        </div>
                                            <div class="body_ql_tieuchi phanloai_danhgia">
                                                <div class="header_d width_100">
                                                    <h4>Phân loại đánh giá</h4>
                                                </div>
                                                    <div class="pl_them_kh_dg_kt">
                                                        
                                                    </div>
                                                <div class="pl_them_kh_dg_kt2">
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

                                    <div class="btn_form_chip ">
                                        <div class="btn btn_168 btn_trang mr_68 btn_link_destr">
                                            Hủy
                                        </div>
                                        <div class="btn btn_168 btn_xanh mr_68 btn_quaylai_1">
                                            <div class="d_flex align_c ">
                                                <div class="img height_15 mr_10">
                                                    <img src="../img/pre_trang.png" alt="Quay lại">
                                                </div>
                                                <p>Quay lai</p>
                                            </div>
                                        </div>
                                        <div class="div_tieptuc btn_tieptuc_2">
                                            <div class="btn btn_168 btn_xanh ">
                                                <div class="d_flex align_c btn_tieptuc">
                                                    <p class="mr_10">Tiếp tục</p>
                                                    <div class="img height_15">
                                                        <img src="../img/next_trang.png" alt="Tiếp tục">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container_them_buoc_3 display_none">
                                    <div class="header_them_kehoach header_them_kehoach_buoc_3">
                                        <div class="container_img_3">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_2.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_8.png" alt="Bước 3">
                                                </div>
                                                <div class="img img_right img_xam">
                                                    <img src="../img/xanh_5.png" alt="Bước 4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="them_kiemtra_buoc3">
                                        <div class="body_them_kehoach">
                                            <div class="d_flex align_c color_blue mb_20 ">
                                                <h4 class="font_ss16 font_wB mr_10">Đề kiểm tra năng lực:</h4>
                                                <div class="select_no_muti select_no_muti_2 ">
                                                    <select class="js_select_2 chon_dekiemtra chondkt_th" name="loai_tc">
                                                        <option value="">Chọn đề kiểm tra năng lực</option>
                                                        <?
                                                         $query= new db_query("SELECT * FROM de_kiemtra where trangthai_xoa=1 and  id_congty = ".$usc_id." ");
                                                         $row_tc = $query->result_array();
                                                         foreach ($row_tc as $val):?>
                                                        <option <?if($row['kh_id_kt']==$val['kt_id'] ) echo "selected"; ?> value="<?=$val['kt_id']?>"><?=$val['kt_ten']?></option>
                                                        <? endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="hientruoc">
                                                <?php $stt=0; foreach ($cauhoi as  $value):$stt++; ?>
                                                <?php if ($value['type']==0): ?>
                                                <div class="cauhoi_chitiet cauhoi_chitiet_1 mb_20">
                                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$value['question']?></span> <span
                                                            class="font_s14 color_blue">(<?=$value['sodiem']?> điểm)</span></p>

                                                    <p class="font_s15 font_w5 mb_5"> Đáp án: </p>
                                                    <p class="font_s14"><?$dapan=$value['answer'];?>
                                                    <?php foreach ($dapan as  $dapan): ?>
                                                        <?=$dapan[0];?>
                                                    <?php endforeach ?></p>
                                                </div>
                                                <?php endif ?>

                                                <?php if ($value['type']==1): ?>
                                                <div class="cauhoi_chitiet cauhoi_chitiet_4 mb_20">
                                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$value['question']?></span> <span
                                                            class="font_s14 color_blue">( <?=$value['sodiem']?> điểm )</span></p>
                                                    <p class="font_s15 font_w5 mb_5"> Đáp án :</p><?$dapan2=$value['answer'];$dapan_dung=$value['answer_right']?>
                                                    <?php foreach ($dapan2 as $val_dapan2): ?>
                                                        <?php foreach ($val_dapan2 as $k => $val): ?>
                                                            <?php foreach ($dapan_dung as  $val_dapan_dung): ?>
                                                                <div class="d_flex align_c mb_20">
                                                                    <input <? if($val_dapan_dung[$k]==1) echo "checked";?> type="radio" name="drone<?=$stt?>" value="macdinh" class="mr_5">
                                                                    <label for="huey"><?=$val?></label>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endforeach ?>
                                                    <?php endforeach ?>
                                                </div>
                                                <?php endif ?>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="show_cauhoide">
                                                
                                            </div>
                                            <div class="body_ql_tieuchi phanloai_danhgia">
                                                <div class="header_d width_100">
                                                    <h4>Phân loại đánh giá</h4>
                                                </div>
                                               <div class="pl_them_kh_dg_kt">
                                                    
                                                </div>
                                                <div class="pl_them_kh_dg_kt2">
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
                                        <div class="btn_form_chip">
                                            <div class="btn btn_168 btn_trang mr_68 btn_link_destr">
                                                Hủy
                                            </div>
                                            <div class="btn btn_168 btn_xanh mr_68 btn_quaylai_2 ">
                                                <div class="d_flex align_c  ">
                                                    <div class="img height_15 mr_10">
                                                        <img src="../img/pre_trang.png" alt="Quay lại">
                                                    </div>
                                                    <p>Quay lai</p>
                                                </div>
                                            </div>
                                            <div class="div_tieptuc">
                                                <div class="btn btn_168 btn_xanh btn_tieptuc_3 ">
                                                    <div class="d_flex align_c">
                                                        <p class="mr_10">Tiếp tục</p>
                                                        <div class="img height_15">
                                                            <img src="../img/next_trang.png" alt="Tiếp tục">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="container_them_buoc_cuoi display_none">
                                    <div class="header_them_kehoach header_them_kehoach_buoc_cuoi">
                                        <div class="container_img_1 display_none">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_2.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_3.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_2 display_none">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_8.png" alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_3.png" alt="Bước 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_img_3 display_none">
                                            <div class="container_img">
                                                <div class="img">
                                                    <img src="../img/xanh_1.png" alt="Bước 1">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_2.png " alt="Bước 2">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_8.png" alt="Bước 3">
                                                </div>
                                                <div class="img img_right img_xanh">
                                                    <img src="../img/xanh_3.png" alt="Bước 4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="them_buoc_cuoi">
                                        <div class="d_flex space_b width_100 align_c color_blue mb_10">
                                            <div class="thiet_lap d_flex mb_20">
                                                <h4 class="color_blue font_wB font_ss16 mr_20">
                                                    Thiết lập phân loại đánh giá:
                                                </h4>
                                                <div class="container_thietlap">
                                                    <div class="d_flex align_c mr_30 <?if($row['kh_user_nv']==NULL) echo "hidden"; ?>">
                                                        <input type="radio" name="drone" 
                                                            value="1"  class="mr_5 check_dm" <?if($row['kh_user_nv']!=NULL) echo "checked"; ?> >
                                                        <label for="huey">Nhân viên </label>
                                                    </div>
                                                    <div class="<?if($row['kh_user_pb']==NULL) echo "hidden"; ?> d_flex align_c khonghien">
                                                        <input type="radio" name="drone" 
                                                          <?if($row['kh_user_pb']!=NULL) echo "checked"; ?>  value="2" class="mr_5 check_dm">
                                                        <label for="dewey">Phòng ban</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nhanvien <? if($row['kh_user_nv']==NULL) echo "display_none" ;?>" >
                                                <div class="d_flex align_c themmoi_nguoi cursor_p">
                                                    <div class="img  ">
                                                        <img src="../img/cong.png" alt="Thêm nhân viên">
                                                    </div>
                                                    <p class="font_s14 font_w5">Thêm nhân viên</p>
                                                </div>
                                            </div>
                                            <div class="phongban <? if($row['kh_user_pb']==NULL) echo "display_none" ;?> ">
                                                <div class="btn_themphongban d_flex align_c">
                                                    <div class="img themmoi_tieuchi ">
                                                        <img src="../img/cong.png" alt="Thêm tiêu chí">
                                                    </div>
                                                    <p class="font_s14 font_w5">Thêm phòng ban</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nhanvien <? if($row['kh_user_nv']==NULL) echo "display_none" ;?>">
                                            <div class="body_doituong body_doituong_nhan_danhgia">
                                                <div class="khoibang">
                                                    <div class="bangchung">
                                                        <table class="bangchinh tieu_chi">
                                                            <tr>   
                                                                <th>
                                                                    <p class="phantucon">Mã NV</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Họ tên</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Phòng ban</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Chức vụ</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Chức năng</p>
                                                                </th>
                                                            
                                                            <tbody class="op_sps ">
                                                                <?  $variable=explode(',',$row['kh_user_nv']);?>
                                                                <?if($row['kh_user_nv']!=NULL){?>
                                                                <?  foreach ($variable as $value): ?>
                                                                    <tr class="nv_danhgia show_trc"  >
                                                                  <td >
                                                                      <p class="chungchung"><?=$value;?></p>

                                                                  </td>
                                                                  <td>
                                                                    <div class="d_flex align_c">
                                                                        <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']!=""): ?>

                                                                        <div class="img mr_10 ">
                                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value)[0]['ep_image'];?>" alt="Người tạo">
                                                                        </div>
                                                                         <?php endif ?>

                                                                         <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']==""): ?>

                                                                        <div class="img mr_10 ">
                                                                            <img class="wh26_ra" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                                        </div>
                                                                         <?php endif ?>
                                                                        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                                  </td>
                                                                  <td>
                                                                    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                                      <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                                  </td>
                                                                  <td>
                                                                      <p id-nv='<?=$value?>' onclick="xoanv_danhgia(this)" class="color_red c-pointer">Xóa</p>
                                                                  </td>
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="phongban <? if($row['kh_user_pb']==NULL) echo "display_none" ;?>">
                                            <div class="body_doituong body_doituong_nhan_danhgia ">
                                                <div class="khoibang">
                                                    <div class="bangchung">
                                                        <table class="bangchinh tieu_chi">
                                                            <th style="width:20%;">
                                                                <p class="phantucon">Mã Phòng</p>
                                                            </th>
                                                            <th>
                                                                    <p class="phantucon">Phòng ban</p>
                                                                </th>
                                                                <th>
                                                                    <p class="phantucon">Chức năng</p>
                                                                </th>
                                                            <tbody class="pb_op">
                                                                 <?  $variable=explode(',',$row['kh_user_pb']);?>
                                                                <?if($row['kh_user_pb']!=NULL){?>
                                                                <? foreach ($variable as $value):?>
                                                                  <tr class="nv_danhgia3">
                                                                    <td><p class="chungchung"><?=$value?></p></td>
                                                                    <td>
                                                                        <p class="text_a_l "><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?></p>
                                                                    </td>
                                                                    <td>
                                                                         <p id-nv='<?=$value?>' onclick="xoanv_danhgia3(this)" class="color_red c-pointer">Xóa</p>
                                                                    </td>
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d_flex space_b width_100 align_c color_blue mb_10">
                                            <h4 class="font_ss16 font_wB">Người đánh giá:</h4>
                                            <div class="d_flex align_c themmoi_nguoi_danhgia cursor_p">
                                                <div class="img  ">
                                                    <img src="../img/cong.png" alt="Thêm tiêu chí">
                                                </div>
                                                <p class="font_s14 font_w5">Thêm người đánh giá</p>
                                            </div>
                                        </div>
                                        <div class="body_doituong body_doituong_nhan_danhgia">
                                            <div class="khoibang">
                                                <div class="bangchung">
                                                    <table class="bangchinh tieu_chi">
                                                        <tr>
                                                           
                                                            <th>
                                                                <p class="phantucon">Mã NV</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Họ tên</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Phòng ban</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Chức vụ</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Chức năng</p>
                                                            </th>
                                                        </tr>
                                                        
                                                        <tbody class="op_sps_dg">
                                                                <? $variable=explode(',',$row['kh_user_dg']);?>
                                                                <? foreach ($variable as $value): ?>
                                                                    <tr class="nv_danhgia2 show_trc"  >
                                                                  <td >
                                                                      <p class="chungchung"><?=$value;?></p>

                                                                  </td>
                                                                  <td>
                                                                    <div class="d_flex align_c">
                                                                        <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']!=""): ?>

                                                                        <div class="img mr_10 ">
                                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value)[0]['ep_image'];?>" alt="Người tạo">
                                                                        </div>
                                                                         <?php endif ?>

                                                                         <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']==""): ?>

                                                                        <div class="img mr_10 ">
                                                                            <img class="wh26_ra" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                                        </div>
                                                                         <?php endif ?>
                                                                        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                                  </td>
                                                                  <td>
                                                                    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                                      <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                                  </td>
                                                                  <td>
                                                                      <p id-nv='<?=$value?>' onclick="xoanv_danhgia2(this)" class="color_red c-pointer">Xóa</p>
                                                                  </td>
                                                                </tr>
                                                                <? endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn_form_chip">
                                            <div class="btn btn_168 btn_trang mr_68 btn_link_destr">
                                                Hủy
                                            </div>
                                            <div class="btn btn_168 btn_xanh mr_68 btn_quaylai_3 ">
                                                <div class="d_flex align_c ">
                                                    <div class="img height_15 mr_10">
                                                        <img src="../img/pre_trang.png" alt="Quay lại">
                                                    </div>
                                                    <p>Quay lai</p>
                                                </div>
                                            </div>
                                            <div class="div_tieptuc">
                                                <button type="submit" it_tong="<?=$row['kh_id']?>" class="btn  btn_168 btn_xanh luu_tong">
                                                    <div class="d_flex align_c ">
                                                        <p>Lưu</p>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="popup popup_680 popup_them_phong_nv_1 themnguoi_dg">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách nhân viên</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="select_no_muti">
                    <select class="js_select_2 chon_phongban " name="loai_tc">
                        <option value="0">Tất cả phòng ban </option>
                        <?foreach ($arr_dep as $value) {
                            ?>
                            <option value="<?=$value['dep_id']?>"><?=$value['dep_name']?></option>
                            <?
                        }?> 
                    </select>
                </div>
                <div class="select_no_muti thanh_search width_100 outline_none tim_theo_nv_dg_bo">
                    
                    <select class="search_item js_select_2 tim_theo_nv_dg font_s14 color_gray width_100 outline_none" name="loai_tc">
                        <option class="font_s14" value="">Tìm kiếm theo tên nhân viên </option>
                        <?foreach ($data_list_nv as $key => $value) {
                            ?>
                            <option class="font_s14" value="<?=$value['ep_id']?>"><?=$value['ep_id']?> - <?=$value['ep_name']?></option>
                            <?
                        }?> 
                    </select>
                    <span class="see_search"></span>
                </div>
                <form action="" method="POST" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Tên nhân viên</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Phòng ban</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Chức vụ</p>
                                                </th>
                                                <th><input onchange="check_all_check_ng_dg(this)" type="checkbox" class="checktong"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <tbody>
                                            
                                            <? $stt=0; foreach ($data_list_nv as $value): $stt++; ?>

                                            <tr class="nv_chung_ng_dg nv_id_ng_dg<?=$value['ep_id']?> nv_id_ng_dg_dep<?=$value['dep_id']?>">
                                                <td>
                                                    <p><?=$stt?></p>
                                                </td>
                                                <td>
                                                    <p><?=$value['ep_id']?> - <?=$value['ep_name']?></p>
                                                </td>
                                                <td>
                                                    <p><?=$value['dep_name']?></p>
                                                </td>
                                                <td>

                                                    <p><?=$array_cv[$value['position_id']]?></p>
                                                </td>
                                                <td>
                                                    <? 
                                                    $b=explode(',',$row['kh_user_dg']);
                                                ?>
                                                    <input <? if(in_array($value['ep_id'],$b)) echo "checked"; ?> type="checkbox" class="checkcon un_check_con2_<?=$value['ep_id']?>" value="<?=$value['ep_id'];?>">
                                                </td>
                                            </tr>

                                            <? endforeach ;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn">
                        <button class="btn btn_trang btn_140 mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 close_popup js_done2">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="popup popup_680 popup_them_phong_nv_1 themnv_dg">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách nhân viên</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="select_no_muti ">
                    <select class="js_select_2 chon_phongban" name="loai_tc">
                        <option value="0">Tất cả phòng ban </option>
                        <?foreach ($arr_dep as $value) {
                            ?>
                            <option value="<?=$value['dep_id']?>"><?=$value['dep_name']?></option>
                            <?
                        }?> 
                    </select>
                </div>
                <div class="select_no_muti thanh_search width_100 outline_none tim_theo_nv_dg_bo">
                    
                    <select class="search_item js_select_2 tim_theo_nv_dc_dg font_s14 color_gray width_100 outline_none" name="loai_tc">
                        <option class="font_s14" value="">Tìm kiếm theo tên nhân viên </option>
                        <?foreach ($data_list_nv as $key => $value) {
                            ?>
                            <option class="font_s14" value="<?=$value['ep_id']?>"><?=$value['ep_id']?> - <?=$value['ep_name']?></option>
                            <?
                        }?> 
                    </select>
                    <span class="see_search"></span>
                </div>
                <form action="" method="POST" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Tên nhân viên</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Phòng ban</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Chức vụ</p>
                                                </th>
                                                <th><input onchange="check_all_check(this)" type="checkbox" class="checktong"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">
                                        <tbody>

                                            <? $stt=0; foreach ($data_list_nv as $value): $stt++; ?>

                                            <tr class="nv_chung_dc_ng_dg nv_id_dc_ng_dg<?=$value['ep_id']?> nv_id_dc_ng_dg_dep<?=$value['dep_id']?>">
                                                <td>
                                                    <p><?=$stt?></p>
                                                </td>
                                                <td>
                                                    <p><?=$value['ep_id']?> - <?=$value['ep_name']?></p>
                                                </td>
                                                <td>
                                                    <p><?=$value['dep_name']?></p>
                                                </td>
                                                <td>

                                                    <p><?=$array_cv[$value['position_id']]?></p>
                                                </td>
                                                <td>
                                                <? 
                                                    $a=explode(',',$row['kh_user_nv']);
                                                ?>
                                                    <input <? if(in_array($value['ep_id'],$a)) echo "checked"; ?> type="checkbox" class="checkcon un_check_con_<?=$value['ep_id']?>" value="<?=$value['ep_id'];?>">
                                                </td>
                                            </tr>

                                            <? endforeach ;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_btn">
                        <button class="btn btn_trang btn_140 mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 close_popup js_done1">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

<div class="popup popup_680  popup_them_phong_nv them_phong">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách phòng ban</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="select_no_muti thanh_search width_100 outline_none tim_theo_nv_dg_bo">
                    
                    <select class="search_item js_select_2 tim_theo_pb font_s14 color_gray width_100 outline_none" name="loai_tc">
                        <option class="font_s14" value="">Tìm kiếm theo tên phòng ban </option>
                        <?foreach ($arr_dep as $key => $value) {
                            ?>
                            <option class="font_s14" value="<?=$value['dep_id']?>"><?=$value['dep_name']?></option>
                            <?
                        }?> 
                    </select>
                    <span class="see_search"></span>
                </div>
                <form action="" method="POST" onsubmit="return false">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Tên phòng ban</p>
                                                </th>
                                                <th><input onchange="check_all_check_pb(this)" type="checkbox" class="checktong"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh bang_tieuchi">
                                       <? $stt=0;foreach ($arr_dep as $value) { $stt++;?>
                                         <tr class="tm_phongban tm_phongban_id<?=$value['dep_id']?>">
                                                <td>
                                                    <p><?=$stt?></p>
                                                </td>
                                              
                                                <td>
                                                    <p><?=$value['dep_name']?></p>
                                                </td>
                                                
                                                <td>
                                                <? 
                                                $c=explode(',',$row['kh_user_pb']);
                                                ?>
                                                    <input <? if(in_array($value['dep_id'],$c)) echo "checked"; ?> type="checkbox" class="checkcon un_check_con3_<?=$value['dep_id']?>" value="<?=$value['dep_id'];?>">
                                                </td>
                                            </tr>
                                        <?}?> 
                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="popup_btn">
                        <button class="btn btn_trang btn_140 mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140 close_popup js_done3">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="popup popup_500 popup_xoa popup_xoa_tieuchi ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa tiêu chí</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1">Bạn có muốn huỷ thêm mới <span class="font_wB show_xoa_ten">Kế hoạch đánh giá ?</span></p>
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

<div class="popup popup_500 popup_thanhcong ">
    <div class="container">
        <div class="popup_body">
            <div class="img">
                <img src="../img/popup_1.png" alt="thành công ">
            </div>
            <p class="text_a_c ">Cập nhật kế hoạch <br>
             <span class="font_wB show_xoa_ten"></span> thành công! </p>
            <div class="popup_btn">
                <div class="btn btn_xanh close_popup back_list">
                    Đóng
                </div>
            </div>
        </div>
    </div>
</div>  

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
$('.btn_themphongban').click(function() {
    $('.them_phong').show();
})
$('.themmoi_nguoi').click(function() {
    $('.themnv_dg').show();
    
})
$('.themmoi_nguoi_danhgia').click(function() {
    $('.themnguoi_dg').show();
    
})

$('.js_select_2').select2({
    width: '100%',
})
CKEDITOR.replace('editor1', {
    height: '108'
});
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
$('#loai_de').change(function() {
    var de_kiemtra = $(this).val();
    if (de_kiemtra == 1) {
        $('.container_img_1').removeClass('display_none');
        $('.container_img_2').addClass('display_none');
        $('.container_img_3').addClass('display_none');
    }
    if (de_kiemtra == 2) {
        $('.container_img_1').addClass('display_none');
        $('.container_img_2').removeClass('display_none');
        $('.container_img_3').addClass('display_none');

    }
    if (de_kiemtra == 3) {
        $('.container_img_1').addClass('display_none');
        $('.container_img_2').addClass('display_none');
        $('.container_img_3').removeClass('display_none');
    }
})

$(".btn_tieptuc_1").click(function() {
    var ngay_bd=$('.ngay_bd').val();
    var ngay_kt=$('.ngay_kt').val();
    if (ngay_bd>ngay_kt) {
        alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
        return;
    }
    var vi_du = $("#vi_du");
    vi_du.validate({
        rules: {
            ten: {
                required: true,
            },
            ngay_batdau: {
                required: true,
            },
            ngay_ketthuc: {
                required: true,
            },
            gio_batdau: {
                required: true,
            },
            gio_ketthuc: {
                required: true,
            },

        },
        messages: {
            ten: {
                required: "Không để trống",
            },
            ngay_batdau: {
                required: "Không để trống",
            },
            ngay_ketthuc: {
                required: "Không để trống",
            },
            gio_batdau: {
                required: "Không để trống",
            },
            gio_ketthuc: {
                required: "Không để trống",
            },
        }
    });
    if (vi_du.valid() === true) {
        if ($('.container_them_buoc_dau').is(":visible")) {
            var loai_dg = $("#loai_de").val();
            if (loai_dg == 1) {
                current_fs = $('.container_them_buoc_dau');
                next_fs1 = $('.container_them_buoc_2');
                next_fs = $('.container_them_buoc_2 #lo #lo1');
                next_fs2 = $('.container_them_buoc_2 #lo4');
            } else if (loai_dg == 2) {
                current_fs = $('.container_them_buoc_dau');
                next_fs1 = $('.container_them_buoc_2');
                next_fs = $('.container_them_buoc_2 #lo #lo2');
                next_fs2 = $('.container_them_buoc_2 #lo5');
            } else if (loai_dg == 3) {
                current_fs = $('.container_them_buoc_dau');
                next_fs1 = $('.container_them_buoc_2');
                next_fs = $('.container_them_buoc_2 #lo #lo3');
                next_fs2 = $('.container_them_buoc_2 #lo4');
            }
        }
        next_fs1.removeClass("display_none");
        next_fs.removeClass("display_none");
        next_fs2.removeClass("display_none");
        current_fs.addClass('display_none');
        return false;
    }
})

$(".btn_tieptuc_2").click(function() {
    var loai_dg=$('#loai_de').val();
    var de_dg_id=$('.chonde_dg').val();

     var de_kt_id=$('.chondkt_dkt').val();
    if (de_dg_id==""&&(loai_dg==1||loai_dg==3)) {
        alert('Vui lòng chọn 1 đề đánh giá');
        return;
    }
    if (de_kt_id==""&&loai_dg==2) {
        alert('Vui lòng chọn 1 đề kiểm tra');
        return;
    }
    
    if ($('#lo #lo1').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_cuoi').removeClass('display_none');
        $('.container_them_buoc_cuoi .container_img_1').removeClass('display_none');
        $('.khonghien').removeClass('display_none');
    } else if ($('#lo #lo2').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_cuoi').removeClass('display_none');
        $('.khonghien').addClass('display_none');
        $('.container_them_buoc_cuoi .container_img_2').removeClass('display_none');
    } else if ($('#lo #lo3').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_3').removeClass('display_none');
    }
})

$(".btn_tieptuc_3").click(function() {
    var loai_dg=$('#loai_de').val();
    var de_kt_id=$('.chondkt_th').val();
    
    if (de_kt_id==""&&loai_dg==3) {
        alert('Vui lòng chọn 1 đề kiểm tra');
        return;
    }
    $('.container_them_buoc_3').addClass('display_none');
    $('.container_them_buoc_cuoi').removeClass('display_none');
    $('.khonghien').addClass('display_none');
    $('.container_them_buoc_cuoi .container_img_3').removeClass('display_none');
})

$(".btn_quaylai_3").click(function() {
    if ($('.container_them_buoc_cuoi .container_img_1').is(":visible")) {
        $('.container_them_buoc_2').removeClass('display_none');
        $('.container_them_buoc_cuoi').addClass('display_none');
        $('.container_them_buoc_2 #lo #lo1').removeClass('display_none');
        $('.container_them_buoc_2 #lo4').removeClass('display_none');

    } else if ($('.container_them_buoc_cuoi .container_img_2').is(":visible")) {
        $('.container_them_buoc_2').removeClass('display_none');
        $('.container_them_buoc_cuoi').addClass('display_none');
        $('.container_them_buoc_2 #lo #lo2').removeClass('display_none');
        $('.container_them_buoc_2 #lo5').removeClass('display_none');

    } else if ($('.container_them_buoc_cuoi .container_img_3').is(":visible")) {
        $('.container_them_buoc_cuoi').addClass('display_none');
        $('.container_them_buoc_3').removeClass('display_none');

    }
})

$(".btn_quaylai_2").click(function() {
    $('.container_them_buoc_3').addClass('display_none');
    $('.container_them_buoc_2').removeClass('display_none');
    $('.container_them_buoc_2 #lo #lo3').removeClass('display_none');
    $('.container_them_buoc_2 #lo4').removeClass('display_none');
})

$(".btn_quaylai_1").click(function() {
    if ($('.container_them_buoc_2 .container_img_1').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_2 #lo4').addClass('display_none');
        $('.container_them_buoc_dau').removeClass('display_none');

    } else if ($('.container_them_buoc_2 .container_img_2').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_dau').removeClass('display_none');
        $('.container_them_buoc_2 #lo5').addClass('display_none');
        $('.container_them_buoc_dau .container_img_2').removeClass('display_none');
        $('.container_them_buoc_dau .container_img_1').addClass('display_none');

    } else if ($('.container_them_buoc_2 .container_img_3').is(":visible")) {
        $('.container_them_buoc_2').addClass('display_none');
        $('.container_them_buoc_dau').removeClass('display_none');
        $('.container_them_buoc_dau .container_img_3').removeClass('display_none');
        $('.container_them_buoc_dau .container_img_1').addClass('display_none');
    }
})

$('input[type="radio"]').click(function() {
    if ($(this).val() == 1) {
        $('.nhanvien').removeClass('display_none');
        $('.phongban').addClass('display_none');
    } else if ($(this).val() == 2) {
        $('.nhanvien').addClass('display_none');
        $('.phongban').removeClass('display_none');
    }
})
$('.chonde_dg').change(function(){
    $('.tc_dcchon2').hide();
    var id=$(this).val();
   
    $.ajax({
            url: '/render/themmoi_kehoach.php',
            type: 'POST',
            data: {
                id:id,
            },
            success: function(data){   
                
            $('.tc_dcchon').html(data);
            $('.tongdiemtrc').remove();
            }
        }); 
})

$('.chonde_dg').change(function(){
    var id=$(this).val();
   $('.pl_them_kh_dg2').hide();
    $.ajax({
            url: '/render/themmoi_kehoach_dgia_pl.php',
            type: 'POST',
            data: {
                id:id,
            },
            success: function(data){   
                
            $('.pl_them_kh_dg').html(data);
            }
        }); 
})
$(document).ready(function(){
    $('.chon_dekiemtra').trigger('change');
})
$('.chon_dekiemtra').change(function(){
    var id_kt=$(this).val();
    $.ajax({
            url: '/render/themmoi_kehoach_kt_ch.php',
            type: 'POST',
            data: {
                id_kt:id_kt,
            },
            success: function(data){   
                
            $('.show_cauhoide').html(data);
            
            }
        }); 
})
$('.chon_dekiemtra').change(function(){
    var id_kt=$(this).val();
   $('.pl_them_kh_dg_kt2').hide();
   
    $.ajax({
            url: '/render/themmoi_kehoach_dgia_ktpl.php',
            type: 'POST',
            data: {
                id_kt:id_kt,
            },
            success: function(data){   
                
            $('.pl_them_kh_dg_kt').html(data);
            }
        }); 
})
$('.themnv_dg .chon_phongban').change(function(){//chọn nv theo phòng ban của người đc đánh giá
    var dep_id=$(this).val();
    $('.nv_chung_dc_ng_dg').hide();
    $('.checktong').hide();
    $('.nv_id_dc_ng_dg_dep'+dep_id+'').show();
    if (dep_id==0) {
        $('.nv_chung_dc_ng_dg').show();
        $('.checktong').show();
    }
    
})
$('.themnguoi_dg .chon_phongban').change(function(){//chọn nv theo phòng ban của người đi đánh giá
    var dep_id=$(this).val();
    var dep_id=$(this).val();
    $('.nv_chung_ng_dg').hide();
    $('.checktong').hide();
    $('.nv_id_ng_dg_dep'+dep_id+'').show();
    if (dep_id==0) {
        $('.nv_chung_ng_dg').show();
        $('.checktong').show();
    }
})
function check_all_check(th){
    if ($(th).is(':checked')) {
        $(th).parents('.themnv_dg').find('.checkcon').prop('checked', true);
    }
    else
         $(th).parents('.themnv_dg').find('.checkcon').prop('checked', false);
} 
function check_all_check_ng_dg(th){
    if ($(th).is(':checked')) {
        $(th).parents('.themnguoi_dg').find('.checkcon').prop('checked', true);
    }
    else
         $(th).parents('.themnguoi_dg').find('.checkcon').prop('checked', false);
} 
function check_all_check_pb(th){
    if ($(th).is(':checked')) {
        $(th).parents('.them_phong').find('.checkcon').prop('checked', true);
    }
    else
         $(th).parents('.them_phong').find('.checkcon').prop('checked', false);
} 

$('.js_done1').on("click",function () {
    $('.nv_danhgia').remove();
    var str_id="";
    
    $('.themnv_dg .checkcon').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+",";
       }
    });
    var str_id_nv="";   
    $('.op_sps .chungchung').each(function(){
        str_id_nv+=$(this).text()+",";
    })
    if (str_id=="") {
        alert("Bạn chưa chọn nhân viên nào");
        return;
    }
          $.ajax({
            url: '/render/themmoi_kehoach_dgia_them_nv.php',
            type: 'POST',
            data: {
                str_id:str_id,
                str_id_nv:str_id_nv,
            },
            
            success: function(data){
               
                $('.op_sps').append(data);
            }
        }); 
   
    });

$('.js_done2').on("click",function () {
    $('.nv_danhgia2').remove();
    var str_id="";
    $('.themnguoi_dg .checkcon').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+",";  
       }
    });
     var str_id_nv="";   
    $('.op_sps_dg .chungchung').each(function(){
        str_id_nv+=$(this).text()+",";
    })
    if (str_id=="") {
        alert("Bạn chưa chọn nhân viên nào");
        return;
    }
          $.ajax({
            url: '/render/themmoi_kehoach_dgia_them_nv2.php',
            type: 'POST',
            data: {
                str_id:str_id,
                str_id_nv:str_id_nv,
            },
            success: function(data){   
                $('.op_sps_dg').append(data);
            }
        }); 
   
    });

$('.js_done3').on("click",function () {
    $('.nv_danhgia3').remove();
    var str_id="";
    $('.them_phong .checkcon').each(function(){
        if ($(this).is(":checked")) {
            str_id+=$(this).val()+",";
       }
    });
    var str_id_pb="";   
    $('.pb_op .chungchung').each(function(){
        str_id_pb+=$(this).text()+",";
    })
    if (str_id=="") {
        alert("Bạn chưa chọn phòng ban nào");
        return;
    }
          $.ajax({
            url: '/render/themmoi_kehoach_dgia_pb_dgia.php',
            type: 'POST',
            data: {
                str_id:str_id,
                str_id_pb:str_id_pb,
            },
            success: function(data){   
                $('.pb_op').append(data);
            }
        }); 
   
    });
function xoanv_danhgia(th){
    $(th).parents('.nv_danhgia') .remove();
    var id=$(th).attr('id-nv');
    $('.un_check_con_'+id+'').prop('checked',false);
}function xoanv_danhgia2(th){
    $(th).parents('.nv_danhgia2') .remove();
    var id=$(th).attr('id-nv');
    $('.un_check_con2_'+id+'').prop('checked',false);
}function xoanv_danhgia3(th){
    $(th).parents('.nv_danhgia3') .remove();
    var id=$(th).attr('id-nv');
    $('.un_check_con3_'+id+'').prop('checked',false);
}

$('.btn_link_destr').click(function(){
    $('.popup_xoa_tieuchi').show();
    $('.js_done_xoa').click(function(){
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html";
    })
    

})

$('.luu_tong').click(function(){
    var it_tong=$(this).attr('it_tong');
    var ten_kh=$('.ten_kh').val();
    var loai_dg=$('#loai_de').val();
    var lap_lai=$('.lap_lai').val();
    var laplai_thu=$('.laplai_thu').val();
    var ngay_bd=$('.ngay_bd').val();
    var ngay_kt=$('.ngay_kt').val();
    var gio_bd=$('.gio_bd').val();
    var gio_kt=$('.gio_kt').val();  
    var ghi_chu= CKEDITOR.instances['editor1'].getData() ; 
    
    var de_dg_id=$('.chonde_dg').val();

    var de_kt_id=$('.chon_dekiemtra').val();
    var de_kt_id_th=$('.chondkt_th').val();
    var check_nv_or_pb=$('.check_dm:checked').val();
   
    var nhan_vien="";
    $('.op_sps .chungchung').each(function(){
        nhan_vien+=$(this).text()+",";
    })
    var phong_ban="";
    $('.pb_op .chungchung').each(function(){
        phong_ban+=$(this).text()+",";
    })
    var nguoi_danhgia="";
    $('.op_sps_dg .chungchung').each(function(){
        nguoi_danhgia+=$(this).text()+",";
    })


    if (check_nv_or_pb==1) {
        if (nhan_vien=="") {
            alert("Chọn ít nhất một nhân viên");
            return;
        }
        if (nguoi_danhgia=="") {
            alert("Chọn ít nhất một người đánh giá");
            return;
        }
    }if (check_nv_or_pb==2){
        if (phong_ban=="") {
            alert("Chọn ít nhất một phòng ban");
            return;
        }
        if (nguoi_danhgia=="") {
            alert("Chọn ít nhất một người đánh giá");
            return;
        }
    }
    
    $('.show_xoa_ten').text(ten_kh);

    $.ajax({
            url: '/ajax/capnhat_kehoach.php',
            type: 'POST',
            data: {
                it_tong:it_tong,
                ten_kh:ten_kh,
                loai_dg:loai_dg,
                lap_lai:lap_lai,
                laplai_thu:laplai_thu,
                ngay_bd:ngay_bd,
                ngay_kt:ngay_kt,
                gio_bd:gio_bd,
                gio_kt:gio_kt,
                de_dg_id:de_dg_id,
                de_kt_id:de_kt_id,
                de_kt_id_th:de_kt_id_th,
                check_nv_or_pb:check_nv_or_pb,
                nhan_vien:nhan_vien,
                phong_ban:phong_ban,
                nguoi_danhgia:nguoi_danhgia,
                ghi_chu:ghi_chu,
                
            },
            success: function(data){   
           
                $('.popup_thanhcong').show();
                $('.back_list').click(function(){
                    window.location.href = '/quan_ly_ke_hoach_danh_gia_chi_tiet_<?=$key_kh?>.html';
                })
            }
        }); 
})


    <?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
$rowjs = $query->result_array();
foreach ($rowjs as $val) {
?>

$(".so_xoayt_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchit_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
              
<?
}
?>
$('.lap_lai').change(function(){
    var gt=$(this).val();
    if (gt==2) {
        $('.thu').show();
        $('.chon_lap').addClass('width_50');
        $('.chon_lap').addClass('right20');
        $('.chon_lap').removeClass('width_100');
    }else{
        $('.thu').hide();
        $('.chon_lap').removeClass('width_50');
        $('.chon_lap').removeClass('right20');
        $('.chon_lap').addClass('width_100');
    }
})
active_single_menu('kehoach_menu');


$('.tim_theo_nv_dg').change(function(){
    var id_nv=$(this).val();
    $('.nv_chung_ng_dg').hide();
    $('.checktong').hide();
    $('.nv_id_ng_dg'+id_nv+'').show();
    if (id_nv=="") {
        $('.nv_chung_ng_dg').show();
        $('.checktong').show();
    }
})
$('.tim_theo_nv_dc_dg').change(function(){
    var id_nv=$(this).val();
    $('.nv_chung_dc_ng_dg').hide();
    $('.checktong').hide();
    $('.nv_id_dc_ng_dg'+id_nv+'').show();
    if (id_nv=="") {
        $('.nv_chung_dc_ng_dg').show();
        $('.checktong').show();
    }
})
$('.tim_theo_pb').change(function(){
    var id_pb=$(this).val();
    $('.tm_phongban').hide();
    $('.checktong').hide();
    $('.tm_phongban_id'+id_pb+'').show();
    if (id_pb=="") {
        $('.tm_phongban').show();
        $('.checktong').show();
    }
})
</script>
</html>