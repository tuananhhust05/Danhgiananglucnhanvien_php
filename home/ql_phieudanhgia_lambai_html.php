<?
include "config.php" ;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Chi tiết quản lý đề kiểm tra năng lực nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <link rel="stylesheet" type="text/css" href="../css/manh.css">
</head>

<body>
    <div class="lambai">
        <div id="ql_tieuchi_nangluc_chitiet" class="ql_tieuchi">
            <div class="wapper color_b">
                <div class="d_flex">
                    <? include('../includes/cd_sidebar.php'); ?>
                    <div class="main">
                        <div class="header back_w border_r10 w_100">
                            <div class="box_header d_flex space_b align_c position_r">
                                <div class="title_header ">
                                    <div class="d_flex">
                                        <a href='/quanly-phieudanhgia.html' class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / làm bài kiểm tra</p>
                                    </div>
                                </div>
                                <? include('../includes/menu_header.php') ?>
                            </div>
                            <div class="main_body">
                                <div class="header_ql_tieuchi">
                                    <div class="title_header ">
                                        <div class="d_flex">
                                            <a href='/quanly-phieudanhgia.html' class="img_quaylai mr_10">
                                                <img src="../img/icon_so.png" alt="Quay lại">
                                            </a>
                                            <p>Quản lý phiếu đánh giá / Chi tiết phiếu đánh giá / làm bài kiểm tra</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <form action="" method="post" id="frm_lambai" >
                                <div class="cauhoi_chitiet cauhoi_chitiet_1 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi 1 </span> 
                                     <span class="font_s14">( 10 điểm )</span></p>
                                    <p class="font_s15 font_w5 mb_5">Câu trả lời </p>
                                    <div class="form_group sel_dang_1">
                                    <div class="text_dat">
                                        <textarea name="dap_an_1" cols="30" rows="10" id="editor3"></textarea>
                                    </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_2 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Theo đó, thể thức văn bản
                                            hành chính được quy định bao gồm các thành phần sau</span> <span
                                            class="font_s14">( 10 điểm )</span></p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font_s15 font_w5 mb_5">Câu trả lời </p>
                                    <div class="form_group sel_dang_1">
                                    <div class="text_dat">
                                        <textarea name="dap_an" cols="80" rows="10" id="editor4"></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="cauhoi_chitiet cauhoi_chitiet_3 mb_20">
                                        <p class="mb_20"><span class="font_s15 font_w5 mr_10">Theo đó, thể thức văn bản
                                                hành chính được quy định bao gồm các thành phần sau, Theo đó, thể thức văn bản
                                                hành chính được quy định bao gồm các thành phần sau</span> <span
                                                class="font_s14">( 10 điểm )</span></p>
                                        <div class="container_anh container_anh_1 mb_20">
                                            <div class="item_anh item_anh_1 mr_20">
                                                <div class="img_anh_tailen img_anh_tailen_1">
                                                    <img src="../img/xaydung2.png" alt="Ảnh ">
                                                </div>
                                            </div>
                                            <div class="item_anh item_anh_1">
                                                <div class="img_anh_tailen img_anh_tailen_1">
                                                    <img src="../img/xaydung2.png" alt="Ảnh ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container_anh container_anh_1 mb_20">
                                            <div class="item_anh item_anh_1 mr_20">
                                                <div class="img_anh_tailen img_anh_tailen_1">
                                                    <img src="../img/xaydung2.png" alt="Ảnh ">
                                                </div>
                                            </div>
                                            <div class="item_anh item_anh_1">
                                                <div class="img_anh_tailen img_anh_tailen_1">
                                                    <img src="../img/xaydung2.png" alt="Ảnh ">
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font_s15 font_w5 mb_5">Câu trả lời </p>
                                    <div class="form_group sel_dang_1">
                                        <div class="text_dat">
                                            <textarea id="editor5"  name="dap_an2" cols="80" rows="10">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="cauhoi_chitiet cauhoi_chitiet_4 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi 1</span> <span
                                            class="font_s14 ">( 10 điểm )</span></p>

                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời</p>
                                    <div class="d_flex align_c mb_20">
                                        <input type="radio" name="drone" id="radio_macdinh" value="macdinh" class="mr_5"
                                            checked="">
                                        <label for="huey">Tùy chọn 1</label>
                                    </div>
                                    <div class="d_flex align_c mb_20">
                                        <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                        <label for="dewey">Tùy chọn 1</label>
                                    </div>
                                    <div class="d_flex align_c ">
                                        <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                        <label for="dewey">Tùy chọn 1</label>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_5 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi 1</span><span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh_tuychon item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                        <div class="item_anh_tuychon item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh_tuychon item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                        <div class="item_anh_tuychon item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_6 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5"></span> Câu hỏi 1 <span
                                            class="font_s14 ">( 10 điểm )</span></p>

                                    <p class="font_s15 font_w5 mb_5">Câu trả lời</p>
                                    <div class="d_flex align_c mb_20">
                                        <input type="checkbox" name="drone" id="radio_macdinh" value="macdinh" class="mr_5"
                                            checked="">
                                        <label for="huey">Tùy chọn 1</label>
                                    </div>
                                    <div class="d_flex align_c mb_20">
                                        <input type="checkbox" name="drone" id="radio_khac" value="khac" class="mr_5"
                                            checked>
                                        <label for="dewey">Tùy chọn 1</label>
                                    </div>
                                    <div class="d_flex align_c ">
                                        <input type="checkbox" name="drone" id="radio_khac" value="khac" class="mr_5">
                                        <label for="dewey">Tùy chọn 1</label>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_7 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10"> Câu hỏi 1</span><span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh_tuychon item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                    class="mr_5" checked>
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                        <div class="item_anh_tuychon item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                    class="mr_5" checked>
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh_tuychon item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                    class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                        <div class="item_anh_tuychon item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                            <div class="d_flex align_c mt_10">
                                                <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                    class="mr_5">
                                                <label for="dewey">Tùy chọn 1</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                            class="font_s14">( 10 điểm )</span></p>

                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="manh_input_select">
                                        <div class="select_no_muti">
                                        <select name="" id="" class="js_select_2">
                                            <option value="">Chọn</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="manh_input_select">
                                        <div class="select_no_muti">
                                        <select name="" id="" class="js_select_2">
                                            <option value="">Chọn</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="manh_input_select">
                                        <div class="select_no_muti">
                                        <select name="" id="" class="js_select_2">
                                            <option value="">Chọn</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                    <div class="inputtime">
                                        <input type="time">
                                    </div>
                                </div>

                                <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                    <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                            class="font_s14 ">( 10 điểm )</span></p>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container_anh container_anh_1 mb_20">
                                        <div class="item_anh item_anh_1 mr_20">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                        <div class="item_anh item_anh_1">
                                            <div class="img_anh_tailen img_anh_tailen_1">
                                                <img src="../img/xaydung2.png" alt="Ảnh ">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font_s15 font_w5 mb_5"> Câu trả lời </p>
                                   <div class="inputtime">
                                        <input type="time">
                                    </div>
                                </div>

                                <div class="form_btn d_flex content_c mt_25">
                                    <button class="btn btn_trang btn_168 mr_60">Hủy</button>
                                    <button type="button" class="btn btn_xanh btn_168 mr_60">Lưu</button>
                                    <button type="submit" class="btn btn_xanhluc btn_168">Hoàn thành</button>
                                </div> 
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js">
</script>
<script>
    $('.js_select_2').select2({
    width: '100%'
})
    CKEDITOR.replace('editor3', {
    height: '108'
    });
    CKEDITOR.replace('editor4', {
    height: '108'
    });
    CKEDITOR.replace('editor5', {
    height: '108'
    });

    $('#frm_lambai').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    ignore: [],
    debug: false,
    rules: {
        dap_an_1:"required",
        // "dap_an_1":{
        //    required: function() 
        //     {
        //      CKEDITOR.instances.dap_an_1.updateElement();
        //     }  
        // },                 
    },
    messages: {
        dap_an_1: "Không được để trống",    
    },

});
</script>
</html>