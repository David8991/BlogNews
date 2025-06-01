<?php

namespace App\Services;

use NewsdataIO\NewsdataApi;

class NewsdataService
{
    protected NewsdataApi $client;

    public function __construct()
    {
        $this->client = new NewsdataApi(config('services.newsdata.key'));
    }

    public function getHeadlines(array $params = [])
    {
        return $this->client->get_latest_news($params); // пример метода
    }
}

