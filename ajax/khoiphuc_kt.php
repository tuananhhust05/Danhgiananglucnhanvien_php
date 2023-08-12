<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $qr=new db_query("UPDATE de_kiemtra_cauhoi SET is_delete=1 WHERE id='".$id."' ");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
    foreach ($str_check as $key => $value) {
     $qr=new db_query("UPDATE de_kiemtra_cauhoi SET is_delete=1 WHERE id='".$value."'");
    }
?>
