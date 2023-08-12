  <?
 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
 $checkedradio=getValue('checkedradio','int','POST',0);
 $thangdiem_ht=getValue('thangdiem_ht','int','POST',0);
 $pl_macdinh=getValue('pl_macdinh','str','POST',"");
 $ten=getValue('ten','str','POST','');
 $cauhoi=getValue('cauhoi','str','POST','');
 $nguoi_tao=$_SESSION['ep_id'];
 $ngay_tao=time();
 $ghi_chu=getValue('ghi_chu','str','POST','');
 $phanloai_vippro=getValue('phan_loai','str','POST','');
   
if ($checkedradio==1) {
  $query=new db_query( "INSERT INTO de_kiemtra(kt_ten, kt_nguoitao, kt_ngaytao, kt_thangdiem,kt_ghichu,kt_phanloai_macdinh,id_congty,mang_cauhoi)VALUES ('$ten',$nguoi_tao,$ngay_tao,$thangdiem_ht,'$ghi_chu','$pl_macdinh',$usc_id,'$cauhoi') ");
}
 else{
  $query=new db_query( "INSERT INTO de_kiemtra(kt_ten, kt_nguoitao, kt_ngaytao, kt_thangdiem,kt_ghichu,kt_phanloai_khac,id_congty,mang_cauhoi)VALUES ('$ten',$nguoi_tao,$ngay_tao,$thangdiem_ht,'$ghi_chu','$phanloai_vippro',$usc_id,'$cauhoi') ");
 }
?>
