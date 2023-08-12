<?
 include 'config.php';
 $checkedradio=getValue('checkedradio','int','POST',0);
 $thangdiem_ht=getValue('thangdiem_ht','int','POST',0);
 $pl_macdinh=getValue('pl_macdinh','str','POST',"");
 $ten=getValue('ten','str','POST','');
 $id=getValue('id','int','POST',0);
 $nguoi_tao=$_SESSION['ep_id'];
 $ngay_tao=time();
 $ghi_chu=getValue('ghi_chu','str','POST','');
 $tieuchi=getValue('tieuchi','str','POST','');
 $tieuchi=trim($tieuchi,",");
 
 $phanloai_vippro=getValue('phan_loai','str','POST','');
   
if ($checkedradio==1) {
	
  $query=new db_query( "UPDATE de_danhgia set dg_ten='$ten',dg_ghichu='$ghi_chu', dg_id_tieuchi='$tieuchi', dg_loai_macdinh='$pl_macdinh',dg_phanloaikhac='' where dg_id= $id");
  
}
 else{
  $query=new db_query( "UPDATE de_danhgia set dg_ten='$ten',dg_ghichu='$ghi_chu', dg_id_tieuchi='$tieuchi', dg_loai_macdinh='',dg_phanloaikhac='$phanloai_vippro' where dg_id= $id");
 }
?>

<?
$id_tc=getValue('id_tc','int','POST',0);

$query=new db_query("UPDATE de_danhgia set trangthai_xoa=2 where dg_id= $id_tc");

?>