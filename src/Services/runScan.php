<?php

namespace App\Services;

class runScan
{
    public function runScan($baseUrl)
    {
        $key = 'mrfr81krgb3arenv01gi4k9uk9';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey={$key}&url={$baseUrl}&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        dump($output);
        dump($err);
    }
}