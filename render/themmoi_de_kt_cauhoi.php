<?
include 'config.php';
$cke=getValue('cke','int','POST',0);

?>

<div class="m_tong_container_cauhoi<?=$cke?> tochung"  data-tong-ajax='<?=$cke?>'>    
    <div class="container_cauhoi mb_20">
<div class="item">
<div class="container_form_3 d_flex space_b ">
  <div class="form_group width_70 mr_20">
      <label for="">Câu hỏi <span class="color_red">*</span></label>
      <div class="text_dat" name=>
          <textarea id="cauhoi_editor<?=$cke?>" class="h_ch cau_hoi arr_cauhoi arr_cauhoi_dapan"></textarea>
      </div>
  </div>
  <div class="mb_15 width_30">
      <div class="form_group ">
          <label for="">Loại câu hỏi</label>
          <div class="select_no_muti hidden">
            <select name="" id="" class="js_select_2 loaicauhoi hidden arr_cauhoi">
                <option value="0">Câu trả lời</option>
                <option value="1">Trắc nghiệm</option>
            </select>
            </div>
          <div onclick="chonloai_cauhoi(this)" class="btn_loaihoi position_r ">
              <div class="width_100 d_flex space_b align_c">
                  <div class="sel_dang_1"
                      onclick="myFunction()">
                      <div class="d_flex align_c">
                          <div class="img mr_10">
                              <img src="../img/hoi_1.png"
                                  alt="Câu trả lời">
                          </div>
                          <p>câu trả lời</p>
                      </div>
                  </div>
                  <div class="sel_dang_2 display_none"
                      id="">
                      <div class="d_flex align_c">
                          <div class="img mr_10">
                              <img src="../img/hoi_2.png"
                                  alt="Trắc nghiệm">
                          </div>
                          <p>Trắc nghiệm</p>
                      </div>
                  </div>
                  <div class="img">
                      <img src="../img/icon_so.png" alt="Chọn">
                  </div>
              </div>

              <div
                  class="modal_d modal_ql_tieuchi sub_loaihoi position_a">
                  <div class="tm">
                      <div class="item chon_dang_1" >
                          <div class="d_flex">
                              <div class="img mr_10">
                                  <img src="../img/hoi_1.png"
                                      alt="Tất cả trạng thái">
                              </div>
                              <p>Câu trả lời</p>
                          </div>
                      </div>
                      <div class="item chon_dang_2" id="chon_dang_2">
                        <div class="d_flex">
                            <div class="img mr_10">
                                <img src="../img/hoi_2.png"
                                    alt="Trắc nghiệm">
                            </div>
                            <p>Trắc nghiệm</p>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="form_group mb_0">
          <label for="">Số điểm <span
                  class="color_red">*</span></label>
          <input class="arr_cauhoi thang_diem" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" name="thang_diem"
              placeholder="Nhập số điểm">
      </div>
  </div>
</div>

<div class="hienthi_upload">
  <ul class="frame_img">
   </ul>
   <!-- <div class="hienthi_upload_con">
       
   </div> -->
</div>
<!-- dạng mặc định -->
<div class="form_group sel_dang_1">
  <label for="">Đáp án <span class="color_red">*</span></label>
  <div class="text_dat">
      <textarea id="dapan_editor<?=$cke?>" class="arr_cauhoi arr_cauhoi_dapan dap_an"  cols="80" rows="10"></textarea>
  </div>
</div>
<!--end dạng mặc định -->

<!-- dạng trắc nghiệm-->
<div class="form_group display_none sel_dang_2">
  <label for="">Đáp án</label>
  <div class="tuychon mt_5">
      <div class="container_tuychon container_tuychon1">
          <div
              class="tuychon_header width_100 d_flex space_b align_c">
              <div class="align_c tuychon_input d_flex width_70  mr_20">
                  <input type="radio" value="Tùy chọn" name="tuychon<?=$cke?>"
                      class="mr_10 answer_right">
                  <input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng "class="ten_tuychon" name="tuy_chon">
              </div>
              <div class="them_anh width_30">
                <p onclick="del_option(this)" class="color_red size-14 c-pointer top-20">Xoá</p>
                 <!--  <div
                      class="btn_them_anh  item d_flex mr_20">
                      <div class="img mr_5">
                          <img onclick="click_file(this)" class="btn_them_anhtuychon" src="../img/hoi_7.png" alt="Tải ảnh">
                      </div>
                      <p>Thêm ảnh</p>
                      <input  onchange="change_anh(this)" type="file" class="add_tracnghiemanh">
                  </div> -->
              </div>
          </div>
          <div class="p_relative img_xt_tong mb_20">
              <img class="img_xt" src="" alt="">
              <div onclick="del_img_con(this)" class = "c-pointer xoa_anh_m d_flex">
                  <div class = "d_flex img mr_5" >
                      <img src = "../img/hoi_10.png" alt = "Xóa ảnh">
                  </div>
              <p class = "font_s14 color_red"> Xóa </p>
              </div>
          </div>
      </div>
      <div class="container_img">
      </div>
  </div>
  <div onclick="btn_them_tuychon_ajax(this)" data-id-tracnghiem='2' data_tong="<?=$cke?>" class="btn_them_tuychon d_flex align_c cursor_p " >
      <div class="img mr_10">
          <img src="../img/plus_xanh.png" alt="Thêm tùy chọn">
      </div>
      <p class="color_blue font_s14">Thêm tùy chọn</p>
  </div>
</div>
<!--end dạng trắc nghiệm -->

<!-- dạng mặc hộp điểm-->
<!-- <div class="form_group display_none sel_dang_3">
  <label for="">Đáp án</label>
  <div class="tuychon mt_5">
      <div class="tuychon_hopdiem">
          <div class="container_tuychon">
              <div
                  class="tuychon_header width_100 d_flex space_b align_c">
                  <div class="tuychon_input align_c d_flex width_70  mr_20">
                      <input type="checkbox" value="Tùy chọn"
                          name="tuychon" class="mr_10 ">
                      <input type="text" placeholder="Tuỳ chọn " name="" class="">
                  </div>
                  <button type="button"
                      class="btn_hello font_s14 color_b them_anh_hopdiem width_30">
                      <div  class="btn_them_anh item d_flex mr_20">
                          <div class="img mr_5">
                              <img onclick="click_file(this)" src="../img/hoi_7.png"
                                  alt="Tải ảnh">
                          </div>
                          <p>Thêm ảnh</p>
                          <input  onchange="change_anh(this)" type="file" class="add_tracnghiemanh">
                      </div>
                  </button>
              </div>
              <div class="p_relative img_xt_tong mb_20">
              <img class="img_xt" src="" alt="">
              <div onclick="del_img_con(this)" class = "c-pointer xoa_anh_m d_flex">
                  <div class = "d_flex img mr_5" >
                      <img src = "../img/hoi_10.png" alt = "Xóa ảnh">
                  </div>
              <p class = "font_s14 color_red"> Xóa </p>
              </div>
          </div>
          </div>
          <div class="container_img">
          </div>
      </div>
  </div>

  <div onclick="btn_them_tuychon_checkbox_ajax(this)" data_tong_hopkiem="<?=$cke?>" class="btn_them_tuychon_checkbox d_flex align_c cursor_p ">
      <div class="img mr_10">
          <img src="../img/plus_xanh.png" alt="Thêm tùy chọn">
      </div>
      <p class="color_blue font_s14">Thêm tùy chọn</p>
  </div>
</div> -->
<!--end dạng hộp điểm -->

<!-- dạng menu thả xuống-->
<!-- <div class="form_group display_none sel_dang_4">
  <label for="">Đáp án</label>
  <div class="tuychon mt_10">
      <div class="container_tuychon">
          <div
              class="tuychon_header width_100 d_flex space_b align_c">
              <div class="tuychon_input align_c d_flex width_70  mr_20">
                  <span class="mr_10">1. </span>
                  <input type="radio" value="Tùy chọn" name="tuychon"
                      class="mr_10 ">
                  <input type="text" placeholder="Tuỳ chọn " name="" class="">
              </div>
          </div>
      </div>
  </div>
  <button data-id-mn='2' data_tong_mn="<?=$cke?>" onclick="btn_them_tuychon_menu_soxuong_ajax(this)"  type="button" 
      class="btn_hello btn_them_tuychon_menu_soxuong d_flex align_c cursor_p">
      <div class="img mr_10">
          <img src="../img/plus_xanh.png" alt="Thêm tùy chọn">
      </div>
      <p class="color_blue font_s14">Thêm tùy chọn</p>
  </button>
</div> -->
<!--end dạng menu thả xuống -->

<!-- dạng giờ -->
<div class="form_group display_none sel_dang_5">
  <label for="">Đáp án</label></br>
  <input type="time" class="mt_10">
</div>
<!--end dạng giờ -->

<!-- dạng ngày  -->
<div class="form_group display_none sel_dang_6">
  <label for="">Đáp án</label>
  <input type="date" class="mt_10">
</div>
<!--end dạng ngày -->
</div>
<div class="footer_cauhoi">
<div class="d_flex flex_end align_c">
  <div class="container_footer d_flex font_s14">
      <!-- <div class="atat item d_flex mr_20 opacitty5">
          <div onclick="themanh_cauhoi(this)" data_id_i_anh='1' data_tong_themanh="<?=$cke?>" class="img mr_5 anh_them_anh c-pointer">
              <img class="" src="../img/hoi_7.png" alt="Tải ảnh">
          </div>
          <p>Thêm ảnh</p>
          <input id="ip_xt_img" type="file" />
      </div>
      <div class="opacitty5 item d_flex mr_20 nhanban_cauhoi c-pointer">
          <div class="img mr_5">
              <img src="../img/hoi_8.png" alt="Nhân bản">
          </div>
          <p>Nhân bản</p>
      </div> -->
      <div data_tong_xoa="<?=$cke?>" class="item d_flex c-pointer xoa_cauhoi">
          <div class="img mr_5">
              <img src="../img/hoi_9.png" alt="Xóa">
          </div>
          <p>Xóa</p>
      </div>
  </div>
</div>
</div>
    </div>
</div>

<script>
  
  function chonloai_cauhoi(t){
       $(t).find('.sub_loaihoi').toggle()
}
$('.chon_dang_1').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('0').trigger('change');
})
$('.chon_dang_2').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('1').trigger('change');
})
$('.chon_dang_3').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').hide();
})
$('.chon_dang_4').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').hide();
})
$('.chon_dang_5').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').hide();
})
$('.chon_dang_6').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.item').find('.sel_dang_6').show();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.item').find('.sel_dang_2').hide();
})
function loadImage(input, output) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $(output).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
};
function uploadImg(el) {
  var file_data = $(el).prop('files')[0];
  var type = file_data.type;
  var fileToLoad = file_data;
  var fileReader = new FileReader();

  fileReader.onload = function(fileLoadedEvent) {
    var srcData = fileLoadedEvent.target.result;
    var newImage = document.createElement('img');
    newImage.src = srcData;
    var _li = $(el).closest('li');
    if (_li.hasClass('li_file_hide')) {
        _li.removeClass('li_file_hide');
    }
    _li.find('.img-wrap-box').append(newImage.outerHTML);
  };
  fileReader.readAsDataURL(fileToLoad);
};
var it=1
function del_img(el) {
  jQuery(el).closest('li').remove();
  $('.img').show();
  it=it - 1;
};
function themanh_cauhoi(th){
  var data_tong_themanh=Number( $(th).attr('data_tong_themanh'));
  
        var _lastimg_a = jQuery('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img li').last().find('input[type="file"]').val();
        if (_lastimg_a != '') {
            var _html = '<li id="li_files_' + it + '" class="li_file_hide">';
            _html += '<div class="img-wrap">';
            _html += '<div onclick="del_img(this)" class = "c-pointer xoa_anh_m d_flex" >';
            _html += '<div class = "d_flex img mr_5" >';
            _html += '<img src = "../img/hoi_10.png" alt = "Xóa ảnh">';
            _html += '</div>';
            _html += '<p class = "font_s14 color_red"> Xóa </p>';
            _html += '</div>';
            _html += ' <div class="img-wrap-box"></div>';
            _html += '</div>';
            _html += '<div class="anh'+ it + '">';
            _html += '<input type="file"  onchange="uploadImg(this)" id="files_' + it + '" name="file_'+it+'"  />';
            _html += '</div>';
            _html += '</li>';
            jQuery('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img').append(_html);
            jQuery('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img li').last().find('input[type="file"]').click();
            it++;
             $('.m_tong_container_cauhoi'+data_tong_themanh+' input[type="file"]').change(function(){
                $('.m_tong_container_cauhoi'+data_tong_themanh+' .xoa_anh_m').addClass('hienxoa');
             })
        }
        else {
            if (_lastimg_a == '') {
                jQuery('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img li').last().find('input[type="file"]').click();
            }
        }
        if (it==2){
           $('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img').removeClass('j_sb');
        }if (it==3){
           $('.m_tong_container_cauhoi'+data_tong_themanh+' .frame_img').addClass('j_sb');
        }
        if (it==5){
            $('.m_tong_container_cauhoi'+data_tong_themanh+' .atat').addClass('opacitty5');
        }
  }

// function btn_them_tuychon_checkbox_ajax(th){
// var data_tong_hopkiem=Number( $(th).attr('data_tong_hopkiem'));
//     $('.m_tong_container_cauhoi'+data_tong_hopkiem+'').find('.sel_dang_3').find('.tuychon').append(
//         '<div class = "tuychon_hopdiem" ><div class = "container_tuychon" ><div class = "tuychon_header width_100 d_flex space_b align_c" ><div class = "tuychon_input al_center d_flex width_70  mr_20" ><input type = "checkbox" value = "Tùy chọn"name = "tuychon"class = "mr_10 " ><input type="text" placeholder="Tuỳ chọn " name="" class=""> </div> <button type = "button"  class = "btn_hello font_s14 color_b them_anh_hopdiem width_30" ><div class = "btn_them_anh item d_flex mr_20" ><div class = "img mr_5"><img onclick="click_file(this)" src = "../img/hoi_7.png" alt = "Tải ảnh" ></div> <p > Thêm ảnh </p> <input  onchange="change_anh(this)" type="file" class="add_tracnghiemanh"></div> </button> </div><div class="p_relative img_xt_tong mb_20"><img class="img_xt" src="" alt=""><div onclick="del_img_con(this)" class = "c-pointer xoa_anh_m d_flex"><div class = "d_flex img mr_5" ><img src = "../img/hoi_10.png" alt = "Xóa ảnh"></div><p class = "font_s14 color_red"> Xóa </p></div></div> </div> <div class = "container_img"></div> </div>');

// }
function btn_them_tuychon_ajax(th){
 var data_tong=Number( $(th).attr('data_tong'));
    $('.m_tong_container_cauhoi'+data_tong+'').find('.sel_dang_2').find('.tuychon').append('<div class="container_tuychon container_tuychon"> <div class = "tuychon_header  width_100 d_flex space_b align_c" ><div class = "tuychon_input al_center d_flex width_70  mr_20" ><input type = "radio" value = "Tùy chọn  " name = "tuychon<?=$cke?>" class = "mr_10 answer_right" ><input type="text" placeholder="Nhập đáp án, chọn để đánh dấu là đáp án đúng " name="tuy_chon" class="ten_tuychon"> </div> <div class = "them_anh width_30" ><p onclick="del_option(this)" class="color_red size-14 c-pointer top-20">Xoá</p> </div> </div> <div class="p_relative img_xt_tong mb_20"><img class="img_xt" src="" alt=""><div onclick="del_img_con(this)" class = "c-pointer xoa_anh_m d_flex"><div class = "d_flex img mr_5" ><img src = "../img/hoi_10.png" alt = "Xóa ảnh"></div><p class = "font_s14 color_red"> Xóa </p></div></div> </div>');
    
}
// function btn_them_tuychon_menu_soxuong_ajax(th){
// var data_tong_mn=Number( $(th).attr('data_tong_mn'));
// var id_mn = Number($('.m_tong_container_cauhoi'+data_tong_mn+' .btn_them_tuychon_menu_soxuong').attr('data-id-mn'));
//     $('.m_tong_container_cauhoi'+data_tong_mn+'').find('.sel_dang_4').find('.tuychon').append(
//         '<div class="container_tuychon"> <div class = "tuychon_header width_100 d_flex space_b align_c" ><div class = "align_c tuychon_input d_flex width_70  mr_20" ><span class = "mr_10" >' +
//         id_mn +
//         '.</span> <input type = "radio" value = "Tùy chọn" name = "tuychon" class = "mr_10 " ><input type="text" placeholder="Tuỳ chọn " name="" class=""> </div> </div> </div>'
//     );
//     $('.m_tong_container_cauhoi'+data_tong_mn+' .btn_them_tuychon_menu_soxuong').attr('data-id-mn', id_mn + 1);
// }
    
$('.xoa_cauhoi').click(function(){
var data_tong_xoa=Number( $(this).attr('data_tong_xoa'));
   $(this).parents('.m_tong_container_cauhoi'+data_tong_xoa+'').remove();
});  


CKEDITOR.replace('cauhoi_editor'+<?=$cke?>+'', {
    height: '80'
});
CKEDITOR.replace('dapan_editor'+<?=$cke?>+'', {
    height: '100'
});
function CKupdate(){
for ( instance in CKEDITOR.instances )
CKEDITOR.instances[instance].updateElement();
};
</script>