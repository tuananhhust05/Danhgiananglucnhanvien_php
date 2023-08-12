<?
include 'config.php';
$data = ['tong_tc_don' => 0, 'tong_tc_cha' => 0];
 $id_tc_tonghop=getValue('id_tc_tonghop','int','POST',0); 
 $query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=1 and tc_id_tonghop=".$id_tc_tonghop." and trangthai_xoa=1 and (id_congty ='$usc_id' or id_congty=1) ");
 $row = $query->result_array();
 $s=0;
 foreach ($row as $key => $value) {
      $s+=$value['tcd_thangdiem'];  
 }

 $que= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and id=".$id_tc_tonghop." and (id_congty ='$usc_id' or id_congty=1) ");
 $rowto = mysql_fetch_assoc($que->result);
 $s_cha=number_format($rowto['tcd_thangdiem']);
 $data['tong_tc_don'] = $s;
 $data['tong_tc_cha'] = $s_cha;

echo json_encode($data); 
?>