<? include "config.php" ;
// if (!in_array(1, $quyen_phieu)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key_phieu = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia where id = ".$key_phieu."");
     $row = mysql_fetch_assoc($query->result);
     
     $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = ".$row['phieuct_id_kh']."");
     $row_kh = mysql_fetch_assoc($qr->result);
     $kehoach_loai=$row_kh['kh_loai'];

     
?>
<?
if ($row_kh['kh_loai']==1||$row_kh['kh_loai']==3) {
    $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row_kh['kh_id_dg']."'");
    $row_de = mysql_fetch_assoc($query->result);
    $str_id_tc=explode(",",$row_de['dg_id_tieuchi']);
    $dem_vip=count($str_id_tc);  
}
?>
 <?
$tong_colspan=0;
foreach ($str_id_tc as $tc_th) {
        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and tcd_trangthai=2 and trangthai_xoa=1 and id=".$tc_th." ");
        $row_tccha =$qr->result_array();
        
    foreach ($row_tccha as $key => $value) {
        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
        $dem_con=mysql_num_rows($qr_con->result);
        if ($dem_con==0) $dem_con=1;
        $tong_colspan=$dem_con+$tong_colspan;

        ?>

        <?
        }
    }
?> 
<?
 $query_manh= new db_query("SELECT * FROM phieu_danhgia_chitiet where id_nguoidanhgia='".$_SESSION['ep_id']."' and phieu_id = '".$key_phieu."'");
    $row_query_manh = mysql_fetch_assoc($query_manh->result);
    $iset_dg=mysql_num_rows($query_manh->result);
    $phieu_ct_tt_dg=$row_query_manh['phieuct_trangthai'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phiếu đánh giá Đánh giá</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                        <div class="title_header flex center-height">
                        <a href="/quanly-phieudanhgia.html">
                            <div class="flex center-height right-10 c-pointer">
                                <img src="../img/manhimg/back.png" alt="Quay lai">               
                            </div>
                        </a>
                            <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / Đánh giá</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="phieudanhgia_chitiet danhgia_hoanthanh">
                            <div class="tieude1024 size-14 flex  ">
                                <a href="/quanly-phieudanhgia.html" class="pdl_3">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / Đánh giá</p>
                            </div>
                            <div class="flex">
                                <div class="khoi2">
                                    <div class="flex khoitieude">
                                        <div class="right-15">
                                            <h4 class="chuxanh size-16 font-bold top-20 bot-20">Phiếu đánh giá</h4>
                                        </div>
                                    </div>

                                <form action="" method="POST" onsubmit="return false">
                                <? if ($row_kh['kh_user_pb']==NULL) { ?>
                                        
                                    <div class="bangto3">
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
                                                <table class="bangchinh chuden ">
                                                    <tr>
                                                        <td rowspan="3">
                                                            <p class="phantucon size-16 font-medium">STT</p>
                                                        </td>
                                                        <td rowspan="3">
                                                            <p class="phantucon size-16 font-medium">Họ tên</p>
                                                        </td>
                                                        <td colspan="<?=$tong_colspan;?>" class="size-16 font-medium">
                                                            Tiêu chí
                                                        </td>
                                                        <td rowspan="3" class="font-medium size-16">
                                                            Tổng điểm
                                                        </td>
                                                    </tr>
                                            <tr >   
                                                <?
                                                
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();
                                                        
                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                        $dem_con=mysql_num_rows($qr_con->result);
                                                        
                                                        
                    
                                                        ?>

                                                          <td colspan="<?=$dem_con;?>" rowspan="<?if($dem_con==0)echo "2"; ?>" >
                                                            <p class="font-medium"><?=$value['tcd_ten']?></p>
                                                            <p>(Thang điểm: <?=$value['tcd_thangdiem']?>)</p>
                                                        </td>
                                                        <?
                                                        }
                                                    }
                                                ?>                                                         
                                            </tr>

                                            <tr >
                                                <?
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();

                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");

                                                        $row_con = $qr_con->result_array();
                                                        foreach ($row_con as $key => $val) {
                                                            ?>

                                                            <td>
                                                                <p class="font-medium"><?=$val['tcd_ten'];?></p>
                                                                <p>(Thang điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                            </td>
                                                        <?    
                                                        }
                                                        ?>     
                                                        <?
                                                        }

                                                    }
                                                ?>  
                                            </tr>
                                                 <?
                                                    $stt=0;

                                                    $str_id_nv=explode(",",$row_kh['kh_user_nv']);
                                                        foreach ($str_id_nv as  $value) {
                                                            $stt++;
                                                            $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where id_nguoidanhgia=".$_SESSION['ep_id']." and trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                            $row_diem = mysql_fetch_assoc($dbqr->result);
                                                            $diem=explode(",",$row_diem["cd_diem"]);
                                                            $dem_diem=count($diem);      
                                                            ?>
                                                    <tr class="sugar">
                                                        <td rowspan="2" class=""><?=$stt;?></td>
                                                        <td rowspan="2" class="text-left"><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?>
                                                            <input type="hidden" class="chung" value="<?=$value?>">
                                                        </td>

                                                       
                                                        
                                                        <?
                                                        $st=0;
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();

                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                        
                                                        $row_con = $qr_con->result_array();
                                                        $socon= count($row_con);
                                                        if ( $socon==0) {
                                                            $row_con=$row_tccha;
                                                        }
                                                        foreach ($row_con as $key_stt => $val) {
                                                            $st++;
                                                            ?>

                                                            <td class="text-left">
                                                                
                                                            <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" onblur="if(this.value><?=$val['tcd_thangdiem']?>){this.value='<?=$val['tcd_thangdiem']?>';}else if(this.value<0){this.value='0';}" type="text" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$st-1]?>"  >
                                                        </td>
                                                        <?    
                                                        }
                                                        ?>     
                                                        <?
                                                        }

                                                    }
                                                ?>  
                                                        <td rowspan="2">
                                                            <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                         <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                            <input type="text" class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                        </td>
                                                    </tr>

                                                    <?
                                                    }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <?}?>

                                    <?if ($row_kh['kh_user_nv']==NULL) {?>

                                     <div class="bangto3 bangtot">
                                        <div class="khoibang po_r" >
                                            <div class="thanh_dk">
                                                <div class="turn turn_left" id="turn_left">
                                                    <img src="../img/left.png" alt="sang trái">
                                                </div>
                                                <div class=" turn turn_right" id="turn_right">
                                                    <img src="../img/right.png" alt="sang phải">
                                                </div>
                                            </div>
                                            <div class="bangchung " id="bang_chung">
                                                <table class="bangchinh chuden ">
                                                    <tr>
                                                        <td rowspan="3">
                                                            <p class="phantucon size-16 font-medium">STT</p>
                                                        </td>
                                                        <td rowspan="3">
                                                            <p class="phantucon size-16 font-medium">Phòng ban</p>
                                                        </td>
                                                        <td colspan="<?=$tong_colspan;?>" class="size-16 font-medium">
                                                            Tiêu chí
                                                        </td>
                                                        <td rowspan="3" class="font-medium size-16">
                                                            Tổng điểm
                                                        </td>
                                                    </tr>
                                            <tr>   
                                                <?
                                                
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();
                                                        
                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                        $dem_con=mysql_num_rows($qr_con->result);
                                                        
                                                        
                    
                                                        ?>

                                                          <td colspan="<?=$dem_con;?>" rowspan="<?if($dem_con==0)echo "2"; ?>" >
                                                            <p class="font-medium"><?=$value['tcd_ten']?></p>
                                                            <p>(Thang điểm: <?=$value['tcd_thangdiem']?>)</p>
                                                        </td>
                                                        <?
                                                        }
                                                    }
                                                ?>                                                         
                                            </tr>

                                            <tr>
                                                        <?
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();

                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                        $row_con = $qr_con->result_array();
                                                        foreach ($row_con as $key => $val) {
                                                            ?>

                                                            <td>
                                                                <p class="font-medium"><?=$val['tcd_ten'];?></p>
                                                                <p>(Thang điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                            </td>
                                                        <?    
                                                        }
                                                        ?>     
                                                        <?
                                                        }

                                                    }
                                                ?>  
                                                    </tr>

                                                    <?
                                                    $stt=0;
                                                    $str_id_pb=explode(",",$row_kh['kh_user_pb']);
                                                        foreach ($str_id_pb as  $value) {
                                                            $stt++;
                                                            $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where id_nguoidanhgia=".$_SESSION['ep_id']." and trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
                                                            $row_diem = mysql_fetch_assoc($dbqr->result);
                                                            $diem=explode(",",$row_diem["cd_diem"]);
                                                            $dem_diem=count($diem);  
                                                            ?>
                                                    <tr class="sugar">
                                                        <td rowspan="2" class=""><?=$stt;?></td>
                                                        <td rowspan="2" class="text-left"><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?>
                                                            <input type="hidden" class="chung" value="<?=$value?>">
                                                        </td>

                                                        <?
                                                        $st=0;
                                                foreach ($str_id_tc as $tc_th) {
                                                        $qr=new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and id=".$tc_th." ");
                                                        $row_tccha =$qr->result_array();

                                                    foreach ($row_tccha as $key => $value) {
                                                        $qr_con=new db_query("SELECT *  FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and trangthai_xoa=1 and tc_id_tonghop=".$value['id']." ");
                                                        $row_con = $qr_con->result_array();
                                                        $socon= count($row_con);
                                                        if ( $socon==0) {
                                                            $row_con=$row_tccha;
                                                        }
                                                        foreach ($row_con as $key => $val) {$st++;
                                                            ?>

                                                            <td class="text-left">
                                                          

                                                                <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" onblur="if(this.value><?=$val['tcd_thangdiem']?>){this.value='<?=$val['tcd_thangdiem']?>';}else if(this.value<0){this.value='0';}" type="text" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$st-1]?>"  >
                                                        </td>
                                                        <?    
                                                        }
                                                        ?>     
                                                        <?
                                                        }

                                                    }
                                                ?> 
                                                        
                                                        
                                                        <td rowspan="2">
                                                            <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                         <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                           <input type="text" class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                        </td>
                                                    </tr>
                                                    <?
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   <? }?>
                                    
                                    <div class="khoibutton_form top-25">
                                        <div data-id_phieu="<?=$key_phieu?>" 
                                            class="btn  btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer js_xoa_hoanthanh">
                                            Huỷ
                                        </div>
                                        <?if ($phieu_ct_tt_dg==1||$iset_dg==0) {
                                            ?>
                                        <div  data-nv-or-pb="<?
                                        if ($row_kh['kh_user_nv']==NULL)echo '1';else echo '0';
                                        ?>" data-id_phieu="<?=$key_phieu?>" data-add-or-up="<?
                                            $qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where  id_nguoidanhgia=".$_SESSION['ep_id']." and phieu_id=".$key_phieu."");
                                            $kq=mysql_num_rows($qr->result);
                                            if($kq==0 )echo '0';else echo '1';
                                         ?>" data-dem="<?=$tong_colspan;?>"
                                            class="btn  btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer js_luu_hoanthanh" data-num="<?=$tong_colspan+3;?>">
                                            Lưu
                                        </div>
                                       
                                            <div   data-id_phieu="<?=$key_phieu?>" 
                                            class="btn js_hoanthanh_hoanthanh btn-nenxanhluc-chutrang br-5 vienxanhluc font-medium size-15 c-pointer">
                                            Hoàn thành
                                        </div>
                                    
                                        
                                            <?
                                        }?>
                                        

                                        
                                    </div>

                            </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="popup_thanhcong_hoanthanh" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center">Hoàn thành phiếu đánh giá thành công</p>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_thanhcong_luu" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center">Lưu phiếu đánh giá thành công</p>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_thanhcong_xoa" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center">Xoá phiếu đánh giá thành công</p>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan close_xacnhan_xoa c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="popup_before_hoanthanh" class="popup hidden">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change">Hoàn thành phiếu đánh giá</h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5">Bạn có chắc chắn hoàn thành phiếu đánh giá này không?<br>(Sau khi hoàn thành sẽ không thể sửa chữa)</div>

                <div class="khoibutton_form top-70">
                    <div onclick="hienpopupid('popup_thatbai')"
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div onclick="hienpopupid('popup_thanhcong_hoanthanh')"
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before_hoanthanh">
                        Đồng ý
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_before_xoa" class="popup hidden">
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
                <div class="text-center size-15 text_before_change bot-5">Bạn có chắc chắn muốn xoá phiếu đánh giá này không?</div>

                <div class="khoibutton_form top-70">
                    <div onclick="hienpopupid('popup_thatbai')"
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div onclick="hienpopupid('popup_thanhcong_xoa')"
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnxoa_before_hoanthanh">
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
<script type="text/javascript" src="../js/manh.js"></script>

</html>
<script type="text/javascript">

$('.js_luu_hoanthanh').click(function(){
    var arr_tt_sp = new Array();
    var i = 1;
    var input = new Array();
    var sopt=$(this).attr("data-num");
    var co=1;
    $('.chung').each(function(){
        if ($(this).val()=="") {
            co=0;
        }
           
        if( i%sopt == 1){
            input = [];
        }
        input.push($(this).val());
        if ( i%sopt == 0) {
            arr_tt_sp.push(input);
        }
        i++;
    });
    
    var list_diem = JSON.stringify(arr_tt_sp);

    var id_phieu= $(this).attr('data-id_phieu');
    var chon= $(this).attr('data-add-or-up');
    var nv_pb= $(this).attr('data-nv-or-pb');

    var dem=$(this).attr('data-dem');
    
    if (co==0) {
        alert("Vui lòng nhập đủ thông tin");
        return;
    }
         $.ajax({
            url: '/ajax/them_phieu_chitiet.php',
            type: 'POST',
            data: {
                list_diem:list_diem,
                id_phieu:id_phieu,
                dem:dem,
                chon:chon,
                sopt:sopt,
                nv_pb:nv_pb,
                 
            },
            success: function(data){
              
               $('#popup_thanhcong_luu').removeClass('hidden');
                $('#popup_thanhcong_luu .close_xacnhan').click(function(){
                    window.location.href = '/phieudanhgia-de-kiemtra-nv-'+id_phieu+'.html';
                })
            }
        })    

     })
$('.js_hoanthanh_hoanthanh').click(function(){
    var co=1;
    $('.chung').each(function(){
        if ($(this).val()=="") {
            co=0;
        }
    });
    
    if (co==0) {
        alert("Vui lòng nhập đủ thông tin");
        return;
    }
    $('#popup_before_hoanthanh').removeClass('hidden');
    $('#popup_thanhcong_luu').hide();
    $('.h4_change').text();
    $('.js_luu_hoanthanh').click();
    
    var id_phieu= $(this).attr('data-id_phieu');
    $('.btnluu_before_hoanthanh').click(function(){

    $.ajax({
            url: '/ajax/capnhat_phieu.php',
            type: 'POST',
            data: {
                id_phieu:id_phieu,
                 
            },
            success: function(data){
                $('.js_luu_hoanthanh').remove();
                $('.js_hoanthanh_hoanthanh').remove();
                 $('#popup_thanhcong_hoanthanh .close_xacnhan').click(function(){
                    window.location.href = '/phieudanhgia-de-kiemtra-nv-'+id_phieu+'.html';
                })

            }
        })   
    })

})
    
$('.arr_tt_sp').blur(function(){
    var tong_diem=0;
     $(this).parents(".sugar").find('.arr_tt_sp').each(function() {
        var diem=$(this).val();
     tong_diem += Number(diem) ;

    })
    $(this).parents(".sugar").find('.tong_diem').val(tong_diem);
})
$('.js_xoa_hoanthanh').click(function(){
   
    window.location.href = '/phieudanhgia-de-kiemtra-nv-<?=$key_phieu?>.html';
                
})
active_single_menu('phieu_menu');
</script>