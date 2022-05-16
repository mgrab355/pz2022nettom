<?php

namespace App\Controller;

use App\Zap\Zapv2;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class main extends AbstractController
{
    /**
     * @Route ("/")
     *
     * */
    public function index(){


        //require "vendor/autoload.php";

        $api_key = "fbfop2k5k491kopua1acm7c6ca";
        $target = "http://localhost:6969/login_front";

        $zap = new Zapv2('tcp://127.0.0.1:8080');

        $version = @$zap->core->version();
        if (is_null($version)) {
            echo "PHP API error\n";
            exit();
        } else {
            echo "version: ${version}\n";
        }

        echo "Spidering target ${target}\n";

// Response JSON looks like {"scan":"1"}
        $scan_id = $zap->spider->scan($target, null, null, null, $api_key);
        $count = 0;
        while (true) {
            if ($count > 10) exit();
            // Response JSON looks like {"status":"50"}
            $progress = intval($zap->spider->status($scan_id));
            printf("Spider progress %d\n", $progress);
            if ($progress >= 100) break;
            sleep(2);
            $count++;
        }
        echo "Spider completed\n";
// Give the passive scanner a chance to finish
        sleep(5);

        echo "Scanning target ${target}\n";
// Response JSON for error looks like {"code":"url_not_found", "message":"URL is not found"}
        $scan_id = $zap->ascan->scan($target, null, null, null, null, null, $api_key);
        $count = 0;
        while (true) {
            if ($count > 10) exit();
            $progress = intval($zap->ascan->status($scan_id));
            printf("Scan progress %d\n", $progress);
            if ($progress >= 100) break;
            sleep(2);
            $count++;
        }
        echo "Scan completed\n";

// Report the results
        echo "Hosts: " . implode(",", $zap->core->hosts()) . "\n";
        $alerts = $zap->core->alerts($target, "", "");
        echo "Alerts (" . count($alerts) . "):\n";
        print_r($alerts);
         return $this->render('front/index.html.twig');
    }
}

