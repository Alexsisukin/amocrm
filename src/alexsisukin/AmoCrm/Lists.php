<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.02.18
 * Time: 13:51
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;

class Lists extends Essential
{
    const LINK = '/api/v2/catalogs';

    public function create($contact)
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
        $response = $this->core->getRequest()->Post('/api/v2/catalog_elements', $options);

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