<?php
error_reporting(0);
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,($str[1]));
	return $str[0];
}
function login($email,$name,$devid){
	$arr = array("\r","	");
	$url = "http://sscoinmedia.tech/DogeWebService/dogeUserAdd.php";
	$h = explode("\n",str_replace($arr,"","User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; vivo 1606 Build/MMB29M)"));
	$body = "name=$name&email=$email&devid=$devid&";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch);
	curl_close($ch);
	return timer($email,$devid);
}
function timer($email,$devid){
	$arr = array("\r","	");
	$url = "http://sscoinmedia.tech/DogeWebService/dogeClaimTimer1.php";
	$h = explode("\n",str_replace($arr,"","User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; vivo 1606 Build/MMB29M)"));
	$body = "email=$email&devid=$devid&";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch);
	curl_close($ch);
	return claim($email,$devid);
}
function claim($email,$devid){
	$arr = array("\r","	");
	$url = "http://sscoinmedia.tech/DogeWebService/dogeBalanceUpdate1.php";
	$h = explode("\n",str_replace($arr,"","User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; vivo 1606 Build/MMB29M)"));
	$body = "email=$email&devid=$devid&claimok=ok";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch); 
	curl_close($ch);
	return json_decode($x,true);
}
echo "#################\n#  @Seputar-Informasi23  #\n#   G45 CYBER TEAM    #\n#  Anonymous All Indonesia  #\n#################\n";
echo "email :";
$email = trim(fgets(STDIN));
echo "devid(Note Simpan devid nya untuk login lagi!!) :";
$devid = trim(fgets(STDIN));
$name = explode("@",$email)[0];
while(TRUE){
	$submit = login($email,$name,$devid);
	$output = json_encode($submit);
	$balance = getStr($output,'"message":',',');
	$balance = getStr($output,'"ubal":',',');
	$claim = getStr($output,'"claimamt":',',');
	if(strpos($output,"devid")==true){
                $text = " Berhasil Balance: $balance Claim : $claim Credit By:Muhtoevill Delay 5 menit";
                $text1 = "\033[32m".$text."\033[0m";
            }else{
                $text =" GAGAL";
                $text1 = "\033[31m".$text."\033[0m";
        }
	echo date('d-m-Y H:i:s');
	echo $text1."\n";
	sleep(300);
	
}
