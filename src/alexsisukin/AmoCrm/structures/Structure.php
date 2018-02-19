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

    /**
     * @param mixed $name
     * @return Structure
     */
    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
        return $this;
    }

    /**
     * @param mixed $created_at
     * @return Structure
     */
    public function setCreatedAt($created_at)
    {
        if (is_numeric($created_at)) {
            $this->created_at = $created_at;
        }
        return $this;
    }

    /**
     * @param mixed $updated_at
     * @return Structure
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_numeric($updated_at)) {
            $this->updated_at = $updated_at;
        }
        return $this;
    }

    /**
     * @param mixed $status_id
     * @return Structure
     */
    public function setStatusId($status_id)
    {
        if (is_numeric($status_id)) {
            $this->status_id = $status_id;
        }
        return $this;
    }

    /**
     * @param mixed $pipeline_id
     * @return Structure
     */
    public function setPipelineId($pipeline_id)
    {
        if (is_numeric($pipeline_id)) {
            $this->pipeline_id = $pipeline_id;
        }
        return $this;
    }

    /**
     * @param mixed $responsible_user_id
     * @return Structure
     */
    public function setResponsibleUserId($responsible_user_id)
    {
        if (is_numeric($responsible_user_id)) {
            $this->responsible_user_id = $responsible_user_id;
        }
        return $this;
    }

    /**
     * @param mixed $sale
     * @return Structure
     */
    public function setSale($sale)
    {
        if (is_numeric($sale)) {
            $this->sale = $sale;
        }
        return $this;
    }

    /**
     * @param array $tags
     * @return Structure
     */
    public function setTagsNew($tags)
    {
        if (is_array($tags)) {
            $this->tags = implode(',', $tags);
        }
        return $this;
    }

    public function setTagOld($tags)
    {
        if (is_array($tags)) {
            $this->tags = $tags;
        }
        return $this;
    }

    /**
     * @param mixed $contacts_id
     * @return Structure
     */
    public function setContactsId($contacts_id)
    {
        if (is_array($contacts_id)) {
            $this->contacts_id = $contacts_id;
        }
        return $this;
    }

    /**
     * @param mixed $company_id
     * @return Structure
     */
    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
        return $this;
    }

    /**
     * @param mixed $id
     * @return Structure
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $unlink
     * @return Structure
     */
    public function setUnlink($unlink)
    {
        $this->unlink = $unlink;
        return $this;
    }

    /**
     * @param mixed $company_name
     * @return Structure
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
        return $this;
    }

    /**
     * @param mixed $leads_id
     * @return Structure
     */
    public function setLeadsId($leads_id)
    {
        $this->leads_id = $leads_id;
        return $this;
    }

    /**
     * @param mixed $customers_id
     * @return Structure
     */
    public function setCustomersId($customers_id)
    {
        $this->customers_id = $customers_id;
        return $this;
    }


}