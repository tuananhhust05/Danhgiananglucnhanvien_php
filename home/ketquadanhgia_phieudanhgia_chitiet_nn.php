<?
include('config.php');
// if (!in_array(1, $quyen_ketqua)) {header("Location: /trang_chu_sau_dang_nhap.html");};

$key_p = getValue("id","int","GET",0);
$query= new db_query("SELECT DISTINCT id_nguoidanhgia  FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_congty=".$usc_id." ");
$row = $query->result_array();

$dem=count($row);//Dem so nguoi danh gia

$query=new db_query("SELECT * FROM phieu_danhgia where id=".$key_p."  and id_congty = ".$usc_id."  ");
$row_phieu =mysql_fetch_assoc($query->result);

$query=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_kh =mysql_fetch_assoc($query->result);
$de_danhgia_id=$row_kh['kh_id_dg'];  
$de_kiemtra_id=$row_kh['kh_id_kt'];

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

foreach ($row as $value) {
    $id_nguoidanhgia=$value['id_nguoidanhgia'];
   
    $query= new db_query("SELECT id_doituong FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_nguoidanhgia = '".$id_nguoidanhgia."'");
    $row2 = $query->result_array();

}
$demm2=count($row2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        ::-webkit-scrollbar {
        display: none;
        }
        .khoibang ::-webkit-scrollbar {
        display: block;
        }
    </style>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kết quả đánh giá Chi tiết</title>
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
                            <a href="/ketquadanhgia-nhanvien.html">
                                <div class="flex center-height right-10 c-pointer">
                                    <img src="../img/manhimg/back.png" alt="Quay lại">
                                </div>
                            </a>
                            <p>Quản lý kết quả đánh giá / Chi tiết</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="chitiet_kq_1n">
                            <div class="tieude1024 size-14 flex center-height ">
                                <a href="/ketquadanhgia-nhanvien.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lại">
                                    </div>
                                </a>
                                <p>Quản lý kế kết quả đánh giá / Chi tiết</p>
                            </div>
                            <div class="flex">
                                <div class="khoi2">
                                    <a target="_blank" href="/Excel/kq_phieu_nv.php?id_p=<?=$key_p?>">
                                    <div class="rightsearch flex center-height bot-20">
                                        <div class="flex rightsearch_con2">
                                            <div class="flex rightsearch_con2_2">
                                                <button
                                                    class="btn-nenxanhluc-chutrang button center-height br-10 size-16 ">
                                                    <img src="../../img/manhimg/xuatexcel.png" class="wh14" alt="xuất excel">
                                                    <p class="left-10 font-medium">Xuất excel</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                    <div class="thangdiem shadow10 bot-20">
                                        <div class="nenxanh-chutrang js_nx_ct">
                                            <div class="padding15 flex space">
                                                <p class="size-16 font-bold">Thông tin phiếu đánh giá</p>
                                                <div class="flex c-pointer center-heght js_anbot ">
                                                    <p class="size-14 right-10 text_anbot">Ẩn bớt</p>
                                                    <div class="flex center-height ">
                                                        <img class="img_anbot" src="../img/manhimg/up.png" alt="ẩn bớt">
                                                    </div>
                                                </div>
                                                <div class="flex c-pointer center-heght hidden js_chitiet">
                                                    <p class="size-14 right-10 text_anbot">Chi tiết</p>
                                                    <div class="flex center-height ">
                                                        <img class="img_anbot" src="../img/manhimg/down2.png"
                                                            alt="Ẩn bớt">
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
                                                        $invID = str_pad($key_p, 4, '0', STR_PAD_LEFT);
                                                        echo $invID;
                                                    ?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Ngày tạo:</p>
                                                        <p class="cacketqua"><?=(date("d/m/Y", $row_phieu['phieu_ct_time_tao']));?></p>
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
                                                        <p class="cacmuc">Thời gian bắt đầu:</p>
                                                        <p class="cacketqua"><?=$row_kh['kh_giobatdau'] ?> - <?=(date("d/m/Y", $row_phieu['phieu_ngay_bd']));?></p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Thời gian kết thúc:</p>
                                                        <p class="cacketqua"><?=$row_kh['kh_gioketthuc'] ?> - <?=(date("d/m/Y", $row_phieu['phieu_ngay_bd']));?></p>
                                                    </div>
                                                </div>
                                               <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Người đánh giá:</p>
                                                        <p class="cacketqua">
                                                        <div data-id-kh="<?=$row_kh['kh_id']?>" class="flex center-height left-10 xem_ng_danhgia c-pointer">
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
                                                        <p class="cacmuc">Trạng thái:</p>
                                                        <p class="cacketqua chuxanhluc">Đã duyệt</p>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex center-height">
                                                        <p class="cacmuc">Người duyệt:</p>
                                                        <div class="flex center-height">
                                                            <?php if ($row_kh['kh_nguoiduyet']==$row_kh['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row_kh['kh_nguoiduyet'])[0]['com_logo']!=""): ?>
                                                           
                                                            <img class="wh26_ra right-10" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row_kh['kh_nguoiduyet'])[0]['com_logo'];?>" alt="Người tạo">
                                                            
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row_kh['kh_nguoiduyet'])[0]['com_logo']==""): ?>
                                                            
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                           
                                                        <?php endif ?>

                                                        <p class="size-14"><?=search($cty,'com_id',$row_kh['kh_nguoiduyet'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row_kh['kh_nguoiduyet']!=$row_kh['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row_kh['kh_nguoiduyet'])[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row_kh['kh_nguoiduyet'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                       
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row_kh['kh_nguoiduyet'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                             
                                                         <?php endif ?>
                                                         <p class="size-14"><?=search($data_list_nv,'ep_id',$row_kh['kh_nguoiduyet'])[0]['ep_name']?>
                                                        </p>
                                                     <?php endif ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="padding15 khoicon">
                                                    <div class="flex">
                                                        <p class="cacmuc">Ngày duyệt:</p>
                                                        <p class="cacketqua"><?=(date("d/m/Y", $row_kh['kh_ngayduyet']))?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
<? if ($dem==1 && $de_danhgia_id!=NULL) {
?>
<h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
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
        <table class="bangchinh chuden ">
            <tr>
                <th class="w_same_5">
                    <p class="phantucon">Tiêu chí</p>
                </th>
                <th class="w_same_5">
                    <p class="phantucon">Thang điểm</p>
                </th>
                <?php foreach ($row2 as $key => $value): ?>
                <th class="w_same_6">
                    <div class="flex center-height phantucon">
                        <div class="flex center-height">
                            <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']!=""): ?>
                                <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                            <?php endif ?>
                            <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']==""): ?>
                                <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                            <?php endif ?>
                            
                            <p class=" size-14"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_name']?></p>
                        </div>
                    </div>
                </th>
                <?php endforeach ?>
            </tr>

        <?php  $t=0; foreach ($de_danhgia as $k=>  $value): $t++;

        $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
        $row_cha = mysql_fetch_assoc($db_qr->result);
        ?>
            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <?  foreach  ($row2 as $va): 
                    $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$va['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                       $list_diem=explode(',',$val['cd_diem']); 
                       }
                    ?>
                    <td class="font-medium">
                        <?
                            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                            $row_con = $db_qr_c->result_array(); 
                            if (count($row_con)==0) {
                               
                                echo $list_diem[$t-1];
                            }

                            else{ $z=$tt; $tong_d_tccha=0;
                               foreach ($row_con as $key => $val) {
                                   $z++;
                                   $tong_d_tccha+=$list_diem[$z-1];
                               }
                               echo $tong_d_tccha;
                            }
                        
                        ?>
                    </td>
                <?php  endforeach  ?>  

            </tr>

            <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array(); 
            if (count($row_con)==0) $tt++;
            else $t=$tt; foreach ($row_con as $key => $val):$t++; $tt++;?>

            <tr>
                <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <?php  foreach ($row2 as $va):  
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$va['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                       $list_diem=explode(',',$val['cd_diem']); 
                       }
                    ?>
                    <td>
                        <?=$list_diem[$tt-1] ;?>
                    </td>
                <?php  endforeach ?>
            </tr>

            <?php  endforeach  ?>    
        <?php  endforeach  ?>    
            
            

            <tr>
                <td colspan="2" class="text-left font-medium">Nhận xét</td>
                <?php foreach ($row2 as $key => $value):
                   $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }
                 ?>
                    <td><?=$val['nhanxet']?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                <?php foreach ($row2 as $key => $value): 
                     $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }
                 ?>
                    <td><?=$val['tongdiem']?></td>
                <?php endforeach ?>
            </tr>
            
            <tr>
                <td colspan="2" class="text-left font-medium">Xếp loại</td>
                <?php foreach ($row2 as $key => $value): 
                    $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                       $row_cacdoituong = $qr->result_array();
                       foreach ($row_cacdoituong as $key => $val) {
                        
                       }?>
                 <?php foreach ($pl_de as $value_pl_de): ?>
                    <?if ($val['tongdiem']>=$value_pl_de[0]&&$val['tongdiem']<=$value_pl_de[1]) {
                            $loai_pl_de=$value_pl_de[2];
                    } ?>
                <?php endforeach ?>
                    <td class="<? 
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
                     ?></td>
                <?php endforeach ?>
            </tr>
        </table>
    </div>
</div>
                                        <?
                                    } ?>
                                    <?php if ($dem>1 && $de_danhgia_id!=NULL): ?>
                                        <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
                                        <div class="chitiet_phieudanhgia">
    <div class="khoibang po_r">
    <div class="thanh_dk">
        <div class="turn turn_left" id="turn_left4">
            <img src="../img/left.png" alt="sang trái">
        </div>
        <div class=" turn turn_right" id="turn_right4">
            <img src="../img/right.png" alt="sang phải">
        </div>
    </div>
        <div class="bangchung " id="bang_chung4">
            <table style="width: calc(<?=$dem?>*800px);" class="bangchinh chuden ">
                <tr>
                    <th rowspan="2" class="w_same_5">
                        <p class="phantucon">Tiêu chí</p>
                    </th>
                    <th rowspan="2" class="">
                        <p class="phantucon">Thang điểm</p>
                    </th>
                    <?php foreach ($row2 as $key => $value): ?>
                    <th class="w_same_4" colspan="<?=$dem?>">
                        <div class="flex center-height phantucon">
                            <div class="flex center-height">
                            <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']!=""): ?>
                                <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                            <?php endif ?>
                            <?php if (search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_image']==""): ?>
                                <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                            <?php endif ?>
                            <p class=" size-14"><?=search($data_list_nv,'ep_id',$value['id_doituong'])[0]['ep_name']?></p>
                            </div>
                        </div>
                    </th>
                    <?php endforeach ?>
                   
            </tr>
                <tr>
                    <?php foreach ($row2 as $key => $value): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                            <th class="w_same_8">
                                <div class="flex center-height phantucon ">
                                    <div class="flex center-height ">

                                        <?php if (search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image']!=""): ?>
                                            <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image'];?>" class="wh26_ra right-5" alt="người đánh giá">
                                        <?php endif ?>
                                        <?php if (search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image']==""): ?>
                                            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                                        <?php endif ?>
                                        
                                    <a class="elipsis1 size-14"><?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_name']?></a>
                                    </div>
                                </div>
                            
                            </th>
                        <?php endforeach ?>
                        
                    <?php endforeach ?>
                   
                </tr>

                
<?php $t=0;   foreach ($de_danhgia as $k=>  $value): $t++;

            $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_cha = mysql_fetch_assoc($db_qr->result);
            ?>

            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten']?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): $list_diem=explode(",", $value_row_n_gdg['cd_diem'])?>
                            <td class="font-medium">
                                <? 

                                    $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                    $row_con = $db_qr_c->result_array(); 
                                    if (count($row_con)==0) {
                                       
                                        echo $list_diem[$t-1];
                                    }

                                    else{ $z=$tt; $tong_d_tccha=0;
                                       foreach ($row_con as $key => $val) {
                                           $z++;
                                           $tong_d_tccha+=$list_diem[$z-1];
                                       }
                                       echo $tong_d_tccha;
                                    }
                                ?>
                            </td>
                        <?php endforeach ?>
                        
                <?php endforeach ?>
            </tr>

        <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array(); 
            if (count($row_con)==0) $tt++;
            else $t=$tt; foreach ($row_con as $key => $val):$t++;$tt++;?>
            <tr>
                <td class="text-left left-10">- <?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                        <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): $list_diem=explode(",", $value_row_n_gdg['cd_diem']) ?>
                            <td class="">
                                <?=$list_diem[$tt-1]?>
                            </td>
                        <?php endforeach ?>
                        
                <?php endforeach ?>
            </tr>
            <?php  endforeach  ?> 
                    
        <?php endforeach ?> 


        <tr>
            <td colspan="2" class="text-left font-medium">Nhận xét</td>
            <?php foreach ($row2 as $key => $value_row2): 
               $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
               $row_n_gdg = $qr->result_array(); 
                ?>
                <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                    <td>
                        <?print_r($value_row_n_gdg['nhanxet'])?>
                    </td>
                <?php endforeach ?>
                        
            <?php endforeach ?>
        </tr>


        <tr>
            <td colspan="2" class="text-left font-medium">Tổng điểm</td>
            <?php foreach ($row2 as $key => $value_row2): 
               $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
               $row_n_gdg = $qr->result_array(); 
                ?>
                <?php foreach ($row_n_gdg as $key => $value_row_n_gdg): ?>
                    <td><?print_r($value_row_n_gdg['tongdiem'])?></td>
                <?php endforeach ?>
                        
            <?php endforeach ?>
        </tr>
        <tr>
            <td colspan="2" class="text-left font-medium">Trung bình điểm</td>

            <?php foreach ($row2 as $key => $value_row2): 
                       $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_row2['id_doituong']."'");
                       $row_n_gdg = $qr->result_array(); 
                        ?>
                       <td colspan="<?=$dem?>">
                           <?php $tong_nhieu_tb=0; foreach ($row_n_gdg as $key => $value_row_n_gdg):$tong_nhieu_tb+=$value_row_n_gdg['tongdiem'] ?>
                               
                           <?php endforeach ?>
                           <?=$tong_nhieu_tb/$dem?>
                       </td>
                        
            <?php endforeach ?>

        </tr>

        <tr>
            <td colspan="2" class="text-left font-medium">Xếp loại</td>
            <?php foreach ($row2 as $key => $value_row2): 
                   $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_row2['id_doituong']."'");
                   $row_n_gdg = $qr->result_array(); 
                    ?>
                    <?php $tong_nhieu_tb=0; foreach ($row_n_gdg as $key => $value_row_n_gdg):$tong_nhieu_tb+=$value_row_n_gdg['tongdiem'] ?>
                               
                           <?php endforeach ?>
                           <?$maz=$tong_nhieu_tb/$dem?>
                           <?php foreach ($pl_de as $value_pl_de): ?>
                                <?if ($maz>=$value_pl_de[0]&&$maz<=$value_pl_de[1]) {
                                        $loai_pl_de=$value_pl_de[2];
                                } ?>
                            <?php endforeach ?>
                   <td colspan="<?=$dem?>" class="<? 
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
                     ?></td> 
            <?php endforeach ?>
        </tr>  

            </table>
        </div>
    </div>
</div>
                                    <?php endif ?>
                                    
                                    
                                        <?php if ($de_kiemtra_id!=NULL): ?>

                                        <?php if ($dem==1): ?>
                                            <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề kiểm tra</h4>
                                            <div class="khoibang po_r">
                                            <div class="thanh_dk">
                                                <div class="turn turn_left" id="turn_left2">
                                                    <img src="../img/left.png" alt="sang trái">
                                                </div>
                                                <div class=" turn turn_right" id="turn_right2">
                                                    <img src="../img/right.png" alt="sang phải">
                                                </div>
                                            </div>
                                            <div  class="bangchung " id="bang_chung2">
                                                <table class="bangchinh chuden ">
                                                    <tr>
                                                        <th class="w_same_4">
                                                            <p class="phantucon">Câu hỏi</p>
                                                        </th>
                                                        <th class="w_same_8">
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>

                                                        <?php foreach ($row2 as $key_kt => $value_kt):
                                                           
                                                         ?>
                                                            <th class="w_same_4">
                                                                <div class="flex center-height phantucon">
                                                                    <div class="flex center-height">
                                                                        <?php if (search($data_list_nv,'ep_id',$value_kt['id_doituong'])[0]['ep_image']!=""): ?>
                                                                             <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value_kt['id_doituong'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                                        <?php endif ?>
                                                                        <?php if (search($data_list_nv,'ep_id',$value_kt['id_doituong'])[0]['ep_image']==""): ?>
                                                                            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                                                                        <?php endif ?>

                                                                        <p class=" size-14"><?=search($data_list_nv,'ep_id',$value_kt['id_doituong'])[0]['ep_name']?></p>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    
                                                    <?php $stt=0; foreach ($de_kiemtra as $key_cauhoi => $value_cauhoi):$stt++; 
                                                        $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value_cauhoi."'");
                                                        $info = mysql_fetch_assoc($query->result);
                                                    ?>
                                                    <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
                                                    <tr>
                                                        <td class="text-left font-medium">Câu hỏi <?=$stt?>: <?=$info['cauhoi']?></td>
                                                        <td class=""><?=$info['sodiem']?></td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng):
                                                            $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                          // $qr->result_array()
                                                           $list_diem=explode(',',$row_cacdoituong['cd_diem_ktra']); 
                                                           $nx=$row_cacdoituong['nhanxet_kt']; 
                                                           
                                                         ?>
                                                            <td><?=$list_diem[$key_cauhoi] ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng):$qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $nx=$row_cacdoituong['nhanxet_kt'];  ?>
                                                            <td><?=$nx?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng): $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $ton_d=$row_cacdoituong['tongdiem_kt'];?>
                                                            <td><?=$ton_d?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Xếp loại</td>
                                                        <?php foreach ($row2 as $key_so_ng => $value_so_ng): $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value_so_ng['id_doituong']."'");
                                                           $row_cacdoituong = mysql_fetch_assoc($qr->result);
                                                           $ton_d=$row_cacdoituong['tongdiem_kt'];?>
                                                           <?php foreach ($pl_kt as $value_pl_kt): ?>
                                                                    <?if ($ton_d>$value_pl_kt[0]&&$ton_d<=$value_pl_kt[1]) {
                                                                            $loai_pl=$value_pl_kt[2];
                                                                    } ?>
                                                                <?php endforeach ?>
                                                            <td class="<? 
                                                                if($loai_pl==1) echo"chunau";
                                                                if($loai_pl==2) echo"chuxanh";
                                                                if($loai_pl==3) echo"chuxanhluc";
                                                                if($loai_pl==4) echo"chucam";
                                                                if($loai_pl==5) echo"chudo";
                                                                 ?>"><? 
                                                                if($loai_pl==1) echo"Yếu";
                                                                if($loai_pl==2) echo"Trung Bình";
                                                                if($loai_pl==3) echo"Khá";
                                                                if($loai_pl==4) echo"Giỏi";
                                                                if($loai_pl==5) echo"Xuất sắc";
                                                                if($loai_pl=="") echo"Chưa có xếp loại";
                                                                 ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                </table>
                                            </div>
                                            </div>
                                        <?php endif ?>

                                        <?php if ($dem>1): ?>
                                            <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề kiểm tra</h4>
                                            <div class="chitiet_phieudanhgia">
                                            <div class="khoibang po_r">
                                            <div class="thanh_dk">
                                                <div class="turn turn_left" id="turn_left3">
                                                    <img src="../img/left.png" alt="sang trái">
                                                </div>
                                                <div class=" turn turn_right" id="turn_right3">
                                                    <img src="../img/right.png" alt="sang phải">
                                                </div>
                                            </div>
                                            <div  class="bangchung " id="bang_chung3">
                                                <table class="bangchinh chuden ">
                                                    <tr>
                                                        <th class="w_same_4" rowspan="2">
                                                            <p class="phantucon">Câu hỏi</p>
                                                        </th>
                                                        <th class="w_same_8" rowspan="2">
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>
                                                        <?php foreach ($row2 as $value_doituong): ?>
                                                        <th class="w_same_4" colspan="<?=$dem?>">
                                                            <div class="flex center-height phantucon">
                                                                <div class="flex center-height">
                                                                    <?php if (search($data_list_nv,'ep_id',$value_doituong['id_doituong'])[0]['ep_image']!=""): ?>
                                                                             <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value_doituong['id_doituong'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                                        <?php endif ?>
                                                                        <?php if (search($data_list_nv,'ep_id',$value_doituong['id_doituong'])[0]['ep_image']==""): ?>
                                                                            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                                                                        <?php endif ?>
                                                                    
                                                                    <p class=" size-14"><?=search($data_list_nv,'ep_id',$value_doituong['id_doituong'])[0]['ep_name']?></p>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 
                                                          
                                                            ?>
                                                            <?php foreach ($row_n_gdg as  $value_row_n_gdg): ?>
                                                                <th class="w_same_8">
                                                                    <div class="flex center-height phantucon ">
                                                                        <div class="flex center-height ">

                                                                            <?php if (search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image']!=""): ?>
                                                                                 <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image'];?>" class="wh26_ra right-5" alt="người đánh giá">
                                                                            <?php endif ?>
                                                                            <?php if (search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_image']==""): ?>
                                                                                <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                                                                            <?php endif ?>
                                                                            
                                                                            
                                                                        <a class="elipsis1 size-14"><?=search($data_list_nv,'ep_id',$value_row_n_gdg['id_nguoidanhgia'])[0]['ep_name']?></a>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </th>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                       
                                                    </tr>
                                                    
                                                    <?php $stt=0; foreach ($de_kiemtra as $key_cauhoi => $value_cauhoi):$stt++; 
                                                        $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value_cauhoi."'");
                                                        $info = mysql_fetch_assoc($query->result);
                                                    ?>   
                                                    <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
                                                    <tr>
                                                        <td class="text-left font-medium">Câu hỏi <?=$stt?>: <?=$info['cauhoi']?></td>
                                                        <td class=""><?=$info['sodiem']?></td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php foreach ($row_n_gdg as $value_row_n_gdg):$list_diem=explode(',',$value_row_n_gdg['cd_diem_ktra']); ?>
                                                                <td class="">
                                                                    <?=$list_diem[$key_cauhoi]?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                   
                                                   <?php endforeach ?>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php foreach ($row_n_gdg as $value_row_n_gdg):$nx=$value_row_n_gdg['nhanxet_kt']; ?>
                                                                <td class="">
                                                                    <?=$nx?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                <td class="">
                                                                    <?=$tongdiem_nn;$s_tongdiem_nn+=$tongdiem_nn;?>
                                                                </td>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Trung bình điểm</td>
                                                        <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                    <?$s_tongdiem_nn+=$tongdiem_nn;?>
                                                            <?php endforeach ?>
                                                                <td colspan="<?=$dem?>" class="">
                                                                    <?=$s_tongdiem_nn/$dem;$b=$s_tongdiem_nn/$dem?>
                                                                </td>
                                                        <?php endforeach ?>
                                                        

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left font-medium">Xếp loại</td>
                                                            <?php foreach ($row2 as  $value): 
                                                           $qr= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p."  and id_doituong = '".$value['id_doituong']."'");
                                                           $row_n_gdg = $qr->result_array(); 

                                                            ?>
                                                            <?php $s_tongdiem_nn=0; foreach ($row_n_gdg as $value_row_n_gdg):$tongdiem_nn=$value_row_n_gdg['tongdiem_kt']; ?>
                                                                    <?$s_tongdiem_nn+=$tongdiem_nn;?>
                                                            <?php endforeach ?>

                                                            <?$b=$s_tongdiem_nn/$dem?>
                                                                
                                                            <?php foreach ($pl_kt as $value_pl_kt): ?>
                                                                <?if ($b>$value_pl_kt[0]&&$b<=$value_pl_kt[1]) {
                                                                        $loai_pl=$value_pl_kt[2];
                                                                } ?>
                                                            <?php endforeach ?>
                                                                <td colspan="<?=$dem?>" class="<? 
                                                                if($loai_pl==1) echo"chunau";
                                                                if($loai_pl==2) echo"chuxanh";
                                                                if($loai_pl==3) echo"chuxanhluc";
                                                                if($loai_pl==4) echo"chucam";
                                                                if($loai_pl==5) echo"chudo";
                                                                 ?>">
                                                                    <? 
                                                                if($loai_pl==1) echo"Yếu";
                                                                if($loai_pl==2) echo"Trung Bình";
                                                                if($loai_pl==3) echo"Khá";
                                                                if($loai_pl==4) echo"Giỏi";
                                                                if($loai_pl==5) echo"Xuất sắc";
                                                                if($loai_pl=="") echo"Chưa có xếp loại";
                                                                 ?>
                                                                </td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                </table>
                                            </div>
                                            </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
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
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script>
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
    active_single_menu('ketqua_tong_menu');
active_single_menu_con('kq_nv_menu');
</script>
</html>