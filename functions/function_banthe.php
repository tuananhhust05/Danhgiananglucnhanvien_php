<?
/** Hàm gửi mail các site bán thẻ **/
function CreateSendMail($toFrom,$toAddress,$ccAddress,$bccAddress,$subject,$body,$type) {
   $type = strtoupper($type);
   $int_type = 0;
   if($type == 'MUA_MA_THE')
   {
      $int_type = 1;
   }
   else if($type == 'TOPUP_MOBILE')
   {
      $int_type = 2;
   }
   else if($type == 'RUT_TIEN')
   {
      $int_type = 3;
   }
   else if($type == 'LAY_LAI_MAT_KHAU')
   {
      $int_type = 4;
   }
   else if($type == 'CAP_NHAT_THONG_TIN_TAI_KHOAN')
   {
      $int_type = 5;
   }
   else if($type == 'THONG_BAO_CHUYEN_TIEN')
   {
      $int_type = 6;
   }
   else if($type == 'XAC_NHAN_CHUYEN_TIEN_CHO_TK_KHAC')
   {
      $int_type = 7;
   }else if($type=='BAO_LOI_HE_THONG')
   {
        $int_type=99;
   }
   $MailContent = $body;
   $SendFrom = $toFrom;
   $SendTo = $toAddress;
   $Status = 0;
   $Subject = $subject;
   $Type = $type;
   $timesend = date("Y-m-d H:i:s",time());
   //send mail to hunghabay
   SendmailHunghapay("B24H","293BD0A20E80446BB31F8FC985916878",$toAddress,$subject,$body,$int_type);
   
}
function SendmailHunghapay($partner,$pass,$toAddress,$subject,$body,$int_type)
{
   $soapUrl = "http://mails.hunghapay.com/SendMail.asmx?op=CreateMail"; // asmx URL of WSDL
   // xml post structure
   $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
   <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
     <soap:Body>
       <CreateMail xmlns="http://tempuri.org/">
         <partner>'.$partner.'</partner>
         <pass>'.$pass.'</pass>
         <toAddress>'.$toAddress.'</toAddress>
         <subject>'.$subject.'</subject>
         <body>'.$body.'</body>
         <type>'.$int_type.'</type>
       </CreateMail>
     </soap:Body>
   </soap:Envelope>';   // data from the form, e.g. some ID number
   $headers = array(
   "Content-Type: text/xml; charset=utf-8",
   "Accept: text/xml",
   "Cache-Control: no-cache",
   "Pragma: no-cache",
   "Content-length: ".strlen($xml_post_string),
   ); //SOAPAction: your op URL
   $url = $soapUrl;
   // PHP cURL  for https connection with auth
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
   curl_setopt($ch, CURLOPT_TIMEOUT,       50 );
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   // converting
   $response = curl_exec($ch); 
   curl_close($ch);
}
/** Hàm login get token **/
function LoginRestClient($email,$password) 
{
   $tokenResult = '';
   $unEncodedString = "{".$email."}:{".$password."}";
   $encodedString = base64_encode($unEncodedString);
}

function create_token($userid,$ip)
{
   if (function_exists('com_create_guid') === true)
   {
     return trim(com_create_guid(), '{}');
   }
   $timecreate = date("Y-m-d H:i:s",time());
   $timexpired = strtotime('+180 minutes',time());
   $timexpired = date("Y-m-d H:i:s",$timexpired);
   $token = v4_guid();//sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
   $db_token = new db_execute("INSERT INTO tokens(UserId,AuthToken,IssuedOn,ExpiresOn,IP)
                           VALUES('".$userid."','".$token."','".$timecreate."','".$timexpired."','".$ip."')");
   unset($db_token);
   return $token;
}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function Encrypt($key_seed,$input){
    $input = trim($input);
    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($input);
    $padding = $block - ($len % $block);
    $input .= str_repeat(chr($padding),$padding);
    // generate a 24 byte key from the md5 of the seed
    $key = substr(md5($key_seed),0,24);
    $iv_size = mcrypt_get_iv_size(MCRYPT_TRIPLEDES,
   MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    // encrypt
    $encrypted_data = mcrypt_encrypt(MCRYPT_TRIPLEDES, $key,
   $input,
   MCRYPT_MODE_ECB, $iv);
    // clean up output and return base64 encoded
    return base64_encode($encrypted_data);
   } //end function Encrypt()

function Decrypt($key_seed,$input)
{
   $input = base64_decode($input);
   $key = substr(md5($key_seed),0,24);
   $text=mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $input,
   MCRYPT_MODE_ECB,'12345678');
   $block = mcrypt_get_block_size('tripledes', 'ecb');
   $packing = ord($text{strlen($text) - 1});
   if($packing and ($packing < $block)){
   for($P = strlen($text) - 1; $P >= strlen($text) - $packing; $P--){
   if(ord($text{$P}) != $packing){
   $packing = 0; 
      }
      }
   }
   $text = substr($text,0,strlen($text) - $packing);
   return $text;
}
/** Hàm lấy số dư tài khoản theo userid **/
function GetSoDuByUserId($userid)
{
   $sdkhadung = 0;
   $sddongbang = 0;
   $db_qrsd = new db_query("SELECT SUM(price) as khadung FROM `transactiontable` WHERE `UserID` = $userid AND `status` IN(1,2)");
   $row = mysql_fetch_assoc($db_qrsd->result);
   if($row['khadung'] != NULL)
   {
      $sdkhadung = $row['khadung'];
   }
   $db_qrdb = new db_query("SELECT SUM(price) as dongbang FROM `transactiontable` WHERE `UserID` = $userid AND `status` = 2");
   $rows = mysql_fetch_assoc($db_qrdb->result);
   if($rows['dongbang'] != NULL)
   {
      $sddongbang = $rows['dongbang'];
   }
   return array("KhaDung"=>$sdkhadung,"DongBang"=>$sddongbang);
}
/** Hàm lấy tiền chờ gạch thẻ **/

/** Hàm check token còn hạn **/
function Checktoken($token,$userid)
{
   $now = 0;
   $db_qr = new db_query("SELECT * FROM `tokens` WHERE 	`AuthToken` = '".$token."' AND `userid` = '".$userid."' LIMIT 1");
   if(mysql_num_rows($db_qr->result) > 0)
   {
      $row = mysql_fetch_assoc($db_qr->result);
      $expired = $row['ExpiresOn'];
      $expired = strtotime($expired);
      if($expired < time())
      {
         $now = 0;
      }
      else
      {
         $now = 1;
      }
   }
   return $now;
}
function GetTokenByUserID($userid)
{
   $now = "";
   $db_qr = new db_query("SELECT * FROM tokens WHERE UserId = '".$userid."' ORDER By TokenId DESC LIMIT 1");
   if(mysql_num_rows($db_qr->result) > 0)
   {
      $row = mysql_fetch_assoc($db_qr->result);
      $expired = $row['ExpiresOn'];
      $expired = strtotime($expired);
      if($expired < time())
      {
         $now = "";
      }
      else
      {
         $now = $row['AuthToken'];
      }
   }
   return $now;
}
function ChecktokenExpired($token)
{
   $now = 0;
   $db_qr = new db_query("SELECT * FROM tokens WHERE 	AuthToken = '".$token."' ORDER BY TokenId DESC LIMIT 1");
   if(mysql_num_rows($db_qr->result) > 0)
   {
      $row = mysql_fetch_assoc($db_qr->result);
      $expired = $row['ExpiresOn'];
      $expired = strtotime($expired);
      if($expired < time())
      {
         $now = 0;
      }
      else
      {
         //$now = $row['UserId'];
			if((intval($row['UserId'])==93921)&&(getUserIP()=="119.9.116.110")){
            $now = $row['UserId'];
        }else{
         $now = $row['UserId'];
         }
      }
   }
   return $now;
}
function GetProvidersById($provideId)
{
   $telco = "VTT";
   switch ($provideId)
   {
       case 1:
           $telco = "VTT";
           break;
       case 2:
           $telco = "VMS";
           break;
       case 3:
           $telco = "VNP";
           break;
       case 5:
           $telco = "FPT";
           break;
       case 7:
           $telco = "VNM";
           break;
       case 8:
           $telco = "ONC";
           break;
       case 11:
           $telco = "MGC";
           break;
       case 12:
           $telco = "ZING";
           break;
       case 13:
           $telco = "VTC";
           break;
       case 14:
           $telco = "GAR";
           break;
       case 15:
           $telco = "BIT";
           break;
   }
   return $telco;
}
function ValidateMessage($msg,$provider,$amount,$quanlity)
{
   $flg = false;
   $provider = "";
   $amount = 0;
   $quanlity = 0;

   if($msg != "")
   {
      $lstMsg = explode(":",$msg);

      if(count($lstMsg) == 3)
      {
         $providerCode = trim($lstMsg[0]);
         switch(mb_strtoupper($providerCode,'UTF-8'))
         {
            case "VTT":
                $providerCode = "VT";
                break;
            case "VNP":
                $providerCode = "VP";
                break;
            case "VMS":
                $providerCode = "MB";
                break;
            case "FTP":
                $providerCode = "GT";
                break;
            case "VNM":
                $providerCode = "VM";
                break;
            case "ZING":
            case "ZX":
                $providerCode = "ZX";
                break;
            case "VTC":
            case "VC":
                $providerCode = "VC";
                break;
            case "GAR":
            case "GA":
                $providerCode = "GA";
                break;
         }
         $provider = $providerCode;
         $amount = $lstMsg[1];
         $quanlity = $lstMsg[2];

         if($provider != "" && $amount > 0 && $quanlity > 0) $flg = true;
      }
   }
   return $flg;
}
function TyLeTrietKhauMuaMaThe($userId,$providerCode)
{
   $tyle = 1.0;
   $_codeProvider = mb_strtoupper($providerCode,'UTF-8');
    switch(mb_strtoupper($providerCode,'UTF-8'))
    {
        case "VT":
            $_codeProvider = "VTT";
            break;
        case "MB":
            $_codeProvider = "VMS";
            break;
        case "VP":
            $_codeProvider = "VNP";
            break;
        case "VM":
            $_codeProvider = "VNM";
            break;
        case "GT":
        case "GATE":
            $_codeProvider = "FPT";
            break;
        case "ZIN":
            $_codeProvider = "ZING";
            break;
        case "VC":
        case "VTC":
            $_codeProvider = "VTC";
            break;
        case "GA":
        case "GAR":
            $_codeProvider = "GAR";
            break;
    }
    if($_codeProvider != '')
    {
     
      $db_qr = new db_query("SELECT * FROM `providers` WHERE `ProviderCode` = '".$_codeProvider."' LIMIT 1");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         $db_qrs = new db_query("SELECT * FROM `user` WHERE `UserId` = '".$userId."' LIMIT 1");
         if(mysql_num_rows($db_qrs->result) > 0)
         {
            $rows = mysql_fetch_assoc($db_qrs->result);
            $db_qrss = new db_query("SELECT * FROM `groupprovider` WHERE GroupId = '".$rows['GroupId']."' AND `Status` = 1 AND Type = 2 AND `ProviderID` = '".$row['Id']."' LIMIT 1");
            if(mysql_num_rows($db_qrss->result) > 0)
            {
               $rowss = mysql_fetch_assoc($db_qrss->result);
               return $rowss['Price'] / 100;
            }
         }
      }
    }
    else
    {
      return $tyle;
    }
    
    return $tyle;
}
function thangdu($menhgiathe)
{
   $thangdu = 0;
   if($menhgiathe == "10000")
   {
      $thangdu = 0.02;
   }
   else if($menhgiathe == "14000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "20000")
   {
       $thangdu = 0.02;
   }
   else if($menhgiathe == "28000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "30000")
   {
       $thangdu = 0.02;
   }
   else if($menhgiathe == "42000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "50000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "56000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "84000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "100000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "160000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "170000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "190000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "290000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "250000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "340000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "390000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "200000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "300000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "500000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "570000")
   {
       $thangdu = 0;
   }
   else if($menhgiathe == "770000")
   {
       $thangdu = 0;
   }
   return $thangdu;
   
}
/** Lấy thẻ từ kho **/
function GetCardsKho($partner,$pass,$providerCode,$amount,$quantity,$TransSendID)
{
   $soapUrl = "http://store.paycard999.com/BuyCards.asmx?op=GetCards"; // asmx URL of WSDL
   // xml post structure
   $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
   <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
     <soap:Body>
       <GetCards xmlns="http://tempuri.org/">
         <partner>'.$partner.'</partner>
         <pass>'.$pass.'</pass>
         <telco>'.$providerCode.'</telco>
         <amount>'.$amount.'</amount>
         <quanlity>'.$quantity.'</quanlity>
         <trace>'.$TransSendID.'</trace>
       </GetCards>
     </soap:Body>
   </soap:Envelope>';   // data from the form, e.g. some ID number
   $headers = array(
   "Content-Type: text/xml; charset=utf-8",
   "Accept: text/xml",
   "Cache-Control: no-cache",
   "Pragma: no-cache",
   "Content-length: ".strlen($xml_post_string),
   ); //SOAPAction: your op URL
   $url = $soapUrl;
   // PHP cURL  for https connection with auth
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
   curl_setopt($ch, CURLOPT_TIMEOUT,       50 );
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   // converting
   $response = curl_exec($ch); 
   curl_close($ch);
   return $response;
}
/** Function MuatheIO **/
function BuyCardIO($telco,$amount,$quantity,$trace,$type)
{
   $productCode = "";
   switch(mb_strtoupper($telco,'UTF-8'))
   {
    case "VTT":
    case "VT":
        $productCode = "VT";
        break;
    case "VM":
    case "VNM":
        $productCode = "VM";
        break;
    case "VNP":
    case "VP":
        $productCode = "VP";
        break;
    case "VMS":
    case "MB":
        $productCode = "MB";
        break;
    case "FPT":
    case "GT":
        $productCode = "GT";
        break;
    case "ZING":
    case "ZX":
        $productCode = "ZX";
        break;
    case "VTC":
    case "VC":
        $productCode = "VC";
        break;
    case "GAR":
    case "GA":
        $productCode = "GA";
        break;
   }
   switch($amount)
   {
    case 10000:
        $productCode = $productCode."10";
        break;
    case 20000:
        $productCode = $productCode."20";
        break;
    case 30000:
        $productCode = $productCode."30";
        break;
    case 50000:
        $productCode = $productCode."50";
        break;
    case 100000:
        $productCode = $productCode."100";
        break;
    case 200000:
        $productCode = $productCode."200";
        break;
    case 300000:
        $productCode = $productCode."300";
        break;
    case 500000:
        $productCode = $productCode."500";
        break;
   }
   $partnerCode = "";
   $partner_3DES_key = "";
   switch($type)
   {
       case 1:
           $partnerCode = "paycard365_Airtime";
           $partner_3DES_key = "iXAdKhJUlTHcnyBMEymdHUrIgB1PfoZyQOAB5b0CoY53AZ3ApaoaF86loNSf4ne5";
           break;
       case 2:
           $partnerCode = "paycard365_AirtimeII";
           $partner_3DES_key = "73hc4OWb33tl3tML2QK4w1xI9eiMORtTYddV2N1ApPnQ23eLXkSxXtr0Byc9YcBX";
           break;
       case 4:
           $partnerCode = "paycard365_AirtimeIV";
           $partner_3DES_key = "H3zVvWCLkbQxZgGWgQu17REEnN1wWN2pXqCZOO2aZQDxD4cSAKSGVL4kmRfemjdf";
           $type = 1;                         
           break;
   }
}
function BuyCardsInStore($partner,$pass,$providerCode,$amount,$quantity,$TransSendID)
{
   try
   {
       switch(mb_strtoupper($providerCode,'UTF-8'))
       {
           case "VT":
               $providerCode = "VTT";
               break;
           case "VP":
               $providerCode = "VNP";
               break;
           case "MB":
               $providerCode = "VMS";
               break;
           case "GATE":
           case "GT":
               $providerCode = "FPT";
               break;
           case "VM":
               $providerCode = "VNM";
               break;
           case "ZX":
               $providerCode = "ZING";
               break;
           case "GA":
               $providerCode = "GAR";
               break; 
           case "VC":
               $providerCode = "VTC";
               break;
       }
       //var rs = buycard.GetCards("B247", "A9AAED4A0BC042C49F9E255D9B978F1B", providerCode, amount, quantity, TransSendID);
       $listcard = GetCardsKho($partner,$pass,$providerCode,$amount,$quantity,$TransSendID);
       $listcard = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $listcard);
       $listcard = new SimpleXMLElement($listcard);
       $listcard = json_decode(json_encode((array)$listcard), TRUE); 
       $listcard = $listcard['soapBody']['GetCardsResponse']['GetCardsResult'];
       $check=false;
       if($listcard['RepCode'] == 1)
       {
         $listthe = $listcard['Data'];
         
         //$BuyCards = json_decode($listthe,true);
         //             foreach($BuyCards as $item => $type)
          //            {
          //              $Serial = $type['Serial'];
          //              $dbcheck = new db_query("SELECT * FROM `vnpaycardresponse` WHERE Serial = '".$Serial."'");// and CreateDate >'".date("Y-m-d H:i",time())."'
          //                if(mysql_num_rows($db_qr->result) > 0)
          //                  {
          //                  $check=true;
          //                  }
           //             }
         return $listthe;
       }else if($listcard['RepCode']==99){
            $listcard = GetCardsKho($partner,$pass,$providerCode,$amount,$quantity,$TransSendID);
           $listcard = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $listcard);
           $listcard = new SimpleXMLElement($listcard);
           $listcard = json_decode(json_encode((array)$listcard), TRUE); 
           $listcard = $listcard['soapBody']['GetCardsResponse']['GetCardsResult'];
           if($listcard['RepCode'] == 1)
            {
            $listthe = $listcard['Data'];
            return $listthe;
            }
       }
       //if($check==true){
         //$listcard = GetCardsKho($partner,$pass,$providerCode,$amount,$quantity,$TransSendID);
//       $listcard = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $listcard);
//       $listcard = new SimpleXMLElement($listcard);
//       $listcard = json_decode(json_encode((array)$listcard), TRUE); 
//       $listcard = $listcard['soapBody']['GetCardsResponse']['GetCardsResult'];
//       if($listcard['RepCode'] == 1)
//       {
//         $listthe = $listcard['Data'];
//         
//         $check=false;
//       }
		//	return null;
       //}
       return null;
   }
   catch (Exception $e)
   {
       return null;
   }
}
/** Function Getcard **/
function GetCards($msg,$token)
{
   $arrayer = "";
   $tokengenerate = v4_guid();// sprintf('{%04X%04X-%04X-%04X-%04X-%04X%04X%04X}', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
   $telcoReturn = array("transaction" => $tokengenerate,
                        "errorCode" => 278,
                        "message" => "Không tồn tại người dùng",
                        "listCards" => "");
   $ip = getUserIP();
   $contentlog = "Token: ".$token."  - MSG: ".$msg." - IP: ".$ip;
   savelog1("token.txt",$contentlog);
   $providerCode = "";
   $menhgiathe = 0;
   $soluong = 0;
   $msgreturn = explode(":",$msg);
   $providerCode = $msgreturn[0];
   $providerCode1=$providerCode;
   $menhgiathe = $msgreturn[1];
   $soluong = $msgreturn[2];
   if(ValidateMessage($msg,$providerCode,$menhgiathe,$soluong) == true)
   {
      $contentlog = "providerCode: ".$providerCode."  - menhgiathe: ".$menhgiathe." - soluong: ".$soluong;
      savelog1("provider.txt",$contentlog);
      $userId = ChecktokenExpired($token);
      if($userId == 35 || $userId == 8994)
      {
         return $telcoReturn;
      }
	 if($soluong > 200){
        return $telcoReturn;
      }
      if($userId > 0)
      {
         $type = 1;
         $db_qr = new db_query("SELECT * FROM `user` WHERE `UserId` = '".$userId."' LIMIT 1");
         $row = mysql_fetch_assoc($db_qr->result);
         if($row['GroupId'] == 1)
         {
            $type = 2;
         }
         //Tỉ lệ chiết khấu
         $tyletrietkhau = TyLeTrietKhauMuaMaThe($userId,$providerCode);
         $thangdu = thangdu($menhgiathe);
         $tyletrietkhau = $tyletrietkhau + $thangdu;
         $tonggiatrigiaodich = $menhgiathe * $soluong * $tyletrietkhau;
         $sodu = GetSoDuByUserId($userId);
         $tienhienco = $sodu['KhaDung'];
         $contentlog = "TongGiaTriGiaoDich: ".$tonggiatrigiaodich.", Số tiền hiện có: ".$tienhienco.", UserID: ".$userId." nha mang:".$providerCode;
         savelog1("giaodich.txt",$contentlog);
         //$tienhienco = '10000';
         if($tienhienco >= $tonggiatrigiaodich && $tonggiatrigiaodich > 0)
         {
            $chonKenh = "VNPAY";
            $trace = rand(1,999999);
            $chonKenh = "KHO";
            switch($chonKenh)
            {
              case "KHO":
                  $BuyCards =  BuyCardsInStore("B24H", "445EE4B12038B51BEB16579FB9D38BA1", $providerCode, $menhgiathe, $soluong, $trace);//_cardsTableServices.BuyCards(providerCode, menhgiathe, soluong, trace.ToString(), type);
                  if ($BuyCards != null)
                  {
                      $BuyCards = json_decode($BuyCards,true);
                      foreach($BuyCards as $item => $type)
                      {
                          $RespCode = "00";
                          $Amount = $menhgiathe;
                          $CreateDate = date("Y/m/d H:i:s",time());
                          $CreateUserId = $userId;
                          $Id = v4_guid();// sprintf('{%04X%04X-%04X-%04X-%04X-%04X%04X%04X}', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
                          $LocalDateTime = date("YmdHis",time());
                          $PinCode = $type['PinCode'];
                          $Serial = $type['Serial'];
                          $Sign = $trace;
                          $TelcoStatus = 1;
                          $Trace = $trace;
                          $UserId = $userId;
                          $VnPayDateTime = $chonKenh;
                          $ProviderCode = $providerCode;
                          $TransacsionID = $tokengenerate;
                          $db_ex = new db_execute("INSERT INTO vnpaycardresponse(Id,Respcode,Trace,Amount,LocalDateTime,VnPayDateTime,PinCode,Serial,UserId,Sign,CreateUserId,CreateDate,TelcoStatus,ProviderCode,TransacsionID) 
                                                   VALUES('".$Id."','".$RespCode."','".$Trace."','".$Amount."','".$LocalDateTime."','".$VnPayDateTime."','".$PinCode."','".$Serial."','".$UserId."','".$Sign."','".$CreateUserId."','".$CreateDate."','".$TelcoStatus."','".$ProviderCode."','".$TransacsionID."')");
                      }
                  }
                  break;
            }
            //Tính lại tiền cho trường hợp ko trả đủ thẻ
            if($BuyCards != null)
            {
               //$reAmount = 0;
               //foreach($BuyCards as $item => $type)
               //{
               //   $reAmount = $reAmount + $type['Amount'];
               //}
               $CreateDate =  date("YmdHis",time());
               $CreateUserId = $userId;
               $Price = "-".$tonggiatrigiaodich;//($reAmount * $tyletrietkhau);
               $Amount = $menhgiathe * $soluong;//$reAmount;
               $ReferentId = $tokengenerate;
               $TransId = v4_guid();// sprintf('{%04X%04X-%04X-%04X-%04X-%04X%04X%04X}', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
               $status = 1;
               $Trace = "00".str_replace(".","",date("YmdHis",time()).substr(microtime(),1,4));
               $Type = 2;
               $UserID = $userId;
               $contentlog = "TransId: ".$TransId."-PaymentBrandCode:VNAirtime-Amount:".$Amount."-Price:".$Price."-Type:".$Type."-ReferentId:".$ReferentId."-CreateDate:".$CreateDate;
               savelog1("transaction.txt",$contentlog);
               $db_ex2 = new db_execute("INSERT INTO transactiontable(TransId,ReferentId,UserId,Price,Amount,Type,Status,CreateDate,CreateUserId,UpdateDate,UpdateUserId,Trace,CurrentBalance) 
                                         VALUES('".$TransId."','".$ReferentId."','".$UserID."','".$Price."','".$Amount."','".$Type."','".$status."','".date("Y/m/d H:i:s",time())."','".$CreateUserId."','".date("Y/m/d H:i:s",time())."','".$CreateUserId."','".$Trace."','0')");
               if($db_ex2->total > 0)
               {
                  //Trả về trạng thái
                   $arrayer = array("errorCode"=>0,
                                    "message"=>"Thành công!",
                                    "transaction"=>$tokengenerate,
                                    "listCards"=>Encrypt($token,json_encode($BuyCards)));
                  //Provider|Amount|Serial|PinCode
                  $body = "";
                  $sothe = 1;
                  foreach($BuyCards as $item => $type2)
                  {
                     $mathe = Decrypt("BMEymdHUrIgB1PfoZyQOAB5b0CoY53AZ3Apa",$type2['PinCode']);
                     $body .= "Thẻ số ".$sothe.":<br /> Loại thẻ: ".$type2['Telco']." - Mệnh giá: ".$type2['Amount']." - Mã thẻ: ".$mathe." - Serial: ".$type2['Serial']."<br />";
                     $sothe++;
                     unset($mathe);
                  }
                  SendBuyCard($row['Email'],$row['Name'],$body);
               }
               else
               {
                  $arrayer = array("errorCode"=>777,
                                   "message"=>"Lỗi hệ thống!",
                                   "transaction"=>$tokengenerate);
                  $contentlog = "SYSTEM_ERROR: Code-777-Lỗi hệ thống!";
                  savelog1("error_getcard.txt",$contentlog);
               }
            }
            else
            {
               $arrayer = array("errorCode"=>5,
                                "message"=>ConvertErrorCode(5),
                                "transaction"=>$tokengenerate);
               $contentlog = "SYSTEM_ERROR: Code-5-".ConvertErrorCode(5);
               savelog1("error_getcard.txt",$contentlog);
            }
         }
         else
         {
            $arrayer = array("errorCode"=>778,
                             "message"=>ConvertErrorCode(778),
                             "transaction"=>$tokengenerate);
            $contentlog = "SYSTEM_ERROR: Code-778-".ConvertErrorCode(778);
            savelog1("error_getcard.txt",$contentlog);
         }
      }
      else
      {
         $arrayer = array("errorCode"=>279,
                          "message"=>"Định dạng gửi lên không chính xác!",
                          "transaction"=>$tokengenerate);
      }
   }
   else
   {
      $arrayer = array("errorCode"=>96,
                        "message"=>ConvertErrorCode(96),
                        "transaction"=>$tokengenerate);
   }
   return $arrayer;
}
function BuyCardsWs($providerCode,$amount, $quantity, $TransSendID)
        {
            try
            {
                switch (strtoupper($providerCode))
                {
                    case "VT":
                    case "VTT":
                        $providerCode = "VTT";
                        break;
                    case "VP":
                    case "VNP":
                        $providerCode = "VNP";
                        break;
                    case "MB":
                    case "VMS":
                        $providerCode = "VMS";
                        break;
                    case "GATE":
                    case "FPT":
                    case "GT":
                        $providerCode = "FPT";
                        break;
                    case "VM":
                        $providerCode = "VNM";
                        break;
                    case "GA":
                    case "GAR":
                        $providerCode = "GAR";
                        break;
                    case "ZING":
                    case "ZIN":
                        $providerCode = "ZING";
                        break;
                    case "VTC":
                    case "VC":
                        $providerCode = "VTC";
                        break;
                }

                $lstResult = "";
                //using (var _unitOfWork = new DataModel.UnitOfWork.UnitOfWork())
                //{
                $ls1 = "";
                $lstResult = BuyCardsInStore("B24H", "445EE4B12038B51BEB16579FB9D38BA1", $providerCode, $amount, $quantity, $TransSendID);//WebApi.DataService.CardsTableServices.BuyCardsInStore("B247", "85F97CC7972C049E3B6E04C0CFCB9ECB", providerCode, amount, quantity, TransSendID); //_unitOfWork.CardsTableRepository.Get().Where(c => c.Amount == amount && c.Status == 1 && c.Provider.Trim().ToUpper() == providerCode.Trim().ToUpper()).OrderBy(c => c.CreateDate).Take(quantity).ToList();
                $contentlog = "BuyCardsWs mua the bank: ".$TransSendID."- nha mang:".$providerCode."- menh gia:".$amount."- so luong:".$quantity."-tra ve:".count($lstResult);
                savelog1("vnpayreturn.txt",$contentlog);
                if ($lstResult != null)
                {
                    $ls1=json_decode($lstResult,true); 
                    //_unitOfWork.Save();
                    return $lstResult;
                }else{
                return null;
                }
                
                
            }
            catch (Exception $ex)
            {
                return null;
            }

        }
        
function ConvertErrorCode($errorCode,$type = "VNPAY")
{
switch ($errorCode)
{
    case 0:
        $errorCode = 0;
        $Message = "Thành công.";
        break;
    case 1:
        $errorCode = 1;
        $Message = "Lỗi Telco.";
        break;
    case 3:
        $errorCode = 3;
        $Message = "Sai mệnh giá tiền.";
        break;
    case 4:
        $errorCode = 4;
        $Message = "Sai Product Code ";
        break;
    case 5:
        $errorCode = 5;
        $Message = "Hệ thống bảo trì";
        break;
    case 25:
        $errorCode = 25;
        $Message = "Địa chỉ IP không được cấp phép truy cập dịch vụ.";
        break;
    case 8:
        $errorCode = 8;
        $Message = "Time out.";
        break;
    case 9:
        $errorCode = 9;
        $Message = "Số Trace đã tồn tạ i. Hoặc sai format.";
        break;
    case 20:
        $errorCode = 20;
        $Message = "Partner không tồn tại . Hoặc chưa cấp phép sử dụng dịch vụ.";
        break;
    case 22:
        $errorCode = 22;
        $Message = "Số điện thoại cần nạ p không hợp lệ.  (format)";
        break;
    case 23:
        $errorCode = 23;
        $Message = "Số điện thoạ i cần nạp không hợp lệ.  (đúng format nhưng không tồn tạ i số điện thoạ i,…) ";
        break;
    case 90:
        $errorCode = 90;
        $Message = "Hệ thống telco tạ m ngừng giao dịch.";
        break;
    case 96:
        $errorCode = 96;
        $Message = "Lỗi hệ thống. ";
        break;
    case 99:
        $errorCode = 99;
        $Message = "Offline để bảo trì hệ thống. ";
        break;
    case 65:
        $errorCode = 65;
        $Message = "Vượt quá hạ n mức giao dịch trong ngày.";
        break;
    case 778:
        $errorCode = 778;
        $Message = "Tài khoản không đủ số dư để thực hiện giao dịch.";
        break;
    case 550:
        $errorCode = 550;
        $Message = "Nhà cung cấp không được hỗ trợ";
        break;
    case 789:
        $errorCode = 789;
        $Message = "Topup không thành công!";
        break;
    default:
        $errorCode = $errorCode;
        $Message = "Lỗi!";
        break;
}
return $Message;
}
function SendNapTienDienThoai($mailto, $fullname, $sodienthoai, $menhgia)
{
    $body=file_get_contents('../EmailTemplate/NapTienDienThoai.htm');
    $body=str_replace('<%name%>',$fullname,$body);
    $body=str_replace('<%sodienthoai%>',$sodienthoai,$body);
    $body=str_replace('<%menhgia%>',$menhgia,$body);
    //$body = mb_convert_encoding($body,'UTF-8');
   $body = base64_encode($body);
   CreateSendMail($mailto,$mailto,"","","[doithe66.com] - Nạp tiền điện thoại -".date('Y-m-d H:i:s',time()), $body,"TOPUP_MOBILE");
    //return $body;
}

function SendForgotPasswordone($mailto, $fullname, $code){
    $body=file_get_contents('../EmailTemplate/SendForgotPassword.htm');      
    $body=str_replace('<%name%>',$fullname,$body);
    $body=str_replace('<%email%>',$mailto,$body);
    $body=str_replace('<%code1%>',md5($mailto),$body);
    $body=str_replace('<%code%>',$code,$body);
    //$body = mb_convert_encoding($body,'UTF-8');
   
   $body = base64_encode($body);
   CreateSendMail($mailto,$mailto,"","","[banthe24h.vn] - lấy lại mật khẩu cấp -".date('Y-m-d H:i:s',time()), $body,"LAY_LAI_MAT_KHAU"); 
}
function SendUpdateUserInfo($mailto, $fullname, $code)
{
    $body=file_get_contents('../EmailTemplate/CapNhatThongTin.htm');
  //string filePath = @"G:\PleskVhosts\banthe247.com\httpdocs\EmailTemplate\SendForgotPassword.htm";
    $body=str_replace('<%name%>',$fullname,$body);
    $body=str_replace('<%email%>',$mailto,$body);            
    $body=str_replace('<%code%>',$code,$body);
    $body = base64_encode($body);
    CreateSendMail($mailto,$mailto,"","","[banthe24h.vn] - cập nhật thông tin tài khoản -".date('Y-m-d H:i:s',time()), $body,"CAP_NHAT_THONG_TIN_TAI_KHOAN"); 
}

function SendRegisterComfirm($mailto, $fullname, $code)
{
   $body=file_get_contents('../EmailTemplate/XacThucEmail.htm');      
    $body=str_replace('<%name%>',$fullname,$body);
    $body=str_replace('<%email%>',$mailto,$body);    
    $body=str_replace('<%code%>',$code,$body);
    //$body = mb_convert_encoding($body,'UTF-8');
   
   $body = base64_encode($body);
   CreateSendMail($mailto,$mailto,"","","[banthe24h.vn] - Xác nhận đăng ký -".date('Y-m-d H:i:s',time()), $body,"LAY_LAI_MAT_KHAU");
  
}
function SendBuyCard($mailto,$fullname,$mailBody)
{         
   $body = '<!DOCTYPE html>
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>[banthe24h.vn] - Email thông tin mua mã thẻ</title>
   </head><body><div style="width: 800px; margin: 0 auto;font-size:14px; background-color: #fff; border: 1px solid #cccccc;">
   <div style="padding:7px 15px;"><div style="padding: 5px 0px 7px 0px; border-bottom: 5px solid #d3e2ff;margin-bottom:25px;">
   banthe24h.vn</div><b>Dịch mua mã thẻ trên banthe24h.vn</b><br><br>
   <p>Xin chào <b>'.$fullname.'</b>,</p><br>Bạn vừa sử dụng dịch vụ mua mã thẻ trên banthe24h.vn, sau đây là thông tin mã thẻ của bạn:
   <p><span>Thông tin giao dịch: </span></p><div><p>'.$mailBody.'</p></div>
   </div><div style="padding:7px 15px;"><p><b>Cảm ơn bạn đã sử dụng dịch vụ của Chúng tôi</b></p>
   <p style="line-height:25px;">Để biết thêm chi tiết về dịch vụ hoặc đóng góp ý kiến cho Chúng tôi, Quý khách vui lòng liên hệ qua số điện thoại: 1900 633682 hoặc Email: info@24hpay.vn</p>
   <p>Trân trọng,</p><p><b>banthe24h.vn</b></p></div></div></body></html>';
   $message = "";
   //logger.InfoFormat("Mailto - body: {0}-{1}", mailto, body); "[Banthe247.com] - Thông tin mua mã thẻ"
   //$body = mb_convert_encoding($body,'UTF-8');
   $body = base64_encode($body);
   CreateSendMail($mailto,$mailto,"","","[banthe24h.vn] - Mua mã thẻ", $body,"MUA_MA_THE");
}
function GetOneCard($userName,$pass,$providerCode,$amount,$quantity)
{
   //login
   $datalogin = loginbt($userName,$pass);
   if($datalogin != null)
   {
      $token = $datalogin['TokentKey'];
      $msg = $providerCode.":".$amount.":".$quantity;
      $request = GetCards($msg,$token);
      if($request != null)
      {
         $errorCode = $request['errorCode'];
         $message = $request['message'];
         $transaction = $request['transaction'];
         if($errorCode == 0)
         {
            $listCards = $request['listCards'];
            $listCards = Decrypt($token,$listCards);
            $listcard=json_decode($listCards,true);
                        //var_dump($listcard);die();
                        $r='';
                        foreach($listcard as $item => $type2){
                            $r1['PinCode']=Decrypt("BMEymdHUrIgB1PfoZyQOAB5b0CoY53AZ3Apa",$type2['PinCode']);
                            $r1['ProviderCode']=$type2['Telco'];
                            $r1['Serial']=$type2['Serial'];
                            $r1['Amount']=$type2['Amount'];
                            $r1['Trace']=$type2['Trace'];
                            $r[]=$r1;
                        }
            $result = array("errorCode" => $errorCode,
                            "message" => $message,
                            "transaction" => $transaction,
                            "listCards"=>json_encode($r));
         }
         else
         {
            $result = array("errorCode" => $errorCode,
                            "message" => $message,
                            "transaction" => $transaction);
         }
         return $result;
      }
      else
      {
         return null;
      }
   }
   else
   {
      return null;
   }
}
function GetCardLogin($providerCode,$amount,$quantity,$token)
{
   $msg = $providerCode.":".$amount.":".$quantity;
   $request = GetCards($msg,$token);
   if($request != null)
   {
   $errorCode = $request['errorCode'];
   $message = $request['message'];
   $transaction = $request['transaction'];
   if($errorCode == 0)
   {
      $listCards = $request['listCards'];
      $listCards = Decrypt($token,$listCards);
      $listcard=json_decode($listCards,true);
                        //var_dump($listcard);die();
                        $r='';
                        foreach($listcard as $item => $type2){
                            $r1['PinCode']=Decrypt("BMEymdHUrIgB1PfoZyQOAB5b0CoY53AZ3Apa",$type2['PinCode']);
                            $r1['ProviderCode']=$type2['Telco'];
                            $r1['Serial']=$type2['Serial'];
                            $r1['Amount']=$type2['Amount'];
                            $r1['Trace']=$type2['Trace'];
                            $r[]=$r1;
                        }
      $result = array("errorCode" => $errorCode,
                      "message" => $message,
                      "transaction" => $transaction,
                      "listCards"=>json_encode($r));
   }
   else
   {
      $result = array("errorCode" => $errorCode,
                      "message" => $message,
                      "transaction" => $transaction);
   }
   return $result;
   }
   else
   {
   return null;
}
}
function loginbt($email,$password)
{
   if($password != "" && $email != "")
   {
      $db_qr = new db_query("SELECT * FROM `user` WHERE `username` = '".$email."' AND `password` = '".$password."'");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         if($row['Status'] == 1)
         {
            $ip = getUserIP();
            $token = create_token($row['UserId'],$ip);
            $profileData = array("UserId" => $row['UserId'],
                                 "UserName" => $row['UserName'],
                                 "EmailAddress" => $row['Email'],
                                 "FullName" => $row['Name'],
                                 "BankCode" => $row['BankCode'],
                                 "TokentKey" => $token);
            $contentlog = "User Name Login: ".$row['UserName']." - Ip Login: ".$ip;
            savelog1("login.txt",$contentlog);
            $_SESSION['UserInfo'] = $profileData;
            return $profileData;
         }
         else 
         {
            return null;
         }
      }
      else
      {
         return null;
      }
   }
   else
   {
      return null;
   }
}
function v4_guid() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

      // 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),

      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,

      // 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }
  function GetProviderIOByNumber($phoneNumber)
        {
            $result = "";
            if (!empty($phoneNumber) && strlen($phoneNumber) > 4)
            {
                $startPhone = "";
                switch (strlen($phoneNumber))
                {
                    case 10:
                        $startPhone = substr($phoneNumber, 0, 3);
                        break;
                    case 11:
                        $startPhone = substr($phoneNumber,0, 4);
                        break;
                    default:
                        return "";
                }
                switch ($startPhone)
                {
                    case "096":
                    case "097":
                    case "098":                    
                    case "086":
                    case "032":
                    case "033":
                    case "034":
                    case "035":
                    case "036":
                    case "037":
                    case "038":
                    case "039":
                    
                        $result = "VT";
                        break;
                    case "090":
                    case "089":
                    case "093":
                    case "079":
                    case "077":
                    case "076":
                    case "078":
                    case "070":
                        $result = "MB";
                        break;
                    case "091":
                    case "094":
                    case "088":
                    case "083":
                    case "084":
                    case "085":
                    case "081":
                    case "082":
                        $result = "VP";
                        break;
                    case "092":
                    case "056":
                        $result = "VM";
                        break;
                }
            }
            return $result;
        }
        function GetProviderByNumber($phoneNumber)
        {
            $result = "";
            if (!empty($phoneNumber) && strlen($phoneNumber) > 4)
            {
                //314442691
                $startPhone = "";
                switch (strlen($phoneNumber))
                {
                    case 10:
                        $startPhone = substr($phoneNumber, 0, 3);
                        break;
                    case 11:
                        $startPhone = substr($phoneNumber,0, 4);
                        break;
                    default:
                        return "";
                }
                switch ($startPhone)
                {
                    case "096":
                    case "097":
                    case "098":                    
                    case "086":
                    case "032":
                    case "033":
                    case "034":
                    case "035":
                    case "036":
                    case "037":
                    case "038":
                    case "039":
                    
                        $result = "VTT";
                        break;
                    case "090":
                    case "089":
                    case "093":
                    case "079":
                    case "077":
                    case "076":
                    case "078":
                    case "070":
                        $result = "VMS";
                        break;
                    case "091":
                    case "094":
                    case "088":
                    case "083":
                    case "084":
                    case "085":
                    case "081":
                    case "082":
                        $result = "VNP";
                        break;
                    case "092":
                    case "056":
                        $result = "VNM";
                        break;
                }
            }
            return $result;
        }
  function CaculateLimitOnDay($userid){
    try{
        $db_qr = new db_query("SELECT * FROM `user` WHERE `UserId` = '".$userid."' LIMIT 1");
        if(mysql_num_rows($db_qr->result) > 0)
        {
             $row = mysql_fetch_assoc($db_qr->result);
             if($row['GroupId'] != ""){ 
                $groupid=$row['GroupId'];
             $db_qrgroup = new db_query("SELECT * FROM `group` WHERE group.Id = '".$groupid."'");
             $db_giaodich=new db_query("SELECT sum(Price) as sumtonggiaodich FROM `transactiontable` WHERE `UserID` = '".$userid."' AND DATE(CreateDate)='".date('Y-m-d')."' AND Status =1 AND (Type= 1 OR Type=2 OR Type=7)");
             if(mysql_num_rows($db_giaodich->result) > 0){
                $rowgiaodich = mysql_fetch_assoc($db_giaodich->result);
                $rowgroup=mysql_fetch_assoc($db_qrgroup->result);
                $tonggiatrigiaodich=$rowgiaodich['sumtonggiaodich'];
                
                    return (float)$tonggiatrigiaodich + (float)$rowgroup['LitmitOnDay'];
               
             }
             }
        }
    }catch(exception $e)
    {
        return -1;
    }
  }
  function ValidateTopupMessage($msg){
    $resule=array('provider'=>'',
                   'amount'=>0,
                   'phone'=>'' );
            $provider = "VT";
            $amount = 10000;
            $phone = "0913081236";
            
                $lstMsg = explode(':',$msg);
                if (count($lstMsg) == 2)
                {
                    $phone = trim($lstMsg[0]) ;
                    $resule['provider'] =GetProviderByNumber($phone);
                    $resule['amount'] = $lstMsg[1];
                    $resule['phone']=$phone;
                }
        return $resule;                
           
  }
  function ValidateTopupHHMessage($msg)
  {
    $result= array("provider"=> "VT", "amount" => 10000,"phone" => "0977123866","mobileType" => "TT");
    $lstMsg = explode(':',$msg);
    if(count($lstMsg)>=2){
         $phone = trim($lstMsg[0]);
         $result['provider'] =GetProviderByNumber($phone);
         $result['amount'] = $lstMsg[1];
         $result['phone']=$phone;
         if(isset($lstMsg[2]) && $lstMsg[2] != ''){
           $result['mobileType']=$lstMsg[2]; 
         }else{
            $result['mobileType']="TT";
         }
         
    }
    return $result;
  }
  function CheckTopup($code){
    $flag=false;
    $db_qr = new db_query("SELECT * FROM configtable WHERE Code = '".strtoupper($code)."'");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         if($row['Status']==1){
            $flag=true;
         }
      }
      return $flag;
  }
  function GetPercentByProvice($userId, $type, $providerCode)
  {
    $tyle = 1;
    if ($type == 4)
            {
                $tyle = 0.8;
            }
            $codeProvider=strtoupper($providerCode);
            switch (strtoupper($providerCode))
                {
                    case "VT":
                        $codeProvider = "VTT";
                        break;
                    case "MB":
                        $codeProvider = "VMS";
                        break;
                    case "VP":
                        $codeProvider = "VNP";
                        break;
                    case "VM":
                        $codeProvider = "VNM";
                        break;
                }
                $db_qr = new db_query("SELECT * FROM `providers` WHERE `ProviderCode` = '".strtoupper($codeProvider)."'");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         $db_qr = new db_query("SELECT * FROM `user` WHERE `UserId` = '".$userId."'");
         $rowuser = mysql_fetch_assoc($db_qr->result);
         $db_qr = new db_query("SELECT * FROM `groupprovider` WHERE `GroupId` = '".$rowuser['GroupId']."' AND `Status`=1 AND Type='".$type."' AND `ProviderId`='".$row['Id']."'" );
         if(mysql_num_rows($db_qr->result) > 0)
      {
        $rowgroupprovider = mysql_fetch_assoc($db_qr->result);
        $tyle=(double)$rowgroupprovider['Price']/100;
      }    
         
      }
      return $tyle;
  }
function PaymentBuyCardUsesBank($bankCode,$providerId,$email,$amount,$quantity)
{
   try
   {
      $UserID = 4;
      if(isset($_SESSION["UserInfo"]))
      {
        $udata = $_SESSION["UserInfo"];
        $UserID = $udata['UserId'];
      }
      $providercode = GetProvidersById($providerId);
      if($providercode != null)
      {
         $providercode = trim($providercode);
      }
      else
      {
         $providercode = "VTT";
      }
      $arrProvider = array("VTT","VMS","VNP");
      if(!in_array($providercode,$arrProvider))
      {
         $arr = array("Success"=>false,
                      "Signature" => false);
         echo json_encode($arr);
      }
      $dataSend = $providercode.":".$amount.":".$quantity;
      /** Có thể phải lưu OrderId vào session nếu cần dùng cho truy vấn giao dịch **/
      $OrderId = v4_guid();
      $db_qr = new db_query("SELECT * FROM `providers` WHERE `ProviderCode` = '".$providercode."' LIMIT 1");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         $nampro = $row['Name'];
      }
      else
      {
         $nampro = "Viettel";
      }
      $OrderDesc = "Mua $quantity the $nampro menh gia $amount cho $email";
      /** Fix chiết khấu là 0.3% **/
      $tyletrietkhau = GetPercentByProvice($UserID,2,$providercode);
      $sotienthanhtoan = $amount * $quantity * $tyletrietkhau;
      $sotienthanhtoancophi = $sotienthanhtoan + $sotienthanhtoan * 0.011 + 1760;
      $secretKey = "cc03e747a6afbbcbf8be7668acfebee5";
      $contentlog = "vnpay_tid: 10008601 - secretKey: $secretKey - OrderId: $OrderId - Send: $sotienthanhtoancophi";
      savelog1("vnpay.txt",$contentlog);
      
   }
   catch (Exception $e)
   {
       return null;
   }
}
function GetTrace($type)
{
    $typeFirt = "E";
           switch ($type)
           {

               case 6:
                   $typeFirt = "R";
                   break;
               case 2:
                   $typeFirt = "M";
                   break;
               case 1:
                   $typeFirt = "N";
                   break;
           }
           $trace=$typeFirt.date("YmdHis",time()).rand(100,999);
           return $trace;
}
?>