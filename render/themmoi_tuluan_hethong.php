    <?
 include 'config.php';
$time_tuluan=getValue('time_tuluan','int','POST',0);
$count_tuluan=getValue('count_tuluan','int','POST',0);
$hinhthuc=getValue('hinhthuc','int','POST',0);
$cacloai=getValue('cacloai','str','POST','');
$cacloai=json_decode($cacloai,true);
$qr= new db_query("SELECT * FROM danhsachcauhoi where hinhthuc=1 and trangthai_xoa=1 and id_congty=".$usc_id."");
$dem=mysql_num_rows($qr->result);
?>

<?php if ($count_tuluan<=$dem): ?>
<?for ($n=1; $n < 6; $n++) { ?>
	<?php if (count($cacloai)==0): ?>
		<?
		$query= new db_query("SELECT * FROM danhsachcauhoi where hinhthuc=1 and trangthai_xoa=1 and id_congty=".$usc_id." ORDER BY rand() LIMIT $count_tuluan ");
		$row = $query->result_array();
		?>

		<?php $list=""; $tongthoigian=0;$tongdiem=0;foreach ($row as  $value): $tongthoigian+=$value['thoigian_thuchien'];$list.=$value['id'].",";$tongdiem+=$value['sodiem'];?><?php endforeach ?>
		<?$list=trim($list,',');?>
	<?php endif ?>
	
	<?php if (count($cacloai)>0): ?>
		<?php $list=''; $tongthoigian=0;$tongdiem=0;foreach ($cacloai as  $value_cacloai): ?>
			<?php if ($value_cacloai['so_cauhoi']>0): ?>
				<?
				$query= new db_query("SELECT * FROM danhsachcauhoi where loai=".$value_cacloai['loai_cauhoi']." and hinhthuc=1 and trangthai_xoa=1 and id_congty=".$usc_id." ORDER BY rand()  LIMIT ".$value_cacloai['so_cauhoi']."");
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
	
		<tr class="show_chung_hethong_tl show_rieng_hethong_tl<?=$n?>">
		    <td>
		        <p><input type="radio" name="de_ktratl" class="radio_de_hethong_sinh_tuluan radio_tuluan_ht<?=$n?>"></p>
		    </td>
		    
		    <td>
		        <input style="width: 100%;height: 37px;border: 1px solid #ccc;border-radius: 4px;padding-left: 10px;" type="text" class="color_blue name_mau_tl name_mauso_tl<?=$n?>" <?php if ($hinhthuc==1||$hinhthuc==2): ?>value="Đề kiểm tra mẫu dạng tự luận số <?=$n?>"<?php endif ?> <?php if ($hinhthuc==3): ?>value="Đề kiểm tra mẫu <?=$n?>"<?php endif ?> >
		        <input type="text" class="hidden demau_so_tl<?=$n?> demau_sochung_tl" value="<?=$list?>">
		        
		    </td>
		    <td class="td_after hidden">
		        <input readonly style="border: 0px;width: 50px;" type="text" class=" tongdiemht_so_tl<?=$n?> tongdiemht_sochung_tl" value="<?=$tongdiem?>">
		    </td>
		    <td class="hidden">
		        <p class="tongtime_after_tl tongtime_after_so_tl<?=$n?>"><?=($tongthoigian);?> Phút</p>
		    </td>
		    <td>
		    	<input style="width: 100%;height: 37px;border: 1px solid #ccc;border-radius: 4px;padding-left: 10px;" type="text" class="chuden ghichu_mau_tl ghichu_mauso_tl<?=$n?>" placeholder="Nhập ghi chú">
		    </td>
		    <td>
		        <p data-id='<?=$n?>' data-list='<?=$list?>'  onclick="show_chitiet_tl(this) " class="flex c-pointer hieuung ">
		        	<img class="right-5" src="../img/eyes.png" alt="">
		        	<span class="chuxanh size-14 font-500">Chi tiết</span>
		        </p>
		    </td>
		    
		</tr>
	<?}?>
<?php endif ?>
<?php if ($count_tuluan>$dem): ?>
	<tr class="show_chung_hethong_tl">
		<td colspan="5">
			<p class="chudo">Số lượng câu hỏi tự luận không đủ</p>
		</td>
	</tr>
<?php endif ?>
	