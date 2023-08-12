<?
 include 'config.php';
 $id_tc=getValue('id_tc','int','POST',0);
 $id_tt=getValue('id_tt','int','POST',0);
 $tt=getValue('tt','int','POST',0);
 
 
 $query=new db_query("UPDATE tbl_tieuchi SET trangthai_xoa = 2 where id=".$id_tc." or tc_id_tonghop= ".$id_tc."");

?>
