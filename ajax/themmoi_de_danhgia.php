<?

 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
}
 $thangdiem_ht=getValue('thangdiem_ht','int','POST',0);
 $pl_macdinh=getValue('pl_macdinh','str','POST',"");
 $checkedradio=getValue('checkedradio','int','POST',0);
 $ten=getValue('ten','str','POST','');
 $nguoi_tao=$_SESSION['ep_id'];
 $ngay_tao=time();
 $ghi_chu=getValue('ghi_chu','str','POST','');
 $tieuchi=getValue('tieuchi','str','POST','');
 $tieuchi=trim($tieuchi,",");
 $phanloai_vippro=getValue('phan_loai','str','POST','');
if ($checkedradio==1) {
  $query=new db_query( "INSERT INTO de_danhgia(dg_ten, dg_nguoitao, dg_ngaytao, dg_thangdiem_id,dg_id_tieuchi,dg_ghichu,dg_loai_macdinh,id_congty)VALUES ('$ten',$nguoi_tao,$ngay_tao,$thangdiem_ht,'$tieuchi','$ghi_chu','$pl_macdinh',$usc_id) ");
}
 else{
  $query=new db_query( "INSERT INTO de_danhgia(dg_ten, dg_nguoitao, dg_ngaytao, dg_thangdiem_id,dg_id_tieuchi,dg_ghichu,dg_phanloaikhac,id_congty)VALUES ('$ten',$nguoi_tao,$ngay_tao,$thangdiem_ht,'$tieuchi','$ghi_chu','$phanloai_vippro',$usc_id) ");
 }
?>
