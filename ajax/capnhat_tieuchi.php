<?
 include 'config.php';
 $id_tc=getValue('id_tc','int','POST',0);
 $id_tt=getValue('id_tt','int','POST',0);
 $tt=getValue('tt','int','POST',0);

$query22= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and trangthai_xoa=1 and  id_congty = '".$usc_id."'  ");
$list = $query22->result_array(); 


$response = 0;

$tcd_ten=getValue('ten','str','POST',"");
$tcd_loai=getValue('loai_tc','int','POST',0);
$tcd_trangthai=getValue('trang_thai','int','POST',0);
$tcd_nguoitao=getValue('nguoi_tao','int','POST',0);
$tcd_ngaytao=getValue('ngay_tao','int','POST',0);
$tcd_thangdiem=getValue('thang_diem','int','POST',0);
$tc_id_tonghop=getValue('tc_tonghop','int','POST',0);
$tcd_ghichu=getValue('ghi_chu','str','POST',"");

$check_trung=0;
foreach ($list as  $value_list) {
  if ($value_list['tcd_ten']==$tcd_ten) {
    $check_trung=1;
  }
} 
if ($check_trung==0) {
  $trung=0;
  if ($tcd_loai==1) {
    
  $qr_add=new db_query("INSERT INTO tbl_tieuchi (tcd_ten, tcd_loai, tc_id_tonghop, tcd_trangthai, tcd_nguoitao, tcd_ngaytao, tcd_thangdiem, tcd_ghichu, id_congty) VALUES ('$tcd_ten',$tcd_loai,$tc_id_tonghop,$tcd_trangthai,$tcd_nguoitao,$tcd_ngaytao,$tcd_thangdiem,'$tcd_ghichu',$usc_id) ");
  }
  else{
    
    $qr_add=new db_query("INSERT INTO tbl_tieuchi (tcd_ten, tcd_loai, tc_id_tonghop, tcd_trangthai, tcd_nguoitao, tcd_ngaytao, tcd_thangdiem, tcd_ghichu, id_congty) VALUES ('$tcd_ten',$tcd_loai,'',$tcd_trangthai,$tcd_nguoitao,$tcd_ngaytao,$tcd_thangdiem,'$tcd_ghichu',$usc_id) ");
  }

}
else $trung=1;
echo $trung;
?>
