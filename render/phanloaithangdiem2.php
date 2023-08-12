<?
 include 'config.php';
 $td=getValue('td','int','POST',0);
 $phan_loai=getValue('phan_loai','str','POST',"");
 $time=time();

$qre=new db_query("UPDATE tbl_thangdiem SET phanloai='".$phan_loai."' WHERE thangdiem='".$td."' and id_congty = '".$usc_id."' ");

$qr = new db_query("SELECT * FROM tbl_thangdiem WHERE id_congty = '".$usc_id."' AND thangdiem = '".$td."'");
$row = mysql_fetch_assoc($qr->result);
$phanloai=$row['phanloai'];
  $pl= json_decode($phanloai, true);
?>
     
<?
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

?>