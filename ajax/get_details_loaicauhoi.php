<?
include 'config.php';
 $id=getValue('id','int','POST',0);

 $response = ['status' => false, 'msg' => ''];
 
 $qr=new db_query("SELECT * FROM loaicauhoi WHERE id_congty = ".$usc_id." AND id = $id ");
 $info = mysql_fetch_assoc($qr->result);
 if ($info !== null) {
    $response['status'] = true;
    $response['data'] = $info;
}
echo json_encode($response);
?>