<?php
    include('config.php');
    if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
if (!in_array(1, $quyen_kehoach)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("keyword","str","GET","");
$key = replaceMQ($key);

$key2 = getValue("keyword2","str","GET","");
$key2 = replaceMQ($key2);

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
    if ($key2 !="") {
        $link .= "&keyword2=".$key2;
    }
  
}else{
    if ($key !="") {
        $lien_ket = "&";
        $link .= "?keyword=".$key;
    }
    if ($key2 !="") {
        $lien_ket = "&";
        $link2 .= "?keyword2=".$key2;
    }
 
}

// xử lý truy vấn
$sql="";
if (!empty($key)){
    if (is_numeric($key)==true){
        $sql .=" AND kh_id = '".$key."'";
    }
}
if (!empty($key2)){
    if (is_numeric($key2)==true){
        $sql .=" AND kh_trangthai = '".$key2."'";
    }
}
    $query= new db_query("SELECT * FROM kh_danhgia where trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql." ORDER BY kh_id DESC LIMIT $start, $limit");
    $query2= new db_query("SELECT * FROM kh_danhgia where trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql."");
    $row = $query->result_array();
    $count_tong_vippro = mysql_num_rows($query2->result);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <style>
        .khoibang .bangchung{
            min-height: 300px;
            background-color: #fff;
            overflow-y: unset !important;
        }
        .khoibang .bangchung .bangchinh tr:last-child td{
            border-bottom: 1px solid #cccccc !important;
        }
    </style>
    <title>Quản lý kế hoạch đánh giá</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <link rel="stylesheet" type="text/css" href="../css/manh.css">
</head>

<body>
    <div id="" class="ql_kehoach_danhgia">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <p>Quản lý kế hoạch đánh giá</p>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi width_100 mb_20">
                                <div class="title_header">
                                    <p>Quản lý kế hoạch đánh giá</p>
                                </div>
                                <div class="d_flex space_b align_c mb_20 width_100">
                                    <div class="header_kehoach d_flex width_100 space" id="header_kehoach">
                                    <div class="d_flex align_c wrap m_hdan_kh_t">
                                        <div class="dev_chonngay d_flex align_c space btn_chonngay" >
                                            <p class="size-14"><span class="right-10">Thời gian đánh giá: </span><span class="tungay"></span> <span class="khoang_time"></span> <span class="denngay">
                                                   </span></p>
                                            <div class="img"><img src="../img/chonngay.png" alt="Chọn ngày"></div>
                                        </div>
                                             <div class="select_no_muti select_no_muti_2 manh_edit">
                                                <select class="js_select_2 chonloai_tt" name="loai_tc">
                                                    <option value="">Tất cả trạng thái </option>
                                                    <option  <?if($key2==1) echo "selected"; ?> value="1">Chờ duyệt</option>
                                                    <option  <?if($key2==2) echo "selected"; ?> value="2">Đã duyệt</option>
                                                    <option  <?if($key2==3) echo "selected"; ?> value="3">Từ chối</option>
                                                </select>
                                            </div>

                                            <div class="f_end m_hdan_kh navv_480"> 
                                            <a href="/huong_dan.html" class="huong_dan d_flex align_c">
                                                <img src="../img/chamhoi.png" alt="Hướng đẫn" class="mr_6">
                                                <p class="font_s15 font_w5 color_blue">Hướng dẫn</p>
                                            </a>
                                        </div>
                                        </div>   
                                        <div class="f_end navv_pc"> 
                                            <a  href="/huong_dan.html#kehoach" class="huong_dan d_flex align_c" target="_blank">
                                                <img src="../img/chamhoi.png" alt="Hướng đẫn" class="mr_6">
                                                <p class="font_s15 font_w5 color_blue">Hướng dẫn</p>
                                            </a>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="tieuchi_themmoi d_flex space_b align_c">
                                    <div class="thanh_search ql_tieuchi">
                                        <div class="select_no_muti ql_tieuchi_m">
                                            <select name="" id=""
                                            class="search_item js_select_2 search_value ">
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
                                        <span class="see_search"></span>

                                    </div>
                                    </div>
                                    <?php if (in_array(2, $quyen_kehoach)): ?>
                                    <div class="them_moi ">
                                        <a href='/quan_ly_ke_hoach_danh_gia_them_moi.html' class="btn btn_xanh">
                                            <img src="../img/icon_plus.png" alt="Thêm mới" class="mr_10">
                                            <p>Thêm mới</p>
                                        </a>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="body_ql_tieuchi body_kehoach_danhgia">
                                <div class="khoibang">
                                    <div class="bangchung" id="bang_chung">
                                        <table class="bangchinh tieu_chi">
                                            <tr>
                                                <th>
                                                    <p class="phantucon">STT</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Tên kế hoạch đánh giá</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Loại</p>
                                                </th>

                                                <th>
                                                    <p class="phantucon">Trạng thái</p>
                                                </th>
                                                <th style="width: 250px;">
                                                    <p class="phantucon">Người tạo</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Người đánh giá</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Số người được đánh giá</p>
                                                </th>
                                                <th>
                                                    <p class="phantucon">Thời gian</p>
                                                </th>
                                                
                                                <th>
                                                    <p class="phantucon">Ghi chú</p>
                                                </th>
                                                <th style="width: 250px;">
                                                    <p class="phantucon">Chức năng</p>
                                                </th>
                                            </tr>
                                            <? $stt=0; foreach ($row as $key => $val):$stt ++;?>
                                            <tr class="no_filter kh_xoa_<?=$val['kh_id']?> <?
                                             if($val['kh_trangthai']==1) echo "tt_choduyet";
                                             if($val['kh_trangthai']==2) echo "tt_daduyet";
                                             if($val['kh_trangthai']==3) echo "tt_tuchoi";
                                             ?>">
                                                <td>
                                                    <p><?=$stt?></p>
                                                </td>
                                                <td>
                                                    <p class="text_a_l"> <a class="color_blue"
                                                            href="/quan_ly_ke_hoach_danh_gia_chi_tiet_<?=$val['kh_id']?>.html"><?=$val['kh_ten']?></a></p>
                                                </td>

                                                <td>
                                                    <p class="text_a_l">
                                                        <? 
                                                        if($val['kh_loai']==1) echo "Đề đánh giá" ;
                                                            elseif($val['kh_loai']==2) echo "Đề kiểm tra ";
                                                            elseif($val['kh_loai']==3) echo"Tổng hợp";?>
                                                    </p>
                                                </td>

                                                <td class="">
                                                    <p class="text_a_l update_tt<?=$val['kh_id']?>  <? 
                                                    if($val['kh_trangthai']==1) echo "color_y"; 
                                                    if($val['kh_trangthai']==2) echo "color_blue";
                                                    if($val['kh_trangthai']==3) echo "color_red";
                                                ?>">
                                                        <? if($val['kh_trangthai']==1) echo "Chờ duyệt"; if($val['kh_trangthai']==2) echo "Đã duyệt";
                                                            if($val['kh_trangthai']==3) echo "Từ chối";
                                                        ?>    
                                                        </p>
                                                </td>
                                                <td>
                                                    <div class="d_flex align_c">
                                                        <?php if ($val['kh_nguoitao']==$val['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$val['kh_nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img mr_10 ">
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$val['kh_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($val['kh_nguoitao']!=$val['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img mr_10 ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$val['kh_nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="nguoi_danhgia text_a_l ">
                                                        <div  data-id-kh="<?=$val['kh_id']?>" class="container xem_ng_danhgia c-pointer">
                                                            <? $ds_ng_dg=explode(",",$val["kh_user_dg"]);
                                                                $dem_vip=count($ds_ng_dg);
                                                            
                                                            ?>
                                                              <?php foreach ($ds_ng_dg as $key => $valu): ?>
                                                                <? if ($key<3) {
                                                                    ?>
                                                            <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']!=""): ?>
                                                            <div class="img">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$valu)[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                            <?php endif ?>
                                                             <?php if (search($data_list_nv,'ep_id',$valu)[0]['ep_image']==""): ?>
                                                                <div class="img">
                                                                 <img class="wh26_ra " src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                             </div>
                                                             <?php endif ?>
                                                            <?
                                                                }?>
                                                           
                                                                <?php endforeach ?>
                                                            
                                                            <div class="plus_10  <?if($dem_vip <=3 ) echo "hidden";?>">
                                                                <?
                                                                if($dem_vip>3){
                                                                    $dem_vip=$dem_vip-3;
                                                                    echo $dem_vip;
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text_a_r"><? 
                                                $ds_nv=explode(",",$val["kh_user_nv"]);
                                                $dem_vip=count($ds_nv);
                                                echo $dem_vip; ?></td>
                                                <td>
                                                    <p class="tu_ngay">
                                                        <span
                                                            class="font_w5 color_blue mr_18">Từ:</span><span><? 
                                                    $timestamp=$val['kh_ngaybatdau'];
                                                    echo(date("d/m/Y", $timestamp)); ?></span>
                                                    </p>
                                                    <p class="den_ngay">
                                                        <span
                                                            class="font_w5 color_red mr_10">Đến:</span><span><? 
                                                    $timestamp=$val['kh_ngayketthuc'];
                                                    echo(date("d/m/Y", $timestamp)); ?></span>
                                                    </p>
                                                </td>
                                               
                                                <td class="ghi_chu">
                                                    <p class="text_a_l"><?if ($val['kh_ghichu']=="") {
                                                        echo '—';
                                                    }?><?=$val['kh_ghichu']?></p>
                                                </td>
                                                <td>
                                                    <div class="d_flex content_c position_r">
                                                        <div class="btn_tuychinh d_flex">
                                                            <div class="img mr_5">
                                                                <img src="../img/tuy_chinh.png" alt="Tùy chỉnh">
                                                            </div>
                                                            <p class="font_w5 color_blue">Tùy chỉnh</p>
                                                        </div>
                                                        <div class="modal_d modal_ql_tieuchi sub_tuychinh position_a ">
                                                            <div>
                                                               <?php if (in_array(5, $quyen_kehoach)): ?>
                                                                    <?php if ($val['kh_trangthai']==1): ?>
                                                                        <div class="item btn_duyet" data-ngay-duyet="<?=time() ?>" data-nguoi-duyet="<?=$_SESSION['ep_id']?>" data-id="<?=$val['kh_id']?>" data-name="<?=$val['kh_ten']?>">
                                                                                <div class="d_flex">
                                                                                    <div class="img mr_10">
                                                                                        <img src="../img/tuychinh_1.png"
                                                                                            alt="Tùy chỉnh">
                                                                                    </div>
                                                                                    <p>Duyệt kế hoạch đánh giá</p>
                                                                                </div>
                                                                            </div>    
                                                                            <div class="item btn_tuchoi" data-id-tc='<?=$_SESSION['ep_id']?>' data-name="<?=$val['kh_ten']?>" data-id="<?=$val['kh_id']?>">
                                                                                <div class="d_flex">
                                                                                    <div class="img mr_10">
                                                                                        <img src="../img/tuychinh_2.png"
                                                                                            alt="Từ chối hoạch đánh giá">
                                                                                    </div>
                                                                                    <p>Từ chối kế hoạch đánh giá</p>
                                                                                </div>
                                                                            </div>
                                                                    <?php endif ?>
                                                                    
                                                                <?php endif ?>
                                                                 <?php if (in_array(3, $quyen_kehoach)): ?>
                                                                    <?php if ($val['kh_trangthai']==1): ?>
                                                                <div class="item">
                                                                    <div class="d_flex">
                                                                        <div class="img mr_10">
                                                                            <img src="../img/tuychinh_3.png"
                                                                                alt="Chỉnh sửa kế hoạch đánh giá">
                                                                        </div>
                                                                        <a class="color_b"
                                                                            href="/quan_ly_ke_hoach_danh_gia_chinh_sua_<?=$val['kh_id']?>.html">Chỉnh
                                                                            sửa kế hoạch đánh giá</a>
                                                                    </div>
                                                                </div>
                                                                <?php endif ?>
                                                                <?php endif ?>
                                                                <?php if (in_array(4, $quyen_kehoach)): ?>
                                                                <div class="item btn_xoa" data-id="<?=$val['kh_id']?>" data-name="<?=$val['kh_ten']?>" >
                                                                    <div class="d_flex">
                                                                        <div class="img mr_10">
                                                                            <img src="../img/tuychinh_4.png"
                                                                                alt="Xóa kế hoạch đánh giá">
                                                                        </div>
                                                                        <p>Xóa kế hoạch đánh giá</p>
                                                                    </div>
                                                                </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <? endforeach;?>
                                            <tbody class="tc_dcchon">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="footer_bang <?if($count_tong_vippro==0) echo 'top-50' ?>">
                                    <div class="flex center-height space top-20">
                                        <div class="flex center-height">
                                            <p class="right10"> Hiển thị:</p>
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
                                         <p class="chuden size-14">Tổng số: <span class="dem_so_pt"><?=$count_tong_vippro?></span> <span class="font-medium"> Kế hoạch đánh giá</span></p>
                                        <div class="pagination_vippro">
                                            <?php if($limit< $count_tong_vippro) {
                                                echo generatePageBar3('',$page,$limit,$count_tong_vippro,$link,$lien_ket,'','active','preview','<','next','>','','<<<','','>>>');
                                            }
                                            ?>
                                        </div>      
                                    </div>
                                </div>
                                <div class="thanh_dk">
                                    <div class="turn turn_left" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popupchonngay -->
    <div class="popup popup_360 popup_chonngay ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Chọn khoảng thời gian</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <form action="" method="POST" onsubmit="return false">
                        <div class="bot-15">
                            <p class="chuden font-medium size-15 bot-5">Từ ngày:</p>
                            <div class="border_input date">
                                <input id="datebd_input" type="date">
                            </div>
                        </div>
                        <div class="bot-15">
                            <p class="chuden font-medium size-15 bot-5">Đến ngày:</p>
                            <div class="border_input date">
                                <input id="datekt_input" type="date">
                            </div>
                        </div>
                        <div class="popup_btn">
                            <div class="btn btn_trang btn_140 mr_30  close_popup">Hủy</div>
                            <button class="btn btn_xanh btn_140 done_chonngay " >
                                Đồng ý
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
    <!-- end popupchonngay -->   
    <!-- popup duyet-->
    <div class="popup popup_500 popup_duyet ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Duyệt kế hoạch đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn phê duyệt kế hoạch đánh giá </br>
                        <span class="font_wB show_xoa_ten">
                            </span> ?
                    </p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_duyet close_popup">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup duyet -->

    <!-- popup từ chối -->
    <div class="popup popup_500 popup_tuchoi ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Từ chối kế hoạch đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn từ chối kế hoạch đánh giá </br>
                        <span class="font_wB show_xoa_ten">
                            </span> ?</p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_tuchoi">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup từ chối-->

    <!-- popup xóa -->
    <div class="popup popup_500 popup_xoa ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Xóa kế hoạch đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <p class="cont_1"> Bạn có chắc chắn muốn xóa kế hoạch đánh giá </br>
                        <span class="font_wB show_xoa_ten"></span> ?</p>
                    <div class="popup_btn">
                        <div class="btn btn_trang btn_140 mr_68  close_popup">Hủy</div>
                        <div class="btn btn_xanh btn_140 js_done_xoa close_popup">
                            Đồng ý
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup xóa-->

    <!-- popup thành công  -->
    <div class="popup popup_500 popup_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Xóa kế hoạch đánh giá <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup close_popup_back">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup thành công -->

    <!-- popup thất bại   -->
    <div class="popup popup_500 popup_duyet_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="Thành công ">
                </div>
                <p class="text_a_c ">Phê duyệt kế hoạch đánh giá <br>
                    <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh  close_popup close_popup_back">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup popup_500 popup_tuchoi_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="Thành công ">
                </div>
                <p class="text_a_c ">Từ chối kế hoạch đánh giá <br>
                    <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh  close_popup close_popup_back">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup thất bại -->

    <!-- popup thành viên -->
    <!-- popup duyet-->

    <div class="popup popup_680 popup_thanhvien ">
        <div class="container">
            <div class="content">
                <div class="popup_header">
                    <h4 class="name_header">Người đánh giá</h4>
                    <div class="img close_popup">
                        <img src="../img/close.png" alt="đóng">
                    </div>
                </div>
                <div class="popup_body">
                    <div class="khoibang khoibang_2">
                        <div class="bangchung bangchung_2">
                            <table class="bangchinh tieu_chi popuphien_nguoi_dg">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup duyet -->
    <!-- popup thành viên -->

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%',
})
$('.btn_duyet').click(function() {
    var id_tc = $(this).attr('data-id');
    var name_tc = $(this).attr('data-name');
    var ten_nguoiduyet=$(this).attr('data-nguoi-duyet');
    var ngay_duyet=$(this).attr('data-ngay-duyet');
    $('.js_done_duyet').attr('data-id',id_tc);
    $('.popup_duyet').show();
    $('.show_xoa_ten').text(name_tc);
    $('.js_done_duyet').click(function(){
        $.ajax({
            url: '/ajax/duyet_kehoach.php',
            type: 'POST',
            data: {
                id_tc:id_tc, 
                ten_nguoiduyet:ten_nguoiduyet, 
                ngay_duyet:ngay_duyet, 
            },
            success: function(data){  
            // console.log(data);return;          
                $('.popup_duyet_thanhcong').show();
                $('.modal_ql_tieuchi').hide();
                $('.update_tt'+id_tc+'').html('<span class="color_blue">Đã duyệt</span>')
            }
        }); 
    })
    
})

$('.btn_tuchoi').click(function() {  
    var id_tc_tchoi = $(this).attr('data-id');
    var ten_tchoi = $(this).attr('data-id-tc');
    var name_tc_tc = $(this).attr('data-name');
    $('.js_done_tuchoi').attr('data-id',id_tc_tchoi);
    $('.popup_tuchoi').show();
    $('.show_xoa_ten').text(name_tc_tc);
    $('.js_done_tuchoi').click(function(){
        $.ajax({
            url: '/ajax/tuchoi_kehoach.php',
            type: 'POST',
            data: {
                id_tc_tchoi:id_tc_tchoi, 
                ten_tchoi:ten_tchoi, 
            },
            success: function(data){       
                    
                $('.popup_tuchoi_thanhcong').show();
                $('.modal_ql_tieuchi').hide();
                $('.update_tt'+id_tc_tchoi+'').html('<span class="color_red">Từ chối</span>')
            }
        }); 
    })

})
$('.btn_xoa').click(function() {
    var id_tc_xoa = $(this).attr('data-id');
    var name_tc_xoa = $(this).attr('data-name');
    $('.js_done_xoa').attr('data-id',id_tc_xoa);
    $('.popup_xoa').show();
    $('.show_xoa_ten').text(name_tc_xoa);
    $('.js_done_xoa').click(function(){
        $.ajax({
            url: '/ajax/capnhat_kehoach.php',
            type: 'POST',
            data: {
                id_tc_xoa:id_tc_xoa, 
            },
            success: function(data){            
                $('.popup_thanhcong').show();
                $('.modal_ql_tieuchi').hide();
                $('.kh_xoa_'+id_tc_xoa+'').hide();

                
            }
        }); 
    })
    
})
$('.xem_ng_danhgia').click(function() {
    $('.popup_thanhvien ').show();
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
$('.btn_chonngay').click(function() {
    $('.popup_chonngay').show();
    $('.done_chonngay').click(function(){
         
    var end=$('#datekt_input').val();
    var start=$('#datebd_input').val();

    var splitedValues = end.split("-");
    var newend = splitedValues[2]+"-"+splitedValues[1]+"-"+splitedValues[0];

    var splitedValues1 = start.split("-");
    var newstart = splitedValues1[2]+"-"+splitedValues1[1]+"-"+splitedValues1[0];



if (start.length>10||end.length>10) {
    alert('Định dạng ngày không hợp lệ');
    return;
}
  
if (end==""||start==""){
    alert('Vui lòng chọn ngày');
    return;
} 
if (end < start) {
    alert("Ngày bắt đầu phải nhỏ hơn kết thúc");
    return;
}
    $.ajax({
        url: '/ajax/chonngay.php',
        type: 'POST',
        data: {
            end:end,
            start:start,
        },
       
        success: function(data){  
      
          $('.tc_dcchon').html(data);
          $('.no_filter').hide();
          $('.tungay').text(newstart);
          $('.denngay').text(newend);
          $('.dem_so_pt').text(data.sopt);
          $('.khoang_time').text('->');
          $('.popup_chonngay').hide();
        }
    }); 
})
})

$('.chonloai_tt').change(function(e){
    search_trangthai();
})

$('.search_value').change(function(e) {
    search_nhom_ts();
})


function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html?keyword=" + key + "&limit=" + limit;
    }
}
function search_trangthai() {
    var key2 = $('.chonloai_tt').val();
    var limit = $('#chon_ban_ghi').val();
    if (key2 == "" ) {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html?keyword2=" + key2 + "&limit=" + limit;
    }
}

$('#chon_ban_ghi').change(function() {
    var value = $(this).find(':selected').val();
    var key = $('.search_value').val();
    var key2 = $('.chonloai_tt').val();
    var lien_ket = '';

    if (key != '') {
        lien_ket = "&keyword=" + key;
    }
    if (key2 != '') {
        lien_ket = "&keyword2=" + key2;
    }
    if (value == "") {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html";
    } else {
        window.location.href = "/quan_ly_ke_hoach_danh_gia.html?limit=" + value + lien_ket;
    }
});
$('.close_popup_back').click(function(){
    window.location.href = '/quan_ly_ke_hoach_danh_gia.html';
})

</script>

</html>