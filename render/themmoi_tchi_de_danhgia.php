    <?
 include 'config.php';
$a=getValue('str_id','str','POST','');
$a=trim($a,",");
$str_id=explode(",",$a);

?>

<?$s_tong=0;
foreach ($str_id as $key => $value) {
    
     $db_qr= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and tcd_loai= 2 and id='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
    $row = $db_qr->result_array();

?>

    <?  foreach ($row as $key => $val) { $stt++; ?> 
     <tr class="cha_tieuchim_<? echo $val['id'];?> chungchung danhgia">
        <td >
            <p class="tc_them hidden"><? echo $val['id'];?></p>
            <p><?=$stt;?></p>
        </td>
        <td class="width_60">
            <div class="d_flex btn_soxuong">
                <p class="mr_10 font_w5"><? echo $val['tcd_ten'];?></p>
                <div class="img so_xoay so_xoayt_<? echo $val['id'];?>">
                    <img src="../img/icon_so.png" alt="Sổ xuống">
                </div>
            </div>
        </td>
        <td>
            <p class="tongcon"><? echo $val['tcd_thangdiem'];$s_tong+=$val['tcd_thangdiem'];?></p>
        </td>
        <td>
            <p class="color_red c-pointer js_m_xoa_cha " onclick="xoa_danhgia(this)">Xóa</p>
        </td>
    </tr>

    <?
    $db_qr_c= new db_query("SELECT * FROM tbl_tieuchi where tcd_trangthai=2 and tcd_loai=1 and tc_id_tonghop='".$value."' and (id_congty=1 or id_congty = '".$usc_id."')");
    $row_c = $db_qr_c->result_array();

    foreach ($row_c as $key => $val) {
        $stt++;
        ?>
    <tr class="chungchung hidden_tam con_tieuchit_<? echo $val['tc_id_tonghop'];?>">
        <td>
            <!-- <p><?=$val['id']?></p> -->
            <p><?=$stt?></p>
        </td>
        <td class="width_60">
            <p class="text_a_l"><? echo $val['tcd_ten'];?></p>
        </td>
        <td>
            <p><? echo $val['tcd_thangdiem'];?></p>
        </td>
        <td>
            
        </td>
    </tr>

    <?
    }
    ?>
    <?
    } 
    ?>
   <?
    }
    ?>


<script>
    <?
$query= new db_query("SELECT * FROM tbl_tieuchi where tcd_loai=2 and tcd_trangthai=2 and (id_congty=1 or id_congty = '".$usc_id."')");
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
$(document).ready(function(){
    var tong_d_tc= 0;
    $('.tongcon').each(function(){
        tong_d_tc+=Number($(this).text());
    })
    $('.show_tong').text(tong_d_tc);
})
</script>