<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 16:03
 */

namespace alexsisukin\AmoCrm;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Request
{
    static $request_qty = 0;
    private $client;
    private $debug;

    public function __construct($base_url, $debug)
    {
        $this->client = new Client([
            'base_uri' => $base_url,
            'timeout' => 10.0,
        ]);
        $this->debug = $debug;
    }


    public function Post($uri, $option = [], $get_body = true, $get_headers = false)
    {
        return $this->send('POST', $uri, $option, $get_body, $get_headers);
    }


    public function Get($uri, $option = [], $get_body = true, $get_headers = false)
    {
        return $this->send('GET', $uri, $option, $get_body, $get_headers);
    }

    private function send($method, $uri, $option = [], $get_body = true, $get_headers = false)
    {

        try {
            if (self::$request_qty > 0) {
                sleep(1);
            }
            self::$request_qty++;
            $option['debug'] = (bool)$this->debug;
            $response = $this->client->request($method, $uri, $option);
            var_dump($response->getBody()->getContents());
        } catch (ClientException $e) {
            return false;
        }
        if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 204) {
            return false;
        }
        return [
            'body' => ($get_body) ? $response->getBody()->getContents() : '',
            'headers' => ($get_headers) ? $response->getHeaders() : [],
        ];
    }
}