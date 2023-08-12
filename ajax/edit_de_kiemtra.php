  <?
 include 'config.php';
 $response = ['status' => false, 'msg' => ''];

 if ($_SESSION['quyen']==1){
  $nv_cty=1;
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
else $nv_cty=2;

 $id_de=getValue('id_de','int','POST',0);
 $checkedradio=getValue('checkedradio','int','POST',0);
 $tdht=getValue('tdht','int','POST',0);
 $str_id=getValue('str_id','str','POST',"");
 $str_id=trim($str_id,",");
 $phan_loai=getValue('phan_loai','str','POST','');
 $pl_macdinh=getValue('pl_macdinh','str','POST',"");
 $ten=getValue('ten','str','POST','');
 $ghi_chu=getValue('ghi_chu','str','POST','');
   
if ($checkedradio==1) {//Phan loai mac dinh
 
  $update=new db_query( "UPDATE  de_kiemtra_cauhoi SET ten_de_kiemtra = '$ten',ghichu='$ghi_chu', phanloai_macdinh='$pl_macdinh', phanloaikhac='', danhsach_cauhoi='$str_id',congty_or_nv=$nv_cty WHERE id=$id_de");   
}
 else{
  
  $update=new db_query( "UPDATE  de_kiemtra_cauhoi SET ten_de_kiemtra = '$ten',ghichu='$ghi_chu', phanloai_macdinh='', phanloaikhac='$phan_loai', danhsach_cauhoi='$str_id',congty_or_nv=$nv_cty WHERE id=$id_de");
 }

if ($update > 0) {
    $response['status'] = true;
    $response['msg'] = 'Thêm mới thành công';
}
echo json_encode($response);
?>
  <?
 include 'config.php';
 $kt_id=getValue('kt_id','int','POST',0);

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
  $query=new db_query( "UPDATE de_kiemtra SET  kt_ten='$ten',kt_ghichu='$ghi_chu',kt_phanloai_khac='', mang_cauhoi='$cauhoi', kt_phanloai_macdinh='$pl_macdinh' WHERE kt_id= '".$kt_id."'");
}
 else{
  $query=new db_query( "UPDATE de_kiemtra SET  kt_ten='$ten',kt_ghichu='$ghi_chu',kt_phanloai_macdinh='', mang_cauhoi='$cauhoi', kt_phanloai_khac='$phanloai_vippro' WHERE kt_id= '".$kt_id."'");
 }
?>
