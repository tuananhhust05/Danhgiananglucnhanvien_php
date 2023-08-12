<?
include 'config.php';
$response = ['status' => false, 'msg' => ''];
if ($_SESSION['quyen']==1){
    $ct_nv=1;
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}else $ct_nv=2;

$m=getValue('m','int','POST',0); 
$dapan=getValue('dap_an','str','POST',""); 
$img_cauhoi=getValue('img_cauhoi','str','POST',""); 
$cauhoi=getValue('cauhoi','str','POST',""); 
$hinhthuc=getValue('hinhthuc','int','POST',0); 
$id=getValue('id_cauhoi','int','POST',0); 
$loai=getValue('loai','int','POST',0); 
$sodiem=getValue('sodiem','str','POST',''); 
$thoigian_thuchien=getValue('thoigian_thuchien','int','POST',0); 
$create=time();
$nguoi_tao=$_SESSION['ep_id'];

 $path="uploads/";//server path
    foreach ($_FILES as $key) {
        if($key['error'] == UPLOAD_ERR_OK ){
            $name = $key['name'];
            $temp = $key['tmp_name'];
            $size= ($key['size'] / 1000)."Kb";
            move_uploaded_file($temp, $path. $name);
        }
    }
if ($m==0){
$update=new db_query("UPDATE danhsachcauhoi SET cauhoi='$cauhoi',loai='$loai',sodiem='$sodiem',thoigian_thuchien=$thoigian_thuchien,dap_an='$dapan',created_at=$create,nguoi_capnhat=$nguoi_tao,congty_or_nv=$ct_nv WHERE id= '".$id."'");
}
else{
$update=new db_query("UPDATE danhsachcauhoi SET cauhoi='$cauhoi',loai='$loai',sodiem='$sodiem',thoigian_thuchien=$thoigian_thuchien,dap_an='$dapan',created_at=$create,nguoi_capnhat=$nguoi_tao,img_cauhoi='$img_cauhoi',congty_or_nv=$ct_nv WHERE id= '".$id."'");
}
 if ($update > 0) {
    $response['status'] = true;
    $response['msg'] = 'Thêm mới thành công';
}
echo json_encode($response);
?>