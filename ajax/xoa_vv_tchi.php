<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $query=new db_query("DELETE FROM tbl_tieuchi WHERE tc_id_tonghop = ".$id." or id= ".$id." ");

 $id_de=getValue('id_de','int','POST',0);
 $query=new db_query("DELETE FROM de_danhgia WHERE dg_id = ".$id_de."");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
 foreach ($str_check as $key => $value) {
     $qr=new db_query("DELETE FROM tbl_tieuchi WHERE tc_id_tonghop = ".$value." or id= ".$value." ");
    }
?>