<?
include 'config.php';
 
 $list_diem=getValue('list_diem','str','POST','');
 $list_diem=trim($list_diem,',');
 $nhanxet=getValue('nhanxet','str','POST','');
 $nguoicham=getValue('nguoicham','int','POST',0);
 $doituong_dccham=getValue('doituong_dccham','int','POST',0);
 $phieu=getValue('phieu','int','POST',0);
 $tongdiem=getValue('tongdiem','int','POST',0);

$qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where id_doituong='".$doituong_dccham."' and phieu_id='".$phieu."' and id_nguoidanhgia ='".$nguoicham."' ");
$row_chamdiem=mysql_fetch_assoc($qr->result);
$dem=mysql_num_rows($qr->result);
 

if ($dem==0) {
	$query_insert=new db_query("INSERT INTO phieu_danhgia_chitiet(id_doituong,doituong_loai,id_nguoidanhgia,phieu_id,cd_diem_ktra,nhanxet_kt,tongdiem_kt,id_congty,trangthai_xoa) VALUES($doituong_dccham,0,$nguoicham,$phieu,'$list_diem','$nhanxet',$tongdiem,$usc_id,1) ");
}else{
	$query_update=new db_query("UPDATE phieu_danhgia_chitiet SET cd_diem_ktra = '$list_diem',nhanxet_kt= '$nhanxet',tongdiem_kt =$tongdiem where id_doituong='".$doituong_dccham."' and phieu_id='".$phieu."' and id_nguoidanhgia ='".$nguoicham."' ");
}
?>