<?
 include 'config.php';
$check_de=getValue('check_de','str','POST',"");

 $check_de=trim($check_de,",");

 $str_check_de=explode(',',$check_de);

 foreach ($str_check_de as $val) {
     $qr=new db_query("DELETE FROM de_danhgia WHERE dg_id = ".$val."");
    }
?>