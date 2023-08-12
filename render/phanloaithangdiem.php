<?
 include 'config.php';

 $thangdiem=getValue('td','int','POST',0);
 $time=time();
 
 $qr = new db_query("SELECT * FROM tbl_thangdiem WHERE id_congty = ".$usc_id." AND thangdiem = ".$thangdiem."");
 $dem = mysql_num_rows($qr->result);
 $row = mysql_fetch_assoc($qr->result);
 $phanloai=$row['phanloai'];
 $pl= json_decode($phanloai, true);
 

 if ($dem==0) {
   $qr_insert=new db_query("INSERT INTO tbl_thangdiem(thangdiem,update_at,id_congty) VALUES($thangdiem,$time,$usc_id) ");
 }else{
    $qr_update=new db_query("UPDATE tbl_thangdiem SET update_at='".$time."',id_congty='".$usc_id."' WHERE  thangdiem='".$thangdiem."' and  id_congty = ".$usc_id."");
 }
?>
<? if ($phanloai=="") {
  ?>
  <div class="nentrang ">
       <div class="padding15 khoicon">
          <div class=" flex">
              <p class="chudo">Chưa có phân loại </p>
          </div>  
        </div>
    </div>
  <?
}else{
 foreach ($pl as  $value) {
   
    ?>
    
       <div class="padding15 khoicon nentrang">
          <div class=" flex">
              <p class="cacmuc"><?
              if ($value[2]==1) echo "Yếu:"; 
              if ($value[2]==2) echo "Trung bình:"; 
              if ($value[2]==3) echo "Khá:"; 
              if ($value[2]==4) echo "Giỏi:"; 
              if ($value[2]==5) echo "Xuất sắc:"; 
            ?></p>
              <p class="cacketqua"><?=$value[0]?> -> <?=$value[1]?> </p>
          </div>  
        </div>
  
    <?
 }
}
?>
     

