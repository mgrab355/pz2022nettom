<?php

namespace App\Services;

class GetScan
{
    // 23.05 wypisuje szczegolowe scany jak w owasp / nigdzie nie sa przechowywane

//http://127.0.0.1:8080/JSON/hud/view/hudAlertData/?apikey=mrfr81krgb3arenv01gi4k9uk9&url=http%3A%2F%2Flocalhost%3A6969
//"http://localhost:8080/JSON/alert/view/alerts/?apikey={$key}&baseurl={$baseUrl}&start=&count=&riskId=")
    public function getScans($baseUrl)
    {
        $ch = curl_init();
        $key = 'mrfr81krgb3arenv01gi4k9uk9';
        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/hud/view/hudAlertData/?apikey={$key}&url={$baseUrl}");
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec($ch);
        $err = curl_error($ch);
        dump($output);
        dump($err);
        curl_close($ch);

        return $output; //

    }
}

