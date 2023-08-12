<?
include 'config.php';
 $dep_id=getValue('dep_id','int','POST',0); 
 $dep_id_chuvu=getValue('dep_id_chuvu','int','POST',0); 
 $data_id_yc=getValue('data_id_yc','int','POST',0); 
 $des=getValue('des','str','POST',""); 
 $name=getValue('name','str','POST',""); 
 $vitri=getValue('vitri2','int','POST',0); 


$query=new db_query("UPDATE tbl_yc_cv SET ten_yeucau = '$name',vitri_yeucau=$vitri,mota_yeucau='$des' where id= $data_id_yc ");
?>