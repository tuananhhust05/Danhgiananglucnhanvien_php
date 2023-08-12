<?
include 'config.php';
$response = ['status' => false, 'msg' => ''];
if ($_SESSION['quyen']==1){
    $ct_nv=1;
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}else $ct_nv=2;

$dapan=getValue('dap_an','str','POST',""); 
$img_cauhoi=getValue('img_cauhoi','str','POST',""); 
$cauhoi=getValue('cauhoi','str','POST',""); 
$hinhthuc=getValue('hinhthuc','int','POST',0); 
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
    
$insert=new db_query("INSERT INTO danhsachcauhoi (cauhoi,hinhthuc,loai,sodiem,thoigian_thuchien,dap_an,created_at,nguoi_capnhat,id_congty,img_cauhoi,congty_or_nv) 
        VALUES ('$cauhoi',$hinhthuc,$loai,'$sodiem',$thoigian_thuchien,'$dapan',$create,$nguoi_tao,$usc_id,'$img_cauhoi',$ct_nv)");

 if ($insert > 0) {
    $response['status'] = true;
    $response['msg'] = 'Thêm mới thành công';
}
echo json_encode($response);
?>