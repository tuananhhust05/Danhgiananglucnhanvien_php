<? include "config.php"; 
// if (!in_array(1, $quyen_lotrinh)) {header("Location: /trang_chu_sau_dang_nhap.html");};

    $dep_id = getValue("id","int","GET",0);
    
?>

<?php $mang_cv=""; foreach ($data_list_nv as $key => $val): ?>
    <?php  if ($val['dep_id']==$dep_id):$stt++; ?>
        <?
           $mang_cv.=$val['position_id'].", ";
        ?>
    <?php endif ?>
<?php endforeach ?>
<? $mang_cv=rtrim($mang_cv,' ,');
    $mang_cv=explode(', ',$mang_cv);
    $mang_cv_kolap=array_count_values($mang_cv);    
?>
<?     
        $arr_chucvu = [];
        foreach ($mang_cv_kolap as $keycv=> $valu) {
            $sttr++;
            $arr_chucvu[] = [
                'id_chucvu'    =>  $keycv,
                'ten_chucvu'    =>  $array_cv[$keycv] ,
                'vitri'  => $sttr,
                'sothanhvien'  => $valu,
            ];
        }

?>
<?


$query_check= new db_query("SELECT * FROM tbl_chucvu where id_phongban = $dep_id and id_congty=$usc_id order by vitri_chucvu desc");
$row_check = mysql_num_rows($query_check->result);
$mang_thongtin_chucvu=$query_check->result_array();
$mang_cv2="";
foreach ($mang_thongtin_chucvu as $key => $val) {
   $mang_cv2.=$val['id_chucvu'].", ";
}
$mang_cv2=rtrim($mang_cv2,' ,');
$mang_cv2=explode(', ',$mang_cv2);


$bh=time();
if ($row_check==0) {
    header("Refresh:0; url=/lotrinhthangtien-chitiet-$dep_id.html");
        foreach ($arr_chucvu as $key => $value_arr_chucvu) {
        $qr=new db_query("INSERT INTO tbl_chucvu(id_chucvu,ten_chucvu,vitri_chucvu,creat_at,id_phongban,id_congty) VALUES (".$value_arr_chucvu['id_chucvu'].",'".$value_arr_chucvu['ten_chucvu']."',".$value_arr_chucvu['vitri'].",$bh,$dep_id,$usc_id) ");
    }
}

    // echo"<pre>";
    // print_r($mang_thongtin_chucvu);
    // echo"</pre>"; 
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <title>Lộ trình thăng tiến / Chi tiết</title>
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
                        <div class="title_header flex center-height">
                            <a href="/lotrinhthangtien.html">
                                <div class="flex center-height right-10 c-pointer">
                                    <img src="../img/manhimg/back.png" alt="Quay lai">
                                </div>
                            </a>
                            <p>Lộ trình thăng tiến / Chi tiết</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="lotrinhthangtien_chitiet">
                            <div class="tieude1024 size-14 flex center-height bot-15">
                                <a href="/lotrinhthangtien.html">
                                    <div class="flex center-height right-10 c-pointer">
                                        <img src="../img/manhimg/back.png" alt="Quay lai">
                                    </div>
                                </a>
                                <p>Lộ trình thăng tiến / Chi tiết</p>
                            </div>
                           <div class="m_lotrinh_chitiet po_r">
                                <div class="thanh_dk">
                                    <div class="turn turn_left" id="turn_left">
                                        <img src="../img/left.png" alt="sang trái">
                                    </div>
                                    <div class=" turn turn_right" id="turn_right">
                                        <img src="../img/right.png" alt="sang phải">
                                    </div>
                                </div>
                                <div class="flex nenxanh-chutrang space br-t-10  <?php if (in_array(2, $quyen_lotrinh)): ?>tieude_phongban<?php endif ?> <?php if (!in_array(2, $quyen_lotrinh)): ?>tieude_phongban2<?php endif ?> ">
                                    <div class=" flex center-height">
                                        <p class="size-16 font-bold"><?=search($arr_dep,'dep_id',$dep_id)[0]['dep_name'];?></p>
                                    </div>

                                    <?php if (in_array(2, $quyen_lotrinh)): ?>
                                        <div class="flex center-height c-pointer js_themchucvu"
                                            onclick="hienpopupid('popup_show_suachucvu')">
                                            <img src="../img/manhimg/themchucvu.png" class="flex center-height"
                                                alt="them chuc vu">
                                            <p class="size-14">Thêm chức vụ</p>
                                        </div>
                                    <?php endif ?>
                                    
                                </div>
                               
                                <div class="nentrang over_scroll_x " id="bang_chung">
                                    <div class="scrollx_lotrinhchitiet">
                                        <div class=" m_chitiet_phongban  flex">
                                            
                                            <?php foreach ($mang_thongtin_chucvu as $key => $value_mang_thongtin_chucvu): ?>
                                               
                                                <div class="chitiet_phongban ">
                                                    <div id="popup_show_themyccv<?=$value_mang_thongtin_chucvu['id_chucvu']?>" class="popup hidden">
                                                        <div class="pop">
                                                            <div class="">
                                                                <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                                                                    <div class="">
                                                                        <h4 class="size-18 font-bold h4_yccv">Thêm yêu cầu công việc</h4>
                                                                    </div>
                                                                    <div class="flex center-height c-pointer x_close">
                                                                        <img src="../img/manhimg/x.png" alt="Huong dan">
                                                                    </div>
                                                                </div>
                                                                <form action="" method="post" id="show_themyccv" onsubmit="return false">
                                                                    <div class="nentrang">
                                                                        <div class="padding-20">
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Tên yêu cầu công
                                                                                    việc<span class="chudo">*</span></p>
                                                                                <div class="border_input text">
                                                                                    <input type="text" placeholder="Nhập yêu cầu"
                                                                                        class="size-14 chuden ten_congviec" name="ten_congviec" >
                                                                                </div>
                                                                            </div>
                                                                            <?
                                                                            $query= new db_query("SELECT * FROM tbl_yc_cv where id_chucvu='".$value_mang_thongtin_chucvu['id_chucvu']."' and id_pb='".$dep_id."' and id_congty = ".$usc_id."  ORDER BY vitri_yeucau DESC ");
                                                                            $row_qr=$query->result_array();
                                                                            $dem_yc=count($row_qr);
                                                                            ?>
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Vị trí đặt yêu cầu công việc<span class="chudo">*</span></p>
                                                                                <div class="select_no_muti">
                                                                                    <select class="js_select_2 vitri_congviec" name="vitri_congviec" id="">
                                                                                        <option value="">Chọn vị trí đặt yêu cầu công việc</option>
                                                                                        <?php foreach ($row_qr as  $val): ?>
                                                                                        <option value="<?=$val['vitri_yeucau'];?>">Trên yêu cầu <?=$val['ten_yeucau'];?></option>
                                                                                        <?php endforeach ?>
                                                                                        <option value="0">Dưới cùng</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Mô tả yêu cầu công
                                                                                    việc<span class="chudo">*</span></p>
                                                                                <div class="border_input textarea">
                                                                                    <textarea name="mota_congviec" class="mota_congviec"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="khoibutton_form top-25">
                                                                                <div class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_yeucau ">
                                                                                    Hủy
                                                                                </div>
                                                                                <button type="submit" class="btn   btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_yeucau">
                                                                                    Lưu
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $dem_thnhvien=0; foreach ($data_list_nv as $key => $value): ?>
                                                        <?php if (($value['dep_id']==$value_mang_thongtin_chucvu['id_phongban']) && $value['position_id']==$value_mang_thongtin_chucvu['id_chucvu']): $dem_thnhvien++;?>
                                                            
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                    <div class="flex space nenxam chichi">
                                                        <div>
                                                            <p class="chuden size-15 font-medium bot-5 "><?=$value_mang_thongtin_chucvu['ten_chucvu']?> </p>
                                                            <div class="flex">
                                                                <p class="chuden size-14">Yêu cầu: <?=$dem_yc?></p>
                                                                <p class="left-10 chuden size-14">Thành viên: <?=$dem_thnhvien?></p>
                                                            </div>
                                                        </div>
                                                        <div class="c-pointer js_menu_curd">
                                                            <img src="../img/manhimg/3cham.png" class="" alt="them chuc vu">
                                                            <div class="show_menu_curd nentrang">
                                                                <?php if (in_array(3, $quyen_lotrinh)): ?>
                                                                <div class="nd_con_menu_curd flex center-height"
                                                                    onclick="hienpopupid('popup_show_editchucvu<?=$value_mang_thongtin_chucvu['id']?>')">
                                                                    <img src="../img/manhimg/chinhsua.png"
                                                                        class="flex center-height right-10" alt="chinh sua">
                                                                    <p class="chuden size-14">Chỉnh sửa chức vụ</p>
                                                                </div>
                                                                <?php endif ?>
                                                                
                                                                <div data-pb="<?=$dep_id?>" data-chucvu="<?=$value_mang_thongtin_chucvu['id_chucvu']?>"
                                                                    class="nd_con_menu_curd flex center-height br-t-10 js_thanhvien c-pointer">
                                                                    <img src="../img/manhimg/xemds.png"
                                                                        class="flex center-height right-10" alt="xem danh sach">
                                                                    <p class="chuden size-14">Xem danh sách thành viên</p>
                                                                </div>

                                                                <?php if (in_array(2, $quyen_lotrinh)): ?>
                                                                    <div data-id-chucvu="<?=$value_mang_thongtin_chucvu['id_chucvu']?>" data-id-pb="<?=$dep_id?>" class="nd_con_menu_curd flex center-height add_yccv"
                                                                        >
                                                                        <img src="../img/manhimg/them.png"
                                                                            class="flex center-height right-10" alt="chinh sua">
                                                                        <p class="chuden size-14">Thêm yêu cầu công việc</p>
                                                                    </div>
                                                                <?php endif ?>
                                                                <?php if (in_array(4, $quyen_lotrinh)): ?>
                                                                    <div id-cv='<?=$value_mang_thongtin_chucvu['id']?>' class="nd_con_menu_curd flex center-height br-b-10 js_xoachucvu"
                                                                    onclick="hienpopupid('popup_before_cv')">
                                                                    <img src="../img/manhimg/xoamn.png"
                                                                        class="flex center-height right-10" alt="chinh sua">
                                                                    <p class="chuden size-14">Xóa chức vụ</p>
                                                                </div>
                                                                <?php endif ?>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    $query= new db_query("SELECT * FROM tbl_yc_cv where id_chucvu='".$value_mang_thongtin_chucvu['id_chucvu']."' and id_pb='".$dep_id."' and id_congty = ".$usc_id."  ORDER BY vitri_yeucau DESC ");
                                                    $row_qr2=$query->result_array();
                                                    ?>
                                                    <?php foreach ($row_qr2 as  $value_row_qr2): ?>
                                                        
                                                    <div id="popup_show_suayccv<?=$value_row_qr2['id']?>" class="popup hidden">
                                                        <div class="pop">
                                                            <div class="">
                                                                <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                                                                    <div class="">
                                                                        <h4 class="size-18 font-bold h4_yccv">Chỉnh sửa yêu cầu công việc</h4>
                                                                    </div>
                                                                    <div class="flex center-height c-pointer x_close">
                                                                        <img src="../img/manhimg/x.png" alt="Huong dan">
                                                                    </div>
                                                                </div>
                                                                <form action="" class="jjj" method="post"  onsubmit="return false">
                                                                    <div class="nentrang">
                                                                        <div class="padding-20">
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Tên yêu cầu công
                                                                                    việc<span class="chudo">*</span></p>
                                                                                <div class="border_input text">
                                                                                    <input type="text" placeholder="Nhập yêu cầu"
                                                                                        class="size-14 chuden ten_congviec_sua"  value="<?=$value_row_qr2['ten_yeucau']?>">
                                                                                </div>
                                                                            </div>
                                                                            <?
                                                                            $query= new db_query("SELECT * FROM tbl_yc_cv where id_chucvu='".$value_mang_thongtin_chucvu['id_chucvu']."' and id_pb='".$dep_id."' and id_congty = ".$usc_id."  ORDER BY vitri_yeucau DESC ");
                                                                            $row_qr=$query->result_array();
                                                                            ?>
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Vị trí đặt yêu cầu công việc<span class="chudo">*</span></p>
                                                                                <div class="select_no_muti">
                                                                                    <select class="js_select_2 vitri_congviec_sua"  >
                                                                                        <option value="">Chọn vị trí đặt yêu cầu công việc</option>

                                                                                        <?php foreach ($row_qr as  $val): ?>
                                                                                        <?php if ($value_row_qr2['id']!=$val['id']): ?>
                                                                                             <option value="<?=$val['vitri_yeucau'];?>">Trên yêu cầu <?=$val['ten_yeucau'];?></option>
                                                                                        <?php endif ?>
                                                                                       
                                                                                        <?php endforeach ?>
                                                                                        <option value="0">Dưới cùng</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Mô tả yêu cầu công
                                                                                    việc<span class="chudo">*</span></p>
                                                                                <div class="border_input textarea">
                                                                                    <textarea  class="mota_congviec_sua"><?=$value_row_qr2['mota_yeucau']?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="khoibutton_form top-25">
                                                                                <div class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_yeucau ">
                                                                                    Hủy
                                                                                </div>
                                                                                <button type="" class="btn btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_yeucau_sua">
                                                                                    Lưu
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="nentrang chichi tung_yc">
                                                        <div>
                                                            <p class="chuden size-15 font-medium bot-5 "><?=$value_row_qr2['ten_yeucau']?></p>
                                                            <p class="chuden size-14 lineheight16"><?=$value_row_qr2['mota_yeucau']?>.</p>
                                                        </div>
                                                        <div class="flex just-end c-pointer js_menu_curd2">
                                                            <?php if (in_array(2, $quyen_lotrinh)): ?>
                                                            <div>
                                                                <img src="../img/manhimg/3chamx.png" class="" alt="them chuc vu">
                                                            </div>
                                                            <?php endif ?>
                                                           
                                                            <div class="show_menu_curd2 nentrang ">
                                                                <?php if (in_array(3, $quyen_lotrinh)): ?>
                                                                <div data-id-chucvu="<?=$value_mang_thongtin_chucvu['id_chucvu']?>" data-id-pb="<?=$dep_id?>" data-id-yc='<?=$value_row_qr2['id']?>' class="nd_con_menu_curd br-t-10 flex center-height sua_yccv"
                                                                    >
                                                                    <img src="../img/manhimg/chinhsua.png"
                                                                        class="flex center-height right-10" alt="chinh sua">
                                                                    <p class="chuden size-14">Chỉnh sửa yêu cầu công việc</p>
                                                                </div>
                                                                <?php endif ?>
                                                                <?php if (in_array(4, $quyen_lotrinh)): ?>
                                                                <div data-id-yc='<?=$value_row_qr2['id']?>' class="nd_con_menu_curd flex center-height br-b-10 js_xoa_yc"
                                                                    onclick="hienpopupid('popup_before')">
                                                                    <img src="../img/manhimg/xoamn.png"
                                                                        class="flex center-height right-10" alt="chinh sua">
                                                                    <p class="chuden size-14">Xóa yêu cầu công việc</p>
                                                                </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach ?>
                                                </div>
                                         
                                                <div id="popup_show_editchucvu<?=$value_mang_thongtin_chucvu['id']?>" class="popup hidden">
                                                    <div class=" pop">
                                                        <div class=" ">
                                                            <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                                                                <div class="">
                                                                    <h4 class="size-18 font-bold h4_chucvu">Chỉnh sửa chức vụ</h4>
                                                                </div>
                                                                <div class="flex center-height c-pointer x_close">
                                                                    <img src="../img/manhimg/x.png" alt="Huong dan">
                                                                </div>
                                                            </div>
                                                                <form action="" method="post" onsubmit="return false">
                                                                    <div class="nentrang br-b-10">
                                                                        <div class="padding-20">
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Chức vụ<span class="chudo">*</span></p>
                                                                                <div class="select_no_muti ">
                                                                                    <select disabled class="js_select_2 id_chucvu_chon" name="ten_chucvu" id="">
                                                                                        <?php foreach ($array_cv as $keyt => $value): ?>
                                                                                        <option <?if($keyt==$value_mang_thongtin_chucvu['id_chucvu']) echo 'selected' ;?> value="<?=$keyt?>"><?=$value?></option>
                                                                                        <?php endforeach ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bot-15">
                                                                                <p class="chuden font-medium size-15 bot-5">Vị trí đặt chức vụ<span class="chudo">*</span></p>
                                                                                <div class="select_no_muti">
                                                                                    <select class="js_select_2 vitri_dat_chucvu" name="vitri_chucvu" >
                                                                                        <option value="">Chọn vị trí đặt chức vụ</option>
                                                                                        <?php $stt=0; foreach ($mang_thongtin_chucvu as $key => $value_mang):$stt++ ?>
                                                                                        <?php if ($value_mang['id_chucvu']!=$value_mang_thongtin_chucvu['id_chucvu']): ?>
                                                                                            <option <?if($value_mang['vitri_chucvu']==$value_mang_thongtin_chucvu['vitri_chucvu']-1) echo 'selected' ;?> value="<?=$value_mang['vitri_chucvu']?>">Trước <?=$value_mang['ten_chucvu'] ?></option>
                                                                                        <?php endif ?>
                                                                                            
                                                                                        <?php endforeach ?>
                                                                                        

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="khoibutton_form top-25">
                                                                                <div onclick="hienpopupid('popup_thatbai')"
                                                                                    class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy">
                                                                                    Hủy
                                                                                </div>
                                                                                <button data-ic-cv-edit="<?=$value_mang_thongtin_chucvu['id'];?>" type="submit" 
                                                                                    class="btn btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_editchucvu">
                                                                                    Lưu
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>     
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>

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
<div id="popup_before" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change">Xoá yêu cầu công việc</h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5">Bạn có chắc chắn muốn xoá yêu cầu công việc này không?</div>

                <div class="khoibutton_form top-70">
                    <div 
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div 
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before ">
                        Đồng ý
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_before_cv" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change">Xoá chức vụ</h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5">Bạn có chắc chắn muốn xoá chức vụ này không?</div>

                <div class="khoibutton_form top-70">
                    <div 
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div 
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnxoa_chucvu">
                        Đồng ý
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="show_thanhvien">
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
<div id="popup_thanhcong" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center"></p>
                </div>
                <div onclick="window.location.reload()" class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="popup_show_suachucvu" class="popup hidden">
    <div class=" pop">
        <div class=" ">
            <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                <div class="">
                    <h4 class="size-18 font-bold h4_chucvu">Thêm chức vụ</h4>
                </div>
                <div class="flex center-height c-pointer x_close">
                    <img src="../img/manhimg/x.png" alt="Huong dan">
                </div>
            </div>
                <form action="" method="post" id="show_suachucvu" onsubmit="return false">
                    <div class="nentrang br-b-10">
                        <div class="padding-20">
                            <div class="bot-15">
                                <p class="chuden font-medium size-15 bot-5">Chức vụ<span class="chudo">*</span></p>
                                <div class="select_no_muti ">
                                    <select class="js_select_2 id_chucvu_chon" name="ten_chucvu" id="">
                                        <?php foreach ($array_cv as $keyt => $value): ?>
                                            <?php if (!in_array($keyt,$mang_cv2)):?>
                                                <option value="<?=$keyt?>"><?=$value?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="bot-15">
                                <p class="chuden font-medium size-15 bot-5">Vị trí đặt chức vụ<span class="chudo">*</span></p>
                                <div class="select_no_muti">
                                    <select class="js_select_2 vitri_dat_chucvu" name="vitri_chucvu" id="">
                                        <option value="">Chọn vị trí đặt chức vụ</option>
                                        <?php $stt=0; foreach ($mang_thongtin_chucvu as $key => $value_mang_thongtin_chucvu):$stt++ ?>
                                            <option value="<?=$value_mang_thongtin_chucvu['vitri_chucvu']?>">Trước <?=$value_mang_thongtin_chucvu['ten_chucvu'] ?></option>
                                        <?php endforeach ?>
                                        

                                    </select>
                                </div>
                            </div>
                            <div class="khoibutton_form top-25">
                                <div onclick="hienpopupid('popup_thatbai')"
                                    class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy">
                                    Hủy
                                </div>
                                <button type="submit" 
                                    class="btn btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_datchucvu">
                                    Lưu
                                </button>
                            </div>
                        </div>
                    </div>
                </form>     
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
<script>
$('.js_select_2').select2({
    width: '100%'
})
</script>

</html>
<script type="text/javascript">

active_single_menu('lotrinh_menu');
$(".js_thanhvien").click(function() {
    var dep_id=$(this).attr('data-pb');
    var dep_id_chuvu=$(this).attr('data-chucvu');
    $(".show_thanhvien").show();
    $.ajax({
            url: '/render/show_nv_pb_chucvu.php',
            type: 'POST',
            data: {
                dep_id:dep_id,
                dep_id_chuvu:dep_id_chuvu,
            },
            success: function(data){   
            $('.bangchung_2').html(data);
            }
        }); 
});
$('.add_yccv').click(function(){
    var dep_id=$(this).attr('data-id-pb');
    var dep_id_chuvu=$(this).attr('data-id-chucvu');
    $('#popup_show_themyccv'+dep_id_chuvu+'').removeClass('hidden');
    
    $(".btnluu_yeucau").attr('data-pb',dep_id);
    $(".btnluu_yeucau").attr('data-chucvu',dep_id_chuvu);
    
})
$('.sua_yccv').click(function(){
    var dep_id=$(this).attr('data-id-pb');
    var dep_id_chuvu=$(this).attr('data-id-chucvu');
    var data_id_yc=$(this).attr('data-id-yc');
    $('#popup_show_suayccv'+data_id_yc+'').removeClass('hidden');
    
    $(".btnluu_yeucau_sua").attr('data-pb',dep_id);
    $(".btnluu_yeucau_sua").attr('data-chucvu',dep_id_chuvu);
    $(".btnluu_yeucau_sua").attr('data-id-yc',data_id_yc);
    
})

$(".btnluu_yeucau").click(function() {
    var dep_id=$(this).attr('data-pb');
    var dep_id_chuvu=$(this).attr('data-chucvu');
    var name=$(this).parents('.chitiet_phongban').find('.ten_congviec').val();

    var vitri=$(this).parents('.chitiet_phongban').find('.vitri_congviec').val();
    vitri2=Number(vitri)+1;
    var des=$(this).parents('.chitiet_phongban').find('.mota_congviec').val();
 
    if (name==""||vitri==""||des=="") {
        alert('Vui lòng nhập đủ thông tin');
        return;
    }
        $.ajax({
            url: '/ajax/add_yccv.php',
            type: 'POST',
            data: {
                dep_id:dep_id,
                dep_id_chuvu:dep_id_chuvu,
                name:name,
                vitri2:vitri2,
                des:des,
            },
            success: function(data){   
            $('.change_text_tc').text('Thêm yêu cầu thành công');
            $('#popup_show_themyccv'+dep_id_chuvu+'').addClass('hidden');
            $('#popup_thanhcong').removeClass('hidden');
            }
        }); 
});
$(".btnluu_yeucau_sua").click(function() {
    var dep_id=$(this).attr('data-pb');
    var dep_id_chuvu=$(this).attr('data-chucvu');
    var data_id_yc=$(this).attr('data-id-yc');

    var name=$(this).parents('#popup_show_suayccv'+data_id_yc+'').find('.ten_congviec_sua').val();
    var vitri=$(this).parents('#popup_show_suayccv'+data_id_yc+'').find('.vitri_congviec_sua').val();
    vitri2=Number(vitri)+1;
    var des=$(this).parents('#popup_show_suayccv'+data_id_yc+'').find('.mota_congviec_sua').val();
 
    if (name==""||vitri==""||des=="") {
        alert('Vui lòng nhập đủ thông tin');
        return;
    }

    $.ajax({
        url: '/ajax/add_yccv_edit.php',
        type: 'POST',
        data: {
            dep_id:dep_id,
            dep_id_chuvu:dep_id_chuvu,
            data_id_yc:data_id_yc,
            name:name,
            vitri2:vitri2,
            des:des,
        },
        success: function(data){ 
            $('.change_text_tc').text('Chỉnh sửa yêu cầu thành công');
            $('#popup_show_suayccv'+data_id_yc+'').addClass('hidden');
            $('#popup_thanhcong').removeClass('hidden');
        }
    }); 
});
$('.js_xoa_yc').click(function(){
    var id= $(this).attr('data-id-yc');
    $('.btnluu_before').attr('data-id',id);
    $('.btnluu_before').click(function(){
     $.ajax({
        url: '/ajax/xoa_yccv.php',
        type: 'POST',
        data: {
            
            id:id,
        },
        success: function(data){ 
            $('.change_text_tc').text('Xoá yêu cầu thành công')
            $('#popup_thanhcong').removeClass('hidden');
        }
    }); 
    })    
})
$('.btnluu_datchucvu').click(function(){
    var id_chucvu=$('#popup_show_suachucvu .id_chucvu_chon').val();
    var vt_dat_chucvu=$('#popup_show_suachucvu .vitri_dat_chucvu').val();
    if(vt_dat_chucvu==""||id_chucvu==0){
        alert('Nhập thông tin');
        return;
    }
    var id_phongban=<?=$dep_id?>;
    $.ajax({
        url: '/ajax/them_cv.php',
        type: 'POST',
        data: {
            id_chucvu:id_chucvu,
            vt_dat_chucvu:vt_dat_chucvu,
            id_phongban:id_phongban,
        },
        success: function(data){ 
            $('.change_text_tc').text('Thêm chức vụ thành công');
            $('#popup_thanhcong').removeClass('hidden');
            $('#popup_show_suachucvu').addClass('hidden');
        }
    });
})
$('.btnluu_editchucvu').click(function(){
    var id_edit=$(this).attr('data-ic-cv-edit');
    var vt_dat_chucvu=$('#popup_show_editchucvu'+id_edit+' .vitri_dat_chucvu').val();
    if(vt_dat_chucvu==""||id_edit==0){
        alert('Chọn vị trí đặt chức vụ');
        return;
    }
    $.ajax({
        url: '/ajax/sua_cv.php',
        type: 'POST',
        data: {
            id_edit:id_edit,
            vt_dat_chucvu:vt_dat_chucvu,
        },
        success: function(data){ 
            $('.change_text_tc').text('Chỉnh sửa chức vụ thành công');
            $('#popup_thanhcong').removeClass('hidden');
            $('#popup_show_editchucvu'+id_edit+'').addClass('hidden');
        }
    });
})
$('.js_xoachucvu').click(function(){
    var id=$(this).attr('id-cv');
    $('.btnxoa_chucvu').attr('id-cv',id);
})
$('.btnxoa_chucvu').click(function(){
    var id=$(this).attr('id-cv');
    $.ajax({
        url: '/ajax/xoa_cv.php',
        type: 'POST',
        data: {
            id:id,
        },
        success: function(data){ 
            $('.change_text_tc').text('Xoá chức vụ thành công');
             $('#popup_thanhcong').removeClass('hidden');
        }
    });
})
</script>