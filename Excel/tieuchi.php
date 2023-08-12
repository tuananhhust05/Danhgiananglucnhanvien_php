<?php
include "config.php";
$id = getValue("idtc","int","GET",0);
$query= new db_query("SELECT * FROM tbl_tieuchi where id = '".$id."'");
$value = mysql_fetch_assoc($query->result);
 

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=excel_ds_ts.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo'<table border="1px solid black">';
echo '<tr><th colspan="2" style="font-size:18px;height:60px;vertical-align: middle;">Thông tin tiêu chí '.$value['tcd_ten'].'</th></tr>';


?>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Tên tiêu chí:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['tcd_ten']?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Loại tiêu chí:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? if ($value['tcd_loai']==1) 
                                                echo "Tiêu chí đơn"; else echo "Tiêu chí tổng hợp";
                                            ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Trạng thái:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? if($value['tcd_trangthai']==2) echo "Mở"; else echo "Đóng";?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Người tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? if($value['tcd_nguoitao']==1) echo "Mặc định";
     else {
        if($value['tcd_nguoitao']==$value['id_congty']) {
            echo search($cty,'com_id',$value['tcd_nguoitao'])[0]['com_name'];
        }
        else{
            echo search($data_list_nv,'ep_id',$value['tcd_nguoitao'])[0]['ep_name'];
        }
     } ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ngày tạo:

</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><? 
                                                    $timestamp=$value['tcd_ngaytao'];
                                                    echo(date("d/m/Y", $timestamp)); ?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Thang điểm:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['tcd_thangdiem']?></td>
</tr>
<tr style="height:40px">
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 200px">Ghi chú:</td>
    <td style="vertical-align: middle;font-size: 14px;text-align: center;width: 300px;"><?=$value['tcd_ghichu']?></td>
</tr>
