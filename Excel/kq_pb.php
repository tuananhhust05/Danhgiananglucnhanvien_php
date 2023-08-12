<?php
include "config.php";
$key_pb = getValue("id","int","GET",0);
$key_p = getValue("id_p","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and phieuct_trangthai=2 and id_doituong = '".$key_pb."'");
     $row = $query->result_array();
             
     $dem=count($row);
     
foreach ($row as $key => $row_diem) {
     $list_diem=explode(',',$row_diem['cd_diem']);
}

$query=new db_query("SELECT * FROM phieu_danhgia where id=".$key_p."  and id_congty = ".$usc_id."  ");
$row_phieu =mysql_fetch_assoc($query->result);

$query=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_kh =mysql_fetch_assoc($query->result);
$de_danhgia_id=$row_kh['kh_id_dg'];  

$query=new db_query("SELECT * FROM de_danhgia where dg_id=".$de_danhgia_id." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_de =mysql_fetch_assoc($query->result);

$de_danhgia=explode(',',$row_de['dg_id_tieuchi']);
if ($row_de['dg_loai_macdinh']!="") $pl_de= json_decode($row_de['dg_loai_macdinh'], true);
else $pl_de= json_decode($row_de['dg_phanloaikhac'], true);

 

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_ts.xls");
header("Pragma: no-cache");
header("Expires: 0");




?>
<table border="1px solid black">
<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Kết quả đánh giá <?=search($arr_dep,'dep_id',$key_pb)[0]['dep_name']?></th></tr>

<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Mã phiếu đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;">PDG<?  $invID = str_pad($key_p, 4, '0', STR_PAD_LEFT);echo $invID;?></td>
</tr>
</table>

<?php if ($dem==1): ?>
                                <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
								<table border="1px solid black" class="bangchinh chuden ">
                                                <tr>
                                                    <th class="w_same_3">
                                                        <p class="phantucon">Tiêu chí</p>
                                                    </th>
                                                    <th class="w_same_8">
                                                        <p class="phantucon">Thang điểm</p>
                                                    </th>
                                                    <th class="w_same_4">
                                                        <p class="phantucon">Kết quả</p>
                                                    </th>

                                                </tr>
                                                <?php   foreach ($de_danhgia as $k=>  $value): 

        $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
        $row_cha = mysql_fetch_assoc($db_qr->result);
        ?>
            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <td class="font-medium ">
                    <?php 
                        $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                        $row_con = $db_qr_c->result_array();  
                        if (count($row_con)==0){$tt++;$s=$list_diem[$tt-1];} 
                          else $s=0; foreach ($row_con as $key => $val): $tt++;  ?> 
                                <? $s+=$list_diem[$tt-1];?>
                    <?php  endforeach  ?>
                    <?echo $s;?>
                </td>
            </tr>

            <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array();  
            $dem_row_con=mysql_num_rows($db_qr_c->result);
            if (count($row_con)==0) $t++;
               else foreach ($row_con as $key => $val): $t++;  ?> 
            <tr>
                <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <td class=""><?=$list_diem[$t-1];?></td>
            </tr>
            <?php  endforeach  ?>
        <?php   endforeach ?>
            <tr>
                <td class="text-left font-medium">Nhận xét</td>
                <td colspan="2"><?=$row_diem['nhanxet']?></td>
            </tr>
            <tr>
                <td class="text-left font-medium">Tổng điểm</td>
                <td colspan="2"><?=$row_diem['tongdiem']?></td>
            </tr>
            <tr>
                <td colspan="" class="text-left font-medium">Trung bình điểm</td>
                <td colspan="2"><?=$row_diem['tongdiem']?></td>
            </tr>
            <tr>
                <?php foreach ($pl_de as $value_pl_de): ?>
                                <?if ($row_diem['tongdiem']>$value_pl_de[0]&&$row_diem['tongdiem']<=$value_pl_de[1]) {
                                        $loai_pl_de=$value_pl_de[2];
                                } ?>
                <?php endforeach ?>
                <td class="text-left font-medium">Xếp loại</td>
                <td colspan="2" class="<? 
                    if($loai_pl_de==1) echo"chunau";
                    if($loai_pl_de==2) echo"chuxanh";
                    if($loai_pl_de==3) echo"chuxanhluc";
                    if($loai_pl_de==4) echo"chucam";
                    if($loai_pl_de==5) echo"chudo";
                     ?>"><? 
                    if($loai_pl_de==1) echo"Yếu";
                    if($loai_pl_de==2) echo"Trung Bình";
                    if($loai_pl_de==3) echo"Khá";
                    if($loai_pl_de==4) echo"Giỏi";
                    if($loai_pl_de==5) echo"Xuất sắc";
                    if($loai_pl_de=="") echo"Chưa có xếp loại";
                     ?>      
                </td>
            </tr>
        </table>
                            <?php endif ?>        
                                

                            <?php if ($dem>1): ?>
                                <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
                                    
                                      
                                            <table border="1px solid black" class="bangchinh chuden ">
                                                <tr>
                                                    <th class="w_same_3">
                                                        <p class="phantucon">Tiêu chí</p>
                                                    </th>
                                                    <th>
                                                        <p class="phantucon">Thang điểm</p>
                                                    </th>
                                                    
                                            <?php foreach ($row as $key => $value): ?>
                                            <th class="w_same_4">
                                                
                                                       
                                                    <p class="size-14"><?=search($data_list_nv,'ep_id',$value['id_nguoidanhgia'])[0]['ep_name']?>
                                                    </p>
                                              
                                            </th>
                                            <?php endforeach ?>
                                                </tr>
                                                <?php $t=0;   foreach ($de_danhgia as   $value): $t++;

                                            $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                            $row_cha = mysql_fetch_assoc($db_qr->result);
                                        ?>
                                        <tr>
                                            <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?> </td>
                                            <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                                            <?  foreach  ($row as $va): $list_diem=explode(',',$va['cd_diem']);?>
                                                <td class="font-medium">
                                                    <?
                                                        $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                        $row_con = $db_qr_c->result_array(); 
                                                        if (count($row_con)==0) {
                                                           
                                                            echo $list_diem[$t-1];
                                                        }

                                                        else{ $z=$tt; $tong_d_tccha=0;
                                                           foreach ($row_con as $key => $val) {
                                                               $z++;
                                                               $tong_d_tccha+=$list_diem[$z-1];
                                                           }
                                                           echo $tong_d_tccha;
                                                        }
                                                    ?>
                                                </td>
                                                 
                                            <?php  endforeach ?>  

                                        </tr>

                                            <?php 
                                                $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row_con = $db_qr_c->result_array();  
                                                
                                                if (count($row_con)==0) $tt++;
                                                    else  $t=$tt; foreach ($row_con as $key => $val): $t++;  $tt++?> 
                                          
                                                <tr>
                                                    
                                                    <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                                                    <td class=""><?=$val['tcd_thangdiem']?></td>

                                                    <?php  foreach ($row as $va): $list_diem=explode(',',$va['cd_diem']); ?>
                                                        <td class="<?=$va['id']?>"><?=$list_diem[$tt-1]; ?> </td>
                                                    <?php  endforeach ?>
                                                    
                                                </tr>
                                                
                                            <?php endforeach ?>
                                            
                                        <?php endforeach ?>


                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                            <?php foreach ($row as $key => $value): ?>
                                                <td><?=$value['nhanxet']?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                            <?php $tong_diem=0; foreach ($row as $key => $value): ?>
                                                <td><?=$value['tongdiem'];$tong_diem+=$value['tongdiem']?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Trung bình điểm</td>
                                            <td colspan="<?=$dem?>"><?=$tong_diem/$dem;$a=$tong_diem/$dem;?></td>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pl_de as $value_pl_de): ?>
                                                            <?if ($a>$value_pl_de[0] && $a<=$value_pl_de[1]) {
                                                                    $loai_pl_de=$value_pl_de[2];
                                                            } ?>
                                                        <?php endforeach ?>
                                            <td  colspan='2' class="text-left font-medium">Xếp loại</td>
                                            <td colspan="<?=$dem?>" class="<? 
                                                if($loai_pl_de==1) echo"chunau";
                                                if($loai_pl_de==2) echo"chuxanh";
                                                if($loai_pl_de==3) echo"chuxanhluc";
                                                if($loai_pl_de==4) echo"chucam";
                                                if($loai_pl_de==5) echo"chudo";
                                                 ?>"><? 
                                                if($loai_pl_de==1) echo"Yếu";
                                                if($loai_pl_de==2) echo"Trung Bình";
                                                if($loai_pl_de==3) echo"Khá";
                                                if($loai_pl_de==4) echo"Giỏi";
                                                if($loai_pl_de==5) echo"Xuất sắc";
                                                if($loai_pl_de=="") echo"Điểm không hợp lệ";
                                                 ?>      
                                            </td>
                                        </tr>
                                    </table>
                               
                            <?php endif ?>