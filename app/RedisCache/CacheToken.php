<?php

namespace App\RedisCache;

class CacheToken{
    
    private $client;

    function __construct()
    {
        $this->client = new \Predis\Client();
;
        
    }

    function setToken($key,$value,$TTL){
        $this->client->set($key, $value,"EX",$TTL);
    }

    function getToken($key){
        return $this->client->get($key);
    }

    function tokenExists($key){
        return $this->client->exists($key);
    }

    function deleteToken($key){
        return $this->client->del($key);
    }
    
}