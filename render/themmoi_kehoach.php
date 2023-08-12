<?
 include 'config.php';
 $id=getValue('id','int','POST',0);

 $query=new db_query("SELECT * FROM de_danhgia where dg_id = $id ");
  $row = mysql_fetch_assoc($query->result);
  $str_id=explode(",",$row['dg_id_tieuchi']);
?>
<? $stt=0; 
foreach ($str_id as $key => $value) {
     $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
    $row_cha = $db_qr->result_array();
?>
<? 
 foreach ($row_cha as $key => $val) {
    $stt ++;
  ?> 
    <tr class="">
        <td>
            <p><?=$stt;?></p>
        </td>
        <td class="">
            <div class="d_flex btn_soxuong">
                <p class="mr_10 font_w5"><?=$val['tcd_ten']?></p>
                <div class="img so_xoayt_<? echo $val['id'] ?>">
                    <img src="../img/icon_so.png"
                        alt="Sổ xuống">
                </div>
            </div>
        </td>
        <td >
            <p><?=$val['tcd_thangdiem']?></p>
            <?$s=$val['tcd_thangdiem'];$ss+=$s?>
            <input type="text" class="hidden tongdiem_nho" value="<?=$ss?>"  name="">
        </td>
    </tr>

   <?
    $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and trangthai_xoa=1 and  tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
    $row_c = $db_qr_c->result_array();

    foreach ($row_c as $key => $val) {
        $stt++;
        ?>
    <tr class="con_tieuchit_<? echo $val['tc_id_tonghop'] ?>">
        <td>
            <p><?=$stt;?></p>
        </td>
        <td class="">
            <p class="text_a_l"><?=$val['tcd_ten']?></p>
        </td>
        <td>
            <p><?=$val['tcd_thangdiem']?></p>
        </td>

    </tr>

<?
    }
    ?>
    <?
    } 
    ?>
   <?
    }?>
    <tr>
        <td colspan="2">
            <p class="text_a_l font_w5">Tổng điểm:
            </p>
        </td>
        <td class="tongdiem font_w5"><?=$ss?></td>
    </tr>
    <script>
    <?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and trangthai_xoa=1 and tcd_trangthai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
$rowjs = $query->result_array();
foreach ($rowjs as $key => $val) {
?>

$(".so_xoayt_<? echo $val['id'] ?>").click(function() {
    $(".con_tieuchit_<? echo $val['id'] ?>").toggle();
    $(this).toggleClass('xoay_ro');
});
              
<?
}
?>

</script>