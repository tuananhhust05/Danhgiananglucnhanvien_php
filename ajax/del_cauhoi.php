<?
include 'config.php';
 $id=getValue('id_tc','int','POST',0); 
 $update=new db_query("DELETE from danhsachcauhoi where id=$id");
?>