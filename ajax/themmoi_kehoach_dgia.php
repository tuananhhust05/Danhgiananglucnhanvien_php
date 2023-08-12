<?
 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
 $ten_kh=getValue('ten_kh','str','POST','');
 $nguoi_tao=$_SESSION['ep_id'];
 $ngay_tao=time();
 $loai_dg=getValue('loai_dg','int','POST',0);
 $lap_lai=getValue('lap_lai','int','POST',0);
 $laplai_thu=getValue('laplai_thu','int','POST',0);


 $ngay_bd=getValue('ngay_bd','str','POST','');
 $ngay_bd=strtotime($ngay_bd);
 $ngay_bd_thu=date( "N", $ngay_bd);
 if($ngay_bd_thu<$laplai_thu) $kc_den_ngaylap=$laplai_thu-$ngay_bd_thu;
 if($ngay_bd_thu>$laplai_thu) $kc_den_ngaylap=(7-$ngay_bd_thu)+($laplai_thu);
 if($ngay_bd_thu==$laplai_thu) $kc_den_ngaylap=0;

 $ngay_kt=getValue('ngay_kt','str','POST','');
 $ngay_kt=strtotime($ngay_kt);

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

      $query=new db_query( "INSERT INTO kh_danhgia(kh_ten, kh_loai, kh_nguoitao, kh_ngaytao, kh_laplai,kh_thu, kh_ngaybatdau,kh_ngayketthuc,kh_giobatdau,kh_gioketthuc,kh_ghichu,kh_id_dg,kh_user_nv,kh_user_dg,id_congty) VALUES ('$ten_kh',1,$nguoi_tao,$ngay_tao,$lap_lai,$laplai_thu,$ngay_bd,$ngay_kt,'$gio_bd','$gio_kt','$ghi_chu',$de_dg_id,'$nhan_vien','$nguoi_danhgia',$usc_id)");
   }
   else{
      $query=new db_query( "INSERT INTO kh_danhgia(kh_ten, kh_loai, kh_nguoitao, kh_ngaytao, kh_laplai,kh_thu, kh_ngaybatdau,kh_ngayketthuc,kh_giobatdau,kh_gioketthuc,kh_ghichu,kh_id_dg,kh_user_pb,kh_user_dg,id_congty) VALUES ('$ten_kh',1,$nguoi_tao,$ngay_tao,$lap_lai,$laplai_thu,$ngay_bd,$ngay_kt,'$gio_bd','$gio_kt','$ghi_chu',$de_dg_id,'$phong_ban','$nguoi_danhgia',$usc_id)");
   }
  
}
 if ($loai_dg==2) {
   $query=new db_query( "INSERT INTO kh_danhgia(kh_ten, kh_loai, kh_nguoitao, kh_ngaytao, kh_laplai,kh_thu, kh_ngaybatdau,kh_ngayketthuc,kh_giobatdau,kh_gioketthuc,kh_ghichu,kh_id_kt,kh_user_nv,kh_user_dg,id_congty) VALUES ('$ten_kh',2,$nguoi_tao,$ngay_tao,$lap_lai,$laplai_thu,$ngay_bd,$ngay_kt,'$gio_bd','$gio_kt','$ghi_chu',$de_kt_id,'$nhan_vien','$nguoi_danhgia',$usc_id)");


 }
 if ($loai_dg==3) {
   $query=new db_query( "INSERT INTO kh_danhgia(kh_ten, kh_loai, kh_nguoitao, kh_ngaytao, kh_laplai, kh_ngaybatdau,kh_ngayketthuc,kh_giobatdau,kh_gioketthuc,kh_ghichu,kh_id_dg,kh_id_kt,kh_user_nv,kh_user_dg,id_congty) VALUES ('$ten_kh',3,$nguoi_tao,$ngay_tao,$lap_lai,$ngay_bd,$ngay_kt,'$gio_bd','$gio_kt','$ghi_chu',$de_dg_id,$de_kt_id_th,'$nhan_vien','$nguoi_danhgia',$usc_id)");
 }


?>
