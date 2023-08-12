<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Quản lý kế hoạch đánh giá</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
</head>

<body>
    <div id="" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p>Quản lý kế hoạch đánh giá <span> / </span><span> Thêm mới </span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body main_body_2">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p>Quản lý kế hoạch đánh giá <span> / </span><span> Thêm mới </span></p>
                                </div>
                            </div>
                            <form action="">
                                <div class="header_them_kehoach d_flex content_c align_c mb_20">
                                    <div class="container_img">
                                        <div class="img">
                                            <img src="../img/xanh_1.png" alt="Bước 1">
                                        </div>
                                        <div class="img img_right img_xanh">
                                            <img src="../img/xanh_8.png" alt="Bước 2">
                                        </div>
                                        <div class="img img_right img_xam">
                                            <img src="../img/xanh_5.png" alt="Bước 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="body_them_kehoach">
                                    <div class="d_flex align_c color_blue mb_20 ">
                                        <h4 class="font_ss16 font_wB mr_10">Đề kiểm tra năng lực:</h4>
                                        <div class="select_no_muti select_no_muti_2 ">
                                            <select class="js_select_2" name="loai_tc">
                                                <option value="">Chọn đề kiểm tra năng lực</option>
                                                <option value="">Đề đánh giá 1 </option>
                                                <option value="">Đề đánh giá 1 </option>
                                                <option value="">Đề đánh giá 1 </option>
                                                <option value="">Đề đánh giá 1 </option>
                                                <option value="">Đề đánh giá 1 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cauhoi_chitiet de_1 mb_20">
                                        <p class="mb_20"><span class="font_s15 font_w5 mr_10">Văn bản hành chính (Việt
                                                Nam) là loại văn bản trong hệ thống văn bản của nước Cộng hòa xã hội chủ
                                                nghĩa Việt Nam mang tính thông tin quy phạm Nhà nước, cụ thể hóa việc
                                                thi hành văn bản pháp quy, giải quyết những vụ việc cụ thể trong khâu
                                                quản lý. <span class="font_s14 font_w4">( 10 điểm )</span></span>
                                        </p>
                                        <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                        <p class="font_s14">Văn bản hành chính (Việt Nam) là loại văn bản trong hệ thống
                                            văn bản của nước Cộng hòa xã hội chủ nghĩa Việt Nam mang tính thông tin quy
                                            phạm Nhà nước, cụ thể hóa việc thi hành văn bản pháp quy, giải quyết những
                                            vụ việc cụ thể trong khâu quản lý.</p>
                                    </div>
                                    <div class="cauhoi_chitiet de_1 mb_20">
                                        <p class="mb_20"><span class="font_s15 font_w5 mr_10">Văn bản hành chính (Việt
                                                Nam) là loại văn bản trong hệ thống văn bản của nước <span
                                                    class="font_s14 font_w4">( 10 điểm )</span></span>
                                        </p>
                                        <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                        <p class="font_s14">Văn bản hành chính (Việt Nam) là loại văn bản trong hệ thống
                                            văn bản của nước Cộng hòa xã hội chủ nghĩa Việt Nam mang tính thông tin quy
                                            phạm Nhà nước, cụ thể hóa việc thi hành văn bản pháp quy, giải quyết những
                                            vụ việc cụ thể trong khâu quản lý.</p>
                                    </div>
                                    <div class="body_ql_tieuchi phanloai_danhgia">
                                        <div class="header_d width_100">
                                            <h4>Phân loại đánh giá</h4>
                                        </div>
                                        <div class="body width_100">
                                            <ul class="thongtin_tieuchi">
                                                <li class="item">
                                                    <p>Yếu:</p>
                                                    <p><span>0</span> <span class="mr_10 ml_14">-></span>
                                                        <span>50</span>
                                                    </p>
                                                </li>
                                                <li class="item">
                                                    <p>Trung bình:</p>
                                                    <p><span>51</span> <span class="mr_10 ml_14">-></span>
                                                        <span>60</span>
                                                    </p>
                                                </li>
                                                <li class="item">
                                                    <p>Khá:</p>
                                                    <p><span>61</span> <span class="mr_10 ml_14">-></span>
                                                        <span>79</span>
                                                    </p>
                                                </li>
                                                <li class="item">
                                                    <p>Giỏi:</p>
                                                    <p><span>80</span> <span class="mr_10 ml_14">-></span>
                                                        <span>90</span>
                                                    </p>
                                                </li>
                                                <li class="item">
                                                    <p>Xuất sắc:</p>
                                                    <p><span>90</span> <span class="mr_10 ml_14">-></span>
                                                        <span>100</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn_form  btn_form_chip d_flex content_c mt_25">
                                    <div class="btn btn_168 btn_trang mr_68">
                                        Hủy
                                    </div>
                                    <a href="/quan_ly_ke_hoach_danh_gia_them_moi.html"
                                        class="btn btn_168 btn_xanh  mr_68 ">
                                        <div class="d_flex align_c ">
                                            <div class="img height_15 mr_10">
                                                <img src="../img/pre_trang.png" alt="Quay lại">
                                            </div>
                                            <p>Quay lai</p>
                                        </div>
                                    </a>
                                    <div class="div_tieptuc">
                                        <div class="btn btn_168 btn_xanh ">
                                            <div class="d_flex align_c btn_tieptuc">
                                                <p class="mr_10">Tiếp tục</p>
                                                <div class="img height_15">
                                                    <img src="../img/next_trang.png" alt="Tiếp tục">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="main_body main_body_3 display_none">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/quan_ly_ke_hoach_danh_gia.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p>Quản lý kế hoạch đánh giá <span> / </span><span> Thêm mới </span></p>
                                </div>
                            </div>
                            <form action="">
                                <div class="header_them_kehoach d_flex content_c align_c mb_20">
                                    <div class="container_img">
                                        <div class="img">
                                            <img src="../img/xanh_1.png" alt="Bước 1">
                                        </div>
                                        <div class="img img_right img_xanh">
                                            <img src="../img/xanh_8.png" alt="Bước 2">
                                        </div>
                                        <div class="img img_right img_xanh">
                                            <img src="../img/xanh_3.png" alt="Bước 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="body_them_kehoach">

                                    <div class="d_flex space_b width_100 align_c color_blue mb_10">
                                        <div class="thiet_lap d_flex mb_20">
                                            <h4 class="color_blue font_wB font_ss16 mr_20">
                                                Thiết lập phân loại đánh giá:
                                            </h4>
                                            <div class="container_thietlap">
                                                <div class="d_flex align_c mr_30">
                                                    <input type="radio" name="drone" id="radio_macdinh" value="nhanvien"
                                                        class="mr_5" class="check_dm" checked>
                                                    <label for="huey">Nhân viên </label>
                                                </div>
                                                <div class="d_flex align_c">
                                                    <input type="radio" name="drone" id="radio_khac" value="phongban"
                                                        class="mr_5" class="check_dm">
                                                    <label for="dewey">Phòng ban</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nhanvien">
                                            <div class="d_flex align_c">
                                                <div class="img themmoi_tieuchi ">
                                                    <img src="../img/cong.png" alt="Thêm tiêu chí">
                                                </div>
                                                <p class="font_s14 font_w5">Thêm nhân viên</p>
                                            </div>
                                        </div>
                                        <div class="phongban display_none ">
                                            <div class="d_flex align_c">
                                                <div class="img themmoi_tieuchi ">
                                                    <img src="../img/cong.png" alt="Thêm tiêu chí">
                                                </div>
                                                <p class="font_s14 font_w5">Thêm phòng ban</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nhanvien">
                                        <div class="body_doituong body_doituong_nhan_danhgia">
                                            <div class="khoibang">
                                                <div class="bangchung">
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
                                                            <th>
                                                                <p class="phantucon">Chức năng</p>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p> NV0001</p>

                                                            </td>
                                                            <td>
                                                                <div class="d_flex align_c">
                                                                    <div class="img mr_10">
                                                                        <img src="../img/avt1.png" alt="Người tạo">
                                                                    </div>
                                                                    <p>Nguyễn Trần Trung Quân</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l">Trưởng phòng</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="phongban display_none">
                                        <div class="body_doituong body_doituong_nhan_danhgia ">
                                            <div class="khoibang">
                                                <div class="bangchung">
                                                    <table class="bangchinh tieu_chi">
                                                        <tr>
                                                            <th>
                                                                <p class="phantucon">STT</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Phòn ban</p>
                                                            </th>
                                                            <th>
                                                                <p class="phantucon">Chức năng</p>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p class="text_a_l ">Phòng kinh doanh</p>
                                                            </td>
                                                            <td>
                                                                <p class="color_red">xóa</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d_flex space_b width_100 align_c color_blue mb_10">
                                        <h4 class="font_ss16 font_wB">Người đánh giá:</h4>
                                        <div class="d_flex align_c">
                                            <div class="img themmoi_tieuchi ">
                                                <img src="../img/cong.png" alt="Thêm tiêu chí">
                                            </div>
                                            <p class="font_s14 font_w5">Thêm người đánh giá</p>
                                        </div>
                                    </div>

                                    <div class="body_doituong body_doituong_nhan_danhgia">
                                        <div class="khoibang">
                                            <div class="bangchung">
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
                                                        <th>
                                                            <p class="phantucon">Chức năng</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p> NV0001</p>

                                                        </td>
                                                        <td>
                                                            <div class="d_flex align_c">
                                                                <div class="img mr_10">
                                                                    <img src="../img/avt1.png" alt="Người tạo">
                                                                </div>
                                                                <p>Nguyễn Trần Trung Quân</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Phòng kinh doanh</p>
                                                        </td>
                                                        <td>
                                                            <p class="text_a_l">Trưởng phòng</p>
                                                        </td>
                                                        <td>
                                                            <p class="color_red">xóa</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn_form  btn_form_chip d_flex content_c mt_25">
                                        <div class="btn btn_168 btn_trang mr_68">
                                            Hủy
                                        </div>
                                        <div class="btn btn_168 btn_xanh mr_68 btn_quaylai ">
                                            <div class="d_flex align_c ">
                                                <div class="img height_15 mr_10">
                                                    <img src="../img/pre_trang.png" alt="Quay lại">
                                                </div>
                                                <p>Quay lai</p>
                                            </div>
                                        </div>
                                        <div class="div_tieptuc">
                                            <button type="submit" class="btn btn_168 btn_xanh ">
                                                <div class="d_flex align_c ">
                                                    <p>Lưu</p>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
$('.btn_tieptuc').click(function() {
    $('.main_body_3').removeClass('display_none');
    $('.main_body_2').addClass('display_none');
})
$('.btn_quaylai').click(function() {
    $('.main_body_3').addClass('display_none');
    $('.main_body_2').removeClass('display_none');
})

$('.js_select_2').select2({
    width: '100%',
})
$('input[type="radio"]').click(function() {
    if ($(this).val() == "nhanvien") {
        $('.nhanvien').addClass('display_none');
        $('.phongban').removeClass('display_none');
    } else {
        $('.nhanvien').addClass('display_none');
        $('.phongban').removeClass('display_none');
    }
})
</script>

</html>