<?
 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
 $id_tc=getValue('id_tc','int','POST',0);
 $id_tc_tchoi=getValue('id_tc_tchoi','int','POST',0);
 $id_tc_xoa=getValue('id_tc_xoa','int','POST',0);
 

 $query=new db_query("UPDATE kh_danhgia SET kh_trangthai = 2 where kh_id= $id_tc ");
 $query=new db_query("UPDATE kh_danhgia SET kh_trangthai = 3 where kh_id= $id_tc_tchoi ");
 $query=new db_query("UPDATE kh_danhgia SET trangthai_xoa = 2 where kh_id= $id_tc_xoa ");
 $query=new db_query("UPDATE phieu_danhgia SET trangthai_xoa = 2 where phieuct_id_kh= $id_tc_xoa ");
 // $query=new db_query("DELETE FROM phieu_danhgia  where phieuct_id_kh= $id_tc_tchoi");

 $ten_nguoiduyet=getValue('ten_nguoiduyet','int','POST',0);
 $ngay_duyet=getValue('ngay_duyet','int','POST',0);
 $qr_duyet=new db_query("UPDATE kh_danhgia SET kh_nguoiduyet=$ten_nguoiduyet,kh_ngayduyet=$ngay_duyet where kh_id=$id_tc");
?>


<?
$it_tong=getValue('it_tong','int','POST',0);
 $ten_kh=getValue('ten_kh','str','POST','');
 $loai_dg=getValue('loai_dg','int','POST',0);
 $lap_lai=getValue('lap_lai','int','POST',0);
 $laplai_thu=getValue('laplai_thu','int','POST',0);
 $ngay_bd=getValue('ngay_bd','str','POST','');
 $ngay_bd=strtotime(date($ngay_bd));
 $ngay_kt=getValue('ngay_kt','str','POST','');
 $ngay_kt=strtotime(date($ngay_kt));
 $gio_bd=getValue('gio_bd','str','POST','');
 $gio_kt=getValue('gio_kt','str','POST','');
 $ghi_chu=getValue('ghi_chu','str','POST','');

 $de_dg_id=getValue('de_dg_id','int','POST',0);
 $de_kt_id=getValue('de_kt_id','int','POST',0);
 $de_kt_id_th=getValue('de_kt_id_th','int','POST',0);
 $check_nv_or_pb=getValue('check_nv_or_pb','int','POST',0);

 $nhan_vien=getValue('nhan_vien','str','POST','');
 $nhan_vien=trim($nhan_vien,",");
 $phong_ban=getValue('phong_ban','str','POST','');
 $phong_ban=trim($phong_ban,",");
 $nguoi_danhgia=getValue('nguoi_danhgia','str','POST','');
 $nguoi_danhgia=trim($nguoi_danhgia,",");
 
if ($loai_dg==1) {
   if ($check_nv_or_pb==1) {
    
      $query=new db_query( "UPDATE kh_danhgia SET kh_ten='$ten_kh', kh_loai=$loai_dg,kh_laplai=$lap_lai,kh_thu=$laplai_thu, kh_ngaybatdau=$ngay_bd,kh_ngayketthuc=$ngay_kt,kh_giobatdau='$gio_bd',kh_gioketthuc='$gio_kt',kh_ghichu='$ghi_chu',kh_id_dg=$de_dg_id,kh_user_nv='$nhan_vien',kh_user_dg='$nguoi_danhgia',id_congty=$usc_id where kh_id=$it_tong");
   }
   else{
      $query=new db_query( "UPDATE kh_danhgia SET kh_ten='$ten_kh', kh_loai=$loai_dg,kh_laplai=$lap_lai,kh_thu=$laplai_thu, kh_ngaybatdau=$ngay_bd,kh_ngayketthuc=$ngay_kt,kh_giobatdau='$gio_bd',kh_gioketthuc='$gio_kt',kh_ghichu='$ghi_chu',kh_id_dg=$de_dg_id,kh_user_pb='$phong_ban',kh_user_dg='$nguoi_danhgia',id_congty=$usc_id where kh_id=$it_tong");
   }
  
}
 if ($loai_dg==2) {

   $query=new db_query( "UPDATE kh_danhgia SET kh_ten='$ten_kh', kh_loai=$loai_dg,kh_laplai=$lap_lai,kh_thu=$laplai_thu, kh_ngaybatdau=$ngay_bd,kh_ngayketthuc=$ngay_kt,kh_giobatdau='$gio_bd',kh_gioketthuc='$gio_kt',kh_ghichu='$ghi_chu',kh_id_kt=$de_kt_id,kh_user_nv='$nhan_vien',kh_user_dg='$nguoi_danhgia',id_congty=$usc_id where kh_id=$it_tong");
 }
 if ($loai_dg==3) {
   $query=new db_query( "UPDATE kh_danhgia SET kh_ten='$ten_kh', kh_loai=$loai_dg,kh_laplai=$lap_lai,kh_thu=$laplai_thu, kh_ngaybatdau=$ngay_bd,kh_ngayketthuc=$ngay_kt,kh_giobatdau='$gio_bd',kh_gioketthuc='$gio_kt',kh_ghichu='$ghi_chu',kh_id_dg=$de_dg_id,kh_id_kt=$de_kt_id_th,kh_user_nv='$nhan_vien',kh_user_dg='$nguoi_danhgia',id_congty=$usc_id where kh_id=$it_tong");
   
 }
?>
