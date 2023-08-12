<?php
include "config.php";
$id = getValue("id","int","GET",0);
$query= new db_query("SELECT * FROM phieu_danhgia where id = '".$id."'");
$row = mysql_fetch_assoc($query->result);
 
 $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
 $row_kh = mysql_fetch_assoc($qr->result);

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_kh_dg.xls");
header("Pragma: no-cache");
header("Expires: 0");



?>
<table border="1px solid black">
<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Thông tin phiếu đánh giá</th></tr>

<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Tên phiếu đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;">PDG<?  
                                                        $invID = str_pad($row['id'], 4, '0', STR_PAD_LEFT);
                                                        echo $invID;
                                                    ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Đối tượng đánh giá:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? if ($row_kh['kh_user_pb']!=NULL) echo"Phòng ban"; else echo "Nhân viên"; ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Kế hoạch đánh giá:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$row_kh['kh_ten']?> 
        </td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ngày tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
                                                    $timestamp=$row_kh['kh_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></td>
</tr>



<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Thời gian bắt đầu:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=date("d/m/Y", $row['phieu_ngay_bd']);?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Thời gian kết thúc:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=date("d/m/Y", $row['phieu_ngay_kt']);?></td>
</tr>


<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ghi chú:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$row_kh['kh_ghichu']?></td>
</tr>


</table>
<br>
<? 
// if (!in_array(1, $quyen_phieu)) {header("Location: /trang_chu_sau_dang_nhap.html");};
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
$key = getValue("id","int","GET",0);
$keyy = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
     $phieu_ct_isduyet=$row['is_duyet'];
     $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
     $row_kh = mysql_fetch_assoc($qr->result);
     $str_id_nv_kt=explode(",",$row_kh['kh_user_nv']);
     
    $ma_kh= $row['phieuct_id_kh'];
$key_phieu = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key_phieu."'");
     $row = mysql_fetch_assoc($query->result);

     $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
     $row_kh = mysql_fetch_assoc($qr->result);     
?>

<?
if ($row_kh['kh_loai']==1||$row_kh['kh_loai']==3) {
    $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row_kh['kh_id_dg']."'");
    $row_de = mysql_fetch_assoc($query->result);
    $str_id_tc=explode(",",$row_de['dg_id_tieuchi']);
    $dem_vip=count($str_id_tc);  
}
?>
 <?
$tong_colspan=0;
foreach ($str_id_tc as $tc_th) {
        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and tcd_trangthai=2 and trangthai_xoa=1 and id=".$tc_th." ");
        $row_tccha =$qr->result_array();
        
    foreach ($row_tccha as $key => $value) {
        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
        $dem_con=mysql_num_rows($qr_con->result);
        if ($dem_con==0) $dem_con=1;
        $tong_colspan=$dem_con+$tong_colspan;

        ?>

        <?
        }
    }
?>  

<?
if ($row_kh['kh_loai']==2||$row_kh['kh_loai']==3) {
    $query= new db_query("SELECT * FROM de_kiemtra where kt_id = '".$row_kh['kh_id_kt']."'");
    $row_de_kt = mysql_fetch_assoc($query->result);
    $query_cauhoi= new db_query("SELECT * FROM de_kiemtra_cauhoi where ch_de_id = '".$row_de_kt['kt_id']."'");
}
?>  


<?
 $query_manh= new db_query("SELECT * FROM phieu_danhgia_chitiet where id_nguoidanhgia='".$_SESSION['ep_id']."' and phieu_id = '".$key_ex."'");
    $row_query_manh = mysql_fetch_assoc($query_manh->result);
    $iset_dg=mysql_num_rows($query_manh->result);
    $phieu_ct_tt_dg=$row_query_manh['phieuct_trangthai'];
    

?>

  <!--Phiếu Đề đánh giá nhân viên -->   
                                    <?if($row_kh['kh_user_pb']==NULL && ($row_kh['kh_loai']==1||$row_kh['kh_loai']==3)){
                                            ?>
                                            <div class="flex khoitieude">
                                                <div class="right-15">
                                                    <h4 class="chuxanh size-16 font-bold top-20 bot-20">Phiếu đánh giá</h4>
                                                </div>

                                                <? 
                                                $str_id_nv_dg=explode(",",$row_kh['kh_user_dg']);
                                                if(in_array($_SESSION['ep_id'], $str_id_nv_dg)==true){
                                                    ?>
                                                    <?php if ($phieu_ct_isduyet==0 && ($phieu_ct_tt_dg==1||$iset_dg==0)): ?>
                                                        
                                                            <a class=" chutrang font-medium "
                                                                href="/quanly-phieudanhgia-danhgia-nv-<?=$row['id']?>.html">
                                                                Đánh giá
                                                            </a>
                                                        </button>

                                                <?php endif ?>
                                                    <?
                                                }?>
                                                
                                            </div>  
                                          
                                                        <table border="1px solid black" class="bangchinh chuden ">
                                                            <tr>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;" rowspan="3">
                                                                    <p class="phantucon size-16 font-medium">STT</p>
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="3">
                                                                    <p class="phantucon size-16 font-medium">Họ tên</p>
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  colspan="<?=$tong_colspan;?>" class="size-16 font-medium">
                                                                    Tiêu chí
                                                                </td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="3" class="font-medium size-16">
                                                                    Tổng điểm
                                                                </td>
                                                            </tr>
                                                    <tr>   
                                                        <?
                                                        
                                                        foreach ($str_id_tc as $tc_th) {
                                                                $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                                $row_tccha =$qr->result_array();
                                                                
                                                            foreach ($row_tccha as $key => $value) {
                                                                $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                                $dem_con=mysql_num_rows($qr_con->result);
                                                                
                                                                
                            
                                                                ?>

                                                                  <td style="vertical-align: middle;font-size: 14px;text-align: center;"  colspan="<?=$dem_con;?>" rowspan="<?if($dem_con==0)echo "2"; ?>" >
                                                                    <p class="font-medium"><?=$value['tcd_ten']?></p>
                                                                    <p>(Số điểm: <?=$value['tcd_thangdiem']?>)</p>
                                                                </td>
                                                                <?
                                                                }
                                                            }
                                                        ?>                                                         
                                                    </tr>

                                                        <tr>
                                                                <?
                                                        foreach ($str_id_tc as $tc_th) {
                                                                $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                                $row_tccha =$qr->result_array();

                                                            foreach ($row_tccha as $key => $value) {
                                                                $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");

                                                                $row_con = $qr_con->result_array();
                                                                foreach ($row_con as $key => $val) {
                                                                    ?>

                                                                    <td style="vertical-align: middle;font-size: 14px;text-align: center;" >
                                                                        <p class="font-medium"><?=$val['tcd_ten'];?></p>
                                                                        <p>(Số điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                                    </td>
                                                                <?    
                                                                }
                                                                ?>     
                                                                <?
                                                                }

                                                            }
                                                        ?>  
                                                            </tr>

                                                        <?php if ($_SESSION['quyen']!=1): ?>
                                                           <?
                                                            $stt=0;
                                                            $str_id_nv=explode(",",$row_kh['kh_user_nv']);
                                                                foreach ($str_id_nv as  $value) {
                                                                    $stt++;
                                                                    $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where id_nguoidanhgia=".$_SESSION['ep_id']." and trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                                    $row_diem = mysql_fetch_assoc($dbqr->result);
                                                                    $diem=explode(",",$row_diem["cd_diem"]);
                                                                    $dem_diem=count($diem);      
                                                                ?>
                                                            <tr class="sugar">
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class=""><?=$stt;?></td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class="text-left"><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?>
                                                                    
                                                                </td>
                                                                <?
                                                                    for ($i=0; $i < $tong_colspan; $i++) { 
                                                                        ?>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  class="text-left">
                                                                 <?=$diem[$i];?>
                                                                </td>
                                                                <?
                                                                    }
                                                                ?>
                                                                
                                                                
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2">
                                                                    <?=$row_diem['tongdiem']?>
                                                            </tr>
                                                            <tr>
                                                                 <td  colspan="<?=$tong_colspan;?>" class="text-left">
                                                            <?=$row_diem['nhanxet']?>" 
                                                                </td>
                                                            </tr>

                                                            <?
                                                            }
                                                            ?>
                                                        <?php endif ?> 

                                                        <?php if ($_SESSION['quyen']==1): ?>
                                                           <?
                                                            $stt=0;
                                                            $str_id_nv=explode(",",$row_kh['kh_user_nv']);
                                                                foreach ($str_id_nv as  $value) {
                                                                    $stt++;
                                                                    $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                                    $row_diem = mysql_fetch_assoc($dbqr->result);
                                                                    $diem=explode(",",$row_diem["cd_diem"]);
                                                                    $dem_diem=count($diem);      
                                                                ?>
                                                            <tr class="sugar">
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class=""><?=$stt;?></td>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class="text-left"><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?>
                                                                 
                                                                </td>
                                                                <?
                                                                    for ($i=0; $i < $tong_colspan; $i++) { 
                                                                        ?>
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  class="text-left">
                                                                    <?=$diem[$i];?>
                                                                </td>
                                                                <?
                                                                    }
                                                                ?>
                                                                
                                                                
                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2">
                                                                 <?=$row_diem['tongdiem']?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                 <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                                   <?=$row_diem['nhanxet']?>
                                                                </td>
                                                            </tr>

                                                            <?
                                                            }
                                                            ?>
                                                        <?php endif ?> 
                                                        </table>
                                                 
                                    <?}?>
                                     
                                   <!--  phiếu đề kiêm tra -->                                   
                                    <?if($row_kh['kh_user_pb']==NULL && ($row_kh['kh_loai']==2||$row_kh['kh_loai']==3) ){
                                        ?>
                                        <h4 class="chuxanh size-16 font-bold top-20 bot-20">Danh sách nhân viên thực hiện
                                            bài bài kiểm tra</h4>
                                     
                                                    <table border="1px solid black" class="bangchinh chuden">
                                                        <tr>
                                                            <th>
                                                                <p class="phantucon">STT</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Mã NV</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Họ tên</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Trạng thái</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Tiến độ</p>
                                                            </th>
                                                            <?php if ($_SESSION['quyen']!=1): ?>
                                                            <th>
                                                                <p class="phantucon">Nhận xét</p>
                                                            </th>
                                                            <?php endif ?>
                                                           <?php if ($_SESSION['quyen']==1||in_array($_SESSION['ep_id'], $str_id_nv_dg)==true): ?>
                                                             
                                                            <th>
                                                                <p class="phantucon">Chức năng</p>
                                                            </th>
                                                            
                                                            <?php endif ?>

                                                        </tr>

                                                        <?  $stt=0;
                                                            $str_kt= explode(",", $row_kh['kh_user_nv']) ;

                                                           foreach ($str_kt as $nv_kt) {
                                                            $stt++;
                                                               ?>
                                                        <tr>
                                                            <td><?=$stt;?></td>
                                                            <td class=""><?=$nv_kt;?></td>
                                                            <td class="">
                                                                
                                                                    <a class="chuden  size-14"
                                                                        ><?=search($data_list_nv,'ep_id',$nv_kt)[0]['ep_name']?>
                                                                    </a>
                                                                
                                                            </td>

                                                            <? 
                                                            $qr_lam=new db_query("SELECT * FROM tbl_cautraloi where ma_nv=".$nv_kt." and phieu_id= '".$keyy."' ");
                                                            $row_nv_lambai = mysql_fetch_assoc($qr_lam->result);
                                                            $so_cauhoi_dalam=count(explode(',',$row_nv_lambai['cau_traloi'])) ;
                                                            if ($row_nv_lambai==0) {
                                                                $so_cauhoi_dalam=0;
                                                            }
                                                            $qr_kt=new db_query("SELECT * FROM kh_danhgia where kh_id=".$ma_kh." ");
                                                            $row_kt = mysql_fetch_assoc($qr_kt->result);
                                                            $made_ktra=$row_kt['kh_id_kt']; 

                                                            $qr_cauhoi=new db_query("SELECT * FROM de_kiemtra where kt_id=".$made_ktra." ");
                                                            $row_cauhoi = mysql_fetch_assoc($qr_cauhoi->result);

                                                            $mang_cauhoi=$row_cauhoi['mang_cauhoi'];
                                                            $mang_cauhoi=json_decode($mang_cauhoi,true);
                                                            $so_cauhoi=count($mang_cauhoi);
                                                            
                                                            $tiendo_lam=($so_cauhoi_dalam/$so_cauhoi)*100 ;

                                                            ?>
                                                            
                                                            <td class="<?if($row_nv_lambai['trangthai_lam']==0) echo"chucam";else echo"chuxanhluc"; ?> "><?if($row_nv_lambai['trangthai_lam']==0) echo"Đang làm bài";else echo"Hoàn thành" ?></td>
                                                            <td>
                                                                <div style="width:100%; height:30px">
                                                                    <div class="khoi_pro_bar">
                                                                        <div class="progress <?if($tiendo_lam==0) echo'chuden' ;?> "><?if($tiendo_lam==0) echo'0%' ;?>
                                                                        </div>
                                                                        <div class="progress--bar " style="width: <?=$tiendo_lam?>%"><?=$tiendo_lam?>%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <?
                                                                 $qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where id_doituong='".$nv_kt."' and phieu_id='".$keyy."' and id_nguoidanhgia ='".$_SESSION['ep_id']."' ");
                                                                 $row_chamdiem=mysql_fetch_assoc($qr->result);
                                                                 $phieuct_trangthai=$row_chamdiem['phieuct_trangthai_kt'];
                                                                 $dem=mysql_num_rows($qr->result);
                                                                ?>

                                                            <?php if ($_SESSION['quyen']!=1): ?>
                                                            <td class="text-left"><?=$row_chamdiem['nhanxet_kt'] ;if($row_chamdiem['nhanxet_kt']=="")echo "Chưa chấm điểm ";?>
                                                            </td>
                                                            <?php endif ?>

                                                            <?php if ($_SESSION['quyen']==1 ||in_array($_SESSION['ep_id'], $str_id_nv_dg)==true): ?>
                                                            <td>

                                                                <?php if ($phieuct_trangthai==2): ?>
                                                                <div class="flex">
                                                                 
                                                                    <a href="/phieudanhgia-chamdiem-u<?=$nv_kt?>-p<?=$keyy?>.html" class="chuxanhluc font-medium size-14">Đã chấm</a>
                                                                </div>
                                                                <?php endif ?>
                                                                <?php if ($phieuct_trangthai!=2): ?>
                                                                
                                                                    <div  class="<?if ($_SESSION['quyen']==1) echo 'center-width'?> flex c-pointer js_chamdiem" <?
                                                                        if(($row_nv_lambai['trangthai_lam']==1&&in_array($_SESSION['ep_id'], $str_id_nv_dg)==true)||$_SESSION['quyen']==1 ){
                                                                            echo"data-cham='2'";
                                                                        } else{
                                                                            echo "data-cham='1'";
                                                                        }
                                                                    ?> >
                                                                       

                                                                        
                                                                        <a  <?php if(($row_nv_lambai['trangthai_lam']==1&&in_array($_SESSION['ep_id'], $str_id_nv_dg)==true)||$_SESSION['quyen']==1 ): ?> <?php endif ?>class="chuxanh font-medium size-14"><? if ($_SESSION['quyen']!=1):?>Chấm điểm <?php endif ?><? if ($_SESSION['quyen']==1):?>Xem chi tiết<?php endif ?></a>
                                                                    </div>
                                                                
                                                                <?php endif ?>
                                                            </td>
                                                          <?php endif ?>
                                                        </tr>
                                                        <?
                                                           }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    <?}?>
                                    
                                    <!-- phongf ban -->
                                    <? if($row_kh['kh_user_pb']!=NULL ){
                                        ?>
                                        <div class="flex khoitieude">
                                            <div class="right-15">
                                                <h4 class="chuxanh size-16 font-bold top-20 bot-20">Phiếu đánh giá</h4>
                                            </div>
                                        </div>
                                       
                                                    <table border="1px solid black" class="bangchinh chuden ">
                                                        <tr>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="3">
                                                                <p class="phantucon size-16 font-medium">STT</p>
                                                            </td>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="3">
                                                                <p class="phantucon size-16 font-medium">Phòng ban</p>
                                                            </td>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  colspan="<?=$tong_colspan;?>" class="size-16 font-medium">
                                                                Tiêu chí
                                                            </td>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="3" class="font-medium size-16">
                                                                Tổng điểm
                                                            </td>
                                                        </tr>
                                                <tr>   
                                                    <?
                                                    
                                                    foreach ($str_id_tc as $tc_th) {
                                                            $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                            $row_tccha =$qr->result_array();
                                                            
                                                        foreach ($row_tccha as $key => $value) {
                                                            $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                            $dem_con=mysql_num_rows($qr_con->result);
                                                            
                                                            
                        
                                                            ?>

                                                              <td style="vertical-align: middle;font-size: 14px;text-align: center;"  colspan="<?=$dem_con;?>" rowspan="<?if($dem_con==0)echo "2"; ?>" >
                                                                <p class="font-medium"><?=$value['tcd_ten']?></p>
                                                                <p>(Số điểm: <?=$value['tcd_thangdiem']?>)</p>
                                                            </td>
                                                            <?
                                                            }
                                                        }
                                                    ?>                                                         
                                                </tr>

                                                <tr>
                                                            <?
                                                    foreach ($str_id_tc as $tc_th) {
                                                            $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                            $row_tccha =$qr->result_array();

                                                        foreach ($row_tccha as $key => $value) {
                                                            $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                            $row_con = $qr_con->result_array();
                                                            foreach ($row_con as $key => $val) {
                                                                ?>

                                                                <td style="vertical-align: middle;font-size: 14px;text-align: center;" >
                                                                    <p class="font-medium"><?=$val['tcd_ten'];?></p>
                                                                    <p>(Số điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                                </td>
                                                            <?    
                                                            }
                                                            ?>     
                                                            <?
                                                            }

                                                        }
                                                    ?>  
                                                        </tr>
                                                        <?php if ($_SESSION['quyen']!=1): ?>
                                                        <?
                                                        $stt=0;
                                                        $str_id_pb=explode(",",$row_kh['kh_user_pb']);
                                                            foreach ($str_id_pb as  $value) {
                                                                $stt++;
                                                                $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where id_nguoidanhgia=".$_SESSION['ep_id']." and trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                                $row_diem = mysql_fetch_assoc($dbqr->result);
                                                                $diem=explode(",",$row_diem["cd_diem"]);
                                                                $dem_diem=count($diem);  
                                                                ?>
                                                        <tr class="sugar">
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class=""><?=$stt;?></td>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class="text-left"><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?>
                                                                
                                                            </td>
                                                            <?
                                                                for ($i=0; $i < $tong_colspan; $i++) { 
                                                                    ?>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  class="text-left">
                                                                <?=$diem[$i];?>
                                                            </td>
                                                            <?
                                                                }
                                                            ?>
                                                            
                                                            
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  ><?=$row_diem['tongdiem']?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                             <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                              <?=$row_diem['nhanxet']?>
                                                            </td>
                                                        </tr>
                                                        <?
                                                        }
                                                        ?>
                                                    <?php endif ?>
                                                    <?php if ($_SESSION['quyen']==1): ?>
                                                        <?
                                                        $stt=0;
                                                        $str_id_pb=explode(",",$row_kh['kh_user_pb']);
                                                            foreach ($str_id_pb as  $value) {
                                                                $stt++;
                                                                $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                                $row_diem = mysql_fetch_assoc($dbqr->result);
                                                                $diem=explode(",",$row_diem["cd_diem"]);
                                                                $dem_diem=count($diem);  
                                                                ?>
                                                        <tr class="sugar">
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class=""><?=$stt;?></td>
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2" class="text-left"><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?>
                                                               
                                                            </td>
                                                            <?
                                                                for ($i=0; $i < $tong_colspan; $i++) { 
                                                                    ?>
                                                            <td  style="vertical-align: middle;font-size: 14px;text-align: center;" class="text-left">
                                                                <?=$diem[$i];?>
                                                            </td>
                                                            <?
                                                                }
                                                            ?>
                                                            
                                                            
                                                            <td style="vertical-align: middle;font-size: 14px;text-align: center;"  rowspan="2">
                                                              <?=$row_diem['tongdiem']?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                             <?=$row_diem['nhanxet']?>
                                                        </tr>
                                                        <?
                                                        }
                                                        ?>
                                                    <?php endif ?>
                                                    </table>
                                              
                                    <?}?>