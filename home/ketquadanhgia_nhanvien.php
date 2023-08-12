<?include"config.php";
// if (!in_array(1, $quyen_ketqua)) {header("Location: /trang_chu_sau_dang_nhap.html");};
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
        $sql .=" AND id_doituong = '".$key."'";
    }
}

$query=new db_query("SELECT DISTINCT id_doituong,phieu_id FROM  phieu_danhgia_chitiet  where doituong_loai=0 and is_duyet=1 and trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql." ORDER BY id DESC LIMIT $start, $limit ");
$row = $query->result_array();

$query2=new db_query("SELECT DISTINCT id_doituong,phieu_id FROM  phieu_danhgia_chitiet  where doituong_loai=0 and is_duyet=1 and trangthai_xoa=1 and  id_congty = ".$usc_id." ".$sql."");
$count_tong_vippro = mysql_num_rows($query2->result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả đánh giá nhân viên</title>
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
                            <p>Quản lý kết quả đánh giá nhân viên</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="kqdanhgia_nv box-qlinhanvien">
                            <p class="chuden size-14 tieude1024 bot-15">Quản lý kết quả đánh giá</p>
                            <div class="flex space">
                                <div class="flex wrap khoi_chon_kqdg1">
                                    <div class="nentrang m_danhmucdanhgia br-10">
                                        <div class="select_no_muti danhmucdanhgia">
                                            <select name="" id="luachon_pb" class="js_select_2">
                                                <option value="0">Tất cả phòng ban</option>
                                                <? foreach ($arr_dep as  $pb): ?>
                                                    <option value="<?=$pb['dep_id']?>"><?=$pb['dep_name']?></option>
                                                <?endforeach ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="nentrang m_danhmucdanhgia br-10">
                                        <div class="select_no_muti danhmucdanhgia">
                                            <select name="" id="luachon_kh" class="js_select_2">
                                                <option value="0">Tất cả kế hoạch đánh giá</option>
                                                <?
                                                    $query= new db_query("SELECT * FROM kh_danhgia where  id_congty = ".$usc_id." ");
                                                    $row_chonkh = $query->result_array();
                                                    foreach ($row_chonkh as $value_chonkh) {
                                                        ?>
                                                        <option value="<?=$value_chonkh['kh_id']?>"><?=$value_chonkh['kh_ten']?></option>
                                                        <?
                                                    }
                                                ?>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex space top375_151">
                                        <div class="nentrang m_danhmucdanhgia br-10">
                                            <div class="select_no_muti danhmucdanhgia">
                                                <select name="" id="luachon_diem" class="js_select_2">
                                                    <option value="0">Không sắp xếp số điểm</option>
                                                    <option value="1">Số điểm giảm dần</option>
                                                    <option value="2">Số điểm tăng dấn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tieude375">
                                            <a target="_blank" href="/huong_dan.html#ketqua" class="">
                                                <div class="huongdan flex center-height ">
                                                    <img src="../img/manhimg/chamhoi.png" class="wh36" alt="Hướng dẫn">
                                                    <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <a target="_blank" href="/huong_dan.html#ketqua" class="khoi_chon_kqdg2">
                                    <div class="huongdan flex center-height ">
                                        <img src="../img/manhimg/chamhoi.png" class="wh36" alt="Hướng dẫn">
                                        <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                    </div>
                                </a>
                            </div>
                            <div class="search-qlnv">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti ql_tieuchi_m">
                                        <select name="" id=""class="js_select_2 search_value">
                                            <option value="">Tìm kiếm nhân viên </option>
                                            <?php foreach ($data_list_nv as $value): ?>
                                                <option <? if($key !='' && $key==$value['ep_id']) echo "selected" ;?> value="<?=$value['ep_id']?>"><?=$value['ep_name']?></option>
                                            <?php endforeach ?>
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
                                <div class="bangchung" id="bang_chung">
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
                                                <p class="phantucon">Chức vụ</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Kế hoạch đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Phiếu đánh giá</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Điểm trung bình</p>
                                            </th>
                                            <th>
                                                <p class="phantucon">Xếp loại</p>
                                            </th>
                                        </tr>
                                         <tbody class="show_apend">
                                        <? $stt=0; foreach ($row as $key => $value):$stt++; ?>
                                        <?
                                                    $qr=new db_query("SELECT * FROM phieu_danhgia where id=".$value['phieu_id']."");
                                                    $row_phieu = mysql_fetch_assoc($qr->result);
                                                    $qre=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']."");
                                                    $row_kh = mysql_fetch_assoc($qre->result);
                                                    $m_dg=explode(",",$row_kh['kh_user_dg']);
                                                    $m_nv=explode(",",$row_kh['kh_user_nv']);
                                                ?>
                                                <?php if (in_array($_SESSION['ep_id'], $m_dg)==true||$_SESSION['ep_id']==$value['id_doituong']||$_SESSION['quyen']==1||$_SESSION['ep_id']==5620): ?>

                                    <tr class="show_tr kehoach_<?
                                         $qr=new db_query("SELECT * FROM phieu_danhgia where id=".$value['phieu_id']."");
                                                    $row_phieu = mysql_fetch_assoc($qr->result);
                                                    $qre=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']."");
                                                    $row_kh = mysql_fetch_assoc($qre->result);
                                                    echo $row_kh['kh_id'];
                                        ?> phongban_<?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['dep_id']?> " data-position="<? $qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where trangthai_xoa=1 and id_congty=".$usc_id." and id_doituong=".$value['id_doituong']." and phieu_id=".$row_phieu['id']."");
                                                    $row_diem =  $qr->result_array();
                                                    $tong=0;
                                                    $tong_kt=0;
                                                    foreach ($row_diem as  $vla_row_diem) {
                                                        $tong+=$vla_row_diem['tongdiem'];
                                                        $tong_kt+=$vla_row_diem['tongdiem_kt'];
                                                    }
                                                    $cout=count($row_diem);

                                                    $dtb_tchi=$tong/$cout;
                                                    $dtb_tchi=round($dtb_tchi, 2);

                                                    
                                                    $dtb_ktr=$tong_kt/$cout;
                                                    $dtb_ktr=round($dtb_ktr, 2);
                                                    
                                                    if ($dtb_ktr!=0&&$dtb_tchi!=0) 
                                                        echo ($dtb_ktr+$dtb_tchi)/2;
                                                    else{

                                                    if ($dtb_ktr!=0) echo $dtb_ktr;
                                                    if ($dtb_tchi!=0) echo $dtb_tchi;
                                                    }
                                        ?>">
                                            <td><?=$stt?></td>
                                            <td><a class="chuxanh" href="/ketquadanhgia-nhanvien-u<?=$value['id_doituong']?>-p<?=$value['phieu_id']?>.html"><?=$value['id_doituong']?></a>
                                            </td>
                                            <td class="">
                                                <div class="flex center-height">

                                                    <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                    <?php endif ?>
                                                    <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']==""): ?>
                                                        <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá"> 
                                                    <?php endif ?>
                                                    
                                                    <a class="chuden  size-14"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_name']?>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-left"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['dep_name']?></td>
                                            <td><? $cv=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['position_id'];?><?=$array_cv[$cv]?></td>
                                            <td class="text-left">
                                                <?
                                                    $qr=new db_query("SELECT * FROM phieu_danhgia where id=".$value['phieu_id']."");
                                                    $row_phieu = mysql_fetch_assoc($qr->result);
                                                    $qre=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']."");
                                                    $row_kh = mysql_fetch_assoc($qre->result);
                                                    $de_kiemtra_id=$row_kh['kh_id_kt'];
                                                    $de_danhgia_id=$row_kh['kh_id_dg'];
                                                    echo $row_kh['kh_ten'];
                                                    
                                                    
                                                ?>
                                            </td>

                                            <td><a class="chuxanh" href="/ketquadanhgia-phieudanhgia-<?=$row_phieu['id']?>.html">PDG<?  
                                                        $invID = str_pad($row_phieu['id'], 4, '0', STR_PAD_LEFT);
                                                        echo $invID;
                                                    ?></a>
                                            </td>
                                            <td class="text-right sodiem">
                                                <?
                                                    $qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where trangthai_xoa=1 and id_congty=".$usc_id." and id_doituong=".$value['id_doituong']." and phieu_id=".$row_phieu['id']."");
                                                    $row_diem =  $qr->result_array();
                                                    $tong=0;
                                                    $tong_kt=0;
                                                    foreach ($row_diem as  $vla_row_diem) {
                                                        $tong+=$vla_row_diem['tongdiem'];
                                                        $tong_kt+=$vla_row_diem['tongdiem_kt'];
                                                    }
                                                    $cout=count($row_diem);

                                                    $dtb_tchi=$tong/$cout;
                                                    $dtb_tchi=round($dtb_tchi, 2);

                                                    
                                                    $dtb_ktr=$tong_kt/$cout;
                                                    $dtb_ktr=round($dtb_ktr, 2);
                                                    
                                                    if ($dtb_ktr!=0&&$dtb_tchi!=0) 
                                                        echo ($dtb_ktr+$dtb_tchi)/2;
                                                    else{

                                                    if ($dtb_ktr!=0) echo $dtb_ktr;
                                                    if ($dtb_tchi!=0) echo $dtb_tchi;
                                                    }


                                                ?>
                                            </td>
                                            <?
                                                if ($de_danhgia_id!=NULL) {
                                                    $query=new db_query("SELECT * FROM de_danhgia where dg_id=".$de_danhgia_id." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
                                                    $row_de =mysql_fetch_assoc($query->result);

                                                    $de_danhgia=explode(',',$row_de['dg_id_tieuchi']);
                                                    if ($row_de['dg_loai_macdinh']!="") $pl_de= json_decode($row_de['dg_loai_macdinh'], true);
                                                         else $pl_de= json_decode($row_de['dg_phanloaikhac'], true);
                                                    }

                                                if ($de_kiemtra_id!=NULL) {
                                                        $query_ktr=new db_query("SELECT * FROM de_kiemtra_cauhoi where id=".$de_kiemtra_id." and is_delete=1 and id_congty = ".$usc_id."  ");
                                                        $row_ktra =mysql_fetch_assoc($query_ktr->result);

                                                        $de_kiemtra=explode(',',$row_ktra['danhsach_cauhoi']);
                                                        if ($row_ktra['phanloai_macdinh']!="") $pl_kt= json_decode($row_ktra['phanloai_macdinh'], true);
                                                         else $pl_kt= json_decode($row_ktra['phanloaikhac'], true);

                                                    }
                                                   
                                            ?>
                                                    <?php foreach ($pl_de as $value_pl_de): ?>
                                                        <?if ($dtb_tchi>$value_pl_de[0]&&$dtb_tchi<=$value_pl_de[1]) {
                                                                $loai_pl_de=$value_pl_de[2];
                                                        } ?>
                                                    <?php endforeach ?>

                                                    <?php foreach ($pl_kt as $value_pl_kt): ?>
                                                        <?if ($dtb_ktr>$value_pl_kt[0]&&$dtb_ktr<=$value_pl_kt[1]) {
                                                                $loai_pl_kt=$value_pl_kt[2];
                                                        } ?>
                                                    <?php endforeach ?>

                                            <td>
                                                <?php if ($de_danhgia_id!=NULL): ?>
                                                    <span class="<? 
                                                        if($loai_pl_de==1) echo"chunau";
                                                        if($loai_pl_de==2) echo"chuxanh";
                                                        if($loai_pl_de==3) echo"chuxanhluc";
                                                        if($loai_pl_de==4) echo"chucam";
                                                        if($loai_pl_de==5) echo"chudo";
                                                         ?>"><? 
                                                        if($loai_pl_de==1) echo"Yếu";
                                                        if($loai_pl_de==2) echo"Trung Bình";
                                                        if($loai_pl_de==3) echo"Khá";
                                                        if($loai_pl_de==4) echo"Giỏi";
                                                        if($loai_pl_de==5) echo"Xuất sắc";
                                                        if($loai_pl_de=="") echo"Chưa có xếp loại";
                                                         ?></span>
                                                <?php endif ?>
                                                <?php if ($de_danhgia_id!=NULL&&$de_kiemtra_id!=NULL): ?>
                                                    ,
                                                <?php endif ?>
                                                  <?php if ($de_kiemtra_id!=NULL): ?>
                                                    <span class="<? 
                                                        if($loai_pl_kt==1) echo"chunau";
                                                        if($loai_pl_kt==2) echo"chuxanh";
                                                        if($loai_pl_kt==3) echo"chuxanhluc";
                                                        if($loai_pl_kt==4) echo"chucam";
                                                        if($loai_pl_kt==5) echo"chudo";
                                                         ?>"><? 
                                                        if($loai_pl_kt==1) echo"Yếu";
                                                        if($loai_pl_kt==2) echo"Trung Bình";
                                                        if($loai_pl_kt==3) echo"Khá";
                                                        if($loai_pl_kt==4) echo"Giỏi";
                                                        if($loai_pl_kt==5) echo"Xuất sắc";
                                                        if($loai_pl_kt=="") echo"Chưa có xếp loại";
                                                         ?></span>
                                                <?php endif ?>           
                                            </td>


                                    </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
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
                            <p class="chuden size-14">Tổng số: <span class="dem_so_pt"><?=$count_tong_vippro?></span> <span class="font-medium"> Kết quả nhân viên</span></p>
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
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%'
})
$('#luachon_pb').change(function(){
    var chon=$(this).val();
    $('.show_tr').hide();
    $('.phongban_'+chon+'').show();
    if (chon==0) {
        $('.show_tr').show();
    }
})
$('#luachon_kh').change(function(){
    var chon=$(this).val();
    $('.show_tr').hide();
    $('.kehoach_'+chon+'').show();
    if (chon==0) {
        $('.show_tr').show();
    }
})

$('#luachon_diem').change(function(){
    var chon=$(this).val();

    if (chon==0) {
        location.reload();
    }
    //Giảm dần
    if (chon==1) {
        $(".show_tr").sort(sort_li).appendTo('.show_apend');
        function sort_li(a, b) {
        return ($(b).data('position')) < ($(a).data('position')) ? -1 : 1;
        }
    }
    //tăng dần
    if (chon==2) {
        $(".show_tr").sort(sort_li).appendTo('.show_apend');
        function sort_li(a, b) {
        return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;
        }
    }
})

$('.search_value').change(function(e) {

    search_nhom_ts();

})


function search_nhom_ts() {
    var key = $('.search_value').val();
    var limit = $('#chon_ban_ghi').val();
    if (key == "" ) {
        window.location.href = "/ketquadanhgia-nhanvien.html";
    } else {
        window.location.href = "/ketquadanhgia-nhanvien.html?keyword=" + key + "&limit=" + limit;
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
        window.location.href = "/ketquadanhgia-nhanvien.html";
    } else {
        window.location.href = "/ketquadanhgia-nhanvien.html?limit=" + value + lien_ket;
    }
});
</script>

</html>