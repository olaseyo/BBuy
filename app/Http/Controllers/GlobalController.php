<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use\App\DevelopersApiCalls;

class GlobalController extends Controller
{
    public $url="https://api.sendbucs.com/api/v1/";

    public $amount_per_call=100;

    public function curlPost($data1=array(),$url,$token="") {

        // Make Post Fields Arra

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return  response()->json(["error"=>TRUE, "error_message"=>"curl post request failed"]);
        } else {
            return $response;
        }
    }

    public function generateToken(){
  		$charsetA=array('A','b','C','D','E','f','G','H','I','J'); //9
      $charsetB=array('h','i','j','k','l'); //4
      $charsetC=array('1','2','3','4','5','6','7','8','9'); //8
      $charsetD=array('m','n','O','p','Q','r','s','T','u'); //8
      $charsetE=array('o','j','k','l','w','X','Y','Z');  //7

      $arragmentchoice=rand(1, 5);
      $rand="";
      switch($arragmentchoice)
      {
        case 1:
           //ACBDE
           $rand=$charsetA[rand(0, 9)];
           $rand.=$charsetC[rand(0, 8)];
           $rand.=$charsetB[rand(0, 4)];
           $rand.=$charsetD[rand(0, 8)];
           $rand.=$charsetE[rand(0, 7)];

           break;
        case 2:
           //BDCEA
           $rand=$charsetB[rand(0, 4)];
           $rand.=$charsetD[rand(0, 8)];
           $rand.=$charsetC[rand(0, 8)];
           $rand.=$charsetE[rand(0, 7)];
           $rand.=$charsetA[rand(0, 9)];

           break;

        case 3:
           //CEDBA
           $rand=$charsetC[rand(0, 8)];
           $rand.=$charsetE[rand(0, 7)];
           $rand.=$charsetD[rand(0, 8)];
           $rand.=$charsetB[rand(0, 4)];
           $rand.=$charsetA[rand(0, 9)];
           break;
        case 4:
           //DBADC
           $rand=$charsetD[rand(0, 8)];
           $rand.=$charsetB[rand(0, 4)];
           $rand.=$charsetA[rand(0, 9)];
           $rand.=$charsetE[rand(0, 7)];
           $rand.=$charsetC[rand(0, 8)];
           break;
        case 5:
           //EBADC
           $rand=$charsetE[rand(0, 7)];
           $rand.=$charsetB[rand(0, 4)];
           $rand.=$charsetA[rand(0, 9)];
           $rand.=$charsetD[rand(0, 8)];
           $rand.=$charsetC[rand(0, 8)];
           break;
      }
  		 return $rand;
  	}






  	function aes128Encrypt($key, $data) {
          if(16 !== strlen($key)) $key = hash('MD5', $key, true);
          $padding = 16 - (strlen($data) % 16);
          $data .= str_repeat(chr($padding), $padding);
          return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
      }

      function aes128Decrypt($key, $data) {
          $data = base64_decode($data);
          if(16 !== strlen($key)) $key = hash('MD5', $key, true);
          $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
          $padding = ord($data[strlen($data) - 1]);
          return substr($data, 0, -$padding);
      }

        function public_path($path = null)
         {
             return rtrim(app()->basePath('public/' . $path), '/');
         }

}
