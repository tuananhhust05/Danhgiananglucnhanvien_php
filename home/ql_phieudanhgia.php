<?  include('config.php');
// if (!in_array(1, $quyen_phieu)) {header("Location: /trang_chu_sau_dang_nhap.html");};
    $key = getValue("keyword","str","GET","");
$key = replaceMQ($key);


$page = getValue("page","int","GET",1);
$page = (int)$page;
$limit = getValue("limit","int","GET",10);
$start = ($page -1) * $limit;

//link phân trang
$link = $_SERVER['REDIRECT_URL'];
$lien_ket = "?";
if($limit != 10){
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
        $sql .=" AND phieuct_id_kh = '".$key."'";
    }
}
    $query= new db_query("SELECT * FROM phieu_danhgia where trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql." ORDER BY id DESC LIMIT $start, $limit");
    $query2= new db_query("SELECT * FROM phieu_danhgia where trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql." ");
    $count_tong_vippro = mysql_num_rows($query2->result);
    $row = $query->result_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phiếu đánh giá</title>
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
                        <div class="title_header">
                            <p>Quản lý phiếu đánh giá</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="phieudanhgia box-qlinhanvien">
                            <p class="chuden size-14 tieude1024 bot-15">Quản lý phiếu đánh giá</p>
                            <div id="show_thietlaptime" class="popup hidden">
                                <div class=" pop">
                                    <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                                        <div class="">
                                            <h4 class="size-18 font-bold">Chọn khoảng thời gian</h4>
                                        </div>
                                        <div class="flex center-height c-pointer x_close">
                                            <img src="../img/manhimg/x.png" alt="Huong dan">
                                        </div>
                                    </div>
                                    <div class="nentrang br-b-10">
                                    <form action="" method="post" onsubmit="return false">
                                        <div class="padding-20">
                                            <div class="bot-15">
                                                <p class="chuden font-medium size-15 bot-5">Từ ngày:</p>
                                                <div class="border_input date">
                                                    <input id="datebd-input" type="date">
                                                </div>
                                                <p class="errol_time chudo top-5 hidden size-12 font-medium chunghieng">
                                                    Thời gian bắt đầu phải nhỏ hơn kết thúc</p>
                                            </div>
                                            <div class="bot-15">
                                                <p class="chuden font-medium size-15 bot-5">Đến ngày:</p>
                                                <div class="border_input date">
                                                    <input id="datekt-input" type="date">
                                                </div>
                                            </div>
                                            <div class="khoibutton_form top-25 bot-20">
                                                <button type=""
                                                    class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer">
                                                    Hủy
                                                </button>
                                                <button id="submit"
                                                    class="btn  btn-nenxanh-chutrang  br-5 vienxanh font-medium size-15  c-pointer">
                                                    Chọn
                                                </button>
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                </div>
                            </div>
                            <div class="flex space">
                                <div class="flex wrap space">
                                    <div class="nentrang m_danhmucdanhgia br-10 c-pointer js_chonngay">
                                        <div class="danhmucdanhgia flex center-height">
                                            <p class="chuden size-14 right-10">Thời gian đánh giá: </p>
                                            <p class="chuden size-14 time_danhgia"><span class="time_bd"></span> - <span class="time_kt"></span></p>
                                        </div>
                                    </div>

                                    <div class=" m_danhmucdanhgia br-10 c-pointer ">
                                        <div class="danhmucdanhgia select_no_muti ">
                                            <select name="" id="thanh_pho" class="js_select_2 js_choice_status">
                                                <option value="0">Tất cả trạng thái</option>
                                                <option value="1">Đang đánh giá</option>
                                                <option value="2">Hoàn thành</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="tieude375 top-15">
                                        <a href="/huong_dan.html#phieu" target="_blank" class="">
                                            <div class="huongdan flex center-height ">
                                                <img src="../img/manhimg/chamhoi.png" class="wh36" alt="">
                                                <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                                <a href="/huong_dan.html#phieu" target="_blank" class="none375">
                                    <div class="huongdan flex center-height ">
                                        <img src="../img/manhimg/chamhoi.png" class="wh36" alt="">
                                        <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                    </div>
                                </a>
                            </div>

                            <div class="search-qlnv">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti ql_tieuchi_m">
                                        <select name="" id=""class="js_select_2 search_value">
                                            <option value="">Tìm kiếm theo tên kế hoạch đánh giá</option>
                                            <? $q_all_nhom = new db_query("SELECT * FROM kh_danhgia WHERE id_congty = '".$usc_id."' AND trangthai_xoa = 1 ");
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
                                <div class="bangchung " id="bang_chung">
                                    <table class="bangchinh chuden">
                                        <tr>
                                            <th>
                                                <p class="phantucon">STT</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Mã phiếu</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Tên kế hoạch đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Trạng thái</p>
                                            </th>
                                            
                                            <th>
                                                <p class="phantucon">Đối tượng</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Số đối tượng</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Thời gian</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Người đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Ghi chú</p>
                                            </th><th>
                                                <p class="phantucon">Chức năng</p>
                                            </th>
                                        </tr>
                                        <tbody class="show_apend">
                                        <?php $stt=0;foreach ($row as $key => $value): ?>
                                        <?php if ($value['phieu_ngay_bd']<=time()): $stt++;?>
                                            <? $query=new db_query("SELECT * FROM kh_danhgia where  id_congty=".$usc_id." and kh_id=".$value['phieuct_id_kh']." ");
                                                $row_kh = mysql_fetch_assoc($query->result);
                                                $m_dg=explode(",",$row_kh['kh_user_dg']);
                                                $m_nv=explode(",",$row_kh['kh_user_nv']);
                                                $gio_batdau=$row_kh['kh_giobatdau'];
                                                $gio_kethuc=$row_kh['kh_gioketthuc'];
                                            ?>
                                            <?php if (in_array($_SESSION['ep_id'], $m_dg)==true||in_array($_SESSION['ep_id'], $m_nv)==true||$_SESSION['quyen']==1): ?>                                            
                                            <tr class="tt_phieu tt_hoanthanh<?=$value['id']?> <?if($value['is_duyet']==0)echo "tt_dangdanhgia";else echo "tt_hoanthanh"; ?>">
                                            <td><?=$stt;?></td>
                                            <td class="chuxanh text-left">
                                                <a class="chuxanh"
                                                    href="/phieudanhgia-de-kiemtra-nv-<?=$value['id']?>.html">PDG<?  
                                                        $invID = str_pad($value['id'], 4, '0', STR_PAD_LEFT);
                                                        echo $invID;
                                                    ?>
                                                 </a>           
                                            </td>
                                            <td class=" text-left ">
                                                <? $query=new db_query("SELECT * FROM kh_danhgia where  id_congty=".$usc_id." and kh_id=".$value['phieuct_id_kh']." ");
                                                $row_kh = mysql_fetch_assoc($query->result);
                                                echo $row_kh['kh_ten'];
                                                 ?>
                                            </td>
                                            <td class="<?if($value['is_duyet']==0) echo "chuxanh"; if($value['is_duyet']==1) echo "chuxanhluc";?>"><?if($value['is_duyet']==0) echo "Đang đánh giá"; if($value['is_duyet']==1) echo "Hoàn thành";?></td>
                                            
                                            <td><? if ($row_kh['kh_user_pb']!=NULL) echo"Phòng ban"; else echo "Nhân viên"; ?></td>
                                            <td class="text-right"><? 
                                                if ($row_kh['kh_user_nv']!=NULL) 
                                                    $ds_nv=explode(",",$row_kh["kh_user_nv"]);
                                                if ($row_kh['kh_user_pb']!=NULL) 
                                                    $ds_nv=explode(",",$row_kh["kh_user_pb"]);
                                                
                                                $dem_vip=count($ds_nv);
                                                echo $dem_vip; ?></td>
                                            <td class="text-center">
                                                <div class="flex bot-5 center-center">
                                                    <div class="left_time text-left">
                                                        <p class="chuxanh font-medium">Từ:</p>
                                                    </div>
                                                    <div class="right_time ">
                                                        <p class="chuden"><?=$gio_batdau?> - <?=date("d/m/Y", $value['phieu_ngay_bd']);?></p>
                                                    </div>
                                                </div>
                                                <div class="flex center-center">
                                                    <div class="left_time text-left">
                                                        <p class="chudo font-medium">Đến:</p>
                                                    </div>
                                                    <div class="right_time">
                                                        <p class="chuden"><?=$gio_kethuc?> - <?=date("d/m/Y", $value['phieu_ngay_kt']);?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div data-id-kh="<?=$row_kh['kh_id']?>" class="flex center-center js_thanhvien c-pointer xem_ng_danhgia">

                                                     <? $ds_ng_dg=explode(",",$row_kh["kh_user_dg"]);
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
                                            <td class="text-left lineheight16"><?=$row_kh['kh_ghichu']?></td>
                                            <td>
                                                <?php if (in_array(4, $quyen_phieu)): ?>                                          
                                                <div data-id="<?=$value['id']?>" data-name="<?=$row_kh['kh_ten']?>"  onclick="hienpopupid('popup_before')" class="flex center-height center-width c-pointer btn_xoa">
                                                    <img src="../img/manhimg/xoa.png" class="right-5" alt="khooi phuc">
                                                    <a class="chudo font-medium size-14">Xóa
                                                    </a>
                                                </div>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php endif ?>
                                        <?php endif ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                        
                                        
                                       
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
                            <p class="chuden size-14">Tổng số: <span class="dem_so_pt"><?=$count_tong_vippro?></span> <span class="font-medium"> Phiếu đánh giá</span></p>
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
        </div>
<div class="show_thanhvien ">
    <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
        <div class="">
            <p class="size-18 font-bold text_js">Thành viên</p>
        </div>
        <div class="flex center-height c-pointer x_close">
            <img src="../img/manhimg/x.png" alt="Huong dan">
        </div>
    </div>
    <div class="nentrang scroll_y_500  br-b-10 ">
        <div class="scrollx_pop">
            <div class="khoibang khoibang_2">
                <div class="bangchung bangchung_2">
                    <table class="bangchinh tieu_chi popuphien_nguoi_dg">

                    </table>
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
                    <p class="size-15 change_text_tc  text-center">Xoá phiếu đánh giá <span class="font-medium show_xoa_ten"></span>thành công</p>
                </div>
                <div onclick="window.location.reload() " class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_before" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change">Xoá phiếu đánh giá</h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5">
                    <p class>
                    Bạn có chắc chắn muốn xoá phiếu đánh giá
                    </p>
                    <span class="font-medium show_xoa_ten"></span>
                </div>

                <div class="khoibutton_form top-70">
                    <div onclick="hienpopupid('popup_thatbai')"
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div onclick="hienpopupid('popup_thanhcong')"
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before js_done_xoa">
                        Đồng ý
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
<script type="text/javascript">
$('.js_select_2').select2({
    width: '100%'
});

$('#submit').click(function() {
    var date_bd=$('#datebd-input').val();
    var date_kt=$('#datekt-input').val();
    
    var splitedValues = date_kt.split("-");
    var newend = splitedValues[2]+"-"+splitedValues[1]+"-"+splitedValues[0];

    var splitedValues1 = date_bd.split("-");
    var newstart = splitedValues1[2]+"-"+splitedValues1[1]+"-"+splitedValues1[0];
    if (date_bd=="") {
        alert("Vui lòng nhập ngày bắt đầu ");
        return;
    }if (date_kt=="") {
        alert("Vui lòng nhập ngày kết thúc ");
        return;
    }
    if (date_bd>date_kt) {
        alert("Ngày bắt đầu nhỏ hơn ngày kết thúc ");
        return;
    }
    if (date_bd.length>10||date_kt.length>10) {
        alert('Ngày không hợp lệ');
        return;
    }
    $('.time_bd').text(newstart);
    $('.time_kt').text(newend);
    $('.tt_phieu').remove();
    $.ajax({
            url: '/render/popup_chonngay_phieu.php',
            type: 'POST',
            data: {
                date_bd:date_bd,
                date_kt:date_kt,
                                 
            },
            success: function(data){
                $('#show_thietlaptime').addClass('hidden_tam');
                $('.show_apend').append(data);
            }
        });
});

$('.js_choice_status').change(function() {
    var a = $("#thanh_pho").find(":selected").val();
    if (a == 2) {
        $('.tt_dangdanhgia').hide();
        $('.tt_hoanthanh').show();
    }
    if (a == 1) {
        $('.tt_dangdanhgia').show();
        $('.tt_hoanthanh').hide();
    }
    if (a == 0) {
        $('.tt_hoanthanh').show();
        $('.tt_dangdanhgia').show();
    }

})
$('.xem_ng_danhgia').click(function() {
    $('.show_thanhvien ').show();
    var data_id_kh=$(this).attr('data-id-kh');

    $.ajax({
            url: '/render/popup_nguoi_danhgia_kh.php',
            type: 'POST',
            data: {
                data_id_kh:data_id_kh,
                 
            },
            success: function(data){
                $('.popuphien_nguoi_dg').html(data);
            }
        });        
})

$('.btn_xoa').click(function() {
    var id_tc_xoa = $(this).attr('data-id');
    var name_tc_xoa = $(this).attr('data-name');
    $('.js_done_xoa').attr('data-id',id_tc_xoa);
    $('.popup_xoa').show();
    $('.show_xoa_ten').text(name_tc_xoa);
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/capnhat_phieu.php',
            type: 'POST',
            data: {
                id_tc_xoa:id_tc_xoa, 
            },
            success: function(data){            
                $('#popup_thanhcong').show();
            }
        }); 
    })
    
})

$('.search_value').change(function(e) {

    search_nhom_ts();

})
$('.js_chonngay').click(function(){
    $('#show_thietlaptime').removeClass('hidden');
})

function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/quanly-phieudanhgia.html";
    } else {
        window.location.href = "/quanly-phieudanhgia.html?keyword=" + key + "&limit=" + limit;
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
        window.location.href = "/quanly-phieudanhgia.html";
    } else {
        window.location.href = "/quanly-phieudanhgia.html?limit=" + value + lien_ket;
    }
});
</script>

</html>