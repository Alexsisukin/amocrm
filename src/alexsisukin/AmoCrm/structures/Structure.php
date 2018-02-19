<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 5:31
 */

namespace alexsisukin\AmoCrm\structures;

abstract class Structure
{


    protected $name;
    protected $created_at;
    protected $updated_at;
    protected $status_id;
    protected $pipeline_id;
    protected $responsible_user_id;
    protected $sale;
    protected $tags;
    protected $contacts_id;
    protected $company_id;
    protected $custom_fields;
    protected $id;
    protected $unlink;
    protected $company_name;
    protected $leads_id;
    protected $customers_id;

    public function save()
    {
        $params = get_object_vars($this);
        foreach ($params as $key => $value) {
            if (is_null($value) || empty($value)) {
                unset($params[$key]);
                continue;
            }
        }
        return $params;
    }
    public function setCustomFields($custom_fields, $server_fields)
    {
        if (!is_array($custom_fields) || !is_array($server_fields)) {
            return;
        }
        foreach ($custom_fields as $id => $field) {
            if ($id != $field['id']) {
                unset($custom_fields[$id]);
                continue;
            }
            if (!key_exists($id, $server_fields)) {
                unset($custom_fields[$id]);
                continue;
            }
            if (!isset($field['values'])) {
                unset($custom_fields[$id]);
                continue;
            }
            foreach ($field['values'] as $value) {
                if (isset($value['enum'])) {
                    if (!isset($server_fields[$id]['enums'][$value['enum']])) {
                        unset($custom_fields[$id]);
                        continue;
                    }
                }
            }
        }

        $this->custom_fields = $custom_fields;
    }
}