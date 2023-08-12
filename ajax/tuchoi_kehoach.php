<?
 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
 
 $id_tc_tchoi=getValue('id_tc_tchoi','int','POST',0);
 $ten_tchoi=getValue('ten_tchoi','int','POST',0);
 $ngay_tchoi=time();
 $qr_duyet=new db_query("UPDATE kh_danhgia SET kh_trangthai=3, ten_tchoi=$ten_tchoi,ngay_tchoi=$ngay_tchoi where kh_id=$id_tc_tchoi");
 
?>




