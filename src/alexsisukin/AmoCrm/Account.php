<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 17:57
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;
use http\Exception\InvalidArgumentException;

class Account extends Essential
{
    const LINK = '/api/v2/account';

    public function get($params = [])
    {
        $params = (isset($params['with'])) ? ['with' => $params['with']] : [];
        $options = [
            'query' => $params,
            'headers' => [
                'cookie' => $this->core->getAuthCookie()
            ]
        ];
        $response = $this->core->getRequest()->Get(self::LINK, $options);
        try {
            $response = GuzzleHttp\json_decode($response['body'], true);
        } catch (InvalidArgumentException $e) {
            return false;
        }

        return $response;
    }

}