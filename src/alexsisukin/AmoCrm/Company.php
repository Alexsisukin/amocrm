<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 14:24
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;

class Company extends Essential
{
    const LINK = '/api/v2/companies';

    public function add($company)
    {

        $options = [
            'json' => [
                'add' => $company,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'cookie' => $this->core->getAuthCookie()
            ],
        ];
        $response = $this->core->getRequest()->Post(self::LINK, $options);

        try {
            $response = GuzzleHttp\json_decode($response['body'], true);
        } catch (\Exception $e) {
            return false;
        }

        if (empty($response['_embedded']['items'])) {
            return false;
        }
        return $response['_embedded']['items'];

    }

    public function get($params = [])
    {

        $options = [
            'query' => $params
            ,
            'headers' => [
                'cookie' => $this->core->getAuthCookie()
            ],
        ];
        $response = $this->core->getRequest()->get(self::LINK, $options);

        try {
            $response = GuzzleHttp\json_decode($response['body'], true);
        } catch (\Exception $e) {
            return false;
        }

        if (empty($response['_embedded']['items'])) {
            return false;
        }
        return $response['_embedded']['items'];

    }

    public function update($company)
    {
        $options = [
            'json' => [
                'update' => $company,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'cookie' => $this->core->getAuthCookie()
            ],
        ];
        $response = $this->core->getRequest()->Post(self::LINK, $options);
        try {
            $response = GuzzleHttp\json_decode($response['body'], true);
        } catch (\Exception $e) {
            return false;
        }

        if (empty($response['_embedded']['items'])) {
            return false;
        }
        return $response['_embedded']['items'];
    }
}