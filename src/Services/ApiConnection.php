<?php

namespace App\Services;


class ApiConnection
{
    // na ta chwile ten kod nie jest nigdzie uzywany.
    //do zrobienia: wykonanie pierwszego scanu, na ta chwile jezeli nie zadnego skanu danej strony to nie wykona skanu.
    public function runScan(ApiKey $key)
    {
        $apiKey = $key->key();

        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey={$apiKey}&url=https://localhost:6969/login_front&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = curl_exec($ch);
        $err = curl_error($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return dump($output);

    }
}