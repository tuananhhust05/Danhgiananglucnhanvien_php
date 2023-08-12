<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $qr=new db_query("UPDATE kh_danhgia SET trangthai_xoa=1 WHERE kh_id='".$id."' ");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
    foreach ($str_check as $key => $value) {
     $qr=new db_query("UPDATE kh_danhgia SET trangthai_xoa=1 WHERE kh_id='".$value."'");
    }
?>
