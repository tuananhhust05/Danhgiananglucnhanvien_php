<?
include 'config.php';
 $list_loai=getValue('val','str','POST',''); 
 $list_loai=explode(',',$list_loai);
 $query= new db_query("SELECT * FROM loaicauhoi where trangthai_xoa=1 and id_congty='".$usc_id."'  ");
 $row = $query->result_array();
?>
<?php foreach ($row as  $value): ?>
	<?php if (in_array($value['id'], $list_loai)): ?>
		<?
		$query= new db_query("SELECT * FROM danhsachcauhoi  where hinhthuc=1 and loai=".$value['id']." and trangthai_xoa=1 and id_congty='".$usc_id."'  ");
 		$list_question = $query->result_array();
 		$count_question= mysql_num_rows($query->result);
		?>
		<div class="khoi_boder_tuluan bot-15">
			<div class="bot-5">
				<label class="" for=""><?=$value['ten_loai']?><span class="color_red">*</span>
				</label>
			</div>
			<input id-loai='<?=$value['id']?>' type="number" min=0 max='<?=$count_question?>' class="number_loai_ch_tuluan number_loai_ch_<?=$value['id']?>>" name="" value="" placeholder="Nhập số câu hỏi (có <?=$count_question?> câu hỏi) ">
		</div>
	<?php endif ?>
<?php endforeach ?>
        
       <script>
       	$('.number_loai_ch_tuluan').change(function(){
		var s=0;
		$('.number_loai_ch_tuluan').each(function(){
			s+=Number($(this).val());
		})
		$('#sodiem_ch_input_tl').val(s).trigger('change');
	})
       </script> 