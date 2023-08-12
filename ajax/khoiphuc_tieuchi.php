<?
 include 'config.php';
 $id=getValue('id','int','POST',0);
 $qr=new db_query("UPDATE tbl_tieuchi SET trangthai_xoa=1 WHERE id='".$id."' ");

 $id_de=getValue('id_de','int','POST',0);
 $qr=new db_query("UPDATE de_danhgia SET trangthai_xoa=1 WHERE dg_id='".$id_de."' ");

 $check=getValue('check','str','POST',"");
 $check=trim($check,",");
 $str_check=explode(',',$check);
    foreach ($str_check as $key => $value) {
     $qr=new db_query("UPDATE tbl_tieuchi SET trangthai_xoa=1 WHERE id='".$value."' ");
    }

$check_de=getValue('check_de','str','POST',"");
 $check_de=trim($check_de,",");
 $str_check_de=explode(',',$check_de);
    foreach ($str_check_de as $val) {
     $qr=new db_query("UPDATE de_danhgia SET trangthai_xoa=1 WHERE dg_id='".$val."'  ");
    }



?>
