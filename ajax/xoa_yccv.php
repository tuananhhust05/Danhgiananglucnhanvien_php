<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 
 $query=new db_query("DELETE from tbl_yc_cv where id= $id ");

?>
