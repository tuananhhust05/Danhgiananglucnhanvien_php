<?
 include 'config.php';
 $id_tc=getValue('id_tc','int','POST',0);
 $query=new db_query("UPDATE de_kiemtra_cauhoi SET is_delete = 2 where id= $id_tc ");
 
?>
