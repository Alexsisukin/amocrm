<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 17:57
 */

namespace alexsisukin\AmoCrm;

use GuzzleHttp;

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
        } catch (\Exception $e) {
            return false;
        }

        return $response;
    }

    /**
     * @param $field string contacts||leads||companies||customers
     * @return bool
     */
    public function getCustomFields($field)
    {
        $response = $this->get(['with' => 'custom_fields']);
        if (!$response) {
            return false;
        }
        if (!isset($response['_embedded']['custom_fields'])) {
            return false;
        }
        return (isset($response['_embedded']['custom_fields'][$field])) ? $response['_embedded']['custom_fields'][$field] : false;
    }

}