<?php

namespace App\Services;
class ScanInsert
{
    public function scanAdd(){
        $jsondata = '{"pageAlerts":{"Informational":{},"Low":{},"Medium":{},"High":{}},"siteAlerts":{"Informational":["Information Disclosure - Suspicious Comments","Loosely Scoped Cookie"],"Low":["Server Leaks Information via \"X-Powered-By\" HTTP Response Header Field(s)","Timestamp Disclosure - Unix","X-Content-Type-Options Header Missing"],"Medium":["Content Security Policy (CSP) Header Not Set","Missing Anti-clickjacking Header","Vulnerable JS Library"],"High":[]}}';

        $data = json_decode($jsondata);

    }

}