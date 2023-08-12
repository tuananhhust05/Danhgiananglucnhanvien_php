<?
include('config.php');
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
if (!in_array(1, $quyen_kehoach)) {header("Location: /trang_chu_sau_dang_nhap.html");};
$key = getValue("id","int","GET",0);
$keyy = getValue("id","int","GET",0);
$key_ex = getValue("id","int","GET",0);
     $query= new db_query("SELECT * FROM kh_danhgia where kh_id = '".$key."' and id_congty='".$usc_id."' ");
     $row = mysql_fetch_assoc($query->result);
     $is_iset=mysql_num_rows($query->result);
     if($is_iset==0){
        header("location:/quan_ly_ke_hoach_danh_gia.html");
     }
     $query_ch= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$row['kh_id_kt']."'");
     $row_ch = mysql_fetch_assoc($query_ch->result);
     $cauhoi= explode(',',$row_ch['danhsach_cauhoi']);
     $dem_so_ch=count($cauhoi);
     
     if ($row_ch['phanloai_macdinh']!="") $pl= json_decode($row_ch['phanloai_macdinh'], true);
     else $pl= json_decode($row_ch['phanloaikhac'], true);

     $query_dg= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
     $row_dg = mysql_fetch_assoc($query_dg->result);
     if ($row_dg['dg_loai_macdinh']!="") $pl_dg= json_decode($row_dg['dg_loai_macdinh'], true);
     else $pl_dg= json_decode($row_dg['dg_phanloaikhac'], true);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Chi tiết kế hoạch đánh giá</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
        @media (max-width: 1024px){
            
            .wh_img_prvct{
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="ql_kehoach_chitiet" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header ">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/quan_ly_ke_hoach_danh_gia.html'" class="c-pointer">Quản lý kế hoạch đánh giá <span> / </span><span> Chi tiết</span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="header_ql_tieuchi">
                                <div class="title_header ">
                                    <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/quan_ly_ke_hoach_danh_gia.html'" class="c-pointer">Quản lý kế hoạch đánh giá <span> / </span><span> Chi tiết</span></p>
                                    </div>
                                </div>
                                <div class="dai_vai d_flex align_c flex_end mb_20">
                                    <div class="btn_header_ql_tieuchi d_flex">
                                        <?php if (in_array(5, $quyen_kehoach)): ?>
                                            <?php if ($row['kh_trangthai']==1): ?>
                                        <div data-id-tc='<?=$_SESSION['ep_id']?>' data-name="<?=$row['kh_ten']?>" data-id="<?=$row['kh_id']?>" class="div_tuchoi btn_tuchoi <? if($row['kh_trangthai']==3) echo "opacitty5"; ?>">
                                            <div class="btn btn_xanh kh_ct_manh_xoa mr_15">
                                                <div class="img mr_12">
                                                    <img src="../img/x.png" alt="Từ chối">
                                                </div>
                                                <p>Từ chối</p>
                                            </div>
                                        </div>
                                        <div class="div_duyet c-pointer btn_duyet <? if($row['kh_trangthai']==2) echo "opacitty5"; ?>" data-ngay-duyet="<?=time() ?>" data-nguoi-duyet="<?=$_SESSION['ep_id']?>" data-name="<?=$row['kh_ten']?>" data-id="<?=$row['kh_id'];?>">
                                            <div class="btn btn_xanh kh_ct_manh_xoa mr_15 " >
                                                <div class="img mr_12">
                                                    <img src="../img/duyet.png" alt="Duyệt">
                                                </div>
                                                <p>Duyệt</p>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <?php endif ?>
                                        <?php if (in_array(4, $quyen_kehoach)): ?>
                                        <div data-id="<?=$row['kh_id']?>" data-name="<?=$row['kh_ten']?>" class="div_xoa btn_xoa <?if($row['kh_trangthai']==2) echo 'duyet_kh_but'; ?>">
                                            <div class="btn btn_trang kh_ct_manh_xoa mr_15">
                                                <p class="color_blue">Xóa kế hoạch</p>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <?php if (in_array(3, $quyen_kehoach)): ?>
                                            <?php if ($row['kh_trangthai']==1): ?>
                                        <div class="sua_ahaha">
                                            <a href="/quan_ly_ke_hoach_danh_gia_chinh_sua_<?=$row['kh_id']?>.html" class="btn sua">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_but.png" alt="Chỉnh sửa">
                                                </div>
                                                <p>Chỉnh sửa</p>
                                            </a>
                                        </div>
                                        <?php endif ?>
                                        <?php endif ?>
                                        <a href="/Excel/kh_dg.php?id=<?=$key_ex?>">
                                        <div class="div_excel">
                                            <div class="btn excel">
                                                <div class="img mr_12">
                                                    <img src="../img/icon_excel.png" alt="File excel">
                                                </div>
                                                <p>Xuất excel</p>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                <div class="body_ql_tieuchi body_kehoach_chitiet">
                                    <div class="header_d width_100">
                                        <h4>Thông tin kế hoạch đánh giá</h4>
                                    </div>
                                    <div style="overflow-x: auto;" class="body width_100 ">
                                        <ul class="thongtin_tieuchi">
                                            <li class="item">
                                                <p>Tên kế hoạch:</p>
                                                <p><?=$row['kh_ten'];?></p>
                                            </li>
                                            <li class="item">
                                                <p>Loại đánh giá:</p>
                                                <p><? if($row['kh_loai']==1) echo "Đề đánh giá";
                                                      elseif($row['kh_loai']==2) echo "Đề kiểm tra"; 
                                                      elseif($row['kh_loai']==3) echo "Đề đánh giá và Đề kiểm tra"; 
                                                ?></p>
                                            </li>
                                            
                                            <?
                                            if ($row['kh_loai']==1||$row['kh_loai']==3){
                                                ?>
                                                <li class="item">
                                                <p>Số tiêu chí:</p>
                                                <p><?
                                                    $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
                                                    $rowtc = mysql_fetch_assoc($query->result);
                                                    $dem=explode(",",$rowtc["dg_id_tieuchi"]);
                                                    $dem_vip=count($dem);
                                                    echo $dem_vip;
                                                ?></p>
                                            </li>
                                           <?
                                            } 
                                           ?>
                                           <?
                                            if ($row['kh_loai']==2||$row['kh_loai']==3){
                                                ?>
                                                <li class="item">
                                                <p>Số câu hỏi</p>
                                                <p class=""><?=$dem_so_ch?></p>
                                            </li>
                                           <?
                                            } 
                                           ?>
                                            
                                            
                                            <li class="item">
                                                <p>Người tạo:</p>
                                                <div class="d_flex flex_start  width_100">
                                                    <div class="d_flex align_c">
                                                         <?php if ($row['kh_nguoitao']==$row['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row['kh_nguoitao'])[0]['com_logo']!=""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['kh_nguoitao'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row['kh_nguoitao'])[0]['com_logo']==""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$row['kh_nguoitao'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row['kh_nguoitao']!=$row['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row['kh_nguoitao'])[0]['ep_image']!=""): ?>
                                                            <div class="img  ">
                                                                <img class="wh26_ra right-10" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['kh_nguoitao'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row['kh_nguoitao'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$row['kh_nguoitao'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="item">
                                                <p>Ngày tạo:</p>
                                                <p>
                                                <? 
                                                echo(date("d/m/Y", $row['kh_ngaytao'])); ?>
                                                </p>
                                            </li>
                                            <li class="item">
                                                <p>Trạng thái:</p>
                                               
                                                <p class="trang_thai <? if($row['kh_trangthai']==2) echo "da_duyet" ?> <? 
                                                if($row['kh_trangthai']==1) echo"color_y"; 
                                                if($row['kh_trangthai']==2) echo"color_green"; 
                                                if($row['kh_trangthai']==3) echo"color_red"; 
                                            ?> "><? 
                                                if($row['kh_trangthai']==1) echo"Chờ duyệt"; 
                                                if($row['kh_trangthai']==2) echo"Đã duyệt"; 
                                                if($row['kh_trangthai']==3) echo"Từ chối"; 
                                            ?></p>
                                            </li>
                                            <li class="item">
                                                <?php if ($row['kh_trangthai']!=3): ?>
                                                <p>Người duyệt:</p>
                                                <? if ($row['kh_nguoiduyet']!=NULL) {
                                                    ?>
                                                    
                                                    <div class="d_flex flex_start  width_100">
                                                    <div class="d_flex align_c">
                                                         <?php if ($row['kh_nguoiduyet']==$row['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row['kh_nguoiduyet'])[0]['com_logo']!=""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['kh_nguoiduyet'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row['kh_nguoiduyet'])[0]['com_logo']==""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$row['kh_nguoiduyet'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row['kh_nguoiduyet']!=$row['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row['kh_nguoiduyet'])[0]['ep_image']!=""): ?>
                                                            <div class="img  ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['kh_nguoiduyet'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row['kh_nguoiduyet'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$row['kh_nguoiduyet'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </div>
                                                <?
                                                } ?>
                                                
                                                <?php endif ?>
                                                <?php if ($row['kh_trangthai']==3): ?>
                                                    <p>Người từ chối:</p>
                                                    <div class="d_flex flex_start  width_100">
                                                    <div class="d_flex align_c">
                                                         <?php if ($row['ten_tchoi']==$row['id_congty']): ?>

                                                        <?php if (search($cty,'com_id',$row['ten_tchoi'])[0]['com_logo']!=""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/company/logo/<?=search($cty,'com_id',$row['ten_tchoi'])[0]['com_logo'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if (search($cty,'com_id',$row['ten_tchoi'])[0]['com_logo']==""): ?>
                                                            <div class="img  ">
                                                            <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>

                                                        <p><?=search($cty,'com_id',$row['ten_tchoi'])[0]['com_name']?></p>
                                                     <?php endif ?>

                                                     <?php if ($row['ten_tchoi']!=$row['id_congty']): ?>
                                                        <?php if (search($data_list_nv,'ep_id',$row['ten_tchoi'])[0]['ep_image']!=""): ?>
                                                            <div class="img  ">
                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$row['ten_tchoi'])[0]['ep_image'];?>" alt="Người tạo">
                                                            </div>
                                                        <?php endif ?>
                                                         <?php if (search($data_list_nv,'ep_id',$row['ten_tchoi'])[0]['ep_image']==""): ?>
                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                         <?php endif ?>
                                                        <p><?=search($data_list_nv,'ep_id',$row['ten_tchoi'])[0]['ep_name']?></p>
                                                     <?php endif ?>
                                                    </div>
                                                </div>
                                                <?php endif ?>
                                            </li>
                                            <?php if ($row['kh_trangthai']!=3): ?>
                                                
                                            
                                            <li class="item">
                                                <p>Ngày duyệt:</p>
                                                <p><? if ($row['kh_ngayduyet']!=NULL)
                                                echo(date("d/m/Y", $row['kh_ngayduyet'])); ?> 
                                                </p>
                                            </li>
                                            <?php endif ?>

                                            <?php if ($row['kh_trangthai']==3): ?>
                                            <li class="item">
                                                <p>Ngày từ chối:</p>
                                                <p><? if ($row['ngay_tchoi']!=NULL)
                                                echo(date("d/m/Y", $row['ngay_tchoi'])); ?> 
                                                </p>
                                            </li>
                                            <?php endif ?>
                                            <li class="item">
                                                <p>Ngày bắt đầu kế hoạch:</p>
                                                <p>
                                                <? 
                                                echo(date("d/m/Y", $row['kh_ngaybatdau'])); ?> 
                                                </p>
                                            </li>
                                            <li class="item">
                                                <p>Ngày kết thúc kế hoạch:</p>
                                                <p><? 
                                                echo(date("d/m/Y", $row['kh_ngayketthuc'])); ?></p>
                                            </li>
                                            <li class="item">
                                                <p>Giờ bắt đầu đánh giá:</p>
                                                <p><?=$row['kh_giobatdau']?></p>
                                            </li>
                                            <li class="item">
                                                <p>Giờ kết thúc đánh giá:</p>
                                                <p><?=$row['kh_gioketthuc']?></p>
                                            </li>
                                            <li class="item">
                                                <p>Đánh giá lặp lại:</p>
                                                <p>
                                                <? 
                                                    if ($row['kh_laplai']==0) echo "Không lặp lại";   
                                                    if ($row['kh_laplai']==1) echo "Lặp lại hàng ngày";   
                                                    if ($row['kh_laplai']==2) echo "Lặp lại hàng tuần";   
                                                    if ($row['kh_laplai']==3) echo "Lặp lại hàng tháng";  
                                                    if ($row['kh_laplai']==4) echo "Lặp lại hàng năm";   
                                                     
                                                ?>    
                                                </p>
                                            </li>
                                            <li class="item ghi_chu">
                                                <p>Ghi chú:</p>
                                                <div class="font-normal">
                                                    
                                                <p><?if ($row['kh_ghichu']=="") {
                                                    echo '—';
                                                }?> <?=$row['kh_ghichu']?></p>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="container_cum_de container_cum_de_1 ">
                                        <div class="d_flex space_b width_100 align_c color_blue top-20 mb_20">
                                            <h4 class="show_de font_ss16 font_wB cursor_p">
                                                <?
                                                $query= new db_query("SELECT kt_ten FROM de_kiemtra where kt_id = '".$row['kh_id_kt']."'");
                                                $de_kt = mysql_fetch_assoc($query->result);
                                                echo $de_kt['kt_ten'];    
                                                ?>
                                            </h4>
                                        </div>

                                        <?php $stt=0; foreach ($cauhoi as  $value):$stt++; 
                                            $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value."'");
                                            $info = mysql_fetch_assoc($query->result);
                                            $dapan=json_decode($info['dap_an'], true);
                                            $img_cauhoi=json_decode($info['img_cauhoi'], true);
                                        ?>

                                        <div class="cauhoi_chitiet cauhoi_chitiet_1 mb_20">
                                            <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
                                            <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$info['cauhoi']?></span> <span class="font_s14 color_blue">(<?=$info['sodiem']?> điểm)</span></p>

                                            <?php if (count($img_cauhoi)>0): ?>
                                                <div class="div_preview_image top-15">
                                                <?php foreach ($img_cauhoi as  $img): ?>
                                                    <div class='m_boder_img_cauhoi flex bot-15'>
                                                        <div class='wh_img_prvct flex'>
                                                            <img class='img_cauhoi' style='width: 100%;' src='../ajax/uploads/<?=$img?>'>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                                </div>
                                            <?php endif ?>

                                            <p class="font-500 chuden mb_20">Đáp án</p>
                                            
                                            <?php if ($info['hinhthuc']==1): ?>
                                                    <p><?=$info['dap_an']?></p>
                                            <?php endif ?>

                                            <?php if ($info['hinhthuc']==2): ?>
                                                    <?php foreach ($dapan as  $value): ?>
                                                        <div class="d_flex align_start mb_20">
                                                            <input style="pointer-events: none;" <?if($value['answer_right'][0]==1)echo 'checked' ?> type="radio" name="tracnghiem<?=$stt?>" value="" class="mr_5">
                                                            <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                                        </div>
                                                    <?php endforeach ?>
                                            <?php endif ?>

                                            <?php if ($info['hinhthuc']==3): ?>
                                                    <?php foreach ($dapan as  $value): ?>
                                                        <div class="d_flex align_start mb_20">
                                                            <input readonly <?if($value['answer_right'][0]==1)echo 'checked' ?> type="checkbox" name="hopkiem[]" value="" class="mr_5">
                                                            <label style="width: 90%;" for="huey"><?=$value['answer'][0]?></label>
                                                        </div>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </div>
                                        <?php endforeach ?>
                                        
                                        <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh mb_20 <?if($row['kh_loai']==1)echo ""; ?> ">
                                        <div class="header_d width_100 <?if($row['kh_loai']==1) echo "hidden"; ?>">
                                            <h4>Phân loại đánh giá</h4>
                                        </div>
                                    <div style="overflow-x: auto;" class="body width_100">
                                        <ul class="thongtin_tieuchi">
                                            <?
                                                foreach ($pl as $value) {
                                                    ?>
                                                    <li class="item">
                                                        <p><?
                                                        if($value[2]==1)echo "Yếu";
                                                        if($value[2]==2)echo "Trung bình";
                                                        if($value[2]==3)echo "Khá";
                                                        if($value[2]==4)echo "Giỏi";
                                                        if($value[2]==5)echo "Xuất sắc";
                                                    ?>:</p>
                                                        <p><span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                            <span><?=$value[1]?></span>
                                                        </p>
                                                    </li>
                                                    <?
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="bang_tieuchi_danhgia mb_20 <? if($row['kh_loai']==2)echo "hidden"; ?>">
                                        <div class="d_flex space_b width_100 align_c color_blue top-20 mb_20">
                                            <h4 class="show_de font_ss16 font_wB cursor_p">
                                                <?
                                                $query= new db_query("SELECT dg_ten FROM de_danhgia where dg_id = '".$row['kh_id_dg']."'");
                                                $de = mysql_fetch_assoc($query->result);
                                                echo $de['dg_ten'];    
                                                ?>
                                            </h4>
                                        </div>

                                        <div class="khoibang">
                                            <div class="bangchung">
                                                <table class="bangchinh tieu_chi">
                                                    <tr>
                                                        <th>
                                                            <p class="phantucon">STT</p>
                                                        </th>
                                                        <th>
                                                            <p class="phantucon">Tên tiêu chí</p>
                                                        </th>
                                                        <th>
                                                            <p class="phantucon">Thang điểm</p>
                                                        </th>
                                                    </tr>
                                                       <? 
                                                            $query= new db_query("SELECT * FROM de_danhgia where trangthai_xoa=1 and dg_id='".$row['kh_id_dg']."'  ");  
                                                            $rowcha_tc= mysql_fetch_assoc($query->result);
                                                            $str_id=explode(",",$rowcha_tc['dg_id_tieuchi']);
                                                            ?>

                                                            <? $stt=0; 
                                                                foreach ($str_id as $key => $value) {
                                                                $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                                $row_cha = $db_qr->result_array();
                                                            ?>

                                                        <? foreach ($row_cha as $key => $val) {
                                                            $stt ++;
                                                          ?> 
                                                            <tr class="">
                                                                <td>
                                                                    <p><?=$stt;?></p>
                                                                </td>
                                                                <td class="">
                                                                    <div class="d_flex btn_soxuong">
                                                                        <p class="mr_10 font_w5"><?=$val['tcd_ten']?></p>
                                                                        <div class="img so_xoayt_<? echo $val['id'] ?>">
                                                                            <img src="../img/icon_so.png"
                                                                                alt="Sổ xuống">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p class="font_w5"><?=$val['tcd_thangdiem'];?> <?$tong_d_tc+=$val['tcd_thangdiem'];?></p>
                                                                </td>
                                                            </tr>

                                                           <?
                                                            $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
                                                            $row_c = $db_qr_c->result_array();

                                                            foreach ($row_c as $key => $val) {
                                                                $stt++;
                                                            ?>
                                                            <tr class="con_tieuchit_<? echo $val['tc_id_tonghop'] ?>">
                                                                <td>
                                                                    <p><?=$stt;?></p>
                                                                </td>
                                                                <td class="">
                                                                    <p class="text_a_l"><?=$val['tcd_ten']?></p>
                                                                </td>
                                                                <td>
                                                                    <p><?=$val['tcd_thangdiem']?></p>
                                                                </td>
                                                            </tr>

                                                            <?
                                                            }
                                                            ?>

                                                            <?
                                                            } 
                                                            ?>

                                                            <?
                                                            }
                                                            ?> 
                                                   
                                                    
                                                    <tr>
                                                        <td colspan="2">
                                                            <p class="text_a_l font_w5">Tổng điểm
                                                            </p>
                                                        </td>
                                                        <td class="font_w5"><?=$tong_d_tc?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh mb_20 <? if($row['kh_loai']==2)echo ""; ?>">
                                        <div class="<? if($row['kh_loai']==2)echo "hidden"; ?> header_d width_100">
                                            <h4>Phân loại đánh giá</h4>
                                        </div>
                                <div class="body width_100 mb_20">
                                    <ul class="thongtin_tieuchi">
                                        <?
                                            foreach ($pl_dg as $value) {
                                                ?>
                                                <li class="item">
                                                    <p><?
                                                    if($value[2]==1)echo "Yếu";
                                                    if($value[2]==2)echo "Trung bình";
                                                    if($value[2]==3)echo "Khá";
                                                    if($value[2]==4)echo "Giỏi";
                                                    if($value[2]==5)echo "Xuất sắc";
                                                ?>:</p>
                                                    <p><span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                        <span><?=$value[1]?></span>
                                                    </p>
                                                </li>
                                                <?
                                            }
                                        ?>
                                    </ul>
                                </div>
                                    

                                    <div class="nhanvien <? if($row['kh_user_pb']!=NULL)echo "hidden"; ?> ">
                                        <p class="color_blue font_wB font_ss16 mb_20">Đối tượng nhận đánh giá</p>

                                        <div class="body_doituong body_doituong_nhan_danhgia mb_20">
                                            <div class="khoibang re_la">
                                                <div class="thanh_dk navv_480">
                                                    <div class="turn turn_left" id="turn_left">
                                                        <img src="../img/left.png" alt="sang trái">
                                                    </div>
                                                    <div class=" turn turn_right" id="turn_right">
                                                        <img src="../img/right.png" alt="sang phải">
                                                    </div>
                                                </div>
                                                <div class="bangchung" id="bang_chung">
                                                    <table class="bangchinh tieu_chi">
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
                                                        </tr>
                                                        
                                                        <?  $variable=explode(',',$row['kh_user_nv']);?>
                                                                <?if($row['kh_user_nv']!=NULL){?>
                                                                <? $stt=0;  foreach ($variable as $key => $value): $stt++; ?>
                                                                    <tr class="nv_danhgia show_trc"  >
                                                                        <td><?=$stt;?></td>
                                                                  <td >
                                                                      <p class="chungchung"><?=$value;?></p>

                                                                  </td>
                                                                  <td>
                                                                    <div class="d_flex align_c">
                                                                        <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']!=""): ?>
                                                                            <div class="img mr_10 ">
                                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value)[0]['ep_image'];?>" alt="Người tạo">
                                                                            </div>
                                                                        <?php endif ?>
                                                                         <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']==""): ?>
                                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                                         <?php endif ?>
                                                                        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                                  </td>
                                                                  <td>
                                                                    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                                      <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                                  </td>
                                                                
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="phongban mb_20 <? if($row['kh_user_pb']==NULL)echo "hidden"; ?>">
                                        <p class="color_blue font_wB font_ss16 mb_20">Đối tượng nhận đánh giá</p>
                                        <div class="body_doituong body_doituong_nhan_danhgia ">
                                            <div class="khoibang re_la">
                                                <div class="thanh_dk navv_480">
                                                    <div class="turn turn_left" id="turn_left3">
                                                        <img src="../img/left.png" alt="sang trái">
                                                    </div>
                                                    <div class=" turn turn_right" id="turn_right3">
                                                        <img src="../img/right.png" alt="sang phải">
                                                    </div>
                                                </div>
                                                <div class="bangchung" id="bang_chung3">
                                                    <table class="bangchinh tieu_chi">
                                                        <tr>
                                                            <th>
                                                                <p class="phantucon">STT</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Phòng ban</p>
                                                            </th>
                                                        </tr>
                                                        <?  $variable=explode(',',$row['kh_user_pb']);?>
                                                                <?if($row['kh_user_pb']!=NULL){?>
                                                                <? $stt=0; foreach ($variable as $key => $value):$stt++;?>
                                                                  <tr class="nv_danhgia">
                                                                    <td><?=$stt;?></td>
                                                                    <td>
                                                                        <p class="text_a_l "><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?></p>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <? endforeach; ?>
                                                                <? } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="color_blue font_wB font_ss16 mb_20">Người đánh giá</p>

                                    <div class="body_doituong body_doituong_nhan_danhgia">
                                        <div class="khoibang re_la">
                                            <div class="thanh_dk navv_480">
                                                    <div class="turn turn_left" id="turn_left2">
                                                        <img src="../img/left.png" alt="sang trái">
                                                    </div>
                                                    <div class=" turn turn_right" id="turn_right2">
                                                        <img src="../img/right.png" alt="sang phải">
                                                    </div>
                                                </div>
                                            <div class="bangchung" id="bang_chung2">
                                                <table class="bangchinh tieu_chi">
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
                                                    </tr>
                                                    <? $variable=explode(',',$row['kh_user_dg']);?>
                                                                <? $stt=0; foreach ($variable as $key => $value): $stt++; ?>
                                                                    <tr class="nv_danhgia show_trc"  >

                                                                        <td><?=$stt;?></td>
                                                                  <td >
                                                                      <p class="chungchung"><?=$value;?></p>

                                                                  </td>
                                                                  <td>
                                                                    <div class="d_flex align_c">
                                                                        <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']!=""): ?>
                                                                            <div class="img mr_10 ">
                                                                                <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value)[0]['ep_image'];?>" alt="Người tạo">
                                                                            </div>
                                                                        <?php endif ?>
                                                                         <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']==""): ?>
                                                                             <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                                                         <?php endif ?>
                                                                        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
                                                                  </td>
                                                                  <td>
                                                                    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
                                                                      <p class="text_a_l"><?=$array_cv[$cv]?></p>
                                                                  </td>
                                                                 
                                                                </tr>
                                                                <? endforeach; ?>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="popup popup_500 popup_thanhcong">
        <div class="container">
            <div class="popup_body">
                <div class="img">
                    <img src="../img/popup_1.png" alt="thành công ">
                </div>
                <p class="text_a_c ">Xóa đề kiểm tra năng lực nhân viên <span class="font_wB show_xoa_ten"> </span> thành công!</p>
                <div class="popup_btn">
                    <div class="btn btn_xanh close_popup back_list">
                        Đóng
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                  
                $('.popup_duyet_thanhcong').show();
                $('.btn_duyet').addClass('opacitty5');
                $('.trang_thai').html('<span class="color_green">Đã duyệt</span>')
                
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
                $('.btn_tuchoi').addClass('opacitty5');
                $('.trang_thai').html('<span class="color_red">Từ Chối</span>')
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
                $('.back_list').click(function(){
                    window.location.href = '/quan_ly_ke_hoach_danh_gia.html';
                })
               
            }
        }); 
    })
    
})

<?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
$rowjs = $query->result_array();
foreach ($rowjs as $key => $val) {
?>

$(".so_xoayt_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchit_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
              
<?
}
?>
$('.close_popup_back').click(function(){
    window.location.href = '/quan_ly_ke_hoach_danh_gia_chi_tiet_<?=$keyy?>.html';
})
active_single_menu('kehoach_menu');
(function(w) {

    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left2'),
            btn_right = document.getElementById('turn_right2'),
            content = document.getElementById('bang_chung2');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
                    
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;

            }
            content.scrollLeft = content_scoll_left;
        });
    });
})(window);

(function(w) {

    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left3'),
            btn_right = document.getElementById('turn_right3'),
            content = document.getElementById('bang_chung3');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
                    
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;

            }
            content.scrollLeft = content_scoll_left;
        });
    });
})(window);
</script>

</html>