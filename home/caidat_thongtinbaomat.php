
<?php
    include 'config.php'; 

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thông tin bảo mật</title>
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
                        <div class="title_header">
                            <p>Cài đặt / Thông tin bảo mật</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="thongtinbaomat">
                            <p class="chuden size-14 tieude1024 bot-15">Cài đặt / Thông tin bảo mật</p>
                            <div class="flex">
                                <div class="khoi2">
                                    <div class="khoidanhmuc ">
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_caidatchung.html" class="tendanhmuccon  size-14">Cài đặt
                                                chung</a>
                                            <div class="border "></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_nhatkyhoatdong.html" class="tendanhmuccon  size-14">Nhật ký
                                                hoạt động</a>
                                            <div class="border "></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_thongtinbaomat.html"
                                                class="tendanhmuccon chuxanhdam size-14">Thông tin bảo mật</a>
                                            <div class="border border-active"></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_thangdiem.html" class="tendanhmuccon size-14 ">Thang
                                                điểm</a>
                                            <div class="border "></div>
                                        </div>
                                    </div>

                                    <div class="khoibang top-20 po_r">
                                        <div class="thanh_dk tieude375">
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
                                                        <p class="phantucon">Thiết bị</p>
                                                    </th>
                                                    <th>
                                                        <p class="phantucon">Chi tiết</p>
                                                    </th>
                                                    <th>
                                                        <p class="phantucon">Chức năng</p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td class="text-left">IPHONE 6PLUS</td>
                                                    <td class="text-left">Version: ANDROID 13.0.1</td>
                                                    <td>
                                                        <div class="flex center-center c-pointer js_bolienket"
                                                            onclick="hienpopupid('popup_bolienket')">
                                                            <div class="flex center-height right-5">
                                                                <img src="/../img/manhimg/xoado.png"
                                                                    alt="bỏ liên kết">
                                                            </div>
                                                            <p class="chudo">Bỏ liên kết</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td class="text-left">IPHONE 6PLUS</td>
                                                    <td class="text-left">Version: ANDROID 13.0.1</td>
                                                    <td>
                                                        <div class="flex center-center c-pointer js_bolienket"
                                                            onclick="hienpopupid('popup_bolienket')">
                                                            <div class="flex center-height right-5">
                                                                <img src="/../img/manhimg/xoado.png"
                                                                    alt="bỏ liên kết">
                                                            </div>
                                                            <p class="chudo">Bỏ liên kết</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex center-height space khoi_footerbang">
                                <div class="flex top-10 center-height khoi_footerbang_hienthi c-pointer">
                                    <p class="chuden size-14 right-10">Hiển thị:</p>
                                    <div class="nentrang m_hienthi">
                                        <div class="flex center-height hienthi">
                                            <p class="chuden size-14 right-15">40</p>
                                            <div class="center-height flex">
                                                <img src="../img/manhimg/down.png" alt="hiển thị">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="flex khoi_footerbang_phantrang">
                                        <div class="m_phantrang flex">
                                            <div class="phantrangcon right-15 "><</div>
                                            <div class="phantrangcon right-10 pt_active">1</div>
                                            <div class="phantrangcon right-10 ">2</div>
                                            <div class="phantrangcon right-10 ">3</div>
                                            <div class="phantrangcon right-10 ">4</div>
                                            <div class="phantrangcon">5</div>
                                            <div class="phantrangcon left-15 ">></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup_bolienket" class="hidden popup">
        <div class="pop ">
            <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
                <div class="">
                    <h4 class="size-18 font-bold">Bỏ liên kết với thiết bị</h4>
                </div>
                <div class="flex center-height c-pointer x_close">
                    <img src="../img/manhimg/x.png" alt="Huong dan">
                </div>
            </div>
            <div class="nentrang br-b-10">
                <div class="boder_bolk">
                    <div class="boder_bolk_trong">
                        <p class="text-center size-15">Bạn có muốn bỏ liên kết với thiết bị <span class="font-medium">SAMSUNG S20</span>?</p>
                        <p class="text-center size-15">Tài khoản sẽ đăng xuất khỏi thiết bị.</p>
                    </div>    
                    <div class="khoibutton_form top-27">
                        <div onclick="hienpopupid('popup_thatbai')"
                            class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_thangdiem">
                            Hủy
                        </div>
                        <div onclick="hienpopupid('popup_thanhcong')"
                            class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_thangdiem">
                            Lưu
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <? include('../includes/manh_modal.php') ?>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>
</html>
<script type="text/javascript">
$(".js_bolienket").click(function() {
    $(".btnhuy_thangdiem").click(function() {
        $(".change_text_tb").text("Bỏ liên kết thất bại,vui lòng thử lại sau");
    });
    $(".btnluu_thangdiem").click(function() {
        $(".change_text_tc").text('Bỏ liên kết thành công!');
    });
});
</script>