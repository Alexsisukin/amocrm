<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.02.18
 * Time: 18:36
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;

class Customers extends Essential
{
    const LINK = '/api/v2/customers';

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
        var_dump($response);
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