<?php
include "config.php";
$id = getValue("id","int","GET",0);
$query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$id."'");
$value = mysql_fetch_assoc($query->result);
 

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_ts.xls");
header("Pragma: no-cache");
header("Expires: 0");




?>
<table border="1px solid black">
<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Thông tin đề đánh giá <?=$value['dg_ten']?></th></tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Tên đề đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['dg_ten']?></td>
</tr>

<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Người tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
        if($value['dg_nguoitao']==$value['id_congty']) {
            echo search($cty,'com_id',$value['dg_nguoitao'])[0]['com_name'];
        }
        else{
            echo search($data_list_nv,'ep_id',$value['dg_nguoitao'])[0]['ep_name'];
        }
     ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ngày tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
                                                    $timestamp=$value['dg_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Thang diểmm:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['dg_thangdiem_id']?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Số tiêu chí:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?$dem=explode(",",$value["dg_id_tieuchi"]);
                                            $dem_vip=count($dem);
                                            echo $dem_vip;?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ghi chú:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['dg_ghichu']?></td>
</tr>
</table>

<?
include('config.php');
$key = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
     if ($row['dg_loai_macdinh']!="") $pl= json_decode($row['dg_loai_macdinh'], true);
     else $pl= json_decode($row['dg_phanloaikhac'], true);
?>
<div class="d_flex space_b width_100 align_c color_blue mb_20">
                                <h4 class="font_ss16 font_wB">Tiêu chí đánh giá</h4>
                            </div>

                           
                                        <table border="1px solid black" class="bangchinh tieu_chi">
                                            <tr>
                                                <th  style="height:40px;vertical-align: middle;">
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th  style="height:40px;vertical-align: middle;">
                                                    <p class="phantucon">Tên tiêu chí</p>
                                                </th>
                                                <th  style="height:40px;vertical-align: middle;">
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
                                                    <td style="font-size:18px;height:40px;vertical-align: middle;text-align: center;">
                                                        <p><?=$stt?></p>
                                                    </td>
                                                    <td style="height:40px;vertical-align: middle;" class="width_60">
                                                        <div class="d_flex btn_soxuong">
                                                            <p class="mr_10 font_w5"><? echo $val['tcd_ten'];?></p>
                                                        
                                                        </div>
                                                    </td>
                                                    <td  style="height:40px;vertical-align: middle;">
                                                        <p><? echo $val['tcd_thangdiem'];$tong+=$val['tcd_thangdiem']?></p>
                                                    </td>

                                                </tr>

                                                <?$sttt=0;
                                                $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row_con = $db_qr_c->result_array();

                                                foreach ($row_con as $key => $val) {
                                                    $sttt++;
                                                    ?>
                                                <tr class="  con_tieuchit_<? echo $val['tc_id_tonghop'];?>">
                                                    <td style="height:40px;vertical-align: middle;text-align: center;">
                                                        <p><?=$stt?>.<?=$sttt?></p>
                                                    </td>
                                                    <td style="height:40px;vertical-align: middle;" class="width_60">
                                                        <p class="text_a_l"><? echo $val['tcd_ten'];?></p>
                                                    </td>
                                                    <td style="height:40px;vertical-align: middle;">
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
                                                <td style="height:40px;vertical-align: middle;text-align: center;" colspan="2">
                                                    <p class="text_a_l font_w5">Tổng điểm
                                                    </p>
                                                </td>
                                                <td style="height:40px;vertical-align: middle;text-align: center;" class="font_w5"><? echo $tong;?></td>
                                            </tr>
                                        </table>
                                  

                            <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                <div class="header_d width_100">
                                        <h4>Phân loại đánh giá</h4>
                                </div>
                                <div class="body width_100">
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
                                                ?>:<span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                        <span><?=$value[1]?></span>
                                                    </p>
                                                </li>
                                                <?
                                            }
                                        ?>
                                    </ul>