<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 13:24
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;

class Contacts extends Essential
{
    const LINK = '/api/v2/contacts';

    public function add($contact)
    {

        $options = [
            'json' => [
                'add' => $contact,
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

    public function update($contact)
    {
        $options = [
            'json' => [
                'update' => $contact,
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