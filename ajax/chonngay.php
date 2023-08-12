<?
    include 'config.php';
    if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}

    $start=getValue('start','str','POST','');
    $start=strtotime(date($start));

    $end=getValue('end','str','POST','');
    $end=strtotime(date($end)); 
    $query= new db_query("SELECT * FROM kh_danhgia where trangthai_xoa=1 and kh_ngaybatdau >=".$start."   and kh_ngayketthuc <= ".$end." and id_congty = ".$usc_id." ");
    $row = $query->result_array();
     
?>
<? $stt=0; foreach ($row as $key => $val):$stt ++;?>
<tr class="kh_xoa_<?=$val['kh_id']?> <?
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
        <p class="text_a_l"><?=$val['kh_ghichu']?></p>
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
                    <div class="item btn_duyet" data-ngay-duyet="<?=time() ?>" data-nguoi-duyet="<?=$_SESSION['ep_id']?>" data-id="<?=$val['kh_id']?>" data-name="<?=$val['kh_ten']?>">
                        <div class="d_flex">
                            <div class="img mr_10">
                                <img src="../img/tuychinh_1.png"
                                    alt="Tùy chỉnh">
                            </div>
                            <p>Duyệt kế hoạch đánh giá</p>
                        </div>
                    </div>
                    <div class="item btn_tuchoi" data-name="<?=$val['kh_ten']?>" data-id="<?=$val['kh_id']?>">
                        <div class="d_flex">
                            <div class="img mr_10">
                                <img src="../img/tuychinh_2.png"
                                    alt="Từ chối hoạch đánh giá">
                            </div>
                            <p>Từ chối hoạch đánh giá</p>
                        </div>
                    </div>
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
                    <div class="item btn_xoa" data-id="<?=$val['kh_id']?>" data-name="<?=$val['kh_ten']?>" >
                        <div class="d_flex">
                            <div class="img mr_10">
                                <img src="../img/tuychinh_4.png"
                                    alt="Xóa kế hoạch đánh giá">
                            </div>
                            <p>Xóa kế hoạch đánh giá</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
<? endforeach;?>
<script>
$('.btn_tuychinh').click(function() {
$(this).parents('.content_c').find('.sub_tuychinh').toggle()
})
</script>