<?
 include 'config.php';
 
 $phieu_p=getValue('phieu_p','int','POST',0);
 $qr_duyet=new db_query("UPDATE phieu_danhgia_chitiet SET is_duyet=1 where phieu_id=$phieu_p");
 $qr_duyet=new db_query("UPDATE phieu_danhgia SET is_duyet=1 where id=$phieu_p");


?>