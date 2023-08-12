<?
 include 'config.php';
$a=getValue('str_id','str','POST','');
$a=trim($a,",");
$str_id=explode(",",$a);

$b=getValue('str_id_pb','str','POST','');
$b=trim($b,",");
$str_id_pb=explode(",",$b);
?>
<? foreach ($str_id as $key => $value):if(in_array($value, $str_id_pb)==true) continue; ?>
  <tr class="nv_danhgia3">
    <td><p class="<? if(in_array($value, $str_id_pb)==false) echo "chungchung"; ?>"><?=$value?></p></td>
    <td>
        <p class="text_a_l "><?=search($arr_dep,'dep_id',$value)[0]['dep_name']?></p>
    </td>
    <td>
         <p id-nv='<?=$value?>' onclick="xoanv_danhgia3(this)" class="color_red c-pointer">Xóa</p>
    </td>
</tr>
<? endforeach; ?>

                                           
