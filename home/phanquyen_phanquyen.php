<?include"config.php";
if (!in_array(1, $quyen_phanquyen)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$limit = getValue("limit","int","GET",10);
  
  $nv_id = getValue('nv_id','int','GET',0);
  $nv_id = (int)$nv_id;

  $pb_id = getValue('pb_id','int','GET',0);
  $pb_id = (int)$pb_id;
  $sql="";
  $data_all_nv = ''; 
  $data_all_search = $data_list_nv;
  $page = getValue('page','int','GET',1);

  if( $pb_id == 0 && $nv_id == 0){
    $data_all_nv = $data_list_nv;
    $lien_ket = "&";
    $requst_url = "phan-quyen.html?limit=".$limit;
}

else{
    $lien_ket = "&";
    if($pb_id != 0 && $nv_id == 0){
        $data_all_nv = search($data_list_nv,'dep_id',$pb_id);
        $data_all_search = $data_all_nv;
        $requst_url =  "phan-quyen.html?pb_id=".$pb_id."&limit=".$limit;
    }
    elseif($pb_id == 0 && $nv_id != 0){
        $data_all_nv = search($data_list_nv,'ep_id',$nv_id);
        $data_all_search = $data_all_nv;
        $requst_url =  "phan-quyen.html?nv_id=".$nv_id."&limit=".$limit;
    }
    
}
$page = (int)$page;

$start = ($page - 1) * $limit; 
$end = $page * $limit;
$count = count($data_all_nv);

$geturl = '';
if($nv_id != 0){
    $geturl = "?nv_id=".$nv_id."&limit=".$limit;
}
if($pb_id != 0){
    $geturl = "?pb_id=".$pb_id."&limit=".$limit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân quyền</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/saitaman.css">
    <link rel="stylesheet" type="text/css" href="../css/tatsumaki.css">
</head>
<body>
    <div class="wapper">
        <div class="d_flex">
            <? include('../includes/cd_sidebar.php'); ?>
            <div class="main">
                <div class="header back_w border_r10 w_100">
                    <div class="box_header d_flex space_b align_c position_r">
                        <div class="title_header">
                            <p>Phân quyền</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="phanquyen box-qlinhanvien">
                            <p class="chuden size-14 tieude1024">Phân quyền</p>
                                         
                                <div class="nentrang m_danhmucdanhgia br-10">
                                    <div class="select_no_muti danhmucdanhgia">
                                        <select name="" id="luachon_pb" class="js_select_2 search_value2">
                                            <option value="">Tất cả phòng ban</option>
                                            <? foreach ($arr_dep as  $pb): ?>
                                                <option <?if($pb_id==$pb['dep_id']){echo 'selected' ;}?> value="<?=$pb['dep_id']?>"><?=$pb['dep_name']?></option>
                                            <?endforeach ?> 
                                        </select>
                                    </div>
                                </div>
                                
                            
                            <div class="search-qlnv">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti ql_tieuchi_m">
                                        <select name="" id=""class="js_select_2 search_value">
                                            <option value="">Tìm kiếm nhân viên </option>
                                            <?php foreach ($data_list_nv as $value): ?>
                                                <option <?if($nv_id==$value['ep_id']){echo 'selected' ;}?> value="<?=$value['ep_id']?>"><?=$value['ep_name']?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <img src="../img/manhimg/kinhlup.png" class="kinhlup right-position-15"
                                            alt="timkiem">
                                    </div>
                                </div>

                                <div class="rightsearch flex center-height">
                                    <div class="flex rightsearch_con2">
                                        <button
                                            class="hidden button nenxanh-chutrang un-m-r center-height br-10 size-16 tongso_khoiphuc tong_phanquyen">
                                            <a class=" chutrang font-medium " >
                                                Thiết lập quyền
                                            </a>
                                        </button>

                                       
                                        <a target="_blank" href="/huong_dan.html">
                                    <div class="huongdan flex center-height ">
                                        <img src="../img/manhimg/chamhoi.png" class="wh36" alt="">
                                        <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                    </div>
                                </a>
                                    </div>
                                </div>
                            </div>
                            <div class="khoibang">
                                <div class="bangchung">
                                    <table class="bangchinh chuden">
                                        <tr>
                                            <th>
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Mã NV</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Họ tên</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Phòng ban</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Chức danh</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Chức năng</p>
                                            </th>
                                        </tr>
                                       <? $stt = 1; 
                                            for($i= $start; $i < count($data_all_nv) ; $i++):
                                        ?>
                                        <tr>
                                            <td><?=($i+1) ?></td>
                                            <td>NV<?=$data_all_nv[$i]['ep_id']?></td>
                                            <td class="">
                                                <div class="flex center-height">
                                                    <?if($data_all_nv[$i]['ep_image']!=""){
                                                        ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$data_all_nv[$i]['ep_id'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="">
                                                        <?
                                                    }?>
                                                    <?if($data_all_nv[$i]['ep_image']==""){
                                                        ?>
                                                        <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="">
                                                        <?
                                                    }?> 
                                                    <a class="chuden font-medium size-14"
                                                        href="/phanquyen_chitiet_<?=$data_all_nv[$i]['ep_id']?>.html"><?=$data_all_nv[$i]['ep_name']?>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-left"><?=$data_all_nv[$i]['dep_name']?></td>
                                            <td><?=$array_cv[$data_all_nv[$i]['position_id']]?></td>
                                            <td>
                                                <div class="flex center-center">
                                                    <img src="../../img/manhimg/key.png" class="right-5" alt="">
                                                    <a class="chuxanh size-14" href="/phanquyen_chitiet_<?=$data_all_nv[$i]['ep_id']?>.html">Thiết lập
                                                        quyền
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php if($i == $end-1){ break;} ?>
                                        <?php $stt++; endfor; ?>
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex center-height space top-20">
                            <div class="flex center-height">
                                <p class="right-10"> Hiển thị:</p>
                                <div class="select_no_muti select_no_muti_chon">
                                    <select  class="js_select_2" name="" id="chon_ban_ghi">
                                        <option <?if($limit==2){echo 'selected' ;}?> value="2">2</option>
                                        <option <?if($limit==5){echo 'selected' ;}?> value="5">5</option>
                                        <option <?if($limit==10){echo 'selected' ;}?> value="10">10</option>
                                        <option <?if($limit==20){echo 'selected' ;}?> value="20">20</option>
                                        <option <?if($limit==50){echo 'selected' ;}?> value="50">50</option>
                                        <option <?if($limit==100){echo 'selected' ;}?> value="100">100</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="pagination_vippro">
                                <?php if($limit< $count) {
                                    echo generatePageBar3('',$page,$limit,$count,$requst_url,$lien_ket,'','active','preview','<','next','>','','Đầu','','Cuối');
                                }
                                ?>
                            </div>      
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script>
    $('.js_select_2').select2({
    width: '100%'
});
    $('.search_value').change(function() {
    var key1 = $(this).find(':selected').val();
    if (key1 == "") {
        window.location.href = "/phan-quyen.html";
    } else {
        window.location.href = "/phan-quyen.html?nv_id=" + key1;
    }
})
$('.search_value2').change(function() {
    var key2 = $(this).find(':selected').val();
    if (key2 == "") {
        window.location.href = "/phan-quyen.html";
    } else {
        window.location.href = "/phan-quyen.html?pb_id=" + key2;
    }
})
$('#chon_ban_ghi').change(function() {
    var value = $(this).find(':selected').val();
    var key2 = $('.search_value2').find(':selected').val();
    var key = $('.search_value').find(':selected').val();

    var lien_ket = '';
    if (key != '') {
        lien_ket = "&nv_id=" + key;
    }
    if (key2 != '') {
        lien_ket = "&pb_id=" + key2;
    }
    if (value == "") {
        window.location.href = "/phan-quyen.html";
    } else {
        window.location.href = "/phan-quyen.html?limit=" + value + lien_ket;
    }
});
$('.tong_phanquyen').click(function(){
    var list_chutri = [];
    $('.each_chech').each(function(){
        if ($(this).is(':checked')) {
        list_chutri.push($(this).val());
        }
    }) 
    $.ajax({
            url: 'home/phanquyen_phanquyenchitiet.php',
            type: 'POST',
            data: {
                list_chutri:list_chutri, 
            },
            success: function(data){                    
                
            }
        });
})
</script>
</html>