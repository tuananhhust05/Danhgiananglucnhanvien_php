<?
include 'config.php';
 $id=getValue('id','int','POST',0);

 $qr=new db_query("DELETE from tbl_chucvu where id=$id and id_congty=$usc_id");
 
?>