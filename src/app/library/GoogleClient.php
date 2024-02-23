<?php

namespace app\library;

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

use Google\Client;
use Google\Service\Oauth2 as ServiceOauth2;
use GuzzleHttp\Client as GuzzleClient;
use Google\Service\Oauth2\Userinfo;

class GoogleClient
{
    public readonly Client $client;
    private Userinfo $data;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function init()
    {
        $guzzleClient = new GuzzleClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig('credentials.json');
        $this->client->setRedirectUri('https://localhost/minhagestao_app/');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function authorized()
    {
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);
            $googleService = new ServiceOauth2($this->client);
            // $this->data = $googleService->userinfo->get();
            var_dump($googleService->userinfo->get());


            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->data;
    }

    public function generateAuthLink()
    {
        return $this->client->createAuthUrl();
    }
}
