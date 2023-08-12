<? include "config.php" ;
// if (!in_array(1, $quyen_phieu)) {header("Location: /trang_chu_sau_dang_nhap.html");};
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
$key = getValue("id","int","GET",0);
$keyy = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key."'");
     $row = mysql_fetch_assoc($query->result);
     $phieu_ct_isduyet=$row['is_duyet'];
     $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
     $row_kh = mysql_fetch_assoc($qr->result);
     $str_id_nv_kt=explode(",",$row_kh['kh_user_nv']);
     
    $ma_kh= $row['phieuct_id_kh'];
$key_phieu = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia where id = '".$key_phieu."'");
     $row = mysql_fetch_assoc($query->result);

     $qr= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$row['phieuct_id_kh']."'");
     $row_kh = mysql_fetch_assoc($qr->result);     
     $gio_batdau=$row_kh['kh_giobatdau'];
     $gio_kethuc=$row_kh['kh_gioketthuc'];

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
if ($row_kh['kh_loai']==2||$row_kh['kh_loai']==3) {
    $query= new db_query("SELECT * FROM de_kiemtra where kt_id = '".$row_kh['kh_id_kt']."'");
    $row_de_kt = mysql_fetch_assoc($query->result);
}
?>  


<?
 $query_manh= new db_query("SELECT * FROM phieu_danhgia_chitiet where id_nguoidanhgia='".$_SESSION['ep_id']."' and phieu_id = '".$key_ex."'");
    $row_query_manh = mysql_fetch_assoc($query_manh->result);
    $iset_dg=mysql_num_rows($query_manh->result);
    $phieu_ct_tt_dg=$row_query_manh['phieuct_trangthai'];
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .over_scroll_x::-webkit-scrollbar{
            display: none;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phiếu đánh giá</title>
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
                            <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="phieudanhgia_chitiet dektr_nv">
                            <div class="tieude1024 size-14 flex center-height ">
                                <a href="/quanly-phieudanhgia.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá </p>
                            </div>
                            <div class="flex">
                                <div class="khoi2">
                                    <div class="search-qlnv">
                                        <div class="rightsearch flex center-height">
                                            <div class="flex rightsearch_con2">
                                                <?php if (in_array(5, $quyen_phieu)): ?>
                                                    <?
                                                    $co=1;
                                                    $query_manh2= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id = '".$key_ex."'");
                                                    $rowmm = $query_manh2->result_array();
                                                    $cou_rowmm=mysql_num_rows($query_manh2->result);
                                                    foreach ($rowmm as  $value_rowmm) {
                                                        if ($row_kh['kh_loai']==3) {
                                                            if ($value_rowmm['phieuct_trangthai']==1||$value_rowmm['phieuct_trangthai_kt']==1) $co=0;
                                                        }
                                                        if ($row_kh['kh_loai']==1) {
                                                            if ( $value_rowmm['phieuct_trangthai']==1) $co=0;
                                                        }
                                                        if ($row_kh['kh_loai']==2) {
                                                            if ($value_rowmm['phieuct_trangthai_kt']==1) $co=0;
                                                        }
                                                        
                                                    }
                                                    ?>
                                                    <?php if ($co==1&&$cou_rowmm>0): ?>
                                                        <button
                                                            class="button nenxanh-chutrang un-m-r center-height br-10 size-16 js_duyetphieu <? if($row['is_duyet']==1) echo 'opacitty5';?>">
                                                            <img class="right-10" src="../img/manhimg/duyet.png" alt="duyệt">
                                                            <p class=" chutrang font-medium c-pointer" >
                                                                Duyệt
                                                            </p>
                                                        </button>
                                                    <?php endif ?>
                                                <?php endif ?>
                                                <?if ($row_kh['kh_loai']==2||$row_kh['kh_loai']==3) {
                                                   ?>
                                                   <?php if (in_array($_SESSION['ep_id'], $str_id_nv_kt)==true): ?>
                                                       <button
                                                    class="button nenxanh-chutrang <?if($row_kh['kh_user_pb']!=NULL) echo "hidden"; ?> un-m-r center-height br-10 size-16 ">
                                                    <img class="right-10" src="../img/manhimg/dgia.png" alt="đánh giá">
                                                    <a target="_blank" class=" chutrang font-medium " href="/phieudanhgia-lambai-<?=$key_ex?>.html">
                                                        Làm bài
                                                    </a>
                                                </button>
                                                   <?php endif ?>
                                                   
                                                   <?
                                                }?>
                                                
                                                <?  $str_id_nv_dg=explode(",",$row_kh['kh_user_dg']);
                                                    if($row_kh['kh_user_pb']!=NULL && in_array($_SESSION['ep_id'], $str_id_nv_dg)==true){
                                                    ?>
                                                    <?php if ($phieu_ct_isduyet==0 && ($phieu_ct_tt_dg==1||$iset_dg==0)): ?>
                                
                                                    <button
                                                    class="button nenxanh-chutrang  un-m-r center-height br-10 size-16 ">
                                                    <img class="right-10" src="../img/manhimg/dgia.png" alt="đánh giá">
                                                    <a class=" chutrang font-medium " href="/quanly-phieudanhgia-danhgia-nv-<?=$row['id']?>.html">
                                                        Đánh giá
                                                    </a>
                                                </button>
                                                <?php endif ?>
                                                <?
                                                } 
                                                ?>
                                                <?php if (in_array(4, $quyen_phieu)): ?>
                                                                                       
                                                <?php endif ?>
                                                <a href="/Excel/phieu_dg.php?id=<?=$key_ex?>">
                                                <div class="flex rightsearch_con2_2">
                                                    <button
                                                        class="btn-nenxanhluc-chutrang button center-height br-10 size-16 ">
                                                        <img src="../img/manhimg/xuatexcel.png" class="wh14"
                                                            alt="xuatexcel">
                                                        <p class="left-10 font-medium">Xuất excel</p>
                                                    </button>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thangdiem shadow10">
                                        <div class="nenxanh-chutrang js_nx_ct">
                                            <div class="padding15 flex space">
                                                <p class="size-16 font-bold">Thông tin phiếu đánh giá</p>
                                                <div class="flex c-pointer center-heght js_anbot ">
                                                    <p class="size-14 right-10 text_anbot">Ẩn bớt</p>
                                                    <div class="flex center-height ">
                                                        <img class="img_anbot" src="../img/manhimg/up.png" alt="An bot">
                                                    </div>
                                                </div>
                                                <div class="flex c-pointer center-heght hidden js_chitiet">
                                                    <p class="size-14 right-10 text_anbot">Chi tiết</p>
                                                    <div class="flex center-height ">
                                                        <img class="img_anbot" src="../img/manhimg/down2.png"
                                                            alt="An bot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="over_scroll_x">
                                            <div class="nentrang show_js_anbot scrollx_lotrinhchitiet">
                                                <div class="padding15 khoicon">
                                                    <div class=" flex">
                                                        <p class="cacmuc">Mã phiếu đánh giá:</p>
                                                        <p class="cacketqua">PDG<?  
                                                        $invID = str_pad($row['id'], 4, '0', STR_PAD_LEFT);
                                                        echo $invID;
                                                    ?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Ngày tạo:</p>
                                                        <p class="cacketqua"><?
                                                        echo(date("d/m/Y", $row_kh['kh_ngaytao'])); ?>
                                                    </p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Đối tượng đánh giá:</p>
                                                        <p class="cacketqua"><? if ($row_kh['kh_user_pb']!=NULL) echo"Phòng ban"; else echo "Nhân viên"; ?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Số đối tượng:</p>
                                                        <p class="cacketqua"><? 
                                                if ($row_kh['kh_user_nv']!=NULL) 
                                                    $ds_nv=explode(",",$row_kh["kh_user_nv"]);
                                                if ($row_kh['kh_user_pb']!=NULL) 
                                                    $ds_nv=explode(",",$row_kh["kh_user_pb"]);
                                                
                                                $dem_vip=count($ds_nv);
                                                echo $dem_vip; ?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Kế hoạch đánh giá:</p>
                                                        <p class="cacketqua"><?=$row_kh['kh_ten']?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Người đánh giá:</p>
                                                        <p class="cacketqua">
                                                        <div data-id-kh="<?=$row_kh['kh_id']?>" class="flex center-height left-10 xem_ng_danhgia">
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
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Thời gian bắt đầu:</p>
                                                        <p class="cacketqua"><?=$gio_batdau?> - <?=date("d/m/Y", $row['phieu_ngay_bd']);?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Thời gian kết thúc:</p>
                                                        <p class="cacketqua"><?=$gio_kethuc?> - <?=date("d/m/Y", $row['phieu_ngay_kt']);?></p>
                                                    </div>
                                                </div>
                                               

                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Trạng thái:</p>
                                                        <p class="cacketqua <?if($row['is_duyet']==0) echo "chuxanh"; if($row['is_duyet']==1) echo "chuxanhluc";?>"><?if($row['is_duyet']==0) echo "Đang đánh giá"; if($row['is_duyet']==1) echo "Hoàn thành";?></p>
                                                    </div>
                                                </div>
                                                

                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Ghi chú:</p>
                                                        <div class="font-normal">
                                                            <p class="size-14"><?if ($row_kh['kh_ghichu']=="") {
                                                            echo '-';
                                                        }?><?=$row_kh['kh_ghichu']?></p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!--Phiếu Đề đánh giá nhân viên -->   
                                    <?if($row_kh['kh_user_pb']==NULL && ($row_kh['kh_loai']==1||$row_kh['kh_loai']==3)){
                                            ?>
                                            <div class="flex khoitieude">
                                                <div class="right-15">
                                                    <h4 class="chuxanh size-16 font-bold top-20 bot-20">Phiếu đánh giá</h4>
                                                </div>

                                                <? 
                                                $str_id_nv_dg=explode(",",$row_kh['kh_user_dg']);
                                                if(in_array($_SESSION['ep_id'], $str_id_nv_dg)==true){
                                                    ?>
                                                    <?php if ($phieu_ct_isduyet==0 && ($phieu_ct_tt_dg==1||$iset_dg==0)): ?>
                                                        <div class="rightsearch flex center-height">
                                                            <div class="flex rightsearch_con2">
                                                        <button
                                                            class="button nenxanh-chutrang un-m-r center-height br-10 size-16 ">
                                                            <img class="right-10" src="../img/manhimg/dgia.png" alt="đánh giá">
                                                            <a class=" chutrang font-medium "
                                                                href="/quanly-phieudanhgia-danhgia-nv-<?=$row['id']?>.html">
                                                                Đánh giá
                                                            </a>
                                                        </button>

                                                    </div>
                                                </div>
                                                <?php endif ?>
                                                    <?
                                                }?>
                                                
                                            </div>  
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
                                                                    <p>(Số điểm: <?=$value['tcd_thangdiem']?>)</p>
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
                                                                        <p>(Số điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                                    </td>
                                                                <?    
                                                                }
                                                                ?>     
                                                                <?
                                                                }

                                                            }
                                                        ?>  
                                                            </tr>

                                                        <?php if ($_SESSION['quyen']!=1): ?>
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
                                                                    for ($i=0; $i < $tong_colspan; $i++) { 
                                                                        ?>
                                                                <td class="text-left">
                                                                    <input type="text" disabled="" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$i];?>"  >
                                                                </td>
                                                                <?
                                                                    }
                                                                ?>
                                                                
                                                                
                                                                <td rowspan="2">
                                                                    <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                 <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                                    <input type="text" disabled class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                                </td>
                                                            </tr>

                                                            <?
                                                            }
                                                            ?>
                                                        <?php endif ?> 

                                                        <?php if ($_SESSION['quyen']==1): ?>
                                                           <?
                                                            $stt=0;
                                                            $str_id_nv=explode(",",$row_kh['kh_user_nv']);
                                                                foreach ($str_id_nv as  $value) {
                                                                    $stt++;
                                                                    $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
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
                                                                    for ($i=0; $i < $tong_colspan; $i++) { 
                                                                        ?>
                                                                <td class="text-left">
                                                                    <input type="text" disabled="" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$i];?>"  >
                                                                </td>
                                                                <?
                                                                    }
                                                                ?>
                                                                
                                                                
                                                                <td rowspan="2">
                                                                    <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                 <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                                    <input type="text" disabled class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                                </td>
                                                            </tr>

                                                            <?
                                                            }
                                                            ?>
                                                        <?php endif ?> 
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    <?}?>
                                     
                                   <!--  phiếu đề kiêm tra -->                                   
                                    <?if($row_kh['kh_user_pb']==NULL && ($row_kh['kh_loai']==2||$row_kh['kh_loai']==3) ){
                                        ?>
                                        <h4 class="chuxanh size-16 font-bold top-20 bot-20">Danh sách nhân viên thực hiện
                                             bài kiểm tra</h4>
                                        
                                        <div class="bangtoto">
                                            <div class="khoibang po_r">
                                                <!-- <div class="thanh_dk">
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
                                                                <p class="phantucon">Mã NV</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Họ tên</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Trạng thái</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Tiến độ</p>
                                                            </th>
                                                            <?php if ($_SESSION['quyen']!=1): ?>
                                                            <th>
                                                                <p class="phantucon">Nhận xét</p>
                                                            </th>
                                                            <?php endif ?>
                                                           <?php if ($_SESSION['quyen']==1||in_array($_SESSION['ep_id'], $str_id_nv_dg)==true): ?>
                                                             
                                                            <th>
                                                                <p class="phantucon">Chức năng</p>
                                                            </th>
                                                            
                                                            <?php endif ?>

                                                        </tr>

                                                        <?  $stt=0;
                                                            $str_kt= explode(",", $row_kh['kh_user_nv']) ;

                                                           foreach ($str_kt as $nv_kt) {
                                                            $stt++;
                                                               ?>
                                                        <tr>
                                                            <td><?=$stt;?></td>
                                                            <td class=""><?=$nv_kt;?></td>
                                                            <td class="">
                                                                <div class="flex center-height">
                                                                    <img onerror="this.src='https://chamcong.timviec365.vn/images/ep_logo.png';" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$nv_kt)[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                                    <a class="chuden  size-14"
                                                                        ><?=search($data_list_nv,'ep_id',$nv_kt)[0]['ep_name']?>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <? 
                                                            $qr_lam=new db_query("SELECT * FROM tbl_cautraloi where ma_nv=".$nv_kt." and phieu_id= '".$keyy."' ");
                                                            $row_nv_lambai = mysql_fetch_assoc($qr_lam->result);
                                                            $list_cauhoi_dalam=(json_decode($row_nv_lambai['cau_traloi'],true)) ;
                                                            $so_cauhoi_dalam=0;
                                                            // echo'<pre>';print_r($list_cauhoi_dalam);echo'</pre>';
                                                            foreach ($list_cauhoi_dalam as $key => $dalam) {
                                                                if ($dalam['cautraloi']!='') {
                                                                    $so_cauhoi_dalam++;
                                                                }
                                                            }
                                                            if ($row_nv_lambai==0) {
                                                                $so_cauhoi_dalam=0;
                                                            }
                                                            $qr_kt=new db_query("SELECT * FROM kh_danhgia where kh_id=".$ma_kh." ");
                                                            $row_kt = mysql_fetch_assoc($qr_kt->result);
                                                            $made_ktra=$row_kt['kh_id_kt']; 

                                                            $qr_cauhoi=new db_query("SELECT * FROM de_kiemtra_cauhoi where id=".$made_ktra." ");
                                                            $row_cauhoi = mysql_fetch_assoc($qr_cauhoi->result);

                                                            $mang_cauhoi=$row_cauhoi['danhsach_cauhoi']; 
                                                            $mang_cauhoi=explode(',',$mang_cauhoi);
                                                            $so_cauhoi=count($mang_cauhoi);
                                                            
                                                            $tiendo_lam=($so_cauhoi_dalam/$so_cauhoi)*100 ;

                                                            ?>
                                                            
                                                            <td class="<?if($row_nv_lambai['trangthai_lam']==0) echo"chucam";else echo"chuxanhluc"; ?> "><?if($row_nv_lambai['trangthai_lam']==0) echo"Đang làm bài";else echo"Hoàn thành" ?></td>
                                                            <td>
                                                                <div style="width:100%; height:30px">
                                                                    <div class="khoi_pro_bar">
                                                                        <div class="progress <?if($tiendo_lam==0) echo'chuden' ;?> "><?if($tiendo_lam==0) echo'0%' ;?>
                                                                        </div>
                                                                        <div class="progress--bar " style="width: <?=$tiendo_lam?>%"><?=$tiendo_lam?>%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <?
                                                                 $qr=new db_query("SELECT * FROM phieu_danhgia_chitiet where id_doituong='".$nv_kt."' and phieu_id='".$keyy."' and id_nguoidanhgia ='".$_SESSION['ep_id']."' ");
                                                                 $row_chamdiem=mysql_fetch_assoc($qr->result);
                                                                 $phieuct_trangthai=$row_chamdiem['phieuct_trangthai_kt'];
                                                                 $dem=mysql_num_rows($qr->result);
                                                                ?>

                                                            <?php if ($_SESSION['quyen']!=1): ?>
                                                            <td class="text-left"><?=$row_chamdiem['nhanxet_kt'] ;if($row_chamdiem['nhanxet_kt']=="")echo "Chưa chấm điểm ";?>
                                                            </td>
                                                            <?php endif ?>

                                                            <?php if ($_SESSION['quyen']==1 ||in_array($_SESSION['ep_id'], $str_id_nv_dg)==true): ?>
                                                            <td>

                                                                <?php if ($phieuct_trangthai==2): ?>
                                                                <div class="flex">
                                                                    <div class="right-5">
                                                                        <img src="../img/manhimg/dacham.png" class=""
                                                                            alt="da chấm">
                                                                    </div>
                                                                    <a href="/phieudanhgia-chamdiem-u<?=$nv_kt?>-p<?=$keyy?>.html" class="chuxanhluc font-medium size-14">Đã chấm</a>
                                                                </div>
                                                                <?php endif ?>
                                                                <?php if ($phieuct_trangthai!=2): ?>
                                                                
                                                                    <div  class="<?if ($_SESSION['quyen']==1) echo 'center-width'?> flex c-pointer js_chamdiem" <?
                                                                        if(($row_nv_lambai['trangthai_lam']==1&&in_array($_SESSION['ep_id'], $str_id_nv_dg)==true)||$_SESSION['quyen']==1 ){
                                                                            echo"data-cham='2'";
                                                                        } else{
                                                                            echo "data-cham='1'";
                                                                        }
                                                                    ?> >
                                                                        <div class="right-5">
                                                                            <img src="../img/manhimg/chinhsua2.png" class=""
                                                                                alt="dang lam">
                                                                        </div>

                                                                        
                                                                        <a  <?php if(($row_nv_lambai['trangthai_lam']==1&&in_array($_SESSION['ep_id'], $str_id_nv_dg)==true)||$_SESSION['quyen']==1 ): ?>href="/phieudanhgia-chamdiem-u<?=$nv_kt?>-p<?=$keyy?>.html" <?php endif ?>class="chuxanh font-medium size-14"><? if ($_SESSION['quyen']!=1):?>Chấm điểm <?php endif ?><? if ($_SESSION['quyen']==1):?>Xem chi tiết<?php endif ?></a>
                                                                    </div>
                                                                
                                                                <?php endif ?>
                                                            </td>
                                                          <?php endif ?>
                                                        </tr>
                                                        <?
                                                           }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    <?}?>
                                    
                                    <!-- phongf ban -->
                                    <? if($row_kh['kh_user_pb']!=NULL ){
                                        ?>
                                        <div class="flex khoitieude">
                                            <div class="right-15">
                                                <h4 class="chuxanh size-16 font-bold top-20 bot-20">Phiếu đánh giá</h4>
                                            </div>
                                        </div>
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
                                                                <p>(Số điểm: <?=$value['tcd_thangdiem']?>)</p>
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
                                                                    <p>(Số điểm: <?=$val['tcd_thangdiem'];?>)</p>
                                                                </td>
                                                            <?    
                                                            }
                                                            ?>     
                                                            <?
                                                            }

                                                        }
                                                    ?>  
                                                        </tr>
                                                        <?php if ($_SESSION['quyen']!=1): ?>
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
                                                                for ($i=0; $i < $tong_colspan; $i++) { 
                                                                    ?>
                                                            <td class="text-left">
                                                                <input type="text" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$i];?>" disabled>
                                                            </td>
                                                            <?
                                                                }
                                                            ?>
                                                            
                                                            
                                                            <td rowspan="2">
                                                                <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                             <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                               <input type="text" disabled class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                            </td>
                                                        </tr>
                                                        <?
                                                        }
                                                        ?>
                                                    <?php endif ?>
                                                    <?php if ($_SESSION['quyen']==1): ?>
                                                        <?
                                                        $stt=0;
                                                        $str_id_pb=explode(",",$row_kh['kh_user_pb']);
                                                            foreach ($str_id_pb as  $value) {
                                                                $stt++;
                                                                $dbqr=new db_query("SELECT * from phieu_danhgia_chitiet where trangthai_xoa=1 and phieu_id=".$key_phieu." and id_doituong=".$value.""   );
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
                                                                for ($i=0; $i < $tong_colspan; $i++) { 
                                                                    ?>
                                                            <td class="text-left">
                                                                <input type="text" class="chung arr_tt_sp" placeholder="Nhập số điểm" value="<?=$diem[$i];?>" disabled>
                                                            </td>
                                                            <?
                                                                }
                                                            ?>
                                                            
                                                            
                                                            <td rowspan="2">
                                                                <input class="tong_diem chung" type="text" value="<?=$row_diem['tongdiem']?>" disabled="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                             <td colspan="<?=$tong_colspan;?>" class="text-left">
                                                               <input type="text" disabled class="nhanxet chung" placeholder="Nhận xét" value="<?=$row_diem['nhanxet']?>" > 
                                                            </td>
                                                        </tr>
                                                        <?
                                                        }
                                                        ?>
                                                    <?php endif ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?}?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup_before" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change">Duyệt phiếu đánh giá</h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5">
                    <p class>
                    Bạn có chắc chắn muốn phê duyệt phiếu đánh giá này?
                    </p>
                    <span class="font-medium show_xoa_ten"></span>
                </div>

                <div class="khoibutton_form top-70">
                    <div 
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div 
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before js_done_duyet">
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
                    <p class="size-15 change_text_tc  text-center">Duyệt phiếu đánh giá <span class="font-medium"></span>thành công</p>
                </div>
                <div onclick="window.location.reload()" class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
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
    <? include('../includes/manh_modal.php'); ?>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>

</html>
<script type="text/javascript">
$(".tongso_xoavv").click(function() {
    $(".h4_change").text('Xóa phiếu đánh giá');
    $(".text_before_change").html(
        '<p> Bạn có chắc chắn xóa phiếu đánh giá <span class="font-medium">PDG00001</span>?</p>');
    $(".btnhuy_before").click(function() {
        $(".change_text_tb").html(
            '<p>Xóa phiếu đánh giá <span class="font-medium">PDG00001</span> thất bại!</p>');
    });
    $(".btnluu_before").click(function() {
        $(".change_text_tc").html(
            '<p>Xóa phiếu đánh giá <span class="font-medium">PDG00001</span> thành công!</p>');
    });
});
$('.js_chamdiem').click(function(){
    var data=$(this).attr('data-cham');
    if (data==1) {
        alert("Nhân viên chưa hoàn thành bài kiểm tra.Không thể chấm điểm");
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
$('.js_duyetphieu').click(function(){
    $('#popup_before').removeClass('hidden');
    var phieu_p=<?=$key_ex?>;
    
    $('.js_done_duyet').click(function(){

    $.ajax({
            url: '/ajax/duyet_phieu_kq.php',
            type: 'POST',
            data: {
                phieu_p:phieu_p,
                 
            },
            success: function(data){
                $('#popup_thanhcong').removeClass('hidden');
            }
        });   
    })
})
active_single_menu('phieu_menu');
</script>