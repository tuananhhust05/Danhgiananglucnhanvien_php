<?include 'config.php';
    $key = getValue("keyword","str","GET","");
$key = replaceMQ($key);


$page = getValue("page","int","GET",1);
$page = (int)$page;
$limit = getValue("limit","int","GET",5);
$start = ($page -1) * $limit;

//link phân trang
$link = $_SERVER['REDIRECT_URL'];
$lien_ket = "?";
if($limit != 5){
    $lien_ket = "&";
    $link .= "?limit=".$limit;
    if ($key !="") {
        $link .= "&keyword=".$key;
    }
  
}else{
    if ($key !="") {
        $lien_ket = "&";
        $link .= "?keyword=".$key;
    }
 
}

// xử lý truy vấn
$sql="";
if (!empty($key)){
    if (is_numeric($key)==true){
        $sql .=" AND id = '".$key."'";
    }
}
    $qr=new db_query("SELECT * FROM de_kiemtra_cauhoi WHERE id_congty='$usc_id' and is_delete=2 ".$sql." ORDER BY id DESC LIMIT $start, $limit");
    $query2= new db_query("SELECT * FROM de_kiemtra_cauhoi WHERE id_congty='$usc_id' and is_delete=2 ".$sql."");
    $count_tong_vippro = mysql_num_rows($query2->result);
    $row = $qr->result_array();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa-Đề kiểm tra</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/saitaman.css">
    <link rel="stylesheet" type="text/css" href="../css/tatsumaki.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
</head>

<body>
    <div class="wapper">
        <div class="d_flex">
            <? include('../includes/cd_sidebar.php'); ?>
            <div class="main">
                <div class="header back_w border_r10 w_100">
                    <div class="box_header d_flex space_b align_c position_r">
                        <div class="title_header flex center-height">
                            <a href="/xoaganday-dulieuxoaganday.html">
                                <div class="flex center-height right-10 c-pointer">
                                    <img src="../img/manhimg/back.png" alt="Quay lai">
                                </div>
                            </a>
                            <p>Dữ liệu đã xóa gần đây / Đề kiểm tra</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="dekiemtra box-qlinhanvien">
                            <div class="tieude1024 size-14 flex center-height bot-15">
                                <a href="/xoaganday-dulieuxoaganday.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Dữ liệu đã xóa gần đây / Đề kiểm tra</p>
                            </div>
                            <div class="search-qlnv">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti ql_tieuchi_m">
                                        <select name="" id=""class="js_select_2 search_value">
                                            <option value="">Tìm kiếm theo tên đề kiểm tra</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM de_kiemtra_cauhoi WHERE id_congty = '".$usc_id."' AND is_delete = 2 ");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option <?if($key !='' && $key==$nhom_timkiem['id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['id']?>"><?=$nhom_timkiem['ten_de_kiemtra']?>
                                            </option>
                                            <?}?>
                                        </select>
                                        <img src="../img/manhimg/kinhlup.png" class="kinhlup right-position-15"
                                            alt="timkiem">
                                    </div>
                                </div>
                                <div class="rightsearch flex center-height">
                                    <div class="flex rightsearch_con2">
                                        <button
                                            class="hidden button btn-nentrang-chuxanh un-m-r center-height br-10 size-16 c-pointer tongso_xoavv"
                                            onclick="hienpopupid('popup_before')">
                                            <p class=" chuxanh font-medium">
                                                Xóa vĩnh viễn
                                            </p>
                                        </button>
                                        <button
                                            class="hidden button nenxanh-chutrang un-m-r center-height br-10 size-16 c-pointer tongso_khoiphuc"
                                            onclick="hienpopupid('popup_before')">
                                            <p class=" chutrang font-medium ">
                                                Khôi phục
                                            </p>
                                        </button>

                                        

                                        <a href="/huong_dan.html">
                                            <div class="huongdan flex center-height ">
                                                <img src="../img/manhimg/chamhoi.png" class="wh36" alt="">
                                                <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="khoibang po_r">
                                <div class="thanh_dk">
                                    <div class="turn turn_left" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                                </div>
                                <div class="bangchung" id="bang_chung">
                                    <table class="bangchinh chuden">
                                        <tr>
                                            <th>
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Tên đề kiểm tra</p>
                                            </th>

                                            <th>
                                                <p class="phantucon">Người tạo</p>
                                            </th>

                                            <th>
                                                <p class="phantucon">Số câu hỏi</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Ghi chú</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Ngày xóa</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Chức năng</p>
                                            </th>
                                        </tr>
                                        <?php foreach ($row as  $value): ?>
                                            <tr>
                                            <td><input class="wh16 js_checkbox" type="checkbox" value="<?=$value['id'];?>"></td>
                                            <td class="chuxanh text-left "><?=$value['ten_de_kiemtra'];?></td>
                                            <td class="">
                                                <div class="flex center-height">
                                                    <?php if ($value['nguoitao']==$value['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$value['nguoitao'])[0]['com_logo']!=""): ?>
                                                           
                                                            <img class="wh26_ra " src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$value['nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$value['nguoitao'])[0]['com_logo']==""): ?>
                                                            
                                                            <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                           
                                                        <?php endif ?>

                                                        <p class="size-14 left-10"><?=search($cty,'com_id',$value['nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($value['nguoitao']!=$value['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image'];?>" class="wh26_ra " alt="người đánh giá">
                                                       
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                             
                                                         <?php endif ?>
                                                         <p class="size-14 left-10"><?=search($data_list_nv,'ep_id',$value['nguoitao'])[0]['ep_name'];?>
                                                        </p>
                                                     <?php endif ?>
                                                </div>
                                            </td>
                                            <td class="text-right"><? $cauhoi= explode(',',$value['danhsach_cauhoi']);echo count($cauhoi);?></td>
                                            <td class="text-left"><?=$value['ghichu']?></td>
                                            <td>
                                                <?=$value['kt_capnhat']?>
                                            </td>
                                            <td>
                                                <div class="flex center-height space">
                                                    
                                                        <img src="../img/manhimg/khoiphuc.png" class="right-5"
                                                            alt="khooi phuc">
                                                        <p data-name="<?=$value['ten_de_kiemtra']?>" data-id="<?=$value['id']?>" class="chuxanh font-medium js_khoiphuc c-pointer  size-14">Khôi phục
                                                        </p>
                                                   
                                                    
                                                        <p class="chuxanh right-5 left-5">|</p>
                                                        <img src="../img/manhimg/xoa.png" class="right-5"
                                                            alt="khooi phuc">
                                                        <p data-name="<?=$value['ten_de_kiemtra']?>" data-id="<?=$value['id']?>" class="chudo font-medium js_xoa c-pointer size-14">Xóa
                                                        </p>
                                                 
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        
                                        
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
                                <?php if($limit< $count_tong_vippro) {
                                    echo generatePageBar3('',$page,$limit,$count_tong_vippro,$link,$lien_ket,'','active','preview','<','next','>','','<<<','','>>>');
                                }
                                ?>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<div id="popup_before" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change"></h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5"></div>

                <div class="khoibutton_form top-70">
                    <div 
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div 
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before">
                        Đồng ý
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div id="popup_thanhcong" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center"></p>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>

</html>
<script type="text/javascript">
$('.js_select_2').select2({
    width: '100%'
});
   $('.search_value').change(function(e) {

    search_nhom_ts();

})


function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/xoaganday-de-kiem-tra.html";
    } else {
        window.location.href = "/xoaganday-de-kiem-tra.html?keyword=" + key + "&limit=" + limit;
    }
}

$('#chon_ban_ghi').change(function() {
    var value = $(this).find(':selected').val();
    var key = $('.search_value').val();

    var lien_ket = '';
    if (key != '') {
        lien_ket = "&keyword=" + key;
    }
    if (value == "") {
        window.location.href = "/xoaganday-de-kiem-tra.html";
    } else {
        window.location.href = "/xoaganday-de-kiem-tra.html?limit=" + value + lien_ket;
    }
});

$('.js_khoiphuc').click(function(){
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('.btnluu_before').attr('data-id',id);
        $('.h4_change').text('Khôi phục đề kiểm tra');
        $('.text_before_change').html('Bạn có chắc chắn muốn khôi phục đề kiểm tra<br> <span class="font-medium">'+name+'</span>?');
        $('#popup_before').removeClass('hidden');
         $('.change_text_tc').html('Khôi phục đề kiểm tra <span class="font-medium">'+name+'</span> thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/khoiphuc_kt.php',
            type: 'POST',
            data: {
                id:id, 
            },
            success: function(data){            
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-de-kiem-tra.html';
                })
            }
        }); 
        })
    })

    $('.js_xoa').click(function(){
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('.btnluu_before').attr('data-id',id);
        $('.h4_change').text('Xoá vĩnh viễn đề kiểm tra');
        $('.text_before_change').html('Bạn có chắc chắn muốn xoá vĩnh viễn đề kiểm tra<br><span class="font-medium">'+name+'</span>?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Xoá vĩnh viễn đề kiểm tra <span class="font-medium">'+name+'</span> thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/xoa_vv_kt.php',
            type: 'POST',
            data: {
                id:id, 
            },
            success: function(data){            
                
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-de-kiem-tra.html';
                })
            }
        }); 
        })

    })

    $('.tongso_khoiphuc').click(function(){
        var check="";
        $('.js_checkbox').each(function(){
            if($(this).is(':checked'))check+=$(this).val()+",";
        })
        $('.h4_change').text('Khôi phục đề kiểm tra');
        $('.text_before_change').html('Bạn có chắc chắn muốn khôi phục các đề kiểm tra đã chọn?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Khôi phục đề kiểm tra thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/khoiphuc_kt.php',
            type: 'POST',
            data: {
                check:check, 
            },
            success: function(data){            
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-de-kiem-tra.html';
                })
            }
        }); 
        })

    })

    $('.tongso_xoavv').click(function(){
        var check="";
        $('.js_checkbox').each(function(){
            if($(this).is(':checked'))check+=$(this).val()+",";
        })
        $('.h4_change').text('Xoá vĩnh viễn đề kiểm tra');
        $('.text_before_change').html('Bạn có chắc chắn muốn xoá vĩnh viễn các đề kiểm tra đã chọn?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Xoá vĩnh viễn đề kiểm tra thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/xoa_vv_kt.php',
            type: 'POST',
            data: {
                check:check, 
            },
            success: function(data){                    
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-de-kiem-tra.html';
                })
            }
        }); 
        })

    })
</script>