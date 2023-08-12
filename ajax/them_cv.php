<?
include 'config.php';
 $id_chucvu=getValue('id_chucvu','int','POST',0); 
 $id_phongban=getValue('id_phongban','int','POST',0); 
 $ten_cv=$array_cv["$id_chucvu"];
 $vt_dat_chucvu=getValue('vt_dat_chucvu','int','POST',0); 
 $vt=$vt_dat_chucvu+1;
$bh=time();
 // $qr=new db_query("UPDATE  tbl_chucvu set vitri_chucvu=$vt where id_chucvu=$id_chucvu and id_congty=$usc_id");
 $qr=new db_query("INSERT INTO tbl_chucvu(id_chucvu,ten_chucvu,vitri_chucvu,creat_at,id_phongban,id_congty) VALUES (".$id_chucvu.",'".$ten_cv."',".$vt.",".$bh.",".$id_phongban.",$usc_id) ");
?>