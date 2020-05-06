<?php

namespace App\Repositorios;

use GuzzleHttp\Client;

class EncuestasCafe
{
    protected $client;
    protected $api_key;

    public function __construct()
    {
        //$base_uri = 'http://encuestas_cafe_server.test:8080';
        //$base_uri = 'http://encuestas.cafe.minculturas.com:8080';'http://encuestas.cafe.minculturas.com/public/';
        $base_uri = 'http://encuestas.cafe.minculturas.com/public/';

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $base_uri,
            // You can set any number of default request options.
            // 'timeout'  => 2.0,
        ]);

        $this->api_key = 'api_key=$2y$10$ijgHm6PCsN2/G7bH0/6tzelzeas3t.2wlGTJWgDGwHJvJ.U49hH4i';
    }
    public function datas($url){

        $response = $this->client->request('GET', $url . '?' . $this->api_key);
        // dd($response->getBody());
        return json_decode($response->getBody()->getContents());
    }

    public function guardar_data($datas, $url){

        $data =  array(
            'headers'=>array('Content-Type'=>'application/json'),
            'json'=>$datas
        );

        $response = $this->client->post($url . '?' . $this->api_key , $data);
        // return $response->getBody()->getContents();
        return (string) $response->getBody();

    }
}
