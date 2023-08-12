<?
 include 'config.php';
$time_tracnghiem=getValue('time_tracnghiem','int','POST',0);
$count_tracnghiem=getValue('count_tracnghiem','int','POST',0);
$hinhthuc=getValue('hinhthuc','int','POST',0);
$cacloai=getValue('cacloai','str','POST','');
$cacloai=json_decode($cacloai,true);
$qr= new db_query("SELECT * FROM danhsachcauhoi where (hinhthuc=2 or hinhthuc=3) and trangthai_xoa=1 and id_congty=".$usc_id."");
$dem=mysql_num_rows($qr->result);
?>
<?php if ($count_tracnghiem<=$dem): ?>
<?for ($m=1; $m < 6; $m++) { ?>
	<?php if (count($cacloai)==0): ?>
		<?
		$query= new db_query("SELECT * FROM danhsachcauhoi where (hinhthuc=2 or hinhthuc=3) and trangthai_xoa=1 and id_congty=".$usc_id." ORDER BY rand() LIMIT $count_tracnghiem ");
		$row = $query->result_array();
		?>

		<?php $list=""; $tongthoigian=0;$tongdiem=0;foreach ($row as  $value): $tongthoigian+=$value['thoigian_thuchien'];$list.=$value['id'].",";$tongdiem+=$value['sodiem'];?><?php endforeach ?>
		<?$list=trim($list,',');?>
	<?php endif ?>

	<?php if (count($cacloai)>0): ?>
		<?php $list=''; $tongthoigian=0;$tongdiem=0;foreach ($cacloai as  $value_cacloai): ?>
			<?php if ($value_cacloai['so_cauhoi']>0): ?>
				<?
				$query= new db_query("SELECT * FROM danhsachcauhoi where loai=".$value_cacloai['loai_cauhoi']." and (hinhthuc=2 or hinhthuc=3)  and trangthai_xoa=1 and id_congty=".$usc_id." ORDER BY rand()  LIMIT ".$value_cacloai['so_cauhoi']."");
				$row = $query->result_array();
				?> 
				<?php $list1=""; $tongthoigian1=0;$tongdiem1=0; foreach ($row as  $value):$tongthoigian1+=$value['thoigian_thuchien'];$tongdiem1+=$value['sodiem']; ?>
				<?$list1.=$value['id'].",";?>
				<?php endforeach ?>

			<?php endif ?>
			<?$list.=$list1;$tongthoigian+=$tongthoigian1;$tongdiem+=$tongdiem1?>
		<?php endforeach ?>
		<?$list=trim($list,',');echo $list;?>
	<?php endif ?>
	

		<tr class="show_chung_hethong show_rieng_hethong<?=$m?>">
		    <td>
		        <p><input type="radio" name="de_ktra" class="radio_de_hethong_sinh_tracnghiem radio_tracnghiem_ht<?=$m?>"></p>
		    </td>
		    
		    <td>
		        <input style="width: 100%;height: 37px;border: 1px solid #ccc;border-radius: 4px;padding-left: 10px;" type="text" class="color_blue name_mau name_mauso<?=$m?>" <?php if ($hinhthuc==1||$hinhthuc==2): ?>value="Đề kiểm tra mẫu dạng trắc nghiệm số <?=$m?>"<?php endif ?> <?php if ($hinhthuc==3): ?>value="Đề kiểm tra mẫu <?=$m?>"<?php endif ?> >
		        <input type="text" class="hidden demau_so<?=$m?> demau_sochung" value="<?=$list?>">
		        
		    </td>
		    <td class="td_after hidden">
		        <input readonly style="border: 0px;width: 50px;" type="text" class=" tongdiemht_so<?=$m?> tongdiemht_sochung" value="<?=$tongdiem?>">
		    </td>
		    <td class="hidden">
		        <p class="tongtime_after tongtime_after_so<?=$m?>"><?=($tongthoigian);?> Phút</p>
		    </td>
		    <td>
		    	<input style="width: 100%;height: 37px;border: 1px solid #ccc;border-radius: 4px;padding-left: 10px;" type="text" class="chuden ghichu_mau ghichu_mauso<?=$m?>" placeholder="Nhập ghi chú">
		    </td>
		    <td>
		        <p data-id='<?=$m?>' data-list='<?=$list?>'  onclick="show_chitiet_tn(this) " class="flex c-pointer hieuung xemchitiet">
		        	<img class="right-5" src="../img/eyes.png" alt="">
		        	<span class="chuxanh size-14 font-500">Chi tiết</span>
		        </p>
		    </td>
		    
		</tr>		
	<?}?>	
<?php endif ?>	

	<?php if ($count_tracnghiem>$dem): ?>
		<tr class="show_chung_hethong">
			<td colspan="5">
				<p class="chudo">Số lượng câu hỏi trắc nghiệm không đủ</p>
			</td>
		</tr>
	<?php endif ?>