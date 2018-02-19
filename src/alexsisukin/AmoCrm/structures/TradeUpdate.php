<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 10:25
 */

namespace alexsisukin\AmoCrm\structures;

class TradeUpdate extends Structure
{


    public function __construct($lead)
    {
        $this->updated_at = time();
        $this->parseLead($lead);
    }

    private function parseLead($lead)
    {
        $this->setId($lead['id']);
        $this->setName($lead['name']);
        $this->setStatusId($lead['status_id']);
        $this->setCompanyId($lead['pipeline']['id']);
        $this->setResponsibleUserId(['responsible_user_id']);
        $this->setSale($lead['sale']);
        $this->setTags($lead['tags']);
        $this->setContactsId($lead['contacts']);
        $this->setCompanyId($lead['company']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if (is_numeric($id)) {
            $this->id = (int)$id;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
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
     */
    public function setStatusId($status_id)
    {
        if (is_numeric($status_id)) {
            $this->status_id = (int)$status_id;
        }
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
     */
    public function setPipelineId($pipeline_id)
    {
        if (is_numeric($pipeline_id)) {
            $this->pipeline_id = (int)$pipeline_id;
        }
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
     */
    public function setResponsibleUserId($responsible_user_id)
    {
        if (is_numeric($responsible_user_id)) {
            $this->responsible_user_id = (int)$responsible_user_id;
        }
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
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
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
     */
    public function setTags($tags)
    {
        if (is_array($tags)) {
            foreach ($tags as $tag) {
                if (isset($tag['id'])) {
                    $this->tags[] = $tag['name'];
                }
            }
        }
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
     */
    public function setContactsId($contacts_id)
    {
        if (is_array($contacts_id)) {
            $this->contacts_id = $contacts_id;
        }
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
     */
    public function setCompanyId($company_id)
    {
        if (is_array($company_id)) {
            $this->company_id = $company_id;
        }
    }

    /**
     * @return mixed
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }



    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        if (is_numeric($created_at)) {
            $this->created_at = $created_at;
        }
    }


}