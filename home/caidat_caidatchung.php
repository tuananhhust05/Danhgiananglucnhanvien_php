<?php
    include 'config.php'; 

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cài đặt chung</title>
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
                            <p>Cài đặt / Cài đặt chung</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="caidat">
                            <p class="chuden size-14 tieude1024 bot-15">Cài đặt / Cài đặt chung</p>
                            <div class="flex">
                                <div class="khoi2">
                                    <div class="khoidanhmuc ">
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_caidatchung.html"
                                                class="tendanhmuccon chuxanhdam size-14">Cài đặt chung</a>
                                            <div class="border border-active"></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_nhatkyhoatdong.html" class="tendanhmuccon size-14">Nhật ký
                                                hoạt động</a>
                                            <div class="border "></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_thongtinbaomat.html" class="tendanhmuccon size-14">Thông
                                                tin bảo mật</a>
                                            <div class="border "></div>
                                        </div>
                                        <div class="khoidanhmuccon">
                                            <a href="/caidat_thangdiem.html" class="tendanhmuccon size-14">Thang
                                                điểm</a>
                                            <div class="border "></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nentrang br-10">
                                <div class="padding-20 width70pt space">
                                    <div class="ngonngu flex center-height">
                                        <div class="tieudengongu">
                                            <p class="chuden size-15 font-medium">Ngôn ngữ:</p>
                                        </div>

                                        <div class="ngonngu_tiengviet flex center-height">
                                            <input type="checkbox" class="wh16 right-10" checked="">
                                            <label for="" class="chuden size-14">Tiếng Việt</label>
                                            <div class="center-height wh18 left-5">
                                                <img src="../img/manhimg/vnese.png" alt="Tiếng Việt">
                                            </div>
                                        </div>
                                        <div class="ngonngu_tienganh flex center-height">
                                            <input type="checkbox" class="wh16 right-10">
                                            <label for="" class="chuden size-14">Tiếng Anh</label>
                                            <div class="center-height wh18 left-5">
                                                <img src="../img/manhimg/eng.png" alt="Tiếng Anh">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="giaodien flex center-height">
                                        <div class="tieudengongu">
                                            <p class="chuden size-15 font-medium">Giao diện:</p>
                                        </div>

                                        <div class="ngonngu_tiengviet flex center-height giaodien_nenxanh">
                                            <input type="checkbox" checked="" class="wh16 right-10"
                                                id="giaodien_nenxanh">
                                            <label for="giaodien_nenxanh" class="chuden size-14">Xanh</label>
                                            <div class="center-height wh18 left-5">
                                                <img src="../img/manhimg/gdxanh.png" alt="giao diện xanh">
                                            </div>
                                        </div>
                                        <div class="ngonngu_tienganh flex center-height giaodien_nentrang">
                                            <input type="checkbox" class="wh16 right-10" id="giaodien_nentrang">
                                            <label for="giaodien_nentrang" class="chuden size-14">Trắng</label>
                                            <div class="center-height wh18 left-5">
                                                <img src="../img/manhimg/gdtrang.png" alt="Giao diện trắng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thongbao flex">
                                        <div class="tieudengongu">
                                            <p class="chuden size-15 font-medium">Thông báo:</p>
                                        </div>

                                        <div>
                                            <div class="flex center-height bot-15">
                                                <div><input type="checkbox" class="wh16 right-10"></div>
                                                <label for="" class="chuden size-14">Nhận thông báo khi có sự thay đổi
                                                    liên quan đến tôi</label>

                                            </div>

                                            <div class="flex center-height">
                                                <div><input type="checkbox" class="wh16 right-10"></div>
                                                <label for="" class="chuden size-14">Nhận thông báo khi có kết quả đánh
                                                    giá</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nhacnho flex">
                                        <div class="tieudengongu">
                                            <p class="chuden size-15 font-medium">Nhắc nhở:</p>
                                        </div>
                                        <div>
                                            <div class="flex center-height bot-15">
                                                <div><input type="checkbox" class="wh16 right-10"></div>
                                                <label for="" class="chuden size-14">Nhắc nhở khi có kế hoạch/bài đánh
                                                    giá diễn ra</label>
                                            </div>

                                            <div class="flex center-height">
                                                <div><input type="checkbox" class="wh16 right-10"></div>
                                                <label for="" class="chuden size-14">Nhắc nhở khi kế hoạch/bài đánh giá
                                                    sắp hết thời hạn</label>
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
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/manh.js"></script>


</html>