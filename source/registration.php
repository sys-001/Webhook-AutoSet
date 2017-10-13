<?PHP
!empty($_POST["testmode"]) ? $test = "/test" : $test = "";
header('Content-Type: application/json;charset=utf-8');
$url = str_replace("mytoken", $_POST["token"], $_POST["url"]);
$params = array("url" => $url);
$curl = curl_init("https://api.telegram.org/bot".$_POST["token"].$test."/setWebhook");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;