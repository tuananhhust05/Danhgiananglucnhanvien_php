<?
 include 'config.php';
 if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
 $id_tc=getValue('id_tc','int','POST',0);
 $ten_nguoiduyet=getValue('ten_nguoiduyet','int','POST',0);
 $ngay_duyet=getValue('ngay_duyet','int','POST',0);

 $query=new db_query("UPDATE kh_danhgia SET kh_trangthai = 2 where kh_id= $id_tc ");
 $qr_duyet=new db_query("UPDATE kh_danhgia SET kh_nguoiduyet=$ten_nguoiduyet,kh_ngayduyet=$ngay_duyet where kh_id=$id_tc");
 $qr_sl=new db_query ("SELECT * FROM kh_danhgia where kh_id=$id_tc");
 $row = mysql_fetch_assoc($qr_sl->result);
 

$lap_lai=$row['kh_laplai'];
 $laplai_thu=$row['kh_thu'];

$ngay_bd=$row['kh_ngaybatdau'];

 $ngay_bd_thu=date( "N", $ngay_bd);
 if($ngay_bd_thu<$laplai_thu) $kc_den_ngaylap=$laplai_thu-$ngay_bd_thu;
 if($ngay_bd_thu>$laplai_thu) $kc_den_ngaylap=(6-$ngay_bd_thu)+($laplai_thu);
 if($ngay_bd_thu==$laplai_thu) $kc_den_ngaylap=0;

 $ngay_kt=$row['kh_ngayketthuc'];


$kc_ngay=number_format(floor(($ngay_kt-$ngay_bd)/86400)) ;
if ($kc_ngay>0) {
 $str_ngay = "";
 for ($i=0;$i<$kc_ngay;$i++){
      $str_ngay .= ($ngay_bd +($i *86400)).",";
 }
 $str_ngay=trim($str_ngay,",");
 $str_ngay=explode(",",$str_ngay);
}

 $kc_thang=number_format(floor(($ngay_kt-$ngay_bd)/(86400*30))) ;
 $str_thang = "";
 for ($i=0;$i<$kc_thang;$i++){
      $str_thang .= ($ngay_bd +($i*86400*30)).",";
 }
 $str_thang=trim($str_thang,",");
 $str_thang=explode(",",$str_thang);

 $kc_nam=number_format(floor(($ngay_kt-$ngay_bd)/(86400*365))) ;
 $str_nam = "";
 for ($i=0;$i<$kc_nam;$i++){
      $str_nam .= ($ngay_bd +($i*86400*365)).",";
 }
 $str_nam=trim($str_nam,",");
 $str_nam=explode(",",$str_nam);


 $kc_tuan=number_format(floor((($ngay_kt-$ngay_bd)-($kc_den_ngaylap*86400))/(86400*7))) ;
 $str_tuan = "";
 for ($i=0;$i<$kc_tuan;$i++){
      $str_tuan .= ($ngay_bd +($i*86400*7)+($kc_den_ngaylap*86400) ).",";
 }
 $str_tuan=trim($str_tuan,",");
 $str_tuan=explode(",",$str_tuan);
 

 $last_id=$id_tc;
$time=time();

//Lặp theo ngày
if ($lap_lai==1) {
    if ($kc_ngay==0) {
        $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$ngay_bd,$ngay_kt,$time,$usc_id) ");
    }
    if ($kc_ngay>0) {
      foreach ($str_ngay as  $value) {
       $phieu_ngay_kt=$value;
       $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$value,$phieu_ngay_kt,$time,$usc_id) ");
        } 
    }
}
//Không lặp lại
if ($lap_lai==0) {
   $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$ngay_bd,$ngay_kt,$time,$usc_id) ");
} 
//Lặp lại theo tháng
if ($lap_lai==3) {
    if ($kc_thang<1) {
        $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$ngay_bd,$ngay_kt,$time,$usc_id) ");
    }
    else{
        foreach ($str_thang as $value) {
           $phieu_ngay_kt=$value+(86400*29) ;
           $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$value,$phieu_ngay_kt,$time,$usc_id) ");
        }
    } 
} 
//Lặp lại theo năm
if ($lap_lai==4) {
    if ($kc_nam<1) {
        $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$ngay_bd,$ngay_kt,$time,$usc_id) ");
    }
    else{
        foreach ($str_nam as $value) {
           $phieu_ngay_kt=$value+(86400*364) ;
           $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$value,$phieu_ngay_kt,$time,$usc_id) ");
        }
    } 
} 
//Lặp theo tuần
if ($lap_lai==2) {
    if ($kc_tuan<1) {
        $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$ngay_bd,$ngay_kt,$time,$usc_id) ");
    }
    else{
        foreach ($str_tuan as $value) {
           $phieu_ngay_kt=$value+(86400*7) ;
           $qr=new db_query("INSERT INTO phieu_danhgia(phieuct_id_kh,phieu_ngay_bd,phieu_ngay_kt,phieu_ct_time_tao,id_congty) VALUES($last_id,$value,$phieu_ngay_kt,$time,$usc_id) ");
        }
    } 
} 
?>