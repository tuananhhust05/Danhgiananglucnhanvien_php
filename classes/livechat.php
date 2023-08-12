<?
$refesh = isset($_GET['refesh']) ? $_GET['refesh'] : "";
$getContentsJs = file_get_contents("https://work247.vn/js/livechat/app.js");
$getContentsCss = file_get_contents("https://work247.vn/css/livechat/app.css");

$expireValue = ($refesh != '') ? 1 : 86400 * 3;
$expire = $expireValue;

$fileJs = "../js/livechat/app.js";
$fileCss = "../css/livechat/app.css";

if (!file_exists("../js/livechat")) {
	mkdir("../js/livechat");
}

if (!file_exists("../css/livechat")) {
	mkdir("../css/livechat");
}

if (!file_exists($fileJs)) {
	fopen($fileJs, "x");
}

if (!file_exists($fileCss)) {
	fopen($fileCss, "x");
}

$fpJs = fopen($fileJs, "w");
fputs($fpJs, $getContentsJs);
fclose($fpJs);

$fpCss = fopen($fileCss, "w");
fputs($fpCss, $getContentsCss);
fclose($fpCss);
echo "Site đánh giá năng lực nhân viên cập nhật xong" . "<br>";
