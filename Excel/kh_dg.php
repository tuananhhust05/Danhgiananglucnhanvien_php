<?php
include "config.php";
$id = getValue("id","int","GET",0);
$query= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$id."'");
$value = mysql_fetch_assoc($query->result);
 

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_kh_dg.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>
<table border="1px solid black">
<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Thông tin kế hoạch đánh giá</th></tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Tên kế hoạch đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['kh_ten']?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Loại đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? if($value['kh_loai']==1) echo "Đề đánh giá";
                                                      elseif($value['kh_loai']==2) echo "Đề kiểm tra"; 
                                                      elseif($value['kh_loai']==3) echo "Đề đánh giá và Đề kiểm tra"; 
                                                ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Người tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
        if($value['kh_nguoitao']==$value['id_congty']) {
            echo search($cty,'com_id',$value['kh_nguoitao'])[0]['com_name'];
        }
        else{
            echo search($data_list_nv,'ep_id',$value['kh_nguoitao'])[0]['ep_name'];
        }
     ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ngày tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
                                                    $timestamp=$value['kh_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></td>
</tr>


<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ghi chú:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['kh_ghichu']?></td>
</tr>
</table>
<br>
<br>
<?
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
if (!in_array(1, $quyen_kehoach)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
$keyy = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);

     $query_ch= new db_query("SELECT * FROM de_kiemtra where kt_id = '".$row['kh_id_kt']."'");
     $row_ch = mysql_fetch_assoc($query_ch->result);
     $cauhoi= json_decode($row_ch['mang_cauhoi'], true);
     $dem_so_ch=count($cauhoi);
     
     if ($row_ch['kt_phanloai_macdinh']!="") $pl= json_decode($row_ch['kt_phanloai_macdinh'], true);
     else $pl= json_decode($row_ch['kt_phanloai_khac'], true);

     $query_dg= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
   
     $row_dg = mysql_fetch_assoc($query_dg->result);
     if ($row_dg['dg_loai_macdinh']!="") $pl_dg= json_decode($row_dg['dg_loai_macdinh'], true);
     else $pl_dg= json_decode($row_dg['dg_phanloaikhac'], true);
?>
                            <!-- pHẦN ĐỀ KIỂM TRA -->
                                    <?php if ($row_ch>0): ?>
                                        <h4 class="show_de font_ss16 font_wB cursor_p">
                                            <?
                                            $query= new db_query("SELECT kt_ten FROM de_kiemtra where kt_id = '".$row['kh_id_kt']."'");
                                            $de_kt = mysql_fetch_assoc($query->result);
                                            echo $de_kt['kt_ten'];    
                                            ?>
                                        </h4>
                                        <?php $stt=0; foreach ($cauhoi as  $value):$stt++; ?>
                                 
                                            <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$value[0]?></span> <span
                                                    class="font_s14 color_blue">(<?=$value[1]?> điểm)</span></p>

                                            <p class="font_s15 font_w5 mb_5"> Đáp án: </p>
                                            <p class="font_s14"><?=$value[2]?></p>
                                     
                                        <?php endforeach ?>
                                        <h4>Phân loại đánh giá</h4>
                                        <ul class="thongtin_tieuchi">
                                            <?
                                                foreach ($pl as $value) {
                                                    ?>
                                                    <li class="item">
                                                        <?
                                                        if($value[2]==1)echo "Yếu";
                                                        if($value[2]==2)echo "Trung bình";
                                                        if($value[2]==3)echo "Khá";
                                                        if($value[2]==4)echo "Giỏi";
                                                        if($value[2]==5)echo "Xuất sắc";
                                                    ?>:
                                                        <span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                            <span><?=$value[1]?></span>
                                                     
                                                    </li>
                                                    <?
                                                }
                                            ?>
                                        </ul>
                                    <?php endif ?>
                                   <?php if ($row_dg>0): ?>
                                            <h4 class="show_de font_ss16 font_wB cursor_p">
                                                <?
                                                $query= new db_query("SELECT dg_ten FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
                                                $de = mysql_fetch_assoc($query->result);
                                                echo $de['dg_ten'];    
                                                ?>
                                            </h4>
                                     

                                     
                                                <table border="1px solid black" class="bangchinh tieu_chi">
                                                    <tr>
                                                        <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                            <p class="phantucon">STT</p>
                                                        </th>
                                                        <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                            <p class="phantucon">Tên tiêu chí</p>
                                                        </th>
                                                        <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>
                                                    </tr>
                                                       <? 
                                                            $query= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and dg_id='".$row['kh_id_dg']."'  ");  
                                                            $rowcha_tc= mysql_fetch_assoc($query->result);
                                                            $str_id=explode(",",$rowcha_tc['dg_id_tieuchi']);
                                                            ?>

                                                            <? $stt=0; 
                                                                foreach ($str_id as $key => $value) {
                                                                $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                                $row_cha = $db_qr->result_array();
                                                            ?>

                                                        <? foreach ($row_cha as $key => $val) {
                                                            $stt ++;
                                                          ?> 
                                                            <tr class="">
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                    <p><?=$stt;?></p>
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" class="">
                                                                   
                                                                        <p class="mr_10 font_w5"><?=$val['tcd_ten']?></p>
                                                                        
                                                                  
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                    <p class="font_w5"><?=$val['tcd_thangdiem'];?> <?$tong_d_tc+=$val['tcd_thangdiem'];?></p>
                                                                </td>
                                                            </tr>

                                                           <?
                                                            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                            $row_c = $db_qr_c->result_array();

                                                            foreach ($row_c as $key => $val) {
                                                                $stt++;
                                                            ?>
                                                            <tr class="con_tieuchit_<? echo $val['tc_id_tonghop'] ?>">
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" >
                                                                    <p><?=$stt;?></p>
                                                                </td>
                                                                <td  style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" class="">
                                                                    <p class="text_a_l"><?=$val['tcd_ten']?></p>
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" >
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
                                                   
                                                    
                                                    <tr>
                                                        <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" colspan="2">
                                                            <p class="text_a_l font_w5">Tổng điểm
                                                            </p>
                                                        </td>
                                                        <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" class="font_w5"><?=$tong_d_tc?></td>
                                                    </tr>
                                                </table>
                                           
                            
                                            <h4>Phân loại đánh giá</h4>
                     
                                            <ul class="thongtin_tieuchi">
                                                <?
                                                    foreach ($pl_dg as $value) {
                                                        ?>
                                                        <li class="item">
                                                            <?
                                                            if($value[2]==1)echo "Yếu";
                                                            if($value[2]==2)echo "Trung bình";
                                                            if($value[2]==3)echo "Khá";
                                                            if($value[2]==4)echo "Giỏi";
                                                            if($value[2]==5)echo "Xuất sắc";
                                                        ?>:
                                                            <span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                                <span><?=$value[1]?></span>
                                                            
                                                        </li>
                                                        <?
                                                    }
                                                ?>
                                            </ul>
                        
                                     <?php endif ?>

                                                <?php if ($row['kh_user_nv']!=NULL): ?>                                                
                                                    <h4 class="color_blue font_wB font_ss16 mb_20">Đối tượng nhận đánh giá</h4>
                                                    <table border="1px solid black" class="bangchinh tieu_chi">
                                                        <tr>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">STT</p>
                                                            </th>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">Mã NV</p>
                                                            </th>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">Họ tên</p>
                                                            </th>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">Phòng ban</p>
                                                            </th>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">Chức vụ</p>
                                                            </th>
                                                        </tr>
                                                        
                                                        <?  $variable=explode(',',$row['kh_user_nv']);?>
                                                                <?if($row['kh_user_nv']!=NULL){?>
                                                                <? $stt=0;  foreach ($variable as $key => $value): $stt++; ?>
                                                                    <tr class="nv_danhgia show_trc"  >
                                                                        <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px"><?=$stt;?></td>
                                                                  <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" >
                                                                      <p class="chungchung"><?=$value;?></p>

                                                                  </td>
                                                                  <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                
                                                                        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                        
                                                                  </td>
                                                                  <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                                  </td>
                                                                  <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                                      <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                                  </td>
                                                                
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                    </table>
                                                <?php endif ?>
                                            <?php if ($row['kh_user_pb']!=NULL): ?>                                            
                                                    <h4 class="color_blue font_wB font_ss16 mb_20">Đối tượng nhận đánh giá</h4>
                                                    <table border="1px solid black" class="bangchinh tieu_chi">
                                                        <tr>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">STT</p>
                                                            </th>
                                                            <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="phantucon">Phòng ban</p>
                                                            </th>
                                                        </tr>
                                                        <?  $variable=explode(',',$row['kh_user_pb']);?>
                                                                <?if($row['kh_user_pb']!=NULL){?>
                                                                <? $stt=0; foreach ($variable as $key => $value):$stt++;?>
                                                                  <tr class="nv_danhgia">
                                                                    <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px"><?=$stt;?></td>
                                                                    <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                        <p class="text_a_l "><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?></p>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                    </table>
                                                <?php endif ?>

                                    <h4 class="color_blue font_wB font_ss16 mb_20">Người đánh giá</h4>
                                        <table border="1px solid black" class="bangchinh tieu_chi">
                                            <tr>
                                                <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                    <p class="phantucon">Mã NV</p>
                                                </th>
                                                <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                    <p class="phantucon">Họ tên</p>
                                                </th>
                                                <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                    <p class="phantucon">Phòng ban</p>
                                                </th>
                                                <th style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                    <p class="phantucon">Chức vụ</p>
                                                </th>
                                            </tr>
                                            <? $variable=explode(',',$row['kh_user_dg']);?>
                                                        <? $stt=0; foreach ($variable as $key => $value): $stt++; ?>
                                                            <tr class="nv_danhgia show_trc"  >

                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px"><?=$stt;?></td>
                                                          <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px" >
                                                              <p class="chungchung"><?=$value;?></p>

                                                          </td>
                                                          <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                       
                                                                <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                    
                                                          </td>
                                                          <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                                <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                          </td>
                                                          <td style="vertical-align: middle;font-size: 14px;text-align: center;height: 40px">
                                                            <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                              <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                          </td>
                                                         
                                                        </tr>
                                                        <? endforeach; ?>
                                        </table>