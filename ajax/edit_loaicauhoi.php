<?
include 'config.php';
$response = ['status' => false, 'msg' => ''];
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}

 $ten=getValue('ten','str','POST',''); 
 $mota=getValue('mota','str','POST',''); 
 $id=getValue('id','int','POST',0); 

 $update=new db_query("UPDATE loaicauhoi SET ten_loai= '$ten',ghichu='$mota' where id=$id");
 
 if ($update > 0) {
    $response['status'] = true;
    $response['msg'] = 'Thêm mới thành công';
}
echo json_encode($response);
?>