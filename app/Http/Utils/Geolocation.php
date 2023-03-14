<?php

namespace App\Http\Utils;


class Geolocation
{

    public static function getCurrentLocation()
    {
        $hostNameUrl = "https://geolocation.apigw.ntruss.com";
        $requestUrl = "/geolocation/v2/geoLocation";
        $accessKey = 'kf5OYTYYZMVWfmypBt9W';
        $secretKey = 'IbcYEdpnsEPc6iTAfuk6IBfpxhV54e7zXEqxRars';
        try {
//

//            $ports =
            //현재 접속 위치 IP (NAVER API REQUEST Params)
            $ip = "221.143.19.236";
//            $ip = $_SERVER["REMOTE_ADDR"];
            $timestamp = round(microtime(true) * 1000);
            $baseString = $requestUrl . "?ip=$ip&ext=t&responseFormatType=json";
            $space = " ";
            $newLine = "\n";
            $method = "GET";
            $key = $method . $space . $baseString . $newLine . $timestamp . $newLine . $accessKey;
            $signautue = base64_encode(hash_hmac('sha256', $key, $secretKey, true));

            $url = $hostNameUrl . $baseString;

            $is_post = false;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, $is_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = array();
            $headers[] = "x-ncp-apigw-timestamp:" . $timestamp;
            $headers[] = "x-ncp-iam-access-key:" . $accessKey;
            $headers[] = "x-ncp-apigw-signature-v2:" . $signautue;

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = json_decode(curl_exec($ch), true);
            $lat = $response['geoLocation']['lat'];
            $lon = $response['geoLocation']['long'];
            $si = $response['geoLocation']['r1'];
            $gu = $response['geoLocation']['r2'];
            $dong = $response['geoLocation']['r3'];

            return response()->json(['lat' => $lat, 'lon' => $lon ,'si' =>$si,'gu'=>$gu, 'dong' => $dong,
            ]);

        } catch
        (Exception $E) {
            echo "Response: " . $E->lastResponse . "\n";

        }
    }
}
