<?php

namespace App\Services;

use App\Entity\PageAlert;
use Doctrine\Persistence\ManagerRegistry;

class insertScan
{
    public function insertScan(ManagerRegistry $doctrine, GetScan $getScan)
    {


        //z lokalnego pliku json pobiera dane i zapisuje je do bazy danych. Dane sa bardzo ogolne, do przerobienia na szczegolowy scan.
        // plik json uzyty w tej funkcji to dataTest.json jest w tym samym folderze. dump($alerts) wyswietla te alerty
        {
            $jsondata = $getScan->getScans('http://localhost:6969/');
            $data = json_decode($jsondata, true);
            $alerts = $data["pageAlerts"];
            $entityManager = $doctrine->getManager();
            foreach ($alerts as $key => $values) { //dane w pliku sa oznaczone jako low medium high petla przechodzi przechodzi po kazdym z nich
                foreach ($values as $item => $value) { // przechodzi po kazdych danych z low/medium/high i wyciaga dane od razu zapisujac do bazy
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
            dump($data);
            return true;
        }
    }
}