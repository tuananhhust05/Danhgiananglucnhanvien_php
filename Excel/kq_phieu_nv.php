<?php
include "config.php";
$key_p = getValue("id_p","int","GET",0);
$query= new db_query("SELECT DISTINCT id_nguoidanhgia  FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_congty=".$usc_id." ");
$row = $query->result_array();

$dem=count($row);//Dem so nguoi danh gia

$query=new db_query("SELECT * FROM phieu_danhgia where id=".$key_p."  and id_congty = ".$usc_id."  ");
$row_phieu =mysql_fetch_assoc($query->result);

$query=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_kh =mysql_fetch_assoc($query->result);
$de_danhgia_id=$row_kh['kh_id_dg'];  
$de_kiemtra_id=$row_kh['kh_id_kt'];

if ($de_danhgia_id!=NULL) {
    $query=new db_query("SELECT * FROM de_danhgia where dg_id=".$de_danhgia_id." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
    $row_de =mysql_fetch_assoc($query->result);
    $de_danhgia=explode(',',$row_de['dg_id_tieuchi']);
    if ($row_de['dg_loai_macdinh']!="") $pl_de= json_decode($row_de['dg_loai_macdinh'], true);
     else $pl_de= json_decode($row_de['dg_phanloaikhac'], true);

}

if ($de_kiemtra_id!=NULL) {
    $query_ktr=new db_query("SELECT * FROM de_kiemtra where kt_id=".$de_kiemtra_id." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
    $row_ktra =mysql_fetch_assoc($query_ktr->result);

    $de_kiemtra=json_decode($row_ktra['mang_cauhoi'],true);
    if ($row_ktra['kt_phanloai_macdinh']!="") $pl_kt= json_decode($row_ktra['kt_phanloai_macdinh'], true);
         else $pl_kt= json_decode($row_ktra['kt_phanloai_khac'], true);

}

foreach ($row as $value) {
    $id_nguoidanhgia=$value['id_nguoidanhgia'];
   
    $query= new db_query("SELECT id_doituong FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_nguoidanhgia = '".$id_nguoidanhgia."'");
    $row2 = $query->result_array();

}
$demm2=count($row2);

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_ts.xls");
header("Pragma: no-cache");
header("Expires: 0");




?>
<table border="1px solid black">
<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Kết quả phiếu đánh giá <?  $invID = str_pad($key_p, 4, '0', STR_PAD_LEFT);echo $invID;?></th></tr>

<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Mã phiếu đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;">PDG<?  $invID = str_pad($key_p, 4, '0', STR_PAD_LEFT);echo $invID;?></td>
</tr>
</table>

<? if ($dem==1 && $de_danhgia_id!=NULL) {
?>
<h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>

        <table border="1px solid black" class="bangchinh chuden ">
            <tr>
                <th class="w_same_3">
                    <p class="phantucon">Tiêu chí</p>
                </th>
                <th>
                    <p class="phantucon">Thang điểm</p>
                </th>
                <?php foreach ($row2 as $key => $value): ?>
                <th class="w_same_4">
                    
                            
                            <p class=" size-14"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_name']?></p>
                       
                </th>
                <?php endforeach ?>
            </tr>

        <?php  $t=0; foreach ($de_danhgia as $k=>  $value): $t++;

        $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
        $row_cha = mysql_fetch_assoc($db_qr->result);
        ?>
            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <?  foreach  ($row2 as $va): 
                    $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$va['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                       $list_diem=explode(',',$val['cd_diem']); 
                       }
                    ?>
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
                <?php  endforeach  ?>  

            </tr>

            <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array(); 
            if (count($row_con)==0) $tt++;
            else $t=$tt; foreach ($row_con as $key => $val):$t++; $tt++;?>

            <tr>
                <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <?php  foreach ($row2 as $va):  
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$va['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                       $list_diem=explode(',',$val['cd_diem']); 
                       }
                    ?>
                    <td>
                        <?=$list_diem[$tt-1] ;?>
                    </td>
                <?php  endforeach ?>
            </tr>

            <?php  endforeach  ?>    
        <?php  endforeach  ?>    
            
            

            <tr>
                <td colspan="2" class="text-left font-medium">Nhận xét</td>
                <?php foreach ($row2 as $key => $value):
                   $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }
                 ?>
                    <td><?=$val['nhanxet']?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                <?php foreach ($row2 as $key => $value): 
                     $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }
                 ?>
                    <td><?=$val['tongdiem']?></td>
                <?php endforeach ?>
            </tr>
            
            <tr>
                <td colspan="2" class="text-left font-medium">Xếp loại</td>
                <?php foreach ($row2 as $key => $value): 
                    $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }?>
                 <?php foreach ($pl_de as $value_pl_de): ?>
                    <?if ($val['tongdiem']>=$value_pl_de[0]&&$val['tongdiem']<=$value_pl_de[1]) {
                            $loai_pl_de=$value_pl_de[2];
                    } ?>
                <?php endforeach ?>
                    <td class="<? 
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
                     ?></td>
                <?php endforeach ?>
            </tr>
        </table>
    </div>
</div>
                                        <?
                                    } ?>
                                    <?php if ($dem>1 && $de_danhgia_id!=NULL): ?>
                                        <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
                                        
            <table border="1px solid black" class="bangchinh chuden ">
                <tr>
                    <th rowspan="2" class="w_same_4">
                        <p class="phantucon">Tiêu chí</p>
                    </th>
                    <th rowspan="2" class="w_same_8">
                        <p class="phantucon">Thang điểm</p>
                    </th>
                    <?php foreach ($row2 as $key => $value): ?>
                    <th class="w_same_4" colspan="<?=$dem?>">
                        
                            <p class=" size-14"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_name']?></p>
                            
                    </th>
                    <?php endforeach ?>
                   
            </tr>
                <tr>
                    <?php foreach ($row2 as $key => $value): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                            <th class="w_same_8">
                               
                                        
                                        
                                    <a class="elipsis1 size-14"><?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_name']?></a>
                                    
                            
                            </th>
                        <?php endforeach ?>
                        
                    <?php endforeach ?>
                   
                </tr>

                
<?php $t=0;   foreach ($de_danhgia as $k=>  $value): $t++;

            $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_cha = mysql_fetch_assoc($db_qr->result);
            ?>

            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten']?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): $list_diem=explode(",", $value_row_n_gdg['cd_diem'])?>
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
                        <?php endforeach ?>
                        
                <?php endforeach ?>
            </tr>

        <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array(); 
            if (count($row_con)==0) $tt++;
            else $t=$tt; foreach ($row_con as $key => $val):$t++;$tt++;?>
            <tr>
                <td class="text-left left-10">- <?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): $list_diem=explode(",", $value_row_n_gdg['cd_diem']) ?>
                            <td class="">
                                <?=$list_diem[$tt-1]?>
                            </td>
                        <?php endforeach ?>
                        
                <?php endforeach ?>
            </tr>
            <?php  endforeach  ?> 
                    
        <?php endforeach ?> 


        <tr>
            <td colspan="2" class="text-left font-medium">Nhận xét</td>
            <?php foreach ($row2 as $key => $value_row2): 
               $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
               $row_n_gdg = $qr->result_array(); 
                ?>
                <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                    <td>
                        <?print_r($value_row_n_gdg['nhanxet'])?>
                    </td>
                <?php endforeach ?>
                        
            <?php endforeach ?>
        </tr>


        <tr>
            <td colspan="2" class="text-left font-medium">Tổng điểm</td>
            <?php foreach ($row2 as $key => $value_row2): 
               $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
               $row_n_gdg = $qr->result_array(); 
                ?>
                <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                    <td><?print_r($value_row_n_gdg['tongdiem'])?></td>
                <?php endforeach ?>
                        
            <?php endforeach ?>
        </tr>
        <tr>
            <td colspan="2" class="text-left font-medium">Trung bình điểm</td>

            <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                       <td colspan="<?=$dem?>">
                           <?php $tong_nhieu_tb=0; foreach ($row_n_gdg as $key => $value_row_n_gdg):$tong_nhieu_tb+=$value_row_n_gdg['tongdiem'] ?>
                               
                           <?php endforeach ?>
                           <?=$tong_nhieu_tb/$dem?>
                       </td>
                        
            <?php endforeach ?>

        </tr>

        <tr>
            <td colspan="2" class="text-left font-medium">Xếp loại</td>
            <?php foreach ($row2 as $key => $value_row2): 
                   $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_row2['id_doituong']."'");
                   $row_n_gdg = $qr->result_array(); 
                    ?>
                    <?php $tong_nhieu_tb=0; foreach ($row_n_gdg as $key => $value_row_n_gdg):$tong_nhieu_tb+=$value_row_n_gdg['tongdiem'] ?>
                               
                           <?php endforeach ?>
                           <?$maz=$tong_nhieu_tb/$dem?>
                           <?php foreach ($pl_de as $value_pl_de): ?>
                                <?if ($maz>=$value_pl_de[0]&&$maz<=$value_pl_de[1]) {
                                        $loai_pl_de=$value_pl_de[2];
                                } ?>
                            <?php endforeach ?>
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
                    if($loai_pl_de=="") echo"Chưa có xếp loại";
                     ?></td> 
            <?php endforeach ?>
        </tr>  

            </table>
        </div>
    </div>
</div>
                                    <?php endif ?>
                                    
                                    
                                        <?php if ($de_kiemtra_id!=NULL): ?>

                                        <?php if ($dem==1): ?>
                                            <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề kiểm tra</h4>
                                            
                                                <table border="1px solid black" class="bangchinh chuden ">
                                                    <tr>
                                                        <th class="w_same_4">
                                                            <p class="phantucon">Câu hỏi</p>
                                                        </th>
                                                        <th class="w_same_8">
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>

                                                        <?php foreach ($row2 as $key_kt => $value_kt):
                                                           
                                                         ?>
                                                            <th class="w_same_4">
                                                               
                                                                        <p class=" size-14"><?=search($data_list_nv,'ep_id',$value_kt['id_doituong'])[0]['ep_name']?></p>
                                                                    
                                                            </th>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    
                                                    <?php $stt=0; foreach ($de_kiemtra as $key_cauhoi => $value_cauhoi):$stt++; ?>
                                                    <tr>
                                                        <td class="text-left font-medium">Câu hỏi <?=$stt?>:
                                                            <?=$value_cauhoi[0]?></td>
                                                        <td class=""><?=$value_cauhoi[1]?></td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng):
                                                            $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                          // $qr->result_array()
                                                           $list_diem=explode(',',$row_cacdoituong['cd_diem_ktra']); 
                                                           $nx=$row_cacdoituong['nhanxet_kt']; 
                                                           
                                                         ?>
                                                            <td><?=$list_diem[$key_cauhoi] ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng):$qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $nx=$row_cacdoituong['nhanxet_kt'];  ?>
                                                            <td><?=$nx?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng): $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $ton_d=$row_cacdoituong['tongdiem_kt'];?>
                                                            <td><?=$ton_d?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Xếp loại</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng): $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $ton_d=$row_cacdoituong['tongdiem_kt'];?>
                                                           <?php foreach ($pl_kt as $value_pl_kt): ?>
                                                                    <?if ($ton_d>$value_pl_kt[0]&&$ton_d<=$value_pl_kt[1]) {
                                                                            $loai_pl=$value_pl_kt[2];
                                                                    } ?>
                                                                <?php endforeach ?>
                                                            <td class="<? 
                                                                if($loai_pl==1) echo"chunau";
                                                                if($loai_pl==2) echo"chuxanh";
                                                                if($loai_pl==3) echo"chuxanhluc";
                                                                if($loai_pl==4) echo"chucam";
                                                                if($loai_pl==5) echo"chudo";
                                                                 ?>"><? 
                                                                if($loai_pl==1) echo"Yếu";
                                                                if($loai_pl==2) echo"Trung Bình";
                                                                if($loai_pl==3) echo"Khá";
                                                                if($loai_pl==4) echo"Giỏi";
                                                                if($loai_pl==5) echo"Xuất sắc";
                                                                if($loai_pl=="") echo"Chưa có xếp loại";
                                                                 ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                </table>
                                            </div>
                                            </div>
                                        <?php endif ?>

                                        <?php if ($dem>1): ?>
                                            <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề kiểm tra</h4>
                                            
                                                <table border="1px solid black" class="bangchinh chuden ">
                                                    <tr>
                                                        <th class="w_same_4" rowspan="2">
                                                            <p class="phantucon">Câu hỏi</p>
                                                        </th>
                                                        <th class="w_same_8" rowspan="2">
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>
                                                        <?php foreach ($row2 as $value_doituong): ?>
                                                        <th class="w_same_4" colspan="<?=$dem?>">
                                                           
                                                                    
                                                                    <p class=" size-14"><?=search($data_list_nv,'ep_id',$value_doituong['id_doituong'])[0]['ep_name']?></p>
                                                                
                                                        </th>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 
                                                          
                                                            ?>
                                                            <?php foreach ($row_n_gdg as  $value_row_n_gdg): ?>
                                                                <th class="w_same_8">
                                                                    
                                                                            
                                                                            
                                                                        <a class="elipsis1 size-14"><?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_name']?></a>
                                                                       
                                                                </th>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                       
                                                    </tr>
                                                    
                                                    <?php $stt=0; foreach ($de_kiemtra as $key_cauhoi => $value_cauhoi):$stt++; ?>   
                                                    
                                                    <tr>
                                                        <td class="text-left font-medium">Câu hỏi <?=$stt?>: <?=$value_cauhoi[0]?></td>
                                                        <td class=""><?=$value_cauhoi[1]?></td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php foreach ($row_n_gdg as $value_row_n_gdg):$list_diem=explode(',',$value_row_n_gdg['cd_diem_ktra']); ?>
                                                                <td class="">
                                                                    <?=$list_diem[$key_cauhoi]?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                   
                                                   <?php endforeach ?>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php foreach ($row_n_gdg as $value_row_n_gdg):$nx=$value_row_n_gdg['nhanxet_kt']; ?>
                                                                <td class="">
                                                                    <?=$nx?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                <td class="">
                                                                    <?=$tongdiem_nn;$s_tongdiem_nn+=$tongdiem_nn;?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Trung bình điểm</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                    <?$s_tongdiem_nn+=$tongdiem_nn;?>
                                                            <?php endforeach ?>
                                                                <td colspan="<?=$dem?>" class="">
                                                                    <?=$s_tongdiem_nn/$dem;$b=$s_tongdiem_nn/$dem?>
                                                                </td>
                                                        <?php endforeach ?>
                                                        

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Xếp loại</td>
                                                            <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                    <?$s_tongdiem_nn+=$tongdiem_nn;?>
                                                            <?php endforeach ?>

                                                            <?$b=$s_tongdiem_nn/$dem?>
                                                                
                                                            <?php foreach ($pl_kt as $value_pl_kt): ?>
                                                                <?if ($b>$value_pl_kt[0]&&$b<=$value_pl_kt[1]) {
                                                                        $loai_pl=$value_pl_kt[2];
                                                                } ?>
                                                            <?php endforeach ?>
                                                                <td colspan="<?=$dem?>" class="<? 
                                                                if($loai_pl==1) echo"chunau";
                                                                if($loai_pl==2) echo"chuxanh";
                                                                if($loai_pl==3) echo"chuxanhluc";
                                                                if($loai_pl==4) echo"chucam";
                                                                if($loai_pl==5) echo"chudo";
                                                                 ?>">
                                                                    <? 
                                                                if($loai_pl==1) echo"Yếu";
                                                                if($loai_pl==2) echo"Trung Bình";
                                                                if($loai_pl==3) echo"Khá";
                                                                if($loai_pl==4) echo"Giỏi";
                                                                if($loai_pl==5) echo"Xuất sắc";
                                                                if($loai_pl=="") echo"Chưa có xếp loại";
                                                                 ?>
                                                                </td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                </table>
                                            </div>
                                            </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endif ?>