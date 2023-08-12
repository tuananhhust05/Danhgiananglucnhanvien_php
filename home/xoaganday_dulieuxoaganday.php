<? include 'config.php' ;
   $qr=new db_query("SELECT * FROM tbl_tieuchi WHERE id_congty='$usc_id' and trangthai_xoa=2 ");
   $num1= mysql_num_rows($qr->result);
   
   $qr2=new db_query("SELECT * FROM de_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2 ");
   $num2= mysql_num_rows($qr2->result);
   $numm=$num1+$num2;

   $qr_kh=new db_query("SELECT * FROM kh_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2 ");
   $num_kh= mysql_num_rows($qr_kh->result);

   $qr_phieu=new db_query("SELECT * FROM phieu_danhgia WHERE id_congty='$usc_id' and trangthai_xoa=2 ");
   $num_phieu= mysql_num_rows($qr_phieu->result);

   $qr_kt=new db_query("SELECT * FROM de_kiemtra_cauhoi WHERE id_congty='$usc_id' and is_delete=2 ");
   $num_kt= mysql_num_rows($qr_kt->result);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Dữ liệu đã xóa gần đây</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <p>Dữ liệu đã xóa gần đây</p>
                        </div>
                        <? include('../includes/menu_header.php') ?>
                    </div>
                    <div class="main_body">
                        <div class="dulieuxoa">
                            <p class="size-14 chuden bot-15 tieude1024">Dữ liệu đã xóa gần đây</p>
                            <div class="m_dl_xoa flex ">
                                <div class="xoa_con nentrang ">
                                    <div class="padding15">
                                        <div class="flex center-height bot-15">
                                            <div class="right-10">
                                                <img src="../img/manhimg/sao.png" alt="tiêu chí đè đánh giá">
                                            </div>
                                            <a class="size-16 chuden font-medium"
                                                href="xoaganday-tieuchi-danh-gia.html">Tiêu chí - Đề đánh giá</a>
                                        </div>
                                        <div class="flex center-height">
                                            <p class="chudo font-bold right-5"><?=$numm?></p>
                                            <p class="size-14 chuden">Mục đã xóa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xoa_con nentrang ">
                                    <div class="padding15">
                                        <div class="flex center-height bot-15">
                                            <div class="right-10">
                                                <img src="../img/manhimg/phitieu.png" alt="tiêu chí đè đánh giá">
                                            </div>
                                            <a class="size-16 chuden font-medium"
                                                href="/xoaganday-kehoach-danh-gia.html">Kế hoạch đánh giá</a>
                                        </div>
                                        <div class="flex center-height">
                                            <p class="chudo font-bold right-5"><?=$num_kh?></p>
                                            <p class="size-14 chuden">Kế hoạch đã xóa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xoa_con nentrang ">
                                    <div class="padding15">
                                        <div class="flex center-height bot-15">
                                            <div class="right-10">
                                                <img src="../img/manhimg/phieu.png" alt="tiêu chí đè đánh giá">
                                            </div>
                                            <a class="size-16 chuden font-medium"
                                                href="/xoaganday-phieu-danh-gia.html">Phiếu đánh giá</a>
                                        </div>
                                        <div class="flex center-height">
                                            <p class="chudo font-bold right-5"><?=$num_phieu?></p>
                                            <p class="size-14 chuden">Phiếu đánh giá đã xóa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xoa_con nentrang ">
                                    <div class="padding15">
                                        <div class="flex center-height bot-15 ">
                                            <div class="right-10">
                                                <img src="../img/manhimg/phieunho.png" alt="tiêu chí đè đánh giá">
                                            </div>
                                            <a class="size-16 chuden font-medium" href="/xoaganday-de-kiem-tra.html">Đề
                                                kiểm tra</a>
                                        </div>
                                        <div class="flex center-height">
                                            <p class="chudo font-bold right-5"><?=$num_kt?></p>
                                            <p class="size-14 chuden">Đề kiểm tra đã xóa</p>
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