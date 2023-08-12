<?

 include 'config.php';
 
 $phan_loai1=getValue('list_diem','str','POST','');
 $id_phieu=getValue('id_phieu','int','POST',0);
 $dem=getValue('dem','int','POST',0);
 
 $nv_pb=getValue('nv_pb','int','POST',0);
 $sopt=getValue('sopt','int','POST',0);
 $sopt=$sopt-1;
 $nguoi_danhgia=$_SESSION['ep_id'];
$phan_loai = json_decode($phan_loai1,true);

foreach ($phan_loai as $key => $value) {
   $doituong= $value['0'];
   $nhanxet=$value[$sopt];
   
$qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where id_doituong='".$doituong."' and phieu_id='".$id_phieu."' and id_nguoidanhgia ='".$nguoi_danhgia."' ");
$chon=mysql_num_rows($qr->result);

  $arr="";
  $tong=0;
   for ($i=1; $i <= $dem; $i++) { 
      $arr.=$value[$i].",";
      $tong+=$value[$i];
   }
   $arr=trim($arr,",");
   if ($chon==0) {
      
      $qr=new db_query("INSERT INTO  phieu_danhgia_chitiet(id_doituong,doituong_loai,id_nguoidanhgia,phieu_id,cd_diem,nhanxet,tongdiem,id_congty ) VALUES($doituong,$nv_pb,$nguoi_danhgia,$id_phieu,'$arr','$nhanxet',$tong,".$usc_id.")") ;

   }
   else
      
      $qr=new db_query("UPDATE phieu_danhgia_chitiet SET nhanxet='$nhanxet', cd_diem='$arr',tongdiem=$tong WHERE id_doituong=$doituong and id_nguoidanhgia=$nguoi_danhgia and phieu_id=$id_phieu");
   
}

?>
