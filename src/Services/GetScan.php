<?php

namespace App\Services;

class GetScan
{
    // 23.05 wypisuje szczegolowe scany jak w owasp / nigdzie nie sa przechowywane
    public function getScans($baseUrl)
    {
        $ch = curl_init();
        $key = 'mrfr81krgb3arenv01gi4k9uk9';
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/JSON/alert/view/alerts/?apikey={$key}&baseurl={$baseUrl}&start=&count=&riskId=");
        curl_close($ch);
        $output = curl_exec($ch);
        $err = curl_error($ch);
        return dump($output);

    }
}