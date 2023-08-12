<?
include('config.php');
// if (!in_array(1, $quyen_ketqua)) {header("Location: /trang_chu_sau_dang_nhap.html");};

$key_pb = getValue("id","int","GET",0);
$key_p = getValue("id_p","int","GET",0);
     $query= new db_query("SELECT * FROM phieu_danhgia_chitiet where phieu_id=".$key_p." and phieuct_trangthai=2 and id_doituong = '".$key_pb."'");
     $row = $query->result_array();
             
     $dem=count($row);
     
foreach ($row as $key => $row_diem) {
     $list_diem=explode(',',$row_diem['cd_diem']);
}

$query=new db_query("SELECT * FROM phieu_danhgia where id=".$key_p."  and id_congty = ".$usc_id."  ");
$row_phieu =mysql_fetch_assoc($query->result);

$query=new db_query("SELECT * FROM kh_danhgia where kh_id=".$row_phieu['phieuct_id_kh']." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_kh =mysql_fetch_assoc($query->result);
$de_danhgia_id=$row_kh['kh_id_dg'];  

$query=new db_query("SELECT * FROM de_danhgia where dg_id=".$de_danhgia_id." and trangthai_xoa=1 and id_congty = ".$usc_id."  ");
$row_de =mysql_fetch_assoc($query->result);

$de_danhgia=explode(',',$row_de['dg_id_tieuchi']);
if ($row_de['dg_loai_macdinh']!="") $pl_de= json_decode($row_de['dg_loai_macdinh'], true);
     else $pl_de= json_decode($row_de['dg_phanloaikhac'], true);

         
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        ::-webkit-scrollbar {
        display: none;
        }
    </style>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kết quả đánh giá Chi tiết phòng ban</title>
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
                            <a href="/ketquadanhgia-phongban.html">
                                <div class="flex center-height right-10 c-pointer">
                                    <img src="../img/manhimg/back.png" alt="Quay lai">
                                </div>
                            </a>
                            <p>Quản lý kết quả đánh giá / Chi tiết phòng ban</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="chitiet_kq_1n phongban_chitiet kqpb">
                            <div class="tieude1024 size-14 flex center-height ">
                                <a href="/ketquadanhgia-phongban.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Quản lý kế kết quả đánh giá / Chi tiết</p>
                            </div>
                            <div class="flex">
                                <div class="khoi2">
                                    <a target="_blank" href="/Excel/kq_pb.php?id=<?=$key_pb?>&&id_p=<?=$key_p?>">
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
                                                            alt="chi tiết">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="over_scroll_x">
                                            <div class="nentrang show_js_anbot scrollx_lotrinhchitiet">
                                                <div class="padding15 khoicon">
                                                    <div class=" flex">
                                                        <p class="cacmuc">Phòng ban:</p>
                                                        <p class="cacketqua"><?=search($arr_dep,'dep_id',$key_pb)[0]['dep_name']?></p>
                                                    </div>
                                                </div>
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
                            <?php if ($dem==1): ?>
                                <h4 class="chuxanh size-16 font-bold top-20 bot-20">Kết quả đề đánh giá</h4>
                                    <div  class="khoibang mot-mot ">
                                       
                                        <div class="bangchung " >
                                            <table class="bangchinh chuden ">
                                                <tr>
                                                    <th class="w_same_3">
                                                        <p class="phantucon">Tiêu chí</p>
                                                    </th>
                                                    <th class="w_same_8">
                                                        <p class="phantucon">Thang điểm</p>
                                                    </th>
                                                    <th class="w_same_4">
                                                        <p class="phantucon">Kết quả</p>
                                                    </th>

                                                </tr>
                                                <?php   foreach ($de_danhgia as $k=>  $value): 

        $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
        $row_cha = mysql_fetch_assoc($db_qr->result);
        ?>
            <tr>
                <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?></td>
                <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                <td class="font-medium ">
                    <?php 
                        $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                        $row_con = $db_qr_c->result_array();  
                        if (count($row_con)==0){$tt++;$s=$list_diem[$tt-1];} 
                          else $s=0; foreach ($row_con as $key => $val): $tt++;  ?> 
                                <? $s+=$list_diem[$tt-1];?>
                    <?php  endforeach  ?>
                    <?echo $s;?>
                </td>
            </tr>

            <?php 
            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
            $row_con = $db_qr_c->result_array();  
            $dem_row_con=mysql_num_rows($db_qr_c->result);
            if (count($row_con)==0) $t++;
               else foreach ($row_con as $key => $val): $t++;  ?> 
            <tr>
                <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                <td class=""><?=$val['tcd_thangdiem']?></td>
                <td class=""><?=$list_diem[$t-1];?></td>
            </tr>
            <?php  endforeach  ?>
        <?php   endforeach ?>
            <tr>
                <td class="text-left font-medium">Nhận xét</td>
                <td colspan="2"><?=$row_diem['nhanxet']?></td>
            </tr>
            <tr>
                <td class="text-left font-medium">Tổng điểm</td>
                <td colspan="2"><?=$row_diem['tongdiem']?></td>
            </tr>
            <tr>
                <td colspan="" class="text-left font-medium">Trung bình điểm</td>
                <td colspan="2"><?=$row_diem['tongdiem']?></td>
            </tr>
            <tr>
                <?php foreach ($pl_de as $value_pl_de): ?>
                                <?if ($row_diem['tongdiem']>$value_pl_de[0]&&$row_diem['tongdiem']<=$value_pl_de[1]) {
                                        $loai_pl_de=$value_pl_de[2];
                                } ?>
                <?php endforeach ?>
                <td class="text-left font-medium">Xếp loại</td>
                <td colspan="2" class="<? 
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
                     ?>      
                </td>
            </tr>
        </table>
                                        </div>
                                    </div>
                            <?php endif ?>        
                                

                            <?php if ($dem>1): ?>
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
                                        <div class="bangchung " id="bang_chung">
                                            <table class="bangchinh chuden ">
                                                <tr>
                                                    <th class="w_same_3">
                                                        <p class="phantucon">Tiêu chí</p>
                                                    </th>
                                                    <th>
                                                        <p class="phantucon">Thang điểm</p>
                                                    </th>
                                                    
                                            <?php foreach ($row as $key => $value): ?>
                                            <th class="w_same_4">
                                                <div class="flex center-height phantucon">
                                                    <div class="flex center-height">


                                                        <?php if (search($data_list_nv,'ep_id',$value['id_nguoidanhgia'])[0]['ep_image']!=""): ?>
                                                        <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value['id_nguoidanhgia'])[0]['ep_image'];?>" class="wh26_ra right-10" alt="người đánh giá">
                                                       
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$value['id_nguoidanhgia'])[0]['ep_image']==""): ?>
                                                             <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra right-10" alt="người đánh giá">
                                                        <?php endif ?>
                                                       
                                                    <p class="size-14"><?=search($data_list_nv,'ep_id',$value['id_nguoidanhgia'])[0]['ep_name']?>
                                                    </p>
                                                    </div>
                                                </div>
                                            </th>
                                            <?php endforeach ?>
                                                </tr>
                                                <?php $t=0;   foreach ($de_danhgia as   $value): $t++;

                                            $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                            $row_cha = mysql_fetch_assoc($db_qr->result);
                                        ?>
                                        <tr>
                                            <td class="text-left font-medium"><?=$row_cha['tcd_ten'];?> </td>
                                            <td class=""><?=$row_cha['tcd_thangdiem']?></td>
                                            <?  foreach  ($row as $va): $list_diem=explode(',',$va['cd_diem']);?>
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
                                                 
                                            <?php  endforeach ?>  

                                        </tr>

                                            <?php 
                                                $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row_con = $db_qr_c->result_array();  
                                                
                                                if (count($row_con)==0) $tt++;
                                                    else  $t=$tt; foreach ($row_con as $key => $val): $t++;  $tt++?> 
                                          
                                                <tr>
                                                    
                                                    <td class="text-left"><?=$val['tcd_ten'] ;  ?></td>
                                                    <td class=""><?=$val['tcd_thangdiem']?></td>

                                                    <?php  foreach ($row as $va): $list_diem=explode(',',$va['cd_diem']); ?>
                                                        <td class="<?=$va['id']?>"><?=$list_diem[$tt-1]; ?> </td>
                                                    <?php  endforeach ?>
                                                    
                                                </tr>
                                                
                                            <?php endforeach ?>
                                            
                                        <?php endforeach ?>


                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Nhận xét</td>
                                            <?php foreach ($row as $key => $value): ?>
                                                <td><?=$value['nhanxet']?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Tổng điểm</td>
                                            <?php $tong_diem=0; foreach ($row as $key => $value): ?>
                                                <td><?=$value['tongdiem'];$tong_diem+=$value['tongdiem']?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-left font-medium">Trung bình điểm</td>
                                            <td colspan="<?=$dem?>"><?=$tong_diem/$dem;$a=$tong_diem/$dem;?></td>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pl_de as $value_pl_de): ?>
                                                            <?if ($a>$value_pl_de[0] && $a<=$value_pl_de[1]) {
                                                                    $loai_pl_de=$value_pl_de[2];
                                                            } ?>
                                                        <?php endforeach ?>
                                            <td  colspan='2' class="text-left font-medium">Xếp loại</td>
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
                                                if($loai_pl_de=="") echo"Điểm không hợp lệ";
                                                 ?>      
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                    </div>
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
active_single_menu_con('kq_pb_menu');
</script>
</html>