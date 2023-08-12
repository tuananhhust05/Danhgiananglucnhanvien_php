  <?
 include 'config.php';
 $response = ['status' => false, 'msg' => ''];

if ($_SESSION['quyen']==1){
 	$nv_cty=1;
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
else $nv_cty=2;

$query22= new db_query("SELECT * FROM de_kiemtra_cauhoi where is_delete=1 and id_congty='".$usc_id."'");
$list_de = $query22->result_array();

 $type_taode=getValue('type_taode','int','POST',0);
 $type_dekiemtra=getValue('type_dekiemtra','int','POST',0);
 $checkedradio=getValue('checkedradio','int','POST',0);
 $tdht=getValue('tdht','int','POST',0);
 $str_id=getValue('str_id','str','POST',"");
 $str_id=trim($str_id,",");
 $phan_loai=getValue('phan_loai','str','POST','');
 $pl_macdinh=getValue('pl_macdinh','str','POST',"");
 $ten=getValue('ten','str','POST','');
 $nguoi_tao=$_SESSION['ep_id'];
 $ngay_tao=time();
 $ghi_chu=getValue('ghi_chu','str','POST','');
 
$checktrung=0;
foreach ($list_de as $value_de) {
   if ($value_de['ten_de_kiemtra']==$ten) $checktrung=1;
}   
if ($checktrung==0) {
   if ($checkedradio==1) {//Phan loai mac dinh
   	$insert=new db_query( "INSERT INTO de_kiemtra_cauhoi(hinhthuc_taode, kt_loai, ch_thangdiem, ten_de_kiemtra, nguoitao, ngaytao, ghichu, phanloai_macdinh, phanloaikhac, danhsach_cauhoi,id_congty, congty_or_nv)VALUES ($type_taode,$type_dekiemtra,$tdht,'$ten',$nguoi_tao,$ngay_tao,'$ghi_chu','$pl_macdinh','','$str_id',$usc_id,$nv_cty) ");		
   }
    else{
   	$insert=new db_query( "INSERT INTO de_kiemtra_cauhoi(hinhthuc_taode, kt_loai, ch_thangdiem, ten_de_kiemtra, nguoitao, ngaytao, ghichu, phanloai_macdinh, phanloaikhac, danhsach_cauhoi,id_congty, congty_or_nv)VALUES ($type_taode,$type_dekiemtra,$tdht,'$ten',$nguoi_tao,$ngay_tao,'$ghi_chu','','$phan_loai','$str_id',$usc_id,$nv_cty) ");	
    }

   if ($insert > 0) {
       $response['status'] = true;
       $response['msg'] = 'Thêm mới thành công';
   }
}
else{
   $response['status'] = false;
}
echo json_encode($response);
?>
