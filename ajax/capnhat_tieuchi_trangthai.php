<?
 include 'config.php';
 $id_tt=getValue('id_tt','int','POST',0);
 $tt=getValue('tt','int','POST',0);
 
 
//C?p nh?t trang thái
 if($tt==1)
   { $qr_tt=new db_query("UPDATE tbl_tieuchi set tcd_trangthai = 2 where id = ".$id_tt." ");
    $qr_tt2=new db_query("UPDATE tbl_tieuchi set tcd_trangthai = 2 where tc_id_tonghop = ".$id_tt." ");
    
   }
else 
 {$qr_tt=new db_query("UPDATE tbl_tieuchi set tcd_trangthai = 1 where id = ".$id_tt." "); 
$qr_tt2=new db_query("UPDATE tbl_tieuchi set tcd_trangthai = 1 where tc_id_tonghop = ".$id_tt." ");
}
//end c?p nh?t tr?ng thái
?>
