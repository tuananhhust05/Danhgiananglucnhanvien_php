<!-- popup danh sách tiêu chí  -->
<div class="p_man popup popup_680 popup_them_tieuchi ">
    <div class="container">
        <div class="content">
            <div class="popup_header">
                <h4 class="name_header">Danh sách tiêu chí</h4>
                <div class="img close_popup">
                    <img src="../img/close.png" alt="đóng">
                </div>
            </div>
            <div class="popup_body">
                <div class="thanh_search width_100 ">
                    <input type="text" class="search_item font_s14 color_gray width_100"
                        placeholder="Tìm kiếm theo tên tiêu chí">
                    <span class="see_search"></span>
                </div>
                <form action="">
                    <div class="container_khoibang">
                        <div class="a_khoibang ">
                            <div class="khoibang">
                                <div class="bangchung bangchung_1 ">
                                    <table class="bangchinh">
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
                                            <th><input class="js_check_tc_tong" type="checkbox"></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="khoibang khoibang_2">
                                <div class="bangchung bangchung_2 ">
                                    <table class="bangchinh bang_tieuchi">

                                        <? 
                                            $stt=0;
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai= 2 and (id_congty=1 or id_congty = '".$usc_id."')");
                                            $row = $query->result_array();
                                            foreach ($row as $key => $value) {
                                            $stt ++;    
                                            ?>
                                        <tr class="cha_tieuchi_<? echo $value['id'];?>">
                                            <td>
                                                <p><? echo $stt;?></p>
                                            </td>
                                            <td>
                                                <div class="d_flex btn_soxuong">
                                                    <p class="mr_10 font_w5"><? echo $value['tcd_ten'];?></p>
                                                    <div class="img so_xoay so_xoaypop_<? echo $value['id'];?>">
                                                        <img src="../img/icon_so.png" alt="Sổ xuống">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p><? echo $value['tcd_thangdiem'];?></p>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="js_check_tc_con">
                                            </td>
                                        </tr>

                                        <? $sttcon=$stt;
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=1 and (tc_id_tonghop = '".$value['id']."') and (id_congty=1 or id_congty = '".$usc_id."')");
                                                $row1 = $query->result_array();
                                                foreach ($row1 as $key => $val):$sttcon ++;?>
                                        <tr class="hidden_tam con_tieuchipop_<? echo $val['tc_id_tonghop'];?>">
                                            <td>
                                                <p><?echo $sttcon; ?></p>
                                            </td>
                                            <td>
                                                <p class="text_a_l ">
                                                    <? echo $val['tcd_ten'];?>
                                                </p>
                                            </td>
                                            <td>
                                                <p><? echo $val['tcd_thangdiem'];?></p>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <? endforeach;?>
                                            <?
                                            }
                                            ?> 
                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="popup_btn">
                        <button type="button" class="btn btn_trang btn_140 mr_68 close_popup">Hủy</button>
                        <button type="submit" class="btn btn_xanh btn_140">
                            Hoàn thành
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup danh sách tiêu chí  -->

<!-- Lưu tạm -->
<div class="cauhoi_chitiet cauhoi_chitiet_2 mb_20">
                                <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi 1 </span> <span
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <p class="font_s14">Văn bản hành chính (Việt Nam) là loại văn bản trong hệ thống văn bản
                                    của nước Cộng hòa xã hội chủ nghĩa Việt Nam mang tính thông tin quy phạm Nhà nước,
                                    cụ thể hóa việc
                                    thi hành văn bản pháp quy, giải quyết những vụ việc cụ thể trong khâu quản lý.</p>
                            </div>

                            <div class="cauhoi_chitiet cauhoi_chitiet_3 mb_20">
                                <p class="mb_20"><span class="font_s15 font_w5 mr_10">Theo đó, thể thức văn bản
                                        hành chính được quy định bao gồm các thành phần sau,Theo đó, thể thức
                                        văn
                                        bản hành chính được quy định bao gồm các thành phần sau</span> <span
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <p class="font_s14">Văn bản hành chính (Việt Nam) là loại văn bản trong hệ thống văn bản
                                    của nước Cộng hòa xã hội chủ nghĩa Việt Nam mang tính thông tin quy phạm Nhà nước,
                                    cụ thể hóa việc
                                    thi hành văn bản pháp quy, giải quyết những vụ việc cụ thể trong khâu quản lý.</p>
                            </div>

                            <div class="cauhoi_chitiet cauhoi_chitiet_4 mb_20">
                                <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi 1</span> <span
                                        class="font_s14 color_blue">( 10 điểm )</span></p>

                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
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
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh_tuychon item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                        <div class="d_flex align_c mt_10">
                                            <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                            <label for="dewey">Tùy chọn 1</label>
                                        </div>
                                    </div>
                                    <div class="item_anh_tuychon item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
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
                                            <img src="" alt="Ảnh ">
                                        </div>
                                        <div class="d_flex align_c mt_10">
                                            <input type="radio" name="drone" id="radio_khac" value="khac" class="mr_5">
                                            <label for="dewey">Tùy chọn 1</label>
                                        </div>
                                    </div>
                                    <div class="item_anh_tuychon item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
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
                                        class="font_s14 color_blue">( 10 điểm )</span></p>

                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
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
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh_tuychon item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                        <div class="d_flex align_c mt_10">
                                            <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                class="mr_5" checked>
                                            <label for="dewey">Tùy chọn 1</label>
                                        </div>
                                    </div>
                                    <div class="item_anh_tuychon item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
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
                                            <img src="" alt="Ảnh ">
                                        </div>
                                        <div class="d_flex align_c mt_10">
                                            <input type="checkbox" name="drone" id="checkbox_khac" value="khac"
                                                class="mr_5">
                                            <label for="dewey">Tùy chọn 1</label>
                                        </div>
                                    </div>
                                    <div class="item_anh_tuychon item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
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
                                        class="font_s14 color_blue">( 10 điểm )</span></p>

                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <input type="date">
                            </div>

                            <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <input type="date">
                            </div>

                            <div class="cauhoi_chitiet cauhoi_chitiet_8 mb_20">
                                <p class="mb_20"><span class="font_s15 font_w5 mr_10 ">Câu hỏi 1</span> <span
                                        class="font_s14 color_blue">( 10 điểm )</span></p>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <div class="container_anh container_anh_1 mb_20">
                                    <div class="item_anh item_anh_1 mr_20">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                    <div class="item_anh item_anh_1">
                                        <div class="img_anh_tailen img_anh_tailen_1">
                                            <img src="" alt="Ảnh ">
                                        </div>
                                    </div>
                                </div>
                                <p class="font_s15 font_w5 mb_5"> Đáp án </p>
                                <input type="date">
                            </div>
<!-- Lưu tạm -->