<?
 include 'config.php';
 $id_tc_xoa=getValue('id_tc_xoa','int','POST',0);
 $query=new db_query("UPDATE phieu_danhgia SET trangthai_xoa = 2 where id= $id_tc_xoa ");

 $js_xoa_hoanthanh=getValue('js_xoa_hoanthanh','int','POST',0);
 $query=new db_query("UPDATE phieu_danhgia SET trangthai_xoa = 2 where id= $js_xoa_hoanthanh ");

 $id_phieu=getValue('id_phieu','int','POST',0);
 // $query=new db_query("UPDATE phieu_danhgia SET phieuct_trangthai = 2 where id= $id_phieu ");
 $query2=new db_query("UPDATE phieu_danhgia_chitiet SET phieuct_trangthai = 2 where phieu_id= $id_phieu and id_nguoidanhgia='".$_SESSION['ep_id']."'");
 
?>
