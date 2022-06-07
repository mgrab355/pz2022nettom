<?php

namespace App\Services;

use App\Entity\PageAlert;
use Doctrine\Persistence\ManagerRegistry;

class insertScan
{
    public function insertScan( GetScan $getScan, ManagerRegistry $doctrine, $id): bool
    {
        {
            $jsondata = $getScan->getScans($id,$doctrine);
            $data = json_decode($jsondata, true);
            $alerts = $data["pageAlerts"];
            $entityManager = $doctrine->getManager();
            foreach ($alerts as $key => $values) {
                foreach ($values as $item => $value) {
                    $scan = new pageAlert();
                    $scan->setEvidence($value['evidence']);
                    $scan->setName($value['name']);
                    $scan->setParam($value['param']);
                    $scan->setRisk($value['risk']);
                    $scan->setUri($value['uri']);
                    $scan->setAlertId($value['id']);
                    $entityManager->persist($scan);
                    $entityManager->flush();
                }
            }
            return true;
        }
    }
}