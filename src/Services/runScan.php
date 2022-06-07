<?php

namespace App\Services;

use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\Session;

class runScan
{
    public function runScan($id,ManagerRegistry $doctrine)
    {

        $api_id='1';
        $product = $doctrine->getRepository(Project::class)->find($id);
        $api = $doctrine->getRepository(\App\Entity\ApiKey::class)->find($api_id);
        $baseUrl=$product->getUrl();
        $key = $api->getApiKey();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey={$key}&url={$baseUrl}&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
//        dump($baseUrl);
//        dump($output);
//        dump($err);

    }
}