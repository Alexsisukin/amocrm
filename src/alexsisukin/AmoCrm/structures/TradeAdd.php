<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 5:31
 */

namespace alexsisukin\AmoCrm\structures;

class TradeAdd extends Structure
{

    public $name;
    public $created_at;
    public $updated_at;
    public $status_id;
    public $pipeline_id;
    public $responsible_user_id;
    public $sale;
    public $tags;
    public $contacts_id;
    public $company_id;
    public $custom_fields;


    public function __construct($name)
    {
        $this->name = $name;
        $this->created_at = time();
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @param mixed $status_id
     * @return $this
     */
    public function setStatusId($status_id)
    {
        if (is_numeric($status_id)) {
            $this->status_id = (int)$status_id;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPipelineId()
    {
        return $this->pipeline_id;
    }

    /**
     * @param mixed $pipeline_id
     * @return $this
     */
    public function setPipelineId($pipeline_id)
    {
        if (is_numeric($pipeline_id)) {
            $this->pipeline_id = (int)$pipeline_id;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsibleUserId()
    {
        return $this->responsible_user_id;
    }

    /**
     * @param mixed $responsible_user_id
     * @return $this
     */
    public function setResponsibleUserId($responsible_user_id)
    {
        if (is_numeric($responsible_user_id)) {
            $this->responsible_user_id = (int)$responsible_user_id;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     * @return $this
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     * @return $this
     */
    public function setTags($tags)
    {
        if (is_array($tags) || is_string($tags)) {
            $this->tags = $tags;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactsId()
    {
        return $this->contacts_id;
    }

    /**
     * @param mixed $contacts_id
     * @return $this
     */
    public function setContactsId($contacts_id)
    {
        if (is_array($contacts_id) || is_numeric($contacts_id)) {
            $this->contacts_id = $contacts_id;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @param mixed $company_id
     * @return $this
     */
    public function setCompanyId($company_id)
    {
        if (is_numeric($company_id)) {
            $this->company_id = $company_id;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }

    /**
     * @param mixed $custom_fields
     * @return $this
     */
    public function setCustomFields($custom_fields)
    {
        if (is_array($custom_fields)) {
            $this->custom_fields = $custom_fields;
        }
        return $this;
    }
}