function setInputFilter(textbox, inputFilter, errMsg) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    textbox.addEventListener(event, function(e) {
      if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          this.classList.remove("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  });
}
// chức năng click to scroll

(function(w) {

    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left'),
            btn_right = document.getElementById('turn_right'),
            content = document.getElementById('bang_chung');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
                    
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;

            }
            content.scrollLeft = content_scoll_left;
        });
    });
})(window);

$(".class_li_side_bar").click(function() {
    $(this).parents(".sidebar_item_kep").find(".sidebar_sub").toggleClass("active");
})

$('.close_popup').click(function() {
    $('.popup').hide();
})
$('.chon_soluong').click(function() {
    $('.modal_ql_soluong').toggle();
})




// end dùng chung
 



$('.btn_tuychinh').click(function() {
    $('.sub_tuychinh').hide();
    $(this).parents('.content_c').find('.sub_tuychinh').toggle();
})

$('.show_de').click(function() {
    $(this).parents('.container_cum_de').find('.hoi_dap').toggle()
})

var chon_trangthai = $('.chon_trangthai');
var modal_ql_tieuchi_danhgia = $('.modal_ql_tieuchi_danhgia');

chon_trangthai.click(function() {
    modal_ql_tieuchi_danhgia.toggle();
})

var input_block = $('.form_group_block input')
input_block.attr('disabled', true);
var select_block = $('.select_block select')
select_block.attr('disabled', true);

$(window).click(function(e) {
    if (!chon_trangthai.is(e.target) && chon_trangthai.has(e.target).length == 0 &&
        !modal_ql_tieuchi_danhgia.is(e.target) && modal_ql_tieuchi_danhgia.has(e.target).length == 0) {
        modal_ql_tieuchi_danhgia.hide();
    }
    if (!$('.btn_tuychinh').is(e.target) && $('.btn_tuychinh').has(e.target).length == 0 &&
        !$('.sub_tuychinh').is(e.target) && $('.sub_tuychinh').has(e.target).length == 0) {
        $('.sub_tuychinh').hide();
    }
    if (!$('.chon_soluong').is(e.target) && $('.chon_soluong').has(e.target).length == 0 && !$('.modal_ql_soluong').is(e.target) && $('.modal_ql_soluong').has(e.target).length == 0) {
        $('.modal_ql_soluong').hide();
    }
    if (!$('.btn_loaihoi').is(e.target) && $('.btn_loaihoi').has(e.target).length == 0 && !$('.sub_loaihoi').is(e.target) && $('.sub_loaihoi').has(e.target).length == 0) {
        $('.sub_loaihoi').hide();
    }
    if ($(e.target).is('.popup_xoa')) {
        $('.popup_xoa').hide();
    }
    if ($(e.target).is('.popup_duyet')) {
        $('.popup_duyet').hide();
    }
    if ($(e.target).is('.popup_tuchoi')) {
        $('.popup_tuchoi').hide();
    }
});


$('.chon_dang_1').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_1').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi ').find('.sel_dang_6').hide();
    $('.dangchung_dapan').hide();
    $('.sel_dang_1_dapan').show();
    $(this).parents('.form_group').find('.loaicauhoi').val('1').trigger('change');
})
$('.chon_dang_2').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_2').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('2').trigger('change');
    $('.dangchung_dapan').hide();
    $('.sel_dang_2_dapan').show();
    
})
$('.chon_dang_3').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_3').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('3').trigger('change');
    $('.dangchung_dapan').hide();
    $('.sel_dang_3_dapan').show();
})
$('.chon_dang_4').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_4').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('4').trigger('change');
    $('.dangchung_dapan').hide();
    $('.sel_dang_4_dapan').show();
})
$('.chon_dang_5').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_5').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_2').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_6').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('5').trigger('change');
    $('.dangchung_dapan').hide();
    $('.sel_dang_5_dapan').show();
})
$('.chon_dang_6').click(function() {
    $(this).parents('.tm').parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_6').show();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_1').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_3').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_4').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_5').hide();
    $(this).parents('.sub_loaihoi').parents('.btn_loaihoi').find('.sel_dang_2').hide();
    $(this).parents('.form_group').find('.loaicauhoi').val('6').trigger('change');
    $('.dangchung_dapan').hide();
    $('.sel_dang_6_dapan').show();
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
    
$('input.check_dm').click(function() {
    if ($(this).val() == 1) {
        $('.phanloai_danhgia_macdinh').show();
        $('.phanloai_danhgia_khac').hide();
    } else {
        $('.phanloai_danhgia_macdinh').hide();
        $('.phanloai_danhgia_khac').show();
    }
});




    $('.anh_them_anh').change(function(){
        $("#ip_xt_img").click();
    });
    






