<?
include 'config.php';
$date_bd = getValue("date_bd","str","POST","");
$date_kt = getValue("date_kt","str","POST","");

     $date_bd=strtotime(date($date_bd));
     $date_kt=strtotime(date($date_kt));

     $query= new db_query("SELECT * FROM phieu_danhgia where phieu_ngay_bd >=".$date_bd." and phieu_ngay_kt <= ".$date_kt." and trangthai_xoa=1 and  id_congty = ".$usc_id."");
     $row = $query->result_array();
     
    
?>
<?php $stt=0;foreach ($row as $key => $value): ?>
<?php if ($value['phieu_ngay_bd']<=time()): $stt++;?>
<? $query=new db_query("SELECT * FROM kh_danhgia where  id_congty=".$usc_id." and kh_id=".$value['phieuct_id_kh']." ");
    $row_kh = mysql_fetch_assoc($query->result);
    $m_dg=explode(",",$row_kh['kh_user_dg']);
    $m_nv=explode(",",$row_kh['kh_user_nv']);
?>
<?php if (in_array($_SESSION['ep_id'], $m_dg)==true||in_array($_SESSION['ep_id'], $m_nv)==true||$_SESSION['quyen']==1): ?>         
<tr class="tt_phieu tt_hoanthanh<?=$value['id']?> <?if($value['phieuct_trangthai']==1)echo "tt_dangdanhgia";else echo "tt_hoanthanh"; ?>">
<td><?=$stt;?></td>
<td class="chuxanh text-left">
    <a class="chuxanh"
        href="/phieudanhgia-de-kiemtra-nv-<?=$value['id']?>.html">PDG<?  
            $invID = str_pad($value['id'], 4, '0', STR_PAD_LEFT);
            echo $invID;
        ?>
     </a>           
</td>
<td class=" text-left ">
    <? $query=new db_query("SELECT * FROM kh_danhgia where  id_congty=".$usc_id." and kh_id=".$value['phieuct_id_kh']." ");
    $row_kh = mysql_fetch_assoc($query->result);
    echo $row_kh['kh_ten'];
     ?>
</td>
<td class="<?if($value['phieuct_trangthai']==1) echo "chuxanh"; if($value['phieuct_trangthai']==2) echo "chuxanhluc";?>"><?if($value['phieuct_trangthai']==1) echo "Đang đánh giá"; if($value['phieuct_trangthai']==2) echo "Hoàn thành";?></td>

<td><? if ($row_kh['kh_user_pb']!=NULL) echo"Phòng ban"; else echo "Nhân viên"; ?></td>
<td class="text-right"><? 
    if ($row_kh['kh_user_nv']!=NULL) 
        $ds_nv=explode(",",$row_kh["kh_user_nv"]);
    if ($row_kh['kh_user_pb']!=NULL) 
        $ds_nv=explode(",",$row_kh["kh_user_pb"]);
    
    $dem_vip=count($ds_nv);
    echo $dem_vip; ?></td>
<td class="text-center">
    <div class="flex bot-5 center-center">
        <div class="left_time text-left">
            <p class="chuxanh font-medium">Từ:</p>
        </div>
        <div class="right_time ">
            <p class="chuden">00:00 - <?=date("d/m/Y", $value['phieu_ngay_bd']);?></p>
        </div>
    </div>
    <div class="flex center-center">
        <div class="left_time text-left">
            <p class="chudo font-medium">Đến:</p>
        </div>
        <div class="right_time">
            <p class="chuden">23:59 - <?=date("d/m/Y", $value['phieu_ngay_kt']);?></p>
        </div>
    </div>
</td>

<td>
    <div data-id-kh="<?=$row_kh['kh_id']?>" class="flex center-center js_thanhvien c-pointer xem_ng_danhgia">

         <? $ds_ng_dg=explode(",",$row_kh["kh_user_dg"]);
            $dem_vip=count($ds_ng_dg);
         ?>
         <?php foreach ($ds_ng_dg as $key => $valu): ?>
        <? if ($key<3) {
            ?>
        <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']!=""): ?>
            <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$valu)[0]['ep_image'];?>" class="wh26_ra left_am10" alt="người đánh giá"> 
            <?php endif ?>
            <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']==""): ?>
            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra left_am10" alt="người đánh giá"> 
            <?php endif ?>
        <?
        }?>
   
        <?php endforeach ?>
        <div class="bonus <?if($dem_vip <=3 ) echo "hidden";?> chutrang flex center-center left_am">
            <?
                    if($dem_vip>3){
                        $dem_vip=$dem_vip-3;
                        echo $dem_vip;
                    }
                ?>
        </div>

    </div>
</td>
<td class="text-left lineheight16"><?=$row_kh['kh_ghichu']?></td>
<td>
                                                
    <div data-id="<?=$value['id']?>" data-name="<?=$row_kh['kh_ten']?>"  onclick="hienpopupid('popup_before')" class="flex center-height center-width c-pointer btn_xoa">
        <img src="../img/manhimg/xoa.png" class="right-5" alt="khooi phuc">
        <a class="chudo font-medium size-14">Xóa
        </a>
    </div>

</td>
</tr>
<?php endif ?>
<?php endif ?>
<?php endforeach; ?>
                                        <script>
                                            $('.js_chonngay').click(function(){
    $('#show_thietlaptime').removeClass('hidden_tam');
})
                                        </script>