<?
include 'config.php';
$response = ['status' => false, 'msg' => ''];
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}

 $ten=getValue('ten','str','POST',''); 
 $mota=getValue('mota','str','POST',''); 
 $nguoi_tao=$_SESSION['ep_id'];
 $create=time();

 $insert=new db_query("INSERT INTO loaicauhoi (ten_loai,nguoitao,id_congty,created_at,ghichu) 
        VALUES ('$ten',$nguoi_tao,$usc_id,$create,'$mota')");
 if ($insert > 0) {
    $response['status'] = true;
    $response['msg'] = 'Thêm mới thành công';
}
echo json_encode($response);
?>