<? include "config.php"; 
// if (!in_array(1, $quyen_lotrinh)) {header("Location: /trang_chu_sau_dang_nhap.html");};
    // echo"<pre>";
    // print_r($_SESSION);
    // echo"</pre>";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <style type="text/css">
         .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
        }
         .select_no_muti .select2-container--default .select2-selection--single{
            border-radius: 10px !important;
        }
    </style>
    <meta name="robots" content="noindex,nofollow"/>
    <title>Lộ trình thăng tiến</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <p>Lộ trình thăng tiến</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="lotrinhthangtien">
                            <p class="chuden size-14 tieude1024">Lộ trình thăng tiến </p>
                            <div class="search-qlnv space">
                                <div class="khoi_left">
                                    <div class="leftsearch select_no_muti">
                                        <select name="" id=""class="js_select_2 search_value tim_phong_lotrinh">
                                            <option value="">Tìm kiếm phòng ban </option>
                                            <?php foreach ($arr_dep as $value): ?>
                                                <option  value="<?=$value['dep_id']?>"><?=$value['dep_name']?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <img src="../img/manhimg/kinhlup.png" class="kinhlup right-position-15" alt="tìm kiếm">
                                    </div>
                                </div>
                                <a href="/huong_dan.html#lotrinh" target="_blank">
                                    <div class="huongdan flex center-height ">
                                        <img src="../img/manhimg/chamhoi.png" class="wh36" alt="hướng dẫn">
                                        <p class="left-10 font-medium size-15">Hướng dẫn</p>
                                    </div>
                                </a>
                            </div>
                            <div class="flex wrap">
                                <?php foreach ($arr_dep as $key => $value): ?>
                                    <?php if ($_SESSION['dep_id']==$value['dep_id']||$_SESSION['quyen']==1): ?>                                    
                                        <div class="show_phong_<?=$value['dep_id']?> m_lotrinh nentrang bot-20 right-20 all_dep">
                                            <div class="lotrinh_con">
                                                <a href="/lotrinhthangtien-chitiet-<?=$value['dep_id']?>.html" 
                                                    class="chuden size-16 font-medium c-pointer"><?=$value['dep_name']?></a>

                                                <p class="chuden font-medium size-15 bot-20 top-20">Chức vụ: <span
                                                        class="chuden size-14 left-10">
                                                            <?php $mang_cv=""; foreach ($data_list_nv as $k => $val):?>
                                                            <?php  if ($val['dep_id']==$value['dep_id']): ?>
                                                                <? 
                                                                   $mang_cv.=$val['position_id'].", ";
                                                                ?>

                                                            <?php endif ?>   
                                                            <?php endforeach ?>
                                                            <? $mang_cv=rtrim($mang_cv,' ,');
                                                               $mang_cv=explode(', ',$mang_cv);
                                                               $mang_cv_kolap=array_count_values($mang_cv);
                                                               echo count($mang_cv_kolap);
                                                            ?>
                                                        </span></p>
                                                <div data-pb="<?=$value['dep_id']?>" class="flex center-height js_thanhvien c-pointer">
                                                    <p class="chuden size-14 right-10">Thành viên:</p>
                                                    <div class="flex center-height left-5">
                                                        <?php $sl=0; foreach ($data_list_nv as $k => $val):?>
                                                            <?php  if ($val['dep_id']==$value['dep_id']):$sl++;  ?>
                                                                <?if($val['ep_image']!=""){
                                                                    ?>
                                                                    <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val['ep_id'])[0]['ep_image'];?>" class="wh26_ra left_am10" alt="">
                                                                    <?
                                                                }?>
                                                                <?if($val['ep_image']==""){
                                                                    ?>
                                                                    <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra left_am10" alt="">
                                                                    <?
                                                                }?> 
                                                            <?php endif ?>
                                                        
                                                        <?php if ($sl==4) {
                                                           break;
                                                        } endforeach ?>
                                                       <?php $tongnv=0; foreach ($data_list_nv as $k => $val):?>
                                                            <?php  if ($val['dep_id']==$value['dep_id']):$tongnv++; ?>
                                                                
                                                                
                                                            <?php endif ?>
                                                            
                                                        <?php  endforeach ?>
                                                        <?php if ($tongnv>4): ?>
                                                            <div class="bonus flex center-center left_am chutrang size-14">
                                                            <?=$tongnv-4?>
                                                        </div>
                                                        <?php endif ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
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
                    <div class="scrollx_pop bangchung_2">

                    </div>
                </div>
            </div>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script>
    $('.js_select_2').select2({
    width: '100%'
});
$(".js_thanhvien").click(function() {
    var dep_id=$(this).attr('data-pb');
    $(".show_thanhvien").show();
    $.ajax({
            url: '/render/show_nv_pb.php',
            type: 'POST',
            data: {
                dep_id:dep_id,
            },
            success: function(data){   
            $('.bangchung_2').html(data);
            }
        }); 
});
$('.tim_phong_lotrinh').change(function(){
    var id=$(this).val();
    
    $('.all_dep').hide();
    $('.show_phong_'+id+'').show();
    if (id=="") {
        $('.all_dep').show();
    }
})
</script>
</html>