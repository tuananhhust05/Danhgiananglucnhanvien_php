<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $qr=new db_query("UPDATE phieu_danhgia SET trangthai_xoa=1 WHERE id='".$id."' ");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
    foreach ($str_check as $key => $value) {
     $qr=new db_query("UPDATE phieu_danhgia SET trangthai_xoa=1 WHERE id='".$value."'");
    }
?>
