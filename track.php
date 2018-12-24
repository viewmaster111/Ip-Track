<?php 

error_reporting(0);

function banner() 
{
	echo "
	\033[94m.--.	 \033[91m___         _____            _
       \033[94m|\033[91mo_o \033[94m|   \033[91m|_ _|_ __ __|_   _| _ __ _ __| |__  
       \033[94m|:_/ |    \033[97m| || '_ \___|| ||  _/ _  / _| / /  
      \033[94m//   \ \  \033[97m|___| .__/    |_||_| \__ _\__|_\_\. 
     \033[94m(|     | ) \033[97m____|_|____________________________
    \033[94m/'\_   _/`\	\033[93mAuthor : Dominic404 - Rijone01
    \033[94m\___)=(___/ \033[93mTeam   : PhobiaXploit Team
";   
}

function track($ip)
{
	$link = "https://ipapi.co/$ip/json";

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $link);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($c, CURLOPT_HEADER, 1);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		$response = curl_exec($c);
		
		$json = json_decode($response);

		if (!curl_errno($c)) {
			if ($json->error == 1) {
				echo "\033[91mInvalid IP Address\n";
			} else {
				if($json->reserved == 1) {
					echo "\033[91mNot Supported IP Public\n";
				} else {
					system("clear") or system("cls");
					banner();
					echo "+---------------------------------------------------+\n";
					echo " IP Address   : ".$json->ip."\r\n";
					echo " City         : ".$json->city."\r\n";
					echo " Region       : ".$json->region."\r\n";
					echo " Country      : ". $json->country . " / ". $json->country_name."\r\n";
					echo " Latitude     : ".$json->latitude." \r\n";
					echo " Longitude    : ".$json->longitude." \r\n";
					echo " Time Zone    : ".$json->timezone."\r\n";
					echo " Calling Code : ".$json->country_calling_code."\r\n";
					echo " Currency     : ".$json->currency."\r\n";
					echo " Languagess   : ".$json->languages."\r\n";
					echo " ASN Number   : ".$json->asn."\r\n" ;
					echo " Organization : ".$json->org."\r\n";
					echo "+---------------------------------------------------+\n";
				}
			}
		}

		curl_close($c);
}

system("clear") or system("cls");  
banner();
echo "\033[97mIP : \033[92m";
$ip = trim(fgets(STDIN, 1024));
echo "\033[94mTracking....\n";
track($ip);						

 ?>
