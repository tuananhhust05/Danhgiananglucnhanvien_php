<?
include 'config.php';
 $id_edit=getValue('id_edit','int','POST',0); 
 $vt_dat_chucvu=getValue('vt_dat_chucvu','int','POST',0); 
 $vt=$vt_dat_chucvu+1;

 $qr=new db_query("UPDATE  tbl_chucvu set vitri_chucvu=$vt where id=$id_edit and id_congty=$usc_id");
 
?>