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
        $sql .=" AND kh_id = '".$key."'";
    }
}
    $qr=new db_query("SELECT * FROM kh_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2 ".$sql." ORDER BY kh_id DESC LIMIT $start, $limit");
    $query2= new db_query("SELECT * FROM kh_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2 ".$sql."");
    $count_tong_vippro = mysql_num_rows($query2->result);
    $row = $qr->result_array();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa-Kế hoạch đánh giá</title>
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
                            <p>Dữ liệu đã xóa gần đây / Kế hoạch đánh giá</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="kehoachdanhgia box-qlinhanvien">
                            <div class="tieude1024 size-14 flex center-height bot-15">
                                <a href="/xoaganday-dulieuxoaganday.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Dữ liệu đã xóa gần đây / Kế hoạch đánh giá</p>
                            </div>
                            <div class="search-qlnv">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti ql_tieuchi_m">
                                        <select name="" id=""class="js_select_2 search_value">
                                            <option value="">Tìm kiếm theo tên kế hoạch đánh giá</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM kh_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2");
                                            while($nhom_timkiem  = mysql_fetch_assoc($q_all_nhom->result)){
                                        ?>
                                            <option <?if($key !='' && $key==$nhom_timkiem['kh_id']){echo 'selected'
                                                ;}?>
                                                value="<?=$nhom_timkiem['kh_id']?>"><?=$nhom_timkiem['kh_ten']?>
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
                                            class="hidden button btn-nentrang-chuxanh un-m-r center-height br-10 size-16 c-pointer tongso_xoavv">
                                            <p class=" chuxanh font-medium">
                                                Xóa vĩnh viễn
                                            </p>
                                        </button>
                                        <button
                                            class="hidden button nenxanh-chutrang un-m-r center-height br-10 size-16 c-pointer tongso_khoiphuc">
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
                               <!--  <div class="thanh_dk">
                                    <div class="turn turn_left" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                                </div> -->
                                <div class="bangchung" id="bang_chung">
                                    <table class="bangchinh chuden">
                                        <tr>
                                            <th>
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Tên kế hoạch đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Trạng thái</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Người tạo</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Người đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Người được đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Thời gian</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Tiến độ</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Ghi chú</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Chức năng</p>
                                            </th>
                                        </tr>
                                        <?php foreach ($row as $val): ?>
                                            <tr>
                                            <td><input class="wh16 js_checkbox" type="checkbox" value="<?=$val['kh_id']?>"></td>
                                            <td class="chuxanh text-left font-medium"><?=$val['kh_ten']?></td>
                                            <td class="<? 
                                                    if($val['kh_trangthai']==1) echo "chucam"; 
                                                    if($val['kh_trangthai']==2) echo "chuxanh";
                                                    if($val['kh_trangthai']==3) echo "chudo";
                                                ?>"><? if($val['kh_trangthai']==1) echo "Chờ duyệt"; if($val['kh_trangthai']==2) echo "Đã duyệt";
                                                            if($val['kh_trangthai']==3) echo "Từ chối";
                                                        ?>  
                                                    </td>
                                            <td class="">
                                                <div class="flex center-height">
                                                    <?php if ($val['kh_nguoitao']==$val['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo']!=""): ?>
                                                           
                                                            <img class="wh26_ra " src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo']==""): ?>
                                                            
                                                            <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                           
                                                        <?php endif ?>

                                                        <p class="size-14 left-10"><?=search($cty,'com_id',$val['kh_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($val['kh_nguoitao']!=$val['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image'];?>" class="wh26_ra " alt="người đánh giá">
                                                       
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                             
                                                         <?php endif ?>
                                                         <p class="size-14 left-10"><?=search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_name'];?>
                                                        </p>
                                                     <?php endif ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex center-height">
                                                    <? $ds_ng_dg=explode(",",$val["kh_user_dg"]);
                                                        $dem_vip=count($ds_ng_dg);
                                                     ?>
                                                     <?php foreach ($ds_ng_dg as $key => $valu): ?>
                                                    <? if ($key<3) {
                                                        ?>


                                                    <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$valu)[0]['ep_image'];?>" class="wh26_ra left_am10" alt="người đánh giá">
                                                        <?php endif ?>
                                                        <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']==""): ?>
                                                        <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra left_am10" alt="người đánh giá"> 
                                                    <?php endif ?>
                                                    
                                                    
                                                    <?
                                                    }?>
                                               
                                                    <?php endforeach ?>
                                                    <div class="bonus <?if($dem_vip <=3 ) echo "hidden";?> chutrang flex center-center left_am">
                                                        <?
                                                                if($dem_vip>3){
                                                                    $dem_vip=$dem_vip-3;
                                                                    echo $dem_vip;
                                                                }
                                                            ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <? 
                                                $ds_nv=explode(",",$val["kh_user_nv"]);
                                                $dem_vip=count($ds_nv);
                                                echo $dem_vip; ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="flex bot-5">
                                                    <div class="left_time text-left">
                                                        <p class="chuxanh font-medium">Từ:</p>
                                                    </div>
                                                    <div class="right_time">
                                                        <p class="chuden"><? 
                                                    $timestamp=$val['kh_ngaybatdau'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="left_time text-left">
                                                        <p class="chudo font-medium">Đến:</p>
                                                    </div>
                                                    <div class="right_time">
                                                        <p class="chuden"><? 
                                                    $timestamp=$val['kh_ngayketthuc'];
                                                    echo(date("d/m/Y", $timestamp)); ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:100%; height:30px">
                                                    <div class="khoi_pro_bar">
                                                        <div class="progress">
                                                        </div>
                                                        <div class="progress--bar" style="width: 50%">50%
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-left"><?=$val['kh_ghichu']?></td>
                                            <td>
                                                <div class="flex center-height space">
                                            
                                                       
                                                        <img src="../img/manhimg/khoiphuc.png" class="right-5"
                                                            alt="khooi phuc">
                                                        <p data-name="<?=$val['kh_ten']?>" data-id="<?=$val['kh_id']?>" class="chuxanh font-medium js_khoiphuc c-pointer size-14">Khôi phục
                                                        </p>
                                                    
                                                        <p class="chuxanh right-5 left-5">|</p>
                                                        <img src="../img/manhimg/xoa.png" class="right-5"
                                                            alt="khooi phuc">
                                                        <p data-name="<?=$val['kh_ten']?>" data-id="<?=$val['kh_id']?>" class="chudo font-medium js_xoa c-pointer size-14">Xóa
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
        window.location.href = "/xoaganday-kehoach-danh-gia.html";
    } else {
        window.location.href = "/xoaganday-kehoach-danh-gia.html?keyword=" + key + "&limit=" + limit;
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
        window.location.href = "/xoaganday-kehoach-danh-gia.html";
    } else {
        window.location.href = "/xoaganday-kehoach-danh-gia.html?limit=" + value + lien_ket;
    }
});

$('.js_khoiphuc').click(function(){
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('.btnluu_before').attr('data-id',id);
        $('.h4_change').text('Khôi phục kế hoạch đánh giá');
        $('.text_before_change').html('Bạn có chắc chắn muốn khôi phục kế hoạch đánh giá<br> <span class="font-medium">'+name+'</span>?');
        $('#popup_before').removeClass('hidden');
         $('.change_text_tc').html('Khôi phục kế hoạch <span class="font-medium">'+name+'</span> thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/khoiphuc_kh.php',
            type: 'POST',
            data: {
                id:id, 
            },
            success: function(data){            
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-kehoach-danh-gia.html';
                })
            }
        }); 
        })
    })

    $('.js_xoa').click(function(){
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('.btnluu_before').attr('data-id',id);
        $('.h4_change').text('Xoá vĩnh viễn kế hoạch đánh giá');
        $('.text_before_change').html('Bạn có chắc chắn muốn xoá vĩnh viễn kế hoạch đánh giá<br><span class="font-medium">'+name+'</span>?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Xoá vĩnh viễn kế hoạch <span class="font-medium">'+name+'</span> thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/xoa_vv_kh.php',
            type: 'POST',
            data: {
                id:id, 
            },
            success: function(data){            
                
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-kehoach-danh-gia.html';
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
        $('.h4_change').text('Khôi phục tiêu chí đánh giá');
        $('.text_before_change').html('Bạn có chắc chắn muốn khôi phục các kế hoạch đánh giá đã chọn?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Khôi phục kế hoạch thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/khoiphuc_kh.php',
            type: 'POST',
            data: {
                check:check, 
            },
            success: function(data){            
                // alert(data);return;
               
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-kehoach-danh-gia.html';
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
        $('.h4_change').text('Xoá vĩnh viễn kế hoạch đánh giá');
        $('.text_before_change').html('Bạn có chắc chắn muốn xoá vĩnh viễn các kế hoạch đánh giá đã chọn?');
        $('#popup_before').removeClass('hidden');
        $('.change_text_tc').html('Xoá vĩnh viễn kế hoạch thành công!');
        $('.btnluu_before').click(function(){
            $.ajax({
            url: '/ajax/xoa_vv_kh.php',
            type: 'POST',
            data: {
                check:check, 
            },
            success: function(data){                    
                $('#popup_thanhcong').removeClass('hidden');
                $('.close_xacnhan').click(function(){
                    window.location.href = '/xoaganday-kehoach-danh-gia.html';
                })
            }
        }); 
        })

    })
</script>