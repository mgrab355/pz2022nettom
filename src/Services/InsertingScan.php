<?php

namespace App\Services;

use App\Entity\Project;
use App\Entity\ScanAlert;
use App\Entity\ScansId;
use Doctrine\Persistence\ManagerRegistry;

class InsertingScan
{

//http://127.0.0.1:8080/JSON/hud/view/hudAlertData/?apikey=mrfr81krgb3arenv01gi4k9uk9&url=http%3A%2F%2Flocalhost%3A6969
    public function InsertingScan(ManagerRegistry $doctrine, AdvancedScan $getAdvancedScan,$scansid,$projectID,$url)
    {

        $ProjectScans=$doctrine->getRepository(ScansId::class)->findOneBy(['id'=> $scansid]);
        $ProjectData=$doctrine->getRepository(Project::class)->findOneBy(['id'=> $projectID]);
        $scans = $getAdvancedScan->getAdvScans($url,$doctrine);
        $scan = json_decode($scans, true);
        $entityManager = $doctrine->getManager();
//        dump($ProjectScans);
        foreach ($scan as $key => $values) { //dane w pliku sa oznaczone jako low medium high petla przechodzi przechodzi po kazdym z nich
            foreach ($values as $item => $value) { // przechodzi po kazdych danych z low/medium/high i wyciaga dane od razu zapisujac do bazy
                $alert = new ScanAlert();
                $alert->setEvidence($value['evidence']);
                $alert->setName($value['name']);
                $alert->setParam($value['param']);
                $alert->setRisk($value['risk']);
                $alert->setDescription($value['description']);
                $alert->setConfidence($value['confidence']);
                $alert->setSolution($value['solution']);
                $alert->setMethod($value['method']);
                $alert->setSourceid($value['sourceid']);
                $alert->setPluginID($value['pluginId']);
                $alert->setCweid($value['cweid']);
                $alert->setWascid($value['wascid']);
                $alert->setMessegeId($value['messageId']);
                $alert->setUrl($value['url']);
                $alert->setAlertRef($value['alertRef']);
                $alert->setReference($value['reference']);
                $alert->setScans($ProjectScans);
                $alert->setProject($ProjectData);
                $entityManager->persist($alert);
                $entityManager->flush();
            }
        }
//        return $this->redirect($this->generateUrl('project', array('id' => $projectID->getId(),)));
    }
}