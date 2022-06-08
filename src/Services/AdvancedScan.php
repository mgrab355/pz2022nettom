<?php

namespace App\Services;

use Doctrine\Persistence\ManagerRegistry;

class AdvancedScan
{
    // 23.05 wypisuje szczegolowe scany jak w owasp / nigdzie nie sa przechowywane

//http://127.0.0.1:8080/JSON/hud/view/hudAlertData/?apikey=mrfr81krgb3arenv01gi4k9uk9&url=http%3A%2F%2Flocalhost%3A6969
    public function getAdvScans($baseUrl,ManagerRegistry $doctrine)
    {
        $api_id='1';
        $api = $doctrine->getRepository(\App\Entity\ApiKey::class)->find($api_id);
        $ch = curl_init();
        $key = $api->getApiKey();
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/JSON/alert/view/alerts/?apikey={$key}&baseurl={$baseUrl}&start=&count=&riskId=");
//        http://localhost:8080/JSON/alert/view/alerts/?apikey={$key}&baseurl={$baseUrl}&start=&count=&riskId=
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $err = curl_error($ch);
//        dump($output);
//        dump($err);
        curl_close($ch);

        return $output; //

    }
}