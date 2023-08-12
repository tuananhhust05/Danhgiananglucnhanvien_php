<? 
include 'config.php';
 $id=getValue('id','int','POST',0);
 $query= new db_query("SELECT * FROM de_danhgia where dg_id = '".$id."'");
     $row = mysql_fetch_assoc($query->result);
     if ($row['dg_loai_macdinh']!="") $pl= json_decode($row['dg_loai_macdinh'], true);
     else $pl= json_decode($row['dg_phanloaikhac'], true);
?>
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


 