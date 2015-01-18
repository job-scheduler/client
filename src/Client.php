<?php

namespace JobScheduler\Client;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    private $username;
    private $password;
    private $baseurl;
    
    public function __construct($username, $password, $baseurl)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseurl = $baseurl;
    }
    
    public function listJobs($keyword)
    {
        $guzzle = new GuzzleClient();
        $res = $guzzle->get($this->baseurl . '/api/v1/jobs', ['auth' =>  [$this->username, $this->password]]);
        $data = $res->json();
        return $data;
    }
}
