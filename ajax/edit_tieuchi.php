<?
 include 'config.php';
$id_tc=getValue('id_tc','int','POST',0);

$tcd_ten=getValue('ten','str','POST',"");
$tcd_trangthai=getValue('trang_thai','int','POST',0);
$tcd_thangdiem=getValue('thang_diem','int','POST',0);
$tcd_ghichu=getValue('ghi_chu','str','POST',"");

$query22= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and trangthai_xoa=1 and id!=".$id_tc." and  id_congty = '".$usc_id."'  ");
$list = $query22->result_array();

$check_trung=0;
foreach ($list as  $value_list) {
  if ($value_list['tcd_ten']==$tcd_ten) {
    $check_trung=1;
  }
}
if ($check_trung==0) {
  $trung=0;

$qr= new db_query("UPDATE tbl_tieuchi set  tcd_trangthai = $tcd_trangthai,tcd_thangdiem=$tcd_thangdiem,tcd_ghichu='$tcd_ghichu',tcd_ten='$tcd_ten' where id = ".$id_tc." ");
}
else $trung=1;
echo $trung;
?>
