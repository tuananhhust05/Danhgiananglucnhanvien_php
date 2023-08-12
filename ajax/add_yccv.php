<?
include 'config.php';
 $dep_id=getValue('dep_id','int','POST',0); 
 $dep_id_chuvu=getValue('dep_id_chuvu','int','POST',0); 
 $des=getValue('des','str','POST',""); 
 $name=getValue('name','str','POST',""); 
 $vitri=getValue('vitri2','int','POST',0); 
 
 $qr=new db_query("INSERT INTO tbl_yc_cv (id_chucvu,ten_yeucau,vitri_yeucau,id_pb,mota_yeucau,id_congty) 
        VALUES ($dep_id_chuvu,'$name',$vitri,$dep_id,'$des',$usc_id)");
?>