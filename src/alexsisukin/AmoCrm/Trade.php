<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 18:47
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;
use http\Exception\InvalidArgumentException;

class Trade extends Essential
{

    const LINK = '/api/v2/leads';

    public function get($limit_rows = 500, $limit_offset = 0, $id = [], $query = '', $responsible_user_id = [], $status = false)
    {
        $data = [
            'limit_rows' => $limit_rows,
            'limit_offset' => $limit_offset,
        ];
        if (!empty($id)) {
            $data['id'] = $id;
        }
        if (!empty($query)) {
            $data['query'] = $query;
        }
        if (!empty($responsible_user_id)) {
            $data['responsible_user_id'] = $responsible_user_id;
        }
        if (!empty($status)) {
            $data['status'] = $status;
        }
        $options = [
            'query' => $data,
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

        if (empty($response['_embedded']['items'])) {
            return false;
        }
        return $response['_embedded']['items'];
    }

    public function add($lead)
    {

        $options = [
            'json' => [
                'add' => $lead,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'cookie' => $this->core->getAuthCookie()
            ],
        ];
        $response = $this->core->getRequest()->Post(self::LINK, $options);
        try {
            $response = GuzzleHttp\json_decode($response['body'], true);
        } catch (InvalidArgumentException $e) {
            return false;
        }

        if (empty($response['_embedded']['items'])) {
            return false;
        }
        return $response['_embedded']['items'];
    }

}