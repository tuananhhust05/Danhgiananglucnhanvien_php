<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $query=new db_query("DELETE FROM kh_danhgia WHERE kh_id = ".$id."");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
 foreach ($str_check as $key => $value) {
     $qr=new db_query("DELETE FROM kh_danhgia WHERE kh_id = ".$value."");
    }
?>