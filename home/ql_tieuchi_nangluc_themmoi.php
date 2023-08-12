<?php
	include 'config.php';
	if ($_SESSION['quyen']==1){
	$_SESSION['ep_id']=$usc_id;
	$_SESSION['ep_name']=$_SESSION['com_name'];
}
	if (!in_array(2, $quyen_tieuchi)) {header("Location: /trang_chu_sau_dang_nhap.html");};

	$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai= 2 and tcd_loai= 2 and (id_congty=1 or id_congty = '".$usc_id."')");
	$row_th_all = $query->result_array();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Thêm mới đề đánh giá năng lực</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow"/>
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/dat.css">
	<style>
		.popup_them_tieuchi .select2-container .select2-selection--single{
			height: 36px;
			padding-top: 3px;
			border-radius: 10px;
		}
		.bang_tieuchi_danhgia .tieu_chi {
		    width: 100%;
		}
		.body_ql_tieuchi .tieu_chi {
		    min-width: 100%;
		}
	</style>
</head>

<body>
	<div id="ql_tieuchi_them_sua" class="ql_tieuchi">
		<div class="wapper color_b">
			<div class="d_flex">
				<? include('../includes/cd_sidebar.php'); ?>
				<div class="main">
					<div class="header back_w border_r10 w_100">
						<div class="box_header d_flex space_b align_c position_r">
							<div class="title_header ">
								<div class="d_flex"> <a href='/quan_ly_tieu_chi_nang_luc.html'
										class="img_quaylai mr_10">
										<img src="../img/icon_so.png" alt="Quay lại">
									</a>
									<p onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" class="c-pointer">Đề đánh giá năng lực<span> / </span><span> Thêm mới</span></p>
								</div>
							</div>
							<? include('../includes/menu_header.php') ?>
						</div>
						<div class="main_body">
							<div class="body_ql_tieuchi themmoi_de_nangluc mb_10">
								<div class="title_header ">
									<div class="d_flex"> <a href='/quan_ly_tieu_chi_nang_luc.html'
											class="img_quaylai mr_10">
											<img src="../img/icon_so.png" alt="Quay lại">
										</a>
										<p onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" class="c-pointer">Đề đánh giá năng lực<span> / </span><span> Thêm mới</span></p>
									</div>
								</div>

								<!-- form thêm mới đề đánh giá năng lực -->
								<form action="" method="post" id="frm_de_danhgia" onsubmit="return false" enctype="multipart/form-data"
									class="form form_them_tieuchi form_them_tieuchi_con" >

									<div class="header_d width_100">
										<h4>Thêm mới đề đánh giá năng lực</h4>
									</div>

									<div class="container">
										<div class="form_container">
											<div class="form_group">
												<label for="">Tên đề đánh giá năng lực<span
														class="color_red">*</span></label>
												<input type="text" class="ten" name="ten"
													placeholder="Nhập tên đề đánh giá năng lực">
											</div>
											<div class="form_group form_group_block">
												<label for=""> Người tạo</label>
												<input type="text" class="nguoi_tao" name="nguoi_tao" value="<?echo $_SESSION['ep_name']; ?>">
											</div>
										</div>
										<div class="form_container">
											<div class="form_group form_group_block">
												<label for="">Ngày tạo</label>
												<input type="text" name="ngay_tao" class="ngay_tao"value="<? 
													$timestamp=time();
													echo(date("d/m/Y ", $timestamp)); ?>">
											</div>
											<div class="form_group form_group_block">
												<label for="">Thang điểm <span class="color_red">*</span></label>
												<input type="text" class="thang_diem thangdiem_ht" name="thang_diem" value="<?=$thangdiem_hethong?>"
													placeholder="Nhập thang điểm ">
											</div>
										</div>
										<div class="form_group">
											<label for="">Ghi chú</label>
											<textarea id="editor1" class="ghi_chu" name="ghi_chu" cols="80" rows="10" ></textarea>
										</div>
									</div>

									<div class="d_flex space_b width_100 align_c color_blue">
										<h4 class="font_ss16 font_wB">Tiêu chí đánh giá</h4>
										<div class="btn_them_tieuchi d_flex align_c cursor_p">
											<div class="img">
												<img src="../img/cong.png" alt="Thêm tiêu chí">
											</div>
											<p class="font_s14 font_w5">Thêm tiêu chí</p>
										</div>
									</div>

									<div class="bang_tieuchi_danhgia mb_20">
										<div class="khoibang">
											<div class="bangchung">
												<table class="bangchinh tieu_chi tess">
													<tbody class="op_sp">
													<tr>
														<th>
															<p class="phantucon">ID</p>
														</th>
														<th>
															<p class="phantucon">Tên tiêu chí</p>
														</th>
														<th>
															<p class="phantucon">Thang điểm</p>
														</th>
														<th>
															<p class="phantucon">Chức năng</p>
														</th>
													</tr>
													
													</tbody>
													<tr class="nentrang-chuden  ">
														<td colspan="2">
															<p class="text_a_l"><span>Tổng điểm: </span>
																<span class="tb_td_er color_red"></span>
															</p>
														</td>
														<td class="show_tong" colspan="2">0</td>
														
													</tr>
												</table>
											</div>
										</div>
									</div>


									<div class="thiet_lap d_flex mb_20">
										<h4 class="color_blue font_wB font_ss16 mr_20">
											Thiết lập phân loại đánh giá:
										</h4>
										<div class="container_thietlap">
											<div class="d_flex align_c mr_30">
												<input type="radio" name="drone" id="radio_macdinh" value="1"
													class="mr_5 outline_none" class="check_dm" checked>
												<label for="huey">Mặc định</label>
											</div>
											<div class="d_flex align_c">
												<input type="radio" name="drone" id="radio_khac" value="2"
													class="mr_5 outline_none" class="check_dm">
												<label for="dewey">Khác</label>
											</div>
										</div>
									</div>

									<div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
										<div class="header_d width_100">
											<h4>Phân loại đánh giá</h4>
										</div>
										<div class="body width_100">
												<ul class="thongtin_tieuchi">
													<?
														foreach ($pl as $value) {
															?>
															<li class="item">
																<p><?
																if($value[2]==1)echo "Yếu";
																if($value[2]==2)echo "Trung bình";
																if($value[2]==3)echo "Khá";
																if($value[2]==4)echo "Giỏi";
																if($value[2]==5)echo "Xuất sắc";
															?>:</p>
																<p><span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
																	<span><?=$value[1]?></span>
																</p>
															</li>
															<?
														}
													?>
													
													
												</ul>
											</div>
									</div>

									<div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_khac display_none">

										<div class="header_d width_100">
											<h4>Phân loại đánh giá</h4>
										</div>

										<div class="body width_100">
											<div class="container_form_4_tong">
												<div class="container_form_4 d_flex  ">
												<div class="form_group phanloaithu_1">
													<label for="">Từ <span class="color_red">*</span></label>
													<input  type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm">
												</div>
												<div class="form_group ">
													<label for="">Đến<span class="color_red">*</span></label>
													<input type="text" class="arr_tt_sp den mc_den1" name="den_diem" placeholder="Nhập số điểm">
												</div>
												<div class="form_group ">
													<label for="">Loại<span class="color_red">*</span></label>
													<div class="select_no_muti ">
														<select class="js_select_2 arr_tt_sp loai" name="loai_danhgia">
															<option value="">Chọn loại</option>
															<option value="1">Yếu</option>
															<option value="2">Trung bình</option>
															<option value="3">Khá</option>
															<option value="4">Giỏi</option>
															<option value="5">Xuất sắc</option>
														</select>
													</div>
												</div>
												<div class="form_group form_btn d_flex content_c">
													<button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button>
												</div>
											</div>
											</div>
											
											<div class="themmoi_form ">
												<div data-num='1' class="btn btn_xanh themmoi_loai">
													<div class="img mr_10">
														<img src="../img/icon_plus.png" alt="Thêm mới">
													</div>
													<p>Thêm loại</p>
												</div>
											</div>
										</div>
									</div>

									<div class="btn form_btn content_c mt_25">
										<button onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" type="button" class=" btn_trang btn_168 mr_60 c-pointer">Hủy</button>
										<button type="submit" data-name="<?=$_POST['ten']?>" class="js_done btn_xanh btn_168">Lưu</button>
									</div>

								</form>
								<!--end form thêm mới đề đánh giá năng lực -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- popup danh sách tiêu chí  -->
<div  class="p_man popup popup_680 popup_them_tieuchi ">
	<div class="container">
		<div class="content">
			<div class="popup_header">
				<h4 class="name_header">Danh sách tiêu chí</h4>
				<div class="img close_popup">
					<img src="../img/close.png" alt="đóng">
				</div>
			</div>
			<div class="popup_body">
				<div  class="thanh_search width_100 ">
					<select class=" font_s14 color_gray width_100 js_select_2  tim_tieuchi">
						<option class="font_s14" value="">Tìm kiếm theo tên tiêu chí đánh giá</option>
						<?php foreach ($row_th_all as $key => $value): ?>
							<option class="font_s14" value="<?=$value['id']?>"><?=$value['tcd_ten']?></option>
						<?php endforeach ?>   
					</select>
					<span class="see_search"></span>
				</div>
				<form action="" onsubmit="return false">
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
											
											foreach ($row_th_all as $key => $value) {
											$stt ++;    
											?>

										<tr class="js_cha_tc js_check_tc_con cha_tieuchi_<? echo $value['id'];?>">

											<td>
												<p><? echo $value['id'];?></p>
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
												<input type="checkbox" class="js_check_tc_con" value="<?=$value['id'];?>">
											</td>
										</tr>

										<? 
										$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=1 and tcd_trangthai=2 and (tc_id_tonghop = '".$value['id']."') and (id_congty=1 or id_congty = '".$usc_id."')");
										$row_don_all = $query->result_array();//Lấy tca tc con
										foreach ($row_don_all as $key => $val):$sttt ++;?>
										<tr class="hidden_tam con_tieuchipop_<? echo $val['tc_id_tonghop'];?>">
											<td>
												<p><?echo $val['id']; ?></p>
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

					<div class="popup_btn m_edit">
						<button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
						<button type="submit" class="btn btn_xanh btn_140 submit_add_tc " name="submit_add_tc">
							Hoàn thành
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end popup danh sách tiêu chí  -->
<div class="popup popup_500 popup_thanhcong">
		<div class="container">
			<div class="popup_body">
				<div class="img">
					<img src="../img/popup_1.png" alt="thành công ">
				</div>
				<p class="text_a_c ">Thêm đề đánh giá <span class="font_wB show_xoa_ten"></span> thành
					công!</p>
				<div class="popup_btn">
					<div onclick="window.location.href='/quan_ly_tieu_chi_nang_luc.html'" class="btn btn_xanh close_popup ">
						Đóng
					</div>
				</div>
			</div>
		</div>
	</div> 
	 <div class="popup popup_500 popup_thatbai">
		<div class="container">
			<div class="popup_body">
				<div class="img">
					<img src="../img/popup_2.png" alt="thành công ">
				</div>
				<p class="text_a_c ">Tổng điểm phải bằng <span class="font_wB"><?=$thangdiem_hethong?>!</span> </p>
				<div class="popup_btn">
					<div  class="btn btn_xanh close_popup ">
						Đóng
					</div>
				</div>
			</div>
		</div>
	</div>  
	<div class="popup popup_500 popup_thatbai_thongbao">
		<div class="container">
			<div class="popup_body">
				<div class="img">
					<img src="../img/popup_2.png" alt="thành công ">
				</div>
				<p class="text_a_c popup_thatbai_thongbao_text"> </p>
				<div class="popup_btn">
					<div  class="btn btn_xanh close_popup ">
						Đóng
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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
$('input[type="radio"]').click(function() {
	if ($(this).val() == 1) {
		$('.phanloai_danhgia_macdinh').show();
		$('.phanloai_danhgia_khac').hide();
	} else {
		$('.phanloai_danhgia_macdinh').hide();
		$('.phanloai_danhgia_khac').show();
	}
})
$('.themmoi_loai').click(function() {
	var k=Number($(this).attr('data-num')) ;
    var camco=Number($(this).attr('data-camco'));
    if (camco==1) {
       $('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
	$(this).parents('.body.width_100').find('.container_form_4_tong').append('<div class="container_form_4  d_flex "><div class="form_group "><label for="">Từ <span class="color_red">*</span></label><input data-diemtu="'+(k)+'" onmouseout="diemnhieuhon(this)" type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Đến<span class="color_red">*</span></label><input type="text" class="arr_tt_sp den mc_den'+(k+1)+'" name="den_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Loại<span class="color_red">*</span></label><div class="select_no_muti "><select class="js_select_2 arr_tt_sp" name="loai_danhgia"><option value="">chọn loại</option><option value="1">Yếu</option><option value="2">Trung bình</option><option value="3">Khá</option><option value="4">Giỏi</option><option value="5">Xuất sắc</option></select></div></div><div class="form_group form_btn d_flex content_c"><button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button></div></div>');
	 $('.js_select_2').select2({
			width: '100%'
	 });
	
	 $('.btn_xoa_loai').click(function(){
		$(this).parents('.container_form_4').remove();
	 });
	 
	 $(this).attr('data-num',k+1);
})

function diemnhieuhon(th){
    var i=$(th).attr('data-diemtu');
    var diem=$(th).val();
    var diem_den_truoc=$(th).parents('.container_form_4_tong').find('.mc_den'+i+'').val();
    console.log(diem);
    console.log(diem_den_truoc);
  

   if (Number(diem) <= Number(diem_den_truoc)) {
    console.log('nhohon');
     $('.js_done').attr('data-camco',1);
     $('.themmoi_loai').attr('data-camco',1);
   }
   else{
    console.log('lonhon dc ');
     $('.js_done').attr('data-camco',0);
     $('.themmoi_loai').attr('data-camco',0);
   }

}

$('.btn_xoa_loai').click(function(){
		$(this).parents('.container_form_4').remove();
	 })
$('.js_select_2').select2({
	width: '100%'
})
CKEDITOR.replace('editor1', {
	height: '108'
});
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
$('.btn_them_tieuchi').click(function() {
	$('.popup_them_tieuchi').show();
})
$('.form_them_tieuchi').validate({
	errorPlacement: function(error, element) {
		error.appendTo(element.parents(".form_group"));
		error.wrap("<span class='error'>");
	},
	rules: {
		ten: "required",
	   
	},
	messages: {
		ten: "Không được để trống",
	},
});
<?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
$row = $query->result_array();
foreach ($row as $key => $val) {
?>

$(".so_xoay_<? echo $val['id'] ?>").click(function() {
	$(".con_tieuchi_<? echo $val['id'] ?>").toggle();
	$(this).toggleClass('xoay_ro');
});
<?
}
?>

<?
foreach ($row as $key => $val) {
?>

$(".so_xoaypop_<? echo $val['id'] ?>").click(function() {
	$(".con_tieuchipop_<? echo $val['id'] ?>").toggle();
	$(this).toggleClass('xoay_ro');
});
<?
}
?>

$('.js_check_tc_tong').click(function(){
if($('.js_check_tc_tong').prop('checked')) {
	$('.js_check_tc_con').prop('checked',true);
} else {
	$('.js_check_tc_con').prop('checked',false);
}
});
	

 $('.submit_add_tc').on("click",function () {
	$('.chungchung').remove();
	var str_id="";
	$('.js_check_tc_con').each(function(){
		if ($(this).is(":checked")) {
			str_id+=$(this).val()+","; 
		}
	});
	if (str_id=="") {
		
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Bạn chưa chọn tiêu chí nào');
		$('.show_tong').text(0);
		return;
	}

$('.popup_them_tieuchi').hide();
		  $.ajax({
			url: '/render/themmoi_tchi_de_danhgia.php',
			type: 'POST',
			data: {
				str_id:str_id,
			},
			
			success: function(data){
				$('.op_sp').append(data);
			}
		}); 
   
	});

$('.js_done').click(function(){
	var tdht=<?=$thangdiem_hethong?>;
	var tong_d_tc= 0;
	$('.tongcon').each(function(){
		tong_d_tc+=Number($(this).text());
	})
	
	var ten=$('.ten').val();
	var pl_macdinh = JSON.stringify(<?=$phanloai_hethong?>);
	var thangdiem_ht=$('.thangdiem_ht').val();
	$('.show_xoa_ten').text(ten);
	

	var ghi_chu= CKEDITOR.instances['editor1'].getData() ;
 
	var tieuchi="";
	$('.tc_them').each(function(){
		tieuchi+=$(this).text()+",";  
	});

	var arr_tt_sp = new Array();
	var i = 1;
	var input = new Array();
	var checkedradio = $('[name=drone]:radio:checked').val();

	var co=1;
	$('.arr_tt_sp').each(function(){
		if ($.isNumeric($(this).val())==false) {
			co=0;
		}
		if ($(this).val()>tdht) {
			co=2
		}
		if( i%3 == 1){
			input = [];
		}
		input.push($(this).val());
		if ( i%3 == 0) {
			arr_tt_sp.push(input);
		}
		i++;
	});
	var phan_loai = JSON.stringify(arr_tt_sp); 

	var error=0;
	$('.den').each(function(){
		
		var gtr_den=$(this).val();
		var gtr_tu=$(this).parents('.container_form_4').find('.tu').val();
		if (Number(gtr_tu)>Number(gtr_den)) {
			error=1;
		}
		
	});
   
	if(ten=="") {
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Vui lòng nhập đủ thông tin');
		return;
	}if(tieuchi=="") {
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Vui lòng chọn ít nhất 1 tiêu chí');
		return;
	}
		
	if (tdht!=tong_d_tc) {
		$('.popup_thatbai').show();
		return;
	}
   
	if(co==0 && checkedradio==2){
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Vui lòng nhập số điểm (là số) và phân loại ');
		return;
	}if(co==2 && checkedradio==2){
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Vui lòng chọn số điểm nhỏ hơn '+tdht+'');
		return;
	}
	
	if(phan_loai ==="[]" && checkedradio==2){
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 phân loại đánh giá');
		return;
	}
   
	if (error==1) {
		$('.popup_thatbai_thongbao').show();
		$('.popup_thatbai_thongbao_text').text('Số điểm sau phải lớn hơn số điểm trước');
		return;
	}
	var camco=Number($(this).attr('data-camco'));
    if (camco==1 && checkedradio==2) {
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
		$.ajax({
			url: '/ajax/themmoi_de_danhgia.php',
			type: 'POST',
			data: {
				ten:ten,
				pl_macdinh:pl_macdinh,
				thangdiem_ht:thangdiem_ht,
				tieuchi:tieuchi,
				ghi_chu:ghi_chu,
				phan_loai:phan_loai,
				checkedradio:checkedradio,   
			},
			success: function(data){
				$('.popup_thanhcong').show();
			}
		});           
})
function xoa_danhgia(th){
	$(th).parents('.danhgia') .remove();
	var tong_d_tc= 0;
	$('.tongcon').each(function(){
		tong_d_tc+=Number($(this).text());
	})
	$('.show_tong').text(tong_d_tc);
}
$('.tim_tieuchi').change(function(){
	var tc=$(this).val();
	$('.js_cha_tc').hide();
	$('.cha_tieuchi_'+tc+'').show();
	if (tc=="")$('.js_cha_tc').show();

})
</script>

</html>